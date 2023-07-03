<div>
    <a href="<?= URL ?>" >Pagrindinis</a>

    <a href="<?= URL . 'accounts' ?>" >Sąskaitų sąrašas</a>
    <a href="<?= URL . 'accounts/create/' ?>" >Pridėti sąskaitą</a>

    <?php if (isset($_SESSION['email'])) : ?>
        <form action="<?= URL.'logout' ?>" method="post" style="display: inline;">
            <button type="submit" >Atsijungti</button>
        </form>
    <?php else: ?>
        <a href="<?=URL .'login' ?>" >Prisijungti</a>
    <?php endif ?>
</div>