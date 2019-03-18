<?php

$db = 'blog_db';
$host = 'localhost';
$user = 'root';
$pass = '';


$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
try {
    $connection = new PDO($dsn, $user, $pass, $options);
} catch (Exception $e) {
    error_log($e->getMessage());
    exit('Oh crap, something weird happened');
}