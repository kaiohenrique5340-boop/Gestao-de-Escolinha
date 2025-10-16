<?php
$db_file = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$db_file");

$name = "ADMINISTRADOR";
$senha = "123";
$email = "admin";
$data_criacao = '2001-09-11';
$data_ultimo_acesso = null; // Inicializa como null, já que o aluno ainda não fez login





$sql = "INSERT INTO usuarios (nome, email, senha, data_criacao, data_ultimo_acesso) VALUES (:nome, :email, :senha, :data_criacao, :data_ultimo_acesso)";
$stmt = $pdo->prepare($sql);

$stmt->bindParam(':nome', $name);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':senha', $senha);
$stmt->bindParam(':data_criacao', $dataAtual);
$stmt->bindParam(':data_ultimo_acesso', $dataLogin);

$stmt->execute();
header('Location: login.html');