CREATE DATABASE living_fight;

USE living_fight;

CREATE TABLE usuarios(
id INT AUTO_INCREMENT,
nome VARCHAR(255) NOT NULL,
sexo ENUM('masculino','feminino','nao informado') NOT NULL,
data_nascimento DATE NOT NULL,
cpf VARCHAR(20),
email VARCHAR(255) NOT NULL,
telefone VARCHAR(20),
senha VARCHAR(255),
cep VARCHAR(10) NOT NULL,
endereco VARCHAR(255) NOT NULL,
numero INT NOT NULL,
complemento VARCHAR(255),
bairro VARCHAR(50),
data_criacao DATE,
ultimo_login DATETIME,
admin BOOLEAN DEFAULT FALSE,
PRIMARY KEY(id)
);