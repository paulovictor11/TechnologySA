<?php

	require_once '../includes/DbOperations.php';

	$response = array();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['']) and isset($_POST['']) and isset($_POST[''])) {
			
			$db = new DbOperations();

			$result = $db->createUser($_POST[''], $_POST[''], $_POST['']);

			if ($result == 1) {
				$response['error'] = false;
				$response['message'] = "Usuario registrado com sucesso";
			} else if ($result == 2){
				$response['error'] = true;
				$response['message'] = "Ocorreu algum erro, tente novamente";
			} elseif ($result == 0) {
				$response['error'] = true;
				$response['message'] = "Parece que você esta registrado, escolha um e-mail diferente e um nome de usuario";
			}
			
		} else {
			$response['error'] = true;
			$response['message'] = "Os campos obrigatorios estao em branco";
		}
	} else {
		$response['error'] = true;
		$response['message'] = "Pedido invalido";
	}

	echo json_encode($response, JSON_PRETTY_PRINT);
?>