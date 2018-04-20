<?php

	class DbOperations{
		private $con;
		
		function __construct(){
			require_once dirname(__FILE__).'/DbConnect.php';

			$db = new DbConnect();

			$this->con = $db->connect();
		}

		public function createUser(){
			if ($this->isUserExist()) {
				return 0;
			} else {
				$stmt = $this->con->prepare("INSERT INTO  VALUES ");
				$stmt->bind_param();

				if ($stmt->execute()) {
					return 1;
				} else {
					return 2;
				}
				
			}
			
		}

		public function userLogin(){
			$stmt = $this->con->prepare("SELECT  FROM  WHERE  = ? AND  = ?");
			$stmt->bind_param();
			$stmt->execute();
			$stmt->store_result();

			return $stmt->num_rows > 0;
		}
		
		public function getUserByEmail(){
		 	$stmt = $this->con->prepare("SELECT  FROM  WHERE  = ?");
		 	$stmt->bind_param();
		 	$stmt->execute();

		 	return $stmt->get_result()->fetch_assoc();
		}

		private function isUserExist(){
			$stmt = $this->con->prepare("SELECT  FROM  WHERE  = ? AND  = ?");
			$stmt->bind_param();
			$stmt->execute();
			$stmt->store_result();

			return $stmt->num_rows > 0;
		}
	}

?>