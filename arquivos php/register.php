<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../arquivos-css\register.css">
    <title>Formulário com Validação</title>
</head>
<body>

<h2>Formulário de Cadastro</h2>

<!-- Início do formulário -->
<form id="formulario" action="" method="post" onsubmit="return validarFormulario()">
    
    <!-- Campo de Nome -->
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome" required>
    <br><br>

    <label for="genero">Genero:</label><br>
    <input type="radio">Masculino<br>
    <input type="radio">Feminino<br>
    <input type="radio">Prefiro não dizer<br>
    <br>

    <!-- Campo Data de Nascimento -->
    <label for="data-nascimento">Data de Nascimento:</label><br>
    <input type="date" id="data-nascimento" name="data-nascimento" required>
    <br><br>

     <!-- Campo de Cpf -->
    <label for="cpf">CPF:</label><br>
    <input type="number" id="cpf" name="cpf" required>
    <br><br>

    <!-- Campo de E-mail -->
    <label for="email">E-mail:</label><br>
    <input type="email" id="email" name="email" required>
    <br><br>

    <!-- Campo Telefone contato -->
    <label for="telefone">Telefone:</label><br>
    <input type="number" id="telefone" name="telefone" required>
    <br><br>

    <!-- Campo de Senha -->
    <label for="senha">Senha:</label><br>
    <input type="password" id="senha" name="senha" required oninput="mostrarSenha()">
    <br><br>

    <!-- Campo de Confirmar Senha -->
    <label for="confirmar_senha">Confirmar Senha:</label><br>
    <input type="password" id="confirmar_senha" name="confirmar_senha" required oninput="mostrarSenha()">
    <br>
			<!-- Campo para mensagem de confirmação das senhas -->
    			<div id="mensagem_senha"></div>
    <br>
    <!-- Campo de CEP -->
    <label for="cep">CEP:</label><br>
    <input type="text" id="cep" name="cep" required>
    <br><br>

    <!-- Campo de Endereço -->
    <label for="endereco">Endereço:</label><br>
    <input type="text" id="endereco" name="endereco" required>
    <br><br>


    <!-- Campo de Endereço -->
    <label for="numero">Número:</label><br>
    <input type="text" id="endereco" name="endereco" required>
    <br><br>

    <!-- Campo de Complemento -->
    <label for="complemento">Complemento:</label><br>
    <input type="text" id="compemento" name="complemento" >
    <br><br>

    <!-- Campo de Bairro -->
    <label for="bairro">Bairro:</label><br>
    <input type="text" id="bairro" name="bairro" required>
    <br><br>

    <!-- Campo de Cidade -->
    <label for="cidade">Cidade:</label><br>
    <input type="text" id="cidade" name="cidade" required>
    <br><br>

    <!-- Campo de Estado -->
    <label for="estado">Estado:</label><br>
    <input type="text" id="estado" name="estado" required>
    <br><br>

    <!-- Campo para mensagem de erro de CEP -->
    <div id="mensagem_cep"></div>

    <!-- Botão para enviar o formulário -->
    <button type="submit">Cadastrar</button>

    <!-- Botão para Limpar o formulário -->
    <button type="submit">Limpar</button>
</form>
    </main>

    <!--Vlibras-->
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
</body>
</html>