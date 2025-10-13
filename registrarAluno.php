<?php
$db_file = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$db_file");


//Verifica se os campos foram preenchidos
if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha'])) {
    header('Location: registro.html?erro=campos_vazios');
}

//---------- VERIFICACAO EMAIL ----------
//Verifica se o email é válido
if (!filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)) {
    header('Location: registro.html?erro=email_invalido');
    exit();
}
$email = trim(strtolower($_POST['email']));

//verifica se email e unico
$sqlCheckEmail = "SELECT COUNT(*) FROM usuarios WHERE email = :email";
$stmtCheck = $pdo->prepare($sqlCheckEmail);
$stmtCheck->bindParam(':email', $email);
$stmtCheck->execute();

if ($stmtCheck->fetchColumn() > 0) {
    header('Location: registro.html?erro=email_ja_cadastrado');
    exit();
}
//---------- VERIFICACAO EMAIL ----------


//---------- VERIFICACAO SENHA ----------
//verifica se as senhas conferem
if (($_POST['senha']) != ($_POST['confirmarsenha'])) {
    header('Location: registrar.html?erro=senhas_nao_correspondem');
    exit();
}

// Verifica se a senha atende aos critérios: 8-12 caracteres, pelo menos uma letra maiúscula, uma minúscula, um número e um caractere especial
$senha_pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,12}$/';
if (!preg_match($senha_pattern, $_POST['senha'])) {
    // Se a senha não corresponder ao padrão, redireciona com erro
    header('Location: registrar.html?erro=senha_invalida');
    exit();
}
//---------- VERIFICACAO SENHA ----------



$name = trim(strtoupper($_POST['nome']));
$senhaCript = password_hash($_POST['senha'], PASSWORD_DEFAULT);//criptografa a senha
$dataAtual = date('Y-m-d');//recebe a data atual no formato ano-mes-dia
$dataLogin = null; // Inicializa como null, já que o aluno ainda não fez login

$sql = "INSERT INTO usuarios (nome, email, senha, data_criacao, data_ultimo_acesso) VALUES (:nome, :email, :senha, :data_criacao, :data_ultimo_acesso)";
$stmt = $pdo->prepare($sql);

$stmt->bindParam(':nome', $name);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':senha', $senhaCript);
$stmt->bindParam(':data_criacao', $dataAtual);
$stmt->bindParam(':data_ultimo_acesso', $dataLogin);

$stmt->execute();
header('Location: login.html');