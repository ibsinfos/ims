<?php 
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='5'))
{    require_once '../model/course.php';
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">
	<title>Courses | KEY - Institute Management System</title>
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
<!--        <link href="facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />
        <script src="facebox/facebox.js" type="text/javascript"></script>
        <script type="text/javascript" charset="utf-8">
            jQuery(document).ready(function() {
                $('a[rel*=facebox]').facebox({
                    loadingImage : 'facebox/loading.gif',
                    closeImage   : 'facebox/closelabel.png'
                });
            });
</script>-->
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
        <script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
        <link rel="stylesheet" type="text/css" href="css/validationEngine.jquery.css"></link>
	<!-- application script for Charisma demo -->
	<script src="js/charisma.js"></script> 
        <link rel="shortcut icon" href="images/favicon.ico">
		

            <link rel="stylesheet" type="text/css" href="css/teachers.css" media="all">
                <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">
<script>
    jQuery(document).ready(function(){
$("#course").validationEngine({
    'custom_error_messages': {
// Custom Error Messages for Validation Types
'#course_name':{
'required': {'message': "Course Name should be given."}
        },
'#course_category':{
'required': {'message': "Category  should be given."}
        }
}
});
});
</script>
                    </head>
<body>
		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
	<?php include 'common/coordinator_header.php';?>
		</div>
	</div>
	<!-- topbar ends -->		<div class="container-fluid">
			<div class="row-fluid">
				
				<!-- left menu starts -->
            <div class="span2 main-menu-span">
               <?php include 'common/coordinator_side_nav.php';?>
            </div> <!--/span-->
			<!-- left menu ends -->                
                
                <div id="content" class="span10">
                <!-- content starts -->
                
                
<!---------------MANAGE TEACHER LISTS------------>
<div class="row-fluid">
	<div class="box span12">
		<?php include 'common/coordinator_sub_head.php';?>
        
		<div class="box-content">
        	<!-----CUSTOM MESSAGE------>
        	
                        <!-----CUSTOM MESSAGE------>
            
        	<!----TAB UI FOR TEACHERS-->
            <ul class="nav nav-tabs" id="myTab">
            	                
            	                
                <li class="active"><a href="#manage">View Courses</a></li>
                
                <li><a href="#create">Add New Course</a></li>
            </ul>
            
            
            <div id="myTabContent" class="tab-content">
            
            	<!------PERSONAL PROFILE------->
                <div class="tab-pane" id="personal_profile">
            			                </div>
                
            	<!------EDIT TEACHER------->
            	
                <div class="tab-pane" id="edit">
            		                </div>
                
            	<!------MANAGE TEACHERS------->
                <div class="tab-pane active" id="manage">
                	<br/><br/>
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"><table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
  <thead>
      <tr role="row">
          <th aria-label="ID: activate to sort column descending" aria-sort="ascending" style="width: 12px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting_asc">Course ID</th>
          <th aria-label="Email: activate to sort column ascending" style="width: 80px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting">Course Category</th>
          <th aria-label="Email: activate to sort column ascending" style="width: 80px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting">Course Name</th>
          <th aria-label="Email: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting">Description</th>
          <th aria-label="Options: activate to sort column ascending" style="width: 200px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting" width="350">Options</th></tr>
  </thead>  
        
<tbody aria-relevant="all" aria-live="polite" role="alert">
   <?php
        $object = new Course();
        $res = $object->getCourses();
        
        while($row= mysql_fetch_array($res)){?>
  
    <tr class="odd">
        <td class=><?php echo $row['course_id'];?></td>
 
        <td class=" ">
                   <?php echo $row['course_category_name'];?>   
        </td>
        <td class=" ">
                   <?php echo $row['course_name'];?>   
        </td>
        
        <td class=" "><?php echo $row['description'];?></td>
       
        <td class=" " >
            <a class="btn btn-success" href="view_course_details.php?course_id=<?php echo $row['course_id'];?>" rel="facebox">
                <i class="icon-book icon-white"></i>  
                View Details                                         
            </a>
            
            <a class="btn btn-info" href="edit_course_details.php?course_id=<?php echo$row['course_id'];?>" rel="facebox">
                    <i class="icon-edit icon-white"></i>  
                        Edit                                            
                            </a>
            
        </td>
    </tr>
    
    <?php }?>
   </tbody></table>
    </div>
    </div>
                
                <!------CREATE NEW TEACHER------->
                <div class="tab-pane" id="create">
                	<form class="form-horizontal" id="course" method="post" action="../controller/course.php" enctype="multipart/form-data">
    <fieldset>
        <legend><i class="icon32 icon-square-plus"></i>Add new Course</legend>
        <div class="control-group">
            <label class="control-label" for="typeahead">Course name </label>
            <div class="controls">
                <input id="course_name" class="span6 typeahead text-input" name="course_name" type="text" data-validation-engine="validate[required]"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Course Category </label>
            <div class="controls">
                <select name="course_category" id="course_category" class="span6 typeahead" data-validation-engine="validate[required]">
                    <option></option>
                    <?php
        $object = new Course();
        $res = $object->getCourseCategory();
        while($a = mysql_fetch_array($res)){
        ?>
        
                    <option value="<?php echo $a['course_category_id'];?>"><?php echo $a['course_category_name']; ?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Teacher </label>
            <div class="controls">
                <select name="teacher" class="span6 typeahead" data-validation-engine="validate[required]">
                    <option></option>
                    <?php
                    $object = new Course();
                    $results = $object->get_all_teachers();
                    while($row = mysql_fetch_array($results)){
                        
                        ?>
                     <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['first_name']." ". $row['last_name'];?></option>
<?php
}
                    ?>
                    
                          </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Course Fee :</label>
            <div class="controls">
                <input value="" class="span6 typeahead" name="course_fee" placeholder="" type="text">
            </div>
        </div>
               <div class="control-group">
            <label class="control-label" for="typeahead">Description </label>
            <div class="controls">
                <textarea style="height: 18px;" class="span6 autogrow" name="description"></textarea>
            </div>
        </div>
        <div class="form-actions">
            <input type="hidden" name="action" value="add_course"/>
            <input class="btn btn-primary" value="SAVE" type="submit">
            <input class="btn" value="Reset" type="reset">
        </div>
    </fieldset>
</form>
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
            
        </div>
        <div style="clear: left;">
            <div style="float: left;" id="cboxBottomLeft"></div>
            <div style="float: left;" id="cboxBottomCenter"></div>
            <div style="float: left;" id="cboxBottomRight"></div>
            
        </div>
        
    </div>
    <div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div>
    
</div>
<div style="position: absolute; top: -10000px; left: -10000px; width: 48.9362px; font-size: 13px; font-family: &quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif; font-weight: 400; line-height: 18px; resize: none;"></div>
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