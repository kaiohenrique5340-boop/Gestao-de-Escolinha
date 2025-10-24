CREATE DATABASE LivingFight;
USE LivingFight;

#DROP TABLE usuarios;  <- PARA APAGAR O A TABELA DO BANCO


# CRIAÇÃO DA TABELA
CREATE TABLE usuarios(
nome_usuario VARCHAR(255) NOT NULL,
sexo ENUM('M','F'),
data_Nascimento DATE NOT NULL,
cpf VARCHAR(20),
e_mail VARCHAR(255) NOT NULL,
telefone VARCHAR(20),
senha VARCHAR(255),
cep VARCHAR(10) NOT NULL,
numero INT NOT NULL,
complemento VARCHAR(255),
bairro VARCHAR(50),
cidade VARCHAR(50),
estado VARCHAR(30) DEFAULT 'Brasil',
data_criacao DATE,
ultimo_login DATETIME,
is_admin BOOLEAN DEFAULT FALSE,
PRIMARY KEY(cpf)
);

# EXIBIR TODOS OS CANPOS DA TABELA
select * from usuarios