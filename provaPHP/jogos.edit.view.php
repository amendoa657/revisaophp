<?php
require __DIR__ . '/db.connection.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare('SELECT id, titulo, plataforma, preco FROM jogos WHERE id = :id');
$stmt->execute([':id' => $id]);
$jogo = $stmt->fetch();

if (!$jogo) {
    header('Location: index.php');
    exit;
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Editar Jogo</title>
</head>
<body>
    <h1>Editar Jogo</h1>
    <form method="post" action="jogos.edit.process.php">
        <input type="hidden" name="id" value="<?= htmlspecialchars($jogo['id']) ?>">
        <div>
            <label>Título:</label>
            <input type="text" name="titulo" value="<?= htmlspecialchars($jogo['titulo']) ?>" required>
        </div>
        <div>
            <label>Plataforma:</label>
            <input type="text" name="plataforma" value="<?= htmlspecialchars($jogo['plataforma']) ?>" required>
        </div>
        <div>
            <label>Preço:</label>
            <input type="text" name="preco" value="<?= htmlspecialchars($jogo['preco']) ?>" required>
        </div>
        <button type="submit">Atualizar</button>
    </form>
    <p><a href="index.php">Voltar</a></p>
</body>
</html>