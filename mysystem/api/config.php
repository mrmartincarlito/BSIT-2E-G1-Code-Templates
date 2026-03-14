<?php
include "env.php";

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
	die("Database Connection Failed");
}

session_start();