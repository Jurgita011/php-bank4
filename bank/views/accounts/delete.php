<div >

    <h1>Ištrinti sąskaitą</h1>

    <p >Ar tikrai norite ištrinti sąskaitą?</p>

    <form  action="/accounts/destroy/<?= $id ?>" method="post">

        <div >
            <h3><?= $firstName ?> <?= $lastName ?></h3>
        </div>
        <div>
            <p>Sąskaitos numeris</p>
            <p<?= $iban ?></p>
        </div>
        <div >
            <p>Balansas</p>
            <p ><?= $balance ?> €</p>
        </div>

        <div >
            <button type="submit">Ištrinti</button>
            <button >
                <a href="/accounts">Atšaukti</a>
            </button>
        </div>
    </form>

</div>