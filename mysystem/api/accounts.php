<?php
include "config.php";

if (isset($_POST['action'])) {
	if ($_POST['action'] == "store") {
		
	}
	
	if ($_POST['action'] == "update") {
		$id = $_POST['id'];
		$payload = json_decode($_POST['payload']);
		
		$statement = $conn->prepare("UPDATE accounts set fname = ?, email = ? where id = ?");
		$statement->bind_param("ssi", $payload->fname, $payload->email,$id);
		
		if ($statement->execute()) {
			echo json_encode([
				"status" => "success",
				"message" => "Successfully updated"
			]);
		} else {
			echo json_encode([
				"status" => "failed",
				"message" => "Cannot update record"
			]);
		}
		
	}
	
	if ($_POST['action'] == "drop") {
		$id = $_POST['id'];
		
		$statement = $conn->prepare("DELETE FROM accounts where id = ?");
		$statement->bind_param("i", $id);
		
		if ($statement->execute()) {
			echo json_encode([
				"status" => "success",
				"message" => "Successfully deleted"
			]);
		} else {
			echo json_encode([
				"status" => "failed",
				"message" => "Cannot delete record"
			]);
		}
		
	}
}


if (isset($_GET['action'])) {
	if ($_GET['action'] == "get") {
		$statement = $conn->prepare("SELECT * FROM accounts");
		$statement->execute();
		$result = $statement->get_result();
		
		$accounts = [];
		while($row = $result->fetch_assoc()){
			$accounts[] = $row;
		}
		
		echo json_encode([
			"status" => "success",
			"data" => $accounts
		]);
	}
	
	if ($_GET['action'] == "getOne") {
		$id = $_GET['id'];
		$statement = $conn->prepare("SELECT * FROM accounts where id = ?");
		$statement->bind_param("i", $id);
		$statement->execute();
		$result = $statement->get_result();
		
		echo json_encode([
			"status" => "success",
			"data" => $result->fetch_assoc()
		]);
	}
	
	
}