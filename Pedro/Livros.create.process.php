<?php
$pdo = require 'db.connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isbn = $_POST['isbn'] ?? '';
    $titulo = $_POST['titulo'] ?? '';
    $ano_publicacao = $_POST['ano_publicacao'] ?? '';

    if (!empty($isbn) && !empty($titulo) && !empty($ano_publicacao)) {
        
        $sql = "INSERT INTO livros (isbn, titulo, ano_publicacao) VALUES (:isbn, :titulo, :ano_publicacao)";
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindValue(':isbn', $isbn);
        $stmt->bindValue(':titulo', $titulo);
        $stmt->bindValue(':ano_publicacao', $ano_publicacao);
        
        $stmt->execute();
    }
    
    header('Location: index.php');
    exit;
}
?>
