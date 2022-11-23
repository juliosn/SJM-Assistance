<?php
	require_once("../Controller.php");

	$controller = new Controller();
	$resultado = $controller->excluirConta($_GET['id'], $_GET['conta'], $_GET['nomeFuncionario']);
?>