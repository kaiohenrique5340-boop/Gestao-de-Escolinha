const formulario = document.getElementById('form'); 
const nomeUsuario = document.getElementById('nome');
const email = document.getElementById('email');
const senha = document.getElementById('senha');
const confirmarSenha = document.getElementById('senha2');

formulario.addEventListener('submit', e => {
    e.preventDefault(); // Impede o envio para validar

    // CORREÇÃO: Verifica o resultado da validação
    const isFormValid = validarEntradas();

    // Se a validação do CPF também estiver OK (do outro arquivo)
    const cpfMsg = document.getElementById("mensagem").textContent;
    const isCpfValid = cpfMsg === "CPF válido!" || cpfMsg === "";

    if (isFormValid && isCpfValid) {
        // Se tudo estiver OK, envia o formulário
        formulario.submit();
    }
});

const definirErro = (elemento, mensagem) => {
    const controleEntrada = elemento.parentElement;
    const exibicaoErro = controleEntrada.querySelector('.error');

    exibicaoErro.innerText = mensagem;
    controleEntrada.classList.add('error');
    controleEntrada.classList.remove('success');
};

const definirSucesso = elemento => {
    const controleEntrada = elemento.parentElement;
    const exibicaoErro = controleEntrada.querySelector('.error');

    exibicaoErro.innerText = '';
    controleEntrada.classList.add('success');
    controleEntrada.classList.remove('error');
};

const emailValido = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
};

const validarEntradas = () => {
    const valorNomeUsuario = nomeUsuario.value.trim();
    const valorEmail = email.value.trim();
    const valorSenha = senha.value.trim();
    const valorConfirmarSenha = confirmarSenha.value.trim();

    let isSuccess = true;

    if(valorNomeUsuario === '') {
        definirErro(nomeUsuario, 'O nome de usuário é obrigatório');
        isSuccess = false;
    } else {
        definirSucesso(nomeUsuario);
    }

    if(valorEmail === '') {
        definirErro(email, 'O e-mail é obrigatório');
        isSuccess = false;
    } else if (!emailValido(valorEmail)) {
        definirErro(email, 'Forneça um endereço de e-mail válido');
        isSuccess = false;
    } else {
        definirSucesso(email);
    }

    if(valorSenha === '') {
        definirErro(senha, 'A senha é obrigatória');
        isSuccess = false;
    } else if (valorSenha.length < 8 ) {
        definirErro(senha, 'A senha deve ter pelo menos 8 caracteres');
        isSuccess = false;
    } else {
        definirSucesso(senha);
    }

    if(valorConfirmarSenha === '') {
        definirErro(confirmarSenha, 'Por favor, confirme sua senha');
        isSuccess = false;
    } else if (valorConfirmarSenha !== valorSenha) {
        definirErro(confirmarSenha, 'As senhas não coincidem');
        isSuccess = false;
    } else {
        definirSucesso(confirmarSenha);
    }
    return isSuccess;
};
