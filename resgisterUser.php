<?php
//conexao com banco de dados
require_once 'conexao.php';


//Verifica se os campos foram preenchidos
if (empty($_POST['nome']) || empty($_POST['sexo']) || empty($_POST['data_nascimento']) || empty($_POST['cpf']) || empty($_POST['email']) || empty($_POST['telefone']) || empty($_POST['senha']) || empty($_POST['cep']) || empty($_POST['endereco']) || empty($_POST['numero']) || empty($_POST['bairro'])) {
    header('Location: views/inscricao.php?erro=campos_vazios');
    exit();
}

//---------- VERIFICACAO EMAIL ----------
//Verifica se o email é válido
if (!filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)) {
    header('Location: /views/inscricao.php?erro=email_invalido');
    exit();
}
$email = trim(strtolower($_POST['email']));

//verifica se email e unico
$sqlCheckEmail = "SELECT COUNT(*) FROM usuarios WHERE email = :email";
$stmtCheck = $pdo->prepare($sqlCheckEmail);
$stmtCheck->bindParam(':email', $email);
$stmtCheck->execute();

if ($stmtCheck->fetchColumn() > 0) {
    header('Location: views/inscricao.php?erro=email_ja_cadastrado');
    exit();
}
//---------- VERIFICACAO EMAIL ----------


//---------- VERIFICACAO SENHA ----------
//verifica se as senhas conferem
if (($_POST['senha']) != ($_POST['senha2'])) {
    header('Location: views/inscricao.php?erro=senhas_nao_correspondem');
    exit();
}

// Verifica se a senha atende aos critérios: 8-16 caracteres, pelo menos uma letra maiúscula, uma minúscula, um número e um caractere especial
$senha_pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,16}$/';
if (!preg_match($senha_pattern, $_POST['senha'])) {
    // Se a senha não corresponder ao padrão, redireciona com erro
    header('Location: views/inscricao.php?erro=senha_invalida');
    exit();
}
//---------- VERIFICACAO SENHA ----------



$name = trim(strtoupper($_POST['nome']));
$senhaCript = password_hash($_POST['senha'], PASSWORD_DEFAULT);//criptografa a senha
$dataAtual = date('Y-m-d');//recebe a data atual no formato ano-mes-dia
$dataLogin = null; // Inicializa como null, já que o aluno ainda não fez login
$sexo = $_POST['sexo'];
$dataNascimento = $_POST['data_nascimento'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'] ?? ''; //opcional
$bairro = $_POST['bairro'];

$sql = "INSERT INTO usuarios (nome, email, senha, data_criacao, ultimo_login, sexo, data_nascimento, cpf, telefone, cep, endereco, numero, complemento, bairro) 
        VALUES (:nome, :email, :senha, :data_criacao, :ultimo_login, :sexo, :data_nascimento, :cpf, :telefone, :cep, :endereco, :numero, :complemento, :bairro)";
$stmt = $pdo->prepare($sql);

$stmt->bindParam(':nome', $name);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':senha', $senhaCript);
$stmt->bindParam(':data_criacao', $dataAtual);
$stmt->bindParam(':ultimo_login', $dataLogin);
$stmt->bindParam(':sexo', $sexo);
$stmt->bindParam(':data_nascimento', $dataNascimento);
$stmt->bindParam(':cpf', $cpf);
$stmt->bindParam(':telefone', $telefone);
$stmt->bindParam(':cep', $cep);
$stmt->bindParam(':endereco', $endereco);
$stmt->bindParam(':numero', $numero);
$stmt->bindParam(':complemento', $complemento);
$stmt->bindParam(':bairro', $bairro);

$stmt->execute();
header('Location: views/login.php?sucesso=1');
exit();

?>