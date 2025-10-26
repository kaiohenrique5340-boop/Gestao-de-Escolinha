   // Inicio do Viacep
   
$('#cep').blur(function () {
  var vl = this.value;

  $.get('https://viacep.com.br/ws/'+vl+'/json/',function (dados) {
    $('#endereco').val(dados.logradouro);
    $('#bairro').val(dados.bairro);
    //$('#cidade').val(dados.localidade);
    //$('#estado').val(dados.uf);
  });
});
   // fim do Viacep


   //validação cpf
const cpfInput = document.getElementById("cpf");
const mensagem = document.getElementById("mensagem");

    // validação automática
cpfInput.addEventListener("input", function(e) {
  let valor = e.target.value.replace(/\D/g, "");
  if (valor.length > 11) valor = valor.slice(0, 11);

  valor = valor.replace(/(\d{3})(\d)/, "$1.$2");
  valor = valor.replace(/(\d{3})(\d)/, "$1.$2");
  valor = valor.replace(/(\d{3})(\d{1,2})$/, "$1-$2");

  e.target.value = valor;

  // validação em tempo real
  if (valor.length === 14) {
    if (validarCPF(valor)) {
      mensagem.style.color = "green";
      mensagem.textContent = "CPF válido!";
    } else {
      mensagem.style.color = "red";
      mensagem.textContent = "CPF inválido!";
    }
  } else {
    mensagem.textContent = "";
  }
  });

    // Validação de CPF
  function validarCPF(input) {
    if (!input) return false;
    const cpf = input.replace(/\D/g, '');

    if (cpf.length !== 11) return false;
    if (/^(\d)\1{10}$/.test(cpf)) return false;

    const nums = cpf.split('').map(d => parseInt(d, 10));

    let soma = 0;
    for (let i = 0; i < 9; i++) soma += nums[i] * (10 - i);
    let resto = soma % 11;
    const dig1 = resto < 2 ? 0 : 11 - resto;
    if (dig1 !== nums[9]) return false;

    soma = 0;
    for (let i = 0; i < 10; i++) soma += nums[i] * (11 - i);
    resto = soma % 11;
    const dig2 = resto < 2 ? 0 : 11 - resto;
    if (dig2 !== nums[10]) return false;

    return true;
  }

  // Impede o envio se CPF for inválido
  document.getElementById("form").addEventListener("submit", function(e) {
    if (!validarCPF(cpfInput.value)) {
      e.preventDefault();
      alert("CPF inválido! Corrija antes de enviar.");
    }
  });
    // fim da validação do campo cpf


    //inicio da validação data de nascimento 

document.addEventListener("DOMContentLoaded", function() {
  const inputData = document.getElementById("data_nascimento");
  const msgErro = document.getElementById("msgErro");

  inputData.addEventListener("input", function() {
    const valor = this.value;
    const dataNasc = new Date(valor);
    const hoje = new Date();
    const minAno = hoje.getFullYear() - 120; // Limite de 120 anos

    // Data inválida
    if (!valor || isNaN(dataNasc.getTime())) {
      msgErro.textContent = "Preencha uma data válida.";
      msgErro.style.color = "red";
      return;
    }

    // Data no futuro
    if (dataNasc > hoje) {
      msgErro.textContent = "A data não pode ser no futuro.";
      msgErro.style.color = "red";
      return;
    }

    // Data muito antiga
    if (dataNasc.getFullYear() < minAno) {
      msgErro.textContent = "A data é muito antiga. Verifique o ano.";
      msgErro.style.color = "red";
      return;
    }

    // Tudo certo
    msgErro.textContent = "";
  });
});
