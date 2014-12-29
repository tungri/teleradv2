<?php
function getGatewayById($fk_client) {
	$conn = new mysqli("localhost","root","scorpio","teleraddb");
	$sql = "SELECT gateway FROM client_table WHERE id='$fk_client'";
	$result = $conn->query($sql);
	$row = $result->fetch_object();
	return $row->gateway;
}

function getNameByGateway($gateway) {
$conn = new mysqli("localhost","root","scorpio","teleraddb");
$sql = "SELECT name FROM client_table WHERE gateway='$gateway'";
$result = $conn->query($sql);
$row = $result->fetch_object();
return $row->name;
}

function getIdByGateway($gateway) {
	$conn = new mysqli("localhost","root","scorpio","teleraddb");
	$sql = "SELECT id FROM client_table WHERE gateway='$gateway'";
	$result = $conn->query($sql);
	$row = $result->fetch_object();
	return $row->id;
}

function getTypeByGateway($gateway) {
	$conn = new mysqli("localhost","root","scorpio","teleraddb");
	$sql = "SELECT type FROM client_table WHERE gateway='$gateway'";
	$result = $conn->query($sql);
	$row = $result->fetch_object();
	return $row->type;
}

function getIdByPatientID($pid) {
	$conn = new mysqli("localhost","root","scorpio","teleraddb");
	$sql = "SELECT id FROM patient_table WHERE patient_id='$pid'";
	$result = $conn->query($sql);
	$row = $result->fetch_object();
	return $row->id;
}

function getEverythingByPid($id) {
	$conn = new mysqli("localhost","root","scorpio","teleraddb");
	$sql = "SELECT * FROM patient_table WHERE id='$id'";
	$result = $conn->query($sql);
	return $result;
}

function getNameByPatientID($pid) {
	$conn = new mysqli("localhost","root","scorpio","teleraddb");
	$sql = "SELECT name FROM patient_table WHERE patient_id='$pid'";
	$result = $conn->query($sql);
	$row = $result->fetch_object();
	return $row->name;
}
?>
