<?php
session_start();

//Remove todas as variáveis de sessão 
session_unset();

//Destrói a sessão
session_destroy();

// (Usando 'login.html' com base nos seus outros arquivos)
header("Location: /views/login.php");

exit();
?>
