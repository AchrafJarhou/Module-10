<?php

session_start();

require_once '../config/db.php';
require_once '../Models/user.php';
// require_once '../models/messages.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email  = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['password'] ?? '');
    if(!$email){
            header('Location: ../index.php?error=2');
            exit;


    }
    elseif (!empty($email) && !empty($password)) {
        $user = get_user_by_email($pdo, $email);
        // var_dump($user);
        // exit;
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            header('Location: ../view/dashboard.tpl.php');
            exit;

        } elseif ($user == null || !password_verify($password, $user['password'])) {
            header('Location: ../index.php?error=1');
            exit;

        }
    }
}
