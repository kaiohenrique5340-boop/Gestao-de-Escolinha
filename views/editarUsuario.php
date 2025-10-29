<?php
session_start(); 
include '../conexao.php'; // Inclui a conexão PDO
if ($_SESSION['admin'] != 1) {
    die("Acesso negado. Você não é um administrador.");
}

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
    // Vamos buscar TODOS os campos que podem ser editados
    $sql = "SELECT id, nome, sexo, data_nascimento, cpf, email, telefone, 
                   cep, endereco, numero, complemento, bairro
            FROM usuarios 
            WHERE id = ?"; 

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$aluno_id]);
    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$aluno) {
        die("Aluno não encontrado.");
    }

} catch (PDOException $e) {
    die("Erro ao buscar dados do aluno: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="../css/editarUsuario.css"> 
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="container-detalhes">
        <h2>Editar Aluno</h2>
        
        <form id="form-editar" action="../atualizarUsuario.php" method="POST">
        
            <input type="hidden" name="aluno_id" value="<?php echo $aluno_id; ?>">

            <div class="grupo-dados">
                <h3>Dados Pessoais</h3>
                
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($aluno['nome'] ?? ''); ?>" required>
                
                <p class="legend-style">Gênero:</p>
                <div class="gender-options">
                    <label>
                        <input type="radio" name="sexo" value="masculino" <?php if($aluno['sexo'] == 'masculino') echo 'checked'; ?>> Masculino
                    </label>
                    <label>
                        <input type="radio" name="sexo" value="feminino" <?php if($aluno['sexo'] == 'feminino') echo 'checked'; ?>> Feminino
                    </label>
                    <label>
                        <input type="radio" name="sexo" value="nao informado" <?php if($aluno['sexo'] == 'nao informado' || empty($aluno['sexo'])) echo 'checked'; ?>> Prefiro não dizer
                    </label>
                </div>
                
                <label for="dataNascimento">Data de Nascimento:</label>
                <input type="date" id="dataNascimento" name="dataNascimento" value="<?php echo htmlspecialchars($aluno['data_nascimento'] ?? ''); ?>" required>
                
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" value="<?php echo htmlspecialchars($aluno['cpf'] ?? ''); ?>" required>
            </div>

            <div class="grupo-dados">
                <h3>Dados de Contato e Acesso</h3>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($aluno['email'] ?? ''); ?>" required>
                
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" value="<?php echo htmlspecialchars($aluno['telefone'] ?? ''); ?>" required>

                <label for="senha">Nova Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Deixe em branco para não alterar">
                <small>Preencha apenas se desejar alterar a senha atual.</small>

                <label for="2fa">Deseja habilitar 2FA:</label>
                <select id="2fa" name="2fa">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>

            <div class="grupo-dados">
                <h3>Endereço</h3>
                
                <label for="cep">CEP:</label>
                <input type="text" id="cep" name="cep" value="<?php echo htmlspecialchars($aluno['cep'] ?? ''); ?>" required>
                
                <label for="endereco">Endereço:</label>
                <input type="text" id="endereco" name="endereco" value="<?php echo htmlspecialchars($aluno['endereco'] ?? ''); ?>" required>
                
                <label for="numero">Número:</label>
                <input type="text" id="numero" name="numero" value="<?php echo htmlspecialchars($aluno['numero'] ?? ''); ?>" required>
                
                <label for="complemento">Complemento:</label>
                <input type="text" id="complemento" name="complemento" value="<?php echo htmlspecialchars($aluno['complemento'] ?? ''); ?>">
                
                <label for="bairro">Bairro:</label>
                <input type="text" id="bairro" name="bairro" value="<?php echo htmlspecialchars($aluno['bairro'] ?? ''); ?>" required>
            </div>

            <div class="grupo-botoes">
                <button type="submit" class="btn btn-salvar">Salvar Alterações</button>
                
                <a href="detalhesAluno.php?id=<?php echo $aluno_id; ?>" 
                   class="btn btn-cancelar" 
                   target="conteudo-principal">
                   Cancelar
                </a>
            </div>
        </form>
    </div>

</body>
</html>