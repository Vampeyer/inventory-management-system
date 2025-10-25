<?php
$host = 'localhost';
$db = 'u418580423_scm_system';
$user = 'u418580423_rootie';
$pass = '0Idontknow0$%$%'; // 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>