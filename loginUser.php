<?php

session_start();
//conexao com banco de dados
require 'conexao.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

  
    if (empty($email) || empty($senha)) {
        header("Location: login.html?erro=campos_vazios");
        exit();
    }

   
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

 
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        


        if ($usuario['2fa'] == 1) {
            $_SESSION['2fa_usuario_id'] = $usuario['id'];
            header("location: ../views/2fa.php");
            exit();
        } else {
            date_default_timezone_set('America/Sao_Paulo');
            $dataLogin = date('Y-m-d H:i:s');

            $updateSql = "UPDATE usuarios SET ultimo_login = :ultimo_login WHERE id = :id";
            $updateStmt = $pdo->prepare($updateSql);
            $updateStmt->bindValue(':ultimo_login', $dataLogin);
            $updateStmt->bindValue(':id', $usuario['id']);
            $updateStmt->execute();



            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['admin'] = $usuario['admin'];

        

            header("Location: ../views/painelAdministrador.php");
        exit();
        }
        

    } else {

        header("Location: ../views/login.php?erro=1");
        exit();
    }

} else {

    header("Location: login.php");
    exit();
}
?>