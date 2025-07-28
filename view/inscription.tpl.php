<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
</head>
<body>
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