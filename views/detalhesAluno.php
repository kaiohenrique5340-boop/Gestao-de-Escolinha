<?php
session_start(); 
include '../conexao.php'; //

//---------- Verificação de Segurança e Captura do ID ----------
if (!isset($_SESSION['usuario_nome'])) {
    die("Acesso negado. Faça login como administrador.");
}

if (!isset($_GET['id'])) {
    die("Erro: Nenhum ID de aluno fornecido.");
}

$aluno_id = (int)$_GET['id'];


//---------- Busca dos Dados do Aluno ----------
try {
    // Prepara a consulta SQL
    // e que os campos do formulário 'inscricao.php' estão nesta tabela
    $sql = "SELECT nome, email, senha
            FROM usuarios 
            WHERE id = ?"; // (Ajuste o nome da tabela se for diferente)

    // Prepara a consulta usando o objeto $pdo do conexao.php
    $stmt = $pdo->prepare($sql); //
    
    // Executa a consulta, passando o ID de forma segura
    $stmt->execute([$aluno_id]);
    
    // Pega os dados do aluno (usando FETCH_ASSOC)
    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se encontrou o aluno
    if (!$aluno) {
        die("Aluno não encontrado.");
    }

} catch (PDOException $e) {
    die("Erro ao buscar dados do aluno: " . $e->getMessage());
}

//---------- Formatacao dos Dados ----------
$data_nasc_formatada = 'N/A';
if (!empty($aluno['dataNascimento'])) {
    $data_nasc_formatada = date("d/m/Y", strtotime($aluno['dataNascimento']));
}

$sexo_formatado = 'N/A';
if (!empty($aluno['sexo'])) {
    $sexo_formatado = ucfirst($aluno['sexo']);
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Aluno</title>
    <link rel="stylesheet" href="../css/detalhesAluno.css"> 
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="container-detalhes">
        <h2>Detalhes do Aluno</h2>

        <div class="grupo-dados">
            <h3>Dados Pessoais</h3>
            <p><strong>Nome:</strong> <?php echo htmlspecialchars($aluno['nome'] ?? 'N/A'); ?></p>
            <p><strong>Gênero:</strong> <?php echo htmlspecialchars($sexo_formatado); ?></p>
            <p><strong>Data de Nascimento:</strong> <?php echo htmlspecialchars($data_nasc_formatada); ?></p>
            <p><strong>CPF:</strong> <?php echo htmlspecialchars($aluno['cpf'] ?? 'N/A'); ?></p>
        </div>

        <div class="grupo-dados">
            <h3>Dados de Contato e Acesso</h3>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($aluno['email'] ?? 'N/A'); ?></p>
            <p><strong>Telefone:</strong> <?php echo htmlspecialchars($aluno['telefone'] ?? 'N/A'); ?></p>
            <p><strong>Senha:</strong> ********</p>
        </div>

        <div class="grupo-dados">
            <h3>Endereço</h3>
            <p><strong>CEP:</strong> <?php echo htmlspecialchars($aluno['cep'] ?? 'N/A'); ?></p>
            <p><strong>Endereço:</strong> <?php echo htmlspecialchars($aluno['endereco'] ?? 'N/A'); ?>, Nº <?php echo htmlspecialchars($aluno['numero'] ?? 'N/A'); ?></p>
            <p><strong>Complemento:</strong> <?php echo htmlspecialchars($aluno['complemento'] ? $aluno['complemento'] : 'N/A'); ?></p>
            <p><strong>Bairro:</strong> <?php echo htmlspecialchars($aluno['bairro'] ?? 'N/A'); ?></p>
            <p><strong>Cidade:</strong> <?php echo htmlspecialchars($aluno['cidade'] ?? 'N/A'); ?></p>
            <p><strong>Estado:</strong> <?php echo htmlspecialchars($aluno['estado'] ?? 'N/A'); ?></p>
        </div>

        <div class="grupo-botoes">
            
            <a href="paginaEditarAluno.php?id=<?php echo $aluno_id; ?>" 
               class="btn btn-alterar" 
               target="conteudo-principal">
               Alterar
            </a>
            
            <a href="../deleteUser.php?id=<?=  $aluno_id ?>" 
               class="btn btn-excluir" 
               onclick="return confirm('Tem certeza que deseja excluir este aluno? Esta ação não pode ser desfeita.');">
               Excluir
            </a>

        </div>

    </div>

</body>
</html>