<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM myusers");
?>
<!DOCTYPE html>
<html>
<head>
<title> Retrive data</title>

<style type="text/css">
	table {
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
}

</style>
</head>
<body>
<table>
<tr>
<td>First Name</td>
<td>Last Name</td>
<td>City</td>
<td>Email id</td>
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
if($i%2==0)
$classname="even";
else
$classname="odd";
?>
<tr class="<?php if(isset($classname)) echo $classname;?>">
<td><?php echo $row["first_name"]; ?></td>
<td><?php echo $row["last_name"]; ?></td>
<td><?php echo $row["city_name"]; ?></td>
<td><?php echo $row["email"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
</body>
</html> 