<?php
$db_file = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$db_file");

//Verifica se os campos foram preenchidos
if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha'])) {
    header('Location: registro.html?erro=campos_vazios');
}
//Verifica se o email é válido
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header('Location: registro.html?erro=email_invalido');
    exit();
}
$email = $_POST['email'];

//verifica se email e unico
$sqlCheckEmail = "SELECT COUNT(*) FROM usuarios WHERE email = :email";
$stmtCheck = $pdo->prepare($sqlCheckEmail);
$stmtCheck->bindParam(':email', $email);
$stmtCheck->execute();

if ($stmtCheck->fetchColumn() > 0) {
    header('Location: registro.html?erro=email_ja_cadastrado');
    exit();
}



$senhaCript = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$dataAtual = date('Y-m-d');
$dataLogin = null;

$sql = "INSERT INTO usuarios (nome, email, senha, data_criacao, data_ultimo_acesso) VALUES (:nome, :email, :senha, :data_criacao, :data_ultimo_acesso)";
$stmt = $pdo->prepare($sql);

$stmt->bindParam(':nome', $_POST['nome']);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':senha', $senhaCript);
$stmt->bindParam(':data_criacao', $dataAtual);
$stmt->bindParam(':data_ultimo_acesso', $dataLogin);

$stmt->execute();
header('Location: login.html');