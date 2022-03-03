<?php
include_once 'connect.php';


if (isset($_POST['savedata']))
{
// variables for input data

// $userId = $_POST['userId'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$city_name = $_POST['city_name'];
$email = $_POST['email'];
// sql query for inserting data into database

// mysqli_query($conn,"insert into myusers(first_name,last_name,city_name,email) values ('$first_name','$last_name','$city_name','$email')") or die(mysqli_error());
// echo "<p align=center>Data Added Successfully.</p>";

$query = " INSERT INTO myusers (first_name, last_name, city_name, email) VALUES ('$first_name','$last_name','$city_name','$email')";
$query_run = mysqli_query($connection, $query);

if($query_run)
{
	echo '<script> alert("Data Saved!"); </script>';
	header('Location: index.php');
}

else
{
	echo '<script> alert("Data Not Saved"); </script>';
}

}

?> 