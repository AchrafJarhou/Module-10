<?php
$messageError = [
    1 => "votre inscription a echoué vos mots de passes ne sont pas identique",
    2 => "votre inscription a echoué votre mot de passe doit avoir plus de 8 caractere"
]
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link rel="stylesheet" href="../asset/css/style.css">

</head>
<body>
      <?php if (isset($_GET['error'])) :?>
        <p><?=$messageError[$_GET['error']]  ?></p>
    <?php endif ?>
    
    <form action="../Controller/inscription.php" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
         <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
          <label for="passwordConfirm">confirmé mot de passe</label>
        <input type="password" name="passwordConfirm" id="passwordConfirm">
        <button type="submit">envoyer</button>     


    </form>
</body>
</html>