<?php 
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='6'))
{    ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">
	<title>Students | KEY - Institute Management System</title>
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
		

            <link rel="stylesheet" type="text/css" href="css/student.css" media="all">
                <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">
               
                
</head>
<body>
		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
<?php   include 'common/parent_header.php';?>
		</div>
	</div>
	<!-- topbar ends -->		<div class="container-fluid">
			<div class="row-fluid">
				
				<!-- left menu starts -->
            <div class="span2 main-menu-span">
                <div class="nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <li class="nav-header hidden-tablet" style="padding: 20px;"><h4>Navigation</h4></li>
                        <li>
                            <a data-original-title="" href="dashboard.php" class="ajax-link" data-rel="popover" data-content="Admin Dashboard">
                                	<i class="icon-home"></i>
                                		<span class="hidden-tablet">Dashboard</span>
                            </a>
                        </li>
                        <li class="active">
                            <a data-original-title="" href="students.php" class="ajax-link" data-rel="popover" data-content="Watch/create/edit/print the student list classwise, personal detail and academic result">
                                	<i class="icon-th"></i>
                                		<span class="hidden-tablet">Manage students</span>
                            </a>
                        </li>
                        <li>
                            <a data-original-title="" href="teachers.php" class="ajax-link" data-rel="popover" data-content="Watch/create/edit/print the teacher list, personal detail">
                                	<i class="icon-user"></i>
                                		<span class="hidden-tablet">Manage teachers</span>
                            </a>
                        </li>

                        <li>
                            <a data-original-title="" href="http://joyonto.net/projects/schoolmanager/index.php/admin/subjects" class="ajax-link" data-rel="popover" data-content="Watch/create/edit subjects. Subjects are different with respect to class">
                                	<i class="icon-book"></i>
                                		<span class="hidden-tablet">Manage subjects</span>
                            </a>
                        </li>
                        <li>
                            <a data-original-title="" href="http://joyonto.net/projects/schoolmanager/index.php/admin/classes" class="ajax-link" data-rel="popover" data-content="Watch/create/edit class list of the institution">
                                	<i class="icon-list"></i>
                                		<span class="hidden-tablet">Manage Classes</span>
                            </a>
                        </li>
                        <li>
                            <a data-original-title="" href="http://joyonto.net/projects/schoolmanager/index.php/admin/exams" class="ajax-link" data-rel="popover" data-content="Create/edit exams semester">
                                	<i class="icon-edit"></i>
                                		<span class="hidden-tablet">Manage Exams</span>
                            </a>
                        </li>
                        <li>
                            <a data-original-title="" href="http://joyonto.net/projects/schoolmanager/index.php/admin/marks" class="" data-rel="popover" data-content="Give marks, attendance, comment on students">
                                	<i class="icon-file"></i>
                                		<span class="hidden-tablet">Marks-attendance</span>
                            </a>
                        </li>
                        <li>
                            <a data-original-title="" href="http://joyonto.net/projects/schoolmanager/index.php/admin/grades" class="ajax-link" data-rel="popover" data-content="Manage exam grades">
                                	<i class="icon-th-list"></i>
                                		<span class="hidden-tablet">Exam-grades</span>
                            </a>
                        </li>
                        <li>
                            <a data-original-title="" href="http://joyonto.net/projects/schoolmanager/index.php/admin/backup_restore" class="ajax-link" data-rel="popover" data-content="Create/restore data backup">
                                	<i class="icon-download-alt"></i>
                                		<span class="hidden-tablet">Backup-Restore</span>
                            </a>
                        </li>
                    </ul>
                	
                </div><!--/.well -->
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
            
            	            
            	                
            	                
                <li class="active"><a href="#manage">Manage students</a></li>
                
                <li class=""><a href="#create">Create student</a></li>
            </ul>
            
            
            <div id="myTabContent" class="tab-content">
            
            	<!------PERSONAL PROFILE------->
                <div class="tab-pane" id="personal_profile">
            			                </div>
            
            	<!------ACADEMIC RESULT------->
                <div class="tab-pane" id="academic_result">
            			                </div>
            
            	<!------EDIT STUDENT------->
                <div class="tab-pane" id="edit">
            		                </div>
                
            	<!------MANAGE STUDENTS------->
                <div class="tab-pane active" id="manage">
                	<form class="form-horizontal" method="post" action="#">
        <fieldset>
            <legend><i class="icon32 icon-gear"></i>Student list
                <select id="classes" style="margin: 20px;" name="class_id">
                    <option value="0">Select a class</option>
                                        <option value="1">
                            Class One                    
                    	(4 student)
                    </option>
                                        <option value="2">
                            Class Two                    
                    	(5 student)
                    </option>
                                        <option value="3">
                            Class Three                    
                    	(3 student)
                    </option>
                                        <option value="4">
                            Class Four                    
                    	(3 student)
                    </option>
                                        <option value="5">
                            Class Five                    
                    	(2 student)
                    </option>
                                        <option value="6">
                            Class Six                    
                    	(2 student)
                    </option>
                                        <option value="7">
                            Class Seven                    
                    	(5 student)
                    </option>
                                    </select>
                
                <button type="submit" class="btn btn-info"><i class="icon-zoom-in icon-white"></i> Browse</button>
            </legend>
            <div class="center">
            
            </div>
        </fieldset>
    </form>
    <div class="alert alert-info" style="margin: 50px;">Select a class to browse it's students</div>
                </div>
                
                <!------CREATE NEW STUDENT------->
                <div class="tab-pane" id="create">
                	<form class="form-horizontal" method="post" action="#" enctype="multipart/form-data">
    <fieldset>
        <legend><i class="icon32 icon-square-plus"></i>Create a new student entry</legend>
        <div class="control-group">
            <label class="control-label" for="typeahead">Student's name </label>
            <div class="controls">
                <input class="span6 typeahead" name="name" placeholder="Name" value="" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="date01">Birthday</label>
            <div class="controls">
                <input value="" class="span6 " name="birthday" type="date">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Sex </label>
            <div class="controls">
                <select id="" name="sex">
                    <option value="">select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Blood group</label>
            <div class="controls">
                <select id="" name="blood_group">
                    <option value="">select</option>
                    <option value="AB+">AB+</option>
                    <option value="AB−">AB−</option>
                    <option value="B+">B+</option>
                    <option value="B−">B−</option>
                    <option value="A+">A+</option>
                    <option value="A−">A−</option>
                    <option value="O+">O+</option>
                    <option value="O−">O−</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Photo </label>
            <div class="controls">
                <div style="" id="uniform-fileInput" class="uploader"><input style="opacity: 0;" size="19" class="input-file uniform_on" id="fileInput" name="userfile" type="file"><span style="-moz-user-select: none;" class="filename">No file selected</span><span style="-moz-user-select: none;" class="action">Choose File</span></div>
                <a href="#" class="btn btn-info btn-setting"><i class="icon-camera icon-white"></i>
                    Take photo from webcam</a>								
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Religion </label>
            <div class="controls">
                <input value="" class="span6 typeahead" name="religion" placeholder="relegion" data-provide="typeahead" data-items="4" data-source="[&quot;Christianity&quot;,&quot;Islam&quot;,&quot;Judaism&quot;,&quot;Buddhism&quot;,&quot;Hinduism&quot;]" type="text">
                    
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Address </label>
            <div class="controls">
                <textarea style="height: 18px;" class="span6 autogrow" name="address"></textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Phone </label>
            <div class="controls">
                <input class="span6 typeahead" name="phone" placeholder="phone number" value="" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Email </label>
            <div class="controls">
                <input class="span6 typeahead" name="email" placeholder="email address" value="" type="email">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Father's name </label>
            <div class="controls">
                <input class="span6 typeahead" name="father_name" placeholder="father's name" value="" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Mother's name </label>
            <div class="controls">
                <input class="span6 typeahead" name="mother_name" placeholder="mother's name" value="" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Class </label>
            <div class="controls">
                <select id="" name="class_id">
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                        <option value="4">Four</option>
                                        <option value="5">Five</option>
                                        <option value="6">Six</option>
                                        <option value="7">Seven</option>
                                    </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Roll </label>
            <div class="controls">
                <input class="span6 typeahead" name="roll" placeholder="class roll" value="" type="number">
            </div>
        </div>
        <div class="form-actions">
            <input name="operation" value="create" type="hidden">
            <input class="btn btn-primary" value="Create student" type="submit">
            <input class="btn" value="reset form" type="reset">
        </div>
    </fieldset>
</form>                </div>
            </div>
        
			
		</div>
	</div>
</div>

<!-----MODAL WINDOW FOR CAPTURING PHOTO FROM A PC WEBCAM-------->

<!-----MODAL WINDOW FOR CAPTURING PHOTO FROM A PC WEBCAM-------->                <!-- content ends -->
				</div><!--/#content.span10-->
			</div><!--/fluid-row-->

		<footer>
	<hr>
			<!---------facebook like page--------->
	<p class="pull-right">Powered by: <a href="#" target="_top">Key Institute</a></p>
</footer>		
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