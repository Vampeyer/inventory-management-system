<?php
// api/items.php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Adjust for production security

// Database credentials (replace with Hostinger's details)
$host = '127.0.0.1';
$dbname = 'inventory';
$username = 'root';
$password = 'your_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT id, name, location, quantity, barcode, price FROM items");
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($items);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>