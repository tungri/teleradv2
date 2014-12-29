<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.0
Version: 3.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<?php
// Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }
    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    }
// header('Access-Control-Allow-Origin: *');
// include('session2.php');
include('functions.php');
?>
<?php
if(!isset($_SESSION['patientID']) && isset($_POST['pid'])) {
$gateway = $_POST['gateway'];
$patientID = $_POST['pid'];
$patientName = $_POST['pName'];
$conn = new mysqli("localhost","root","scorpio","teleraddb");
$sql = "SELECT type FROM client_table WHERE gateway='$gateway'";
$result = $conn->query($sql);
$row = $result->fetch_object();
$gatewayType = $row->type;
date_default_timezone_set('Asia/Kolkata');
$datetime = date('Y-m-d H:i:s');
if($gatewayType == 2) {
	$sql = "SELECT patient_id FROM patient_table WHERE exit_id='$patientID'";
	$result = $conn->query($sql);
	session_start();
	if(!$result->num_rows) {
		$sql = "INSERT INTO patient_table (patient_id, name, dob, gender, datetime, exit_id) VALUES ('$patientID', '$patientName', '1990-01-01', '11', '$datetime', '$patientID')";
		$result = $conn->query($sql);
		if($result) {
			$sql = "SELECT id FROM patient_table WHERE exit_id='$patientID'";
			$result = $conn->query($sql);
			$row = $result->fetch_object();
			$patient_id = $gateway.$row->id;
			$sql="UPDATE patient_table SET patient_id ='$patient_id' WHERE id='$row->id'";
			$result = $conn->query($sql);
			if($result) {
				// echo 'successful';
			} else {
				die('Error :'.$conn->error);
			}
			$_SESSION['gateway'] = $gateway;
			$_SESSION['patientID'] = $patient_id;
		} else {
			die('Error :'.$conn->error);
		}
		
		
		// $conn = new mysqli("localhost","root","root","teleraddb");
		$clientID = getIdByGateway($_SESSION['gateway']);
		$patientID = getIdByPatientID($_SESSION['patientID']);
		// echo $clientID;
		date_default_timezone_set('Asia/Kolkata');
		$datetime = date('Y-m-d H:i:s');
		$sql = "INSERT INTO client_patient_table (fk_client, fk_patient, datetime) VALUES ('$clientID', '$patientID', '$datetime')";
		$result = $conn->query($sql);
		if($result) {
		} else {
			die('Error :'.$conn->error);
		}
		$conn->close();
	}
	else {
		// echo "existing emr patient";
		$_SESSION['gateway'] = $gateway;
		$row = $result->fetch_object();
		$_SESSION['patientID'] = $row->patient_id;
	}
	// die();
}
} else {

	include('session.php');
	//include('session2.php');
	// echo "session check";
}

?>
<head>
<meta charset="utf-8"/>
<title>Telerad | Diacom File upload to PACS</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/datepicker.css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content ">
	<?php
if(isset($_POST['patientID'])) {
// echo "coming from DX clients";
$patient_table_id = $_POST['patientID'];
$conn = new mysqli("localhost","root","scorpio","teleraddb");
	$sql = "SELECT patient_id FROM patient_table WHERE id='$patient_table_id'";
	$result = $conn->query($sql);
	$row = $result->fetch_object();
	
$_SESSION['patientID'] = $row->patient_id;
}
if(isset($_SESSION['patientID'])) {
    $conn = new mysqli("localhost","root","scorpio","teleraddb");
    $client = $_SESSION['gateway'];
    $sql = "SELECT type FROM client_table WHERE gateway='$client'";
    $result = $conn->query($sql);
    $row = $result->fetch_object();
    $gatewayType = $row->type;
    if($gatewayType == 2) {
        // echo '<a href="emrexit.php" id="registerLink" class="btn btn-primary  pull-right">Exit</a>';
    } else {
        // echo '<a href="profile.php" id="registerLink" class="btn btn-primary btn-lg">Patients</a>';
        // echo '<a href="logout.php" id="registerLink" class="btn btn-primary  pull-right">Log out</a>';
    }
}
/*echo '<div style="clear: both"><h1 style="float: left">'.getNameByGateway($_SESSION['gateway']).'</h1>
                                <h3 style="float: right">'.getNameByPatientID($_SESSION['patientID']).'</h3></div><br>';*/


?>


<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.php">
			<img src="assets/admin/layout/img/logo.png" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<?php
		if(getTypeByGateway($_SESSION['gateway']) == 1) {
		echo '<div class="top-menu">
			<ul class="nav navbar-nav pull-right">						
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <i class="glyphicon glyphicon-cog"></i>
					<span class="username username-hide-on-mobile">
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="logout.php">
							<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->				
			</ul>
		</div>';
		}
		?>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper cs-togglable-collapsed">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				
				<li class="start ">
					<a href="profile.php">
					<i class="icon-user"></i>
					<span class="title">Patients</span>
					<span class="arrow "></span>
					</a>					
				</li>
				<li class="start ">
					<a href="">
					<i class="icon-bag"></i>
					<span class="title">Orders</span>
					<span class="arrow "></span>
					</a>					
				</li>	
				<li class="start ">
					<a href="">
					<i class="icon-docs"></i>
					<span class="title">Report</span>
					<span class="arrow "></span>
					</a>					
				</li>
                <li class="start ">
					<a href="">
					<i class="icon-layers"></i>
					<span class="title">Profile</span>
					<span class="arrow "></span>
					</a>					
				</li>						
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->	
            <!-- BEGIN STYLE CUSTOMIZER -->
			<!-- <div class="theme-panel hidden-xs hidden-sm">
				<div class="toggler">
				</div>
				<div class="toggler-close">
				</div>
				<div class="theme-options">
					<div class="theme-option theme-colors clearfix">
						<span>
						THEME COLOR </span>
						<ul>
							<li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default">
							</li>
							<li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue">
							</li>
							<li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue">
							</li>
							<li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey">
							</li>
							<li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light">
							</li>
							<li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2">
							</li>
						</ul>
					</div>
					<div class="theme-option">
						<span>
						Layout </span>
						<select class="layout-option form-control input-sm">
							<option value="fluid" selected="selected">Fluid</option>
							<option value="boxed">Boxed</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Header </span>
						<select class="page-header-option form-control input-sm">
							<option value="fixed" selected="selected">Fixed</option>
							<option value="default">Default</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Top Menu Dropdown</span>
						<select class="page-header-top-dropdown-style-option form-control input-sm">
							<option value="light" selected="selected">Light</option>
							<option value="dark">Dark</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Mode</span>
						<select class="sidebar-option form-control input-sm">
							<option value="fixed">Fixed</option>
							<option value="default" selected="selected">Default</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Menu </span>
						<select class="sidebar-menu-option form-control input-sm">
							<option value="accordion" selected="selected">Accordion</option>
							<option value="hover">Hover</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Style </span>
						<select class="sidebar-style-option form-control input-sm">
							<option value="default" selected="selected">Default</option>
							<option value="light">Light</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Position </span>
						<select class="sidebar-pos-option form-control input-sm">
							<option value="left" selected="selected">Left</option>
							<option value="right">Right</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Footer </span>
						<select class="page-footer-option form-control input-sm">
							<option value="fixed">Fixed</option>
							<option value="default" selected="selected">Default</option>
						</select>
					</div>
				</div>
			</div>
			<!-- END STYLE CUSTOMIZER -->		
			<!-- BEGIN PAGE HEADER-->
			<?php
		if(getTypeByGateway($_SESSION['gateway']) == 1) {
			echo '<h3 class="page-title">';
			echo getNameByGateway($_SESSION['gateway']);
			echo '</h3>';
		}?>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<?php
					if(getTypeByGateway($_SESSION['gateway']) == 1) {
					echo '<li>
						<i class="fa fa-home"></i>
						<a href="profile.php">Patient List</a>
						<i class="fa fa-angle-right"></i>
					</li>';
					}?>
					<li>
						<a href="#">Study List:<?php echo getNameByPatientID($_SESSION['patientID']);?>
					</a>						
					</li>					
				</ul>
				
			</div>
			
			<!-- END PAGE HEADER-->
            <!-- BEGIN FILE UPLOAD-->
            <div class="row">

				<div class="col-md-6">
				<div class="panel panel-primary">
				<div class="panel-heading" style="padding-top: 0.1px; padding-bottom: 1px;">
				<h3>Upload as Files / Zip</h3>
				</div>
				<div class="panel-body">
				<form role="form" id="myFormUpload" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
				<input type="hidden" value="myFormUpload" name="<?php echo ini_get("session.upload_progress.name"); ?>">
				<label for="inputfile"><h4>File(s) Input</h4></label>
				<input type="file" name="file[]" id="inputfile" multiple>
				</div>
				<button type="submit" class="btn btn-primary" form="myFormUpload" value="Upload Files">Upload</button>
				</form>
				<script type="text/javascript" src="script.js"></script>
				</div>
				</div>
				</div>
				<div class="col-md-6">
				<div class="panel panel-primary">
				<div class="panel-heading" style="padding-top: 0.1px; padding-bottom: 1px;">
				<h3>Upload as Folder</h3>
				</div>
				<div class="panel-body">
				<form role="form" id="myForm1" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
				<label for="inputfile1"><h4>Folder Input</h4></label>
				<input type="file" name="file[]" id="inputfile1" multiple="" directory="" webkitdirectory="" mozdirectory="">
				</div>
				<button type="submit" class="btn btn-primary" form="myForm1" value="Upload Files">Upload</button>
				<script type="text/javascript" src="script1.js"></script>
				</form>
				</div>
				</div>
				</div>
				</div>


									<!--<div class="col-md-6">
										<div class="portlet box blue">
											<div class="portlet-title">
												<div class="caption">
													Upload as Files / Zip
												</div>												
											</div>
											<div class="portlet-body form">
												<!-- BEGIN FORM
												<form action="<?php echo $_SERVER['PHP_SELF']; ?>">													
													<div class="form-body">
														<div class="form-group">															
															<input type="file" name="file[]" id="exampleInputFile" >
														</div>
													</div>
													<div class="form-actions">
														<button type="submit" class="btn blue">Upload</button>
														<button type="button" class="btn default">Cancel</button>
													</div>
												</form>
												<!-- END FORM
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="portlet box blue">
											<div class="portlet-title">
												<div class="caption">
													</i>Upload as Folder
												</div>												
											</div>
											<div class="portlet-body form">
												<!-- BEGIN FORM
												<form action="<?php echo $_SERVER['PHP_SELF']; ?>">													
													<div class="form-body">
														<div class="form-group">															
														<input type="file" id="exampleInputFile">
														</div>
													</div>
													<div class="form-actions">
														<button type="submit" class="btn blue">Upload</button>
														<button type="button" class="btn default">Cancel</button>
													</div>
												</form>
												<!-- END FORM
											</div>
										</div>
									</div>
								</div>
            <!-- END FILE UPLOAD-->

            <?php
			$total=0;
			$count=0;
			$studyArray = array();
			 
			// This is PHP function to convert a user-supplied URL to just the domain name,
			// which I use as the link text.
			 
			// Remember you still need to use htmlspecialchars() or similar to escape the
			// result.
			 
			function dcmsndFucntion($tmpkey,$key, $studyArray) {
				$cmd_str = '/home/administrator/dcm4che-2.0.28/bin/dcmsnd DCM4CHEE@localhost:11112 ';
				$cmd_str .= $tmpkey;
				$output = array();
				exec($cmd_str,$output,$return);
				// echo $cmd_str.'<br>';
				// echo $return.'<br>';
				if(!$return) {
					GLOBAL $count;
					$count++;
					$objStr = substr($output[4],19);
					// echo $objStr."<br>";
					if(!in_array($objStr,$studyArray)) {
					GLOBAL $studyArray;
					$studyArray[] = $objStr;
					}
				}
				else {
					echo '<div class="alert alert-danger" role="alert">Error in uploading the file to PACS '.$key.'</div>';
				}
				GLOBAL $total;
				GLOBAL $count;
				$percent = intval(($count/$total * 50)+50)."%";
				echo '<script language="javascript">
				document.getElementById("information").innerHTML="'.$count.'/'.$total.' images(s) processed.";
				document.getElementById("barr").setAttribute("style","width:'.$percent.'");
				</script>';
				// This is for the buffer achieve the minimum size in order to flush data
				echo str_repeat(' ',1024*64);
				// Send output to browser immediately
				ob_flush();
			}
			if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_FILES['file'])) {
				echo '<div class="alert alert-info" role="alert" id="information" style="width"></div>';
				echo '<div id="progresss" class="progress progress-striped active"><div id="barr" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:50%;"></div></div>';
				$start_time = microtime('true');
				
				$totalSize=0;
				
				foreach($_FILES['file']['size'] as $eachFile)
				{
					 if($eachFile > 0)
						$total++;
				}
				foreach ($_FILES["file"]["error"] as $key => $error) {
					if ($error == UPLOAD_ERR_OK) {
						$zip = new ZipArchive;
						$extName = explode('.',$_FILES['file']['name'][$key]);
						$ext = 'none';
						if(array_key_exists(1,$extName))
							$ext = $extName[1];
						if($ext!='none' && $ext == 'zip') {
							$res = $zip->open($_FILES['file']['tmp_name'][$key]);
							if($res==TRUE) {
								$zip->extractTo('./');
								$total--;
								$total += $zip->numFiles;
								for($i = 0; $i < $zip->numFiles; $i++) {
									dcmsndFucntion($zip->getNameIndex($i), $zip->getNameIndex($i), $studyArray);
									unlink($zip->getNameIndex($i));
								}
								$zip->close();	
							} else {
							echo '<div class="alert alert-warning" role="alert"><a href="#" class="close" data-dismiss="alert">&times;</a>File you have uploaded is not a zip file but has zip extension</div>';
							}
						} else {
								dcmsndFucntion($_FILES['file']['tmp_name'][$key], $_FILES['file']['name'][$key], $studyArray);
						}
					}
					else {
						//echo 'Error in uploading the file to server '.$_FILES['file']['name'][$key];
						echo '<div class="alert alert-danger" role="alert"><a href="#" class="close" data-dismiss="alert">&times;</a>Error in uploading the file to server '.$_FILES['file']['name'][$key].'</div>';
						switch($_FILES['file']['error']) {
							case 1:
								echo '<div class="alert alert-danger" role="alert"><a href="#" class="close" data-dismiss="alert">&times;</a>Error Code-1: The uploaded file exceeds the maximum file size of 50 MB</div>';
							case 2:
								echo '<div class="alert alert-danger" role="alert"><a href="#" class="close" data-dismiss="alert">&times;</a>Error Code-2: The uploaded file exceeds the maximum file size of 50 MB</div>';
							case 3:
								echo '<div class="alert alert-danger" role="alert"><a href="#" class="close" data-dismiss="alert">&times;</a>Error Code-3: The uploaded file was only partially uploaded</div>';
							case 4:
								echo '<div class="alert alert-danger" role="alert"><a href="#" class="close" data-dismiss="alert">&times;</a>Error Code-4: No file was uploaded</div>';
							case 5:
								echo '<div class="alert alert-danger" role="alert"><a href="#" class="close" data-dismiss="alert">&times;</a>Error Code-5: Contact for Help</div>';
							case 6:
								echo '<div class="alert alert-danger" role="alert"><a href="#" class="close" data-dismiss="alert">&times;</a>Error Code-6: Contact for Help</div>';
							case 7:
								echo '<div class="alert alert-danger" role="alert"><a href="#" class="close" data-dismiss="alert">&times;</a>Error Code-7: Contact for Help</div>';
							case 8:
								echo '<div class="alert alert-danger" role="alert"><a href="#" class="close" data-dismiss="alert">&times;</a>Error Code-8: Contact for Help</div>';
						}
					}
				}
				echo '<script language="javascript">';
				echo 'document.getElementById("progresss").className = "progress progress-striped"';
				echo '</script>';
				echo '<script language="javascript">';
				echo 'document.getElementById("progresss").setAttribute("style","display:none")';
				echo '</script>';
				echo '<script language="javascript">';
				echo 'document.getElementById("barr").setAttribute("style","width:0%")';
				echo '</script>';
				ob_flush();
				ob_end_flush();
				$end_time = microtime('true');
				$upload_time = $end_time - $start_time;
				$conn = mysql_connect('localhost:3306','root','scorpio');
				if(! $conn )
				{
				  die('Could not connect: ' . mysql_error());
				}
				foreach($studyArray as $value) {
					if(!empty($value)) {
						$sql = 'SELECT pk FROM study WHERE study_iuid="'.$value.'"';
						mysql_select_db('pacsdb');
						$retval = mysql_query( $sql, $conn );
						$row = mysql_fetch_array($retval, MYSQL_ASSOC);
						$pacsid = $row['pk'];
						//echo 'pacsid = '.$pacsid.'<br>';
						// echo 'counter = '.$counter.'<br>';
						$ppid = getIdByPatientID($_SESSION['patientID']);
						//echo 'ppid = '.$ppid.'<br>';
						//echo $_SESSION['gateway'];
						$cpid = getIdByGateway($_SESSION['gateway']);
						//echo 'cpid = '.$cpid.'<br>';
						$sql = 'SELECT id FROM client_patient_table WHERE fk_client="'.$cpid.'" AND fk_patient="'.$ppid.'"';
						mysql_select_db('teleraddb');
						$retval = mysql_query( $sql, $conn );
						$row = mysql_fetch_array($retval, MYSQL_ASSOC);
						$cppid = $row['id'];
						//echo $cppid.'<br>';
						$sql = 'SELECT id FROM study_table WHERE fk_client_patient="'.$cppid.'" AND fk_study="'.$pacsid.'"';
						mysql_select_db('teleraddb');
						$retval = mysql_query( $sql, $conn );
						$row1 = mysql_fetch_array($retval, MYSQL_ASSOC);
						date_default_timezone_set('Asia/Kolkata');
						$datetime = date('Y-m-d H:i:s');
						if(empty($row1)) {
							
							$sql1 = "INSERT INTO study_table (fk_client_patient, fk_study, datetime) VALUES ('".$cppid."','".$pacsid."','".$datetime."')";
							//echo $sql1;
							mysql_query( $sql1, $conn );
						}
					}
				}
				mysql_close($conn);
				if($count == $total && $total != 0) {
					//echo '<script language="javascript">document.getElementById("information").innerHTML="All files uploaded successfully"</script>';
					echo '<div class="alert alert-success" role="alert"><a href="#" class="close" data-dismiss="alert">&times;</a>Well done! You have successfully uploaded all the files</div>';
				} else {
					//echo '<script language="javascript">document.getElementById("information").innerHTML=""</script>';
					echo '<div class="alert alert-warning" role="alert"><a href="#" class="close" data-dismiss="alert">&times;</a>Warning! Only '.$count.' out of '.$total.' completed</div>';
				}
			}
			?>													

			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Files Lists
							</div>							
						</div>
						<div class="portlet-body">
							<!-- <table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
							<tr>
							  <th width="4%">&nbsp;</th>
								<th width="21%">Study</th>
								<th width="12%">Type</th>
								<th width="12%">Date</th>
								<th width="16%">Uploaded On</th>
								<th width="16%">Comments</th>
								<th width="19%">View Studies</th>
							</tr>
							</thead>
							<tbody>
							<tr>
							  <td><input type="checkbox"></label></td>
								<td><span class="column">Head</span></td>
								<td>MRI</td>
								<td>11-11-2014</td>
								<td>12-11-2014</td>
								<td><button type="button" class="btn blue" data-toggle="modal" href="#basic">Comments</button>
                                	<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h3 class="modal-title">Raktim Das | Chest - CT - 12-11-2014</h4>
										</div>
										<div class="modal-body">
											 <form action="#" class="form-horizontal">
											<div class="form-body">												
												<div class="form-group">
													<label class="col-md-3 control-label">Comment</label>
													<div class="col-md-4">
														<textarea class="form-control" rows="1"></textarea>
													</div>
												</div>
                                                <div class="form-group">
													<label class="col-md-3 control-label">&nbsp;</label>
													<div class="col-md-4">
														<button type="submit" class="btn blue">Save</button>
													</div>
												</div>
											</div>											
										</form>
										</div>										
									</div>
									<!-- /.modal-content
								</div>
								<!-- /.modal-dialog
							</div>
                                </td>
								<td><button type="button" class="btn blue">View</button></td>
							</tr>
							<tr>
							  <td><input type="checkbox"></label></td>
								<td><span class="column">Chest</span></td>
								<td>CT</td>
								<td>11-11-2014</td>
								<td>12-11-2014</td>
								<td><button type="button" class="btn blue">Comments</button></td>
								<td><button type="button" class="btn blue">View</button></td>
							</tr>
							<tr>
							  <td><input type="checkbox"></label></td>
							 <td>
									 Head</td>
							 <td>MRI</td>
								<td>27-10-2014</td>
								<td>12-11-2014</td>
								<td><button type="button" class="btn blue">Comments</button></td>
								<td><button type="button" class="btn blue">View</button></td>
							</tr>
							<tr>
							  <td><input type="checkbox"></label></td>
								<td>
								   <span class="column">Head</span></td>
								<td>MRI</td>
								<td>18-10-2014</td>
								<td>12-11-2014</td>
								<td><button type="button" class="btn blue">Comments</button></td>
								<td><button type="button" class="btn blue">View</button></td>
							</tr>
							<tr>
							  <td><input type="checkbox"></label></td>
								<td>
								   <span class="column">Head</span></td>
								<td>MRI</td>
								<td>
									 10-10-2014</td>
								<td>12-11-2014</td>
								<td><button type="button" class="btn blue">Comments</button></td>
								<td><button type="button" class="btn blue">View</button></td>
							</tr>
							<tr>
							  <td><input type="checkbox"></label></td>
								<td><span class="column">Chest</span></td>
								<td>CT</td>
								<td>
									 18-09-2014</td>
								<td>
								   12-11-2014</td>
								<td><button type="button" class="btn blue">Comments</button></td>
								<td><button type="button" class="btn blue">View</button></td>
							</tr>							
							</tbody>
							</table>   -->   


						<?php
						$conn = mysql_connect('localhost:3306','root','scorpio');
							if(! $conn )
							{
							  die('Could not connect: ' . mysql_error());
							}
						// echo '<div class="container">';
						// echo '<div class="row">';
						// echo '<div class="col-md-12">';
						$ppid = getIdByPatientID($_SESSION['patientID']);
						$cpid = getIdByGateway($_SESSION['gateway']);
						$sql = 'SELECT id FROM client_patient_table WHERE fk_client="'.$cpid.'" AND fk_patient="'.$ppid.'"';
						mysql_select_db('teleraddb');
						$retval = mysql_query( $sql, $conn );
						$row = mysql_fetch_array($retval, MYSQL_ASSOC);
						$cppid = $row['id'];
						$sql = 'SELECT * FROM study_table WHERE fk_client_patient="'.$cppid.'"';
						mysql_select_db('teleraddb');
						$retval = mysql_query( $sql, $conn );
						if(! $retval )
						{
						  die('Could not get data: ' . mysql_error());
						}
						$onlyonce = 0;
						$row = mysql_fetch_array($retval, MYSQL_ASSOC);
						if(empty($row)) {
							echo '<div class="alert alert-info" role="alert"><a href="#" class="close" data-dismiss="alert">&times;</a>No Studies Available</div>';
						}
						$rno = 0;
						while($row)
						{
							if($onlyonce==0) {
								// echo '<div class="panel panel-info">';
								// echo '<div class="panel-heading">';
								// echo '<h2>DICOM  Studies</h2>';
								// echo '</div>';
								echo '<table id="studyTable" class="table table-striped table bordered display" cellspacing="0" width="100%">';
								echo '<thead>';
								echo '<tr>';
								// echo '<th><h4><strong>Patient name</strong></h4></th>';
								echo '<th>Study</th>';
								echo '<th>Modality</th>';
								echo '<th>Conducted On</th>';
								echo '<th>Uploaded On</th>';
								echo '<th>Comments</th>';
								echo '<th>View Study</th>';
								echo '</tr>';
								echo '</thead>';
								echo '<tbody>';
								$onlyonce=1;
							}
							$sql1 = "SELECT * FROM study WHERE pk='".$row['fk_study']."'";
							mysql_select_db('pacsdb');
							$retval1 = mysql_query( $sql1, $conn );
							$row1 = mysql_fetch_array($retval1, MYSQL_ASSOC);
							$sql2 = "SELECT * FROM patient WHERE pk='".$row1['patient_fk']."'";
							mysql_select_db('pacsdb');
							$retval2 = mysql_query( $sql2, $conn );
							$row2 = mysql_fetch_array($retval2, MYSQL_ASSOC);
							echo '<tr>';
							// echo '<td>'.$row2['pat_name'].'</td>';
							echo '<td>'.$row1['study_desc'].'</td>';
							echo '<td>'.$row1['mods_in_study'].'</td>';
							echo '<td>'.$row1['study_datetime'].'</td>';
							/*if(!$row['datetime']) {
								$sql = "UPDATE study_table SET datetime='".$row1['updated_time']."' WHERE fk_client_patient='".$row['fk_client_patient']."' AND fk_study='".$row['fk_study']."' ";
								mysql_select_db('teleraddb');
								mysql_query( $sql, $conn );
							}*/
							// echo '<td>apples</td>';
							echo '<td>'.$row['datetime'].'</td>';
							// echo '<td id = "cmnt'.$row['id'].'">'.$row['comments'].'<button id = "'.$row['id'].'" class="open-MyModal btn btn-primary btn-xs pull-right" data-toggle="modal" data-comment="'.$row['comments'].'" data-row-id="'.$row['id'].'" data-target="#myModal">Edit</button></td>';
							$study_url = 'http://'.$_SERVER['SERVER_NAME'].':8080/weasis/samples/applet.jsp?commands=%24dicom%3Aget%20-w%20http%3A//'.$_SERVER['SERVER_NAME'].'%3A8080/weasis-pacs-connector/manifest%3FstudyUID%3D'.$row1['study_iuid'];
							echo '<td id = "cmnt'.$row['id'].'"><button id = "'.$row['id'].'" class="open-MyModal btn btn-primary" data-toggle="modal" data-comment="'.$row['comment'].'" data-row-id="'.$row['id'].'" data-target="#myModal">Comments</button></td>';
							echo '<td><a class="btn btn-primary pull-right" target="_blank" href='.$study_url.'> View Study </a></td>';
							echo '</tr>';
							$rno++;
							$row = mysql_fetch_array($retval, MYSQL_ASSOC);
						}
						mysql_close($conn);
						echo '</tbody>';
						echo '</table>';
						// echo '</div>';
						?>

						</div>
					</div>                    
					<!-- END EXAMPLE TABLE PORTLET-->
                                        
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button id="closeIcon" type="button" class="btn btn-default close " 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
               Comments
            </h4>
         </div>
         <div class="modal-body">
            <form id="form-search" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<input type="hidden" name="pkid" id="pkID"></input>
			<!-- <input name="email" type="text" id="email" style="width:100%"></input> -->
            </form>
			<textarea rows="4" style="box-sizing: border-box; width:100%; -webkit-box-sizing: border-box; -moz-box-sizing: border-box;" name="email" id="email" form="form-search">
			</textarea>
         </div>
         <div class="modal-footer">
            <button id="save" type="button" class="btn btn-primary" >
               Save
            </button>
			<!-- <button id='closeButtton' type="button" class="btn btn-default" 
               data-dismiss="modal">Cancel
            </button> -->
         </div>
      </div><!-- /.modal-content onclick="return fun() -->
</div><!-- /.modal -->
</div>

<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 2014 &copy; Telehealthindia.com | All Rights Reserved.
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
<script src="../../assets/admin/pages/scripts/form-validation.js"></script>
<script>
jQuery(document).ready(function() {       
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
TableAdvanced.init();
FormValidation.init();
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#studyTable').DataTable();
} );
 </script>

<script type="text/javascript">
 $(document).on('click','#save',function(e) {
  // document.write($("form-search").serialize());
  var data = $("#form-search").serialize();
  var mess = document.getElementById("email").value;
  var mess1 = document.getElementById("pkID").value;
  var str = "cmnt";
  var mess11 = str.concat(mess1);
  var inht = "<button id = \"".concat(mess1,"\" class=\"open-MyModal btn btn-primary btn-sm\" data-toggle=\"modal\" data-comment=\"",mess,"\" data-row-id=\"",mess1,"\"  data-target=\"#myModal\">Comments</button>");
  // var str1 = "	<button id = "'.$row['id'].'" class="open-MyModal btn btn-primary btn-xs pull-right" data-toggle="modal" data-id="'.$row['id'].'" data-target="#myModal">Edit</button>";
  $.ajax({
         data: data,
         type: "post",
         url: "insetcomment.php",
         success: function(data){
			  // alert("Data Save: " + inht);
              document.getElementById("closeIcon").click();
			  // location.reload("true");
			  document.getElementById(mess11).innerHTML=inht;
         }
});
 });
</script>


 
<!--  <script type="text/javascript">
$(document).on("click", ".open-MyModal", function () {
     var myId = $(this).data('row-id');
     $(".modal-body #pkID").val( myId );
});
 </script> -->
 
<script type="text/javascript">
$('#myModal').on('show.bs.modal', function(e) {
	var comm = $(e.relatedTarget).data('comment');
    $(e.currentTarget).find('textarea[id="email"]').val(comm);
    var bookId = $(e.relatedTarget).data('row-id');
    $(e.currentTarget).find('input[id="pkID"]').val(bookId);
	/*var descId = "desc";
	descId = descId.concat(bookId);
	var desc = document.getElementById("descId").get
	document.getElementById("myModalLabel").innerHTML();*/
});
</script>

</body>
<!-- END BODY -->
</html>