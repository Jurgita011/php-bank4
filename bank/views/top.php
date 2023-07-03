<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Untitled' ?></title>
   
    <link rel="stylesheet" type="text/css" href="/style.css">
</head>

<?php if (!isset($inLogin)) : ?>
    <?php require __DIR__ . '/nav.php' ?>
<?php endif ?>
<?php require_once 'Messages.php' ?>