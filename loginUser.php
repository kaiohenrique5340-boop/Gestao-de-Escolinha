<?php

session_start();


try {
    $host = 'localhost';
    $dbname = 'banco';
    $user = 'root';
    $pass = '457880';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    } catch (PDOException $e) {
    }

    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

  
    if (empty($email) || empty($senha)) {
        header("Location: login.html?erro=campos_vazios");
        exit();
    }

   
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

 
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        date_default_timezone_set('America/Sao_Paulo');
        $dataLogin = date('Y-m-d H:i:s');

        $updateSql = "UPDATE usuarios SET data_ultimo_acesso = :data_ultimo_acesso WHERE id = :id";
        $updateStmt = $pdo->prepare($updateSql);
        $updateStmt->bindValue(':data_ultimo_acesso', $dataLogin);
        $updateStmt->bindValue(':id', $usuario['id']);
        $updateStmt->execute();

        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_email'] = $usuario['email'];
        $_SESSION['usuario_nome'] = $usuario['nome'];

        

        header("Location: painelAdministrador.php");
        exit();

    } else {

        header("Location: login.html?erro=1");
        exit();
    }

} else {

    header("Location: login.html");
    exit();
}
?>