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
    <title>SJM - Assistance</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="bootstrap/js/bootstrap.js"></script>
    <link rel="shortcut icon" href="img/SJM.png" type="image/x-icon">
	<script>
		function confirmDelete(delUrl) {
  			if (confirm("Deseja apagar a conta?")) {
   				document.location = delUrl;
   				//var url_string = "http://localhost/agendamento-mysql/" + delUrl;
				//var url = new URL(url_string);
				//var data = url.searchParams.get("id"); //pega o value
	        }  
		}
		function confirmRecuperar(delUrl) {
  			if (confirm("Deseja recuperar a conta?")) {
   				document.location = delUrl;
   				//var url_string = "http://localhost/agendamento-mysql/" + delUrl;
				//var url = new URL(url_string);
				//var data = url.searchParams.get("id"); //pega o value
	        }  
		}
	</script>
</head>
<body>
    <header>
        <?php include_once "menu.php" ?>
    </header>
    <main class="main-consulta">


		<div class="container container-consulta">
			<?php //MENSAGEM DE SUCESSO CASO A CONTA SEJA DESATIVADA
				if(isset($_GET['excluirConta']) && $_GET['excluirConta'] == 'sucess'){  //mostra mensagem de conta criada caso seja criado com sucessi ?>
					<div class="div-mensagem-conta-criada-sucess">
						<!-- MENSAGEM DE CONTA DESATIVADA -->
						<div class="alert alerta-conta-success alert-success alert-dismissible fade show" style="width: 100%; display: block; margin-top:100px;" role="alert">
							<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
							<strong>Conta desativada com sucesso!</strong>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div><!-- Sucesso -->
					</div>
				<?php }elseif(isset($_GET['excluirConta']) && $_GET['excluirConta'] == 'danger'){ //mostra mensagem de conta nao criada caso tenha algum erro ao criar conta ?>
					
					<div class="div-mensagem-conta-criada-danger">
						<!-- MENSAGEM DE CONTA ATIVADA -->
						<div class="alert alerta-conta-danger alert-danger alert-dismissible fade show" style="width: 100%; display: block; margin-top:100px;" role="alert">
							<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
							<strong>Não foi possivel desativar conta!</strong> Tente novamente mais tarde.
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div><!-- Sucesso -->
					</div>
			<?php } ?>

			<?php //MENSAGEM DE SUCESSO CASO A CONTA SEJA DESATIVADA
				if(isset($_GET['recuperarConta']) && $_GET['recuperarConta'] == 'sucess'){  //mostra mensagem de conta criada caso seja criado com sucessi ?>
					<div class="div-mensagem-conta-criada-sucess">
						<!-- MENSAGEM DE CONTA DESATIVADA -->
						<div class="alert alerta-conta-success alert-success alert-dismissible fade show" style="width: 100%; display: block; margin-top:100px;" role="alert">
							<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
							<strong>Conta ativada com sucesso!</strong>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div><!-- Sucesso -->
					</div>
				<?php }elseif(isset($_GET['recuperarConta']) && $_GET['recuperarConta'] == 'danger'){ //mostra mensagem de conta nao criada caso tenha algum erro ao criar conta ?>
					
					<div class="div-mensagem-conta-criada-danger">
						<!-- MENSAGEM DE CONTA ATIVADA -->
						<div class="alert alerta-conta-danger alert-danger alert-dismissible fade show" style="width: 100%; display: block; margin-top:100px;" role="alert">
							<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
							<strong>Não foi possivel ativada conta!</strong> Tente novamente mais tarde.
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div><!-- Sucesso -->
					</div>
			<?php } ?>		
			

        <?php if(isset($_GET['consulta']) && $_GET['consulta'] == "cliente" || empty($_GET['consulta'])){  //pega variavel get para listar funcionario ?>
			<h1 class="titulo-consulta">Listagem de clientes</h1>
			<table class="table table-responsive" style="width: auto;">
				<thead class="table-active table-listar-cliente">
					<tr>
						<th scope="col">Código</th>
						<th scope="col">Nome</th>
						<th scope="col">Email</th>
						<th scope="col">Endereco</th>
						<th scope="col">Cep</th>
						<th scope="col">Conta</th>
						<th scope="col">Funcao</th>
					</tr>
				</thead>
				<tbody id="TableData">
				<?php
					$controller = new Controller();
					$resultado = $controller->listarClienteFuncionario(0);
					//print_r($resultado);
					for($i=0;$i<count($resultado);$i++){
				?>
						<tr>
							<td scope="col"><?php echo $resultado[$i]['id']; ?></td>
							<td scope="col"><?php echo $resultado[$i]['nome']; ?></td>
							<td scope="col"><?php echo $resultado[$i]['email']; ?></td>
							<td scope="col"><?php echo $resultado[$i]['endereco'] . " - " . $resultado[$i]['cidade'] . "/" . $resultado[$i]['estado']; ?></td>
							<td scope="col"><?php echo $resultado[$i]['cep']; ?></td>
							<td scope="col"><?php echo $resultado[$i]['EstadoConta']; ?></td>
							<td scope="col">
								<?php if($resultado[$i]['EstadoConta'][0] == "D"){ //caso a primeira letra seja D, esta desativado?>
									<button type="button" class="btn btn-ativar-cliente" onclick="javascript:confirmRecuperar('model/recuperarConta.php?id=<?php echo $resultado[$i]['id']; ?>&conta=cliente&nomeFuncionario=<?php echo $_SESSION['nome']; ?>')" style="width: 72px;">Ativar</button>
								<?php }else{ ?>
									<button type="button" class="btn btn-excluir-cliente" onclick="javascript:confirmDelete('model/excluirConta.php?id=<?php echo $resultado[$i]['id']; ?>&conta=cliente&nomeFuncionario=<?php echo $_SESSION['nome']; ?>')" style="width: 72px;">Excluir</button>
								<?php } ?>
							</td>
						</tr>
				<?php
					}
				?>
				</tbody>
			</table>
        <?php }elseif(isset($_GET['consulta']) && $_GET['consulta'] == "funcionario"){   //pega variavel get para listar cliente ?>
			<h1 class="titulo-consulta">Listagem de funcionarios</h1>
			<table class="table table-responsive" style="width: auto;">
				<thead class="table-active table-listar-cliente">
					<tr>
						<th scope="col">Código</th>
						<th scope="col">Nome</th>
						<th scope="col">Email</th>
						<th scope="col">Cargo</th>
						<th scope="col">Permissões</th>
						<th scope="col">Conta</th>
						<th scope="col">Função</th>
					</tr>
				</thead>
				<tbody id="TableData">
				<?php
					$controller = new Controller();
					$resultado = $controller->listarFuncionario(0);
					//print_r($resultado);
					for($i=0;$i<count($resultado);$i++){
				?>
						<tr>
							<td scope="col"><?php echo $resultado[$i]['idFuncionario']; ?></td>
							<td scope="col"><?php echo $resultado[$i]['nome']; ?></td>
							<td scope="col"><?php echo $resultado[$i]['email']; ?></td>
							<td scope="col"><?php echo $resultado[$i]['cargo'] ?></td>
							<td scope="col"><?php echo $resultado[$i]['permissoes']; ?></td>
							<td scope="col"><?php echo $resultado[$i]['EstadoConta']; ?></td>
							<td scope="col">
								<?php if($resultado[$i]['EstadoConta'][0] == "D"){ //caso a primeira letra seja D, esta desativado?>
									<button type="button" class="btn btn-ativar-cliente" onclick="javascript:confirmRecuperar('model/recuperarConta.php?id=<?php echo $resultado[$i]['idFuncionario']; ?>&conta=funcionario&nomeFuncionario=<?php echo $_SESSION['nome']; ?>')" style="width: 72px;">Ativar</button>
								<?php }else{ ?>
									<button type="button" class="btn btn-excluir-cliente" onclick="javascript:confirmDelete('model/excluirConta.php?id=<?php echo $resultado[$i]['idFuncionario']; ?>&conta=funcionario&nomeFuncionario=<?php echo $_SESSION['nome']; ?>')" style="width: 72px;">Excluir</button>
								<?php } ?>
							</td>
						</tr>
				<?php
					}
				?>
				</tbody>
			</table>
        <?php }elseif(isset($_GET['consulta']) && $_GET['consulta'] == "servico"){   //pega variavel get para listar servicos ?>

        <?php } ?></div>
    </main>
    <?php include_once "footer.php" ?>
</body>
</html>