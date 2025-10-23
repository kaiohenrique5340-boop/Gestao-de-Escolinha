/* create database banco;

use banco;

CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER PRIMARY KEY auto_increment,
    nome varchar(250) ,
    email varchar(250) ,
    senha varchar(250) ,
    data_criacao date,
    data_ultimo_acesso datetime
); */


<?php

$caminho = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($caminho === '/'){
    require_once 'mainPage.php';
}else if ($caminho === 'login.php'){
    require_once 'logion.php';
}else if ($caminho === 'esqueci_senha..php'){
    require_once 'esqueci_senha.php';
}else if ($caminho === 'painelAdministrador.php'){
    require_once 'painelAdministrador.php';
}else if ($caminho === 'register.php'){
    require_once 'register.php';
}else{
    http_response_code(404);
    echo "Página não encontrada.";
}