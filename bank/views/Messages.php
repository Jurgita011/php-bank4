<style>
    .alert-success {
        background: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }

    .alert-danger {
        background: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
    }

    .alert-warning {
        color: #8a6d3b;
        background-color: #fcf8e3;
        border-color: #faebcc;
    }
</style>
<?php

use Bank\Messages; ?>

<?php if (Messages::ifMessages()) : ?>
    <?php foreach (Messages::getMessages() as $message) : ?>
        <div class="w3-container w3-margin alert-<?= $message['type'] ?>" role="alert">
            <?= $message['message'] ?>
        </div>
    <?php endforeach ?>
<?php endif ?>