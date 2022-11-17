<?php
    session_start();//inicia sessão
    $logado =  $_SESSION['logado'] ?? NULL;//pega sessão que verifica se o usuario esta logado ou nao
    if(!$logado) die(header('Location: index.php'));//caso o usuaio nao esteja logado manda redreciona para a pagina principal
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
        <?php include_once "menu.php" ?>
    </header>
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
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="servico.php">Serviços</a>
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
        <div class="container container-sobre">
            <?php
                if(isset($_GET['alterarImagem']) && $_GET['alterarImagem'] == 'sucess'){  //mostra mensagem de conta criada caso seja criado com sucessi ?>
                    <div class="div-mensagem-conta-criada-sucess">
                        <!-- MENSAGEM DE CONTA CRIADA -->
                        <div class="alert alerta-conta-success alert-success alert-dismissible fade show" style="width: 100%; display: block; margin-top:100px;" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Imagem alterada com sucesso!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div><!-- Sucesso -->
                    </div>
               <?php }elseif(isset($_GET['alterarImagem']) && $_GET['alterarImagem'] == 'danger'){ //mostra mensagem de conta nao criada caso tenha algum erro ao criar conta ?>

                    <div class="div-mensagem-conta-criada-danger">
                        <!-- MENSAGEM DE CONTA NÃO CRIADA -->
                        <div class="alert alerta-conta-danger alert-danger alert-dismissible fade show" style="width: 100%; display: block; margin-top:100px;" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Não foi possivel alterar sua imagem!</strong> Tente novamente mais tarde.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div><!-- Sucesso -->
                    </div>
           <?php } ?>

           <h1 class="titulo-sobre">Minha Conta</h1>
            <form method="POST" enctype="multipart/form-data" class="form-img-Conta" action="controller/Controller.php?funcao=mudarImagemConta">
                <label for="imgConta" class="label-mudar-img-conta">
                    <div class="mudar-img-conta">
                        <img src="img/imgConta/<?php echo $_SESSION['imgConta']; ?>" class="mudar-img-conta" height="100%" width="100%">
                        <div class="hover-mudar-img-conta">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#ccc" class="bi bi-camera-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
                            </svg>
                        </div>
                    </div>
                </label>
                <input class="item-form-img-conta" type="file" name="imgConta" id="imgConta" required accept="image/png, image/jpeg, image/jpg">
                <button class="btn-mudar-imagem" name="enviar" type="submit">Alterar imagem</button>
            </form>
        </div>
    </main>
    <?php include_once "footer.php" ?>
</body>
</html>