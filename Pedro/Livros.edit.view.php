<?php
$pdo = require 'db.connection.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM livros WHERE id = :id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$Livros = $stmt->fetch();

if (!$Livros) {
    echo "<h2>Livros não encontrado!</h2>";
    echo '<a href="index.php">Voltar para a lista</a>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Livros</title>
</head>
<body>
    <h1>Editar Livros</h1>
    
    <form action="livros.edit.process.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($Livros['id']) ?>">
        
        <div class="form-group">
            <label for="isbn">ISBN:</label>
            <input type="text" id="isbn" name="isbn" value="<?= htmlspecialchars($Livros['isbn']) ?>" required>
        </div>
        
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($Livros['titulo']) ?>" required>
        </div>
        
        <div class="form-group">
            <label for="ano_publicacao">Ano de Publicação:</label>
            <input type="number" id="ano_publicacao" name="ano_publicacao" value="<?= htmlspecialchars($Livros['ano_publicacao']) ?>" required>
        </div>
        
        <button type="submit" class="btn btn-salvar">Atualizar Livros</button>
        <a href="index.php" class="btn">Cancelar e Voltar</a>
    </form>
</body>
</html>
