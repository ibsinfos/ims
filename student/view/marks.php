<?php 
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='3'))
{
    
require_once '../model/student.php';
$student_id = $_SESSION['cur_user'];
$obj = new Students();
$res = $obj->getStudentById($student_id);
$student_id = $res['student_id'];

?>

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
        <style type="text/css" title="style">
         @import "css/jquery-te-1.3.6.css";
         @import "css/pepper-grinder/jquery-ui-1.10.3.custom.css";
        </style>
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
        <script src="js/charisma_mod.js"></script> 
        <script type="text/javascript" src="js/jquery-te-1.3.6.min.js"></script>
        
        <link rel="shortcut icon" href="images/favicon.ico">
         

            <link rel="stylesheet" type="text/css" href="css/teachers.css" media="all">
                <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">
                    <script>
            
            
        
         function getAssignments(course,student_id){
          var course_name =  $("#course").val(); 
          var student_id = $('#student_id').val();
//          alert(course_name);
          if(course_name !=""){
          $.ajax({
            url: "../controller/ajax_functions.php",
            type: "POST",
            cache: false,
            async:false,
            data: {assignments:true,course:course,student_id:student_id},
            success: function(theResponse){ 
//                alert(theResponse);
                if(theResponse != 'no records')
                {
                    
                    var assignment = $.parseJSON(theResponse);
                    $('#assignments_tbl').html('');
                    $.each(assignment, function(i, val) {
                    $('#assignments_tbl').append("<tr><td>"+val.title+"</td><td>"+val.Marks+"</td></tr>");
                    });
                    $('#request_btn').css('display','block');
                }
                else
                {
                    $('#assignments_tbl').html('');
                    $('#assignments_tbl').html('<tr class="odd"><td class="dataTables_empty" valign="top" colspan="2">No data available in table</td></tr>');
                    
                }
            }
        });    
          }
          
          }   
                              </script>
         
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
                <?php   include 'common/student_side_nav.php';?><!--/.well -->
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
        	
            
        	<!----TAB UI FOR TEACHERS-->
            <ul class="nav nav-tabs" id="myTab">
            	                
            	                
                <li class="active"><a href="#manage"> Assignment Marks</a></li>
                
                <!--<li><a href="#create">View Lessons</a></li>-->
            </ul>
            
            
            <div id="myTabContent" class="tab-content">
            
            	
            	<!------MANAGE ASSIGNMENTS------->
                <div class="tab-pane active" id="manage">
<!--                	<form action="#" >-->
       <form action="../controller/student.php" method="post" class="form-horizontal">
                            <fieldset>
            <!--<legend><i class="icon32 icon-gear"></i>Teacher list</legend>-->
            
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
            
        </fieldset>
<!--</form>-->
                  
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid" id="transcript">
    <table  aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="table table-striped table-bordered bootstrap-datatable datatable dataTable" >
  <thead>
      <tr role="row">
          
          <th aria-label="Photo: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting" width="80">Assignment </th>
          <th aria-label="Name: activate to sort column ascending" style="width: 177px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting">Marks</th>
<!--          <th aria-label="Name: activate to sort column ascending" style="width: 177px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting">Closing</th>
          <th aria-label="Options: activate to sort column ascending" style="width: 350px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting" width="350">Options</th></tr>-->
  </thead>   
        <input type="hidden" value="<?php echo $student_id;?>" name="student_id" id="student_id"/>
<tbody id="assignments_tbl" aria-relevant="all" aria-live="polite" role="alert" >
   
      
   </tbody>
        </table>
    <table id="request_btn" style="display: none;">
        
            <tr><td>
                    
             
                 <!--<input type="hidden" name="student_id" value="<?php echo $student_id;?>"-->
                 <input type="hidden" value="request_transcript" name="action"/> 
                 <button type="submit" name="transcript" class="btn btn-info"><i class='icon icon-request icon-white'></i> Request Transcript</button>
                
                    
                 
                
                </td>
        </tr>
        </table>
            </form>

    
         <?php
         if(isset($_GET['msg'])){
             $message = $_GET['msg'];
            echo "<span id='message' style='color: red;'>".base64_decode($message)."</span>";
         }
         else{
             
         }?>
    
                        </div>
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