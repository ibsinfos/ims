<?php 
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='2'))
{
     require_once '../model/course.php';
    require_once '../model/student.php';
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">
	<title>Payments | KEY - Institute Management System</title>
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
        <link rel="shortcut icon" href="images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/teachers.css" media="all">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">
            <script type="text/javascript">
        function get_students(){
            var admission_no = $('#admission_no').val();
            var courses = $('#courses').val();
            if(admission_no!=''){
                
                admission_no = admission_no.replace(/ /g,'%20');
                var targetURL ='get_students.php?admission_no='+admission_no+'&courses='+courses;
                $('#student_tbl').html('<p style="text-align:center;">Please Wait...<br/><img src="images/loading.gif"/></p>');
                $('#student_tbl').load(targetURL).hide().fadeIn('slow');
            }
           
        }  
        function get_studentBYcourse(){
            var admission_no = $('#admission_no').val();
            var courses = $('#courses').val();
            if(admission_no !='' && courses!= '0'){
                courses = courses.replace(/ /g,'%20%');
               var targetURL ='get_student_course.php?admission_no='+admission_no+'&courses='+courses;
                $('#student_tbl').html('<p style="text-align:center;">Please Wait...<br/><img src="images/loading.gif"/></p>');
                $('#student_tbl').load(targetURL).hide().fadeIn('slow'); 
            }
        }
        </script>          
</head>
<body>
		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<?php include 'common/receptionist_header.php';?>
		</div>
	</div>
	<!-- topbar ends -->		<div class="container-fluid">
			<div class="row-fluid">
				
				<!-- left menu starts -->
            <div class="span2 main-menu-span">
                <?php include 'common/receptionist_side_nav.php';?><!--/.well -->
            </div> <!--/span-->
			<!-- left menu ends -->                
                
                <div id="content" class="span10">
                <!-- content starts -->
                
                
<!---------------MANAGE TEACHER LISTS------------>
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well">
            <div class="box-icon">
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            </div>
		</div>
        
		<div class="box-content">
        
        	<!----TABS-->
            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#manage">Payments</a></li>
            </ul>
            
            <div id="myTabContent" class="tab-content">
            
                
            	<!------MANAGE PAYMENTS------->
                <div class="tab-pane active" id="manage">
                    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
    <fieldset>
        <table width="600">
            <tr>
                <td>
                    Admission No:
                </td>
                    <td>
                        <input class="span6 typeahead" name="admission_no" id="admission_no" onblur="get_students()" type="text">
                    </td>
                <td>
                    Course:
                </td>
                    <td>
                        <select id="courses" style="margin: 20px;" name="courses" onchange="get_studentBYcourse();">
                        <option selected="selected" value="0" >Select a course</option>
                        <?php
                        $obj = new Course();
                        $result = $obj->getCourses();
                        while ($row = mysql_fetch_array($result)) {
                        ?>                 
                    <option value="<?php echo $row['course_id']; ?>"><?php echo $row['course_category_name'] . " - " . $row['course_name']; ?></option>
                                        <?php } ?>                                                
                                    </select>
</td>
            </tr>
<!--            <tr>
                <td colspan="4" align="right"> <div style ="float: right; margin-right: 50px;"> 
                <input type="hidden" name="action" value="find"/>
                <button type="submit" name="studnet_list" class="btn btn-info"><i class="icon-zoom-in icon-white"></i> Browse</button>
               </div>
                <br/><br/>
         </td>
            </tr>-->
        </table>
        
    </fieldset>
                        </form>
                    <center>
                   
                       
                            <div id="student_tbl">
                                
                            </div>
                            
                    </center>
                   
        </div>
          </div>
                
                <!------CREATE NEW TEACHER------->
                <div class="tab-pane" id="create">
                	
                       </div>
            </div>
        
			
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
<?php
    if(isset($_GET['subject']))
    {   $std_id = $_GET['student_id'];
        $course_id = $_GET['subject'];
        ?>
                <script type="text/javascript">
//       payment_reciept.php?student_id=28
            jQuery.facebox({ ajax:'subject_payment_reciept.php?course_id=<?php echo $course_id; ?>&student_id=<?php echo $std_id;?>'});
        </script>
<?php
        }
        else if(isset($_GET['multiple']) && $_GET['multiple'] === 'true')
        {
            $std_id = $_GET['student_id'];
            ?>
    <script type="text/javascript">
        //       payment_reciept.php?student_id=28
        jQuery.facebox({ ajax:'subjects_payment_reciept.php?student_id=<?php echo $std_id; ?>'});
    </script>
<?php } ?>

		</div><!--/.fluid-container-->

	
	
		


<div style="display: none;" id="cboxOverlay"></div><div style="display: none; padding-bottom: 57px; padding-right: 28px;" class="" id="colorbox"><div id="cboxWrapper"><div><div style="float: left;" id="cboxTopLeft"></div><div style="float: left;" id="cboxTopCenter"></div><div style="float: left;" id="cboxTopRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxMiddleLeft"></div><div style="float: left;" id="cboxContent"><div style="width: 0px; height: 0px; overflow: hidden; float: left;" id="cboxLoadedContent"></div><div style="float: left;" id="cboxLoadingOverlay"></div><div style="float: left;" id="cboxLoadingGraphic"></div><div style="float: left;" id="cboxTitle"></div><div style="float: left;" id="cboxCurrent"></div><div style="float: left;" id="cboxNext"></div><div style="float: left;" id="cboxPrevious"></div><div style="float: left;" id="cboxSlideshow"></div><div style="float: left;" id="cboxClose"></div></div><div style="float: left;" id="cboxMiddleRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxBottomLeft"></div><div style="float: left;" id="cboxBottomCenter"></div><div style="float: left;" id="cboxBottomRight"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div><div style="position: absolute; top: -10000px; left: -10000px; width: 48.9362px; font-size: 13px; font-family: &quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif; font-weight: 400; line-height: 18px; resize: none;"></div></body>
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