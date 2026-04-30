<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Novo Jogo</title>
</head>
<body>
    <h1>Novo Jogo</h1>
    <form method="post" action="jogos.create.process.php">
        <div>
            <label>Título:</label>
            <input type="text" name="titulo" required>
        </div>
        <div>
            <label>Plataforma:</label>
            <input type="text" name="plataforma" required>
        </div>
        <div>
            <label>Preço:</label>
            <input type="text" name="preco" required>
        </div>
        <button type="submit">Salvar</button>
    </form>
    <p><a href="index.php">Voltar</a></p>
</body>
</html>