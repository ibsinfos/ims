<?php 
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='3'))
{    
    require_once '../model/student.php';
    $now = time();
//        
//    $new_time = $now +(60*60*24*3);
//    $new_time = date("Y-m-d H:i:s",$new_time);
//   
    
    
    
     $now_date= date("Y-m-d H:i:s",$now);
//    echo $now_date;
//    die();
   
    ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">
	<title>Student Dashboard | KEY - Institute Management System</title>
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

	<!-- jQuery -->
	<script src="js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
        <script src="js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src="js/fullcalendar.min.js"></script>
	<!-- data table plugin -->
	<script src="js/jquery.datatables.min.js"></script>

	<!-- chart libraries start -->
	<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.min.js"></script>
	<script src="js/jquery.flot.pie.min.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="js/charisma.js"></script>    
	<!-- The fav icon -->
        <link rel="shortcut icon" href="images/favicon.ico">
		

            <link rel="stylesheet" type="text/css" href="css/index.css" media="all">
                <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">
</head>
<body>
		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
		<?php   include 'common/student_header.php';?>
		</div>
	</div>
	<!-- topbar ends -->		<div class="container-fluid">
			<div class="row-fluid">
				
				<!-- left menu starts -->
            <div class="span2 main-menu-span">
                <?php                    include 'common/student_side_nav.php';?>
<!--/.well -->
            </div> <!--/span-->
			<!-- left menu ends -->                
                
                <div id="content" class="span10">
                <!-- content starts -->
                
                <div class="row-fluid">
	<div class="box span12">
		<div class="box-header well">
            <div class="box-icon">
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            </div>
		</div>
        
		<div class="box-content">
        	<form class="form-horizontal" method="post" action="">
                        <fieldset>
                            <legend><i class="icon32 icon-clipboard"></i>Dashboard</legend>
                        </fieldset>
                        
                        <center>
                        	<h2>Welcome <?php echo $_SESSION['cur_user']; ?></h2>
                        	<?php $date= date("D, d M, Y");
                                echo $date; ?>                        </center>
                    

			</form>
        </div>
        <div class="box-content">

            <a indepth="true" class="well span4 top-block" href="course.php">
               
                <span><img src="images/courses.png" width="50" height="50"/></span>
                <div>Course Details</div>
                <div style="text-align: left">
                    
                    <table width="200">
                         <tr>
                            
                            <td>
                                <?php 
                                $student = $_SESSION['cur_user'];
                                $obj= new Students();
                                $result_1 = $obj->getCoursesByStudent($student);
                                if($count = mysql_num_rows($result_1)){
                                while ($row =  mysql_fetch_array($result_1)){
                                    echo $row['course_name']."<br/>";
                                }}
                                
                            ?>                            <br/><br/><br/></td>
                        </tr>
                    </table>
                </div>
            </a>
            
            <a indepth="true" class="well span4 top-block" href="">
                <span><img src="images/user_login.png" width="50" height="50"/></span>
                <div>Login Details</div>
                <div>
                    <table>
                        <tr>
                            <td align="left" width="37%">Last Login:<br/><br/></td>
                            <td align="center">
                                <?php
                                $student = $_SESSION['cur_user'];
                                $obj = new Students();
                                $result = $obj->getLastLogin($student);
                                $time = $result['log_in_time'];
                                 $time = date("Y-m-d g:ia",strtotime($time));
                                echo $time;
                                
                                ?>
                                <br/>
                                <?php
                                 $last_log_in_time= $result['log_in_time'];
                                 $ago=strtotime($now_date) - strtotime($last_log_in_time);
                                 $ago =  round(($ago/60)/60);
                                echo "(".$ago." hours ago)";
                               ?>
                            </td> 
                        </tr>
                    </table>
                </div>
            </a>
            
            <a indepth="true" class="well span4 top-block" >
                <span><img src="images/payment_details.png" width="50" height="50"/></span>
                <div> Payment Details</div>
                <div><table width="200">
                         <tr>
                            <td>Next Payment on:</td>
                            
                            <td align="right">
                                <?php
                            $today = date('d');
                            $payment_dates= $obj->getNextPaymentDate();
                            $next_date = $payment_dates['payment_date'];
                            if($next_date>$today){
                                echo date("Y-m-$next_date");
                            }
                            else{
                               $month = date('m');
                               $next_month = $month++;
                                echo date("Y-$next_month-$next_date");
                            }
                            ?>
                                
                            </td>
                        </tr>
                    </table></div>
            </a>
        </div>
        <div class="box-content">
            <a indepth="true" class="well span4 top-block" href="view_class_schedules.php">
                <span><img src="images/schedule.png" width="50" height="50"/></span>
                <div>Class Schedules</div>
                <div><table>
                         <tr>
                            
                            <td colspan="2" align="left">
                                <?php
                                $student = $_SESSION['cur_user'];
                                $schedule_object= new Students();
                                $res = $schedule_object->getScheduleByRange($student);
                              $count = mysql_num_rows($res);
                                if($count>0){
                                    while($row = mysql_fetch_array($res))
                                 echo $row['date']."<br>". $row['course_name']." ".$row['start_time']." - ".$row['end_time']."<br/>";   
                                }
                                ?>
                                
                            </td>
                        </tr>
                    </table></div>
            </a>
            <a indepth="true" class="well span4 top-block" href="view_attendance.php">
                <span><img src="images/attendance1.png" width="50" height="50"/></span>
                <div>Attendance Details<br/><br/></div>
                <div>&nbsp;</div>
            </a>
            <a indepth="true" class="well span4 top-block" href="profile.php">
                <span><img src="images/profile.png" width="50" height="50"/></span>
                <div>Profile<br/> <?php echo "(".$_SESSION['cur_user'].")";?></div>
                <div>&nbsp;</div>
            </a>
            
            
        </div>
    </div>
</div>
                <!-- content ends -->
				</div><!--/#content.span10-->
			</div><!--/fluid-row-->

		<footer>
	<hr>
	<!---------facebook like page---------->
            
            
			<!---------facebook like page--------->
	<p class="pull-right">Powered by: <a href="#" target="_top">Key Institute</a></p>
</footer>		
		</div><!--/.fluid-container-->

	
	
		


<div style="display: none;" id="cboxOverlay"></div><div style="display: none; padding-bottom: 57px; padding-right: 28px;" class="" id="colorbox"><div id="cboxWrapper"><div><div style="float: left;" id="cboxTopLeft"></div><div style="float: left;" id="cboxTopCenter"></div><div style="float: left;" id="cboxTopRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxMiddleLeft"></div><div style="float: left;" id="cboxContent"><div style="width: 0px; height: 0px; overflow: hidden; float: left;" id="cboxLoadedContent"></div><div style="float: left;" id="cboxLoadingOverlay"></div><div style="float: left;" id="cboxLoadingGraphic"></div><div style="float: left;" id="cboxTitle"></div><div style="float: left;" id="cboxCurrent"></div><div style="float: left;" id="cboxNext"></div><div style="float: left;" id="cboxPrevious"></div><div style="float: left;" id="cboxSlideshow"></div><div style="float: left;" id="cboxClose"></div></div><div style="float: left;" id="cboxMiddleRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxBottomLeft"></div><div style="float: left;" id="cboxBottomCenter"></div><div style="float: left;" id="cboxBottomRight"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div>

<div style="display: none;" id="cboxOverlay"></div><div style="display: none; padding-bottom: 57px; padding-right: 28px;" class="" id="colorbox"><div id="cboxWrapper"><div><div style="float: left;" id="cboxTopLeft"></div><div style="float: left;" id="cboxTopCenter"></div><div style="float: left;" id="cboxTopRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxMiddleLeft"></div><div style="float: left;" id="cboxContent"><div style="width: 0px; height: 0px; overflow: hidden; float: left;" id="cboxLoadedContent"></div><div style="float: left;" id="cboxLoadingOverlay"></div><div style="float: left;" id="cboxLoadingGraphic"></div><div style="float: left;" id="cboxTitle"></div><div style="float: left;" id="cboxCurrent"></div><div style="float: left;" id="cboxNext"></div><div style="float: left;" id="cboxPrevious"></div><div style="float: left;" id="cboxSlideshow"></div><div style="float: left;" id="cboxClose"></div></div><div style="float: left;" id="cboxMiddleRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxBottomLeft"></div><div style="float: left;" id="cboxBottomCenter"></div><div style="float: left;" id="cboxBottomRight"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div>
</body></html>
<?php }
else
{
//    $_SESSION['cur_user']=NULL;
    unset($_SESSION['cur_user']);
    session_destroy();
    header("location: ../../index/view/index.php");
}
?>