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

    //SERVICO
    private $idServico;
    private $idCliente;
    private $idFuncionario;
    private $marca;
    private $modelo;
    private $descricaoProblema;
    private $formaEnvio;
    private $garantia;

    //ACEITAR PEDIDO
    private $dataEnvio;
    private $mensagemFuncionario;

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

    //SERVICO
    //Metodos Set
    public function setIdServico($string){
        $this->idServico = $string;
    }
    public function setIdCliente($string){
        $this->idCliente = $string;
    }
    public function setIdFuncionario($string){
        $this->idFuncionario = $string;
    }
    public function setMarca($string){
        $this->marca = $string;
    }
    public function setModelo($string){
        $this->modelo = $string;
    }
    public function setDescricaoProblema($string){
        $this->descricaoProblema = $string;
    }
    public function setFormaEnvio($string){
        $this->formaEnvio = $string;
    }
    public function setGarantia($string){
        $this->garantia = $string;
    }

    //Metodos Get
    public function getIdServico(){
        return $this->idServico;
    }
    public function getIdCliente(){
        return $this->idCliente;
    }
    public function getIdFuncionario(){
        return $this->idFuncionario;
    }
    public function getMarca(){
        return $this->marca;
    }
    public function getModelo(){
        return $this->modelo;
    }
    public function getDescricaoProblema(){
        return $this->descricaoProblema;
    }
    public function getformaEnvio(){
        return $this->formaEnvio;
    }
    public function getGarantia(){
        return $this->garantia;
    }

    //ACEITAR PEDIDO

    public function setDataEnvio(){
        $this->dataEnvio = $string;
    }
    public function setMensagemFuncionario(){
       $this->mensagemFuncionario = $string;
    }

    public function getDataEnvio(){
        return $this->dataEnvio;
    }
    public function getMensagemFuncionario(){
        return $this->mensagemFuncionario;
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

    //SERVICO
    public function incluirServico(){
        return $this->agendarServico($this->getIdCliente(), $this->getMarca(), $this->getModelo(), $this->getDescricaoProblema(), $this->getformaEnvio(), $this->getGarantia());
    }
    public function listarServico($id){
    	return $this->getServico($id);
    }
    public function statusServico($id){
    	return $this->getStatusServico($id);
    }
    public function listarClienteFuncionario(){
    	return $this->getClienteFuncionario();
    }

    //ACEITAR PEDIDO
    public function aceitarPedido(){
    	return $this->aceitarServico($this->getIdServico(), $this->getIdFuncionario(), $this->getDataEnvio(), $this->getMensagemFuncionario());
    }
}
?>