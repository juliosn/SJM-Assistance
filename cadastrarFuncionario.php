<?php   
    session_start();
    require_once "Controller.php";
    $logado =  $_SESSION['logado'] ?? NULL;//pega sessão que verifica se o usuario esta logado ou nao
    if(empty($logado) || $logado == False || $_SESSION['permissoes'] != "todas" ){//caso o usuario seja cliente, ou um funcionario sem permissoes ele sai da tela de consulta
        die (header('Location: index.php'));
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- DECLARAÇÃO DE TECNOLOGIAS E PROPRIEDADES DO SISTEMA: -->
    <meta name="description" content="Assistência técnica de notebooks">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SJM Assistance - Cadastrar Funcionario</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">  
    <script src="bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</head>
<body>
    <header>
        <?php include_once "menu.php" ?>
    </header>
    <main class="main-consulta">
        <div class="container">
        <?php //MENSAGEM DE ERRO CASO A CONTA ESTEJA DESATIVADO
                if(isset($_GET['cad']) && $_GET['cad'] == 'sucess'){   ?>
                    <!-- MENSAGEM DE CONTA CRIADA -->
                    <div class="div-mensagem-conta-funcionario-criada-sucess">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Conta Criada com sucesso!</strong> Entre com seu email e senha.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='cadastrarFuncionario.php'"></button>
                        </div><!-- Sucesso -->
                    </div>
               <?php }elseif(isset($_GET['cad']) && $_GET['cad'] == 'danger'){ ?>
                    <!-- MENSAGEM DE CONTA NÃO CRIADA -->
                    <div class="div-mensagem-conta-funcionario-criada-danger">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Não foi possivel criar uma conta!</strong> Tente novamente mais tarde.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='cadastrarFuncionario.php'"></button>
                        </div><!-- Sucesso -->
                    </div>
            <?php } ?>
            <?php if(isset($_GET['cadFun']) && $_GET['cadFun'] == 'EmailJaCadastrado'){ ?>
                    <!-- MENSAGEM DE CONTA NÃO CRIADA POR JA ESTAR CADASTRADO -->
                <div class="div-mensagem-conta-funcionario-ja-cadastrado-danger">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <strong>Não foi possivel cadastrar um funcionario!</strong> Esse email já foi cadastrado.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='cadastrarFuncionario.php'"></button>
                    </div><!-- Sucesso -->
                </div>
            <?php } ?>
        <h1 class="titulo-cadastrar-funcionario">Cadastrar Funcionario</h1>
            <div class="row" style="align-items: center;">
                <div class="col col-cadastro">
                    <form class="form-cadastra-funcionario needs-validation" method="post" novalidate action="Controller.php?funcao=cadastrarFuncionario">
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
                                <input onkeyup="confirmarEmail()" type="email" class="form-control" id="txtEmailCadastrar" name="txtEmailCadastrar" required>
                                <div class="invalid-feedback">
                                Por favor, informe seu email.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 col-form-cadastro">
                                <label for="txtConfirmarEmailCadastrar">Confirmar Email</label>
                                <input onkeyup="confirmarEmail()" type="email" class="form-control" id="txtConfirmarEmailCadastrar" name="txtConfirmarEmailCadastrar" required>
                                <div class="invalid-feedback">
                                    Por favor, confirme seu email.
                                </div>
                                <div id="erro-email"></div>
                            </div>
                            <div class="col-md-6 mb-3 col-form-cadastro">
                                <label for="txtSenhaCadastrar">Senha</label>
                                <div class="senha">
                                    <img src="img/eye.svg" class="img-mostrar-senha" id="img-mostrar-senha-cad" height="30" alt="" onclick="showPasswordCadSenha()">
                                    <input pattern=".{8,}" onkeyup="confirmarSenha()" type="password" class="form-control senha-igual" id="txtSenhaCadastrar" name="txtSenhaCadastrar" required>
                                    <div class="invalid-feedback invalid-feedback-senha1">
                                        Por favor, crie uma senha segura.
                                    </div>
                                </div>
                                <small id="passwordHelpInline" class="text-muted">
                                    Crie uma senha segura, com no mínimo 8 caracteres.
                                </small>
                            </div>
                            <div class="col-md-6 mb-3 col-form-cadastro">
                                <label for="txtConfirmarSenhaCadastrar">Confirmar Senha</label>
                                <div class="senha">
                                    <img src="img/eye.svg" class="img-mostrar-senha" id="img-confirmar-senha-cad" height="30" alt="" onclick="showPasswordCadConfirmarSenha()">
                                    <input onkeyup="confirmarSenha()" type="password" class="form-control senha-igual" id="txtConfirmarSenhaCadastrar" name="txtConfirmarSenhaCadastrar" required>
                                </div>
                                <div id="erro-senha"></div>
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