<?php
session_start();
unset($_SESSION["gateway"]);
unset($_SESSION["patientID"]);
if(session_destroy()) // Destroying All Sessions
{
header("Location: index.php"); // Redirecting To Home Page
}
?>