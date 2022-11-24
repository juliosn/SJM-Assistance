<?php
	session_start();	
 	require_once("Controller.php");
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
    <title>SJM  Assistance - Consulta</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">  
    <script src="bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script>
		function confirmDelete(delUrl) {
  			if (confirm("Deseja apagar a conta?")) {
   				document.location = delUrl;
	        }  
		}
		function confirmRecuperar(delUrl) {
  			if (confirm("Deseja recuperar a conta?")) {
   				document.location = delUrl;
	        }  
		}
		function confirmAtualizacao(id) {
  			if (confirm("Deseja atualizar a conta?")) {
   				document.location = delUrl;
	        }  
		}
	</script>
</head>
<body>
    <header>
        <?php include_once "menu.php" ?>
    </header>
    <main class="main-consulta">


		<div class="container">
			<?php //MENSAGEM DE SUCESSO CASO A CONTA SEJA DESATIVADA
				if(isset($_GET['excluirConta']) && $_GET['excluirConta'] == 'sucess'){   ?>
					<!-- MENSAGEM DE CONTA DESATIVADA COM SUCESSO-->
					<div class="div-mensagem-conta-desativada-sucess">
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
							<strong>Conta desativada com sucesso!</strong>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='consulta.php'"></button>
						</div><!-- Sucesso -->
					</div>
				<?php }elseif(isset($_GET['excluirConta']) && $_GET['excluirConta'] == 'danger'){ ?>
					<!-- MENSAGEM DE CONTA NAO ATIVADA (ERRO) -->
					<div class="div-mensagem-conta-desativada-danger">
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
							<strong>Não foi possivel desativar conta!</strong> Tente novamente mais tarde.
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='consulta.php'"></button>
						</div><!-- Sucesso -->
					</div>
			<?php } ?>

			<?php
				if(isset($_GET['recuperarConta']) && $_GET['recuperarConta'] == 'sucess'){   ?>
					<!-- MENSAGEM DE CONTA RECUPERADA COM SUCESSO -->
					<div class="div-mensagem-conta-recuperada-sucess">
						<div class="alert  alert-success alert-dismissible fade show" role="alert">
							<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
							<strong>Conta ativada com sucesso!</strong>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='consulta.php'"></button>
						</div><!-- Sucesso -->
					</div>
				<?php }elseif(isset($_GET['recuperarConta']) && $_GET['recuperarConta'] == 'danger'){ ?>
					<!-- MENSAGEM DE CONTA NAO RECUPERADA (ERRO) -->
					<div class="div-mensagem-conta-recuperada-danger">
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
							<strong>Não foi possivel ativada conta!</strong> Tente novamente mais tarde.
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='consulta.php'"></button>
						</div><!-- Sucesso -->
					</div>
			<?php } ?>		
			
			<?php //MENSAGEM DE CONTA ATUALIZADA
                if(isset($_GET['atualizarConta']) && $_GET['atualizarConta'] == 'sucess'){   ?>
					<!-- MENSAGEM DE CONTA CRIADA -->
                    <div class="div-mensagem-conta-atualizada-adm-sucess">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Conta atualizada com sucesso!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='consulta.php?consulta=funcionario'"></button>
                        </div><!-- Sucesso -->
                    </div>
               <?php }elseif(isset($_GET['atualizarConta']) && $_GET['atualizarConta'] == 'danger'){ ?>
					<!-- MENSAGEM DE CONTA NÃO CRIADA -->
                    <div class="div-mensagem-conta-atualizada-adm-danger">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <strong>Não foi possivel atualizar sua conta!</strong> Tente novamente mais tarde.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='consulta.php?consulta=funcionario'"></button>
                        </div><!-- Sucesso -->
                    </div>
           <?php } ?>
        <?php if(isset($_GET['consulta']) && $_GET['consulta'] == "cliente" || empty($_GET['consulta'])){  //pega variavel get para listar funcionario ?>
			<h1 class="titulo-consulta">Listagem de clientes</h1>
			<?php
				$controller = new Controller();
				$resultado = $controller->listarClienteFuncionario(0);
				if(count($resultado) >=1){
			?>
			<div class="table">
				<table class="table table-responsive" style="width: 100%;">
					<thead class="table-active table-listar-cliente">
						<tr>
							<th scope="col">Código</th>
							<th scope="col" class="col-tb-nome">Nome</th>
							<th scope="col">Email</th>
							<th scope="col" class="col-tb-end">Endereco</th>
							<th scope="col">Cep</th>
							<th scope="col" class="col-tb-estado-conta">Conta</th>
							<th scope="col">Funcao</th>
						</tr>
					</thead>
					<tbody id="TableData">
					<?php
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
					}else{
						echo "<h1>Nenhum registro encontrado!</h1>";
					}
					?>
					</tbody>
				</table>											
			</div>
        <?php }elseif(isset($_GET['consulta']) && $_GET['consulta'] == "funcionario"){   //pega variavel get para listar cliente ?>
			<h1 class="titulo-consulta">Listagem de funcionarios</h1>
			<div class="table">
				<table class="table table-responsive" style="width: 100%;">
					<thead class="table-active table-listar-cliente">
						<tr>
							<th scope="col">Código</th>
							<th scope="col">Nome</th>
							<th scope="col">Email</th>
							<th scope="col" class="col-cargo">Cargo</th>
							<th scope="col">Permissões</th>
							<th scope="col">Conta</th>
							<th scope="col" class="col-tb-funcao">Função</th>
						</tr>
					</thead>
					<tbody id="TableData">
							<?php
								$controller = new Controller();
								$resultado = $controller->listarFuncionario(0);
								
								for($i=0;$i<count($resultado);$i++){
							?>
									<form action="" method="post">
										<tr>
											<?php $_SESSION['idAtualizarFuncionario'] = $resultado[$i]['idFuncionario']; ?>
											<td scope="col"><textarea class="textarea-id-atualizar-funcionario" name="txtIdFuncionario" id="txtIdFuncionario" cols="1" rows="1"><?php echo $resultado[$i]['idFuncionario']; ?>	</textarea></td>
											<td scope="col"><?php echo $resultado[$i]['nome']; ?></td>
											<td scope="col"><?php echo $resultado[$i]['email']; ?></td>
											<td scope="col"><textarea class="form-control textarea-atualizar-funcionario" name="txtCargoFuncionario" id="txtCargoFuncionario" cols="" rows="1"><?php echo $resultado[$i]['cargo'] ?></textarea></td>
											<td scope="col">
												<select class="form-select select-atualizar-funcionario" id="txtPermissoes" name="txtPermissoes" aria-label="Default select example">
													<option value="nenhum" <?php if($resultado[$i]['permissoes'] == "nenhum"){echo "selected";} ?>>Nenhum</option>
													<option value="todas" <?php if($resultado[$i]['permissoes'] == "todas"){echo "selected";} ?>>Todas</option>
												</select>
											<td scope="col"><?php echo $resultado[$i]['EstadoConta']; ?></td>
											<td scope="col">
											<button class="btn btn-atualizar-cliente" name="btnAtualizar" id="btnAtualizar">Atualizar</button>
												<?php if($resultado[$i]['EstadoConta'][0] == "D"){ //caso a primeira letra seja D, esta desativado?>
													<button type="button" class="btn btn-ativar-cliente" onclick="javascript:confirmRecuperar('model/recuperarConta.php?id=<?php echo $resultado[$i]['idFuncionario']; ?>&conta=funcionario&nomeFuncionario=<?php echo $_SESSION['nome']; ?>')" style="width: 72px;">Ativar</button>
												<?php }else{ ?>
													<button type="button" class="btn btn-excluir-cliente" onclick="javascript:confirmDelete('model/excluirConta.php?id=<?php echo $resultado[$i]['idFuncionario']; ?>&conta=funcionario&nomeFuncionario=<?php echo $_SESSION['nome']; ?>')" style="width: 72px;">Excluir</button>
												<?php } ?>
											</td>
										</tr>

										<?php 
												extract($_POST, EXTR_OVERWRITE);
												if(isset($btnAtualizar)){  ?>
													<script>location.href='Controller.php?funcao=atualizarFuncionario&id=<?php echo $_POST['txtIdFuncionario']; ?>&cargo=<?php echo $_POST['txtCargoFuncionario']; ?>&permissoes=<?php echo $_POST['txtPermissoes']; ?>'</script>
												<?php }
												//$_POST['txtIdFuncionario']
											?>
										</form>
								<?php
									}
								?>
					</tbody>
				</table>
			</div>
        <?php }elseif(isset($_GET['consulta']) && $_GET['consulta'] == "servico"){   //pega variavel get para listar servicos ?>
			<h1 class="titulo-consulta">Listagem de Serviços</h1>
			<?php 
				$controller = new Controller();
				$resultado = $controller->listarServico(0);
				$resultadoStatusPedido = $controller->statusServico(0);
				$resultadoCliente = $controller->listarClienteFuncionario(0);
				$resultadoFuncionario = $controller->listarFuncionario(0);
			?>
			<?php
				if(count($resultado) >=1){ ?>
					<div class="table">
					<table class="table table-responsive" style="width: 100%;">
						<thead class="table-active table-listar-cliente">
							<tr>
								<th scope="col">Código</th>
								<th scope="col">Cliente</th>
								<th scope="col">Aceito</th>
								<th scope="col">Marca</th>
								<th scope="col">Modelo</th>
								<th scope="col">Problema</th>
								<th scope="col">Envio</th>
								<th scope="col">Garantia</th>
								<th scope="col" style="width: 300px">Data da Solicitação</th>
								
							</tr>
						</thead>
						<tbody id="TableData">
							<?php
								for($i=0;$i<count($resultado);$i++){
									$resultadoNomeCliente = $controller->statusServicoFuncionario($resultado[$i]['idServico']);
									// print_r($resultadoNomeCliente); echo "<br>";echo "<br>";echo "<br>";

									// echo $resultadoNomeCliente[0]['idStatusPedido'];
							?>
								<tr>	
									<td scope="col"><?php echo $resultado[$i]['idServico']; ?></td>
									<td scope="col"><?php echo $resultadoCliente[$resultadoNomeCliente[0]['idCliente'] -1]['nome']; ?></td>
									<td scope="col">
										<?php  
											if($resultadoStatusPedido[$i]['idFuncionario'] == 0){
												echo "Não";
											}else{
												echo $resultadoFuncionario[$resultadoStatusPedido[$i]['idFuncionario'] -1]['nome'];
											}
										?>
									</td>
									<td scope="col"><?php echo $resultado[$i]['marca']; ?></td>
									<td scope="col"><?php echo $resultado[$i]['modelo']; ?></td>
									<td scope="col"><?php echo $resultado[$i]['descricaoProblema'] ?></td>
									<td scope="col"><?php echo $resultado[$i]['formaEnvio'] ?></td>
									<td scope="col"><?php echo $resultado[$i]['garantia']; ?></td>
									<td scope="col"><?php echo $resultado[$i]['dataServico']; ?></td>
							<?php
								}
							?>
						</tbody>
					</table>
				<?php }else{
						echo "<h1 class='txt-sem-registro'>Nenhum registro encontrado!</h1>";
					}
				?>
			</div>
        <?php } ?></div>
    </main>
    <?php include_once "footer.php" ?>
</body>
</html>