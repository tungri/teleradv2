<?php
if(isset($_REQUEST))
{
	include('session.php');
	include('functions.php');
    $conn = new mysqli("localhost","root","scorpio","teleraddb");
	error_reporting(E_ALL && ~E_NOTICE);

	$patientName=$_POST['patientName'];
	$originalDate=$_POST['dob'];
    $dob = date("Y-m-d", strtotime($originalDate));
	$patientGender=$_POST['patientGender'];
	$patientAddress1=$_POST['patientAddress1'];
	$patientAddress2=$_POST['patientAddress2'];
	$patientPincode=$_POST['patientPincode'];
	$patientUsername=$_SESSION['gateway'];
	date_default_timezone_set('Asia/Kolkata');
	$datetime = date('Y-m-d H:i:s');
	
	$sql = "INSERT INTO patient_table (patient_id, name, dob, gender, address1, address2, datetime, pincode) VALUES ('$patientUsername', '$patientName', '$dob', '$patientGender', '$patientAddress1', '$patientAddress2', '$datetime', '$patientPincode')";
	$result = $conn->query($sql);
	if($result) {
		// echo 'successful';
			$sql = "SELECT id FROM patient_table WHERE patient_id='$patientUsername'";
			$result = $conn->query($sql);
			$row = $result->fetch_object();
			$patient_id = $_SESSION['gateway'].$row->id;
			//echo $patient_id;
			$sql="UPDATE patient_table SET patient_id ='$patient_id' WHERE id='$row->id'";
			$result = $conn->query($sql);
			if($result) {
				// echo 'successful';
			} else {
				die('Error :'.$conn->error);
			}
	} else {
		die('Error :'.$conn->error);
	}
	$conn->close();
	// echo $_SESSION['gateway'];
	// include('clientPatient.php');
	
	$conn = new mysqli("localhost","root","scorpio","teleraddb");
	$clientID = getIdByGateway($_SESSION['gateway']);
	$patientID = getIdByPatientID($patient_id);
	echo $patientID;
	date_default_timezone_set('Asia/Kolkata');
	$datetime = date('Y-m-d H:i:s');
	$sql = "INSERT INTO client_patient_table (fk_client, fk_patient, datetime) VALUES ('$clientID', '$patientID', '$datetime')";
	$result = $conn->query($sql);
	if($result) {
		// echo 'insert into patient table successful<br>';
		/*$sql = "SELECT id FROM client_table WHERE gateway = \"$centerUsername\"";
		$result = $conn->query($sql);
		while($row = $result->fetch_object())
		{
			$pid = $row->id;
		}*/
	} else {
		die('Error :'.$conn->error);
	}

	$conn->close();
	
	
}
?>