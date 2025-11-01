<?php
session_start();
require 'conexao.php';
//verifica se os campos foi enviado via post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // coleta os dados do formulario
    if(!isset($_POST['usuario_id'], $_POST['resposta'], $_POST['index_perguntas'])) {
        header("Location: ../views/login.php?erro=campos_vazios");
        exit();
    }

    $usuario_id = $_POST['usuario_id'];
    $index_perguntas = $_POST['index_perguntas'];
    $resposta_usuario = trim($_POST['resposta']);
    // busca os dados do usuario no banco de dados
    $sql = "SELECT * FROM usuarios WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $usuario_id);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // se nao achou o usuario, algo aconteceu redireciona para o login
    if (!$usuario) {
        header("Location: ../views/login.php?erro=usuario_nao_encontrado");
        exit();
    }

    // verifica a resposta correta com base na pergunta selecionada
    $resposta_correta = null;
    $data_nasc = new DateTime($usuario['data_nascimento']);

    switch ($index_perguntas) {
        case 1:
            $resposta_correta = $data_nasc->format('d');
            break;
        case 2:
            $resposta_correta = $data_nasc->format('m');
            break;
        case 3:
            $resposta_correta = $data_nasc->format('Y');
            break;
        default:
            header("Location: ../views/login.php?erro=pergunta_invalida");
            exit();
    }
    // para comparar se a resposta do ususario esta correta, removemos zeros a esquerda e espaços com ltrim e trim
    $resposta_usuario_tratada = ltrim(trim($resposta_usuario), '0');
    $resposta_correta_tratada = ltrim(trim($resposta_correta), '0');

    if ($resposta_usuario_tratada == $resposta_correta_tratada) {
        // Resposta correta, autentica o usuario
        date_default_timezone_set('America/Sao_Paulo');
        $dataLogin = date('Y-m-d H:i:s');

        $updateSql = "UPDATE usuarios SET ultimo_login = :ultimo_login WHERE id = :id";
        $updateStmt = $pdo->prepare($updateSql);
        $updateStmt->bindValue(':ultimo_login', $dataLogin);
        $updateStmt->bindValue(':id', $usuario['id']);
        $updateStmt->execute();
        
        //cria sesao do usuario
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        $_SESSION['admin'] = $usuario['admin'];

        header("Location: ../views/painelAdministrador.php");
        exit();
    } else {
        // Resposta incorreta, redireciona para o login com erro
        header("Location: ../views/login.php?erro=2fa_incorreta");
        exit();
    }
}