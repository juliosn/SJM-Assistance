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

        <div class="container container-servico">
            <h1 class="titulo-servico">Meus Serviços Solicitados</h1>
            <div class="row row-servico">
                <div class="col col-servico">
                    <div class="caixa-servico">
                        <div class="row">
                            <div class="col col-caixa-servico">
                                <p>Marca: Lenovo</p>
                                <p>Modelo:  CP102X</p>
                                <p>Descrição: Minha Filha deixou o notebook cair</p>
                                <p>Forma de entrega: Retirar na loja</p>
                                <p>Garantia: Não incluso</p>
                            </div>
                            <div class="col col-caixa-servico">
                                <h3>Status do pedido:</h3>
                                <p>Em manutenção</p>
                                <p>Data Prevista: 10/11/2022</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h1 class="titulo-solicitar-servico">Solicitar novo Serviço</h1>
                <div class="row row-esqueci-senha" style="justify-content: center; margin-top: 50px">
                    <div class="col-6 col-form-servico col-servico">
                        <form class="form-entrar needs-validation" novalidate action="entrar.php?link=1">
                            <div class="row row-form-servico">
                            <div class="form-group col-md-6 mb-3">
                                <label for="txtMarca">Marca</label>
                                <input type="text" class="form-control" id="txtMarca" placeholder="" required select>
                                <div class="invalid-feedback">
                                    Por favor, informe a marca.
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="txtModelo">Modelo</label>
                                <input type="text" class="form-control" id="txtModelo" placeholder="" required>
                                <div class="invalid-feedback">
                                    Por favor, informe o modelo.
                                </div>
                            </div>
                            <div class="col-12" style="margin-top: 50px; margin-bottom: 30px;">
                                <label for="txtDescricaoProblema">Descrição do Problema</label>
                                <textarea class="form-control textarea-descricao-problema" id="txtDescricaoProblema" placeholder="" required></textarea>
                                <div class="invalid-feedback">
                                    Por favor, informe o problema.
                                </div>
                            </div>
                            <div class="col-md-12 mb-3 div-opcao-entrega">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Levar Aparelho
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Enviar Pelo Correio
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
                                    <label class="form-check-label" for="exampleRadios3">
                                    Receber técnico em casa
                                    </label>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3" style="margin-top: 30px;">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
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

    </main>
    <?php include_once "footer.php" ?>
</body>
</html>