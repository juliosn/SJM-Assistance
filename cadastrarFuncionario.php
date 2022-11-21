<?php
 require_once("controller/Controller.php");
 $_SESSION['logado'] = True;
    session_start();//inicia sessão
    $logado =  $_SESSION['logado'] ?? NULL;//pega sessão que verifica se o usuario esta logado ou nao
    if(empty($logado) || $logado == False || $_SESSION['permissoes'] != "todas" ){//caso o usuario seja cliente, ou um funcionario sem permissoes ele sai da tela de consulta
        die (header('Location: index.php'));
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- DECLARAÇÃO DE TECNOLOGIAS E PROPRIEDADES DO SISTEMA: -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SJM Assistance - Cadastrar Funcionario</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="img/SJM.png" type="image/x-icon">
</head>
<body>
    <header>
        <?php include_once "menu.php" ?>
    </header>
    <main class="main-consulta">
        <h1 class="titulo-cadastrar-funcionario">Cadastrar Funcionario</h1>
        <div class="container">
        <?php //MENSAGEM DE ERRO CASO A CONTA ESTEJA DESATIVADO
                if(isset($_GET['cad']) && $_GET['cad'] == 'sucess'){  //mostra mensagem de conta criada caso seja criado com sucessi ?>
                    <div class="div-mensagem-conta-criada-sucess">
                        <!-- MENSAGEM DE CONTA CRIADA -->
                        <div class="alert alerta-conta-success alert-success alert-dismissible fade show" style="width: 100%; display: block; margin-top:100px;" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Conta Criada com sucesso!</strong> Entre com seu email e senha.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div><!-- Sucesso -->
                    </div>
               <?php }elseif(isset($_GET['cad']) && $_GET['cad'] == 'danger'){ //mostra mensagem de conta nao criada caso tenha algum erro ao criar conta ?>

                    <div class="div-mensagem-conta-criada-danger">
                        <!-- MENSAGEM DE CONTA NÃO CRIADA -->
                        <div class="alert alerta-conta-danger alert-danger alert-dismissible fade show" style="width: 100%; display: block; margin-top:100px;" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Não foi possivel criar uma conta!</strong> Tente novamente mais tarde.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div><!-- Sucesso -->
                    </div>
            <?php } ?>
            <div class="row" style="align-items: center;">
                <div class="col col-cadastro">
                    <form class="form-cadastra-funcionario needs-validation" method="post" novalidate action="controller/Controller.php?funcao=cadastrarFuncionario">
                        <div class="row">
                            <div class="form-group col-md-6 mb-3 col-form-cadastro">
                                <label for="txtNomeCadastro">Nome Completo</label>
                                <input type="text" class="form-control" id="txtNomeCadastro" name="txtNomeCadastro" required select>
                                <div class="invalid-feedback">
                                    Por favor, informe seu nome.
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-3 col-form-cadastro">
                                <label for="txtNomeUsuarioCadastro">Cargo</label>
                                <input type="text" class="form-control" id="txtCargo" name="txtCargo" required>
                                <div class="invalid-feedback">
                                    Por favor, informe o cargo do funcionario.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 col-form-cadastro">
                                <label for="txtEmailCadastrar">Email</label>
                                <input type="email" class="form-control" id="txtEmailCadastrar" name="txtEmailCadastrar" required>
                                <div class="invalid-feedback">
                                Por favor, informe seu email.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 col-form-cadastro">
                                <label for="txtConfirmarEmailCadastrar">Confirmar Email</label>
                                <input type="email" class="form-control" id="txtConfirmarEmailCadastrar" name="txtConfirmarEmailCadastrar" required>
                                <div class="invalid-feedback">
                                    Por favor, informe seu email.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 col-form-cadastro">
                                <label for="txtSenhaEntrar">Senha</label>
                                <input type="password" class="form-control" id="txtSenhaCadastrar" name="txtSenhaCadastrar" required>
                                <div class="invalid-feedback">
                                    Por favor, informe sua senha.
                                </div>
                                <small id="passwordHelpInline" class="text-muted">
                                    Crie uma senha segura, com numeros e letras.
                                </small>
                            </div>
                            <div class="col-md-6 mb-3 col-form-cadastro">
                                <label for="txtConfirmarSenhaCadastrar">Confirmar Senha</label>
                                <input type="password" id="txtConfirmarSenhaCadastrar" class="form-control" name="txtConfirmarSenhaCadastrar" placeholder="" required>
                                <div class="invalid-feedback">
                                    Por favor, confirme sua senha.
                                </div>
                            </div>
                            <div class="col-md-12 mb-3 col-form-cadastro">
                                <label for="txtPermissoes">Permissões</label>
                                <select class="form-select" id="txtPermissoes" name="txtPermissoes" aria-label="Default select example">
                                    <option value="nenhum" selected>Nenhum</option>
                                    <option value="todas">Todas</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, confirme sua senha.
                                </div>
                            </div>
                        <button class="btn btn-cadastrar" type="submit" style="margin-top: 50px;">Cadastrar</button><br><br>
                    </form>
                </div>
            </div>
            </form>
        </div>
    </main>
    <?php include_once "footer.php" ?>
</body>
</html>