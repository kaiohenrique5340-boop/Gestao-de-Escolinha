const cpf = document.getElementById("cpf");

// Impede digitar qualquer coisa que não seja número
cpfInput.addEventListener("keypress", function (e) {
  const char = String.fromCharCode(e.which);
  if (!/[0-9]/.test(char)) {
    e.preventDefault(); // bloqueia o caractere
  }
});

// Também limpa caso o usuário cole algo com . ou -
cpfInput.addEventListener("input", function () {
  this.value = this.value.replace(/\D/g, ""); // remove tudo que não é número
});
