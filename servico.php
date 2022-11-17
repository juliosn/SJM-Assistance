<?php
    session_start();
    $logado =  $_SESSION['logado'] ?? NULL;//pega sessão que verifica se o usuario esta logado ou nao
    //if(!$logado) die(header('Location: index.php'));//caso o usuaio nao esteja logado manda redreciona para a pagina principal
    require_once("controller/Controller.php");
    $_SESSION['logado'] = True;
    if(isset($_SESSION['funcionario']) && $_SESSION['funcionario'] == True){//caso ele seja funcionario redireciona para a tela de controle de servico 
        die(header("Location: controleServico.php"));
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
    
    <div class="menu-servico">
            <div class="row"><a class="link-menu-servico" href="servico.php?servico=meuServico">Meus Serviços</a></div>
            <div class="row"><a class="link-menu-servico" href="servico.php?servico=solicitarServico">Solicitar Novo Serviço</a></div>
        </div>
    <main>
        <!-- MENU PARA CELULAR -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header" style="background: #002060; color: #fff">
                <button type="button" style="background: transparent; border:0; color: #fff" data-bs-dismiss="offcanvas">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
                </button>
                <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" style="background: #002060;">
                <div class=" navbar-dark">
                    <a class="navbar-brand logo-menu-celular" href="index.php "><img src="img/logo-nome-grande.png" height="200" alt="" srcset=""></a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="servico.php">Serviços</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contato.php">Contato</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sobre.php">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dicas.php">Dicas</a>
                        </li>
                    </ul>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col col-btn-celular">
                            <a class="btn btn-entrar-footer" href="entrar.php">Entrar</a>
                        </div>
                        <div class="col col-btn-celular">
                            <a class="btn btn-cadastro-footer" href="cadastro.php">Cadastre-se</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MENU PARA CELULAR -->
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
            
            <?php if(isset($_GET['servico']) && $_GET['servico']  == 'meuServico'){ ?>
                <h1 class="titulo-servico">Meus Serviços Solicitados</h1>
                <?php
                    $controller = new Controller();
                    $resultado = $controller->listarServico($_SESSION['id']);
                    $resultadoStatusPedido = $controller->statusServico($_SESSION['id']);
                    //print_r($resultado);
                    for($i=0;$i<count($resultado);$i++){ 
                ?>

                        <div class="row row-servico">
                            <div class="col col-servico">
                                <div class="caixa-servico">
                                    <div class="row">
                                        <div class="col col-caixa-servico">
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
                                            <h3>Status do pedido:</h3>
                                            <?php if(isset($resultadoStatusPedido[$i]['idFuncionario']) != 0){ ?>
                                                <p><?php echo $resultadoStatusPedido[$i]['statusServico']; ?></p>
                                                <p>Data da realização do pedido: <?php echo $resultado[$i]['dataServico']; ?></p>
                                                <?php
                                                    if($resultado[$i]['formaEnvio'] == "levarAparelho"){
                                                        echo "<p>Enviar aparelho até a loja dia {$resultadoStatusPedido[$i]['dataLevarNotebook']}</p>";
                                                    }else if($resultado[$i]['formaEnvio'] == "EnviarCorreio"){
                                                        echo "<p>Enviar aparelho pelo Correio {$resultadoStatusPedido[$i]['dataLevarNotebook']}</p>";
                                                    }else if($resultado[$i]['formaEnvio'] == "ReceberTecnico"){
                                                        $formaEnvio = "Receber técnico em casa";
                                                        echo "<p>Receber técnico em casa {$resultadoStatusPedido[$i]['dataLevarNotebook']}</p>";
                                                    }
                                                ?>
                                                <?php if($resultadoStatusPedido[$i]['mensagemFuncionario'] != ""){ ?>
                                                    <p>Mensagem do funcionario: <?php echo $resultadoStatusPedido[$i]['mensagemFuncionario']; ?></p>
                                                <?php } ?>
                                                <?php if($resultadoStatusPedido[$i]['dataTerminoServico'] != ""){ ?>
                                                    <p>Busque seu dispositivo em nossa loja dia: <?php echo $resultadoStatusPedido[$i]['dataTerminoServico']; ?></p>
                                                <?php } ?>
                                            <?php }else{ ?>
                                                <p>Em analise</p>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    } 	?>
                    </div>
                </div>
                
           <?php }else{ ?>
            <h1 class="titulo-solicitar-servico">Solicitar novo Serviço</h1>
                <div class="row row-esqueci-senha" style="justify-content: center; margin-top: 50px">
                    <div class="col-6 col-form-servico col-servico">
                        <form class="form-entrar needs-validation" method="POST" novalidate action="controller/Controller.php?funcao=solicitarServico">
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
                                <button onclick="location.href='cadastro2.php'" class="btn btn-finalizar-servico" type="submit">Finalizar</button>
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