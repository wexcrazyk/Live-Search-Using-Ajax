<?php

include 'config.php';
$output ='';

if(isset($_POST['query'])){
	$search=$_POST['query'];
	$stmt=$conn->prepare("SELECT * FROM myusers WHERE first_name LIKE CONCAT('%',?,'%') OR last_name LIKE CONCAT('%',?,'%') OR city_name LIKE CONCAT('%',?,'%')");
	$stmt->bind_param("sss",$search,$search,$search);
}
else{
	$stmt=$conn->prepare("SELECT * FROM myusers");
}
	$stmt->execute();
	$result=$stmt->get_result();

	if($result->num_rows>0){
				$output = "<thead>
						    <tr>
						       <th class='table-dark'>First Name</th>
						       <th class='table-dark'>Last Name</th>
						       <th class='table-dark'>City</th>
						       <th class='table-dark'>Email</th>
					        </tr>
					       </thead>
					       <tbody>";
		while($row=$result->fetch_assoc()){
			$output .="
			<tr>
		      <td>".$row['first_name']."</td>
		      <td>".$row['last_name']."</td>
		      <td>".$row['city_name']."</td>
		      <td>".$row['email']."</td>
			</tr>
			";
		}
		$output .="</tbody>";
		echo $output;
		
		}
		else{
			echo "<h3> No Records Found!</h3>";
	}
 ?>