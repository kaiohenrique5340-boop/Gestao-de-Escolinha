<?php

session_start();
//conexao com banco de dados
require_once 'conexao.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $nova_senha = $_POST['nova_senha'];
    $confirma_senha = $_POST['confirma_senha'];


    if (empty($email) || empty($nova_senha) || empty($confirma_senha)) {
        header("Location: esqueci_senha.html?erro=campos_vazios");
        exit();
    }

    if ($nova_senha !== $confirma_senha) {
        header("Location: esqueci_senha.html?erro=senhas_nao_coincidem");
        exit();
    }


    $sql = "SELECT id FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        header("Location: esqueci_senha.html?erro=email_nao_encontrado");
        exit();
    }


    $hash_nova_senha = password_hash($nova_senha, PASSWORD_DEFAULT);


    try {
        $updateSql = "UPDATE usuarios SET senha = :nova_senha WHERE email = :email";
        $updateStmt = $pdo->prepare($updateSql);
        $updateStmt->bindValue(':nova_senha', $hash_nova_senha);
        $updateStmt->bindValue(':email', $email);
        $updateStmt->execute();

        header("Location: login.html?status=senha_redefinida");
        exit();

    } catch (PDOException $e) {

        header("Location: esqueci_senha.html?erro=falha_db");
        exit();
    }

} else {

    header("Location: /");
    exit();
}
?>