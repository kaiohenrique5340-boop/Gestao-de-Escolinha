<?php
session_start(); 
include 'conexao.php'; //Inicia sessao
//---------- Verificação de Acesso ----------
if ($_SESSION['admin'] != 1) {
    die("Acesso negado. Faça login como administrador.");
}

$id = filter_var(($_GET['id']), FILTER_VALIDATE_INT);
$sql = 'DELETE FROM usuarios WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id);
if ($stmt->execute() === false) {
    header('Location: painelAdministrador.php?sucesso=0');
} else {
    header('Location: ../views/paginaListarAlunos.php?deleted=1');
    exit();
}