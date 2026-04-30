<?php
require __DIR__ . '/db.connection.php';

$stmt = $pdo->query('SELECT id, titulo, plataforma, preco FROM jogos ORDER BY id DESC');
$jogos = $stmt->fetchAll();
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Jogos - Listagem</title>
</head>
<body>
    <h1>Jogos</h1>
    <p><a href="jogos.create.view.php">Novo jogo</a></p>

    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Plataforma</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($jogos) === 0): ?>
                <tr><td colspan="5">Nenhum jogo cadastrado.</td></tr>
            <?php else: ?>
                <?php foreach ($jogos as $jogo): ?>
                    <tr>
                        <td><?= htmlspecialchars($jogo['id']) ?></td>
                        <td><?= htmlspecialchars($jogo['titulo']) ?></td>
                        <td><?= htmlspecialchars($jogo['plataforma']) ?></td>
                        <td><?= htmlspecialchars(number_format($jogo['preco'], 2, ',', '.')) ?></td>
                        <td>
                            <a href="jogos.edit.view.php?id=<?= htmlspecialchars($jogo['id']) ?>">Editar</a>
                            |
                            <a href="jogos.delete.process.php?id=<?= htmlspecialchars($jogo['id']) ?>"
                               onclick="return confirm('Excluir este jogo?');">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>