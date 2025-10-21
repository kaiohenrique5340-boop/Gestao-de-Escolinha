<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/public/imagens/—Pngtree—inspiration-boxing-logo-professional-boxer_5195569.ico" type="image/x-icon">
    <title>Layout de Site</title>
    <link rel="stylesheet" href="css/painelAdministrador.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header class="header">
            
            <div class="logo-container">
                <i id="logo" class="bi bi-trophy"></i> Living <p>Fight</p>
            </div>

            <div class="usuario">
                <button id="usuario-btn"><?=$_SESSION['usuario_nome']?><i class="bi bi-person-circle"></i></button>
                <div id="submenu-usuario" class="submenu">
                <a href="login.php"><i class="bi bi-box-arrow-left"></i> Sair</a>
                </div>
            </div>

        </header>

        <aside class="sidebar">
            <nav class="menu">
                <a href="paginaListarAlunos.php" target="conteudo-principal" class="menu-item">ALUNOS</a>
                <a href="#turmas" class="menu-item">TURMAS</a>
                <a href="#financeiro" class="menu-item">FINANCEIRO</a>
            </nav>
        </aside>

        <main class="main">
            <iframe name="conteudo-principal" src="about:blank" style="width:100%; height:100%; border:none;"></iframe>
        </main>
    </div>

    <script src="js/painelAdministrador.js"></script>

</body>
</html>