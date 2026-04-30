<?php
$pdo = require 'db.connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $isbn = $_POST['isbn'] ?? '';
    $titulo = $_POST['titulo'] ?? '';
    $ano_publicacao = $_POST['ano_publicacao'] ?? '';

    if (!empty($id) && !empty($isbn) && !empty($titulo) && !empty($ano_publicacao)) {
        
        $sql = "UPDATE livros SET isbn = :isbn, titulo = :titulo, ano_publicacao = :ano_publicacao WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':isbn', $isbn);
        $stmt->bindValue(':titulo', $titulo);
        $stmt->bindValue(':ano_publicacao', $ano_publicacao);
        
        $stmt->execute();
    }
    
    header('Location: index.php');
    exit;
}
?>
