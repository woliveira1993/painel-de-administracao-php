<?php
		$hostname = "localhost";
		$db = "bwapp"; 
		$user = "root";
		$pass = "";
		global $pdo;

			try{
				$pdo = new PDO("mysql:hostname=$hostname;dbname=$db", $user,$pass);
			}catch(PDOException $e){
				echo "ERRO:". $e->getMessage();
				exit;
			}
?>