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
    <title>SJM Assistance - Dicas</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">  
    <script src="bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="img/sjm.png" type="image/x-icon">
</head>
<body>
    <header>
        <?php include_once "menu.php" ?>
    </header>
    <main>
        <div class="container">
            <div class="row row-dicas">
                <div class="col-6 col-img-dicas">
                    <img src="img/limpeza-notebook.png" class="img-dicas" srcset="">
                </div>
                <div class="col-6 col-text-dicas">
                    <div class="accordion accordion-flush" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Como limpar seu notebook sem danos
                            </button>
                          </h2>
                          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    1. Passe um pano de microfibra levemente umedecido para limpar a tela <br/>
                                    Para eliminar sujeiras da tela do seu notebook, indicamos usar um pano de microfibra seco, fazendo movimento 
                                    circulares para eliminar bem a sujeira. Caso tenha poeira ou mancha umedeça levemente o pano ou então use produtos 
                                    específicos para a limpeza de eletrônicos
                               </p>
                                <p>
                                    2. Use hastes flexíveis para limpar detalhadamente o teclado <br/>
                                    No seu teclado pode ter um acúmulo de sujeirinha entres as teclas. Indicamos utilizar hastes flexíveis para limpar bem
                                    as interseções entre os botões. Obs.: Para evitar que as teclas fiquem sujas e com marcas de gordura de dedo, a nossa 
                                    sugestão é nunca mexer no notebook com os dedos sujos de comida.
                                </p>
                                <p>
                                    3. Não se esqueça de limpar as entradas USB e saídas de ar com hastes flexíveis <br/>
                                    Use também uma haste flexível para limpar as saídas de ar e as entradas USB do notebook - lembrando de esfregar com 
                                    suavidade para evitar que grudem fiapos de algodão durante a limpeza. Assim, você evita o acúmulo de poeiras e, 
                                    consequentemente, protege melhor o notebook contra um possível superaquecimento.
                                </p>
                                <p>
                                    4. Você pode usar uma flanela macia levemente umedecida para limpar a estrutura do notebook <br/>
                                    Outra dica importante é usar uma flanela macia para limpar toda a estrutura do notebook - tanto a parte externa quanto 
                                    a interna. Vale destacar que o ideal é sempre evitar produtos de limpeza, pois eles podem acabar desbotando o material 
                                    do notebook e, em casos mais graves, até danificar alguma peça. Por isso, a nossa dica é sempre usar uma flanela 
                                    levemente umedecida para conseguir remover as sujeiras com facilidade.
                                </p>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-dicas">
                <div class="col-6 col-img-dicas">
                    <img src="img/cuidar-bateria.jpg" class="img-dicas">
                </div>
                <div class="col-6 col-text-dicas">
                    <div class="accordion accordion-flush" id="accordionDois">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
                                Cuidados com a Bateria
                            </button>
                          </h2>
                          <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                              <p>
                                1. As altas temperaturas prejudicam o desempenho e impedem que o aparelho 
                                trabalhe em sua melhor performance, além de acelerar a sua degradação. 
                                Por isso, evite usar o notebook na cama, no sofá, em cima de um cobertor 
                                ou almofada, pois os tecidos podem bloquear o fluxo de ar sob a máquina, 
                                onde os pequenos apoios criam espaço de ventilação. <br/>O superaquecimento pode 
                                provocar travamentos do computador, o que, se acontecer de forma recorrente,
                                vai reduzir a vida útil e comprometer o hardware e a bateria.
                              </p>
                              <p>
                                2.Evite carregadores sem marca <br/>
                                Se precisar comprar um carregador e fonte novos, prefira um modelo original 
                                do seu notebook ou de uma marca recomendada. 
                                Tenha atenção aos dados de voltagem e amperagem de saída (ou "output"), que 
                                precisam ser iguais ou muito próximos do indicado pelo fabricante, para 
                                reduzir riscos de acidente, sobrecarga, superaquecimento e outros danos 
                                na máquina.
                              </p>
                              <p>
                                3.Não deixe a bateria descarregar <br/>
                                A medição da bateria de um notebook é feita em ciclos: deixar a carga zerar,
                                a ponto de o computador desligar, significa encerrar um ciclo. 
                                De acordo com teste realizado pelo site batteryuniversity.com, com 300 
                                ciclos de descarga completa, a bateria perde 30% da sua capacidade.
                              </p>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-dicas">
                <div class="col-6 col-img-dicas">
                    <img src="img/transportar-notebook.png" class="img-dicas">
                </div>
                <div class="col-6 col-text-dicas">
                    <div class="accordion accordion-flush" id="accordionTres">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true" aria-controls="panelsStayOpen-collapseThree">
                                Dicas para transportar seu notebook corretamente
                            </button>
                          </h2>
                          <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                              <p>
                                1. Use uma mochila ou bolsa adequada <br/>
                                Escolher uma boa mochila ou bolsa para carregar o notebook é importante, tanto pela questão de conforto e praticidade 
                                quanto pela segurança do dispositivo. É importante verificar se o tamanho da mochila é adequado para o seu notebook, de 
                                acordo com o tamanho de tela, e se o material do item é resistente para evitar que rasgue ou sofra danos.
                              </p>
                              <p>
                                2. Não coloque peso sobre a tela <br/>
                                Ao transportar o notebook, é comum não prestar atenção e colocar objetos sobre ele, como livros, cadernos ou outros itens. 
                                Isso não é nada recomendável porque pode danificar a tela do seu computador.
                              </p>
                              <p>
                                3. Não utilize o notebook no ônibus ou carro <br/>
                                Devido aos problemas de infraestrutura das ruas, como buracos, e às movimentações naturais dos transportes durante o 
                                trajeto, existe o risco de se deslocar o disco rígido dentro do notebook.
                              </p>
                              <p>
                                4. Deixe o notebook desligado <br/>
                                Para evitar riscos, é importante deixar o notebook no modo de hibernação. Contudo, é ainda mais recomendável deixá-lo 
                                totalmente desligado, visto que isso ajudará a manter a vida útil da bateria e reduzirá aquecimentos do sistema por 
                                completo.
                              </p>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-dicas">
                <div class="col-6 col-img-dicas">
                    <img src="img/outras-dicas.webp" class="img-dicas">
                </div>
                <div class="col-6 col-text-dicas">
                    <div class="accordion accordion-flush" id="accordionQuatro">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="true" aria-controls="panelsStayOpen-collapseFour">
                                Outras Dicas
                            </button>
                          </h2>
                          <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                            <div class="accordion-body">
                              <p>
                                1. Transporte seguro <br/>
                                Maleta/mochila sempre! O transporte é essencial para aumentar a vida útil do seu equipamento. 
                                Levar nas mãos, debaixo do braço, soltos em bolsas e tantas outras situações, colocam em risco 
                                não só a estrutura do notebook como também suas conexões.
                              </p>
                              <p>
                                2. Fonte de Alimentação <br/>
                                Vários carregadores já vêm com um velcro no cabo para auxiliar na hora de guardar, mas de nada adianta se você embolar o fio e jogar na maleta.
                                Mantenha o fio do carregador organizado, pois o mau manuseio além de desgastar, pode resultar em mais gastos no fim do mês.                                
                              </p>
                              <p>
                                3. Mantenha os alimentos longe <br/>
                                Comida e notebook não combinam, resulta num prejuízo que aos poucos cresce e você nem percebe. 
                                Se acidentalmente cair algo, limpe com um pincel e não deixe acumular. No caso de água, desligue,
                                mantenha a calma, vire o equipamento de ponta cabeça e espere escorrer totalmente.
                              </p>
                              <p>
                                4. Não arrisque mexer sozinho no notebook <br/>
                                Por mais que existem milhares de tutoriais na internet, desmontar seu notebook não é como montar um quebra cabeças, mesmo aqueles mais difíceis.
                                Além de sempre sobrar um parafuso, qualquer ação interna (seja uma poeira a mais que entrou) traz efeitos imprevisíveis, então não arrisque! Os notebooks são aparelhos bem mais sensíveis que os Desktops.
                              </p>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      
    </main>
    <?php include_once "footer.php" ?>
</body>
</html>