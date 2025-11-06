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

