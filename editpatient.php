<?php 
if(isset($_REQUEST))
{
    mysql_connect("localhost","root","root");
	mysql_select_db("teleraddb");
	error_reporting(E_ALL && ~E_NOTICE);

	$email=$_POST['editName'];
    echo $email;
	$originalDate=$_POST['editDOB'];
    	$dob = date("Y-m-d", strtotime($originalDate));
        echo $dob;
	$add1=$_POST['editadd1'];
    echo $add1;
	$add2=$_POST['editadd2'];
    echo $add2;
	$pincode=$_POST['editpincode'];
    echo $pincode;
	$rowId=intval($_POST['pkid']);
    echo $rowId;
	$sql="UPDATE patient_table SET name ='$email', dob='$dob', address1='$add1', address2='$add2', pincode='$pincode' WHERE id='$rowId'";
	$result=mysql_query($sql);
	if($result){
	echo "You have been successfully subscribed.";
	}
}
?>