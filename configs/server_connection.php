<?php
//creating a database connection and check it

	$servername = "localhost";
	$username = "root";
	$userpass = "";
	$database = "gers_garage";

	$conn = mysqli_connect($servername, $username, $userpass, $database);

	if(!$conn){
		die("Connection failed: ".mysqli_connect_error());
	}
?>