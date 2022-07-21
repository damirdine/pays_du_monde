<?php

$DB_HOST = 'nuepp3ddzwtnggom.chr7pe7iynqr.eu-west-1.rds.amazonaws.com';
$DB_NAME = 'amw22ymy1bfphedp';
$DB_USER = 'tvcrlbttfs9fojc1';
$DB_PASSWORD = "zxnzupbjjgz58f1m";

try{
    $db = new PDO($_ENV['JAWSDB_URL']);
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}
