<?php
require_once("conexao.php");

class Cadastrar extends Conexao {

    //variaveis para armazenar dados do cadastro
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

    //logar
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
    private $idStatusServico;
    private $dataEnvio;
    private $mensagemFuncionario;

    //CADASTRAR FUNCIONARIO
    private $cargo;
    private $permissoes;

    //RECUPERACAO DE SENHA
    private $emailRecuperacao;
    private $codVerificacao;

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

    public function setDataEnvio($string){
        $this->dataEnvio = $string;
    }
    public function setMensagemFuncionario($string){
       $this->mensagemFuncionario = $string;
    }
    public function setStatusPedido($string){
       $this->statusPedido = $string;
    }
    public function setIdStatusServico($string){
       $this->idStatusServico = $string;
    }

    public function getDataEnvio(){
        return $this->dataEnvio;
    }
    public function getMensagemFuncionario(){
        return $this->mensagemFuncionario;
    }
    public function getStatusPedido(){
        return $this->statusPedido;
    }
    public function getIdStatusServico(){
        return $this->idStatusServico;
    }

    //CADASTRAR FUNCIONARIO
    public function setCargo($string){
        $this->cargo = $string;
     }
    public function getPermissoes(){
        return $this->permissoes;
    }

    public function setPermissoes($string){
        $this->permissoes = $string;
     }
     
    public function getCargo(){
        return $this->cargo;
    }

    //RECUPERACAO DE SENHA
    public function setEmailRecuperacao($string){
        $this->emailRecuperacao = $string;
     }
     
    public function getEmailRecuperacao(){
        return $this->emailRecuperacao;
    }

    public function setCodVerificacao($string){
        $this->codVerificacao = $string;
     }
     
    public function getCodVerificacao(){
        return $this->codVerificacao;
    }

    public function incluir(){//funcao para cadastrar cliente
        return $this->cadastrar($this->getNome(), $this->getNomeUsuario(), $this->getEmail(), $this->getsenha(), $this->getCep(), $this->getEndereco(), $this->getNumeroCasa(), $this->getComplemento(), $this->getCidade(), $this->getEstado());
    }
    public function logar(){//funcao para fazer o login
        return $this->entrar($this->getEmailLogin(), $this->getSenhaLogin());
    }
    public function alterarImagemConta(){//funcao para mudar imagem da conta
        return $this->atualizarImagemConta($this->getImagemConta(), $this->getId());
    }

    //SERVICO
    public function incluirServico(){//funcao para o cliente fazer o pedido de um servico
        return $this->agendarServico($this->getIdCliente(), $this->getMarca(), $this->getModelo(), $this->getDescricaoProblema(), $this->getformaEnvio(), $this->getGarantia());
    }
    public function listarServico($id){
    	return $this->getServico($id);
    }
    public function statusServico($id){
    	return $this->listarStatusServico($id);
    }
    public function statusServicoFuncionario($id){
    	return $this->listarServicoFuncionario($id);
    }
    public function listarClienteFuncionario($id){
    	return $this->getClienteFuncionario($id);
    }

    //ACEITAR PEDIDO
    public function atualizarPedido(){
    	return $this->atualizarServico($this->getIdServico(), $this->getIdFuncionario(), $this->getStatusPedido(), $this->getDataEnvio(), $this->getMensagemFuncionario());
    }
    public function listarFuncionario($id){
    	return $this->exibirFuncionario($id);
    }

    public function confirmarPedido(){
        return $this->verificarPedido($this->getIdStatusServico());
    }
    public function cancelarPedidoUsuario(){
        return $this->cancelarServicoUsuario($this->getIdStatusServico());
    }
    public function confirmarPedidoUsuario(){
        return $this->aceitarPedidoUsuario($this->getIdStatusServico());
    }
    public function cancelarPedidoFuncionario($idFuncionario){
        return $this->cancelarServicoFuncionario($this->getIdStatusServico(), $idFuncionario, $this->getDataEnvio(), $this->getMensagemFuncionario(), $this->getIdServico());
    }
    public function confirmadoPeloFuncionario($idFuncionario){
        return $this->confirmarPeloFuncionario($this->getIdStatusServico(), $idFuncionario, $this->getDataEnvio(), $this->getMensagemFuncionario(), $this->getIdServico());
    }

    // FUNCIONARIO ADMINISTRADOR
    public function excluirConta($id, $conta, $nomeFuncionario){//permite administrador desativar conta
        return $this->apagarConta($id, $conta, $nomeFuncionario);
    }
    public function recuperarConta($id, $conta, $nomeFuncionario){//permite  administrador ativar conta
        return $this->voltarConta($id, $conta, $nomeFuncionario);
    }
    public function cadastrarFuncionario(){//permite administrador cadastrar funcionario
        return $this->incluirFuncionario($this->getNome(), $this->getCargo(), $this->getEmail(), $this->getSenha(), $this->getPermissoes());
    }

    public function atualizarConta($conta){
        if($conta == "cliente"){//atualizar conta do cliente
            return $this->updateContaCliente($_SESSION['id'], $this->getNome(), $this->getNomeUsuario(), $this->getEmail(), $this->getsenha(), $this->getCep(), $this->getEndereco(), $this->getNumeroCasa(), $this->getComplemento(), $this->getCidade(), $this->getEstado());
        }else{//atualizar conta do funcionario
            return $this->updateContaFuncionario($_SESSION['idFuncionario'], $this->getNome(), $this->getCargo(), $this->getEmail(), $this->getsenha(), $this->getPermissoes());
        }
    }

    //RECUPERACAO DE SENHA
    public function esqueciSenha(){//funcao para enviar um codigo de verificacao e recuperar senha
        return $this->enviarCodEmail($this->getEmailRecuperacao(), $this->getCodVerificacao());
    }

    //FUNCAO PRO ADMINISTRADOR ATUALIZAR CONTA DO FUNCIONARIO
    public function atualizarContaFuncionario($id, $cargo, $permissoes){
        return $this->updateContaFuncionarioAdm($id, $cargo, $permissoes);
    }
}
?>