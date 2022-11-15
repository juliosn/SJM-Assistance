<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once("$root\proj-IBM\model\cadastrar.php");

class Controller{

    private $cadastrar;

    public function __construct(){
        $this->cadastrar = new Cadastrar();
        if(isset($_GET['funcao']) && $_GET['funcao'] == "cadastrar"){
            $this->incluir();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "logar"){
            $this->logar();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "sair"){
            $this->sair();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "mudarImagemConta"){
            $this->alterarImagemConta();
        }
        
    }

    private function incluir(){
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

    private function logar(){
        $this->cadastrar->setEmailLogin($_POST['txtEmailEntrar']);
        $this->cadastrar->setSenhaLogin($_POST['txtSenhaEntrar']);
        $result = $this->cadastrar->logar();
          if($result >= 1){
          echo "<script>document.location='../entrar.php?cad=sucess'</script>";//manda pra pagina entrar
          }else{
              echo "<script>document.location='../entrar.php?cad=danger'</script>";//manda pra pagina entrar
          }
    }

    public function sair(){
        $_SESSION = Array();
        session_destroy();
        header("Location: ../index.php");
    }

    public function alterarImagemConta(){
        $this->cadastrar->setImagemConta($_FILES['imgConta']);
        $result = $this->cadastrar->alterarImagemConta();

        $email = $_SESSION['email'];
        $senha = $_SESSION['senha'];

        $_SESSION = Array();
        session_destroy();

        
        session_start();//inicia sessão
        $this->cadastrar->setEmailLogin($email);
        $this->cadastrar->setSenhaLogin($senha);
        
        $result = $this->cadastrar->logar();
        if($result >= 1){
            header("Location: ../conta.php?alterarImagem=danger");
        }else{
            header("Location: ../conta.php?alterarImagem=sucess");
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