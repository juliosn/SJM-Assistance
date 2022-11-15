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
    <title>SJM Assistance - Contato</title>
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
            <h1 class="titulo-contato">Entre em contato</h1>
                <div class="row row-esqueci-senha" style="justify-content: center; margin-top: 50px">
                    <div class="col-6 col-form-servico col-servico">
                        <form class="form-entrar needs-validation" novalidate action="entrar.php?link=1">
                            <div class="row row-form-servico">
                            <div class="form-group col-12">
                                <label for="txtMarca">Email</label>
                                <input type="text" class="form-control" id="txtMarca" placeholder="" required select>
                                <div class="invalid-feedback">
                                    Por favor, informe seu email
                                </div>
                            </div>
                            <div class="col-12 col-form-cadastro">
                                <label for="txtTipoMensagem">Tipo da Mensagem</label>
                                <select class="form-select" id="txtTipoMensagem" aria-label="Default select example">
                                    <option value="feedback" selected>Feedback</option>
                                    <option value="perguntas">Perguntas</option>
                                    <option value="reclamacao">Reclamação</option>
                                    <option value="opinioes">Opiniões</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, informe seu email
                                </div>
                            </div>
                            <div class="col-12 col-form-cadastro">
                                <label for="txtDescricaoProblema">Mensagem</label>
                                <textarea class="form-control textarea-descricao-problema" id="txtDescricaoProblema" placeholder="" required></textarea>
                                <div class="invalid-feedback">
                                    Por favor, informe uma mensagem.
                                </div>
                            </div>
                            <div class="col-md-12 mb-3 col-btn-contato">
                                <button onclick="location.href='contato.php?enviado'" class="btn btn-finalizar-servico" type="submit">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    </main>
    <?php include_once "footer.php" ?>
</body>
</html>