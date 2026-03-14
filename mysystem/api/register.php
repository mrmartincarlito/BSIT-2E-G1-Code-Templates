<?php
include "config.php";

if (isset($_POST['action'])) {
	if ($_POST['action'] == "store") {
		$payload = json_decode($_POST['payload']);
		
		$hashedPassword = password_hash($payload->password, PASSWORD_DEFAULT);
		
		/**
		
		s - string
		i - integer
		d - double
		b - blob
		*/
		$statement = $conn->prepare("INSERT INTO accounts (fname, lname, email, password) VALUES (?,?,?,?)");
		$statement->bind_param("ssss", $payload->fname, $payload->lname, $payload->email, $hashedPassword);
		
		if ($statement->execute()) {
			echo json_encode([
				"status" => "success",
				"message" => "Successfully Inserted"
			]);
		} else {
			echo json_encode([
				"status" => "failed",
				"message" => "Failed to insert"
			]);
		}
	}
	
	if ($_POST['action'] == "update") {
		
	}
	
	if ($_POST['action'] == "drop") {
		
	}
}


if (isset($_GET['action'])) {
	if ($_GET['action'] == "get") {
		
	}
	
	if ($_GET['action'] == "getOne") {
		
	}
	
	
}