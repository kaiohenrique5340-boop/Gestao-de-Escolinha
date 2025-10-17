<?php

session_start();


try {
    $db_file = __DIR__ . '/banco.sqlite';
    $pdo = new PDO("sqlite:$db_file");
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

        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_email'] = $usuario['email'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        

        header("Location: painelAdministrador.html");
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