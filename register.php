<?php
require_once __DIR__ . '/database/PDO.php';
require_once __DIR__ . '/functions/register.php';

if (isset($_POST["register_submit"])){
   $email=$_POST['email'];
   $name=$_POST['name'];
   $password=$_POST['password'];
   $passwordConfirm=$_POST['password_confirm'];

   $errors=validateRegister($_POST);




   if (empty($errors)){
       storeUser($dbh,$email,$name,$password);
       header("Location: login.php");

   }

}

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
        <h2 class="mb-2">Создать аккаунт</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="email-field" class="form-label">Электронная почта</label>
                <input
                    type="text"
                    name="email"
                    value="<?= $email ?? "" ?>"
                    class="form-control <?= isset($errors["email"]) ? "is-invalid" : ""


                    ?>"
                    id="email-field"
                >
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Имя</label>
                <input
                    type="text"
                    name="name"
                    value="<?= $name ?? "" ?>"


                    class="form-control <?= isset($errors["name"]) ? "is-invalid" : ""


                    ?>"
                    id="name"
                >
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control <?= isset($errors["password"]) ? "is-invalid" : ""


                    ?>">
            </div>
            <div class="mb-3">
                <label for="passwordConfirm" class="form-label">Подтверждение пароля</label>
                <input type="password" name="password_confirm" class="form-control" id="passwordConfirm" aria-describedby="passwordHelp">
                <div id="passwordHelp" class="form-text">Это нужно, чтобы вы не ошиблись.</div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <button type="submit" name="register_submit" class="btn btn-secondary">Создать</button>
                <p class="m-0">У меня уже <a href="login.php">есть аккаунт</a></p>
            </div>
        </form>
    </div>
</main>
</body>
</html>