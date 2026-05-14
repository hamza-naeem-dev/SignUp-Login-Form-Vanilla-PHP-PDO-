<?php

$host = '127.0.0.1';
$dbusername = 'root';
$dbpass = 'root';
$dbname = 'firstdatabase';
$port = 10017;

//Connecting to Server

try{
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname";

    $pdo = new PDO($dsn, $dbusername, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("Connection Failed: " . $e->getMessage());
}

