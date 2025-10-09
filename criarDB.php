<?php 

$db_file = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$db_file");
$pdo->exec("CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nome TEXT ,
    email TEXT ,
    senha TEXT ,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_ultimo_acesso TIMESTAMP
)");