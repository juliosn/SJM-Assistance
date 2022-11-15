<?php
require_once("conexao.php");

class Cadastrar extends Conexao {

    private $id;
    private $nome;
    private $nomeUsuario;
    private $email;
    private $senha;
    private $cep;
    private $endereco;
    private $numeroCasa;
    private $complemento;
    private $cidade;
    private $estado;

    private $emailLogin;
    private $senhaLogin;

    private $imagemConta;

    //Metodos Set
    public function setId($string){
        $this->id = $string;
    }
    public function setNome($string){
        $this->nome = $string;
    }
    public function setNomeUsuario($string){
        $this->nomeUsuario = $string;
    }
    public function setEmail($string){
        $this->email = $string;
    }
    public function setSenha($string){
        $this->senha = $string;
    }
    public function setCep($string){
        $this->cep = $string;
    }
    public function setEndereco($string){
        $this->endereco = $string;
    }
    public function setNumeroCasa($string){
        $this->numeroCasa = $string;
    }
    public function setComplemento($string){
        $this->complemento = $string;
    }
    public function setCidade($string){
        $this->cidade = $string;
    }
    public function setEstado($string){
        $this->estado = $string;
    }
    public function setEmailLogin($string){
        $this->emailLogin = $string;
    }
    public function setSenhaLogin($string){
        $this->senhaLogin = $string;
    }
    public function setImagemConta($string){
        $this->imagemConta = $string;
    }

    //Metodos Get
    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getNomeUsuario(){
        return $this->nomeUsuario;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getCep(){
        return $this->cep;
    }
    public function getEndereco(){
        return $this->endereco;
    }
    public function getNumeroCasa(){
        return $this->numeroCasa;
    }
    public function getComplemento(){
        return $this->complemento;
    }
    public function getCidade(){
        return $this->cidade;
    }
    public function getEstado(){
        return $this->estado;
    }
    public function getEmailLogin(){
        return $this->emailLogin;
    }
    public function getSenhaLogin(){
        return $this->senhaLogin;
    }
    public function getImagemConta(){
        return $this->imagemConta;
    }

    public function incluir(){
        return $this->cadastrar($this->getNome(), $this->getNomeUsuario(), $this->getEmail(), $this->getsenha(), $this->getCep(), $this->getEndereco(), $this->getNumeroCasa(), $this->getComplemento(), $this->getCidade(), $this->getEstado());
    }
    public function logar(){
        return $this->entrar($this->getEmailLogin(), $this->getSenhaLogin());
    }
    public function alterarImagemConta(){
        return $this->atualizarImagemConta($this->getImagemConta(), $this->getId());
    }
}
?>