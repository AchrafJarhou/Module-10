<?php

function get_user_by_email(PDO $pdo, string $email): ?array
{

    $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE email = :email");
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user ?: null;

}

function create_user(PDO $pdo, string $password, string $email): bool
{
    $stmt = $pdo->prepare("INSERT INTO utilisateur (password, email) VALUES (:password, :email)");
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    return $stmt->execute();
}



function findAll(PDO $pdo)
{
    $sql = "SELECT * FROM utilisateur";
    $pdoStatement = $pdo->query($sql);
    $userList = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    return $userList ?: null;
}


// function find_or_create_user(PDO $pdo, string $email): int
// {
//     $user = get_user_by_email($pdo, $email);
//     if ($user) {
//         return $user;
//     }
//     return create_user($pdo, $email);
// }
