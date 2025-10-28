<?php

class Usuario {
    private $id;
    private $nome;
    private $sexo;
    private $dataNascimento;
    private $cpf;
    private $email;
    private $telefone;
    private $senha;
    private $cep;
    private $endereco;
    private $bairro;
    private $dataCriacao;
    private $ultimoLogin;
    private $admin;

    public function __construct($id, $nome, $sexo, $dataNascimento, $cpf, $email, $telefone, $senha, $cep, $endereco, $bairro, $dataCriacao, $ultimoLogin, $admin) {
        $this->id = $id;
        $this->nome = $nome;
        $this->sexo = $sexo;
        $this->dataNascimento = $dataNascimento;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->senha = $senha;
        $this->cep = $cep;
        $this->endereco = $endereco;
        $this->bairro = $bairro;
        $this->dataCriacao = $dataCriacao;
        $this->ultimoLogin = $ultimoLogin;
        $this->admin = $admin;
    }

    // Getters and Setters for each attribute
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getSexo() {
        return $this->sexo;
    }
    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }
    public function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    public function getCpf() {
        return $this->cpf;
    }
    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }

    public function getTelefone() {
        return $this->telefone;
    }
    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getSenha() {
        return $this->senha;
    }
    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getCep() {
        return $this->cep;
    }
    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function getEndereco() {
        return $this->endereco;
    }
    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getBairro() {
        return $this->bairro;
    }
    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }
    
    public function getDataCriacao() {
        return $this->dataCriacao;
    }
    public function setDataCriacao($dataCriacao) {
        $this->dataCriacao = $dataCriacao;
    }

    public function getUltimoLogin() {
        return $this->ultimoLogin;
    }
    public function setUltimoLogin($ultimoLogin) {
        $this->ultimoLogin = $ultimoLogin;
    }

    public function isAdmin() {
        return $this->admin;
    }
    public function setAdmin($admin) {
        $this->admin = $admin;
    }


    // Metodos adicionais
    



















}