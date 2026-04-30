<?php
$pdo = require 'db.connection.php';

$id = $_POST['id'] ?? $_GET['id'] ?? '';

if (!empty($id)) {
    $stmt = $pdo->prepare("DELETE FROM livros WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

header('Location: index.php');
exit;
?>
