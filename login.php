<?php
    
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"></head>

    <title>Faça seu login</title>
</head>
<body>
        <!-- cabecalho-->
    <header>
        <a href="index.html">
            <i class="bi bi-trophy"></i> Living <p>Fight</p>
        </a>
        
    </header>
    <!--fim do header-->

    <!--inicio do formulário-->
    <main>
        <form action="php/login.php" method="post">

                    <h2>LOGIN</h2> <br>
                <input type="text" name="nome" id="nome" placeholder="Nome" required> 
                <br><br>
                <input type="password" name="senha" id="senha" placeholder="Senha" required> 
                <br><br>
                <button>Enviar</button> 
                <br><br>
                    <a href="register.html" class="register">Não possui login? <span>Crie sua conta</span><br><br></a> 
                    <a href="#" class="reset_senha">Esqueci a senha</a>
            
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
    <script src="js/login.js"></script>
</body>
</html>