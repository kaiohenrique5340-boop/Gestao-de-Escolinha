const formulario = document.getElementById('form'); 
const nomeUsuario = document.getElementById('username');
const email = document.getElementById('email');
const senha = document.getElementById('password');
const confirmarSenha = document.getElementById('password2');

formulario.addEventListener('submit', e => {
    e.preventDefault();

    validarEntradas();
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

    if(valorNomeUsuario === '') {
        definirErro(nomeUsuario, 'O nome de usuário é obrigatório');
    } else {
        definirSucesso(nomeUsuario);
    }

    if(valorEmail === '') {
        definirErro(email, 'O e-mail é obrigatório');
    } else if (!emailValido(valorEmail)) {
        definirErro(email, 'Forneça um endereço de e-mail válido');
    } else {
        definirSucesso(email);
    }

    if(valorSenha === '') {
        definirErro(senha, 'A senha é obrigatória');
    } else if (valorSenha.length < 8 ) {
        definirErro(senha, 'A senha deve ter pelo menos 8 caracteres');
    } else {
        definirSucesso(senha);
    }

    if(valorConfirmarSenha === '') {
        definirErro(confirmarSenha, 'Por favor, confirme sua senha');
    } else if (valorConfirmarSenha !== valorSenha) {
        definirErro(confirmarSenha, 'As senhas não coincidem');
    } else {
        definirSucesso(confirmarSenha);
    }
};
