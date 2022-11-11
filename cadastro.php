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
                        <li class="nav-item">
                            <a class="nav-link" href="servico.php">Serviços</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contato.php">Contato</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sobre.html">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dicas.html">Dicas</a>
                        </li>
                    </ul>
                    </div>
                    <div class="nome-nav">
                        SJM Assistance
                    </div>
                    <!-- ACESSO PARA AS PÁGINAS DE LOGIN E CADASTRO -->
                    <div class="d-btn">
                        <a class="btn btn-entrar" href="entrar.php">Entrar</a>
                        <a class="btn btn-cadastro" href="cadastro.php">Cadastre-se</a>
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
    </header>
    <main style="display: flex; align-items: center; min-height: 80vh">
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
                            <a class="nav-link" href="sobre.html">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dicas.html">Dicas</a>
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
        <div class="container">
            <div class="row" style="align-items: center;">
                <div class="col col-cadastro" style="min-width: 100%; padding: 0 300px;">
                    <h1 class="titulo-cadastro">Ainda não tem uma conta? Cadastre-se agora!</h1>
                </div>
                <div class="col" style="min-width: 100%; display: flex; justify-content: center;">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                        <label class="btn-estado-form btn-form1" for="btnradio1">1</label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                        <label class="btn-estado-form" for="btnradio2">2</label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                        <label class="btn-estado-form" for="btnradio3">3</label>
                        <div class="linha-estado"></div>
                    </div>
                </div>
                <div class="col col-cadastro" style="padding: 0 250px; margin-top: 20px;">
                    <form class="form-cadastrar needs-validation" novalidate action="">
                        <h2 style="margin-bottom: 40px;">Informações pessoais</h2>
                        <div class="row">
                            <div class="form-group col-md-6 mb-3 col-form-cadastro">
                                <label for="txtNomeCadastro">Nome Completo</label>
                                <input type="text" class="form-control" id="txtNomeCadastro" placeholder="" required select>
                                <div class="invalid-feedback">
                                    Por favor, informe seu nome.
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-3 col-form-cadastro">
                                <label for="txtNomeUsuarioCadastro">Nome de usuário</label>
                                <input type="text" class="form-control" id="txtNomeUsuarioCadastro" placeholder="" required>
                                <div class="invalid-feedback">
                                    Por favor, informe um nome de usuário.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 col-form-cadastro">
                                <label for="txtEmailEntrar">Email</label>
                                <input type="email" class="form-control" id="txtSenhaEntrar" placeholder="" required>
                                <div class="invalid-feedback">
                                Por favor, informe seu email.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 col-form-cadastro">
                                <label for="txtConfirmarEmailEntrar">Confirmar Email</label>
                                <input type="email" class="form-control" id="txtSenhaEntrar" placeholder="" required>
                                <div class="invalid-feedback">
                                    Por favor, informe seu email.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 col-form-cadastro">
                                <label for="txtSenhaEntrar">Senha</label>
                                <input type="email" class="form-control" id="txtSenhaEntrar" placeholder="" required>
                                <div class="invalid-feedback">
                                    Por favor, informe sua senha.
                                </div>
                                <small id="passwordHelpInline" class="text-muted">
                                    Crie uma senha segura, com numeros e letras.
                                </small>
                            </div>
                            <div class="col-md-6 mb-3 col-form-cadastro">
                                <label for="txtConfirmarSenhaEntrar">Confirmar Senha</label>
                                <input type="email" class="form-control" id="txtSenhaEntrar" placeholder="" required>
                                <div class="invalid-feedback">
                                    Por favor, informe sua senha.
                                </div>
                            </div>
                        <button onclick="location.href='cadastro2.php'" class="btn btn-proximo-cadastrar" type="submit">Próximo ></button>
                        <p class="txt-conta" style="margin-top: 50px;"><a href="entrar.php">Já tem uma conta? Entre</a></p>
                    </form>
                </div>
            </div>
        </div>
    </main>

     <!-- VALIDAÇÃO DO FORMULÁRIO -->
     <script>
        //Utilização de JavaScript para desativar envios de formulários se houver campos inválidos
        (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
                var input = document.querySelectorAll(".form-control")
                for(var i=0; i<input.length; i++){
                    input[i].classList.add("input-erro");
                }
            }, false);
            });
        }, false);
        })();
    </script>
    <!-- VALIDAÇÃO DO FORMULÁRIO -->
    <style>
        @media screen and (max-width: 412px){
            .container, .row{
                padding: 0;
                min-width: 100%;
                margin: 0;
            }
            .col{
                min-width: 100%;
            }
        }
    </style>
</body>
</html>