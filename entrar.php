<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SJM - Assistance</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="bootstrap/js/bootstrap.js"></script>
    <link rel="shortcut icon" href="img/SJM.png" type="image/x-icon">
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-xl navbar-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
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

            <!-- MENSAGEM DE CONTA CRIADA -->
            <div class="alert alerta-conta-success alert-success alert-dismissible fade show" style="width: 100%; display: none;" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <strong>Conta Criada com sucesso!</strong> Entre com seu email e senha.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div><!-- Sucesso -->
            <div class="alert alerta-conta-danger alert-danger alert-dismissible fade show" style="width: 100%; display: none;" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <strong>Não foi possivel criar uma conta!</strong> Tente novamente mais tarde.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div><!-- Erro -->

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

        <!-- icone da mensagem de recuperação de senha -->
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
        </svg>
        <!-- icone da mensagem de recuperação de senha -->

        <div class="container container-entrar">
        <?php 
                if(isset($_GET['cad'])){ ?>
                    <div class="div-mensagem-conta-criada">
                        <!-- MENSAGEM DE CONTA CRIADA -->
                        <div class="alert alerta-conta-success alert-success alert-dismissible fade show" style="width: 100%; display: block; margin-top:100px;" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Conta Criada com sucesso!</strong> Entre com seu email e senha.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div><!-- Sucesso -->
                    </div>
                    
                    <?php
                }
            ?>

            <!-- mensagem de recuperação de senha -->
            <?php if(isset($_GET['link'])){ ?><!-- Se a variavel existir (caso seja pra recuperar a senha) -->
                <?php if(isset($_GET['link']) == 1){ ?>
                    <div class="alert alerta-senha-success alert-success alert-dismissible fade show" style="width: 100%; display: none;" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <strong>Confirme seu email!</strong> Senha enviada com sucesso.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div><!-- Sucesso -->

                    <div class="alert alerta-senha-danger alert-danger alert-dismissible fade show" style="width: 100%; display: none;" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <strong>Não foi possivel enviar email!</strong> Verifique se o email digitado está correto e tente novamente.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div><!-- Erro -->
                    <!-- mensagem de recuperação de senha -->

                    <div class="row row-esqueci-senha">
                        <div class="col-6">
                            <form class="form-entrar needs-validation" novalidate action="entrar.php?link=1">
                                <h2>Informe seu Email</h2>
                                <div class="form-row" style="margin-bottom: 10px!important;">
                                    <div class="col-md-12 mb-3">
                                        <label for="txtEmailEntrar">Email</label>
                                        <input type="email" class="form-control" id="txtEmailEntrar" placeholder="" required>
                                        <div class="invalid-feedback">
                                            Por favor, informe seu email.
                                        </div>
                                    </div>
                                    </div>
                                    <a href="entrar.php" class="txt-esqueci-senha">Entrar</a><br>
                                    <button style="margin-top: 50px;" class="btn btn-form-entrar" onclick="enviarRecuperacaoSenha()" type="submit">Enviar</button>
                                    <p class="txt-conta"><a href="cadastro.php">Não possuo uma conta</a></p>
                            
                            </form> 
                        </div>
                        <div class="col col-esqueci-senha" style="padding: 0 60px;">
                            <h1 class="titulo-esqueci-senha" style="font-size: 55px;">Esqueceu sua senha? Informe seu email para a recuperação.</h1> 
                        </div>
                    </div>
            <?php } }else{ ?>
                <div class="alert alerta-senha-success alert-success alert-dismissible fade show" style="width: 100%; display: none;" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <strong>Confirme seu email!</strong> Senha enviada com sucesso.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div><!-- Sucesso -->

                <div class="alert alerta-senha-danger alert-danger alert-dismissible fade show" style="width: 100%; display: none;" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <strong>Não foi possivel enviar email!</strong> Verifique se o email digitado está correto e tente novamente.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div><!-- Erro -->
                <!-- mensagem de recuperação de senha -->

                <div class="row row-entrar" style="align-items: center;">
                    <div class="col">
                        <h1 class="titulo-entrar">Já possui uma conta? Entre com seu email e senha.</h1>  
                    </div>
                    <div class="col">
                        <form class="form-entrar needs-validation" novalidate action="">
                            <h2>Entre com sua conta</h2>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="txtEmailEntrar">Email</label>
                                    <input type="email" class="form-control" id="txtEmailEntrar" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Por favor, informe seu email.
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3" style="margin-top: 30px; margin-bottom: 30px;">
                                    <label for="txtSenhaEntrar">Senha</label>
                                    <div class="senha">
                                        <img src="img/eye.svg" class="img-mostrar-senha-entrar" height="30" alt="" onclick="showPassword()">
                                        <input type="password" class="form-control" id="txtSenhaEntrar" placeholder="" required>
                                    </div>
                                    <div class="invalid-feedback">
                                        Por favor, informe sua senha.
                                    </div>
                                </div>
                                <a href="entrar.php?link=1" class="txt-esqueci-senha">Esqueci minha senha</a><br>
                            <button class="btn btn-form-entrar" style="margin-top: 30px;" type="submit">Entrar</button>
                            <p class="txt-conta"><a href="cadastro.php">Não possuo uma conta</a></p>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>

     <!-- VALIDAÇÃO DO FORMULARIO -->
     <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
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
    <!-- VALIDAÇÃO DO FORMULARIO -->
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
            .titulo-entrar{
                margin-top: -50px;
                margin-bottom: 30px;
            }
            .col-esqueci-senha{
                padding: 20px!important;
            }
            .col-6{
                width: 100%;
            }
            .row-esqueci-senha{
                flex-direction: column-reverse;
            }
        }
    </style>
<!-- Modal para recuperar senha -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recuperar Senha</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Sua senha será enviada pelo email, por favor informe abaixo seu endereço de email</p>
        <input type="email" class="form-control txtRecuperarSenha" id="txtEmailEntrar" placeholder="" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary"data-bs-dismiss="modal" onclick="enviarRecuperacaoSenha()">Enviar senha</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>