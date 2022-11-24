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
            <a class="navbar-brand logo-pc" href="index.php "><img src="img/sjm.png" height="70" alt="" srcset=""></a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <?php if(empty($_SESSION['funcionario']) || $_SESSION['funcionario'] == False){ ?>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Serviços
                        </a>
                        <ul class="dropdown-menu">
                            <a class="dropdown-item" href="servico.php?servico=meuServico">Meus Serviços</a>
                            <a class="dropdown-item" href="servico.php?servico=solicitarServico">Solicitar Serviço</a>
                        </ul>
                    </li>
                <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="servico.php">Serviços</a>
                    </li>
                <?php } ?>
                <?php if(empty($_SESSION['funcionario']) || $_SESSION['funcionario'] == False){ // caso seja um cliente, mostrar pagina de contato e sobre ?>
                    <li class="nav-item">
                        <a class="nav-link" href="contato.php">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sobre.php">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dicas.php">Dicas</a>
                    </li>
                <?php }else{ //caso seja um funcionario, motrar consulta e cadastrar funcionario 
                    if(isset($_SESSION['permissoes']) && $_SESSION['permissoes'] == "todas"){ ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Consulta
                        </a>
                        <ul class="dropdown-menu">
                            <a class="dropdown-item" href="consulta.php?consulta=cliente">Clientes</a>
                            <a class="dropdown-item" href="consulta.php?consulta=funcionario">Funcionario</a>
                            <a class="dropdown-item" href="consulta.php?consulta=servico">Serviços</a>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastrarFuncionario.php">Funcionario</a>
                    </li>
                <?php } }  ?>
            </ul>
            </div>
            <div class="nome-nav">
                <img src="img/sjm.png" height="60" class="img-logo-nav-cel" srcset="">
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
                                <li><a class="dropdown-item" href="Controller.php?funcao=sair">Sair</a></li>
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
                    <img src="img/sjm.png" height="60" alt="" srcset="">
                    SJM Assistance
                </a>
            </div>
            </form>
        </div>
    </div>
</nav>


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
            <?php if(isset($_SESSION['logado'])){ ?>
                <a class="navbar-brand logo-menu-celular" href="conta.php "><img class="img-conta-menu-cel" src="img/imgConta/<?php echo $_SESSION['imgConta'] ?>" height="200" alt="" srcset=""></a>
            <?php  }else{ ?>
                <a class="navbar-brand logo-menu-celular" href="index.php "><img src="img/logo-nome-grande.png" height="200" alt="" srcset=""></a>
            <?php } ?>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <?php if(empty($_SESSION['funcionario']) || $_SESSION['funcionario'] == False){ ?>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Serviços
                        </a>
                        <ul class="dropdown-menu">
                            <a class="dropdown-item" href="servico.php?servico=meuServico">Meus Serviços</a>
                            <a class="dropdown-item" href="servico.php?servico=solicitarServico">Solicitar Serviço</a>
                        </ul>
                    </li>
                <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="servico.php">Serviços</a>
                    </li>
                <?php } ?>
                <?php if(empty($_SESSION['funcionario']) || $_SESSION['funcionario'] == False){ // caso seja um cliente, mostrar pagina de contato e sobre ?>
                <li class="nav-item">
                    <a class="nav-link" href="contato.php">Contato</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sobre.php">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dicas.php">Dicas</a>
                </li>
                <?php }else{ //caso seja um funcionario, motrar consulta e cadastrar funcionario 
                    if(isset($_SESSION['permissoes']) && $_SESSION['permissoes'] == "todas"){ ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Consulta
                        </a>
                        <ul class="dropdown-menu">
                            <a class="dropdown-item" href="consulta.php?consulta=cliente">Clientes</a>
                            <a class="dropdown-item" href="consulta.php?consulta=funcionario">Funcionario</a>
                            <a class="dropdown-item" href="consulta.php?consulta=servico">Serviços</a>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastrarFuncionario.php">Funcionario</a>
                    </li>
                <?php } }  ?>
            <?php if(isset($_SESSION['logado'])){  ?>
                <li class="nav-item">
                    <p class="nav-link nav-login-cel" href="dicas.php"><?php echo $_SESSION['login']; ?></p>
                </li>
                <li class="nav-item">
                    <a href="Controller.php?funcao=sair" class="nav-link nav-login-cel" href="dicas.php">Sair</a>
                </li>
            <?php } ?>
        <?php if(!$_SESSION['logado']){  //aparecer botao para entrar e para cadastrar caso ele nao esteja logado ?>
            <div class="row" style="margin-top: 20px;">
                <div class="col col-btn-celular">
                    <a class="btn btn-entrar-footer" href="entrar.php">Entrar</a>
                </div>
                <div class="col col-btn-celular">
                    <a class="btn btn-cadastro-footer" href="cadastro.php">Cadastre-se</a></div>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>
</div>
</div>
<!-- MENU PARA CELULAR -->