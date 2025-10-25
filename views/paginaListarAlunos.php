<?php
//conexao com banco de dados
require_once '../conexao.php';


// Bloco de código para buscar os dados no banco de dados
try {
    // Seleciona também as colunas de data para evitar "Undefined array key"
    $sql = 'SELECT nome, id, email, senha, data_criacao, ultimo_login FROM usuarios ORDER BY nome';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Se der erro na conexão ou consulta, a página exibirá uma mensagem de erro clara.
    die("Erro ao carregar os dados dos alunos: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="../css/pagina-listar-alunos.css">
    
</head>
<body>
    <h1>Lista de Alunos</h1>
    <table class="tabela-alunos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Senha</th>
                <th>Data de Criação</th>
                <th>Último Acesso</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($alunos) > 0): ?>
                <?php foreach ($alunos as $aluno): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($aluno['id']); ?></td>
                        <td><a href="detalhesAluno.php?id=<?php echo htmlspecialchars($aluno['id']); ?>" target="conteudo-principal"><?php echo htmlspecialchars($aluno['nome']); ?></a></td>
                        <td><?php echo htmlspecialchars($aluno['email']); ?></td>
                        <td><?php echo htmlspecialchars($aluno['senha']); ?></td>
                        <td><?php echo htmlspecialchars($aluno['data_criacao'] ?? 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($aluno['ultimo_login'] ?? 'N/A'); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Nenhum aluno encontrado no banco de dados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>