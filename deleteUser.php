<?php
//conexao com banco de dados
require 'conexao.php';

$id = filter_var(($_GET['id']), FILTER_VALIDATE_INT);
$sql = 'DELETE FROM usuarios WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id);
if ($stmt->execute() === false) {
    header('Location: painelAdministrador.php?sucesso=0');
} else {
    header('Location: painelAdministrador.php?sucesso=1');
}
