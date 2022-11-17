<?php
    $_SESSION['logado'] =  $_SESSION['logado'] ?? NULL;
?>
<!-- NAV DO SITE: -->
<nav class="navbar navbar-expand-xl navbar-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- PÁGINAS DE NAVEGAÇÃO NO SITE: -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand logo-pc" href="index.php "><img src="img/SJM.png" height="70" alt="" srcset=""></a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <?php if($_SESSION['logado']){  ?>
                    <li class="nav-item">
                        <a class="nav-link" href="servico.php">Serviços</a>
                    </li>
                <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="entrar.php">Serviços</a>
                    </li>
                <?php } ?>
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
            </div>
            <div class="nome-nav">
                <img src="img/SJM.png" height="60" class="img-logo-nav-cel" srcset="">
                SJM Assistance
            </div>
            <!-- ACESSO PARA AS PÁGINAS DE LOGIN E CADASTRO -->
            <div class="d-btn">
                <?php if(!$_SESSION['logado']){  //aparecer botao para entrar e para cadastrar caso ele nao esteja logado ?>
                    <a class="btn btn-entrar" href="entrar.php">Entrar</a>
                    <a class="btn btn-cadastro" href="cadastro.php">Cadastre-se</a>
               <?php }else{ //aparecer conta aso ele esteja logado ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle dropdown-conta" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">     
                                <?php if($_SESSION['imgConta'] == NULL){ //caso o usuario nao tenha uma imagem de conta, mostrar somente a primeira letra do nome ?>
                                    <div class="img-conta"><?php echo $_SESSION['nome'][0]  //mostra primeira letra do nome na imagem da conta ?></div>
                                <?php }else{ //caso o usuario tenha uma imagem de conta mostrar a mesma ?>
                                    <img src="img/imgConta/<?php echo $_SESSION['imgConta']; ?>" class="img-conta" srcset="">
                               <?php } ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="conta.php">Conta</a></li>
                                <li><a class="dropdown-item" href="controller/Controller.php?funcao=sair">Sair</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><w class="dropdown-item dropdown-email" href="#"><?php echo $_SESSION['login']; ?></w></li>
                            </ul>
                        </li>
                        <style>
                            .d-btn{
                                width: 150px;
                            }
                        </style>
                <?php } ?>
            </div>
            <div class="nome-cel">
                <a class="link-nome-cel" href="index.php">
                    <img src="img/SJM.png" height="60" alt="" srcset="">
                    SJM Assistance
                </a>
            </div>
            </form>
        </div>
    </div>
</nav>