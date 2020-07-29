<?php
//creating a database connection and check it

	$servername = "localhost";
	$username = "root";
	$userpass = "";
	$database = "gers_auto_repair";

	$conn = mysqli_connect($servername, $username, $userpass, $database);

	if(!$conn){
		die("Connection failed: ".mysqli_connect_error());
	}
?>