<?php 
	$servername = "localhost";
	$username = "root";
	$password = "1234";
	$database = "user";
	
	$conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die('kết nối không thành công ' . mysqli_connect_error());
    }
    // thành công
    ?>