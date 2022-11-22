<?php
	require_once("../controller/Controller.php");

	$controller = new Controller();
	$resultado = $controller->excluirConta($_GET['id'], $_GET['conta'], $_GET['nomeFuncionario']);
?>