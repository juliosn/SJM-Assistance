<?php
    session_start();
    $logado =  $_SESSION['logado'] ?? NULL;//pega sessão que verifica se o usuario esta logado ou nao
    //if(!$logado) die(header('Location: index.php'));//caso o usuaio nao esteja logado manda redreciona para a pagina principal
    require_once("Controller.php");
    $_SESSION['logado'] = True;
     if(empty($_SESSION['funcionario'])){//caso ele seja funcionario redireciona para a tela de controle de servico 
        die(header("Location: servico.php"));
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- DECLARAÇÃO DE TECNOLOGIAS E PROPRIEDADES DO SISTEMA: -->
    <meta name="description" content="Assistência técnica de notebooks">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SJM - Assistance - Serviços</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">  
    <script src="bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="img/sjm.png" type="image/x-icon">
    <script>
    function confirmarCancelamento(delUrl) {//funcao para confirmar o cancelamento do pedido
  			if (confirm("Deseja cancelar o pedido?")) {
   				document.location = delUrl;
	        }  
		}
	</script>
</head>
<body>
    <header>
        <?php include_once "menu.php"; ?>
    </header>
    <main>
        <div class="container container-servico container-servico-fun">
            <?php
                if(isset($_GET['NaoAceitarPedido']) && $_GET['NaoAceitarPedido'] == 'sucess'){   ?>
                    <!-- MENSAGEM DE SERVICO CANCELADO -->
                    <div class="div-mensagem-nao-aceitar-pedido-sucess">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Serviço cancelado com sucesso!</strong>. O usuário será notificado.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='controleServico.php'"></button>
                        </div><!-- Sucesso -->
                    </div>
               <?php }elseif(isset($_GET['NaoAceitarPedido']) && $_GET['NaoAceitarPedido'] == 'danger'){ //mostra mensagem de conta nao criada caso tenha algum erro ao criar conta ?>
                    <!-- MENSAGEM DE SERVICO NÃO CANCELADO -->
                    <div class="div-mensagem-nao-aceitar-pedido-danger">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Não foi possivel cancelado o serviço!</strong> Tente novamente mais tarde.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='controleServico.php'"></button>
                        </div><!-- Sucesso -->
                    </div>
            <?php } ?>

            <?php
                if(isset($_GET['AceitarPedido']) && $_GET['AceitarPedido'] == 'sucess'){   ?>
                    <!-- MENSAGEM DE SERVICO ACEITO -->
                    <div class="div-mensagem-aceitar-pedido-sucess">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Serviço aceito com sucesso!</strong>. O usuário será notificado.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='controleServico.php'"></button>
                        </div><!-- Sucesso -->
                    </div>
               <?php }elseif(isset($_GET['AceitarPedido']) && $_GET['AceitarPedido'] == 'danger'){ //mostra mensagem de conta nao criada caso tenha algum erro ao criar conta ?>
                    <!-- MENSAGEM DE SERVICO NAO ACEITO -->
                    <div class="div-mensagem-aceitar-pedido-danger">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Não foi possivel aceitar o serviço!</strong> Tente novamente mais tarde.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='controleServico.php'"></button>
                        </div><!-- Sucesso -->
                    </div>
            <?php } ?>
            
                <h1 class="titulo-servico">Serviços Solicitados</h1>
                <?php
                    $controller = new Controller();
                    $resultadoServico = $controller->listarServico(0);
                    $resultadoStatusServico = $controller->statusServico(0);
                    $resultadoCliente = $controller->listarClienteFuncionario(0);
                    $resultadoFuncionario = $controller->listarFuncionario(0);
                    //print_r($resultadoServico); echo "<br>";
                    //print_r($resultadoCliente);echo "<br>";
                    //print_r($resultadoFuncionario);echo "<br>";
                    for($i=0;$i<count($resultadoServico);$i++){ 
                ?>

                        <div class="row row-servico">
                            <div class="col col-servico">
                                <div class="caixa-servico">
                                    <div class="row">
                                        <div class="col col-caixa-servico">
                                            <?php 
                                                if($resultadoServico[$i]['formaEnvio'] == "levarAparelho"){
                                                    $formaEnvio = "Enviar aparelho até a loja";
                                                }else if($resultadoServico[$i]['formaEnvio'] == "EnviarCorreio"){
                                                    $formaEnvio = "Enviar aparelho pelo Correio";
                                                }else if($resultadoServico[$i]['formaEnvio'] == "ReceberTecnico"){
                                                    $formaEnvio = "Receber técnico em casa";
                                                }

                                                if($resultadoServico[$i]['garantia'] == "Sim"){
                                                    $garantia = "Incluso";
                                                }else{
                                                    $garantia = "Não incluso";
                                                }
                                            ?>
                                            <h1>
                                            <?php
                                                $resultadoImgContaCliente = $controller->listarClienteFuncionario($resultadoServico[$i]['idCliente']);
                                                //echo $resultadoImgContaCliente[0]['imgContaCliente'];
                                                if(empty($resultadoImgContaCliente[0]['imgContaCliente'])){ ?>
                                                    <div class="alinhar-img-conta-cliente"><div class="img-conta-listarpedido"></div> <?php echo $resultadoImgContaCliente[0]['nome'];  ?></div>
                                                <?php }else{ ?>
                                                    <img class="img-conta-listarpedido" src="img/imgConta/<?php echo $resultadoImgContaCliente[0]['imgContaCliente']; ?>" alt="" height="100"> <?php echo $resultadoImgContaCliente[0]['nome']; 
                                                }
                                            ?>
                                            </h1>
                                            <p>Marca: <?php echo $resultadoServico[$i]['marca']; ?></p>
                                            <p>Modelo: <?php echo $resultadoServico[$i]['modelo']; ?></p>
                                            <p>Descrição: <?php echo $resultadoServico[$i]['descricaoProblema']; ?></p>
                                            <p>Forma de entrega: <?php echo $formaEnvio; ?></p>
                                            <p>Garantia: <?php echo $garantia; ?></p>
                                        </div>
                                        <div class="col col-caixa-servico">
                                            <h3>Status do pedido:</h3>
                                            <?php if($resultadoStatusServico[$i]['statusServico'] == ""){  ?>
                                                <form action="" method="POST">
                                                    <input type="text" name="idServico" id="idServico" value=" <?php echo $resultadoStatusServico[$i]['idServico']; ?>" style="display:none">
                                                    <input type="text" class="form-control" id="txtDataEnvio" name="txtDataEnvio" placeholder="Data para enviar produto ou motivo pelo cancelamento" required select>
                                                    <textarea class="form-control textarea-descricao-problema" id="txtMensagemFuncionario" name="txtMensagemFuncionario" placeholder="Mensagem opcional para o cliente"></textarea>
                                                    <button class="btn btn-aceitar-pedido" id="btnAceitarPedido" name="btnAceitarPedido" type="submit">Aceitar Pedido</button>
                                                    <button class="btn btn-nao-aceitar-pedido" id="btnNaoAceitarPedido" name="btnNaoAceitarPedido">Não Aceitar Pedido</button>
                                            
                                                    </form>
                                            <?php }else{ ?>
                                                <?php
                                                        if($resultadoStatusServico[$i]['statusServico'] == "Cancelado pelo funcionario"){
                                                ?>
                                                            <p style="color: #dc3545">Pedido cancelado por: <?php echo $resultadoFuncionario[$resultadoStatusServico[$i]['idFuncionario'] -1]['nome']; ?></p>
                                                <?php  
                                                        }elseif($resultadoStatusServico[$i]['statusServico'] == "Cancelado pelo usuário"){ ?>
                                                            <p style="color: #dc3545">Pedido cancelado pelo usuário</p>
                                                <?php   }else{ ?>
                                                    <p style="color: #198754">Pedido aceito por: <?php echo $resultadoFuncionario[$resultadoStatusServico[$i]['idFuncionario'] -1]['nome']; ?></p>
                                                <?php
                                                        }
                                                ?>
                                                <form action="" method="POST">
                                                    <?php  
                                                         if(isset($resultadoStatusServico[$i]['statusServico']) && substr($resultadoStatusServico[$i]['statusServico'], 0, 9) == "Cancelado"){
                                                            $disabled = "disabled";
                                                        }else{ 
                                                            $disabled = "";
                                                     } ?>
                                                    <input <?php echo $disabled; ?> type="text" name="idServico" id="idServico" value=" <?php echo $resultadoStatusServico[$i]['idServico']; ?>" style="display:none">
                                                    <input <?php echo $disabled; ?> type="text" class="form-control" id="txtStatusServico" name="txtStatusServico" placeholder="Status do Pedido" required value="<?php echo $resultadoStatusServico[$i]['statusServico']; ?>" select>
                                                    <input <?php echo $disabled; ?> type="text" class="form-control" id="txtDataEnvio" name="txtDataEnvio" placeholder="Data para enviar produto ou motivo pelo cancelamento"  style="margin-top:10px" required value="<?php echo $resultadoStatusServico[$i]['dataLevarNotebook']; ?>" select>
                                                    <textarea <?php echo $disabled; ?> class="form-control textarea-descricao-problema" id="txtMensagemFuncionario" name="txtMensagemFuncionario" required placeholder="Mensagem para o cliente"><?php echo $resultadoStatusServico[$i]['mensagemFuncionario']; ?></textarea>
                                                    <?php if($resultadoStatusServico[$i]['statusServico'] != "Cancelado pelo usuário" && $resultadoStatusServico[$i]['statusServico'] != "Cancelado pelo funcionario"){ ?>
                                                        <button class="btn btn-aceitar-pedido" name="btnAtualizar" id="btnAtualizar" type="submit">Atualizar Pedido</button> 
                                                        <button class="btn btn-nao-aceitar-pedido" name="btnCancelar" id="btnCancelar" type="submit">Cancelar Pedido</button> 
                                                    <?php } ?>
                                                </form>

                                                <?php 
                                                extract($_POST, EXTR_OVERWRITE);

                                                if(isset($btnAtualizar)){ ?>
                                                    <script>location.href='Controller.php?funcao=atualizarPedidoFuncionario&funcaoAtualizarPedido=confirmadoPeloFuncionario&dataEnvio=<?php echo $_POST['txtDataEnvio']; ?>&mensagemFuncionario=<?php echo $_POST['txtMensagemFuncionario']; ?>&idServico=<?php echo $_POST['idServico']; ?>'</script>
                                                <?php }elseif(isset($btnCancelar)){ ?>
                                                    <script>location.href='Controller.php?funcao=atualizarPedidoFuncionario&funcaoAtualizarPedido=canceladoPeloFuncionario&dataEnvio=<?php echo $_POST['txtDataEnvio']; ?>&mensagemFuncionario=<?php echo $_POST['txtMensagemFuncionario']; ?>&idServico=<?php echo $_POST['idServico']; ?>'</script>
                                                <?php  }

                                                    if(isset($btnAceitarPedido)){ ?>
                                                        <script>location.href='Controller.php?funcao=atualizarPedidoFuncionario&funcaoAtualizarPedido=confirmadoPeloFuncionario&dataEnvio=<?php echo $_POST['txtDataEnvio']; ?>&mensagemFuncionario=<?php echo $_POST['txtMensagemFuncionario']; ?>&idServico=<?php echo $_POST['idServico']; ?>'</script>
                                                    <?php }elseif(isset($btnNaoAceitarPedido)){ ?>
                                                        <script>location.href='Controller.php?funcao=atualizarPedidoFuncionario&funcaoAtualizarPedido=canceladoPeloFuncionario&dataEnvio=<?php echo $_POST['txtDataEnvio']; ?>&mensagemFuncionario=<?php echo $_POST['txtMensagemFuncionario']; ?>&idServico=<?php echo $_POST['idServico']; ?>'</script>
                                                  <?php  }
                                                ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    } 	?>
                    </div>
                </div>
    </main>
    <?php include_once "footer.php" ?>
</body>
</html>