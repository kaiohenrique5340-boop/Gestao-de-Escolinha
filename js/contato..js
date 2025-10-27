const form = document.getElementById('contatoForm');
    const statusMsg = document.getElementById('statusMsg');

    form.addEventListener('submit', function(e){
      e.preventDefault();

      // validação simples
      let ok = true;
      form.querySelectorAll('input, textarea').forEach(el => {
        el.classList.remove('error');
        if(!el.value.trim()){
          el.classList.add('error');
          ok = false;
        }
      });

      if(!ok){
        statusMsg.textContent = 'Por favor, preencha todos os campos.';
        statusMsg.classList.remove('success');
        return;
      }

      // simulação de envio
      statusMsg.textContent = 'Enviando...';
      setTimeout(()=>{
        statusMsg.textContent = 'Mensagem enviada com sucesso! Entraremos em contato em breve.';
        statusMsg.classList.add('success');
        form.reset();
      },1000);
    });