<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registerv1.css">
    <link rel="stylesheet" href="../css/registerv2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="../img/—Pngtree—inspiration-boxing-logo-professional-boxer_5195569.ico" type="image/x-icon">
    <title>Formulário de Cadastro</title>
</head>
<body>

    <header>
        <a href="/">
            <i class="bi bi-trophy"></i> Living <p>Fight</p>
        </a>
    </header>
    <main>
        <form id="form" action="../resgisterUser.php" method="POST">
            <h2 class="full-width">FORMULÁRIO DE CADASTRO</h2>
            
            <div class="input-control">
                <label for="username">Nome de usuário</label>
                <input id="username" name="username" type="text">
                <div class="error"></div>
            </div>

            <div class="form-group full-width">
                <p class="legend-style">Gênero:</p>
                <div class="gender-options">
                    <label><input type="radio" name="sexo" value="masculino"> Masculino</label>
                    <label><input type="radio" name="sexo" value="feminino"> Feminino</label>
                    <label><input type="radio" name="sexo" value="nao informado"> Prefiro não dizer</label>
                </div>
            </div>

            <div class="form-group">
                <label for="dataNascimento">Data de Nascimento:</label>
                <input type="date" id="dataNascimento" name="dataNascimento" required autocomplete="bday">
                <div id="msgErro" class="error-message"></div>
            </div>
            <div class="form-group">
                <label for="cpf">Digite seu CPF:</label>
                <input type="text" id="cpf" name="cpf" maxlength="14" placeholder="000.000.000-00" required autocomplete="off">
                <p id="mensagem" class="error-message"></p>
            </div>

            <div class="input-control">
                <label for="email">E-mail</label>
                <input id="email" name="email" type="text">
                <div class="error"></div>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" required autocomplete="tel">
            </div>

            <div class="input-control">
                <label for="password">Senha</label>
                <input id="password" name="password" type="password">
                <div class="error"></div>
            </div>

            <div class="input-control">
                <label for="password2">Repita a senha</label>
                <input id="password2" name="password2" type="password">
                <div class="error"></div>
            </div>

            <div class="form-group">
                <label for="cep">CEP:</label>
                <input type="text" id="cep" name="cep" required autocomplete="postal-code">
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" id="endereco" name="endereco" required autocomplete="street-address">
            </div>

            <div class="form-group">
                <label for="numero">Número:</label>
                <input type="text" id="numero" name="numero" required autocomplete="address-line2">
            </div>
            <div class="form-group">
                <label for="complemento">Complemento:</label>
                <input type="text" id="complemento" name="complemento" autocomplete="address-line3" placeholder="(Campo Opcional)">
            </div>
            
            <div class="form-group full-width">
                <label for="bairro">Bairro:</label>
                <input type="text" id="bairro" name="bairro"  required autocomplete="address-level2">
            </div>
            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade" required autocomplete="address-level1">
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" required autocomplete="state">
            </div>

            <div class="bnt full-width">
                <button type="submit">Cadastrar</button>
                <button type="reset" id="limpar">Limpar</button>
            </div>
            <div class="link-login full-width">
                <a href="login.php" class="login">Já possui login? <span>Entrar</span></a>
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
    <script>
      new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>

    <script src="../js/jq-viacep-3.7.1.min.js"></script>
    <script src="../js/registerv1.js"></script>
    <script src="../js/registerv2.js"></script>
</body>
</html>