<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- DECLARAÇÃO DE TECNOLOGIAS E PROPRIEDADES DO SISTEMA: -->
    <meta name="description" content="Assistência técnica de notebooks">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SJM Assistance</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">  
    <script src="bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="img/sjm.png" type="image/x-icon">
</head>
<body>
    <header>
        <?php include_once "menu.php" ?><!-- Chama arquivo menu para adicionar menu -->
        <div class="container">
            <!-- Carrossel de imagens -->
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="img-carrousel bd-placeholder-img bd-placeholder-img-lg d-block w-100" src="img/conserto2.png" alt="" srcset="">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="img-carrousel bd-placeholder-img bd-placeholder-img-lg d-block w-100" src="img/conserto1.png" alt="" srcset="">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
    </header>
    <main>
        <div class="opnioes container"><!-- Tipos de Serviços -->
            <div class="row">
                <div class="col">
                    <h1 class="title-marca">Tipos de Serviço</h1>
                </div>
            </div>
            <div class="row div-servico">
                <div class="col servico">
                    <img class="img-servicos" src="img/conserto2.png" alt="" srcset="">
                </div> 
                <div class="col servico col-text">
                    <h1>Problemas na Bateria</h1>
                    <p class="text-servico">
                    Acha que sua bateria está viciada? Ela descarrega tão rápido que mal 
                    dá para mexer? Podemos te ajudar com esse importuno!!
                    </p>
                    <a href="entrar.php" class="btn btn-saiba-mais">Entrar em contato</a>
                </div>
            </div>
            <div class="row div-servico">
                <div class="col servico">
                    <h1>Troca de Placa-Mãe</h1>
                    <p class="text-servico">
                        Seu notebook parou de funcionar? É possível que o problema seja na placa-mãe.
                    </p>
                    <a href="entrar.php" class="btn btn-saiba-mais">Entrar em contato</a>
                </div>
                <div class="col servico">
                    <img class="img-servicos" src="img/placa_mae.png" alt="" srcset="">
                </div>
            </div>
            <div class="row div-servico">
                <div class="col servico">
                    <img class="img-servicos" src="img/sistema_seguranca.png" alt="" srcset="">
                </div>
                <div class="col servico">
                    <h1>Sistema de Segurança</h1>
                    <p class="text-servico">
                    Podemos te ajudar na hora de implementar uma trava de segurança ou até mesmo um antivírus.
                    </p>
                    <a href="entrar.php" class="btn btn-saiba-mais">Entrar em contato</a>
                </div>
            </div>
            <div class="row div-servico">
                <div class="col servico">
                    <h1>Sistemas Operacionais</h1>
                    <p class="text-servico">
                    Instalação ou atualização do sistema operacional.
                    </p>
                    <a href="entrar.php" class="btn btn-saiba-mais">Entrar em contato</a>
                </div>
                <div class="col servico">
                    <img class="img-servicos" src="img/sistema_operacional.png" alt="" srcset="">
                </div>
            </div>
        </div>
        
        <div class="container"><!-- Marcas Parceiras -->
            <div class="marcas-parceiras">
                <h1 class="title-marca">Confira Marcas Parceiras</h1>
                <div class="row">
                    <div class="col marca bd-highlight">
                        <h1>HP</h1>
                        <p class="text-marcas-parceiras">A HP Inc., é uma empresa de tecnologia 
                            americana criada em 2015. É conhecida por desenvolver e fornecer 
                            hardware, como computadores pessoais, impressoras e soluções de impressão.
                            3D.<br><br></p>
                        <a href="https://www.hp.com/br-pt/shop/hp-intel?gclid=EAIaIQobChMIxMTP4qak-wIVVxXUAR1rWwUUEAAYASAAEgK2zvD_BwE&gclsrc=aw.ds" class="btn btn-saiba-mais">Saiba mais</a>
                    </div>
                    <div class="col marca">
                        <h1>Acer</h1>
                        <p class="text-marcas-parceiras">Fundada em 2000, a Acer Incorporated é um empresa responsável por oferecer produtos como computadores de 
                            mesas (desktops), computadores móveis (laptops), servidores, periféricos de 
                            armazenamento de dados, display e soluções em e-business.</p>
                        <a href="https://br-store.acer.com/?utm_medium=cpc&utm_source=google&utm_campaign=SEM-Amplo-Acer&utm_term=geral&utm_content=Acer-Amplo_Notebooks&gclid=EAIaIQobChMIkpaUmqek-wIVCRXUAR0b3AcTEAAYASAAEgLZKvD_BwE" class="btn btn-saiba-mais">Saiba mais</a>
                    </div>
                    <div class="col marca">
                        <h1>Asus</h1>
                        <p class="text-marcas-parceiras">Considera a 5ª maior fornecedora de PCs do mundo em 2017, 
                            a AsusTek Computer Inc., é um empresa de hardware e 
                            eletrônicos, desenvolvendo vários produtos como laptops, desktops, 
                            telefones celulares, placas-mãe, entre diversas outra coisas.</p>
                        <a href="https://www.asus.com/br/?utm_source=google&utm_medium=cpc&utm_campaign=22q3_notebook_bz&utm_content=institucional_search__8&gclid=EAIaIQobChMIt63Viamk-wIVCk-RCh2CZgWPEAAYASAAEgLHl_D_BwE" class="btn btn-saiba-mais">Saiba mais</a>
                    </div>
                    <div class="col marca">
                        <h1>Positivo</h1>
                        <p class="text-marcas-parceiras">Empresa inteiramente brasileira, a Positivo Tecnologia foi fundando em Curitiba, em 1989.
                            A empresa é a décima maior fabricante de computadores do mundo,
                            além de produzir softwares educacionais, jogos eletrônicos e set-top box para a televisão 
                            digital brasileira.
                        </p>
                        <a href="https://loja.meupositivo.com.br/notebooks?gclid=EAIaIQobChMIq8Oi16mk-wIVBEVIAB2iDwUIEAAYASAAEgL7kPD_BwE" class="btn btn-saiba-mais">Saiba mais</a>
                    </div>
                </div>
            </div>
            <hr>
        </div>

        <!-- caso o usuario nao esteja logado, adiciona uma mensagem no canto inferior da tela para ele logar ou criar uma conta -->
        <?php
            $logado =  $_SESSION['logado'] ?? NULL;//pega sessão que verifica se o usuario esta logado ou nao
            if(!$logado){//caso o usuaio esteja logado, exibe a mensagem ?>
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <img src="img/sjm.png" height="20px" class="rounded me-2" alt="...">
                            <strong class="me-auto" style="font-size:16px;">SJM</strong>
                            <small>Agora</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body" style="font-size:16px;">
                            Crie sua conta <a href="cadastro.php">aqui!</a> Ou entre por <a href="entrar.php">aqui!</a>
                        </div>
                    </div>
                </div>

                <!-- Script para mostrar notificação para o usuario logar -->
                <script>
                    var toastLiveExample = document.getElementById('liveToast')
                    var toast = new bootstrap.Toast(toastLiveExample)
                    toast.show()
                </script>
          <?php  }
        ?>
    </main>

    <?php include_once "footer.php" ?><!-- chama arquivo footer.php para adicionar footer -->
</body>
</html>