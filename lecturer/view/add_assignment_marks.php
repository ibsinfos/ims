<?php 
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='7'))
{
    require_once '../model/schedule.php';?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">
	<title>Assignment Marks | KEY - Institute Management System</title>
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
        <script src="js/charisma_mod.js"></script> 
        <link rel="shortcut icon" href="images/favicon.ico">
		

            <link rel="stylesheet" type="text/css" href="css/student.css" media="all">
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
                <?php include 'common/lecturer_side_nav.php'; ?><!--/.well -->
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
            
            	            
            	                
            	                
                <li class="active"><a href="#manage">Manage Assignment Marks</a></li>
                <li><a href="#create">View Assignment Marks</a></li>
                
            </ul>
            
            
            <div id="myTabContent" class="tab-content">
            
            	
            	<!------MANAGE STUDENTS------->
                <div class="tab-pane active" id="manage">
                    <form class="form-horizontal" method="post" action="../controller/teacher.php" id="add_mrks">
        <fieldset>
            <div class="control-group">
            <label class="control-label" for="typeahead">Course </label>
            <div class="controls">
                <select name="courses" id="courses" onchange="get_assignments(this.value);" >
              <option></option>
                    <?php 
              $lecturer = $_SESSION['user_id'];
              $Object_teacher_id= new Schedules();
              $res = $Object_teacher_id->getTeacherByUser($lecturer);
              $lecturer = $res['teacher_id'];
             
              
              $objct_course = new Schedules();
              $result = $objct_course->getCourseByLecturer($lecturer);
             while($row = mysql_fetch_array($result)) {
              
              ?>  
                
                    <option value="<?php echo $row['course_id'];?>"><?php echo $row['course_category_name']."-".$row['course_name']; ?></option>
                <?php } ?>  
                </select>
                <br/>
            </div>
        </div>
            <div class="control-group">
            <label class="control-label" for="typeahead">Assignment </label>
            <div class="controls">
                <select name="assignment" id="assignment_title" onchange="getStudents(this.value)">
                    
              
              
                </select>
                <br/><br/><br/>
            </div>
        </div>
            
                <div id="DataTables_Table_0_wrapper" role="grid">
    <table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
  <thead>
      <tr role="row">
          
          <th  style="width: 150px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting" width="80">Admission No</th>
          <th  style="width: 177px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting">Name</th>
          <th  style="width: 350px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting" width="350">Marks</th>
          <!--<th aria-label="Options: activate to sort column ascending" style="width: 350px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting" width="350">Status</th>-->
      </tr>
  
  </thead>   
  
<tbody id="assignments_mark_tbl" aria-relevant="all" aria-live="polite" role="alert" >
   
      
   </tbody>
        </table>
                    <table>
                        <tr>
            <td colspan="3" align="right">
                
                    <input type="hidden" name="action" value="add_marks"/>
                    <button type="submit" name="add_marks" class="btn btn-primary"><i class="icon-save icon-save"></i> Save</button>
                </td>
        </tr>
                    </table>
    
                        </div>
        </fieldset>
    </form>
    <div class="alert alert-info" style="margin: 50px;">Select a class to browse it's students</div>
                </div>
                <div class="tab-pane" id="create">
                    <form class="form-horizontal" method="post" action="">
                    <fieldset>
                          <div class="control-group">
            <label class="control-label" for="typeahead">Course </label>
            <div class="controls">
                <select name="course_id" id="course_id" onchange="get_assignment_list(this.value);" >
              <option></option>
                    <?php 
              $lecturer = $_SESSION['user_id'];
              $Object_teacher_id= new Schedules();
              $res = $Object_teacher_id->getTeacherByUser($lecturer);
              $lecturer = $res['teacher_id'];
             
              
              $objct_course = new Schedules();
              $result = $objct_course->getCourseByLecturer($lecturer);
             while($row = mysql_fetch_array($result)) {
              
              ?>  
                
                    <option value="<?php echo $row['course_id'];?>"><?php echo $row['course_category_name']."-".$row['course_name']; ?></option>
                <?php } ?>  
                </select>
                <br/>
            </div>
        </div>
            <div class="control-group">
            <label class="control-label" for="typeahead">Assignment </label>
            <div class="controls">
                <select name="assignment" id="assignment_name" onchange="get_assignment_mark_list()" >
                    <option></option>
              
              
                </select>
                <br/><br/><br/>
            </div>
        </div>
                             <div id="DataTables_Table_0_wrapper" role="grid">
    <table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
  <thead>
      <tr role="row">
          
          <th  style="width: 150px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting" width="80">Admission No</th>
          <th  style="width: 177px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting">Name</th>
          <th  style="width: 350px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting" width="350">Marks</th>
          <th aria-label="Options: activate to sort column ascending" style="width: 350px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting" width="350">Options </th>
      </tr>
  
  </thead>   
  
<tbody id="view_assignment_marks" aria-relevant="all" aria-live="polite" role="alert" >
   
      
   </tbody>
        </table>
<!--                    <table>
                       <tr>
            <td colspan="3" align="right">
                    <input type="hidden" name="action" value="add_marks"/>
                    <button type="submit" name="add_marks" class="btn btn-primary">
                        <i class="icon-save icon-save"></i> Save</button>
                </td>
        </tr>
                    </table>
    -->
                        </div>           
                        
                        
           </fieldset> 
                        </form>
                    
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

<div style="display: none;" id="cboxOverlay"></div>
<div style="display: none; padding-bottom: 57px; padding-right: 28px;" class="" id="colorbox">
 <script type="text/javascript">                    
                function get_assignments(courses){
                var courses = $("#courses").val();
                if(courses !=""){
                    $.ajax({
                       url: "../controller/ajax_function.php",
                       type:"POST",
                       cache:false,
                       async:false,
                       data:{assignment:true,courses_id:courses},
                       success:function(theResponse){
                           if(theResponse != 'no records'){
                               var assignment = $.parseJSON(theResponse);
                               $('#assignment_title').html('<option></option>');
                               $.each(assignment,function(i,val){
                                   $('#assignment_title').append("<option value='"+val.assignment_id+"'>"+val.title+"</option>");                                   
                               });
//                               $('#assignment_title option:empty').remove();
                           }
                           else{
                               $('#assignment_title').html('');
                           }
                       }

                    });
                    }
              
            }
            function get_assignment_list(courses){
                var courses = $("#course_id").val();
//                alert(courses);
                if(courses !=""){
                    $.ajax({
                       url: "../controller/ajax_function.php",
                       type:"POST",
                       cache:false,
                       async:false,
                       data:{assignment:true,courses_id:courses},
                       success:function(theResponse){
                           if(theResponse != 'no records'){
                               var assignment = $.parseJSON(theResponse);
                               $('#assignment_name').html('<option></option>');
                               $.each(assignment,function(i,val){
                                   $('#assignment_name').append("<option value='"+val.assignment_id+"'>"+val.title+"</option>");
                                   
                               });
//                               $('#assignment_name option:empty').remove();
                           }
                           else{
                               $('#assignment_name').html('');
                           }
                       }

                    });
                    }
               }
            function get_assignment_mark_list(assignment){
                var assignment = $("#assignment_name").val();
//                alert(assignment);
                if(assignment !=""){
                    $.ajax({
                       url: "../controller/ajax_function.php",
                       type:"POST",
                       cache:false,
                       async:false,
                       data:{assignment_marks:true,assignment_id:assignment},
                       success:function(theResponse){
//                           alert(theResponse);
                           if(theResponse != 'no records'){
                               var assignment = $.parseJSON(theResponse);
                               $('#view_assignment_marks').html('');
                               $.each(assignment,function(i,val){
                                   $('#view_assignment_marks').append("<tr><td>"+val.stu_admission_no+"</td><td>"+val.first_name+"&nbsp;"+val.last_name+"</td><td>"+val.Marks+"</td><td><a href=view_assignment_mark.php?assignment_mark_id="+val.Assignment_mark_id+" rel='facebox' class='btn btn-success'><i class='icon-view icon-white'></i> &nbsp;View</a> <a href=edit_assignment_mark.php?assignment_mark_id="+val.Assignment_mark_id+" rel='facebox' class='btn btn-info'><i class='icon-edit icon-white'></i> &nbsp;Edit</a>&nbsp;</td></tr>");
                                   
                               });
                                $('a[rel*=facebox]').facebox({});
//                             
                           }
                           else{
                               $('#view_assignment_marks').html('');
                           }
                       }

                    });
                    }
              
            }
            function getStudents(courses){
               var courses = $("#courses").val(); 
//                  alert(courses);
                     if(courses !=""){
                    $.ajax({
                       url: "../controller/ajax_function.php",
                       type:"POST",
                       cache:false,
                       async:false,
                       data:{student:true,courses_id:courses},
                       success:function(theResponse){
//                           alert(theResponse);
                           if(theResponse != 'no records'){
                               var students = $.parseJSON(theResponse);
                               $('#assignments_mark_tbl').html('');
                               $.each(students,function(i,val){
                                   $('#assignments_mark_tbl').append("<tr><td><input type='hidden' name='stu_id[]' value="+val.student_id+">"+val.stu_admission_no+"</td><td>"+val.first_name+"</td><td><input type='text' name='marks[]'/></td></tr>");
                                   
                               });
                              
                               $('#assignments_mark_tbl option:empty').remove();
                           }
                           else{
                               $('#assignments_mark_tbl').html('');
                           }
                       }

                    });
                    }
            }
            
            </script>
    
    <div id="cboxWrapper"><div><div style="float: left;" id="cboxTopLeft"></div><div style="float: left;" id="cboxTopCenter"></div><div style="float: left;" id="cboxTopRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxMiddleLeft"></div><div style="float: left;" id="cboxContent"><div style="width: 0px; height: 0px; overflow: hidden; float: left;" id="cboxLoadedContent"></div><div style="float: left;" id="cboxLoadingOverlay"></div><div style="float: left;" id="cboxLoadingGraphic"></div><div style="float: left;" id="cboxTitle"></div><div style="float: left;" id="cboxCurrent"></div><div style="float: left;" id="cboxNext"></div><div style="float: left;" id="cboxPrevious"></div><div style="float: left;" id="cboxSlideshow"></div><div style="float: left;" id="cboxClose"></div></div><div style="float: left;" id="cboxMiddleRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxBottomLeft"></div><div style="float: left;" id="cboxBottomCenter"></div><div style="float: left;" id="cboxBottomRight"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div><div style="position: absolute; top: -10000px; left: -10000px; width: 48.9362px; font-size: 13px; font-family: &quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif; font-weight: 400; line-height: 18px; resize: none;"></div>
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