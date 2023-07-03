<div >

    <h1>Pridėti naują sąskaitą</h1>

    <p >Įveskite reikalingus duomenis, kad galėtumėte pridėti naują sąskaitą:</p>

    <form  action="/accounts/store" method="post">
        <div >
            <label for="firstName">Vardas</label>
            <input input  type="text" name="firstName" id="firstName" value="<?= $firstName ?>" placeholder="Įveskite vardą" required>
        </div>
        <div class style="display: flex; flex-direction: column;">
            <label for="lastName">Pavardė</label>
            <input input type="text" name="lastName" id="lastName" value="<?= $lastName ?>" placeholder="Įveskite pavardę" required>
        </div>
        <div >
            <label for="personalId">Asmens kodas</label>
            <input  type="text" name="personalId" id="personalId" value="<?= $personalId ?>" placeholder="Įveskite asmens kodą" required>
        </div>
        <div >
            <label for="iban">Banko sąskaitos numeris</label>
            <input input  type="text" name="iban" id="iban" value="<?= $iban ?>" readonly>
        </div>
        <div class="w3-padding" style="display: flex; flex-direction: column;">
            <label for="balance">Balansas</label>
            <input input type="number" name="balance" id="balance" value=0 placeholder="0 €" readonly>
        </div>
        <div class="w3-padding">
            <button type="submit">Išsaugoti</button>
            <button>
                <a href="/accounts">Atšaukti</a>
            </button>
        </div>
    </form>

</div>
