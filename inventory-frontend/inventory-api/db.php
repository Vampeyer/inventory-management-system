<?php
$host = 'localhost';
$db = 'u418580423_inventory_db';
$user = 'u418580423_root';
$pass = '0Idontknow0)'; // 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>