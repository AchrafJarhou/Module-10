<?php
session_start();
unset($_SESSION['error']);



require_once '../config/db.php';
require_once '../Models/user.php';

/* if (isset($_SESSION['user'])) {
    $users = $_SESSION['user'];
}
 */

$users = findAll($pdo);
var_dump($users);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
</head>
<body>
    <?php if (!isset($_SESSION['user'])) :?>
        <?php

        $_SESSION['error'] = "vous navez pas le droit d'acceder a cette page ";
        header('location:../index.php');
        exit;
        ?>
        <?php endif ?>
        
    <button type="submit"><a href="./logout.tpl.php">deconexion</a></button>
    <ul>
        <?php foreach ($users as $user):?>
        <li><?= $user['email'] ?></li>
        <?php endforeach ?>
    </ul>
    
</body>
</html>