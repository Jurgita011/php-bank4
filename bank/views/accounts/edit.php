<div >

    <h1 >Redaguoti balansą</h1>

    <p >Pridėkite arba išimkite lėšų iš sąskaitos:</p>

    <form  style="width:50%;" action="/accounts/update/<?= $id ?>" method="post">
        <div style="display: flex; flex-direction: column;">
            <h3><?= $firstName ?> <?= $lastName ?></h3>
        </div>
        <div  style="display: flex; flex-direction: column;">
            <p>Sąskaitos numeris</p>
            <p class="w3-input"><?= $iban ?></p>
        </div>
        <div  style="display: flex; flex-direction: column;">
            <p>Balansas</p>
            <p class="w3-input"><?= $balance ?> €</p>
        </div>

        <div  style="display: flex; flex-direction: column;">
            <label for="amount">Redaguoti balansą:</label>
            <input  type="number" name="amount" id="amount" placeholder="Įveskite sumą" required>
        </div>

        <div >
            <button  type="submit" name="add" value=1>Pridėti</button>
            <button type="submit" name="withdraw" value=1>Išimti</button>
        </div>
    </form>

    <div >
        <button >
            <a href="/accounts">Grįžti į sąskaitų sąrašą</a>
        </button>
    </div>
