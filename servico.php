<?php
    session_start();    
     require_once("Controller.php");

    $logado =  $_SESSION['logado'] ?? NULL;//pega sessão que verifica se o usuario esta logado ou nao

     if(!$logado) die(header('Location: entrar.php?crieConta=true'));//caso o usuaio nao esteja logado manda redreciona para a pagina de entrar

     if(isset($_SESSION['funcionario']) && $_SESSION['funcionario'] == True){//caso ele seja funcionario redireciona para a tela de controle de servico 
         die(header("Location: controleServico.php"));
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
    <title>SJM  Assistance  - Serviços</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">  
    <script src="bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="img/sjm.png" type="image/x-icon">
    <script>
    function confirmarCancelamento(delUrl) {//fucao para aparecer um alert e confirmar cancelamento do pedido
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
        <div class="container container-servico">
            <?php
                if(isset($_GET['servico']) && $_GET['servico'] == 'sucess'){ ?>
                    <!-- MENSAGEM DE SERVICO AGENDADO -->
                    <div class="div-mensagem-servico-agendado-sucess">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Serviço agendado com sucesso!</strong> Fique de olho que um técnico irá entrar em contato.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='servico.php'"></button>
                        </div><!-- Sucesso -->
                    </div>
               <?php }elseif(isset($_GET['servico']) && $_GET['servico'] == 'danger'){ ?>
                    <!-- MENSAGEM DE SERVICO NAO AGENDADO -->
                    <div class="div-mensagem-servico-agendado-danger">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Não foi possivel agendar um serviço!</strong> Tente novamente mais tarde.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='servico.php'"></button>
                        </div><!-- Sucesso -->
                    </div>
            <?php } ?>

            <?php
                if(isset($_GET['confirmarPedido']) && $_GET['confirmarPedido'] == 'sucess'){   ?>
                    <!-- MENSAGEM DE SERVICO CONFIRMADO -->
                    <div class="div-mensagem-servico-confirmado-sucess">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Serviço confirmado!</strong> Fique de olho na data para a entrega do notebook.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='servico.php?servico=meuServico'"></button>
                        </div><!-- Sucesso -->
                    </div>
               <?php }elseif(isset($_GET['confirmarPedido']) && $_GET['confirmarPedido'] == 'danger'){ ?>
                    <!-- MENSAGEM DE SERVICO NAO CONFIRMADO -->
                    <div class="div-mensagem-servico-confirmado-danger">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Não foi possivel confirmar o pedido!</strong> Tente novamente mais tarde.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='servico.php?servico=meuServico'"></button>
                        </div><!-- Sucesso -->
                    </div>
            <?php } ?>

            <?php
                if(isset($_GET['cancelarPedido']) && $_GET['cancelarPedido'] == 'sucess'){   ?>
                    <div class="div-mensagem-pedido-cancelado-sucess">
                        <!-- MENSAGEM DE SERVICO CANCELADO -->
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Serviço cancelado!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='servico.php?servico=meuServico'"></button>
                        </div><!-- Sucesso -->
                    </div>
               <?php }elseif(isset($_GET['cancelarPedido']) && $_GET['cancelarPedido'] == 'danger'){ ?>
                    <!-- MENSAGEM DE SERVICO NAO CANCELADO -->
                    <div class="div-mensagem-pedido-cancelado-danger">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Não foi possivel cancelar o pedido!</strong> Tente novamente mais tarde.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='servico.php?servico=meuServico'"></button>
                        </div><!-- Sucesso -->
                    </div>
            <?php } ?>
            
            <?php if(isset($_GET['servico']) && $_GET['servico']  == 'meuServico'){ ?>
                <?php
                    $controller = new Controller();
                    $resultado = $controller->listarServico($_SESSION['id']);
                    $resultadoStatusPedido = $controller->statusServico($_SESSION['id']); 
                    if(count($resultado)>=1){ //caso ele ja tenha feito algum pedido    
                ?>
                <h1 class="titulo-servico">Meus Serviços Solicitados</h1>
                <?php
                    for($i=0;$i<count($resultado);$i++){ 
                ?>

                        <div class="row row-servico">
                            <div class="col col-servico">
                                <div class="caixa-servico">
                                    <div class="row">
                                        <div class="col col-caixa-servico">
                                        <h3>Informações do dispositivo:</h3><br>
                                            <?php 
                                                if($resultado[$i]['formaEnvio'] == "levarAparelho"){
                                                    $formaEnvio = "Enviar aparelho até a loja";
                                                }else if($resultado[$i]['formaEnvio'] == "EnviarCorreio"){
                                                    $formaEnvio = "Enviar aparelho pelo Correio";
                                                }else if($resultado[$i]['formaEnvio'] == "ReceberTecnico"){
                                                    $formaEnvio = "Receber técnico em casa";
                                                }

                                                if($resultado[$i]['garantia'] == "Sim"){
                                                    $garantia = "Incluso";
                                                }else{
                                                    $garantia = "Não incluso";
                                                }
                                            ?>
                                            <p>Marca: <?php echo $resultado[$i]['marca']; ?></p>
                                            <p>Modelo: <?php echo $resultado[$i]['modelo']; ?></p>
                                            <p>Descrição: <?php echo $resultado[$i]['descricaoProblema']; ?></p>
                                            <p>Forma de entrega: <?php echo $formaEnvio; ?></p>
                                            <p>Garantia: <?php echo $garantia; ?></p>
                                        </div>
                                        <div class="col col-caixa-servico">
                                            <h3>Status do pedido:</h3><br>
                                            <?php if(isset($resultadoStatusPedido[$i]['idFuncionario']) != 0){ ?>
                                                <?php 
                                                    if($resultadoStatusPedido[$i]['statusServico'] == "Confirmado pelo usuário"){
                                                        echo "<p style='color: #198754'>Aguardando envio do notebook</p>";
                                                    }else{
                                                        if(substr($resultadoStatusPedido[$i]['statusServico'], 0, 9) == "Cancelado"){
                                                            echo "<p style='color: #dc3545;'>" . $resultadoStatusPedido[$i]['statusServico'] . "</p>";
                                                        }else{
                                                            echo "<p style='color: #198754'>" . $resultadoStatusPedido[$i]['statusServico'] . "</p>";
                                                        }
                                                    }
                                                ?>
                                                <p>Data da realização do pedido: <?php echo $resultado[$i]['dataServico']; ?></p>
                                                <?php
                                                    if(substr($resultadoStatusPedido[$i]['statusServico'], 0, 9) != "Cancelado" && $resultadoStatusPedido[$i]['idFuncionario'] != 0){
                                                        if($resultado[$i]['formaEnvio'] == "levarAparelho"){
                                                            echo "<p>Enviar aparelho até a loja dia {$resultadoStatusPedido[$i]['dataLevarNotebook']}</p>";
                                                        }else if($resultado[$i]['formaEnvio'] == "EnviarCorreio"){
                                                            echo "<p>Enviar aparelho pelo Correio <br/><br/> Data para levar o notebook: {$resultadoStatusPedido[$i]['dataLevarNotebook']}</p>";
                                                        }else if($resultado[$i]['formaEnvio'] == "ReceberTecnico"){
                                                            $formaEnvio = "Receber técnico em casa";
                                                            echo "<p>Receber técnico em casa {$resultadoStatusPedido[$i]['dataLevarNotebook']}</p>";
                                                        } 
                                                    }elseif(substr($resultadoStatusPedido[$i]['statusServico'], 0, 9) == "Cancelado"){
                                                        echo "<p class='text-servico'>Pedido Cancelado, se quiser faça um novo pedido</p>";
                                                    }else{
                                                        echo "<p class='text-servico'>Seu pedido ainda está sendo avaliado e será aceito por um funcionario</p>";
                                                    }
                                                if($resultadoStatusPedido[$i]['statusServico'] == "Cancelado pelo funcionario"){ ?>
                                                    <p>Motivo do cancelamento: <?php echo $resultadoStatusPedido[$i]['dataLevarNotebook']; ?></p>
                                                <?php } ?>
                                                <?php if($resultadoStatusPedido[$i]['mensagemFuncionario'] != ""){ ?>
                                                    <p>Mensagem do funcionario: <?php echo $resultadoStatusPedido[$i]['mensagemFuncionario']; ?></p>
                                                <?php } ?>
                                            <?php }else{ ?>
                                                <p>Em analise</p>
                                            <?php }?>
                                            <form action="" method="POST">
                                                <?php if($resultadoStatusPedido[$i]['statusServico'] != "Cancelado pelo usuário" && substr($resultadoStatusPedido[$i]['statusServico'], 0, 9) != "Cancelado"){ ?>
                                                    <button type="button" class="btn btn-cancelar-pedido" onclick="javascript:confirmarCancelamento('Controller.php?funcao=atualizarPedido&idStatusServico=<?php echo $resultadoStatusPedido[$i]['idStatusPedido']; ?>&funcaoAtualizarPedido=canceladoPeloUsuario')">Cancelar Pedido</button>
                                                <?php } ?>
                                            </form>

                                            <?php 
                                                $idStatusServico = $resultadoStatusPedido[$i]['idStatusPedido'];
                                                extract($_POST, EXTR_OVERWRITE);
                                                // echo $_POST['idServico']; 
                                                if(isset($btnConfirmarPedido)){ ?>
                                                    <script>location.href='Controller.php?funcao=atualizarPedido&funcaoAtualizarPedido=confirmadoPeloUsuario'</script>
                                                <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php 
                        }
                    }else{
						echo "<h1>Nenhum serviço encontrado!</h1>";
                    }
                    ?>
                    </div>
                </div>
                
           <?php }else{ ?>
            <h1 class="titulo-solicitar-servico">Solicitar novo Serviço</h1>
                <div class="row row-esqueci-senha" style="justify-content: center; margin-top: 50px">
                    <div class="col-6 col-form-servico col-servico">
                        <form class="form-entrar needs-validation" method="POST" novalidate action="Controller.php?funcao=solicitarServico">
                            <div class="row row-form-servico">
                            <div class="form-group col-md-6 mb-3">
                                <label for="txtMarca">Marca</label>
                                <input type="text" class="form-control" id="txtMarca" name="txtMarca" required select>
                                <div class="invalid-feedback">
                                    Por favor, informe a marca.
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="txtModelo">Modelo</label>
                                <input type="text" class="form-control" id="txtModelo" name="txtModelo" required>
                                <div class="invalid-feedback">
                                    Por favor, informe o modelo.
                                </div>
                            </div>
                            <div class="col-12" style="margin-top: 50px; margin-bottom: 30px;">
                                <label for="txtDescricaoProblema">Descrição do Problema</label>
                                <textarea class="form-control textarea-descricao-problema" id="txtDescricaoProblema" name="txtDescricaoProblema" required></textarea>
                                <div class="invalid-feedback">
                                    Por favor, informe o problema.
                                </div>
                            </div>
                            <div class="col-md-12 mb-3 div-opcao-entrega">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ropcaoFormaEnvio" id="levarAparelho" value="levarAparelho" checked>
                                    <label class="form-check-label" for="levarAparelho">
                                        Levar Aparelho
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ropcaoFormaEnvio" id="EnviarCorreio" value="EnviarCorreio">
                                    <label class="form-check-label" for="EnviarCorreio">
                                        Enviar Pelo Correio
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ropcaoFormaEnvio" id="ReceberTecnico" value="ReceberTecnico">
                                    <label class="form-check-label" for="ReceberTecnico">
                                    Receber técnico em casa
                                    </label>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3" style="margin-top: 30px;">
                                <input class="form-check-input" type="checkbox" value="checkadicionargarantia" name="checkadicionargarantia" id="checkadicionargarantia">
                                <label class="form-check-label" for="checkadicionargarantia">
                                        <span id="passwordHelpInline">
                                            Adicionar Garantia.
                                        </span>
                                </label>
                                
                                <p>Ao estender a garantia você adiciona um valor de x%. </p>
                            </div>
                            <div class="col-md-12 mb-3" style="margin-top: 30px; justify-content: center!important; display:flex">
                                <button class="btn btn-finalizar-servico" type="submit">Finalizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php } ?>

    </main>
    <?php include_once "footer.php" ?>
</body>
</html>