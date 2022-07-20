<?php

$DB_HOST = 'localhost';
$DB_NAME = 'pays';
$DB_USER = 'root';
$DB_PASSWORD = "";

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
