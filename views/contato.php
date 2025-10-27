<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/contatos.css">
    <title>contatos</title>
</head>
<body>

  <main class="container">
    <!-- LADO ESQUERDO -->
    <section class="left">
      <div>
        <h1>Entre em contato 🥊</h1>
        <p>
          Quer saber mais sobre nossas aulas?  
          Fale com a equipe da <strong> Living Fight</strong> e daremos um soco na dúvida!
        </p>

        <div class="info">
          <div class="info-item">
            <strong>Endereço:</strong>
            Rua dos Atletas, 123 — Rio de janeiro, RJ
          </div>
          <div class="info-item">
            <strong> Telefone / WhatsApp:</strong>
            (21) 98888-7777
          </div>
          <div class="info-item">
            <strong>E-mail:</strong>
            contato@campeoesboxe.com.br
          </div>
        </div>
      </div>

      <p style="font-size:0.85rem; color:#71717a; margin-top:20px;">
        Horário de atendimento: Segunda a Sexta, das 9h às 18h.
      </p>
    </section>

    <!-- LADO DIREITO -->
    <section class="right">
      <form id="contatoForm">
        <div>
          <label for="nome">Nome</label>
          <input id="nome" name="nome" type="text" placeholder="Seu nome completo" required />
        </div>

        <div>
          <label for="email">E-mail</label>
          <input id="email" name="email" type="email" placeholder="seuemail@exemplo.com" required />
        </div>

        <div>
          <label for="assunto">Assunto</label>
          <input id="assunto" name="assunto" type="text" placeholder="Ex: Matrícula, Dúvidas, etc." required />
        </div>

        <div>
          <label for="mensagem">Mensagem</label>
          <textarea id="mensagem" name="mensagem" placeholder="Escreva aqui sua mensagem..." required></textarea>
        </div>

        <button type="submit">Enviar mensagem</button>
        <div class="status" id="statusMsg"></div>
      </form>
    </section>
  </main>

  <script src="script.js"></script>
</body>
</html>