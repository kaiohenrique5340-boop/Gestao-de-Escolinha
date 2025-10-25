<?php
session_start();
include 'conexao.php'; // Inclui a conexão PDO

// Verifica se o admin está logado
if (!isset($_SESSION['usuario_nome'])) {
    die("Acesso negado.");
}

// Verifica se o formulário foi enviado (método POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // 1. Coleta todos os dados do formulário
    $id = (int)$_POST['aluno_id'];
    $nome = $_POST['nome'];
    $sexo = $_POST['sexo'];
    $dataNascimento = $_POST['dataNascimento'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    
    
    // Senha (campo especial)
    $nova_senha = $_POST['senha'];

    try {
        // 2. Monta a consulta SQL
        
        // Se a senha FOI preenchida, atualiza a senha
        if (!empty($nova_senha)) {
            // Criptografa a nova senha
            $senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
            
            $sql = "UPDATE usuarios SET 
                        nome = ?, sexo = ?, data_nascimento = ?, cpf = ?, email = ?, 
                        telefone = ?, cep = ?, endereco = ?, numero = ?, complemento = ?, 
                        bairro = ?, senha = ? 
                    WHERE id = ?";
            
            $params = [
                $nome, $sexo, $dataNascimento, $cpf, $email, $telefone, 
                $cep, $endereco, $numero, $complemento, $bairro,
                $senha_hash, // Inclui a nova senha
                $id
            ];

        } else {
            // Se a senha ESTÁ VAZIA, não atualiza a senha
            $sql = "UPDATE usuarios SET 
                        nome = ?, sexo = ?, data_nascimento = ?, cpf = ?, email = ?, 
                        telefone = ?, cep = ?, endereco = ?, numero = ?, complemento = ?, 
                        bairro = ?
                    WHERE id = ?";
            
            $params = [
                $nome, $sexo, $dataNascimento, $cpf, $email, $telefone, 
                $cep, $endereco, $numero, $complemento, $bairro,
                $id // Não inclui a senha
            ];
        }

        // 3. Prepara e executa a consulta
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        // 4. Redireciona de volta para a página de detalhes
        // (Adicionamos ?status=sucesso para podermos mostrar uma mensagem)
        header("Location: detalhesAluno.php?id=" . $id . "&status=sucesso");
        exit;

    } catch (PDOException $e) {
        // Em caso de erro, exibe a mensagem
        die("Erro ao atualizar aluno: ".$e->getMessage());
        // (Em um sistema real, seria melhor redirecionar para uma página de erro)
    }

} else {
    // Se alguém tentar acessar este arquivo diretamente (sem POST)
    die("Método inválido.");
}
?>