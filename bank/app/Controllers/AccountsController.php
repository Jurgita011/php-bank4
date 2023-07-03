<?php

namespace Bank\Controllers;

use Bank\App;
use Bank\FileWriter;
use Bank\IbanId;
use Bank\OldData;
use Bank\Messages;


class AccountsController
{
    public function index()
    {
        $data = new FileWriter('account');

        return App::view('accounts/index', [
            'pageTitle' => 'Sąskaitų sąrašas',
            'accounts' => $data->showAll(),
        ]);
    }

    public function create()
    {
        $old = OldData::getFlashData() ?? [];

        $firstname = $old['firstName'] ?? '';
        $lastName = $old['lastName'] ?? '';
        $personalId = $old['personalId'] ?? '';
        $iban = $old['iban'] ?? IbanId::generateLithuanianIBAN();

        return App::view('accounts/create', [
            'pageTitle' => 'Pridėti sąskaitą',
            'firstName' => $firstname,
            'lastName' => $lastName,
            'personalId' => $personalId,
            'iban' => $iban
        ]);
    }

    public function store(array $request)
    {
        extract($request);

        $error1 = 0;
        $error2 = 0;
        $error3 = 0;

        if (strlen($firstName) < 3 || strlen($lastName) < 3) {
            Messages::addMessage('warning', 'Vardą ir pavardę turi sudaryti bent trys simboliai.');
            $error1 = 1;
        }

        if (!ctype_digit($personalId) || strlen(trim($personalId)) !== 11) {
            Messages::addMessage('warning', 'Asmens kodą turi sudaryti vienuolika skaičių.');
            $error2 = 1;
        }

        foreach ($accounts as $account) {
            if ($account['personalId'] === $personalId) {
                Messages::addMessage('warning', 'Vartotojas su tokiu asmens kodu jau įvestas.');
                $error3 = 1;
            }
        }

        if ($error1 || $error2 || $error3) {
            OldData::flashData($request);
            header("Location: /accounts/create");
            die;
        }

        $data = new FileWriter('account');
        $newAccount = [
            'id' => $id,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'personalId' => $personalId,
            'iban' => $iban,
            'balance' => 0
        ];
        $data->create($newAccount);

        Messages::addMessage('success', 'Nauja sąskaita sėkmingai pridėta.');
        header('Location: /accounts');
    }

    public function edit(int $id)
    {
        $data = new FileWriter('account');
        $account = $data->show($id);

        $id = $account['id'];
        $firstName = $account['firstName'];
        $lastName = $account['lastName'];
        $personalId = $account['personalId'];
        $iban = $account['iban'];
        $balance = $account['balance'];

        return App::view('accounts/edit', [
            'pageTitle' => 'Redaguoti sąskaitą',
            'id' => $id,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'personalId' => $personalId,
            'iban' => $iban,
            'balance' => $balance
        ]);
    }

    public function update(int $id, array $request, int $delete = 0)
    {
        $data = new FileWriter('account');
        $account = $data->show($id);

        $amount = $request['amount'];

        if (isset($request['add'])) {
            if ($amount <= 0) {
                Messages::addMessage('warning', 'Įvesta suma turi būti teigiamas sveikasis skaičius.');
                header('Location: /accounts/edit/' . $id);
                die;
            }

            $account['balance'] += $amount;

            $data->update($id, $account);
            Messages::addMessage('success', 'Į sąskaitą pridėta lėšų.');
            header('Location: /accounts/edit/' . $id);
        }

        if (isset($_POST['withdraw'])) {
            if ($amount <= 0) {
                Messages::addMessage('warning', 'Įvesta suma turi būti teigiamas sveikasis skaičius.');
                header('Location: /accounts/edit/' . $id);
                die;
            }

            if ($account['balance'] < $amount) {
                Messages::addMessage('danger', 'Nepakankamas sąskaitos likutis.');
                header('Location: /accounts/edit/' . $id);
                die;
            }

            $account['balance'] -= $amount;

            $data->update($id, $account);
            Messages::addMessage('success', 'Iš sąskaitos išimta lėšų.');

            if ($delete == 0) {
                header('Location: /accounts/edit/' . $id);
            }
        }
    }

    public function delete(int $id)
    {
        $account = (new FileWriter('account'))->show($id);

        $id = $account['id'];
        $firstName = $account['firstName'];
        $lastName = $account['lastName'];
        $personalId = $account['personalId'];
        $iban = $account['iban'];
        $balance = $account['balance'];

        return App::view('accounts/delete', [
            'pageTitle' => 'Ištrinti sąskaitą',
            'id' => $id,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'personalId' => $personalId,
            'iban' => $iban,
            'balance' => $balance,
        ]);
    }

    public function destroy(int $id)
    {
        $data = new FileWriter('account');
        $account = $data->show($id);
        if ($account['balance'] == 0) {
            $data->delete($id);
            Messages::addMessage('success', 'Sąskaita sėkmingai ištrinta.');
            header('Location: /accounts');
        } else {
            Messages::addMessage('danger', 'Sąskaitoje yra lėšų. Ištrinti negalima.');
            header('Location: /accounts/delete/' . $id);
        }
    }
}