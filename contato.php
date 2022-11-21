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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="img/SJM.png" type="image/x-icon">
</head>
<body>
    <header>
        <?php include_once "menu.php" ?>
    </header>
    <main>
        <div class="container container-servico">
        <?php
                if(isset($_GET['mensagem']) && $_GET['mensagem'] == 'enviada'){  //mostra mensagem de conta criada caso seja criado com sucessi ?>
                    <div class="div-mensagem-conta-criada-sucess">
                        <!-- MENSAGEM DE MENSAGEM ENVIADA -->
                        <div class="alert alerta-entrar alerta-conta-success alert-success alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Mensagem enviada com sucesso!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='contato.php'"></button>
                        </div><!-- Erro -->
                    </div>
               <?php }elseif(isset($_GET['mensagem']) && $_GET['mensagem'] == 'naoEnviada'){ //mostra mensagem de conta nao criada caso tenha algum erro ao criar conta ?>

                    <div class="div-mensagem-conta-criada-danger">
                        <!-- MENSAGEM DE MENSAGEM ENVIADA -->
                        <div class="alert alerta-entrar alerta-conta-danger alert-danger alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Não foi enviar a mensagem!</strong> Tente novamente mais tarde.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='contato.php'"></button>
                        </div><!-- Sucesso -->
                    </div>
           <?php } ?>
            <h1 class="titulo-contato">Entre em contato</h1>
            <?php if(isset($_SESSION['id'])){
                $email = $_SESSION['login'];
                $display = "none";
            }else{
                $email = "";
                $display = "block";
            }
            ?>
                <div class="row row-contato" style="">
                    <div class="col-6 col-form-servico col-servico">
                        <form class="form-entrar needs-validation" novalidate method="POST" action="controller/Controller.php?funcao=contato">
                            <div class="row row-form-servico">
                            <div class="form-group col-12" style="display:<?php echo $display ?>">
                                <label for="txtEmailContato">Email</label>
                                <input type="text" class="form-control" id="txtEmailContato" value="<?php echo $email ?>" name="txtEmailContato" required select>
                                <div class="invalid-feedback">
                                    Por favor, informe seu email
                                </div>
                            </div>
                            <div class="col-12 col-form-cadastro">
                                <label for="txtTipoMensagem">Tipo da Mensagem</label>
                                <select class="form-select" id="txtTipoMensagem" name="txtTipoMensagem" aria-label="Default select example">
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
                                <label for="txtMensagem">Mensagem</label>
                                <textarea class="form-control textarea-descricao-problema" id="txtMensagem" name="txtMensagem" required></textarea>
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