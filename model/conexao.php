<?php

//conexão com o banco de dados
// define('BD_SERVIDOR','localhost');
// define('BD_USUARIO','id19879675_root');
// define('BD_SENHA','wg5dj\$[nO3/lGOT');
// define('BD_BANCO','id19879675_sjm'); 

define('BD_SERVIDOR','us-cdbr-east-06.cleardb.net');
define('BD_USUARIO','b5cf66072f3974');
define('BD_SENHA','43b78306');
define('BD_BANCO','heroku_e0261504408fe1d'); 


//conexão com o banco de dados
// define('BD_SERVIDOR','localhost');
// define('BD_USUARIO','root');
// define('BD_SENHA','');
// define('BD_BANCO','sjm');

class Conexao{
    
    protected $mysqli;
    private $cadastrar;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
    }

    public function cadastrar($nome, $nomeUsuario, $email, $senha, $cep, $endereco, $numeroCasa, $complemento, $cidade, $estado){
        $stmt = $this->mysqli->query("SELECT * FROM `tbclientes` WHERE email = '$email';");//"pesquisa" usuario na tabela cliente
        $lista = $stmt->fetch_all(MYSQLI_ASSOC);
        
        if(count($lista) >= 1){//caso ja tenha um cadastro com esse email na tabela de clientes
            echo "<script>document.location='entrar.php?cadCli=EmailJaCadastrado'</script>";//manda pra pagina de login com mensagem de email ja cadastrado
        }else{//caso nao encontre registro na tabela cliente
            $stmt = $this->mysqli->query("SELECT * FROM `tbfuncionario` WHERE email = '$email';");//"pesquisa" usuario na tabela funcionario
            $lista = $stmt->fetch_all(MYSQLI_ASSOC);
            if(count($lista) >=1){//caso ja tenha um cadastro com esse email na tabela funcionario
                echo "<script>document.location='entrar.php?cadCli=EmailJaCadastrado'</script>";//manda pra pagina de login com mensagem de email ja cadastrado
            }else{
                $stmt = $this->mysqli->query("INSERT INTO `tbclientes`(`nome`, `nomeUsuario`, `email`, `senha`, `cep`, `endereco`, `numero`, `complemento`, `cidade`, `estado`, `EstadoConta`) 
                VALUES ('$nome','$nomeUsuario','$email','$senha','$cep','$endereco','$numeroCasa','$complemento','$cidade','$estado', 'Ativo')");
                echo "<script>document.location='entrar.php?cad=sucess'</script>";//manda pra pagina entrar
            }
        }
    }

    public function entrar($emailLogin, $senhaLogin){
        $stmt = $this->mysqli->query("SELECT * FROM `tbclientes` WHERE `email` = '$emailLogin' AND `senha` = '$senhaLogin';");
        session_start();
        if( $stmt > 0){
            $lista = $stmt->fetch_all(MYSQLI_ASSOC);
            if(count($lista) >=1){//caso a lista seja maior ou igua 1 (se o usuario possuir uma conta com os dados digitados)
                $f_lista = array();//cria um array
                $i = 0;
                foreach ($lista as $l) {//pega todas as informações do usuario
                    $f_lista[$i]['id'] = $l['id'];
                    $f_lista[$i]['nome'] = $l['nome'];
                    $f_lista[$i]['nomeUsuario'] = $l['nomeUsuario'];
                    $f_lista[$i]['email'] = $l['email'];
                    $f_lista[$i]['senha'] = $l['senha'];
                    $f_lista[$i]['cep'] = $l['cep'];
                    $f_lista[$i]['endereco'] = $l['endereco'];
                    $f_lista[$i]['numero'] = $l['numero'];
                    $f_lista[$i]['complemento'] = $l['complemento'];
                    $f_lista[$i]['cidade'] = $l['cidade'];
                    $f_lista[$i]['estado'] = $l['estado'];
                    $f_lista[$i]['imgConta'] = $l['imgConta'];
                    $f_lista[$i]['EstadoConta'] = $l['EstadoConta'];
                    $i++;
                }
                if($f_lista[0]["EstadoConta"][0] == "A"){//caso a conta esteja ativado
                    //define usuario como logado
                    $_SESSION['logado'] = True;
                    //passa todas as informações do usuario para sessões
                    $_SESSION['id'] = $f_lista[0]["id"];
                    $_SESSION['nome'] = $f_lista[0]["nome"];
                    $_SESSION['nomeUsuario'] = $f_lista[0]["nomeUsuario"];
                    $_SESSION['login'] = $f_lista[0]["email"];
                    $_SESSION['password'] = $f_lista[0]["senha"];
                    $_SESSION['cep'] = $f_lista[0]["cep"];
                    $_SESSION['endereco'] = $f_lista[0]["endereco"];
                    $_SESSION['numero'] = $f_lista[0]["numero"];
                    $_SESSION['complemento'] = $f_lista[0]["complemento"];
                    $_SESSION['cidade'] = $f_lista[0]["cidade"];
                    $_SESSION['estado'] = $f_lista[0]["estado"];
                    $_SESSION['imgConta'] = $f_lista[0]["imgConta"];
                    $_SESSION['EstadoConta'] = $f_lista['EstadoConta'];
                    header("Location: index.php");
                }else{//caso a conta nao esteja ativado não loga e aparece uma mensagem para entrar em contato
                    header("Location: entrar.php?contaDesativado=true");
                    $_SESSION['contaLogado'] = "desativado";
                    $_SESSION['logado'] = False;
                }
            }else{//caso nao encontre resultado na tabela de cliente, procurar na tabela de funcionario
                $stmt = $this->mysqli->query("SELECT * FROM `tbfuncionario` WHERE `email` = '$emailLogin' AND `senha` = '$senhaLogin';");
                session_start();
                $lista = $stmt->fetch_all(MYSQLI_ASSOC);
                if(count($lista) >=1){//caso a lista seja maior ou igua 1 (se o usuario possuir uma conta com os dados digitados)
                    $_SESSION['funcionario'] = True;
                    $f_lista = array();//cria um array
                    $i = 0;
                    foreach ($lista as $l) {//pega todas as informações do usuario
                        $f_lista[$i]['idFuncionario'] = $l['idFuncionario'];
                        $f_lista[$i]['nome'] = $l['nome'];
                        $f_lista[$i]['cargo'] = $l['cargo'];
                        $f_lista[$i]['email'] = $l['email'];
                        $f_lista[$i]['senha'] = $l['senha'];
                        $f_lista[$i]['imgConta'] = $l['imgConta'];
                        $f_lista[$i]['permissoes'] = $l['permissoes'];
                        $f_lista[$i]['EstadoConta'] = $l['EstadoConta'];
                        $i++;
                    }
                    if($f_lista[0]["EstadoConta"][0] == "A"){//caso a conta esteja ativado
                        //define usuario como logado
                        $_SESSION['logado'] = True;
                        //passa todas as informações do usuario para sessões
                        $_SESSION['idFuncionario'] = $f_lista[0]["idFuncionario"];
                        $_SESSION['nome'] = $f_lista[0]["nome"];
                        $_SESSION['cargo'] = $f_lista[0]["cargo"];
                        $_SESSION['login'] = $f_lista[0]["email"];
                        $_SESSION['password'] = $f_lista[0]["senha"];
                        $_SESSION['imgConta'] = $f_lista[0]["imgConta"];
                        $_SESSION['permissoes'] = $l['permissoes'];
                        header("Location: index.php");
                    }else{//caso a conta nao esteja ativado não loga e aparece uma mensagem para entrar em contato
                        header("Location: entrar.php?contaDesativado=true");
                        $_SESSION['funcionario'] = False;
                        $_SESSION['logado'] = False;
                    }
                }else{//caso nao encontre nenhum valor (nem na tabela cliente e nem na de funcionarios)
                    $_SESSION['logado'] = FALSE;//define usuario como deslogado
                    $_SESSION['funcionario'] = False;
                    header("Location: entrar.php?entrar=semConta");//aparece mensagem de sem conta
                }
            }
        }else{//caso de algum erro
            header("Location: entrar.php?entrar=semConta");
        }
    }

    //funcao para mudar a imagem da conta
    public function atualizarImagemConta($imagemConta, $idUsuario){
        session_start();
        if($imagemConta['error']){//VERIFICA SE TEVE ALGUM ERRO
            die(header("Location: conta.php?alterarImagem=danger"));
        }

        $diretorioSalvar = "img/imgConta/";//diretorio para salvar imagem no site

         if(isset($_SESSION['cargo'])){//caso for um funcionario salvar a imagem com um nome diferente
            $nomeImagem =  "f" . strval($_SESSION['idFuncionario']);//deixa nome da imagem como o id do usuario
            $table = "tbfuncionario";
            $id = $_SESSION['idFuncionario'];
            $campoId = "idFuncionario";
         }else{
            $nomeImagem = $_SESSION['id'];//deixa nome da imagem como o id do usuario
            $table = "tbclientes";
            $id = $_SESSION['id'];
            $campoId = "id";
         }
         
        //pega extensao do arquivo e deixa em minusculo
        $extensaoImagem = strtolower(pathinfo($imagemConta['name'], PATHINFO_EXTENSION));

         if($extensaoImagem != "png" && $extensaoImagem != "jpg" && $extensaoImagem != "jpeg"){//caso nao seja uma imagem aparede mensagem de erro
            die(header("Location: conta.php?alterarImagem=extensaoErrada"));
         }

        //salva imagem na pasta img/imgConta/idCliente.extensao
        $moverImagem = move_uploaded_file($imagemConta['tmp_name'], $diretorioSalvar . $nomeImagem . "." . $extensaoImagem);//salva imagem no site
        //atualiza nome da imagem no banco de dados
        $stmt = $this->mysqli->query("UPDATE `$table` SET `imgConta` = '$nomeImagem.$extensaoImagem' WHERE $campoId = $id");//insere diretorio no banco de dados
         

        if( $stmt > 0){
            return true;
        }else{
           return false;
        }
    }

    //funcao para o cliente agendar um servico
    public function agendarServico($idCliente, $marca, $modelo, $descricaoProblema, $formaEnvio, $garantia){
        //define data e hora do pedido
        date_default_timezone_set('America/Sao_Paulo');
        $timezone = new DateTimeZone('America/Sao_Paulo');//pega data de São Paulo
        $data_hora = date('Y-m-d H:i');//define padrão de data para inserir na tabela (Ano-Mes-Dia Hora:Minuto)
        //salva no banco
        $stmt = $this->mysqli->query("INSERT INTO `tbservico`(`idCliente`, `marca`, `modelo`, `descricaoProblema`, `formaEnvio`, `garantia`, `dataServico`) 
        VALUES ('$idCliente','$marca','$modelo','$descricaoProblema', '$formaEnvio','$garantia', '$data_hora')");

        $stmt = $this->mysqli->query("SELECT * FROM tbservico");//lista servico

        $listaServico = $stmt->fetch_all(MYSQLI_ASSOC);
        $f_lista = array();//cria um array
        $i = 0;
        $idServico=count($listaServico);

        //atualiza status do pedido
        $stmt = $this->mysqli->query("INSERT INTO `tbstatuspedido`(`idCliente`, `idServico`) VALUES ('$idCliente', '$idServico')");

         if( $stmt > 0){
             return true;
         }else{
            return false;
         }
    }

    //lista todos os servicos
    public function getServico($id){
        try {
            if($id >=1){
                $stmt = $this->mysqli->query("SELECT * FROM tbservico WHERE idCliente = '" . $id . "';");
            }else{
                $stmt = $this->mysqli->query("SELECT * FROM tbservico;");
            }
            
            $lista = $stmt->fetch_all(MYSQLI_ASSOC);
            $f_lista = array();
            $i = 0;
            foreach ($lista as $l) {
                $f_lista[$i]['idCliente'] = $l['idCliente'];
                $f_lista[$i]['idServico'] = $l['idServico'];
                $f_lista[$i]['marca'] = $l['marca'];
                $f_lista[$i]['modelo'] = $l['modelo'];
                $f_lista[$i]['descricaoProblema'] = $l['descricaoProblema'];
                $f_lista[$i]['formaEnvio'] = $l['formaEnvio'];
                $f_lista[$i]['garantia'] = $l['garantia'];
                $f_lista[$i]['dataServico'] = $l['dataServico'];
                $i++;
            }
            return $f_lista;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }

        if( $stmt > 0){
            return true;
        }else{
           return false;
        }
    }

    //lista todos os clientes para o funcionario
    public function getClienteFuncionario($id){//lista os clientes para o funcionario
        if($id<=0){
            $stmt = $this->mysqli->query("SELECT * FROM tbclientes");
            
            $lista = $stmt->fetch_all(MYSQLI_ASSOC);
            $f_lista = array();
            $i = 0;
            foreach ($lista as $l) {
                $f_lista[$i]['id'] = $l['id'];
                $f_lista[$i]['nome'] = $l['nome'];
                $f_lista[$i]['nomeUsuario'] = $l['nomeUsuario'];
                $f_lista[$i]['email'] = $l['email'];
                $f_lista[$i]['senha'] = $l['senha'];
                $f_lista[$i]['cep'] = $l['cep'];
                $f_lista[$i]['endereco'] = $l['endereco'];
                $f_lista[$i]['numeroCasa'] = $l['numero'];
                $f_lista[$i]['complemento'] = $l['complemento'];
                $f_lista[$i]['cidade'] = $l['cidade'];
                $f_lista[$i]['estado'] = $l['estado'];
                $f_lista[$i]['imgContaCliente'] = $l['imgConta'];
                $f_lista[$i]['EstadoConta'] = $l['EstadoConta'];
                $i++;
            }
            return $f_lista;
        }else{
            
            $stmt = $this->mysqli->query("SELECT * FROM tbclientes WHERE id = $id");
            
            $lista = $stmt->fetch_all(MYSQLI_ASSOC);
            $f_lista = array();
            $i = 0;
            foreach ($lista as $l) {
                $f_lista[$i]['id'] = $l['id'];
                $f_lista[$i]['nome'] = $l['nome'];
                $f_lista[$i]['nomeUsuario'] = $l['nomeUsuario'];
                $f_lista[$i]['email'] = $l['email'];
                $f_lista[$i]['senha'] = $l['senha'];
                $f_lista[$i]['cep'] = $l['cep'];
                $f_lista[$i]['endereco'] = $l['endereco'];
                $f_lista[$i]['numeroCasa'] = $l['numero'];
                $f_lista[$i]['complemento'] = $l['complemento'];
                $f_lista[$i]['cidade'] = $l['cidade'];
                $f_lista[$i]['estado'] = $l['estado'];
                $f_lista[$i]['imgContaCliente'] = $l['imgConta'];
                $f_lista[$i]['EstadoConta'] = $l['EstadoConta'];
                $i++;
            }
            return $f_lista;
        }
    }

    //lista o status do servico para o cliente
    public function listarStatusServico($id){
        try {
            if($id>=1){
                $stmt = $this->mysqli->query("SELECT * FROM tbstatuspedido WHERE idCliente = '" . $id . "';");
            }else{
                $stmt = $this->mysqli->query("SELECT * FROM tbstatuspedido;");
            }
            $listaDois = $stmt->fetch_all(MYSQLI_ASSOC);
            $f_listaDois = array();
            $i = 0;
            foreach ($listaDois as $l) {
                $f_listaDois[$i]['idStatusPedido'] = $l['idStatusPedido'];
                $f_listaDois[$i]['idServico'] = $l['idServico'];
                $f_listaDois[$i]['idCliente'] = $l['idCliente'];
                $f_listaDois[$i]['idFuncionario'] = $l['idFuncionario'];
                $f_listaDois[$i]['statusServico'] = $l['statusServico'];
                $f_listaDois[$i]['mensagemFuncionario'] = $l['mensagemFuncionario'];
                $f_listaDois[$i]['dataLevarNotebook'] = $l['dataLevarNotebook'];
                $i++;
            }
            return $f_listaDois;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }

    //lista o status do servico para o funcionario
    public function listarServicoFuncionario($id){
        try {
            if($id>=1){
                $stmt = $this->mysqli->query("SELECT * FROM tbstatuspedido WHERE idStatusPedido = '" . $id . "';");
            }else{
                $stmt = $this->mysqli->query("SELECT * FROM tbstatuspedido;");
            }
            $listaDois = $stmt->fetch_all(MYSQLI_ASSOC);
            $f_listaDois = array();
            $i = 0;
            foreach ($listaDois as $l) {
                $f_listaDois[$i]['idStatusPedido'] = $l['idStatusPedido'];
                $f_listaDois[$i]['idServico'] = $l['idServico'];
                $f_listaDois[$i]['idCliente'] = $l['idCliente'];
                $f_listaDois[$i]['idFuncionario'] = $l['idFuncionario'];
                $f_listaDois[$i]['statusServico'] = $l['statusServico'];
                $f_listaDois[$i]['mensagemFuncionario'] = $l['mensagemFuncionario'];
                $f_listaDois[$i]['dataLevarNotebook'] = $l['dataLevarNotebook'];
                $i++;
            }
            return $f_listaDois;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }

    //lista todos os funcionario para a consulta
    public function exibirFuncionario($id){
        try {
            if($id>=1){
                $stmt = $this->mysqli->query("SELECT * FROM tbfuncionario WHERE idFuncionario = '" . $id . "';");
            }else{
                $stmt = $this->mysqli->query("SELECT * FROM tbfuncionario;");
            }
            $listaDois = $stmt->fetch_all(MYSQLI_ASSOC);
            $f_listaDois = array();
            $i = 0;
            foreach ($listaDois as $l) {
                $f_listaDois[$i]['idFuncionario'] = $l['idFuncionario'];
                $f_listaDois[$i]['nome'] = $l['nome'];
                $f_listaDois[$i]['cargo'] = $l['cargo'];
                $f_listaDois[$i]['email'] = $l['email'];
                $f_listaDois[$i]['senha'] = $l['senha'];
                $f_listaDois[$i]['imgContaFuncionario'] = $l['imgConta'];
                $f_listaDois[$i]['permissoes'] = $l['permissoes'];;
                $f_listaDois[$i]['EstadoConta'] = $l['EstadoConta'];
                $i++;
            }
            return $f_listaDois;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }

    //atualiza o servico pelo funcionario
    public function atualizarServico($idServico, $idFuncionario, $statusPedido, $dataEnvio, $mensagemFuncionario){
        try{
            $stmt = $this->mysqli->query("UPDATE `tbstatuspedido` SET `idFuncionario` = $idFuncionario, `statusServico` = '$statusPedido', `dataLevarNotebook` = '$dataEnvio', `mensagemFuncionario` = '$mensagemFuncionario' WHERE `idServico` = $idServico;");

            print_r($stmt);
            if( $stmt > 0){
                return true ;
            }else{
                return false;
            }
        }catch (Exception $e){

        }
    }

    //confirma pedido pelo usuario
    public function verificarPedido($idStatusServico){
        try{
            $stmt = $this->mysqli->query("UPDATE `tbstatuspedido` SET `statusServico` = 'Confirmado pelo usuário' WHERE idStatusPedido = $idStatusServico;");
        }catch(Exception $e){
            echo"nao foi";
        }
    }
    public function cancelarServicoUsuario($idStatusServico){//cancela pedido pelo usuario
        try{
            $stmt = $this->mysqli->query("UPDATE `tbstatuspedido` SET `statusServico` = 'Cancelado pelo usuário' WHERE idStatusPedido = $idStatusServico;");
        }catch(Exception $e){
        }
    }

    //confirma pedido pelo funcionario
    public function cancelarServicoFuncionario($idStatusServico, $idFuncionario, $dataEnvio, $mensagemFuncionario, $idServico){
        try{
            $stmt = $this->mysqli->query("UPDATE `tbstatuspedido` SET `statusServico` = 'Cancelado pelo funcionario', `idFuncionario` = '$idFuncionario', `dataLevarNotebook` = '$dataEnvio', `mensagemFuncionario` = '$mensagemFuncionario' WHERE idStatusPedido = $idStatusServico;");
        }catch(Exception $e){
        }
    }
    //aceita pedido pelo usuario
    public function aceitarPedidoUsuario($idStatusServico){
        try{
            $stmt = $this->mysqli->query("UPDATE `tbstatuspedido` SET `statusServico` = 'Confirmado pelo usuário' WHERE idStatusPedido = $idStatusServico;");
        }catch(Exception $e){
        }
    }

    public function confirmarPeloFuncionario($idStatusServico, $idFuncionario, $dataEnvio, $mensagemFuncionario, $idServico){
        $stmt = $this->mysqli->query("UPDATE `tbstatuspedido` SET `statusServico` = 'Confirmado pelo funcionario', `idFuncionario` = '$idFuncionario', `dataLevarNotebook` = '$dataEnvio', `mensagemFuncionario` = '$mensagemFuncionario' WHERE idStatusPedido = $idStatusServico;");
    }

    public function apagarConta($id, $conta, $nomeFuncionario){//funcao para o funcionario poder apagar conta do cliente ou do funcionario
        try{
            if($conta == "cliente"){
                $stmt = $this->mysqli->query("UPDATE `tbclientes` SET `EstadoConta` = 'Desativado por " . $nomeFuncionario ."' WHERE id =" . $id . ";");
            }elseif($conta == "funcionario"){
                $stmt = $this->mysqli->query("UPDATE `tbfuncionario` SET `EstadoConta` = 'Desativado por " . $nomeFuncionario ."' WHERE idFuncionario =" . $id . ";");
            }
        }catch(Exception $e){
        }
    }

    public function voltarConta($id, $conta, $nomeFuncionario){//funcao para o funcionario restaurar conta do clienre ou do funcionario
        try{
            if($conta == "cliente"){
                $stmt = $this->mysqli->query("UPDATE `tbclientes` SET `EstadoConta` = 'Ativado por " . $nomeFuncionario ."' WHERE id =" . $id . ";");
            }elseif($conta == "funcionario"){
                $stmt = $this->mysqli->query("UPDATE `tbfuncionario` SET `EstadoConta` = 'Ativado por " . $nomeFuncionario ."' WHERE idFuncionario =" . $id . ";");
            }
        }catch(Exception $e){
            echo"nao foi";
        }
    }

    public function incluirFuncionario($nome, $cargo, $email, $senha, $permissoes){//funcao para o adm adicionar um funcionario
        $stmt = $this->mysqli->query("SELECT * FROM `tbfuncionario` WHERE email = '$email';");
        $lista = $stmt->fetch_all(MYSQLI_ASSOC);

        if(count($lista) >=1){//caso ja tenha um cadastro com esse email na tabela funcionario
            echo "<script>document.location='cadastrarFuncionario.php?cadFun=EmailJaCadastrado'</script>";//manda pra pagina entrar
        }else{//caso nao encontre registro na tabela funcionario
            $stmt = $this->mysqli->query("SELECT * FROM `tbclientes` WHERE email = '$email';");
            $lista = $stmt->fetch_all(MYSQLI_ASSOC);
            if(count($lista) >= 1){//caso ja tenha um cadastro com esse email na tabela cliente
                echo "<script>document.location='cadastrarFuncionario.php?cadFun=EmailJaCadastrado'</script>";//manda pra pagina de login com mensagem de email ja cadastrado
            }else{
                $stmt = $this->mysqli->query("INSERT INTO `tbfuncionario`(`nome`, `cargo`, `email`, `senha`, `permissoes`, `EstadoConta`) 
                VALUES ('$nome', '$cargo', '$email', '$senha', '$permissoes', 'Ativo')");                
                echo "<script>document.location='cadastrarFuncionario.php?cad=sucess'</script>";//manda pra pagina entrar
            }
            
        }
    }

    //funcao para o cliente atualizar a propria conta
    public function updateContaCliente($id, $nome, $nomeUsuario, $email, $senha, $cep, $endereco, $numeroCasa, $complemento, $cidade, $estado){

        $stmt = $this->mysqli->query("UPDATE `tbclientes` SET `nome` = '$nome', `nomeUsuario` = '$nomeUsuario', `email` = '$email', `senha` = '$senha', `cep` = '$cep', `endereco` = '$endereco', `numero` = '$numeroCasa', `complemento` = '$complemento', `cidade` = '$cidade', `estado` = '$estado'  WHERE id = '" . $id . "'");//insere diretorio no banco de dados
        echo "UPDATE `tbclientes` SET `nome` = '$nome', `nomeUsuario` = '$nomeUsuario', `email` = '$email', `senha` = '$senha', `cep` = '$cep', `endereco` = '$endereco', `numero` = '$numeroCasa', `complemento` = '$complemento', `cidade` = '$cidade', `estado` = '$estado'  WHERE id = '" . $id . "'";
        if( $stmt > 0){
            return true;
        }else{
            return false;
        }
    }

    //funcao para o funcionario atualizar a propria conta
    public function updateContaFuncionario($id, $nome, $cargo, $email, $senha, $permissoes){

        $stmt = $this->mysqli->query("UPDATE `tbfuncionario` SET `nome` = '$nome', `cargo` = '$cargo', `email` = '$email', `senha` = '$senha', `permissoes` = '$permissoes'  WHERE idFuncionario = '" . $id . "'");//insere diretorio no banco de dados
        if( $stmt > 0){
            return true;
        }else{
            return false;
        }
    }

    //FUNCAO PRO ADMINISTRADOR ATUALIZAR CONTA DO FUNCIONARIO
    public function updateContaFuncionarioAdm($id, $cargo, $permissoes){

        $stmt = $this->mysqli->query("UPDATE `tbfuncionario` SET `cargo` = '$cargo', `permissoes` = '$permissoes'  WHERE idFuncionario = '" . $id . "'");//insere diretorio no banco de dados
        if( $stmt > 0){
            return true;
        }else{
            return false;
        }
    }

    //funcao enviar codigo de verificacao e alterar senha do usuario
    public function enviarCodEmail($email, $cod){
        $stmt = $this->mysqli->query("SELECT * FROM `tbclientes` WHERE `email` = '$email';");
        $listaDois = $stmt->fetch_all(MYSQLI_ASSOC);
        $f_listaDois = array();
        $i = 0;
        foreach ($listaDois as $l) {
            $f_listaDois[$i]['senha'] = $l['senha'];
            $i++;
        }

        return $f_listaDois;

        $msg = "Sua senha é: \n$f_listaDois[1]";
        $msg = wordwrap($msg,70);
        mail("$email","Recuperação de senha",$msg);
    }
}