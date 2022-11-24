<?php
    session_start();//inicia sessão
    $logado =  $_SESSION['logado'] ?? NULL;//pega sessão que verifica se o usuario esta logado ou nao
    if(!$logado) die(header('Location: index.php'));//caso o usuaio nao esteja logado manda redreciona para a pagina principal
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- DECLARAÇÃO DE TECNOLOGIAS E PROPRIEDADES DO SISTEMA: -->
    <meta name="description" content="Assistência técnica de notebooks">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SJM Assistance - Minha Conta</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">  
    <script src="bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</head>
<body>
    <header>
        <?php include_once "menu.php" ?>
    </header>
    <main>
        <div class="container container-sobre">
            <?php
                if(isset($_GET['alterarImagem']) && $_GET['alterarImagem'] == 'sucess'){   ?>
                    <div class="div-mensagem-conta-criada-sucess">
                        <!-- MENSAGEM DE CONTA CRIADA -->
                        <div class="alert alerta-entrar  alert-success alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Imagem alterada com sucesso!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='conta.php'"></button>
                        </div><!-- Sucesso -->
                    </div>
               <?php }elseif(isset($_GET['alterarImagem']) && $_GET['alterarImagem'] == 'danger'){ ?>

                    <div class="div-mensagem-conta-criada-danger">
                        <!-- MENSAGEM DE CONTA NÃO CRIADA -->
                        <div class="alert alerta-entrar alert-danger alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Não foi possivel alterar sua imagem!</strong> Tente novamente mais tarde.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='conta.php'"></button>
                        </div><!-- Sucesso -->
                    </div>
           <?php } ?>

           <?php //MENSAGEM DE CONTA ATUALIZADA
                if(isset($_GET['atualizarConta']) && $_GET['atualizarConta'] == 'sucess'){   ?>
                    <div class="div-mensagem-conta-criada-sucess">
                        <!-- MENSAGEM DE CONTA CRIADA -->
                        <div class="alert alerta-entrar  alert-success alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Conta atualizada com sucesso!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='conta.php'"></button>
                        </div><!-- Sucesso -->
                    </div>
               <?php }elseif(isset($_GET['atualizarConta']) && $_GET['atualizarConta'] == 'danger'){ ?>

                    <div class="div-mensagem-conta-criada-danger">
                        <!-- MENSAGEM DE CONTA NÃO CRIADA -->
                        <div class="alert alerta-entrar alert-danger alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Não foi possivel atualizar sua conta!</strong> Tente novamente mais tarde.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='conta.php'"></button>
                        </div><!-- Sucesso -->
                    </div>
           <?php } ?>

           <?php if(isset($_GET['alterarImagem']) && $_GET['alterarImagem'] == 'extensaoErrada'){ ?>
                <div class="div-mensagem-conta-criada-danger">
                    <!-- MENSAGEM DE CONTA NÃO CRIADA -->
                    <div class="alert alerta-entrar alert-danger alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <strong>Não foi possivel atualizar sua conta!</strong> A imagem precisa ser png, jpg ou jpeg.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='conta.php'"></button>
                    </div><!-- Sucesso -->
                </div>
            <?php } ?>


           <h1 class="titulo-sobre">Minha Conta</h1>
            <form method="POST" enctype="multipart/form-data" class="form-img-Conta" action="Controller.php?funcao=mudarImagemConta">
                <label for="imgConta" class="label-mudar-img-conta">
                    <div class="mudar-img-conta">
                        <img src="img/imgConta/<?php echo $_SESSION['imgConta']; ?>" class="img-conta-script mudar-img-conta" height="100%" width="100%">
                        <div class="hover-mudar-img-conta">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#ccc" class="bi bi-camera-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
                            </svg>
                        </div>
                    </div>
                </label>
                <input class="item-form-img-conta" type="file" name="imgConta" id="imgConta" required accept="image/png, image/jpeg, image/jpg">
                <button class="btn btn-mudar-imagem" name="enviar" type="submit">Alterar imagem</button>
            </form>
        </div>
        <?php 
            if(empty($_SESSION['idFuncionario'])){ //caso a sessão cargo for vazia, é um cliente que está logado
                $conta = "cliente";//essa variavel é passada pela url nor formulario para atualizar um cliente
            }else{//caso a sessão cargo for verdadeira, é um funcionario que está logado
                $conta = "funcionario";//essa variavel é passada pela url nor formulario para atualizar um funcionario
            }
        ?>
            <div class="row" style="align-items: center;">
                <div class="col col-cadastro">
                    <form class="form-cadastra-funcionario needs-validation" method="post" novalidate action="Controller.php?funcao=atualizarConta&conta=<?php echo $conta; ?>">
                        <div class="row">
                            <div class="form-group col-md-6 mb-3 col-form-cadastro">
                                <label for="txtNomeCadastro">Nome Completo</label>
                                <input type="text" class="form-control" id="txtNomeCadastro" value="<?php echo $_SESSION['nome'] ?>" name="txtNomeCadastro" required select>
                                <div class="invalid-feedback">
                                    Por favor, informe seu nome.
                                </div>
                            </div>
                        <?php if(empty($_SESSION['idFuncionario'])){  //mostrar nome de usuário apenas se for cliente ?>
                            <div class="form-group col-md-6 mb-3 col-form-cadastro">
                                <label for="txtNomeUsuario">Nome de usuário</label>
                                <input type="text" class="form-control" value="<?php echo $_SESSION['nomeUsuario'] ?>" id="txtNomeUsuario" name="txtNomeUsuario" required>
                                <div class="invalid-feedback">
                                    Por favor, informe o cargo do funcionario.
                                </div>
                            </div>
                        <?php }?>
                        <?php if(isset($_SESSION['idFuncionario'])){  //mostrar cargo de usuário apenas se for funcionario ?>
                            <div class="form-group col-md-6 mb-3 col-form-cadastro">
                                <label for="txtCargo">Cargo</label>
                                <input type="text" class="form-control" value="<?php echo $_SESSION['cargo'] ?>" id="txtCargo" name="txtCargo" disabled required>
                            </div>
                        <?php }?>
                            <div class="col-md-6 mb-3 col-form-cadastro">
                                <label for="txtEmailCadastrar">Email</label>
                                <input type="email" class="form-control" value="<?php echo $_SESSION['login'] ?>" id="txtEmailCadastrar" name="txtEmailCadastrar" required>
                                <div class="invalid-feedback">
                                Por favor, informe seu email.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 col-form-cadastro">
                                <label for="txtSenhaEntrar">Senha</label>
                                <div class="senha">
                                    <img src="img/eye.svg" class="img-mostrar-senha" id="img-mostrar" height="30" alt="" onclick="showPassword()">
                                    <input type="password"value="<?php echo $_SESSION['password'] ?>" class="form-control password" id="txtSenhaCadastrar" name="txtSenhaCadastrar" required>
                                </div>
                                <div class="invalid-feedback">
                                    Por favor, informe sua senha.
                                </div>
                                <small id="passwordHelpInline" class="text-muted">
                                    Crie uma senha segura, com numeros e letras.
                                </small>
                            </div>
                        <?php if(isset($_SESSION['idFuncionario'])){  //mostrar cargo de usuário apenas se for funcionario ?>
                            <div class="col-md-12 mb-3 col-form-cadastro">
                                <label for="txtPermissoes">Permissões</label>
                                <input type="text" id="txtPermissoes" value="<?php echo $_SESSION['permissoes'] ?>" class="form-control" name="txtPermissoes" placeholder="" disabled required>
                            </div>
                        <?php }?>
                        <?php if(empty($_SESSION['idFuncionario'])){  //mostrar nome de usuário apenas se for cliente ?>
                                    
                            <div class="col-md-6 mb-3 col-form-cadastro">
                                <label for="txtEndereco">Endereço</label>
                                <input type="text" value="<?php echo $_SESSION['endereco'] ?>" class="form-control" id="txtEndereco" name="txtEndereco" placeholder="" required>
                                <div class="invalid-feedback">
                                    Por favor, confirme sua senha.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 col-form-cadastro">
                                <label for="txtNumero">Número</label>
                                <input type="text" value="<?php echo $_SESSION['numero'] ?>" class="form-control" id="txtNumero" name="txtNumero" placeholder="" required>
                                <div class="invalid-feedback">
                                    Por favor, confirme seu número.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 col-form-cadastro">
                                <label for="txtComplemento">Complemento</label>
                                <input type="text" value="<?php echo $_SESSION['complemento'] ?>" class="form-control" id="txtComplemento" name="txtComplemento" placeholder="">
                            </div>
                            <div class="col-md-6 mb-3 col-form-cadastro">
                                <label for="txtCidade">Cidade</label>
                                <input type="text" value="<?php echo $_SESSION['cidade'] ?>" class="form-control" id="txtCidade" name="txtCidade" placeholder="" required>
                                <div class="invalid-feedback">
                                    Por favor, confirme sua cidade.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 col-form-cadastro">
                                <label for="txtEstado">Estado</label>
                                <input type="text" value="<?php echo $_SESSION['estado'] ?>" class="form-control" id="txtEstado" name="txtEstado" placeholder="" required>
                                <div class="invalid-feedback">
                                    Por favor, confirme seu Estado.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 col-form-cadastro">
                                <label for="txtCep">CEP</label>
                                <input type="text" value="<?php echo $_SESSION['cep'] ?>" class="form-control" id="txtCep" name="txtCep" placeholder="" required>
                                <div class="invalid-feedback">
                                    Por favor, confirme seu CEP.
                                </div>
                            </div>
                        <?php } ?>
                        <button class="btn btn-cadastrar" type="submit" style="margin-top: 50px;">Atualizar Cadastro</button><br><br>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        //SCRIPT PARA ADICIONAR IMAGEM NO LABEL QUANDO ESCOLHER UMA IMAGEM

        const inputImgConta = document.querySelector("#imgConta");//input da imagem
        const mudarImgConta = document.querySelector(".mudar-img-conta");//div com a imagem

        inputImgConta.addEventListener('change', function(e){//quando o input da imagem tiver alguma alteração
            const inputTarget = e.target//pega inpu inteiro
            const file = inputTarget.files[0];//pega nome da imagem
                
            if(file){//se o usuario escolher um arquivo
                const reader = new FileReader();//variavel para fazer leitura do arquivo

                reader.addEventListener('load', function(e){//quando o reader tiver uma 
                    const readerTarget = e.target;

                    const imgConta = document.querySelector(".img-conta-script").src = readerTarget.result//muda imagem no label
                });
                reader.readAsDataURL(file);//pega url da imagem
            }
        })
    </script>
    <?php include_once "footer.php" ?>
</body>
</html>