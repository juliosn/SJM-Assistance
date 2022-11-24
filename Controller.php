<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once("$root/proj-IBM/model/cadastrar.php");

class Controller{

    private $cadastrar;

    public function __construct(){
        $this->cadastrar = new Cadastrar();
        //pega uma variavel get e chama a funcao correspondente
        if(isset($_GET['funcao']) && $_GET['funcao'] == "cadastrar"){//chama funcao para cadastrar
            $this->incluir();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "logar"){//chama funcao para logar
            $this->logar();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "sair"){//chama funcao para sair
            $this->sair();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "mudarImagemConta"){//chama funcao para mudar a imagem da conta
            $this->alterarImagemConta();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "solicitarServico"){//chama funcao para solititar um servico
            $this->incluirServico();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "cadastrarFuncionario"){//chama funcao para o administrador cadaastrar funcionario
            $this->cadastrarFuncionario();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "atualizarConta"){//chama funcao para atualizar conta
            $this->atualizarConta($_GET['conta']);
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "esqueciSenha"){//chama funcao para recuperar senha
            $this->esqueciSenha($_POST['txtEmailRecuperacao']);
        }else if(isset($_GET['funcao']) &&  $_GET['funcao'] == "contato"){//chama funcao para entrar em contato
            $this->contato();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "atualizarFuncionario"){//chama funcao para o administrador atualizar a conta do funcionario
            $this->atualizarFuncionario();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "atualizarPedido"){//chama funcao para o cliente atualizar o pedido
            $this->atualizarPedido();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "atualizarPedidoFuncionario"){//chama funcao para o funcionario atualizar o pedido
            $this->atualizarPedidoFuncionario();
        }        
    }

    private function incluir(){//funcao para cadastrar
        try{
            $this->cadastrar->setNome($_POST['txtNomeCadastro']);
            $this->cadastrar->setNomeUsuario($_POST['txtNomeUsuarioCadastro']);
            $this->cadastrar->setEmail($_POST['txtEmailCadastrar']);
            $this->cadastrar->setSenha($_POST['txtSenhaCadastrar']);
            $this->cadastrar->setCep($_POST['txtCep']);
            $this->cadastrar->setEndereco($_POST['txtEndereco']);
            $this->cadastrar->setNumeroCasa($_POST['txtNumeroCasa']);
            $this->cadastrar->setComplemento($_POST['txtComplemento']);
            $this->cadastrar->setCidade($_POST['txtCidade']);
            $this->cadastrar->setEstado($_POST['txtEstado']);
            $result = $this->cadastrar->incluir();
        }catch(Exception $e){
            echo "<script>document.location='entrar.php?cad=danger'</script>";//manda pra pagina entrar
        }
    }

    private function logar(){//funcao para logar
        $this->cadastrar->setEmailLogin($_POST['txtEmailEntrar']);
        $this->cadastrar->setSenhaLogin($_POST['txtSenhaEntrar']);
        $result = $this->cadastrar->logar(); 
    }

    private function logarImagem($email, $senha){//funcao para logar quando trocar a imagem da conta
        $this->cadastrar->setEmailLogin($email);
        $this->cadastrar->setSenhaLogin($senha);
        $result = $this->cadastrar->logar(); 
    }

    public function sair(){//funcao para sair, destroi a sessao
        session_start();
        $_SESSION = Array();
        session_destroy();
        header("Location: index.php");
    }

    public function alterarImagemConta(){//funcao para o cliente mudar imagem da conta
        session_start();
        $email = $_SESSION['login'];//pega email atual da conta
        $senha = $_SESSION['password'];//pega senha atual da conta
        $this->cadastrar->setImagemConta($_FILES['imgConta']);//chama metodo set passando a imagem como parametro
        $result = $this->cadastrar->alterarImagemConta();//chama funcao que altera imagem

       $_SESSION = Array();
        session_destroy();

        session_start();
        $this->cadastrar->setEmailLogin($email);
        $this->cadastrar->setSenhaLogin($senha);
        $result = $this->logarImagem($email, $senha);

        if($result >= 1){
            header("Location: conta.php?alterarImagem=danger");
        }else{
            header("Location: conta.php?alterarImagem=sucess");
       }
    }

    public function incluirServico(){//inclui um servico pelo usuario
        session_start();
        $email = $_SESSION['login'];//pega email atual da conta
        $senha = $_SESSION['password'];//pega senha atual da conta

        if(isset($_POST['checkadicionargarantia'])){
            $garantia = "Sim";
        }else{
            $garantia = "Nao";
        }

         $this->cadastrar->setIdCliente($_SESSION['id']);
         $this->cadastrar->setMarca($_POST['txtMarca']);
         $this->cadastrar->setModelo($_POST['txtModelo']);
         $this->cadastrar->setDescricaoProblema($_POST['txtDescricaoProblema']);
         $this->cadastrar->setFormaEnvio($_POST['ropcaoFormaEnvio']);
         $this->cadastrar->setGarantia($garantia);

         $result = $this->cadastrar->incluirServico();
        if($result >= 1){
            echo "<script>document.location='servico.php?servico=sucess'</script>";//manda pra pagina entrar
        }else{
            echo "<script>document.location='servico.php?servico=danger'</script>";//manda pra pagina entrar
        }
    }

    public function listarServico($id){//lista todos od servicos para o funcionario e para o cliente
        return $result = $this->cadastrar->listarServico($id);
    }

    public function statusServico($id){//lista o status do servico para o cliente e para o funcionario
        return $result = $this->cadastrar->statusServico($id);
    }

    public function statusServicoFuncionario($id){//lista o status do servico para o cliente e para o funcionario
        return $result = $this->cadastrar->statusServicoFuncionario($id);
    }
    
    public function listarClienteFuncionario($id){//lista todos os clientes para mostrar na pagina de servico do funcionario
        return $result = $this->cadastrar->listarClienteFuncionario($id);
    }

    public function atualizarPedido(){//funcao que aceita ou cancela pedio pelo usuario ou pelo funcionario
        session_start();
        $email = $_SESSION['login'];//pega email atual da conta
        $senha = $_SESSION['password'];//pega senha atual da conta
        $idStatusServico = $_GET['idStatusServico'];
        $funcaoAtualizarPedido = $_GET['funcaoAtualizarPedido'];
        if($funcaoAtualizarPedido == "confirmadoPeloUsuario"){
             $this->cadastrar->setIdStatusServico($idStatusServico);
             $result = $this->cadastrar->confirmarPedidoUsuario();
             if($result >= 1){
                echo "<script>location.href=' servico.php?servico=meuServico&cancelarPedido=danger'</script>";//manda pra pagina entrar
            }else{
                echo "<script>location.href=' servico.php?servico=meuServico&cancelarPedido=sucess'</script>";//manda pra pagina entrar
            }
        }else{
            $this->cadastrar->setIdStatusServico($idStatusServico);
            $result = $this->cadastrar->cancelarPedidoUsuario();  
            if($result >= 1){
                echo "<script>location.href=' servico.php?servico=meuServico&cancelarPedido=danger'</script>";//manda pra pagina entrar
            }else{
                echo "<script>location.href=' servico.php?servico=meuServico&cancelarPedido=sucess'</script>";//manda pra pagina entrar
            }
        }
    }

    public function atualizarPedidoFuncionario(){//funcao que aceita ou cancela pedio pelo usuario ou pelo funcionario
        session_start();
        $email = $_SESSION['login'];//pega email atual da conta
        $senha = $_SESSION['password'];//pega senha atual da conta
        $idStatusServico = $_GET['idServico'];
        $funcaoAtualizarPedido = $_GET['funcaoAtualizarPedido'];

        $this->cadastrar->setIdFuncionario($_SESSION['idFuncionario']);
        $this->cadastrar->setDataEnvio($_GET['dataEnvio']);
        $this->cadastrar->setMensagemFuncionario($_GET['mensagemFuncionario']);
        $this->cadastrar->setIdServico($_GET['idServico']);
        $this->cadastrar->setIdStatusServico($idStatusServico);

        if($funcaoAtualizarPedido == "canceladoPeloFuncionario"){
            $result = $this->cadastrar->cancelarPedidoFuncionario($_SESSION['idFuncionario']);  

            if($result >= 1){
                    header("Location: controleServico.php?NaoAceitarPedido=sucess");
            }else{
                header("Location: controleServico.php?NaoAceitarPedido=sucess");
            }
        }elseif($funcaoAtualizarPedido == "confirmadoPeloFuncionario"){
            $result = $this->cadastrar->confirmadoPeloFuncionario($_SESSION['idFuncionario']);  
            echo "UPDATE `tbstatuspedido` SET `statusServico` = 'Confirmado pelo funcionario', `idFuncionario` = '" . $_SESSION['idFuncionario'] ."', `dataLevarNotebook` = '$dataEnvio', `mensagemFuncionario` = '$mensagemFuncionario' WHERE idStatusPedido = $idStatusServico;";
            if($result >= 1){
                //header("Location: controleServico.php?AceitarPedido=sucess");
            }else{
                header("Location: controleServico.php?AceitarPedido=sucess");
            }
        }
    }

    public function listarFuncionario($id){//lista todos od funcionarios
        return $result = $this->cadastrar->listarFuncionario($id);
    }

    public function excluirConta($id, $conta, $nomeFuncionario){//funcao onde o adm desativa uma conta
            $result = $this->cadastrar->excluirConta($id, $conta, $nomeFuncionario);    
            if($result >= 1){
                if($conta == "cliente"){
                    echo "<script>document.location='../consulta.php?excluirConta=danger'</script>";//manda pra pagina entrar
                }else{
                    echo "<script>document.location='../consulta.php?consulta=funcionario&excluirConta=danger'</script>";//manda pra pagina entrar
                }
            }else{
                if($conta == "cliente"){
                    echo "<script>document.location='../consulta.php?excluirConta=sucess'</script>";//manda pra pagina entrar
                }else{
                    echo "<script>document.location='../consulta.php?consulta=funcionario&excluirConta=sucess'</script>";//manda pra pagina entrar
                }
                
            }
    }

    public function recuperarConta($id, $conta, $nomeFuncionario){//funcao onde o adm ativa uma conta
        $result = $this->cadastrar->recuperarConta($id, $conta, $nomeFuncionario);    
         if($result >= 1){
            if($conta == "cliente"){
                echo "<script>document.location='../consulta.php?recuperarConta=danger'</script>";//manda pra pagina entrar
            }else{
                echo "<script>document.location='../consulta.php?consulta=funcionario&recuperarConta=danger'</script>";//manda pra pagina entrar
            }
         }else{
            if($conta == "cliente"){
                echo "<script>document.location='../consulta.php?recuperarConta=sucess'</script>";//manda pra pagina entrar
            }else{
                echo "<script>document.location='../consulta.php?consulta=funcionario&recuperarConta=sucess'</script>";//manda pra pagina entrar
            }
         }
    }

    public function cadastrarFuncionario(){//funcao para cadastrar
        try {
            $this->cadastrar->setNome($_POST['txtNomeCadastro']);
            $this->cadastrar->setCargo($_POST['txtCargo']);
            $this->cadastrar->setEmail($_POST['txtEmailCadastrar']);
            $this->cadastrar->setSenha($_POST['txtSenhaCadastrar']);
            $this->cadastrar->setPermissoes($_POST['txtPermissoes']);
            $result = $this->cadastrar->cadastrarFuncionario();
        } catch (Exception $e) {
            echo "<script>document.location='cadastrarFuncionario.php?cad=danger'</script>";//manda pra pagina entrar
        }
    }

    public function atualizarConta($conta){//funcao que aceita ou cancela pedio pelo usuario ou pelo funcionario
        session_start();
        $email = $_POST['txtEmailCadastrar'];//pega email atual da conta
        $senha = $_POST['txtSenhaCadastrar'];//pega senha atual da conta
        if($conta == "cliente"){//atualizar cliente
            $this->cadastrar->setNome($_POST['txtNomeCadastro']);
            $this->cadastrar->setNomeUsuario($_POST['txtNomeUsuario']);
            $this->cadastrar->setEmail($_POST['txtEmailCadastrar']);
            $this->cadastrar->setSenha($_POST['txtSenhaCadastrar']);
            $this->cadastrar->setCep($_POST['txtCep']);
            $this->cadastrar->setEndereco($_POST['txtEndereco']);
            $this->cadastrar->setNumeroCasa($_POST['txtNumero']);
            $this->cadastrar->setComplemento($_POST['txtComplemento']);
            $this->cadastrar->setCidade($_POST['txtCidade']);
            $this->cadastrar->setEstado($_POST['txtEstado']);
            $result = $this->cadastrar->atualizarConta($conta);
        }else{//atualizar funcionario
            $this->cadastrar->setNome($_POST['txtNomeCadastro']);
            $this->cadastrar->setCargo($_SESSION['cargo']);
            $this->cadastrar->setEmail($_POST['txtEmailCadastrar']);
            $this->cadastrar->setSenha($_POST['txtSenhaCadastrar']);
            $this->cadastrar->setPermissoes($_SESSION['permissoes']);
            $result = $this->cadastrar->atualizarConta($conta);
        }

        $_SESSION = Array();
        session_destroy();

        session_start();
        $this->cadastrar->setEmailLogin($email);
        $this->cadastrar->setSenhaLogin($senha);
        $result = $this->cadastrar->logar();
        if($result >= 1){
            header('Location: conta.php?atualizarConta=sucess');//manda pra pagina entrar
        }else{
            header('Location: conta.php?atualizarConta=sucess');//manda pra pagina entrar
        }
    }

    public function esqueciSenha($email){//manda verificacao por email
        session_start();
        if(isset($_SESSION['logado']) && $_SESSION['logado'] == True){
            $email = $_SESSION['login'];//pega email atual da conta
            $senha = $_SESSION['password'];//pega senha atual da conta
            $_SESSION['logado'] == True;
        }

        $this->cadastrar->setEmailRecuperacao($email);
        $this->cadastrar->setCodVerificacao("123");

        $result = $this->cadastrar->esqueciSenha();


        if($result >= 1){
            echo "<script>document.location='entrar.php?link=esqueciSenha&senhaEnviada=sucess'</script>";//manda pra pagina entrar
        }else{
            echo "<script>document.location='entrar.php?link=esqueciSenha&senhaEnviada=danger'</script>";//manda pra pagina entrar
        }
    }

    public function contato(){//mensagem que envia email
        session_start();
        if(isset($_SESSION['login'])){
            $email = $_SESSION['login'];
        }else{
            $email = $_POST['txtEmailContato'];
        }
        $tipoMensagem = $_POST['txtTipoMensagem'];
        $mensagem = $_POST['txtMensagem'];
        try{
            $msg = 
            "Mensagem de: $mensagem 
            \nTipo da Mensagem:  $tipoMensagem
            \nMensagem: $mensagem
            \nEmail: $email";
            $msg = wordwrap($msg,70);
        
            // enviar email
            mail("sjmassistance@gmail.com","Contatto",$msg);
            header("Location: contato.php?mensagem=enviada");
        }catch(Exeption $e){
            header("Location: contato.php?mensagem=naoEnviada");
        }
            
    }

    public function atualizarFuncionario(){//funcao para o administrador atualiza o funcionario
        session_start();
        $email = $_SESSION['login'];//pega email atual da conta
        $senha = $_SESSION['password'];//pega senha atual da conta
        $result = $this->cadastrar->atualizarContaFuncionario($_GET['id'], $_GET['cargo'], $_GET['permissoes']);
        
        if($result >= 1){
            header('Location: consulta.php?consulta=funcionario&atualizarConta=sucess');//manda pra pagina entrar
        }else{
            header('Location: consulta.php?consulta=funcionario&atualizarConta=sucess');//manda pra pagina entrar
        }
    }

}
new Controller();
?>