<?php

session_start();

require_once '../config/db.php';
require_once '../Models/user.php';
// require_once '../models/messages.php';
$users =  findAll($pdo);
var_dump($users);
exit;
if ($users) {
    $_SESSION['user'] = $users;
    header('location:../view/dashboard.tpl.php');

}
