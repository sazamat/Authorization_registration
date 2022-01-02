<?php
require_once __DIR__ . "/database/pdo.php";
//require_once __DIR__ . "/functions/login.php";
//require_once __DIR__ . "/functions/token.php";
//
//if (isset($_COOKIE["token"])) {
//    $user = fetchUserByToken($dbh, $_COOKIE["token"]);
//    if ($user) {
//        header("Location: /profile.php");
//    }
//}
//
//if (isset($_POST["login_submit"])) {
//    $email = $_POST["email"];
//    $password = $_POST["password"];
//    $user = fetchUserByEmail($dbh, $email);
//    $isNotAuth = false;
//    if (!$user || !password_verify($password, $user["password"])) {
//        $isNotAuth = true;
//    } else {
//        $token = generateToken();
//        updateUserToken($dbh, $user["id"], $token);
//        setcookie("token", $token);
//        header("Location: /profile.php");
//    }
//}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/app.css">
</head>
<body>
<main class="d-flex justify-content-center align-items-center">
    <div class="main-block">
        <h2 class="mb-2">Авторизация</h2>
        <?php
        if (isset($isNotAuth) && $isNotAuth) {
        ?>
            <div class="alert alert-danger" role="alert">
                Неверный логин или пароль
            </div>
        <?php
        }
        ?>
        <form action="/login.php" method="post">
            <div class="mb-3">
                <label for="email-field" class="form-label">Электронная почта</label>
                <input type="email" name="email" class="form-control" id="email-field" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Мы никогда никому не передадим вашу электронную почту.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <button type="submit" name="login_submit" class="btn btn-primary">Войти</button>
                <p class="m-0">Нет аккаунта? <a href="register.php">Создайте!</a></p>
            </div>
        </form>
    </div>
</main>
</body>
</html>