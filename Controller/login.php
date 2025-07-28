<?php

session_start();

require_once '../config/db.php';
require_once '../Models/user.php';
// require_once '../models/messages.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email  = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['password'] ?? '');
    if (!empty($email) && !empty($password)) {
        $user = get_user_by_email($pdo, $email);
        // var_dump($user);
        // exit;
        if ($user) {
            $_SESSION['user'] = $user;
            header('Location: ../view/dashboard.tpl.php');
            exit;

        } elseif ($user == null) {
            header('Location: ../index.php?error=votre conexion a echoué');
            exit;

        }
    }
}
