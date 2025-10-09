<?php
$db_file = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$db_file");

$sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nome', $_POST['nome']);
$stmt->bindParam(':email', $_POST['email']);
$stmt->bindParam(':senha', $_POST['senha']);
$stmt->execute();
//quando estiver ok vai redirecionar para --> header('Location: login.html');