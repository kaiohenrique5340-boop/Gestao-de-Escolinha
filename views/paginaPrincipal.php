<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="css/index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Living - Escolinha de boxe</title>
    <link rel="shortcut icon" href="../img/public/imagens/—Pngtree—inspiration-boxing-logo-professional-boxer_5195569.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <header>
        <a href="/" class="logo">
            <i class="bi bi-trophy"></i> Living <p>Fight</p>
        </a>
        
        <nav>
            <ul class="nav-list">
                
                <li><a href="/">Início</a></li>
                <li><a href="/views/horarios.php">Horários</a></li>
                <li><a href="/views/contato.php">Contato</a></li>
                <li><a href="/views/login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="apresentacao" class="hero">
            <h1>TREINE COMO UM<br><strong>CAMPEÃO</strong></h1>
            <P>Desenvolva sua técnica, força e disciplina em nossa academia <br>
            de box. Aulas para todos os níveis com instrutores experientes.</P>
        
            <div id="botoes" class="hero-button">
                <a href="/views/inscricao.php">
                    <i class="bi bi-people"></i> Fazer Inscrição
                </a>
            </div>
        </section>
        
        <section id="motivo-escolha" class="reasons-section">
            
            <h2>Por que escolher nossa escolinha? <i class="bi bi-arrow-down-circle"></i></h2>

            <div class="cards-container">
                <article class="card">
                    <i class="bi bi-trophy"></i> 
                    <h3>Instrutor Experiente</h3>
                    <p>Professor com anos de experiência em competições e ensino de boxe.</p>
                </article>
                <article class="card">
                    <i class="bi bi-people"></i> 
                    <h3>Turmas Pequenas</h3>
                    <p>Máximo 8 alunos por turma para atenção personalizada.</p>
                </article>
                <article class="card">
                    <i class="bi bi-star"></i> 
                    <h3>Equipamentos Profissionais</h3>
                    <p>Sacos de pancada, luvas e equipamentos de proteção de alta qualidade.</p>
                </article>
            </div>
        </section>
    </main>


    <footer>
        <div>
            Todos os direitos reservados ©LivingFight, 2025
        </div>
    </footer>

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

</body>
</html>