<?php
session_start();




?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>conexion</title>
</head>
<body>
      <?php if (isset($_SESSION['error'])) :?>
        <p><?=$_SESSION['error'] ?></p>
    <?php endif ?>
    <?php if (isset($_GET['error'])) :?>
        <p><?= $_GET['error'] ?></p>
    <?php endif ?>
    <form action="Controller/login.php" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
         <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">   
        <button type="submit">conexion</button>     
    </form>

    <p>inscrivez vous si vous avez pas de compte</p>
    <a href="view/inscription.tpl.php">inscription</a>
</body>
</html>