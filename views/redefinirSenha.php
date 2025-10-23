<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/esqueci_senha.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Redefinir Senha</title>
</head>
<body>
    <header>
        <a href="/">
            <i class="bi bi-trophy"></i> Living <p>Fight</p>
        </a>
    </header>

    <main>
        <form id="form-reset" action="esqueci_senha.php" method="post">
            <h2>REDEFINIR SENHA</h2> <br>
            
            <div id="mensagem"></div>

            <input type="email" name="email" id="email" placeholder="Seu Email de Cadastro" required>
            <br><br>
            <input type="password" name="nova_senha" id="nova_senha" placeholder="Nova Senha" required>
            <br><br>
            <input type="password" name="confirma_senha" id="confirma_senha" placeholder="Confirme a Nova Senha" required>
            <br><br>
            <button type="submit">Redefinir</button>
            <br><br>
            <a href="login.php" class="register">Lembrou a senha? <span>Faça o login</span></a>
        </form>
    </main>

    <script>
    </script>
</body>
</html>