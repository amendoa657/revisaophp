<?php
$pdo = require 'db.connection.php';

$stmt = $pdo->query("SELECT * FROM livros");
$Livros = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Livros</title>
</head>
<body>
    <h1>Catálogo de Livros</h1>
    
    <a href="Livros.create.view.php" class="btn btn-novo">+ Novo Livro</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ISBN</th>
                <th>Título</th>
                <th>Ano Publicação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Livros as $livros): ?>
                <tr>
                    <td><?= htmlspecialchars($livros['id']) ?></td>
                    <td><?= htmlspecialchars($livros['isbn']) ?></td>
                    <td><?= htmlspecialchars($livros['titulo']) ?></td>
                    <td> <?=$livros['ano_publicacao'] ?></td>
                    <td>
                        <a href="Livros.edit.view.php?id=<?= $livros['id'] ?>" class="btn btn-editar">Editar</a>
                        <form action="Livros.delete.process.php" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir este livro?');">
                            <input type="hidden" name="id" value="<?= $livros['id'] ?>">
                            <button type="submit" class="btn btn-excluir">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            
            <?php if (count($Livros) === 0): ?>
                <tr>
                    <td colspan="5" style="text-align: center;">Nenhum livro cadastrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
