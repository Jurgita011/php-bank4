<div >

    <h1 >Sąskaitų sąrašas</h1>

    <table>
        <?php if (empty($accounts)) : ?>
            <p >Sąskaitų sąrašas tuščias.</p>

        <?php else : ?>
            <tr>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Asmens kodas</th>
                <th>Sąskaitos Nr.</th>
                <th>Balansas</th>
            </tr>
            <?php foreach ($accounts as $account) : ?>
                <tr>
                    <td ><?= $account['firstName'] ?></td>
                    <td ><?= $account['lastName'] ?></td>
                    <td ><?= $account['personalId'] ?></td>
                    <td ><?= $account['iban'] ?></td>
                    <td ><?= $account['balance'] ?><span> €</span></td>
                    <td>
                        <button class>
                            <a href="/accounts/edit/<?= $account['id'] ?>">Redaguoti balansą</a>
                        </button>
                    </td>
                    <td>
                        <button class>
                            <a href="/accounts/delete/<?= $account['id'] ?>">Ištrinti sąskaitą</a>
                        </button>
                    </td>
                </tr>




            <?php endforeach ?>
    </table>
<?php endif ?>


</div>