<div >

    <h1 >Prisijungti į administravimo panelę</h1>

    <p >Įveskite el. pašto adresą ir slaptažodį:</p>

    <form  action="<?= '/login' ?>" method="post">
        <input type="email" name="email" placeholder="El. paštas" value="<?= $old['email'] ?? '' ?>">
        <input  type="password" name="password" placeholder="Slaptažodis">
        <button type="submit">Prisijungti</button>
    </form>

</div>