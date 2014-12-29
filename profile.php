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
<head>
<meta charset="utf-8"/>
<title>Telerad | Patient Lists</title>
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
<link rel="stylesheet" type="text/css" href="assets/global/plugins/clockface/css/clockface.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
<?php
include('session.php');
include('functions.php');
?>
<script>
function validateRegisterForm() {
    var x = document.forms["patientRegisterForm"]["patientName"].value;
    if (x==null || x=="") {
        alert("First name must be filled out");
        return false;
    }
}
</script>
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
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html">
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
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">							
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<!-- <img alt="" class="img-circle" src="assets/admin/layout/img/avatar3_small.jpg"/>-->
					<span class="username username-hide-on-mobile">
					<?php echo getNameByGateway($_SESSION['gateway']); ?> </span>
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
		</div>
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
				<li class="sidebar-toggler-wrapper">
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
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			<?php echo getNameByGateway($_SESSION['gateway']); ?>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Patient List</a>					
					</li>					
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Patient Lists
							</div>							
						</div>
						<div class="portlet-body">
							
							<table id="patientTable" class="table table-striped table bordered display">
							<thead>
							<tr>
							<th>Patients Name</th>
							<th>Date Of Birth</th>
							<th>Gender</th>
							<th>Edit Patient Details</th>
							<th>View Studies</th>
							</tr>
							</thead>
							<tbody>
							<?php
							//include('session.php');
							//include('functions.php');
							// echo '<h1>'.getNameByGateway($_SESSION['gateway']).'</h1>';
							// echo '<h4 align="right"><a href="logout.php">Logout</a></h4>';
							$conn = new mysqli("localhost","root","root","teleraddb");
							$clientID = getIdByGateway($_SESSION['gateway']);
							$sql = "SELECT fk_patient FROM client_patient_table WHERE fk_client='$clientID'";
							$result = $conn->query($sql);
							while($row = $result->fetch_object())
							{
							$pid = $row->fk_patient;
							$result1 = getEverythingByPid($pid);
							while($row1 = $result1->fetch_object()) {
							echo '<tr>';
							echo '<td id = "name'.$row1->id.'">'.$row1->name.'</td>';
                            /*$originalDate=$_POST['editDOB'];
    	$dob = date("Y-m-d", strtotime($originalDate));*/
							echo '<td id = "dob'.$row1->id.'">'.date("d-m-Y",strtotime($row1->dob)).'</td>';
							$gender = $row1->gender==1 ? "Male":"Female";
							// if($row->gender==3) { $gender="Unspecified"}
							echo '<td>'.$gender.'</td>';
							echo '<td id = "cmnt'.$row1->id.'"><button id = "'.$row1->id.'" class="open-MyModal btn btn-primary" data-toggle="modal" data-name="'.$row1->name.'" data-add1="'.$row1->address1.'" data-add2="'.$row1->address2.'" data-pincode="'.$row1->pincode.'" data-dob="'.date("d-m-Y",strtotime($row1->dob)).'" data-row-id="'.$row1->id.'" data-target="#myModal">Edit</button></td>';
							echo '<td><form action="upload.php" method="POST"><input type="hidden" name="patientID" value="'.$row1->id.'"/><button class="btn btn-primary">Studies</button></form></td>';
							echo '</tr>';
							}
							}
							?>
						</tbody>
						</table>                        								
						</div>
					</div>    

					<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
					aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
					<button id="closeIconEdit" type="button" class="btn btn-default close "
					data-dismiss="modal" aria-hidden="true">
					&times;
					</button>
					<h4 class="modal-title" id="myModalLabelEdit">
					Patient Details
					</h4>
					</div>
					<div class="modal-body">
					<form id="form-search" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<input type="hidden" name="pkid" id="pkID"></input>
					<table>
					<tbody>
					<div class="form-group">
					<tr>
					<td style="width:30%"><label for="editName">Patient's Name</label></td>
					<td style="width:40%"><div class="form-group"><input class="form-control" id="editName" type="text" name="editName" maxlength="30" required/></div></td>
					<td style="width:30%"><p id="eNError" style="display:none; color:red;">Enter Proper name</p></td>
					</tr>
                    
                    <tr>
					<td style="width:30%"><label for="editDOB">Date of Birth</label></td>
					<!-- <td>
                    <div class="form-group">
                    <input class="form-control input-medium date-picker" id="editDOB" type="text" name="editDOB" required/></div></td> -->
                    
                    <td style="width:40%"><div class="form-group"><div class="input-group input-medium date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" id="editDOB" name="editDOB" class="form-control" readonly required/>
                            <span class="input-group-btn">
                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                            </span>
                        </div></div></td>
					<td style="width:30%"><p id="edobError" style="color:red; display:none;">Enter Proper DOB</p></td>
					</tr>
                    
					<!-- <tr>
						<td style="width:20%"><label for="editGender">Gender</label></td>
						<td style="width:60%"><div class="input-group">
                        <label class="checkbox-inline"><input type="radio" id="patienteditgender1" name="patienteditGender" value="1" checked>Male</input></label>
						<label class="checkbox-inline"><input type="radio" id="patienteditgender2" name="patienteditGender" value="2">Female</input></label>
						<label class="checkbox-inline"><input type="radio" id="patienteditgender3" name="patienteditGender" value="3">Unspecified</input></label>
                        </div>
						</td>
						<td id="pEGError" style="width:20%;"><p style="color:red;display:none;">Enter Proper Gender</p></td>
						</tr>-->
                    
					<tr>
					<td style="width:30%"><label for="editadd1">Address1</label></td>
					<td style="width:40%"><div class="form-group"><input class="form-control" id="editadd1" type="text" name="editadd1" maxlength="30" /></div></td>
					<td style="width:30%;"><p id="eA1Error" style="color:red; display:none;">Enter Proper Address</p></td>
					</tr>
					<tr>
					<td style="width:30%"><label for="editadd2">Address2</label></td>
					<td style="width:40%"><div class="form-group"><input class="form-control" id="editadd2" type="text" name="editadd2" maxlength="50" /></div></td>
					<td style="width:30%;"><p id="eA2Error" style="color:red; display:none;">Enter Proper Address</p></td>
					</tr>
					<tr>
					<td style="width:30%"><label for="editpincode">Pincode</label></td>
					<td style="width:40%"><div class="form-group"><input class="form-control" id="editpincode" type="text" name="editpincode" maxlength="6" /></div></td>
					<td style="width:30%;"><p id="ePError" style="color:red; display:none;">Enter Proper Pincode</p></td>
					</tr>
                    
					</div>
					</tbody>
					</table>
                    
                    <!-- <div class="form-group">
                        <label class="control-label col-md-4">Patient's Name</label>
                        <div class="col-md-5">
                            <div class="input-icon">
                                <input class="form-control" id="editName" type="text" name="editName" maxlength="30" required/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-4">Start With Years</label>
                        <div class="col-md-8">
                            <div class="input-group input-medium date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                <input type="text" class="form-control" readonly>
                                <span class="input-group-btn">
                                <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                </span>
                            </div>
                            <!-- /input-group 
                        </div>
                    </div> --> 
                    
					</form>
					</div>
					<div class="modal-footer">
					<button id="saveEdit" type="button" class="btn btn-primary" >
					Save
					</button>
					<!-- <button id='closeButtton' type="button" class="btn btn-default"
					data-dismiss="modal">Cancel
					</button> -->
					</div>
					</div><!-- /.modal-content onclick="return fun() -->
					</div><!-- /.modal -->
					</div>

						<button id = "newPatient" class="open-patientRegisterModal btn btn-primary btn-lg" data-toggle="modal" data-target="#patientRegisterModal">New Patient..</button>

						<div class="modal fade" id="patientRegisterModal" tabindex="-1" role="dialog"
						aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header">
						<button id="closeIcon" type="button" class="btn btn-default close "
						data-dismiss="modal" aria-hidden="true">
						&times;
						</button>
						<h4 class="modal-title" id="myModalLabel">
						Patient Registration
						</h4>
						</div>
						<div class="modal-body">
						<form id="patientRegisterForm" name="patientRegisterForm" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<input type="hidden" name="formType" value="register"/>
						<table>
						<tbody>
						<div class="form-group">
						<tr>
						<!--<td style="width:10%"></td>-->
						<td style="width:30%"><label for="patientName">Patient's Name</label></td>
						<td style="width:40%"><div class="form-group"><input class="form-control" id="patientName" type="text" name="patientName" maxlength="30" required/></div></td>
						<td style="width:30%;"><p id="pNError" style="display:none; color:red;">Enter Proper name</p></td>
						</tr>
						<tr>
						<td style="width:30%"><label for="patientdob">Date of Birth</label></td>
						<!-- <td><input class="form-control" id="patientdob" type="date" name="dob" required/></td> -->
                        <td style="width:40%"><div class="form-group"><div class="input-group input-medium date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                            <input type="text" id="patientdob" name="dob" class="form-control" readonly required/>
                            <span class="input-group-btn">
                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                            </span>
                        </div></div></td>
						<td style="width:30%;"><p id="pdobError" style="color:red;display:none;">Enter Proper DOB</p></td>
						</tr>
						<tr>
						<td style="width:30%"><label for="patientGender">Gender</label></td>
						<td style="width:40%"><div class="form-group"><div class="input-group">
                        <label class="checkbox-inline"><input type="radio" id="patientgender1" name="patientGender" value="1">Male</input></label>
						<label class="checkbox-inline"><input type="radio" id="patientgender2" name="patientGender" value="2">Female</input></label>
						<label class="checkbox-inline"><input type="radio" id="patientgender3" name="patientGender" value="3">Unspecified</input></label>
                        </div></div>
						</td>
						<td style="width:30%;"><p id="pGError" style="color:red;display:none;">Enter Proper Gender</p></td>
						</tr>
						<tr>
						<td style="width:30%"><label for="patientAddress1">Address1</label></td>
						<td style="width:40%"><div class="form-group"><input class="form-control" id="patientAddress1" type="text"  name="patientAddress1"/></div></td>
						<td style="width:30%;"><p id="pA1Error" style="color:red;display:none;">Enter Proper Address</p></td>
						</tr>
						<tr>
						<td style="width:30%"><label for="patientAddress2">Address2</label></td>
						<td style="width:40%"><div class="form-group"><input class="form-control" id="patientAddress2" type="text" name="patientAddress2"/></div></td>
						<td style="width:30%;"><p id="pA2Error" style="color:red;display:none;">Enter Proper Address</p></td>
						</tr>
						<tr>
						<td style="width:30%"><label for="patientPincode">Pincode</label></td>
						<td style="width:40%"><div class="form-group"><input class="form-control" id="patientPincode" type="text" name="patientPincode" maxlength="6" required/></div></td>
						<td style="width:30%;"><p id="pPError" style="color:red;display:none;">Enter Proper pincode</p></td>
						</tr>
						</div>

						</tbody>
						</table>
						</form>
						</div>
						<div class="modal-footer">
						<button id="patientRegister" type="submit" class="btn btn-primary" >
						Register
						</button>
						
						</div>
						</div>
						</div>
						</div>

				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
	
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
<script type="text/javascript" src="assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
<script src="assets/admin/pages/scripts/form-validation.js"></script>
<script src="assets/admin/pages/scripts/components-pickers.js"></script>
<script>
jQuery(document).ready(function() {       
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
ComponentsPickers.init();
TableAdvanced.init();
// FormValidation.init();

});
</script>
<script type="text/javascript">
$(document).ready(function() {
$('#patientTable').DataTable();
} );
</script>
<script type="text/javascript">
$(document).on('click','#saveEdit',function(e) {
    var mess = document.getElementById("editName").value;
    if(mess == null || mess == "") {
        document.getElementById("eNError").style.display="block";
        // document.getElementById("eNError").setAttribute("style","");
        return;
    }
    else {
        document.getElementById("eNError").style.display="none";
    }
    // alert(mess);
    var mess1 = document.getElementById("pkID").value;
    var mess2 = document.getElementById("editDOB").value;
    if(mess2 == null || mess2 == "") {
        document.getElementById("edobError").style.display="block";
        return;
    }
    else {
        document.getElementById("edobError").style.display="none";
    }
    // alert(mess2);
    var mess3 = document.getElementById("editadd1").value;
    if(mess3 == null || mess3 == "") {
        document.getElementById("eA1Error").style.display="block";
        return;
    }
    else {
        document.getElementById("eA1Error").style.display="none";
    }
    var mess4 = document.getElementById("editadd2").value;
    var mess5 = document.getElementById("editpincode").value;
    if(mess5 == null || mess5 == "" || isNaN(mess5) || mess5.length!=6) {
        document.getElementById("ePError").style.display="block";
        return;
    }
    else {
        document.getElementById("ePError").style.display="none";
    }
    var str = "cmnt";
    var str1 = "name";
    var str2 = "dob";
    var mess11 = str.concat(mess1);
    var mess22 = str1.concat(mess1);
    var mess33 = str2.concat(mess1);
    var inht = "<button id = \"".concat(mess1,"\" class=\"open-MyModal btn btn-primary\" data-toggle=\"modal\" data-name=\"",mess,"\" data-add1=\"",mess3,"\" data-add2=\"",mess4,"\" data-pincode=\"",mess5,"\" data-dob=\"",mess2,"\" data-row-id=\"",mess1,"\" data-target=\"#myModal\">Edit</button>");
    // var str1 = " <button id = "'.$row['id'].'" class="open-MyModal btn btn-primary btn-xs pull-right" data-toggle="modal" data-id="'.$row['id'].'" data-target="#myModal">Edit</button>";
    var data = $("#form-search").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "editpatient.php",
        success: function(data){
            // alert("Data Save: " + data);
            document.getElementById("closeIconEdit").click();
            // location.reload("true");
            document.getElementById(mess11).innerHTML=inht;
            document.getElementById(mess22).innerHTML=mess;
            document.getElementById(mess33).innerHTML=mess2;
        }
    });
});
</script>
<script type="text/javascript">
$('#myModal').on('show.bs.modal', function(e) {
var comm = $(e.relatedTarget).data('name');
var val = document.getElementById('editName').value;
if(val == "") {
    document.getElementById('editName').setAttribute("value",comm);
}
var comm = $(e.relatedTarget).data('dob');
var val = document.getElementById('editDOB').value;
if(val == "") {
    document.getElementById('editDOB').setAttribute("value",comm);
}
// $(e.currentTarget).find('input[id="editDOB"]').val(comm);
var comm = $(e.relatedTarget).data('add1');
var val = document.getElementById('editadd1').value;
if(val == "") {
    document.getElementById('editadd1').setAttribute("value",comm);
}
// $(e.currentTarget).find('input[id="editadd1"]').val(comm);
var comm = $(e.relatedTarget).data('add2');
var val = document.getElementById('editadd2').value;
if(val == "") {
    document.getElementById('editadd2').setAttribute("value",comm);
}
// $(e.currentTarget).find('input[id="editadd2"]').val(comm);
var comm = $(e.relatedTarget).data('pincode');
var val = document.getElementById('editpincode').value;
if(val == "") {
    document.getElementById('editpincode').setAttribute("value",comm);
}
// $(e.currentTarget).find('input[id="editpincode"]').val(comm);
var bookId = $(e.relatedTarget).data('row-id');
var val = document.getElementById('pkID').value;
if(val == "") {
    document.getElementById('pkID').setAttribute("value",bookId);
}
// $(e.currentTarget).find('input[id="pkID"]').val(bookId);*/
});
</script>
<script type="text/javascript">
$(document).on('click','#patientRegister',function(e) {
	// alert("Fill Name "+document.getElementById("patientName").value+" ;" );
	var patientName = document.getElementById("patientName").value;
	if(patientName == null || patientName == "") {
		document.getElementById("pNError").style.display="block";
		return;
	}
	else {
		document.getElementById("pNError").style.display="none";
	}
	var patientDOB1 = document.getElementById("patientdob").value;
	if(patientDOB1 == null || patientDOB1 == "") {
		document.getElementById("pdobError").style.display="block";
		return;
	}
	else {
		document.getElementById("pdobError").style.display="none";
        // var patientDOB = patientDOB1.substring(6,11).concat('-',patientDOB1.substring(3,5),'-',patientDOB1.substring(0,2));
	}
	if (document.getElementById('patientgender1').checked) {
	var patientGender = "Male";
	document.getElementById("pGError").style.display="none";
	} else if (document.getElementById('patientgender2').checked) {
	var patientGender = "Female";
	document.getElementById("pGError").style.display="none";
	} else if (document.getElementById('patientgender3').checked) {
	var patientGender = "Unspecified";
	document.getElementById("pGError").style.display="none";
	} else {
		document.getElementById("pGError").style.display="block";
		return;
	}
	var patientAddress1 = document.getElementById("patientAddress1").value;
	if(patientAddress1 == null || patientAddress1 == "") {
		document.getElementById("pA1Error").style.display="block";
		return;
	}
	else {
		document.getElementById("pA1Error").style.display="none";
	}
	var patientAddress2 = document.getElementById("patientAddress2").value;
	var patientPincode = document.getElementById("patientPincode").value;
	if(patientPincode == null || patientPincode == "" || isNaN(patientPincode) || patientPincode.length!=6) {
		document.getElementById("pPError").style.display="block";
		return;
	}
	else {
		document.getElementById("pPError").style.display="none";
	}
	/*if(document.getElementById("patientName").value = "" || document.getElementById("patientName").value = null) {
		document.getElementById("pNError").setAttribute("style","display:block");
		//document.getElementById("patientName").innerHTML= "asdasdsad";
		//throw new Error('This is not an error. This is just to abort javascript');
		//alert("Fill Name");
		
	}*/
var data = $("#patientRegisterForm").serialize();

  
  
  
  
  $.ajax({
         data: data,
         type: "post",
         url: "patientRegister.php",
         success: function(data){
            /* var newRow = '<tr><td id="name'+data+'">'+patientName+'</td><td id = "dob'+data+'">'+patientDOB+'</td><td>'+patientGender+'</td><td id = "cmnt'+data+'"><a id = "'+data+'" class="open-MyModal" data-toggle="modal" data-name="'+patientName+'" data-add1="'+patientAddress1+'" data-add2="'+patientAddress2+'" data-dob="'+patientDOB+'" data-pincode="'+patientPincode+'" data-row-id="'+data+'" data-target="#myModal">Edit</a></td><td><form action="upload.php" method="POST"><input type="hidden" name="patientID" value="'+data+'"/><a href="javascript:;" onclick="parentNode.submit()" >Studies</a></form></td></tr>';*/
            var newRow = '<tr><td id="name'+data+'">'+patientName+'</td><td id = "dob'+data+'">'+patientDOB1+'</td><td>'+patientGender+'</td><td id = "cmnt'+data+'"><button id = "'+data+'" class="open-MyModal btn btn-primary" data-toggle="modal" data-name="'+patientName+'" data-add1="'+patientAddress1+'" data-add2="'+patientAddress2+'" data-dob="'+patientDOB1+'" data-pincode="'+patientPincode+'" data-row-id="'+data+'" data-target="#myModal">Edit</button></td><td><form action="upload.php" method="POST"><input type="hidden" name="patientID" value="'+data+'"/><button class="btn btn-primary">Studies</button></form></td></tr>';
            $('#patientTable').DataTable().row.add($(newRow)).draw();
            document.getElementById("closeIcon").click();
            }
});
});
</script>
</body>
<!-- END BODY -->
</html>