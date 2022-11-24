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
    <title>SJM - Assistance - Sobre</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">  
    <script src="bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <?php include_once "menu.php" ?>
    </header>
    <main>
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