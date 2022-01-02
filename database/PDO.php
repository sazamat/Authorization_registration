<?php
try {
    $dbh=new PDO('mysql:host=localhost;dbname=auth/reg','root','');
}
catch (\Exception $exception){
    echo 'Ошибка при подключении к БД <br>';
    echo $exception->getMessage();
    die();
}