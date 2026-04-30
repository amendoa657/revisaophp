<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Novo Livro</title>
</head>
<body>
    <h1>Cadastrar Novo Livro</h1>
    
    <form action="Livros.create.process.php" method="POST">
        <div class="form-group">
            <label for="isbn">ISBN:</label>
            <input type="text" id="isbn" name="isbn" required>
        </div>
        
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required>
        </div>
        
        <div class="form-group">
            <label for="ano_publicacao">Ano de Publicação:</label>
            <input type="number" id="ano_publicacao" name="ano_publicacao" required>
        </div>
        
        <button type="submit" class="btn btn-salvar">Salvar Livros</button>
        <a href="index.php" class="btn">Cancelar e Voltar</a>
    </form>
</body>
</html>
