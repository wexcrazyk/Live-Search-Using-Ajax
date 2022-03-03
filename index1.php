<?php 

$conn = mysqli_connect('localhost', 'root', 'root', 'demo-join');

if (mysqli_connect_errno($conn)){

	echo "Failed to Connect to MYSQL" . mysqli_connect_error();

	exit();
}

// echo "Connected successfully";

?>

<!DOCTYPE html>

<html>

<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	

<style>
	
#data-table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#data-table td, #data-table th {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

#data-table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #AF2333;
  color: white;
}


#data-table tr:nth-child(even){background-color: #f2f2f2;}

#data-table tr:hover {background-color: #ddd;}


/*table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;

}

tr:nth-child(even) {
    background-color: white;
}*/

</style>

</head>

<body>


	<?php

	$sql = mysqli_query($conn, "SELECT * FROM user");

	if(mysqli_num_rows($sql) > 0) {
	?>

	<table id="data-table">
		
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Password</th>
		</tr>
		<?php
		$i=0;

		while($row = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $row["username"]; ?></td>
			<td><?php echo $row["email"]; ?></td>
			<td><?php echo $row["password"]; ?></td>
		</tr>

		<?php

	   }

	   ?>

	</table>

	<?php 
	$i++;

	}

	else {
		echo "No Results Found.";
	}
		?>

<div class="container">
		<div class="card-body">
			<button type="button" class="btn btn-primary">Insert Data</button>
		</div>


</div>

</body>

<script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</html>