<?php
$conn = new mysqli("localhost","root","scorpio","teleraddb");
	// $clientID = getIdByGateway($_SESSION['gateway']);
	$sql = "SELECT fk_study FROM study_table ";
	$result1 = $conn->query($sql);
	$conn->close();
	while($row = $result1->fetch_object())
	{
		$sid = $row->fk_study;
		echo $sid;
		$conn1 = new mysqli("localhost","root","scorpio","pacsdb");

		$sql = "SELECT updated_time FROM study WHERE pk='$sid' ";
		$result2 = $conn1->query($sql);
		$row2 = $result2->fetch_object();
		$uptme = $row2->updated_time;
		echo $uptme;
		$conn1->close();
		$conn = new mysqli("localhost","root","scorpio","teleraddb");
		// $clientID = getIdByGateway($_SESSION['gateway']);
		$sql = "UPDATE study_table SET datetime='$uptme' WHERE fk_study='$sid'";
		$result3 = $conn->query($sql);
		// $conn->close();
		// $result1 = getEverythingByPid($pid);
		/*while($row1 = $result1->fetch_object()) {
			echo '<tr>';
			echo '<td id = "name'.$row1->id.'">'.$row1->name.'</td>';
			echo '<td id = "dob'.$row1->id.'">'.$row1->dob.'</td>';
			$gender = $row1->gender==1 ? "Male":"Female";
			// if($row->gender==3) { $gender="Unspecified"}
			echo '<td>'.$gender.'</td>';
			echo '<td id = "cmnt'.$row1->id.'"><button id = "'.$row1->id.'" class="open-MyModal btn btn-primary" data-toggle="modal" data-name="'.$row1->name.'" data-add1="'.$row1->address1.'" data-add2="'.$row1->address2.'" data-pincode="'.$row1->pincode.'" data-dob="'.$row1->dob.'" data-row-id="'.$row1->id.'" data-target="#myModal">Edit</button></td>';
			echo '<td><form action="upload.php" method="POST"><input type="hidden" name="patientID" value="'.$row1->id.'"/><button class="btn btn-primary">Studies</button></form></td>';
			echo '</tr>';
		}*/
		echo 'Hello ';
	}
?>