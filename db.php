<?php
$DB_HOST = 'nuepp3ddzwtnggom.chr7pe7iynqr.eu-west-1.rds.amazonaws.com';
$DB_NAME = 'heroku_ea42f01145b143e';
$DB_USER = 'b4449a6075ffac';
$DB_PASSWORD = "f5b7595d42919a2";

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
?>
