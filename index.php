<?php

$caminho = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($caminho === '/'){
    require_once 'mainPage.html';
}else if ($caminho === 'login.html'){
    require_once 'logion.html';
}else if ($caminho === 'esqueci_senha..html'){
    require_once 'esqueci_senha.html';
}else if ($caminho === 'painelAdministrador.php'){
    require_once 'painelAdministrador.html';
}else if ($caminho === 'register.html'){
    require_once 'register.html';
}else{
    http_response_code(404);
    echo "Página não encontrada.";
}