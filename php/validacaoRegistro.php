<?php

$nome = $_POST["nome"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$confirmarSenha = $_POST["confirmar_senha"];

//garante que nao tenha campo nulo
if(empty($nome) || empty($cpf) || empty($email) || empty($telefone) || empty($senha) || empty($confirmarSenha)) {
    echo "Preencha todos os campos obrigatórios.";
    exit;
}
if(!validaEmail($email)) {
    echo "Email inválido.";
    exit;
}
if(!validaCPF($cpf)) {
    echo "CPF inválido.";
    exit;
}
if(!verificaCelular($telefone)) {
    echo "Número de celular inválido.";
    exit;
}
if($senha !== $confirmarSenha) {
    echo "As senhas não coincidem.";
    exit;
}
if($email !== $confirmarEmail) {
    echo "Os emails não coincidem.";
    exit;
}



//validacao de telefone celular 
function verificaCelular($celular): bool {
    // Remove todos os caracteres que não sejam dígitos
    $celular = preg_replace('/[^0-9]/', '', $celular);
    //padrao do celular
    $padrao = '/^([14689][0-9]|2[12478]|3([1-5]|[7-8])|5([13-5])|7[193-7])9[0-9]{8}$/';
    // Compara a string com o padrão
    return (bool) preg_match($padrao, $celular);
}
//validacao de email
function validaEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}
//validacaod e cpf
function validaCPF($cpf) {
 
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;

}

?>