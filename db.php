<?php

$DB_HOST = 'localhost';
$DB_NAME = 'heroku_ea42f01145b143e';
$DB_USER = 'b4449a6075ffac';
$DB_PASSWORD = "a7c5bffa ";

try{
    $db = new PDO(
        "mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8",
        "$DB_USER",
        "$DB_PASSWORD",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}
