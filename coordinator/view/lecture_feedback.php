<?php 
session_start();
if(!empty($_SESSION['cur_user']) && ($_SESSION['user_role']=='5'))
{
    require_once '../model/teacher.php';
    require_once '../model/schedule.php';
    require_once '../model/course.php';
//    $lecturer = $_SESSION['user_id'];
    $obj_teachers = new Teachers();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">
	<title>Teacher list | KEY - Institute Management System</title>
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
         @import "css/pepper-grinder/jquery-ui-1.10.3.custom.css";
        </style>
	<script src="js/jquery-1.7.2.min.js"></script>       
        <script>
            $(document).ready(function() {
//                alert("test");
                var test = $('#lecturer_id').val();
                var test2 = $('#lecturer_feedback_id').val();
                getCourseByLecturer(test);
                if(test2)
                    {
                        getCourseByLecturerFeedback(test2);
                    }
                
            });
        </script>
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
        <link rel="shortcut icon" href="images/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="css/teachers.css" media="all" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">
<script type="text/javascript">    
$(function() {
    $( "#start_date" ).datepicker({
        showOn: "both",
      defaultDate: "null",
      changeMonth: true,
      numberOfMonths: 1,
      buttonImage: "images/calendar.png",
      buttonImageOnly: true,
      dateFormat: "yy-mm-dd",
      onClose: function( selectedDate ) {
        $( "#end_date" ).datepicker( "option", "minDate", selectedDate );
      }
    });
     $( "#end_date" ).datepicker({
         showOn: "both",
      defaultDate: "null",
      buttonImage: "images/calendar.png",
      buttonImageOnly: true,
      changeMonth: true,
      numberOfMonths: 1,
      dateFormat: "yy-mm-dd",
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
    });
                    </script>
<script type="text/javascript">
            //Datepicker
     $(function() {
    $( "#from" ).datepicker({
        showOn: "both",
      defaultDate: "null",
      changeMonth: true,
      numberOfMonths: 1,
      buttonImage: "images/calendar.png",
      buttonImageOnly: true,
      dateFormat: "yy-mm-dd",
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
     $( "#to" ).datepicker({
         showOn: "both",
      defaultDate: "null",
      buttonImage: "images/calendar.png",
      buttonImageOnly: true,
      changeMonth: true,
      numberOfMonths: 1,
      dateFormat: "yy-mm-dd",
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
    });
    
function getCourseByLecturer(teacher_id)
            {
            var teacher_id = teacher_id;
            $.ajax({
            url: "../controller/ajaxfunctions.php",
            type: "POST",
            cache: false,
            async:false,
            data: {get_subs_by_lect:true,teacher:teacher_id},
            success: function(theResponse){ 
                if(theResponse != 'no records')
                {
                    $('#course').html('');
                    var selected_course = $('#course_id').val();
                    var assignment = $.parseJSON(theResponse);
                    $.each(assignment, function(i, val) {
                     if(selected_course == val.course_id)
                         {
                            $('#course').append("<option id='"+val.course_id+"' value='"+val.course_id+"' selected>"+val.course_category_name+" - "+val.course_name+"</option>");
                         }
                         else
                         {
                            $('#course').append("<option id='"+val.course_id+"' value='"+val.course_id+"'>"+val.course_category_name+" - "+val.course_name+"</option>");
                         }
                    });                    
                }
            }
        });
}
function getCourseByLecturerFeedback(teacher_id)
            {
            var teacher_id = teacher_id;
            $.ajax({
            url: "../controller/ajaxfunctions.php",
            type: "POST",
            cache: false,
            async:false,
            data: {get_subs_by_lect:true,teacher:teacher_id},
            success: function(theResponse){ 
                if(theResponse != 'no records')
                {
                    $('#course_feedback').html('');
                    var selected_course = $('#coures_feedback_id').val();
                    var assignment = $.parseJSON(theResponse);
                    $.each(assignment, function(i, val) {
                     if(selected_course == val.course_id)
                         {
                            $('#course_feedback').append("<option id='"+val.course_id+"' value='"+val.course_id+"' selected>"+val.course_category_name+" - "+val.course_name+"</option>");
                         }
                         else
                         {
                            $('#course_feedback').append("<option id='"+val.course_id+"' value='"+val.course_id+"'>"+val.course_category_name+" - "+val.course_name+"</option>");
                         }
                    });                    
                }
            }
        });
}
    
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
                <?php   include 'common/coordinator_side_nav.php';?><!--/.well -->
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
        	<!-----CUSTOM MESSAGE------>
        	
                        <!-----CUSTOM MESSAGE------>
            
        	<!----TAB UI FOR TEACHERS-->
            <ul class="nav nav-tabs" id="myTab">
            	                
            	                
                <li class="active"><a href="#manage">Lecture Summery</a></li>
                
                <li><a href="#create"> Lecturer Evaluation</a></li>
            </ul>
            
            
            <div id="myTabContent" class="tab-content">
            
            	
                
            	<!------MANAGE TEACHERS------->
                <div class="tab-pane active" id="manage">
                    <form action="#" class="form-horizontal" method="post">
            <fieldset style="width: 400px">
            <legend><i class="icon32 icon-gear"></i>Lecture Summery Details</legend>
            <div class="control-group">
            <label class="control-label" for="typeahead">Start Date</label>
            <div class="controls">
            <input type="text"  value="<?php if(isset($_POST['start_date'])){echo $_POST['start_date'];} ?>" name="start_date" id="start_date"  />
                <br/>
            </div>
        </div>
            <div class="control-group">
            <label class="control-label" for="typeahead">End Date</label>
            <div class="controls">
            <input type="text" value="<?php if(isset($_POST['end_date'])){echo $_POST['end_date'];} ?>" name="end_date" id="end_date"  />
                <br/>
            </div>
        </div>
            <div class="control-group">
            <label class="control-label" for="typeahead">Lecturer</label>
            <div class="controls">
                <select name="lecturer_id" onchange="getCourseByLecturer(this.value);" id="lecturer_id">
                <option></option>
              <?php               
              $objct_lecturer = new Teachers();
              $result = $objct_lecturer->get_all_teachers();
             while($row = mysql_fetch_array($result)) {              
              ?>                  
                <option <?php if( isset($_POST['lecturer_id']) &&  $_POST['lecturer_id'] == $row['teacher_id']){ echo 'selected';} ?> value="<?php echo $row['teacher_id'];?>"><?php echo $row['first_name']." ".$row['last_name']; ?></option>
                <?php } ?>  
                </select>
            </div>
            </div>
            <div class="control-group">
            <label class="control-label" for="typeahead">Course</label>
            <div class="controls">
            <select name="course" id="course">
                <option></option>               
                </select>
            </div>
            </div>   
                <br/>
            <div style="float:right">
                <input type="hidden" name="coures_id" id="course_id" value="<?php if(isset($_POST['course'])){ echo $_POST['course'];}?>"/>
                <input type="hidden" name="action" value="get_lecture_hours"/>
                <button type="submit" class="btn btn-info" ><i class="icon-zoom-in icon-white"></i> Browse</button>
            </div>
            
        </fieldset>
</form>
<?php if(isset($_POST['action']) && $_POST['action']=="get_lecture_hours"){
    $start = $_POST['start_date'];
    $end = $_POST['end_date'];
    $course = $_POST['course'];  
    $lecturer_id = $_POST['lecturer_id'];
    $summery_result = $obj_teachers->getLecturerHoursSummery($lecturer_id, $start, $end, $course);
    $done_hours = 0;
    $expected_hours = 0;
    $total_class = 0;
    $classes_done = 0;
    while ($row1 = mysql_fetch_array($summery_result)) {
        if($row1['timediff'])
        {
//            $time = date("i", strtotime($row1['timediff']));
            $expected_hours += $row1['timediff'];
        }
        $done_hours += $row1['total_hours'];
        $total_class += $row1['total'];
        $classes_done += $row1['status'];
    }
    $obj_course = new Course();
    $subject = $obj_course->getCoursesById($course);
?>                  
<center>                    
<div class="dataTables_wrapper" role="grid" style="width: 60%;">
    
   
    <table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
    <caption><b>Summery Table for <?php echo $subject['course_category_name']." - ".$subject['course_name']; ?> <br/>between <?php if(isset($_POST['start_date'])){echo $_POST['start_date'];} ?> and <?php if(isset($_POST['end_date'])){echo $_POST['end_date'];} ?> </b></caption>
    <thead style="display: none;">
    <tr>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody id="lecture_hours_tbl" aria-relevant="all" aria-live="polite" role="alert">
    <tr>
    <td>Total Number of Classes Expected</td>
    <td><?php echo $total_class;?></td>
    </tr>
    <tr>
    <td>Total Number of Classes Conducted</td>
    <td><?php echo $classes_done;?></td>
    </tr>
    <tr>
    <td>Total Number of Hours Expected</td>
    <td><?php echo $expected_hours." hours";?></td>
    </tr>
    <tr>
    <td>Total Number of Hours Covered</td>
    <td><?php echo $done_hours." hours";?></td>
    </tr>
</tbody>
</table>
</div>
</center>
                    <?php } ?>
                   
    <br/><br/>
    </div>
                
                <!------CREATE NEW LESSON------->
                <div class="tab-pane" id="create">
                    <form action="" method="post" class="form-horizontal">
                            <fieldset style="width: 400px">
            <legend><i class="icon32 icon-gear"></i>Student Feedback Ratings</legend> 
            <div class="control-group">
            <label class="control-label" for="typeahead">Start Date</label>
            <div class="controls">
            <input type="text" value="<?php if(isset($_POST['feedback_start_date'])){echo $_POST['feedback_start_date'];} ?>" name="feedback_start_date" id="from"  />
                <br/>
            </div>
            </div>
            <div class="control-group">
            <label class="control-label" for="typeahead">End Date</label>
            <div class="controls">
                <input type="text" value="<?php if(isset($_POST['feedback_end_date'])){echo $_POST['feedback_end_date'];} ?>" name="feedback_end_date" id="to"  />
            </div>
        </div>
            <div class="control-group">
            <label class="control-label" for="typeahead">Course</label>
            <div class="controls">
            <select name="lecturer_feedback_id" onchange="getCourseByLecturerFeedback(this.value);" id="lecturer_feedback_id">
                <option></option>
              <?php               
              $objct_lecturer = new Teachers();
              $result = $objct_lecturer->get_all_teachers();
             while($row = mysql_fetch_array($result)) {              
              ?>                  
                <option <?php if( isset($_POST['lecturer_feedback_id']) &&  $_POST['lecturer_feedback_id'] == $row['teacher_id']){ echo 'selected';} ?> value="<?php echo $row['teacher_id'];?>"><?php echo $row['first_name']." ".$row['last_name']; ?></option>
                <?php } ?>  
                </select>
            </div>
            </div>
            <div class="control-group">
            <label class="control-label" for="typeahead">Course</label>
            <div class="controls">
            <select name="course_feedback" id="course_feedback">
                <option></option>               
                </select>
            </div>
            </div> 
                <div style="float:right">
                <input type="hidden" name="coures_feedback_id" id="coures_feedback_id" value="<?php if(isset($_POST['course_feedback'])){ echo $_POST['course_feedback'];}?>"/>
                <input type="hidden" name="action" value="get_feedback_details"/>
                <button type="submit" class="btn btn-info" ><i class="icon-zoom-in icon-white"></i> Browse</button>
            </div>
            <div class="center">
            
            </div>
        </fieldset>
</form>
                    <br/>                        
                    <br/>
        <?php 
        if(isset($_POST['action']) && $_POST['action']=="get_feedback_details"){
        $load_feedback = "true";
        $feedback_start = $_POST['feedback_start_date'];
        $feedback_end = $_POST['feedback_end_date'];
        $course_id = $_POST['course_feedback'];
        $feedback_res = $obj_teachers->getLecturerFeedbackRating($feedback_start,$feedback_end,$course_id);
        $feedback_course = $obj_teachers->getCourseFeedbackRating($feedback_start,$feedback_end,$course_id);
        $obj_course = new Course();
        $subject = $obj_course->getCoursesById($course_id);

?>
<center>
<div class="dataTables_wrapper" role="grid" style="width: 70%;">
    <table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
        <caption><b>Student Feedback Ratings Table for <?php echo $subject['course_category_name']." - ".$subject['course_name']; ?> <br/>between <?php if(isset($_POST['feedback_start_date'])){echo $_POST['feedback_start_date'];} ?> and <?php if(isset($_POST['feedback_end_date'])){echo $_POST['feedback_end_date'];} ?> </b></caption>
    <thead>
      <tr role="row">
          <th>&nbsp;</th>
          <th>Results</th>
          <th>Ratings</th>
      </tr>
  </thead>    
<tbody aria-relevant="all" aria-live="polite" role="alert">
    <?php if($feedback_course['total'] != 0)
    {
        ?>
      <tr class="odd">
          <td>Could you get clear answers to your questions from the instructor?</td>
          <td><?php echo $feedback_res['question_one']." / ".$feedback_res['total']; ?></td>
          <td>
              <?php                                        
              $feedback_avg = (($feedback_res['question_one'] / $feedback_res['total']) * 5);
                      //echo $understanding_avg;
                      $quality_stat = $feedback_avg;
                      if ($quality_stat >= 4.5) {
                          $rating = " Excellent";
                      } elseif ($quality_stat >= 3.5) {
                          $rating = " Satisfactory";
                      } elseif ($quality_stat >= 2.5) {
                          $rating = " Average";
                      } elseif ($quality_stat >= 1.5) {
                          $rating = " Unsatisfactory";
                      } elseif ($quality_stat >= 0) {
                          $rating = " Very poor";
                      }
                      for ($i = 1; $i <= 5; $i++) {
                          if ($quality_stat >= 1) {
                              echo "<img src=\"../../store/stars/star-01.png\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat >= 0.5) {
                              echo "<img src=\"../../store/stars/star3.gif\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat < 0.5 && $quality_stat > 0) {
                              echo "<img src=\"../../store/stars/star-03.png\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat <= 0) {
                              echo "<img src=\"../../store/stars/star-03.png\" align=absmiddle alt='star rating'>";
                          }
                      }
                      echo $rating;
                      ?>
          </td>
    </tr>
    <tr>
          <td>Was the instructor considerate to you?</td>
          <td><?php echo $feedback_res['question_two']." / ".$feedback_res['total']; ?></td>
          <td>
              <?php                                        
              $feedback_avg = (($feedback_res['question_two'] / $feedback_res['total']) * 5);
                      //echo $understanding_avg;
                      $quality_stat = $feedback_avg;
                      if ($quality_stat >= 4.5) {
                          $rating = " Excellent";
                      } elseif ($quality_stat >= 3.5) {
                          $rating = " Satisfactory";
                      } elseif ($quality_stat >= 2.5) {
                          $rating = " Average";
                      } elseif ($quality_stat >= 1.5) {
                          $rating = " Unsatisfactory";
                      } elseif ($quality_stat >= 0) {
                          $rating = " Very poor";
                      }
                      for ($i = 1; $i <= 5; $i++) {
                          if ($quality_stat >= 1) {
                              echo "<img src=\"../../store/stars/star-01.png\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat >= 0.5) {
                              echo "<img src=\"../../store/stars/star3.gif\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat < 0.5 && $quality_stat > 0) {
                              echo "<img src=\"../../store/stars/star-03.png\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat <= 0) {
                              echo "<img src=\"../../store/stars/star-03.png\" align=absmiddle alt='star rating'>";
                          }
                      }
                      echo $rating;
                      ?>
          </td>
    </tr>
      <tr>
          <td>Was the instructor effective in teaching in the course?</td>
          <td><?php echo $feedback_res['question_three']." / ".$feedback_res['total']; ?></td>
          <td>
              <?php                                        
              $feedback_avg = (($feedback_res['question_three'] / $feedback_res['total']) * 5);
                      //echo $understanding_avg;
                      $quality_stat = $feedback_avg;
                      if ($quality_stat >= 4.5) {
                          $rating = " Excellent";
                      } elseif ($quality_stat >= 3.5) {
                          $rating = " Satisfactory";
                      } elseif ($quality_stat >= 2.5) {
                          $rating = " Average";
                      } elseif ($quality_stat >= 1.5) {
                          $rating = " Unsatisfactory";
                      } elseif ($quality_stat >= 0) {
                          $rating = " Very poor";
                      }
                      for ($i = 1; $i <= 5; $i++) {
                          if ($quality_stat >= 1) {
                              echo "<img src=\"../../store/stars/star-01.png\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat >= 0.5) {
                              echo "<img src=\"../../store/stars/star3.gif\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat < 0.5 && $quality_stat > 0) {
                              echo "<img src=\"../../store/stars/star-03.png\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat <= 0) {
                              echo "<img src=\"../../store/stars/star-03.png\" align=absmiddle alt='star rating'>";
                          }
                      }
                      echo $rating;
                      ?>
          </td>
    </tr>
      <tr>
          <td>Was the instructor enthusiastic about the course?</td>
          <td><?php echo $feedback_res['question_four']." / ".$feedback_res['total']; ?></td>
          <td>
              <?php                                        
              $feedback_avg = (($feedback_res['question_four'] / $feedback_res['total']) * 5);
                      //echo $understanding_avg;
                      $quality_stat = $feedback_avg;
                      if ($quality_stat >= 4.5) {
                          $rating = " Excellent";
                      } elseif ($quality_stat >= 3.5) {
                          $rating = " Satisfactory";
                      } elseif ($quality_stat >= 2.5) {
                          $rating = " Average";
                      } elseif ($quality_stat >= 1.5) {
                          $rating = " Unsatisfactory";
                      } elseif ($quality_stat >= 0) {
                          $rating = " Very poor";
                      }
                      for ($i = 1; $i <= 5; $i++) {
                          if ($quality_stat >= 1) {
                              echo "<img src=\"../../store/stars/star-01.png\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat >= 0.5) {
                              echo "<img src=\"../../store/stars/star3.gif\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat < 0.5 && $quality_stat > 0) {
                              echo "<img src=\"../../store/stars/star-03.png\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat <= 0) {
                              echo "<img src=\"../../store/stars/star-03.png\" align=absmiddle alt='star rating'>";
                          }
                      }
                      echo $rating;
                      ?>
          </td>
    </tr>
      <tr>
          <td>What overall rating would you give the instructor?</td>
          <td><?php echo $feedback_res['question_five']." / ".$feedback_res['total']; ?></td>
          <td>
              <?php                                        
              $feedback_avg = (($feedback_res['question_five'] / $feedback_res['total']) * 5);
                      //echo $understanding_avg;
                      $quality_stat = $feedback_avg;
                      if ($quality_stat >= 4.5) {
                          $rating = " Excellent";
                      } elseif ($quality_stat >= 3.5) {
                          $rating = " Satisfactory";
                      } elseif ($quality_stat >= 2.5) {
                          $rating = " Average";
                      } elseif ($quality_stat >= 1.5) {
                          $rating = " Unsatisfactory";
                      } elseif ($quality_stat >= 0) {
                          $rating = " Very poor";
                      }
                      for ($i = 1; $i <= 5; $i++) {
                          if ($quality_stat >= 1) {
                              echo "<img src=\"../../store/stars/star-01.png\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat >= 0.5) {
                              echo "<img src=\"../../store/stars/star3.gif\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat < 0.5 && $quality_stat > 0) {
                              echo "<img src=\"../../store/stars/star-03.png\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat <= 0) {
                              echo "<img src=\"../../store/stars/star-03.png\" align=absmiddle alt='star rating'>";
                          }
                      }
                      echo $rating;
                      ?>
          </td>
    </tr>      
<?php     
        }
?>
</tbody>
</table>
</div>
    <br/>
<div class="dataTables_wrapper" role="grid" style="width: 70%;">
    <table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
        <caption><b>Course Feedback Ratings Table for <?php echo $subject['course_category_name']." - ".$subject['course_name']; ?> <br/>between <?php if(isset($_POST['feedback_start_date'])){echo $_POST['feedback_start_date'];} ?> and <?php if(isset($_POST['feedback_end_date'])){echo $_POST['feedback_end_date'];} ?> </b></caption>
    <thead>
      <tr role="row">
          <th>&nbsp;</th>
          <th>Results</th>
          <th>Ratings</th>
      </tr>
  </thead>    
<tbody aria-relevant="all" aria-live="polite" role="alert">
    <?php if($feedback_course['total'] != 0)
    {
        ?>
      <tr class="odd">
          <td>The course objectives where clear</td>
          <td><?php echo $feedback_course['question_one']." / ".$feedback_course['total']; ?></td>
          <td>
              <?php                                        
              $feedback_avg = (($feedback_course['question_one'] / $feedback_course['total']) * 5);
                      //echo $understanding_avg;
                      $quality_stat = $feedback_avg;
                      if ($quality_stat >= 4.5) {
                          $rating = " Excellent";
                      } elseif ($quality_stat >= 3.5) {
                          $rating = " Satisfactory";
                      } elseif ($quality_stat >= 2.5) {
                          $rating = " Average";
                      } elseif ($quality_stat >= 1.5) {
                          $rating = " Unsatisfactory";
                      } elseif ($quality_stat >= 0) {
                          $rating = " Very poor";
                      }
                      for ($i = 1; $i <= 5; $i++) {
                          if ($quality_stat >= 1) {
                              echo "<img src=\"../../store/stars/star-01.png\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat >= 0.5) {
                              echo "<img src=\"../../store/stars/star3.gif\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat < 0.5 && $quality_stat > 0) {
                              echo "<img src=\"../../store/stars/star-03.png\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat <= 0) {
                              echo "<img src=\"../../store/stars/star-03.png\" align=absmiddle alt='star rating'>";
                          }
                      }
                      echo $rating;
                      ?>
          </td>
    </tr>
    <tr>
          <td>The course procedures and assignments support course objectives</td>
          <td><?php echo $feedback_course['question_two']." / ".$feedback_course['total']; ?></td>
          <td>
              <?php                                        
              $feedback_avg = (($feedback_course['question_two'] / $feedback_course['total']) * 5);
                      //echo $understanding_avg;
                      $quality_stat = $feedback_avg;
                      if ($quality_stat >= 4.5) {
                          $rating = " Excellent";
                      } elseif ($quality_stat >= 3.5) {
                          $rating = " Satisfactory";
                      } elseif ($quality_stat >= 2.5) {
                          $rating = " Average";
                      } elseif ($quality_stat >= 1.5) {
                          $rating = " Unsatisfactory";
                      } elseif ($quality_stat >= 0) {
                          $rating = " Very poor";
                      }
                      for ($i = 1; $i <= 5; $i++) {
                          if ($quality_stat >= 1) {
                              echo "<img src=\"../../store/stars/star-01.png\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat >= 0.5) {
                              echo "<img src=\"../../store/stars/star3.gif\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat < 0.5 && $quality_stat > 0) {
                              echo "<img src=\"../../store/stars/star-03.png\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat <= 0) {
                              echo "<img src=\"../../store/stars/star-03.png\" align=absmiddle alt='star rating'>";
                          }
                      }
                      echo $rating;
                      ?>
          </td>
    </tr>
      <tr>
          <td>The amount of reading you were asked to do was appropriate</td>
          <td><?php echo $feedback_course['question_three']." / ".$feedback_course['total']; ?></td>
          <td>
              <?php                                        
              $feedback_avg = (($feedback_course['question_three'] / $feedback_course['total']) * 5);
                      //echo $understanding_avg;
                      $quality_stat = $feedback_avg;
                      if ($quality_stat >= 4.5) {
                          $rating = " Excellent";
                      } elseif ($quality_stat >= 3.5) {
                          $rating = " Satisfactory";
                      } elseif ($quality_stat >= 2.5) {
                          $rating = " Average";
                      } elseif ($quality_stat >= 1.5) {
                          $rating = " Unsatisfactory";
                      } elseif ($quality_stat >= 0) {
                          $rating = " Very poor";
                      }
                      for ($i = 1; $i <= 5; $i++) {
                          if ($quality_stat >= 1) {
                              echo "<img src=\"../../store/stars/star-01.png\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat >= 0.5) {
                              echo "<img src=\"../../store/stars/star3.gif\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat < 0.5 && $quality_stat > 0) {
                              echo "<img src=\"../../store/stars/star-03.png\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat <= 0) {
                              echo "<img src=\"../../store/stars/star-03.png\" align=absmiddle alt='star rating'>";
                          }
                      }
                      echo $rating;
                      ?>
          </td>
    </tr>
      <tr>
          <td>The amount of writing or other class work you were asked to do was enough</td>
          <td><?php echo $feedback_res['question_four']." / ".$feedback_res['total']; ?></td>
          <td>
              <?php                                        
              $feedback_avg = (($feedback_course['question_four'] / $feedback_course['total']) * 5);
                      //echo $understanding_avg;
                      $quality_stat = $feedback_avg;
                      if ($quality_stat >= 4.5) {
                          $rating = " Excellent";
                      } elseif ($quality_stat >= 3.5) {
                          $rating = " Satisfactory";
                      } elseif ($quality_stat >= 2.5) {
                          $rating = " Average";
                      } elseif ($quality_stat >= 1.5) {
                          $rating = " Unsatisfactory";
                      } elseif ($quality_stat >= 0) {
                          $rating = " Very poor";
                      }
                      for ($i = 1; $i <= 5; $i++) {
                          if ($quality_stat >= 1) {
                              echo "<img src=\"../../store/stars/star-01.png\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat >= 0.5) {
                              echo "<img src=\"../../store/stars/star3.gif\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat < 0.5 && $quality_stat > 0) {
                              echo "<img src=\"../../store/stars/star-03.png\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat <= 0) {
                              echo "<img src=\"../../store/stars/star-03.png\" align=absmiddle alt='star rating'>";
                          }
                      }
                      echo $rating;
                      ?>
          </td>
    </tr>
      <tr>
          <td>What overall rating would you give the course?</td>
          <td><?php echo $feedback_course['question_five']." / ".$feedback_course['total']; ?></td>
          <td>
              <?php                                        
              $feedback_avg = (($feedback_course['question_five'] / $feedback_course['total']) * 5);
                      //echo $understanding_avg;
                      $quality_stat = $feedback_avg;
                      if ($quality_stat >= 4.5) {
                          $rating = " Excellent";
                      } elseif ($quality_stat >= 3.5) {
                          $rating = " Satisfactory";
                      } elseif ($quality_stat >= 2.5) {
                          $rating = " Average";
                      } elseif ($quality_stat >= 1.5) {
                          $rating = " Unsatisfactory";
                      } elseif ($quality_stat >= 0) {
                          $rating = " Very poor";
                      }
                      for ($i = 1; $i <= 5; $i++) {
                          if ($quality_stat >= 1) {
                              echo "<img src=\"../../store/stars/star-01.png\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat >= 0.5) {
                              echo "<img src=\"../../store/stars/star3.gif\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat < 0.5 && $quality_stat > 0) {
                              echo "<img src=\"../../store/stars/star-03.png\" align=absmiddle alt='star rating'>";
                              $quality_stat = $quality_stat - 1;
                          } else if ($quality_stat <= 0) {
                              echo "<img src=\"../../store/stars/star-03.png\" align=absmiddle alt='star rating'>";
                          }
                      }
                      echo $rating;
                      ?>
          </td>
    </tr>      
    <?php     
        }
?>
</tbody>
    </table>
</div>
</center>
<?php     
        }
?>                       </div>
            </div>
        
			
		</div>
	</div>
</div>
    <!-- content ends -->
				</div><!--/#content.span10-->
			</div><!--/fluid-row-->
<?php
    if(isset($load_feedback) && $load_feedback == 'true')
    {
        ?>
         <script type="text/javascript">
                setTimeout(function() {
      // Do something after 5 seconds
                $('ul#myTab li:first').removeClass('active');
                $('ul#myTab li:first-child').next().addClass('active');
                $('#manage').removeClass('active');
                $('#create').addClass('active');
            }, 100);
            </script>                  
<?php        
    }
?>
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