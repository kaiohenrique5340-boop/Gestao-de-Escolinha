<?php
$host = 'localhost';
$dbname = 'banco';
$user = 'root';
$pass = '457880';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    // Configura o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}