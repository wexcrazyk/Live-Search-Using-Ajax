<?php

$conn = new mysqli("localhost", "root", "root", "demo-join");

if($conn->connect_error){
	die("Connect Failed" . $conn->connect_error);
}



?>