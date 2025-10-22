# Escolinha de Boxe

<p> Plataforma web para gerenciar alunos, turmas, aulas e pagamentos de uma escolinha de boxe — facilita a comunicação entre treinadores e alunos.</p>



# Visão geral
Visão: Criar uma plataforma web para gerenciar alunos, turmas, aulas e pagamentos de uma escolinha de boxe, reduzindo trabalho manual e facilitando o dia a dia do treinador/proprietário.

---

## Público-alvo
- Proprietários/administradores da escolinha  
- Treinadores  
- Alunos (adultos e crianças) e responsáveis

---

## Problema que resolvemos
- Controle manual por planilhas e papelada.  
- Dificuldade em acompanhar presença e pagamentos.  
- Comunicação limitada entre treinador e alunos/responsáveis.

---

## Produto e escopo
O que é: Sistema web responsivo com área administrativa e login individual.  
O que não é (v1): Rede social, streaming de aulas, processamento de pagamento online (não incluso na versão inicial).

Funcionalidades principais: cadastro de alunos, turmas e horários; controle de presença; registro de pagamentos; login com perfis.

---

## Funcionalidades essenciais
- Cadastro, edição e listagem de alunos.  
- CRUD de turmas e horários.  
- Registro de presença por aula.  
- Registro de pagamentos (controle de mensalidades).  
- Autenticação com perfis: admin (treinador/gestor) e aluno (ou responsável).

---

## Critérios de sucesso
- Alunos conseguem consultar horários.  
- Treinador registra presença e pagamentos sem erros.  
- Redução do uso de planilhas/papelada no dia a dia.

---

## User Stories e Critérios de Aceitação

### 1) Cadastro de Alunos
User Story:  
> Como administrador, quero cadastrar novos alunos para gerenciar turmas e mensalidades.

Critérios de Aceitação:
- Campos obrigatórios: nome, idade, contato, turma, status_pagamento.  
- Validação de e-mail e telefone.  
- Mensagem de sucesso ou erro adequadas.  
- Mensagens de erro: “Preencha todos os campos obrigatórios.”

#2 Gerenciar Turmas
User Story:  
 Como administrador, quero criar e editar turmas e horários para atribuir alunos.

Critérios de Aceitação:
- CRUD completo para turmas (nome, horário, treinador, capacidade).  
- Listagem paginada.

### 3) Registrar Presença
User Story:  
> Como treinador, quero registrar presença por aula para acompanhar frequência.

Critérios de Aceitação:
- Registrar presença por data/aula.  
- Gerar lista de ausências por aluno.

# Registrar Pagamentos
User Story:  
> Como administrador, quero registrar pagamentos para controlar mensalidades.

Critérios de Aceitação:
- Associar pagamento ao aluno e ao período (mês/ano).  
- Marcar status: pago, pendente, atrasado