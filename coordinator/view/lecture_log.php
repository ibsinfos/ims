<?php 
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='5'))
{?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">
	<title>Lecture Log | KEY - Institute Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="0">

	<!-- The styles -->	
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    
        
    <style type="text/css" title="style">        
         @import "css/pepper-grinder/jquery-ui-1.10.3.custom.css";
         @import "css/jquery.timepicker.css";
    </style>
    
    <!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
        
        
	<!-- jQuery -->
	<script src="js/jquery-1.7.2.min.js"></script>
        <script src="js/jquery.timepicker.js" type="text/javascript"></script>
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
	<!-- The fav icon -->
        <link rel="shortcut icon" href="images/favicon.ico">	        
        <script type="text/javascript">
//    $('#act_start').timepicker();
//    $('#act_end').timepicker();
	</script>
<script>
        $(function() {
            //Datepicker
            $( "#date" ).datepicker({
                showOn: "both",
                buttonImage: "images/calendar.png",
                buttonImageOnly: true,
                changeMonth: true,
                changeYear: true,
                yearRange: "2010:2020",
                maxDate: '0',
                dateFormat: "yy-mm-dd"
            });
        });
    
function getSchedules(date){
    var date = $('#date').val();
//    alert(date);
    $.ajax({
        url: "../controller/ajaxfunctions.php",
            type: "POST",
            cache: false,
            async:false,
            data: {classes:true,date:date},
            success: function(theResponse){
//                alert(theResponse);
                if(theResponse != 'no records'){
                    
                               var classes = $.parseJSON(theResponse);
                               $('#view_classes').html('');
                               
                               $.each(classes,function(i,val){
                                   $('#view_classes').append("<tr><td><select name='status[]' style='width:80px;'><option value='1'>Done</option><option value='0'>Cancelled</option></select></td><td><input type='hidden' name='schedule[]' value="+val.schedule_id+"/>"+val.course_name+"</td><td><input type='hidden' name='teacher[]' value="+val.teacher_id+"/>"+val.title+" "+val.first_name+"&nbsp;"+val.last_name+"</td><td>"+val.start_time+"</td><td>"+val.end_time+"</td><td><input type='text' class='time start' id='act_start_"+val.schedule_id+"' name='act_start[]' style='width:100px;' /></td><td><input type='text' name='act_end[]' id='act_end_"+val.schedule_id+"' class='time end' style='width:100px;' /></td></tr>");
                                   $("#act_start_"+val.schedule_id).timepicker();
                                   $("#act_end_"+val.schedule_id).timepicker();
                               });
//                                save_btn
                            $("#save_btn").css('display', 'block');
                           }
                           else{
                               $('#view_classes').html("<tr><td colspan='6'>No records found</td></tr>");
                               $("#save_btn").css('display', 'none');
                           }
                
            }
    });
    
}

</script>

            <link rel="stylesheet" type="text/css" href="css/index.css" media="all">
            <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">
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
    <?php include 'common/coordinator_side_nav.php';?><!--/.well -->
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
                <li class="active"><a href="#manage">Lecture Log</a></li>
            </ul>
            
            <div id="myTabContent" class="tab-content">
            
                
            	<!------MANAGE PAYMENTS------->
                <div class="tab-pane active" id="manage">
                    <form class="form-horizontal" method="post" action="../controller/teacher.php" enctype="multipart/form-data">
    <fieldset>
        <div class="control-group">
            <label class="control-label">Date</label>
            <div class="controls">
                <input class="span6 typeahead" id="date" name="date" type="text"  onchange="getSchedules(this.value);"/>
            </div>
        </div>
          </fieldset>
                       
                    <center>
                   
                       
                            <div id="DataTables_Table_0_wrapper" role="grid">
    <table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
  <thead>
      <tr role="row">
          <th  style="width: 200px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting" >Status</th>
          <th  style="width: 200px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting" >Course</th>
          <th  style="width: 177px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting">Lecturer</th>
          <th  style="width: 350px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting" >Start Time</th>
          <th aria-label="Options: activate to sort column ascending" style="width: 350px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" >End Time</th>
          <th  style="width: 350px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting" >Actual Start</th>
          <th aria-label="Options: activate to sort column ascending" style="width: 350px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0">Actual End </th>
      </tr>  
  </thead>
   <tbody id="view_classes" aria-relevant="all" aria-live="polite" role="alert">
   </tbody>
  </table>
<table id="save_btn" style="display: none;">
    <tr>
        <td colspan="6" align="right" >
            <input type="hidden" name="action" value="add_lecture_log" />                        
            <button type="submit" name="studnet_list" class="btn btn-success">
                <i class="icon-pencil icon-white"></i> Save
            </button>  
        </td>
    </tr>   
</table>
</div>
</center>
</form>
        </div>
          </div>
                
                <!------CREATE NEW TEACHER------->
                <div class="tab-pane" id="create">
                	
                       </div>
            </div>
        
			
		</div>
	</div>
</div>

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