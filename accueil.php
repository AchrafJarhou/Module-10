<?php
session_start();

$dsn = 'mysql:host=localhost;dbname=user;charset=utf8';
$user = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $user, $password);

    // Option essentielle : affiche les erreurs sous forme d'exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Ne JAMAIS afficher ça en production
    echo "Erreur de connexion : " . $e->getMessage();
}

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';



if (!empty($email) && !empty($password)) {
    // Préparation de la requête de connexion
    $stmt = $pdo->prepare("SELECT * FROM utlisateur WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        echo "Connexion réussie !";

        header("Location: accueil.php");
        exit();
    } else {
        echo "Identifiants incorrects.";
        header("Location: connexion.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <p><?=var_dump($_SESSION['user']) ?></p>
    
</body>
</html>