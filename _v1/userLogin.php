<?php

	require_once '../includes/DbOperations.php';

	$response = array();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['']) and isset($_POST[''])) {
			$db = new DbOperations();
		 	
		 	if ($db->userLogin($_POST[''], $_POST[''])) {
		 		$email = $db->getUserByEmail($_POST['']);

		 		$response['error'] = false;

		 		$response[''] = $email[''];

		 	} else {
		 		$response['error'] = true;
				$response['message'] = "Email ou CPF invalidos";
		 	}
		} else {
			$response['error'] = true;
			$response['message'] = "Os campos obrigatorios estao em branco";
		}
		
	}

	function utf8ize($d){
		if (is_array($d)) {
			foreach ($d as $key => $value) {
				$d[$key] = utf8ize($value);
			}
		} elseif (is_string($d)) {
			return utf8_encode($d);
		}

		return $d;
	}

	echo json_encode(utf8ize($response), JSON_PRETTY_PRINT);

?>