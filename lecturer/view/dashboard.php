<?php 
//ini_set("display_errors", 0);
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='7'))
{    
    require_once '../model/student.php';
    require_once '../model/dashboard.php';
    require_once '../model/teacher.php';
    $now = time(); 
    $now_date= date("Y-m-d H:i:s",$now);    
    $obj = new dashboard();
    $teacher_login_id = $_SESSION['user_id'];
    $res = $obj->get_teacher_byID($teacher_login_id);
    $teacher = $res['teacher_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">
	<title>Dashboard | KEY - Institute Management System</title>
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
		<?php   include 'common/lecturer_header.php';?>
		</div>
	</div>
	<!-- topbar ends -->		<div class="container-fluid">
			<div class="row-fluid">
				
				<!-- left menu starts -->
            <div class="span2 main-menu-span">
                <?php                    include 'common/lecturer_side_nav.php';?>
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
                        echo $date; ?>                        
                        </center>
                    

		</form>
        </div>
        <div class="box-content">
                        <a indepth="true" class="well span4 top-block" href="view_class_schedules.php">
                <span class="icon32 icon-color icon-wrench"></span>
                <div>Class Schedules<br/><br/></div>
                <div><table>
                         <tr>
                            
                            <td colspan="2" align="left">
                                <p class="special_class"> <?php                                
                                $res = $obj->get_schedules_for_week($teacher);
                                $count =mysql_num_rows($res);
                                if($count>0){
                                    while($row = mysql_fetch_array($res))
                                 echo $row['date']."<br>". $row['course_name']." ".$row['start_time']." - ".$row['end_time']."<br/>";   
                                }
                                ?>
                                    </p>
                            <br/>    
                            </td>
                        </tr>
                    </table></div>
            </a>

            <a indepth="true" class="well span4 top-block" href="#">
               
                <span class="icon32 icon-color icon-users"></span>
                <div>Course Details</div>
                <div style="text-align: left">
                    
                    <table>
                         <tr>
                            <td><br/><br/><br/></td>
                            <td>
                                <?php 
                                 
              $lecturer = $_SESSION['user_id'];
              $Object_teacher_id= new Teachers();
              $res = $Object_teacher_id->getTeacherByUser($lecturer);
              $lecturer = $res['teacher_id'];
              
             
              
              $objct_course = new Teachers();
              $result = $objct_course->getCourseByLecturer($lecturer);
              $count_subs = mysql_num_rows($result);
              
//             while($row = mysql_fetch_array($result)) {
               echo "Total No of Courses:".$count_subs;
              
//              }
              ?>  
                                
                         <br/></td>
                        </tr>
                    </table><br/><br/>
                </div>
            </a>
            
            <a indepth="true" class="well span4 top-block" href="#">
                <span class="icon32 icon-color icon-user"></span>
                <div>Last Login Details</div>
                <div>
                    <table>
                        <tr>
                            <td align="left" ><?php
                                $lecturer = $_SESSION['cur_user'];
                                $result = $obj->getLastLogin($lecturer);
                                echo $result['log_in_time'];
                                
                                ?>
                                <br/>
                                <?php
                                 $last_log_in_time= $result['log_in_time'];
                                 $ago=strtotime($now_date) - strtotime($last_log_in_time);
                                 $ago =  round(($ago/60)/60);
                                 if($ago > 24)
                                 {
                                     $ago = round($ago/24);
                                     echo "(".$ago." days ago)";
                                 }
                                 else
                                 {
                                     echo "(".$ago." hours ago)";
                                 }                                
                               ?></td>
                            <td align="center">
                                
                            </td> 
                        </tr>
                    </table><br/><br/>
                </div>
            </a>
            
            
        </div>
        <div class="box-content">
            <a indepth="true" class="well span4 top-block" href="student_count.php?teacher_id=<?php echo $teacher;?>" rel="facebox">
                <span class="icon32 icon-color icon-compose"></span>
                <div>Students</div>
                <div>
                    <br/>
                    Student Count per Course
                         
                <br/></div>
            </a>
            <a indepth="true" class="well span4 top-block" href="view_lecture_hours.php">
                <span class="icon32 icon-color icon-book"></span>
                <div>Payment Details<br/><br/></div>
                <div>&nbsp;</div>
            </a>
            <a indepth="true" class="well span4 top-block" href="profile.php">
                <span class="icon32 icon-color icon-user"></span>
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
	
	<p class="pull-right">Powered by: <a href="#" target="_top">Key Institute</a></p>
                </footer>		
</div><!--/.fluid-container-->

	
	
		


<div style="display: none;" id="cboxOverlay"></div><div style="display: none; padding-bottom: 57px; padding-right: 28px;" class="" id="colorbox"><div id="cboxWrapper"><div><div style="float: left;" id="cboxTopLeft"></div><div style="float: left;" id="cboxTopCenter"></div><div style="float: left;" id="cboxTopRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxMiddleLeft"></div><div style="float: left;" id="cboxContent"><div style="width: 0px; height: 0px; overflow: hidden; float: left;" id="cboxLoadedContent"></div><div style="float: left;" id="cboxLoadingOverlay"></div><div style="float: left;" id="cboxLoadingGraphic"></div><div style="float: left;" id="cboxTitle"></div><div style="float: left;" id="cboxCurrent"></div><div style="float: left;" id="cboxNext"></div><div style="float: left;" id="cboxPrevious"></div><div style="float: left;" id="cboxSlideshow"></div><div style="float: left;" id="cboxClose"></div></div><div style="float: left;" id="cboxMiddleRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxBottomLeft"></div><div style="float: left;" id="cboxBottomCenter"></div><div style="float: left;" id="cboxBottomRight"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div>

<div style="display: none;" id="cboxOverlay"></div><div style="display: none; padding-bottom: 57px; padding-right: 28px;" class="" id="colorbox"><div id="cboxWrapper"><div><div style="float: left;" id="cboxTopLeft"></div><div style="float: left;" id="cboxTopCenter"></div><div style="float: left;" id="cboxTopRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxMiddleLeft"></div><div style="float: left;" id="cboxContent"><div style="width: 0px; height: 0px; overflow: hidden; float: left;" id="cboxLoadedContent"></div><div style="float: left;" id="cboxLoadingOverlay"></div><div style="float: left;" id="cboxLoadingGraphic"></div><div style="float: left;" id="cboxTitle"></div><div style="float: left;" id="cboxCurrent"></div><div style="float: left;" id="cboxNext"></div><div style="float: left;" id="cboxPrevious"></div><div style="float: left;" id="cboxSlideshow"></div><div style="float: left;" id="cboxClose"></div></div><div style="float: left;" id="cboxMiddleRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxBottomLeft"></div><div style="float: left;" id="cboxBottomCenter"></div><div style="float: left;" id="cboxBottomRight"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div></body></html>
<?php }
else
{
//    $_SESSION['cur_user']=NULL;
    unset($_SESSION['cur_user']);
    session_destroy();
    header("location: ../../index/view/index.php");
}
?>