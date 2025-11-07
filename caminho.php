<?php

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