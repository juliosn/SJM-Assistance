<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once("$root\proj-IBM\model\cadastrar.php");

class Controller{

    private $cadastrar;

    public function __construct(){
        $this->cadastrar = new Cadastrar();
        //pega uma variavel get e chama a funcao correspondente
        if(isset($_GET['funcao']) && $_GET['funcao'] == "cadastrar"){
            $this->incluir();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "logar"){
            $this->logar();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "sair"){
            $this->sair();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "mudarImagemConta"){
            $this->alterarImagemConta();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "solicitarServico"){
            $this->incluirServico();
        }
        
    }

    private function incluir(){//funcao para cadastrar
        $email = addslashes($email);//adiciona uma barra em alguns caracteres
        $senha = addslashes($senha);//adiciona uma barra em alguns caracteres
        $login = password_hash($email, PASSWORD_DEFAULT);//criptografa o email
        $password = password_hash($senha, PASSWORD_DEFAULT);//criptografa a senha
        $this->cadastrar->setNome($_POST['txtNomeCadastro']);
        $this->cadastrar->setNomeUsuario($_POST['txtNomeUsuarioCadastro']);
        $this->cadastrar->setEmail($login);
        $this->cadastrar->setSenha($password);
        $this->cadastrar->setCep($_POST['txtCep']);
        $this->cadastrar->setEndereco($_POST['txtEndereco']);
        $this->cadastrar->setNumeroCasa($_POST['txtNumeroCasa']);
        $this->cadastrar->setComplemento($_POST['txtComplemento']);
        $this->cadastrar->setCidade($_POST['txtCidade']);
        $this->cadastrar->setEstado($_POST['txtEstado']);
        $result = $this->cadastrar->incluir();
        if($result >= 1){
            echo "<script>document.location='../entrar.php?cad=sucess'</script>";//manda pra pagina entrar
        }else{
            echo "<script>document.location='../entrar.php?cad=danger'</script>";//manda pra pagina entrar
        }
    }

    private function logar(){//funcao para logar
        $this->cadastrar->setEmailLogin($_POST['txtEmailEntrar']);
        $this->cadastrar->setSenhaLogin($_POST['txtSenhaEntrar']);
        $result = $this->cadastrar->logar();    
    }

    public function sair(){//funcao para sair, destroi a sessao
        $_SESSION = Array();
        session_destroy();
        header("Location: ../index.php");
    }

    public function alterarImagemConta(){//funcao para o cliente mudar imagem da conta
        $this->cadastrar->setImagemConta($_FILES['imgConta']);//chama metodo set passando a imagem como parametro
        $result = $this->cadastrar->alterarImagemConta();//chama funcao que altera imagem

        $email = $_SESSION['login']; echo "<br>";//pega email atual da conta
        $senha = $_SESSION['password']; echo "<br>";//pega senha atual da conta

        //fecha sessao para abrir novamente, pois ao alterar a imagem ele sai da conta
        $_SESSION = Array();//
        session_destroy();

        session_start();//inicia sessão
        $this->cadastrar->setEmailLogin($email);//seta email com o email da conta
        $this->cadastrar->setSenhaLogin($senha);//seta a senha com a senha da conta
        
        $result = $this->cadastrar->logar();//chama a funcao para logar novamnete
        if($result >= 1){
            header("Location: ../conta.php?alterarImagem=danger");
        }else{
            header("Location: ../conta.php?alterarImagem=sucess");
       }
    }

    public function incluirServico(){//inclui um servico pelo usuario
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
            echo "<script>document.location='../servico.php?servico=sucess'</script>";//manda pra pagina entrar
        }else{
            echo "<script>document.location='../servico.php?servico=danger'</script>";//manda pra pagina entrar
        }
    }

    public function listarServico($id){//lista todos od servicos para o funcionario e para o cliente
        $email = $_SESSION['login'];//pega email atual da conta
        $senha = $_SESSION['password'];//pega senha atual da conta

        return $result = $this->cadastrar->listarServico($id);

        $_SESSION = Array();//
        session_destroy();

        session_start();//inicia sessão
        $this->cadastrar->setEmailLogin($email);//seta email com o email da conta
        $this->cadastrar->setSenhaLogin($senha);//seta a senha com a senha da conta

        $result = $this->cadastrar->logar();//chama a funcao para logar novamnete
        
    }

    public function statusServico($id){//lista o status do servico para o cliente e para o funcionario
        $email = $_SESSION['login'];//pega email atual da conta
        $senha = $_SESSION['password'];//pega senha atual da conta
        return $result = $this->cadastrar->statusServico($id);

        $_SESSION = Array();//
        session_destroy();

        session_start();//inicia sessão
        $this->cadastrar->setEmailLogin($email);//seta email com o email da conta
        $this->cadastrar->setSenhaLogin($senha);//seta a senha com a senha da conta

        $result = $this->cadastrar->logar();//chama a funcao para logar novamnete
    }
    
    public function listarClienteFuncionario(){//lista todos os clientes para mostrar na pagina de servico do funcionario
        $email = $_SESSION['login'];//pega email atual da conta
        $senha = $_SESSION['password'];//pega senha atual da conta
        return $result = $this->cadastrar->listarClienteFuncionario();

        $_SESSION = Array();//
        session_destroy();

        session_start();//inicia sessão
        $this->cadastrar->setEmailLogin($email);//seta email com o email da conta
        $this->cadastrar->setSenhaLogin($senha);//seta a senha com a senha da conta

        $result = $this->cadastrar->logar();//chama a funcao para logar novamnete
    }

    public function atualizarPedido($statusServico){//funcao que aceita ou cancela pedio pelo usuario ou pelo funcionario
        $email = $_SESSION['login'];//pega email atual da conta
        $senha = $_SESSION['password'];//pega senha atual da conta

        if($_SESSION['idFuncionario']){//caso seja um funcionario que esteja logado, pega o id dele e set no status do servico
            $idFuncionario = $_SESSION['idFuncionario'];
            $this->cadastrar->setIdFuncionario($_SESSION['idFuncionario']);
        }
         if(isset($_POST['txtStatusServico'])){//caso tenha o status do servico pega e seta na variavel statusServico
            $statusServico = $_POST['txtStatusServico'];
         }

        $mensagemFuncionario = $_POST['txtMensagemFuncionario'];
        $idServico = $_POST['idServico'];
        $this->cadastrar->setIdServico($_POST['idServico']);
        $this->cadastrar->setStatusPedido($statusServico);
        $this->cadastrar->setDataEnvio($_POST['txtDataEnvio']);
        $this->cadastrar->setMensagemFuncionario($_POST['txtMensagemFuncionario']);


        $result = $this->cadastrar->atualizarPedido();    
         if($result >= 1){
                echo "<script>document.location='servico.php?servico=sucess'</script>";//manda pra pagina entrar
         }else{
             echo "<script>document.location='servico.php?servico=danger'</script>";//manda pra pagina entrar
         }
    }

    public function listarFuncionario($id){//lista todos od funcionarios
        $email = $_SESSION['login'];//pega email atual da conta
        $senha = $_SESSION['password'];//pega senha atual da conta
        return $result = $this->cadastrar->listarFuncionario($id);

        $_SESSION = Array();//
        session_destroy();

        session_start();//inicia sessão
        $this->cadastrar->setEmailLogin($email);//seta email com o email da conta
        $this->cadastrar->setSenhaLogin($senha);//seta a senha com a senha da conta

        $result = $this->cadastrar->logar();//chama a funcao para logar novamnete
    }

    public function excluirConta($id, $conta, $nomeFuncionario){//funcao que aceita ou cancela pedio pelo usuario ou pelo funcionario
        $email = $_SESSION['login'];//pega email atual da conta
        $senha = $_SESSION['password'];//pega senha atual da conta

        if($id >=2){
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
        }else{
            echo "<script>document.location='../consulta.php?excluirConta=danger'</script>";//manda pra pagina entrar
        }
    }

    public function recuperarConta($id, $conta, $nomeFuncionario){//funcao que aceita ou cancela pedio pelo usuario ou pelo funcionario
        $email = $_SESSION['login'];//pega email atual da conta
        $senha = $_SESSION['password'];//pega senha atual da conta

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

    public function testeSenha($email, $senha){
       $email = password_verify($email, "as");
       echo $email; echo "<br>";

       $senha = password_verify($senha, $password);
       echo $senha; echo "<br>";
    }

}
new Controller();
?>