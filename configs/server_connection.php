<!--DATABASE CONNECTION-->
<?php

	//Credential
	$servername = "localhost";
	$username = "root";
	$userpass = "";
	$database = "gers_auto_repair";

	//create a db connection
	$conn = mysqli_connect($servername, $username, $userpass, $database);

	//check connection
	if(!$conn){
		die("Connection failed: ".mysqli_connect_error());
	}
?>