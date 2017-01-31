<?php 
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='3'))
{
    require_once '../model/student.php';
   
 ?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
	<title>Evaluation | KEY - Institute Management System</title>
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
	<!--<script src="js/jquery.uniform.min.js"></script>-->
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
        	
              
        
        
        <link rel="shortcut icon" href="images/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="css/student.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all"/>                
                
</head>
<body>
		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
		<?php include 'common/student_header.php';?>                    
		</div>
	</div>
	<!-- topbar ends -->		<div class="container-fluid">
			<div class="row-fluid">
				
				<!-- left menu starts -->
            <div class="span2 main-menu-span">
                <?php include 'common/student_side_nav.php'; ?>
            </div> <!--/span-->
	<!-- left menu ends -->                
                
<div id="content" class="span10">
                <!-- content starts -->
                
<!---------------MANAGE STUDENT LISTS------------>
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well">
            <div class="box-icon">
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            </div>
		</div>
        
		<div class="box-content">
        	<!-----CUSTOM MESSAGE------>
        	
                        <!-----CUSTOM MESSAGE------>
            
        	<!----TAB UI FOR STUDENTS-->
            <ul class="nav nav-tabs" id="myTab">
            
                <!--<li class="active"><a href="#manage">Manage students</a></li>-->
                
                <li class=""><a href="#create">Evaluation Sheet</a></li>
            </ul>
            
            
            <div id="myTabContent" class="tab-content">
                <!------CREATE NEW STUDENT------->
                <div class="tab-pane" id="create">
                    
                    <form class="form-horizontal" method="post" action="../controller/student.php" enctype="multipart/form-data">
                    <div class="control-group">
            <label class="control-label" for="typeahead">Course </label>
            <div class="controls">
                <select name="course" id="course" onchange="getAssignments(this.value)">
              <option></option>
                    <?php 
              
              $student = $_SESSION['cur_user'];
              $objct_course = new Students();
              $result = $objct_course->getCoursesByStudent($student);
             while($row = mysql_fetch_array($result)) {
              
              ?>  
                
                    <option value="<?php echo $row['course_id'];?>"><?php echo $row['course_name']; ?></option>
                <?php } ?>  
                </select>
                <br/>
            </div>
        </div>
                        <br/><br/>
                        <div id="student_details_form">        
                    <fieldset>
                        <h3> General Evaluation of the Course</h3>
                        <br/>
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
                            <table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
                            <tr>
                                <td>&nbsp;</td>
                                <td>Strongly Agree</td>
                                <td>Agree</td>
                                <td>Neutral</td>
                                <td>Disagree</td>
                                <td>Strongly Disagree</td>
                            </tr>
                            <tr>
                                <td><h4>1) The course objectives where clear</h4></td>
                                <td align="center"><input type="radio" name="c_one" value="5"/></td>
                                <td align="center"><input type="radio" name="c_one" value="4"/></td>
                                <td align="center"><input type="radio" name="c_one" value="3"/></td>
                                <td align="center"><input type="radio" name="c_one" value="2"/></td>
                                <td align="center"><input type="radio" name="c_one" value="1"/></td>
                            </tr>
                            <tr>
                                <td align="center"><h4>2) The course procedures and assignments support course objectives</h4></td>
                                <td align="center"><input type="radio" name="c_two" value="5"/></td>
                                <td align="center"><input type="radio" name="c_two" value="4"/></td>
                                <td align="center"><input type="radio" name="c_two" value="3"/></td>
                                <td align="center"><input type="radio" name="c_two" value="2"/></td>
                                <td align="center"><input type="radio" name="c_two" value="1"/></td>
                            </tr>
                            <tr>
                                <td align="center"><h4>3) The amount of reading you were asked to do was appropriate</h4></td>
                                <td align="center"><input type="radio" name="c_three" value="5"/></td>
                                <td align="center"><input type="radio" name="c_three" value="4"/></td>
                                <td align="center"><input type="radio" name="c_three" value="3"/></td>
                                <td align="center"><input type="radio" name="c_three" value="2"/></td>
                                <td align="center"><input type="radio" name="c_three" value="1"/></td>
                            </tr>
                            <tr>
                                <td align="center"><h4>4) The amount of writing or other class work you were asked to do was enough</h4></td>
                                <td align="center"><input type="radio" name="c_four" value="5"/></td>
                                <td align="center"><input type="radio" name="c_four" value="4"/></td>
                                <td align="center"><input type="radio" name="c_four" value="3"/></td>
                                <td align="center"><input type="radio" name="c_four" value="2"/></td>
                                <td align="center"><input type="radio" name="c_four" value="1"/></td>
                            </tr>
                        </table>
                        </div>
                        <br/><br/>
        <h4>5) What overall rating would you give the course?</h4>
        <br/>
        <input type="radio" name="c_five" value="5"/>Excellent<br/>
        <input type="radio" name="c_five" value="4"/>Good<br/>
        <input type="radio" name="c_five" value="3"/>Average<br/>
        <input type="radio" name="c_five" value="2"/>Poor<br/>
        <input type="radio" name="c_five" value="1"/>Very Poor<br/>
        <br/><br/>
         <h4> 6) What are the major strengths and weaknesses of this course?</h4>
         <br/>
         <textarea name="c_six"></textarea>
        <br/><br/>
        
        <h3>General Evaluation of the Instructor</h3>
        <br/><br/>
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
                            <table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
                            <tr>
                                <td></td>
                                <td>Always</td>
                                <td>Most of the time</td>
                                <td>Usually</td>
                                <td>Sometimes</td>
                                <td>Never</td>
                            </tr>
                            <tr>
                                <td><h4>1) Could you get clear answers to your questions from the instructor?</h4></td>
                                <td align="center"><input type="radio" name="l_one" value="5"/></td>
                                <td align="center"><input type="radio" name="l_one" value="4"/></td>
                                <td align="center"><input type="radio" name="l_one" value="3"/></td>
                                <td align="center"><input type="radio" name="l_one" value="2"/></td>
                                <td align="center"><input type="radio" name="l_one" value="1"/></td>
                            </tr>
                            <tr>
                                <td align="center"><h4>2) Was the instructor considerate to you?</h4></td>
                                <td align="center"><input type="radio" name="l_two" value="5"/></td>
                                <td align="center"><input type="radio" name="l_two" value="4"/></td>
                                <td align="center"><input type="radio" name="l_two" value="3"/></td>
                                <td align="center"><input type="radio" name="l_two" value="2"/></td>
                                <td align="center"><input type="radio" name="l_two" value="1"/></td>
                            </tr>
                            <tr>
                                <td align="center"><h4>3) Was the instructor effective in teaching in the course?</h4></td>
                                <td align="center"><input type="radio" name="l_three" value="5"/></td>
                                <td align="center"><input type="radio" name="l_three" value="4"/></td>
                                <td align="center"><input type="radio" name="l_three" value="3"/></td>
                                <td align="center"><input type="radio" name="l_three" value="2"/></td>
                                <td align="center"><input type="radio" name="l_three" value="1"/></td>
                            </tr>
                            <tr>
                                <td align="center"><h4>4) Was the instructor enthusiastic about the course?</h4></td>
                                <td align="center"><input type="radio" name="l_four" value="5"/></td>
                                <td align="center"><input type="radio" name="l_four" value="4"/></td>
                                <td align="center"><input type="radio" name="l_four" value="3"/></td>
                                <td align="center"><input type="radio" name="l_four" value="2"/></td>
                                <td align="center"><input type="radio" name="l_four" value="1"/></td>
                            </tr>
                        </table>
                        </div>
        <br/><br/>
       <h4>5) What overall rating would you give the instructor?</h4>
        <br/>
        <input type="radio" name="l_five" value="5"/>Excellent<br/>
        <input type="radio" name="l_five" value="4"/>Good<br/>
        <input type="radio" name="l_five" value="3"/>Average<br/>
        <input type="radio" name="l_five" value="2"/>Poor<br/>
        <input type="radio" name="l_five" value="1"/>Very Poor<br/>
        <br/><br/>
        <h4> 6) What would you recommend to improve the instructor's performance?</h4>
         <br/>
         <textarea name="l_six"></textarea>
        <br/><br/>
        <?php $student= $_SESSION['user_id'];
        $obj_student = new Students();
        $res= $obj_student->getStudent($student);
        $student_id = $res['student_id'];?>
        <input type="hidden" name="student_id" value="<?php echo $student_id;?>"/>
        <div class="form-actions">
        <input type="hidden" name="action" value="add_evaluation"/> 
        <input class="btn btn-primary" value="Add Evaluation" type="submit"/>
        <input class="btn" value="reset form" type="reset"/>
        </div>
    </fieldset>
    </div>
    </form>                
   
</div>
</div>
</div>
			
		</div>
	</div>
</div>

				</div><!--/#content.span10-->
			</div><!--/fluid-row-->

		<footer>
	<hr />
			<!---------facebook like page--------->
	<p class="pull-right">Powered by: <a href="#" target="_top">Key Institute</a></p>
</footer>
                     
		</div><!--/.fluid-container-->

	
	
		


<div style="display: none;" id="cboxOverlay"></div>
<div style="display: none; padding-bottom: 57px; padding-right: 28px;" class="" id="colorbox">
    <div id="cboxWrapper">
        <div>
            <div style="float: left;" id="cboxTopLeft"></div>
            <div style="float: left;" id="cboxTopCenter"></div>
            <div style="float: left;" id="cboxTopRight"></div>
            
        </div>
        <div style="clear: left;">
            <div style="float: left;" id="cboxMiddleLeft"></div>
            <div style="float: left;" id="cboxContent">
                <div style="width: 0px; height: 0px; overflow: hidden; float: left;" id="cboxLoadedContent"></div>
                <div style="float: left;" id="cboxLoadingOverlay"></div>
                <div style="float: left;" id="cboxLoadingGraphic"></div>
                <div style="float: left;" id="cboxTitle"></div>
                <div style="float: left;" id="cboxCurrent"></div>
                <div style="float: left;" id="cboxNext"></div>
                <div style="float: left;" id="cboxPrevious"></div>
                <div style="float: left;" id="cboxSlideshow"></div>
                <div style="float: left;" id="cboxClose"></div>
                
            </div>
            <div style="float: left;" id="cboxMiddleRight"></div>
            
        </div><div style="clear: left;"><div style="float: left;" id="cboxBottomLeft"></div><div style="float: left;" id="cboxBottomCenter"></div><div style="float: left;" id="cboxBottomRight"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div><div style="position: absolute; top: -10000px; left: -10000px; width: 48.9362px; font-size: 13px; font-family: &quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif; font-weight: 400; line-height: 18px; resize: none;"></div></body>
</html>
<?php
}
else
{
    $_SESSION['cur_user']=NULL;
    unset($_SESSION['cur_user']);
    session_destroy();
    header("location: ../../index/view/index.php");
}
?> 