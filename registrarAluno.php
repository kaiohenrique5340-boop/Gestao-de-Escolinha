<?php
$db_file = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$db_file");

$senhaCript = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$dataAtual = date('Y-m-d');
$dataLogin = "Nao acessado";

$sql = "INSERT INTO usuarios (nome, email, senha, data_criacao, data_ultimo_acesso) VALUES (:nome, :email, :senha, :data_criacao, :data_ultimo_acesso)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nome', $_POST['nome']);
$stmt->bindParam(':email', $_POST['email']);
$stmt->bindParam(':senha', $senhaCript);
$stmt->bindParam(':data_criacao', $dataAtual);
$stmt->bindParam(':data_ultimo_acesso', $dataLogin);

$stmt->execute();
header('Location: login.html');