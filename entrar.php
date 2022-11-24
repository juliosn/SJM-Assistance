<?php
    session_start();//inicia sessão
    $logado =  $_SESSION['logado'] ?? NULL;//pega sessão que verifica se o usuario esta logado ou nao
    if($logado) die(header('Location: index.php'));//caso o usuaio esteja logado manda redreciona para a pagina principal
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- DECLARAÇÃO DE TECNOLOGIAS E PROPRIEDADES DO SISTEMA: -->
    <meta name="description" content="Assistência técnica de notebooks">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SJM Assistance - Entrar</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">  
    <script src="bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</head>
<body>
    <header>
        <?php include_once "menu.php" ?>
    </header>
    <main style="display: flex; align-items: center; min-height: 80vh">

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
            <?php if(isset($_GET['cadCli']) && $_GET['cadCli'] == 'EmailJaCadastrado'){ //mostra mensagem de email ja cadastrado ?>
                        <!-- MENSAGEM DE CONTA NÃO CRIADA (USUARIO JA ESTA CADASTRO)-->
                        <div class="div-mensagem-entrar-cliente-ja-cadastrado">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                <strong>Não foi possivel realizar seu cadastro!</strong> Esse email já foi cadastrado.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='entrar.php'"></button>
                            </div><!-- Sucesso -->
                        </div>
                <?php } ?>
            <?php //MENSAGEM DE ERRO CASO A CONTA ESTEJA DESATIVADO
                if(isset($_GET['cad']) && $_GET['cad'] == 'sucess'){   ?>
                    <!-- MENSAGEM DE CONTA CRIADA -->
                    <div class="div-mensagem-conta-criada-sucess">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Conta Criada com sucesso!</strong> Entre com seu email e senha.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='entrar.php'"></button>
                        </div><!-- Sucesso -->
                    </div>
               <?php }elseif(isset($_GET['cad']) && $_GET['cad'] == 'danger'){ ?>
                    <!-- MENSAGEM DE CONTA NÃO CRIADA -->
                    <div class="div-mensagem-conta-criada-danger">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Não foi possivel criar uma conta!</strong> Tente novamente mais tarde.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='entrar.php'"></button>
                        </div><!-- Sucesso -->
                    </div>
            <?php } ?> <?php
             //MENSAGEM DE ERRO CASO NÃO ENCONTRE NENHUMA CONTA
            if (isset($_GET['entrar']) && $_GET['entrar'] == 'semConta'){//caso os dados nao confiram com a base de dados ?>
                <!-- MENSAGEM DE ERRO AO ENTRAR -->
                <div class="div-mensagem-sem-conta">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <strong>Não foi possivel entrar com sua conta!</strong> Verifique seu email e senha ou tente novamente mais tarde.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='entrar.php'"></button>
                    </div><!-- Sucesso -->
                </div>
           <?php } ?>

           <?php //MENSAGEM DE ERRO CASO A CONTA ESTEJA DESATIVADO
            if (isset($_GET['contaDesativado']) && $_GET['contaDesativado'] == 'true'){//caso os dados nao confiram com a base de dados ?>
                <div class="div-mensagem-conta-desativada">
                    <!-- MENSAGEM DE CONTA DESATIVADA -->
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <strong>Sua conta foi desativada!</strong> entre em contato a nossa loja para mais informações.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='entrar.php'"></button>
                    </div><!-- Sucesso -->
                </div>
           <?php } ?>

           <?php //MENSAGEM DE ENTRAR PARA SOLICITAR SERVIÇO, APARECE SE O USUARIO CLICAR NO LINK DE SERVICO SEM ESTAR LOGADO
            if (isset($_GET['crieConta']) && $_GET['crieConta'] == 'true'){//caso os dados nao confiram com a base de dados ?>
                <div class="div-mensagem-sem-nao-logado">
                    <!-- MENSAGEM DE ERRO AO ENTRAR NO SERVICO (PRECISA ESTAR LOGADO) -->
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <strong>Você não está logado!</strong> Crie uma conta ou entre para solicitar um serviço.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='entrar.php'"></button>
                    </div><!-- Sucesso -->
                </div>
           <?php } ?>
            
            <!-- mensagem de recuperação de senha -->
            <?php if(isset($_GET['link'])){ ?><!-- Se a variavel existir (caso seja pra recuperar a senha) -->
                <?php if(isset($_GET['link']) == 'esqueciSenha'){ ?>
                    <?php if(isset($_GET['senhaEnviada']) && $_GET['senhaEnviada'] == 'sucess'){ ?>
                        <div class="div-mensagem-senha-enviada">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                <strong>Confirme seu email!</strong> Senha enviada com sucesso.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='entrar.php'"></button>
                            </div><!-- Sucesso -->
                        </div>
                    <?php }elseif(isset($_GET['senhaEnviada']) && $_GET['senhaEnviada'] == 'danger'){ ?>
                        <div class="div-mensagem-senha-nao-enviada">
                            <div class="alert alerta-senha-danger alert-danger alert-dismissible fade show" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                <strong>Não foi possivel enviar email!</strong> Verifique se o email digitado está correto e tente novamente.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='entrar.php'"></button>
                            </div><!-- Erro -->
                        </div>
                        <!-- mensagem de recuperação de senha -->
                    <?php } ?>


                    <div class="row row-esqueci-senha">
                        <div class="col-6 col-esquci-senha">
                            <form action="Controller.php?funcao=esqueciSenha" method="POST" class="form-entrar needs-validation" novalidate>
                                <h2>Informe seu Email</h2>
                                <div class="form-row" style="margin-bottom: 10px!important;">
                                    <div class="col-md-12 mb-3">
                                        <label for="txtEmailRecuperacao">Email</label>
                                        <input type="email" class="form-control" id="txtEmailRecuperacao" name="txtEmailRecuperacao" placeholder="" required>
                                        <div class="invalid-feedback">
                                            Por favor, informe seu email para a recuperação.
                                        </div>
                                    </div>
                                    </div>
                                    <a href="entrar.php" class="txt-esqueci-senha">Entrar</a><br>
                                    <button style="margin-top: 50px;" class="btn btn-form-entrar">Enviar</button>
                                    <p class="txt-conta"><a href="cadastro.php">Não possuo uma conta</a></p>
                            
                            </form> 
                        </div>
                        <div class="col col-esqueci-senha-text">
                            <h1 class="titulo-esqueci-senha" style="font-size: 55px;">Esqueceu sua senha? Informe seu email para a recuperação.</h1> 
                        </div>
                    </div>
            <?php } }else{ ?>

                <div class="row row-entrar" style="align-items: center;">
                    <div class="col col-entrar">
                        <h1 class="titulo-entrar">Já possui uma conta? Entre com seu email e senha.</h1>  
                    </div>
                    <div class="col col-entrar">
                        <form class="form-entrar needs-validation" method="post" novalidate action="Controller.php?funcao=logar">
                            <h2 class="titulo-entre">Entre com sua conta</h2>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="txtEmailEntrar">Email</label>
                                    <input type="email" class="form-control" id="txtEmailEntrar" name="txtEmailEntrar" required>
                                    <div class="invalid-feedback">
                                        Por favor, informe seu email.
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3" style="margin-top: 30px; margin-bottom: 30px;">
                                    <label for="txtSenhaEntrar">Senha</label>
                                    <div class="senha">
                                        <img src="img/eye.svg" class="img-mostrar-senha" id="img-mostrar" height="30" alt="" onclick="showPassword()">
                                        <input type="password" class="form-control password" id="txtSenhaEntrar" name="txtSenhaEntrar" required>
                                    </div>
                                    <div class="invalid-feedback">
                                        Por favor, informe sua senha.
                                    </div>
                                </div>
                                <a href="entrar.php?link=esqueciSenha" class="txt-esqueci-senha">Esqueci minha senha</a><br>
                            <button class="btn btn-form-entrar" style="margin-top: 30px;" type="submit">Entrar</button>
                            <p class="txt-conta"><a href="cadastro.php">Não possuo uma conta</a></p>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>
</div>
</body>
</html>