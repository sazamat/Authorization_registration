<?php

function validateRegister(array $data):array{
    $errors=[];


    if (!filter_var($data["email"],FILTER_VALIDATE_EMAIL)){
        $errors["email"]=true;

    }
    if (empty($data["name"])) {
        $errors["name"]=true;
    }
    if (empty($data["password"]) || empty($data["password_confirm"])) {
        $errors["password"]=true;

    }

    return $errors;


}

function storeUser(object $dbh,string $email,string $name,string $password): void {
    $sql = "INSERT INTO `users` (`email`,`name`,`password`) VALUES (:email, :name , :password);";

    $params=[
        "name"=> $name,
        "email"=> $email,
        "password"=> password_hash($password,PASSWORD_DEFAULT),

    ];
    $dbh->prepare($sql)->execute($params);

}