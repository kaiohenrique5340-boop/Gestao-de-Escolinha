<?php

session_start();
//conexao com banco de dados
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: Views/redefinirSenha.php');
    exit();
}
if (!isset($_POST['email'], $_POST['data_nascimento'], $_POST['cpf'], $_POST['senha'], $_POST['senha2'])) {
    header('Location: Views/redefinirSenha.php');
    exit();
}

if ($_POST['senha'] !== $_POST['senha2']) {
    header('Location: Views/redefinirSenha.php?erro=senhas_nao_conferem');
    exit();
}


$email = trim($_POST['email']);
$cpf = trim($_POST['cpf']);
$nova_senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

//converte a data inserida para objeto no formato Y-m-d
$data_nascimento_obj = DateTime::createFromFormat('Y-m-d', $_POST['data_nascimento']);
//formata a data para o formato Y-m-d ou define como false se a conversão falhar
$data_nascimento =  ($data_nascimento_obj) ? $data_nascimento_obj->format('Y-m-d') : false;




$sql = "SELECT * FROM usuarios WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $email);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario && $data_nascimento && $usuario['data_nascimento'] === $data_nascimento && $usuario['cpf'] === $cpf) {
    $updateSql = "UPDATE usuarios SET senha = :senha WHERE email = :email";
    $updateStmt = $pdo->prepare($updateSql);
    $updateStmt->bindValue(':senha', $nova_senha);
    $updateStmt->bindValue(':email', $email);
    $updateStmt->execute();


    header('Location: Views/login.php?sucesso=senha_alterada');
    exit();
} else {
    header('Location: Views/redefinirSenha.php?erro=informacoes_incorretas');
    exit();
}
    

?>  