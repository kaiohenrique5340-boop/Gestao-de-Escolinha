<?php

/* create database banco;

use banco;

CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER PRIMARY KEY auto_increment,
    nome varchar(250) ,
    email varchar(250) ,
    senha varchar(250) ,
    data_criacao date,
    data_ultimo_acesso datetime
);

*/
print_r($_SERVER);

$caminho = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($caminho === '/'){
    require_once 'index.php';
}else if ($caminho === 'views/login.php'){
    require_once 'views/logion.php';
}else if ($caminho === 'views/esqueci_senha..php'){
    require_once 'esqueci_senha.php';
}else if ($caminho === 'painelAdministrador.php'){
    require_once 'views/painelAdministrador.php';
}else if ($caminho === 'register.php'){
    require_once 'views/register.php';
}else{
    http_response_code(404);
    echo "Página não encontrada.";
}