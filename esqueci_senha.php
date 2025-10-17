<?php
// Inicia a sessão (boa prática)
session_start();

// 1. Conexão com o Banco de Dados (mesmo código do seu login.php)
try {
    $db_file = __DIR__ . '/banco.sqlite';
    $pdo = new PDO("sqlite:$db_file");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}

// 2. Verifica se o método é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 3. Coleta e sanitiza os dados do formulário
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $nova_senha = $_POST['nova_senha'];
    $confirma_senha = $_POST['confirma_senha'];

    // 4. Validação no lado do servidor (essencial para segurança)
    if (empty($email) || empty($nova_senha) || empty($confirma_senha)) {
        header("Location: esqueci_senha.html?erro=campos_vazios");
        exit();
    }

    if ($nova_senha !== $confirma_senha) {
        header("Location: esqueci_senha.html?erro=senhas_nao_coincidem");
        exit();
    }

    // 5. Verifica se o e-mail existe no banco de dados
    $sql = "SELECT id FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        // Se o e-mail não for encontrado, redireciona com um erro
        header("Location: esqueci_senha.html?erro=email_nao_encontrado");
        exit();
    }

    // 6. Se o e-mail existe, faz o hash da nova senha
    $hash_nova_senha = password_hash($nova_senha, PASSWORD_DEFAULT);

    // 7. Atualiza a senha no banco de dados
    try {
        $updateSql = "UPDATE usuarios SET senha = :nova_senha WHERE email = :email";
        $updateStmt = $pdo->prepare($updateSql);
        $updateStmt->bindValue(':nova_senha', $hash_nova_senha);
        $updateStmt->bindValue(':email', $email);
        $updateStmt->execute();

        // 8. Redireciona para a página de login com uma mensagem de sucesso
        header("Location: login.html?status=senha_redefinida");
        exit();

    } catch (PDOException $e) {
        // Em caso de erro na atualização, redireciona com erro
        header("Location: esqueci_senha.html?erro=falha_db");
        exit();
    }

} else {
    // Se não for POST, redireciona para a página inicial
    header("Location: index.html");
    exit();
}
?>