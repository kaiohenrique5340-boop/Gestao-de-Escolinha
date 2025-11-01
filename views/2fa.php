<?php
include '../conexao.php'; // Inclui a conexão PDO
session_start();
if (!isset($_SESSION['2fa_usuario_id'])) {
    header("Location: login.php");
    exit();
}
$usuario_id = $_SESSION['2fa_usuario_id'];


$perguntas_disponiveis = [
    1 => "Qual seu dia de nascimento?",
    2 => "Qual seu mes de nascimento?",
    3 => "Qual seu ano de nascimento?",
];
$index_perguntas = array_rand($perguntas_disponiveis);






?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/2fa.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/esqueci_senha.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="../img/—Pngtree—inspiration-boxing-logo-professional-boxer_5195569.ico" type="image/x-icon">
    <title>Autenticacao</title>
</head>
<body>
    <header>
        <a href="/">
            <i class="bi bi-trophy"></i> Living <p>Fight</p>
        </a>
    </header>

    <main>
        <form id="autenticao" action="../virificacao2fa.php" method="post">
            <h2>Autenticacao de fator duplo</h2> <br>
            
            <div id="mensagem"></div>
            <p><?php echo($perguntas_disponiveis[$index_perguntas]); ?></p>
            <input type="hidden" name="usuario_id" value="<?php echo htmlspecialchars($usuario_id); ?>">
            <input type="hidden" name="index_perguntas" value="<?php echo htmlspecialchars($index_perguntas); ?>">
            <input type="text" name="resposta" id="resposta" required>
            <br><br>
            <button type="submit">Enviar</button>
            <br><br>
            <a href="login.php" class="register">Lembrou a senha? <span>Faça o login</span></a>
        </form>
    </main>

    <script></script>
</body>
</html>