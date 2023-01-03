<?php

$host = 'localhost';
$dbname = 'banque';
$user = 'root';
$mdp = '';
$char = 'utf8';

try {
    $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';char=' . $char, $user, $mdp);
} catch (PDOException $e) {
    echo "ERROR :" . $e->getMessage();
    die;
}
