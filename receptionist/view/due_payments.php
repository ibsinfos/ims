<?php 
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='2'))
{
    require_once '../model/course.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Due Payments | KEY - Institute Management System</title>
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
	<style type="text/css" title="style">        
         @import "css/pepper-grinder/jquery-ui-1.10.3.custom.css";
        </style>	

            <link rel="stylesheet" type="text/css" href="css/student.css" media="all">
                <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">
                    <script type="text/javascript">
            $(function() {
    $( "#from" ).datepicker({
        showOn: "both",
      changeMonth: true,
      numberOfMonths: 1,
      buttonImage: "images/calendar.png",
      buttonImageOnly: true,
      dateFormat: "yy-mm-dd",
      onSelect: function(dateText, inst) {
                var someDate = new Date(dateText);
                var numberOfDaysToAdd = 30;
                someDate.setDate(someDate.getDate() + numberOfDaysToAdd); 
            $('#to').datepicker('option', 'minDate', someDate);}
    });
     $( "#to" ).datepicker({
         showOn: "both",
      buttonImage: "images/calendar.png",
      buttonImageOnly: true,
      changeMonth: true,
      numberOfMonths: 1,
      dateFormat: "yy-mm-dd",
      onSelect: function(dateText, inst) {                                
            var someDate = new Date(dateText);
            var numberOfDaysToAdd = 30;
            someDate.setDate(someDate.getDate() - numberOfDaysToAdd);
        $('#from').datepicker('option', 'maxDate', someDate);}
    });
    });
        </script>
                    <script type="text/javascript">
                        function getDuePayments(course){
                         var start= $('#from').val();
                         var end = $('#to').val();
                         var course = $('#course').val();
                         $('#notifications').show(100, 0);
                                                  
                         $.ajax({
                        url: "../controller/ajaxfunctions.php",
                        type: "POST",
                        cache: false,
                        async:false,
                        data: {due_payment:true,course:course,start:start,end:end},
                        success: function(theResponse){
//                            alert(theResponse);
                            var student_list = $.parseJSON(theResponse);
                            if(student_list != 'no records')
                                {
                                    $('#student_list').html('');
                                    $.each(student_list, function(i, val) {
                                        if ( ( 'notification_type' in val ) ) {
                                        if(val.notification_type != '')
                                            {
                                                if(val.notification_type == 'sms')
                                                    {
                                                        $('#student_list').append("<tr><td><input type='checkbox' value='"+val.student_id+"' name='send_notification[]'/></td><td>"+val.stu_admission_no+" - "+val.student_name+"</td><td>"+val.status+"</td><td>"+val.due_fee+".00</td><td>SENT</td><td></td></tr>");
                                                    }
                                                    else if(val.notification_type == 'email')
                                                    {                                                        
                                                        $('#student_list').append("<tr><td><input type='checkbox' value='"+val.student_id+"' name='send_notification[]'/></td><td>"+val.stu_admission_no+" - "+val.student_name+"</td><td>"+val.status+"</td><td>"+val.due_fee+".00</td><td></td><td>SENT</td></tr>");
                                                    }
                                                    else if(val.notification_type == 'both')
                                                    {
                                                        $('#student_list').append("<tr><td><input type='checkbox' value='"+val.student_id+"' name='send_notification[]'/></td><td>"+val.stu_admission_no+" - "+val.student_name+"</td><td>"+val.status+"</td><td>"+val.due_fee+".00</td><td>SENT</td><td>SENT</td></tr>");
                                                    }
                                            }
                                        }
                                        else
                                        {
                                            $('#student_list').append("<tr><td><input type='checkbox' value='"+val.student_id+"' name='send_notification[]'/></td><td>"+val.stu_admission_no+" - "+val.student_name+"</td><td>"+val.status+"</td><td>"+val.due_fee+".00</td><td></td><td></td></tr>");
                                        }
                                            
                                    });
                                    $('#send_btn').css('display','block');                                    
                                }
                                checkAllCheckBoxes();
                                getCourseDetails(course);
                        }
                    });

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
                <li class="active"><a href="#manage">Due Payments</a></li>
            </ul>
            
            <div id="myTabContent" class="tab-content">
            
                
            	<!------MANAGE PAYMENTS------->
                <div class="tab-pane active" id="manage">
    <fieldset>
        <form id="notifications_form" class="form-horizontal" method="post" action="../controller/notification.php" enctype="multipart/form-data">
        <div>
           <label class="control-label" for="typeahead">From </label>   
                <div class="controls" style="width: 200px;">
                <input  class="span7 typeahead" name="start_date" type="text" width="150px" id="from"/>                    
            </div>
               <label class="control-label" for="typeahead">To </label>  
                <div class="controls" style="width: 200px;" >
                <input value="" class="span7 typeahead" name="end_date" width="150px" id="to" type="text"/></div>
        
               <div class="control-group">
                <label class="control-label" for="typeahead">Grade </label>
            <div class="controls">
                <select id="course" name="course" style="width: 160px;" onchange="getDuePayments(this.value);">
                    <option></option>
                    <?php
                    $obj = new Course();
                    $res = $obj->getCourses();
                    while ($row = mysql_fetch_array($res)){
                    ?>
                    <optgroup label="<?php echo $row['course_category_name'];?>"><option value="<?php echo $row['course_id'];?>"><?php echo $row['course_name'];?></option></optgroup>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
               <div id="notifications" style="display: none;">                   
                   <table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="table table-bordered">
                       <thead>
                        <tr>
                            <th aria-label="Name: activate to sort column ascending" colspan="1" rowspan="2" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting"><input type='checkbox' onchange="checkBoxCheck(this);" checked id="check_all" name='all_checked_sms'/></th>
                            <th aria-label="Name: activate to sort column ascending" colspan="1" rowspan="2" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting">Name</th>
                            <th aria-label="Email: activate to sort column ascending" colspan="1" rowspan="2" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting">Payment</th>
                            <th aria-label="Email: activate to sort column ascending" colspan="1" rowspan="2" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting">Due Amount</th>
                            <th aria-label="Email: activate to sort column ascending" style="padding-left: 5%;" colspan="2" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting">Notification</th>
                        </tr>
                           <tr>
                            <th aria-label="Email: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting">SMS</th>                               
                            <th aria-label="Email: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting">EMAIL</th>                               
                           </tr>
                       </thead>
                       <tbody id="student_list" aria-relevant="all" aria-live="polite" role="alert" >
                           
                       </tbody>
                   </table>                                       
               <table id="send_btn" style="display:none;">
                   <tr>
                       <td colspan="3">
                           <input type="hidden" name="course_and_cat" id="course_and_cat" value="" />
                           <a onclick="return popupbox();" ><button type="button" name="test" value="Send_SMS" class="btn btn-success">Send SMS</button></a>
                           <button type="submit" name="action" value="Send_EMAIL" class="btn btn-primary">Send EMAIL</button>
                       </td>                       
                   </tr>
               </table>
                       <div id="popup_div" style="display: none;">
                           <script type="text/javascript">
                               setTimeout(function(){  
                                   var textbox = $('textarea');
                                   textbox.prop("selectionStart", textbox.val().length) // set caret to length (end)
                                       .focus();    
                               },100);
                           </script>
                               <table>
                                   <tr>
                                       <td>Enter the message:</td>
                                       <td></td>
                                   </tr>
                                   <tr>
                                       <td>Message</td>
                                       <td>
                                           <textarea id="text_fld" onkeyup="getTextCounter(this);" rows="4" cols="40" rows=4 cols=40 name='message'></textarea>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td colspan="2" align="right">
                                           <span id="letterCount"></span>                                           
                                       </td>
                                   </tr>
                                   <tr>
                                       <td colspan="2">
                                           <button name="action" value="Send_SMS" onclick="submitForm();" class="btn btn-primary">Send SMS</button>
                                       </td>
                                   </tr>                                   
                               </table>                           
                           </div>
            
               </div>
        </form>
    </fieldset>     
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

<script type="text/javascript">
function checkBoxCheck()
{
    if($('#check_all').is(':checked')) {
        checkAllCheckBoxes();
    } else {
        unCheckAllCheckBoxes();
    }
}
function checkAllCheckBoxes()
{
    $('tbody  :input:checkbox').attr('readonly', 'readonly');
    $('tbody  :input:checkbox').attr('checked', true);
}
function unCheckAllCheckBoxes()
{
    $('tbody  :input:checkbox').removeAttr('readonly');
    $('tbody  :input:checkbox').attr('checked', false);
}
function getCourseDetails(course_id)
{
                        $.ajax({
                        url: "../controller/ajaxfunctions.php",
                        type: "POST",
                        cache: false,
                        async:false,
                        data: {due_paymentcourse:true,course:course_id},
                        success: function(theResponse){
                            var student_list = $.parseJSON(theResponse);
                            if(student_list != 'no records')
                                {
                                    $('#course_and_cat').val('');
                                    $.each(student_list, function(i, val) {
//                                        $('#student_list').append("<tr><td><input type='checkbox' value='"+val.student_id+"' name='send_notification[]'/></td><td>"+val.stu_admission_no+" - "+val.student_name+"</td><td>"+val.status+"</td><td>"+val.due_fee+".00</td></tr>");                                
                                          $('#course_and_cat').val(val.course_category_name +" - "+val.course_name);
                                    });
                                    }
                        }
  });
}
function popupbox()
{
    jQuery.facebox({ div:'#popup_div'});
//    $('#popup_div').show(100, 0);
}
var content = 0;

function getTextCounter(text)
{ 
    if(content !== $(text).val().length)
        {
            
            if($(text).val().length < 200)
                {
                    var message = $(text).val();                    
                    var letters_count = $(text).val().length;                    
                    $(text).val('');
                    $('#letterCount').text(letters_count+' / 200 ');
                    $('#text_fld').html(message);    
                    popupbox();
                    content = $(text).val().length;                    
                }
                else
                    {
                        alert("Maximum number of charachters exeeded");
                        $(text).val('');
                        $('#text_fld').html(message); 
                        popupbox();
                    }
        }
}
function submitForm()
    {
        $('<input>').attr({
            type: 'hidden',
            name: 'action',
            value: 'Send_SMS'
        }).appendTo('#notifications_form');
        $('#notifications_form').submit();
    }
</script>	
	
		


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