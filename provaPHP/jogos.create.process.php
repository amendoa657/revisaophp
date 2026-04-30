<?php
require __DIR__ . '/db.connection.php';

$titulo = trim($_POST['titulo'] ?? '');
$plataforma = trim($_POST['plataforma'] ?? '');
$precoRaw = trim($_POST['preco'] ?? '');

if ($titulo === '' || $plataforma === '' || $precoRaw === '') {
    die('Preencha todos os campos.');
}

$preco = str_replace(',', '.', $precoRaw);

$stmt = $pdo->prepare('INSERT INTO jogos (titulo, plataforma, preco) VALUES (:titulo, :plataforma, :preco)');
$stmt->execute([
    ':titulo' => $titulo,
    ':plataforma' => $plataforma,
    ':preco' => $preco,
]);

header('Location: index.php');
exit;