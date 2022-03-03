<?php 

$conn = mysqli_connect('localhost', 'root', 'root', 'demo-join');

if (mysqli_connect_errno($conn)){

	echo "Failed to Connect to MYSQL" . mysqli_connect_error();

	exit();
}

// echo "Connected successfully";

?>