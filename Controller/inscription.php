<?php

require_once '../config/db.php';
require_once '../Models/user.php';
// require_once '../models/messages.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['password'] ?? '');
    $passwordConfirm = trim($_POST['passwordConfirm'] ?? '');

    if ($email && $password === $passwordConfirm && strlen($password) >= 8) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        if (create_user($pdo, $password, $email)) {
            header('Location: ../index.php');
            exit;
        } else {
            header('Location: ../view/inscription.tpl.php');
            exit;
        }
    } else {
        header('Location: ../view/inscription.tpl.php');
        exit;
    }
}
