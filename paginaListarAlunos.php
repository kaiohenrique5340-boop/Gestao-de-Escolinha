<?php
// Bloco de código para buscar os dados no banco de dados
try {
    $db_file = __DIR__ . '/banco.sqlite';
    $pdo = new PDO("sqlite:$db_file");
    $sql = 'SELECT nome, email FROM usuarios ORDER BY nome';
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
    
    
    <style>
        body {
            background-color: transparent; /* Garante que o fundo do iframe seja o mesmo do painel */
            padding: 1rem; /* Adiciona um respiro */
        }
        .tabela-alunos {
            width: 100%;
            border-collapse: collapse;
        }
        .tabela-alunos th,
        .tabela-alunos td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        .tabela-alunos th {
            background-color: #f2f2f2;
        }
        .tabela-alunos tbody tr:hover {
            background-color: #e6e6e6;
        }
    </style>
</head>
<body>
    <h1>Lista de Alunos</h1>
    <table class="tabela-alunos">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>ID</th>
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
                        <td><?php echo htmlspecialchars($aluno['nome']); ?></td>
                        <td><?php echo htmlspecialchars($aluno['email']); ?></td>
                        <td><?php echo htmlspecialchars($aluno['senha']); ?></td>
                        <td><?php echo htmlspecialchars($aluno['datadata_criacao']); ?></td>
                        <td><?php echo htmlspecialchars($aluno['data_ultimo_acesso']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2">Nenhum aluno encontrado no banco de dados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>