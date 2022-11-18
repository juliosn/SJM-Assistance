<?php
    session_start();
    $logado =  $_SESSION['logado'] ?? NULL;//pega sessão que verifica se o usuario esta logado ou nao
    //if(!$logado) die(header('Location: index.php'));//caso o usuaio nao esteja logado manda redreciona para a pagina principal
    require_once("controller/Controller.php");
    $_SESSION['logado'] = True;
     if(empty($_SESSION['funcionario'])){//caso ele seja funcionario redireciona para a tela de controle de servico 
        die(header("Location: servico.php"));
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- DECLARAÇÃO DE TECNOLOGIAS E PROPRIEDADES DO SISTEMA: -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SJM - Assistance</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="bootstrap/js/bootstrap.js"></script>
    <link rel="shortcut icon" href="img/SJM.png" type="image/x-icon">
</head>
<body>
    <header>
        <?php include_once "menu.php"; ?>
    </header>
    <main>
        <div class="container container-servico">
            <?php
                if(isset($_GET['servico']) && $_GET['servico'] == 'sucess'){  //mostra mensagem de conta criada caso seja criado com sucessi ?>
                    <div class="div-mensagem-conta-criada-sucess">
                        <!-- MENSAGEM DE CONTA CRIADA -->
                        <div class="alert alerta-conta-success alert-success alert-dismissible fade show" style="width: 100%; display: block; margin-top:100px;" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Serviço agendado com sucesso!</strong> Fique de olho que um técnico irá entrar em contato.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div><!-- Sucesso -->
                    </div>
               <?php }elseif(isset($_GET['servico']) && $_GET['servico'] == 'danger'){ //mostra mensagem de conta nao criada caso tenha algum erro ao criar conta ?>

                    <div class="div-mensagem-conta-criada-danger">
                        <!-- MENSAGEM DE CONTA NÃO CRIADA -->
                        <div class="alert alerta-conta-danger alert-danger alert-dismissible fade show" style="width: 100%; display: block; margin-top:100px;" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Não foi possivel agendar um serviço!</strong> Tente novamente mais tarde.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div><!-- Sucesso -->
                    </div>
            <?php } ?>
            
                <h1 class="titulo-servico">Serviços Solicitados</h1>
                <?php
                    $controller = new Controller();
                    $resultadoServico = $controller->listarServico(0);
                    $resultadoStatusServico = $controller->statusServico(0);
                    $resultadoCliente = $controller->listarClienteFuncionario();
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
                                            
                                            <h1><img src="img/imgConta/<?php echo $resultadoCliente[$resultadoServico[$i]['idCliente'] -1]['imgContaCliente']; ?>" alt="" height="100"> <?php echo $resultadoCliente[$resultadoServico[$i]['idCliente'] -1]['nome'] ?></h1>
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
                                                    <button class="btn btn-nao-aceitar-pedido" name="btnNaoAceitar" id="btnNaoAceitar">Não Aceitar Pedido</button>
                                            </form>
                                            <?php }else{ ?>
                                                <?php
                                                    if($resultadoStatusServico[$i]['idFuncionario'] != 0){ 
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

                                                <?php } ?>
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
                                                    $idStatusServico = $resultadoStatusServico[$i]['idStatusPedido'];
                                                    extract($_POST, EXTR_OVERWRITE);
                                                    if(isset($btnAceitarPedido)){
                                                        $statusServico = "Confirmado pelo funcionario";
                                                        $confirmarPedido = $controller->atualizarPedido($statusServico);
                                                    }elseif(isset($btnNaoAceitar)){
                                                        $_POST['txtStatusServico'] = "Cancelado pelo funcionario";
                                                        $statusPedido = "Cancelado pelo funcionario";
                                                        $cancelarPedido = $controller->atualizarPedido($statusPedido);
                                                    }

                                                    if(isset($btnAtualizar)){
                                                        $confirmarPedido = $controller->atualizarPedido($statusServico);
                                                    }elseif(isset($btnCancelar)){
                                                        $_POST['txtStatusServico'] = "Cancelado pelo funcionario";
                                                        $statusPedido = "Cancelado pelo funcionario";
                                                        $cancelarPedido = $controller->atualizarPedido($statusPedido);
                                                    }
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