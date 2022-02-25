<?php 
	$servername = "localhost";
	$username = "root";
	$password = "1234";
	$database = "user";
	
	$con = new mysqli($servername, $username, $password, $database);
	if ($con->connect_error) {
	    die("Connection failed: " . $con->connect_error);
	} else {
		echo "kết nối thất bại";
	}
	
?>