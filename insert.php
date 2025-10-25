

<?php
$host = 'localhost';
$dbname = 'banco';
$user = 'root';
$pass = '457880';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
} catch (PDOException $e) {
}

$name = "ADMINISTRADOR";
$senha = "123";
$senha = password_hash($senha, PASSWORD_DEFAULT);//criptografa a senha
$email = "admin";
$data_criacao = '2001-09-11';
$ultimo_login = '2025-10-22 19:00:00'; // Inicializa como null, já que o aluno ainda não fez login



//apenas para inserir dados na tabela usuarios

$sql = "INSERT INTO usuarios (nome, email, senha, data_criacao, ultimo_login) VALUES (:nome, :email, :senha, :data_criacao, :ultimo_login)";
$stmt = $pdo->prepare($sql);

$stmt->bindParam(':nome', $name);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':senha', $senha);
$stmt->bindParam(':data_criacao', $dataAtual);
$stmt->bindParam(':ultimo_login', $dataLogin);

$stmt->execute();