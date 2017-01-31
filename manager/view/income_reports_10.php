<?php 
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='6'))
{


 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">
	<title>Reports | KEY - Institute Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="0">

	<!-- The styles -->
	
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
        <!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
 <style type="text/css" title="style">
        
         @import "css/pepper-grinder/jquery-ui-1.10.3.custom.css";
</style>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>

    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/student.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">
               <!-- jQuery -->
<script src="js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
<script src="js/bootstrap-transition.js"></script>
	<!-- library for advanced tooltip -->
<script src="js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
<script src="js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
<script src="js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
<script src="js/bootstrap-collapse.js"></script>
	
	<!-- chart libraries start -->
	<!-- notification plugin -->
<script src="js/jquery.noty.js"></script>

	<!-- multiple file upload plugin -->
<script src="js/jquery.uploadify-3.1.min.js"></script>
 <script src="js/bootstrap-dropdown.js"></script>

</head>
<body>
		<!-- topbar starts -->
<div class="navbar">
<div class="navbar-inner">
<?php include 'common/manager_header.php';?>
</div>
	</div>
    <!-- topbar ends -->		
    <div class="container-fluid">
                    <div class="row-fluid">
				
<!-- left menu starts -->
<div class="span2 main-menu-span">
<?php include 'common/manager_side_nav.php';?><!--/.well -->
</div> <!--/span-->
<!-- left menu ends -->                
                
                <div id="content" class="span10">
                <!-- content starts -->
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well">
            <div class="box-icon">
                
            </div>
		</div>
        
		<div class="box-content">
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane active" id="manage">
                   
        <fieldset>
            <h2>Income Reports
            </h2>
            <br/>
            <div class="box-content">
                <a href=""> <img src="images/payment-icon.gif" class="image_thumbnail_large" width="100" height="100"/>
                    Lecturer Progress</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="late_payments.php">
                <img src="images/late_pay.png" class="image_thumbnail_large" width="100" height="100"/>
                Student Attendance
                </a> 
                
                
            </div>
        </fieldset>
   </div>
</div>
           </div>
       </div>
           </div>
   </div>
</div>
    </div><!--/#content.span10-->
            </div><!--/fluid-row-->

		<footer>
	<hr>
			<!---------facebook like page--------->
	<p class="pull-right">Powered by: <a href="#" target="_top">Key Institute</a></p>
</footer>		
		</div><!--/.fluid-container-->
</body>
        
</html>
<?php }
else
{
//    $_SESSION['cur_user']=NULL;
    unset($_SESSION['cur_user']);
    session_destroy();
    header("location: ../../index/view/index.php");
}
?>
