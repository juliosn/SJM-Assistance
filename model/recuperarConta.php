<?php
	require_once("../Controller.php");

	$controller = new Controller();
	$resultado = $controller->recuperarConta($_GET['id'], $_GET['conta'], $_GET['nomeFuncionario']);
?>