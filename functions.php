<?php
	//kõik AB'iga seonduv
	
	// ühenduse loomiseks kasuta
	require_once("../configglobal.php");
	$database = "if15_romil_2";

	
	// lisame kasutaja ab'i
	function createUser(){
		
		$mysqli = new mysqli($servername, $server_username, $server_password, $database);
		
		$stmt = $mysqli->prepare("INSERT INTO user_sample (email, password) VALUES (?, ?)");
		$stmt->bind_param("ss", $create_email, $password_hash);
		$stmt->execute();
		$stmt->close();
		
		$mysqli->close();		
	}
	
	//logime sisse
	function loginUser(){
		
		$mysqli = new mysqli($servername, $server_username, $server_password, $database);
		
		$stmt = $mysqli->prepare("SELECT id, email FROM user_sample WHERE email=? AND password=?");
		$stmt->bind_param("ss", $email, $password_hash);
		$stmt->bind_result($id_from_db, $email_from_db);
		$stmt->execute();
		if($stmt->fetch()){
			echo "kasutaja id=".$id_from_db;
		}else{
			echo "Wrong password or email!";
		}
		$stmt->close();
		
		$mysqli->close();
	}
	
?>