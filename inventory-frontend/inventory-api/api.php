<?php
header('Content-Type: application/json');

// Localhost header - header('Access-Control-Allow-Origin: *'); // Allow CORS for React localhost

// Production header - 
header('Access-Control-Allow-Origin: http://www.techsport.app'); // Allow CORS for React localhost

header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

include 'db.php';

$data = json_decode(file_get_contents('php://input'), true);
$action = $_GET['action'] ?? $data['action'] ?? '';

switch ($action) {
    case 'create':
        $stmt = $pdo->prepare("INSERT INTO items (name, location, quantity, barcode_number, price) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$data['name'], $data['location'], $data['quantity'], $data['barcode_number'], $data['price']]);
        echo json_encode(['id' => $pdo->lastInsertId()]);
        break;

    case 'read':
        $stmt = $pdo->query("SELECT * FROM items");
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        break;

    case 'update':
        $stmt = $pdo->prepare("UPDATE items SET name=?, location=?, quantity=?, barcode_number=?, price=? WHERE id=?");
        $stmt->execute([$data['name'], $data['location'], $data['quantity'], $data['barcode_number'], $data['price'], $data['id']]);
        echo json_encode(['success' => true]);
        break;

    case 'delete':
        $stmt = $pdo->prepare("DELETE FROM items WHERE id=?");
        $stmt->execute([$data['id']]);
        echo json_encode(['success' => true]);
        break;

    default:
        echo json_encode(['error' => 'Invalid action']);
}
?>