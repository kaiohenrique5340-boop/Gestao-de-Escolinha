<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/esqueci_senha.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="../img/—Pngtree—inspiration-boxing-logo-professional-boxer_5195569.ico" type="image/x-icon">
    <title>ALTERAR SENHA</title>
</head>
<body>

    <header>
        <a href="/">
            <i class="bi bi-trophy"></i> Living <p>Fight</p>
        </a>
    </header>


    <main>
        <form id="form" action="../resetPassword.php" method="POST">
            <h2 class="full-width">ALTERAR SENHA</h2>
            
            <div class="input-control full-width">
                <label for="email">E-mail</label>
                <input id="email" name="email" type="text" placeholder="nome@exemplo.com">
                <div class="error"></div>
            </div>

            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" required autocomplete="bday">
                <div id="msgErro" class="error-message"></div>
            </div>
            <div class="form-group">
                <label for="cpf">Digite seu CPF:</label>
                <input type="text" id="cpf" name="cpf" maxlength="14" placeholder="000.000.000-00" required autocomplete="off">
                <p id="mensagem" class="error-message"></p>
            </div>

            <div class="input-control">
                <label for="senha">Nova Senha</label>
                <input id="senha" name="senha" type="password">
                <div class="error"></div>
            </div>

            <div class="input-control">
                <label for="senha2">Confirmar senha</label>
                <input id="senha2" name="senha2" type="password">
                <div class="error"></div>
            </div>

            <div class="bnt full-width">
                <button type="submit">Enviar</button>
            <div class="link-login full-width">
                <a href="login.php" class="login">Lembrou? <span>Entrar</span></a>
            </div>
        </form>
    </main>

    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
        <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script> new window.VLibras.Widget('https://vlibras.gov.br/app');</script>
</body>
</html>