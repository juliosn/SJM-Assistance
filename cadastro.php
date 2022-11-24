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
    <title>SJM Assistance - Cadastro</title>
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
        <div class="container">
            <?php if(!isset($_GET['cad'])){   ?><!-- Se a variavel do link não existir (abrir primeira tela do cadastro) -->
                <div class="row" style="align-items: center;">
                    <div class="col col-titulo-cadastro">
                        <h1 class="titulo-entrar">Ainda não tem uma conta? Cadastre-se agora!</h1>
                    </div>
                    <div class="col col-estado-cadastro">
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
                    <div class="col div-form-cadastro">
                        <form class="form-cadastrar needs-validation" method="post" novalidate action="cadastro.php?cad=2">
                            <h2 style="margin-bottom: 40px;">Informações pessoais</h2>
                            <div class="row">
                                <div class="form-group col-md-6 mb-3 col-form-cadastro">
                                    <label for="txtNomeCadastro">Nome Completo</label>
                                    <input type="text" class="form-control" id="txtNomeCadastro" name="txtNomeCadastro" required select>
                                    <div class="invalid-feedback">
                                        Por favor, informe seu nome.
                                    </div>
                                </div>
                                <div class="form-group col-md-6 mb-3 col-form-cadastro">
                                    <label for="txtNomeUsuaroiCadastro">Nome de usuário</label>
                                    <input type="text" class="form-control" id="txtNomeUsuarioCadastro" name="txtNomeUsuarioCadastro" required>
                                    <div class="invalid-feedback">
                                        Por favor, informe um nome de usuário.
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
                                    <div class="invalid-feedback invalid-feedback-senha">
                                        Por favor, confirme sua senha.
                                    </div>
                                    </div>
                                    <div id="erro-senha"></div>
                                </div>
                            <button class="btn btn-proximo-cadastrar" type="submit">Próximo ></button>
                            <p class="txt-conta" style="margin-top: 50px;"><a href="entrar.php">Já tem uma conta? Entre</a></p>
                        </form>
                    </div>
                </div>
            <?php }elseif($_GET['cad'] == '2'){ //segunda parte do form
                    if(isset($_POST['txtNomeCadastro'])){//caso a variavel do nome exista (caso ele tenha preenchido o primeiro form) 
                    ?>
                        <div class="row" style="align-items: center;">
                            <div class="col col-titulo-cadastro">
                                <h1 class="titulo-cadastro">Ainda não tem uma conta? Cadastre-se agora!</h1>
                            </div>
                            <div class="col" style="min-width: 100%; display: flex; justify-content: center;">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                                    <label class="btn-estado-form btn-form1" for="btnradio1">1</label>

                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                                    <label style="background: #002060!important; color: #fff!important;" class="btn-estado-form" for="btnradio2">2</label>

                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                                    <label class="btn-estado-form btn-form3" for="btnradio3">3</label>
                                    <div class="linha-estado"></div>
                                </div>
                            </div>
                            <div class="col div-form-cadastro">
                                <form class="form-cadastrar needs-validation" method="post" novalidate action="cadastro.php?cad=3">
                                    <h2 style="margin-bottom: 40px;">Informações endereço</h2>
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-3 col-form-cadastro">
                                            <label for="txtCep">CEP</label>
                                            <input type="text" class="form-control txtCepApi" id="txtCep" name="txtCep" placeholder="" required select>
                                            <div class="invalid-feedback">
                                                Por favor, informe seu cep.
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-3 col-form-cadastro">
                                            <label for="txtEndereco">Endereço</label>
                                            <input type="text" class="form-control" id="txtEndereco" name="txtEndereco" placeholder="" required>
                                            <div class="invalid-feedback">
                                                Por favor, informe seu endereço.
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3 col-form-cadastro">
                                            <label for="txtNumeroCasa">Número</label>
                                            <input type="text" class="form-control" id="txtNumeroCasa" name="txtNumeroCasa" required>
                                            <div class="invalid-feedback">
                                            Por favor, informe o número da sua casa.
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3 col-form-cadastro">
                                            <label for="txtComplemento">Complemento</label>
                                            <input type="text" class="form-control" id="txtComplemento" name="txtComplemento">
                                        </div>
                                        <div class="col-md-6 mb-3 col-form-cadastro">
                                            <label for="txtCidade">Cidade</label>
                                            <input type="text" class="form-control" id="txtCidade" name="txtCidade" required>
                                            <div class="invalid-feedback">
                                                Por favor, informe sua senha.
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3 col-form-cadastro">
                                            <label for="txtEstado">Estado</label>
                                            <input type="text" class="form-control" id="txtEstado" name="txtEstado" required>
                                            <div class="invalid-feedback">
                                                Por favor, informe sua senha.
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-5 col-form-cadastro">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                    <span id="passwordHelpInline" class="text-muted">
                                                        Aceito as <a href="#">Políticas de Privacidade</a> e os <a href="#">Termos de Uso</a> da SJM Assistance.
                                                    </span>
                                            </label>
                                            
                                            <div class="invalid-feedback">
                                                Por favor, acite os termos para continuar.
                                            </div>
                                        </div>
                                        <div id="bairro"></div>
                                        <input type="text" class="form-cad-2" value="<?php echo $_POST['txtNomeCadastro'] ?>" id="txtNomeCadastro" name="txtNomeCadastro" required select>
                                        <input type="text" class="form-cad-2" value="<?php echo $_POST['txtNomeUsuarioCadastro'] ?>" id="txtNomeUsuarioCadastro" name="txtNomeUsuarioCadastro" required select>
                                        <input type="text" class="form-cad-2" value="<?php echo $_POST['txtEmailCadastrar'] ?>" id="txtEmailCadastrar" name="txtEmailCadastrar" required select>
                                        <input type="text" class="form-cad-2" value="<?php echo $_POST['txtSenhaCadastrar'] ?>" id="txtSenhaCadastrar" name="txtSenhaCadastrar" required select>
                                        <button class="btn btn-proximo-cadastrar" type="submit">Próximo ></button>
                                    <p class="txt-conta" style="margin-top: 50px;"><a href="entrar.php">Já tem uma conta? Entre</a></p>
                                </form>
                            </div>
                        </div>
       

                <?php }else{//caso a variavel do nome nao exista (caso ele nao tenha preenchido o primeiro form) volta para o primeiro form
                        //echo "<script>location.href='cadastro.php'</script>";
                    }
                    ?>

            <?php }elseif($_GET['cad'] == '3'){ //segunda parte do form
                if(isset($_POST['txtCep'])){//caso a variavel do nome exista (caso ele tenha preenchido o primeiro form) ?>
                    <div class="row" style="align-items: center;">
                        <div class="col col-titulo-cadastro">
                            <h1 class="titulo-cadastro">Confirme suas informações!</h1>
                        </div>
                        <div class="col" style="min-width: 100%; display: flex; justify-content: center;">
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                                <label class="btn-estado-form btn-form1" for="btnradio1">1</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                                <label style="background: #002060!important; color: #fff!important;" class="btn-estado-form" for="btnradio2">2</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                                <label class="btn-estado-form btn-form3 check-cad" for="btnradio3"></label>
                                <div class="linha-estado"></div>
                            </div>
                        </div>
                        <div class="col div-form-cadastro">
                            <form class="form-cadastrar needs-validation" method="post" novalidate action="Controller.php?funcao=cadastrar">
                            <h2 style="margin-bottom: 40px;">Informações pessoais</h2>
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3 col-form-cadastro">
                                        <label for="txtNomeCadastro">Nome Completo</label>
                                        <input type="text" class="form-control" id="txtNomeCadastro" name="txtNomeCadastro" value="<?php echo $_POST['txtNomeCadastro']; ?>" required select>
                                        <div class="invalid-feedback">
                                            Por favor, informe seu nome.
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-3 col-form-cadastro">
                                        <label for="txtNomeUsuarioCadastro">Nome de usuário</label>
                                        <input type="text" class="form-control" value="<?php echo $_POST['txtNomeUsuarioCadastro'];; ?>" id="txtNomeUsuarioCadastro" name="txtNomeUsuarioCadastro" required>
                                        <div class="invalid-feedback">
                                            Por favor, informe um nome de usuário.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 col-form-cadastro">
                                        <label for="txtEmailCadastrar">Email</label>
                                        <input value="<?php echo $_POST['txtEmailCadastrar']; ?>" onkeyup="confirmarEmail()" type="email" class="form-control" id="txtEmailCadastrar" name="txtEmailCadastrar" required>
                                        <div class="invalid-feedback">
                                        Por favor, informe seu email.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 col-form-cadastro">
                                        <label for="txtConfirmarEmailCadastrar">Confirmar Email</label>
                                        <input value="<?php echo $_POST['txtEmailCadastrar']; ?>" onkeyup="confirmarEmail()" type="email" class="form-control" id="txtConfirmarEmailCadastrar" name="txtConfirmarEmailCadastrar" required>
                                        <div class="invalid-feedback">
                                            Por favor, confirme seu email.
                                        </div>
                                        <div id="erro-email"></div>
                                    </div>
                                    <div class="col-md-6 mb-3 col-form-cadastro">
                                    <label for="txtSenhaCadastrar">Senha</label>
                                    <div class="senha">
                                        <img src="img/eye.svg" class="img-mostrar-senha" id="img-mostrar-senha-cad" height="30" alt="" onclick="showPasswordCadSenha()">
                                        <input pattern=".{8,}" value="<?php echo $_POST['txtSenhaCadastrar']; ?>" onkeyup="confirmarSenha()" type="password" class="form-control senha-igual" id="txtSenhaCadastrar" name="txtSenhaCadastrar" required>
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
                                        <input value="<?php echo $_POST['txtSenhaCadastrar']; ?>" onkeyup="confirmarSenha()" type="password" class="form-control senha-igual" id="txtConfirmarSenhaCadastrar" name="txtConfirmarSenhaCadastrar" required>
                                    <div class="invalid-feedback invalid-feedback-senha">
                                        Por favor, confirme sua senha.
                                    </div>
                                    </div>
                                    <div id="erro-senha"></div>
                                </div>
                                <h2 style="margin-bottom: 40px; margin-top: 100px">Informações endereço</h2>
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3 col-form-cadastro">
                                        <label for="txtCep">CEP</label>
                                        <input type="text" class="form-control txtCepConsulta" value="<?php echo $_POST['txtCep']; ?>" id="txtCep" name="txtCep" placeholder="" required select>
                                        <div class="invalid-feedback">
                                            Por favor, informe seu cep.
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-3 col-form-cadastro">
                                        <label for="txtEndereco">Endereço</label>
                                        <input type="text" class="form-control" value="<?php echo $_POST['txtEndereco']; ?>" id="txtEndereco" name="txtEndereco" placeholder="" required>
                                        <div class="invalid-feedback">
                                            Por favor, informe seu endereço.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 col-form-cadastro">
                                        <label for="txtEmailEntrar">Número</label>
                                        <input type="text" class="form-control" value="<?php echo $_POST['txtNumeroCasa']; ?>" id="txtNumeroCasa" name="txtNumeroCasa" required>
                                        <div class="invalid-feedback">
                                        Por favor, informe o número de sua residência.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 col-form-cadastro">
                                        <label for="txtComplemento">Complemento</label>
                                        <input type="text" class="form-control" value="<?php echo $_POST['txtComplemento']; ?>" id="txtComplemento" name="txtComplemento">
                                    </div>
                                    <div class="col-md-6 mb-3 col-form-cadastro">
                                        <label for="txtSenhaEntrar">Cidade</label>
                                        <input type="text" class="form-control" value="<?php echo $_POST['txtCidade']; ?>" id="txtCidade" name="txtCidade" required>
                                        <div class="invalid-feedback">
                                            Por favor, informe sua cidade.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 col-form-cadastro">
                                        <label for="txtEstado">Estado</label>
                                        <input type="text" class="form-control" value="<?php echo $_POST['txtEstado']; ?>" id="txtEstado" name="txtEstado" required>
                                        <div class="invalid-feedback">
                                            Por favor, informe seu estado.
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3" style="margin-top: 30px;">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" selected required>
                                        <label class="form-check-label" for="flexCheckDefault">
                                                <span id="passwordHelpInline" class="text-muted">
                                                    Aceito as <a href="#">Políticas de Privacidade</a> e os <a href="#">Termos de Uso</a> da SJM Assistance.
                                                </span>
                                        </label>                                        
                                        <div class="invalid-feedback">
                                            Por favor, aceite os termos para continuar.
                                        </div>
                                    </div>
                                <button class="btn btn-cadastrar" style="margin-top: 20px;">Finalizar</button><br><br>
                                <p class="txt-conta"><a href="entrar.php">Já tem uma conta? Entre</a></p>
                            </form>
                        </div>
                    </div>
                    <div id="titulo">as</div>
                <?php }else{ 
                    echo "<script>location.href='cadastro.php'</script>";
                }
            }else{//caso nenuma variavel exista
                    echo "<script>location.href='cadastro.php'</script>"; 
                } ?>
        </div>
    </main>
    <!-- É preciso importar primeiro o JQuery e depois o script para funcionar corretamente -->
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script><!--JQuery-->
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/apiCep.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>