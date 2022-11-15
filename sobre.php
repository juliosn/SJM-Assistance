<?php
    session_start();
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
        <h1 class="titulo-sobre">Quem somos?</h1>
        <div class="container container-sobre">
            <div class="row">
                <div class="col col-sobre">
                    <img src="img/sobre.png" class="img-sobre" srcset="">
                </div>
            </div>
            <div class="row row-sobre">
                <div class="col">
                    <p class="txt-sobre">
                        Nós, integrantes da SJM Assistance, somos um grupo de profissionais que 
                        visam melhorar um aspecto do funcionamento de trabalho atual – os serviços
                        de assistência técnica. Com essa proposta, decidimos que ao criar a SJM, 
                        tentaríamos mudar a questão de otimização de tempo e qualidade de 
                        agendamento de serviços na área, porém tendo o foco total em serviços 
                        de notebooks. Acreditamos que essa proposta seja a menos atendida entre 
                        os aparelhos eletrônicos comuns, tendo menos conteúdo e informações sobre. 
                        Por isso, a SJM não só agenda e resolve os seus problemas, como ela também 
                        apresenta explicações sobre boas práticas e afins!
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="linha-sobre"></div>
                </div>
            </div>
            <div class="row row-qualidade">
                <div class="col">
                    <h3>Qualidade de ponta</h3>
                    <p class="txt-qualidade-sobre">
                        Profissionais especializados e experientes fazem do SJM - Assistance o lugar certo para solucionar os seus problemas. Trabalhamos com as principais marcas do mercado, com produtos modernos e 
                        inovadores no setor de informática.
                    </p>
                </div>
            </div>
            <div class="row row-marcas-sobre">
                <div class="col">
                    <img class="img-marcas-parceiras" src="img/positivo.png" alt="" srcset="">
                </div>
                <div class="col">
                    <img  class="img-marcas-parceiras"src="img/acer.png" alt="" srcset="">
                </div>
                <div class="col">
                    <img class="img-marcas-parceiras" src="img/asus.png" alt="" srcset="">
                </div>
                <div class="col">
                    <img class="img-marcas-parceiras" src="img/hp.png" alt="" srcset="">
                </div>
            </div>
        </div>
    </main>
    <?php include_once "footer.php" ?>
</body>
</html>