<?php

$DB_HOST = 'nuepp3ddzwtnggom.chr7pe7iynqr.eu-west-1.rds.amazonaws.com';
$DB_NAME = 'amw22ymy1bfphedp';
$DB_USER = 'tvcrlbttfs9fojc1';
$DB_PASSWORD = "zxnzupbjjgz58f1m";

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
