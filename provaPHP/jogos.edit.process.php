<?php
require __DIR__ . '/db.connection.php';

$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$titulo = trim($_POST['titulo'] ?? '');
$plataforma = trim($_POST['plataforma'] ?? '');
$precoRaw = trim($_POST['preco'] ?? '');

if ($id <= 0 || $titulo === '' || $plataforma === '' || $precoRaw === '') {
    die('Dados inválidos.');
}

$preco = str_replace(',', '.', $precoRaw);

$stmt = $pdo->prepare('UPDATE jogos SET titulo = :titulo, plataforma = :plataforma, preco = :preco WHERE id = :id');
$stmt->execute([
    ':id' => $id,
    ':titulo' => $titulo,
    ':plataforma' => $plataforma,
    ':preco' => $preco,
]);

header('Location: index.php');
exit;