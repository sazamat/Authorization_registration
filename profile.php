<?php
require_once __DIR__ . "/database/pdo.php";
require_once __DIR__ . "/functions/token.php";

if (isset($_POST["logout_submit"])) {
    setcookie("token", NULL);
    unset($_COOKIE);
    header("Location: /login.php");
}

if (isset($_COOKIE["token"])) {
    $user = fetchUserByToken($dbh, $_COOKIE["token"]);
    if (!$user) {
        header("Location: /login.php");
    }
} else {
    header("Location: /login.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/app.css">
</head>
<body>
<main class="d-flex justify-content-center align-items-center">
    <div class="main-block">
        <h2>Приветствуем <span class="badge bg-secondary"><?= $user["name"] ?></span></h2>
        <p>Ваша электронная почта: <?= $user["email"] ?></p>
        <form action="/profile.php" method="post">
            <button type="submit" name="logout_submit" class="btn btn-danger">Выйти</button>
        </form>
    </div>
</main>
</body>
</html>