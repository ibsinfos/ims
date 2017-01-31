<?php 
ini_set("display_errors", 0);
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='3'))
{
    require_once '../model/student.php';
    $student = $_SESSION['user_id'];
    $object = new Students();
    $result = $object->getStudentId($student);
    $student_id = $result['student_id'];
    
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">
	<title>Payment Details | KEY - Institute Management System</title>
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


    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/student.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">
               <!-- jQuery -->
<script src="js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
<script src="js/bootstrap-transition.js"></script>
	<!-- library for advanced tooltip -->
<script src="js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
<script src="js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
<script src="js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
<script src="js/bootstrap-collapse.js"></script>
	<!-- notification plugin -->
<script src="js/jquery.noty.js"></script>
 <script src="js/bootstrap-dropdown.js"></script>
 <script src="js/charts/highcharts.js"></script>
<script src="js/charts/modules/data.js"></script>
<script src="js/charts/modules/exporting.js"></script>
<script src="js/charts/jquery.highchartTable.js" type="text/javascript"></script>
 <script type="text/javascript">
    $(document).ready(function() {
        $('table.highchart').highchartTable();
        $('table.highchart_pie').highchartTable();
        $('table.highchartTable_02')
  .bind('highchartTable.beforeRender', function(event, highChartConfig) {
    highChartConfig.colors = ['#104C8F', '#88FF00', '#228E8E', '#CCFFFF', '#00CCCC', '#3399CC'];
  })
  .highchartTable();
        $('table.highchartTable_02').highchartTable();
    });
 function getmonths(){
     var mode = $('#mode').val();
     if(mode=='monthly'){
          $("#months").css('display', 'block');
     }
     else{
          $("#months").css('display', 'none');
     }     
 }
 </script>

</head>
<body>
		<!-- topbar starts -->
<div class="navbar">
<div class="navbar-inner">
<?php include 'common/student_header.php';?>
</div>
	</div>
    <!-- topbar ends -->		
    <div class="container-fluid">
                    <div class="row-fluid">
				
<!-- left menu starts -->
<div class="span2 main-menu-span">
<?php include 'common/student_side_nav.php';?><!--/.well -->
</div> <!--/span-->
<!-- left menu ends -->                
                
                <div id="content" class="span10">
                <!-- content starts -->
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well">
            <div class="box-icon">
                
            </div>
		</div>
        
		<div class="box-content">
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane active" id="manage">
                   
                    <fieldset style="">
                        
            <form action="#" method="post">
                <center>
            Course:
            
                <select id="course" name="course">
                    <option></option>
            <?php   
            $student = $_SESSION['cur_user'];
                $result = $object->getCoursesByStudent($student);
                while ($row = mysql_fetch_array($result)) {
                    ?>                 
                    <option <?php if(isset($_POST['course']) && $_POST['course'] == $row['course_id'] ){ echo "selected";}  ?> value="<?php echo $row['course_id']; ?>"><?php echo $row['course_name']; ?></option>
                <?php } ?>                                                
                </select>
            <br/>
            Mode:
            &nbsp;&nbsp;<select id="mode" name="mode" onchange="getmonths();">
                <option></option>                
                <option <?php if(isset($_POST['mode']) && $_POST['mode'] == 'overall' ){ echo "selected";}  ?> value="overall">Overall</option>
                <option <?php if(isset($_POST['mode']) && $_POST['mode'] == 'monthly' ){ echo "selected";}  ?> value="monthly">Monthly</option>                
            </select>
            <?php if(isset($_POST['month']) && $_POST['mode'] != 'overall'){?>
            <div id="months" style="display: block;">
                <?php }
                else{ ?>
                <div id="months" style="display: none;">
                    <?php } ?>
                Month:&nbsp;
                <select id="months_ids" name="month">
                    <option></option>
                    <option <?php if(isset($_POST['month']) && $_POST['month'] == '1' ){ echo "selected";}  ?> value="1">January</option>
                    <option <?php if(isset($_POST['month']) && $_POST['month'] == '2' ){ echo "selected";}  ?> value="2">February</option>
                    <option <?php if(isset($_POST['month']) && $_POST['month'] == '3' ){ echo "selected";}  ?> value="3">March</option>
                    <option <?php if(isset($_POST['month']) && $_POST['month'] == '4' ){ echo "selected";}  ?> value="4">April</option>
                    <option <?php if(isset($_POST['month']) && $_POST['month'] == '5' ){ echo "selected";}  ?> value="5">May</option>
                    <option <?php if(isset($_POST['month']) && $_POST['month'] == '6' ){ echo "selected";}  ?> value="6">June</option>
                    <option <?php if(isset($_POST['month']) && $_POST['month'] == '7' ){ echo "selected";}  ?> value="7">July</option>
                    <option <?php if(isset($_POST['month']) && $_POST['month'] == '8' ){ echo "selected";}  ?> value="8">August</option>
                    <option <?php if(isset($_POST['month']) && $_POST['month'] == '9' ){ echo "selected";}  ?> value="9">September</option>
                    <option <?php if(isset($_POST['month']) && $_POST['month'] == '10' ){ echo "selected";}  ?> value="10">October</option>
                    <option <?php if(isset($_POST['month']) && $_POST['month'] == '11' ){ echo "selected";}  ?> value="11">November</option>
                    <option <?php if(isset($_POST['month']) && $_POST['month'] == '12' ){ echo "selected";}  ?> value="12">December</option>
                </select>
            </div>            
            <br/>
            <input type="hidden" value="view" name="action"/>
            <button type="submit" onclick="return checkValues();" value="" class="btn btn-primary">OK</button> 
                <span id="error_msg" style="color: red; display: none"></span>
                </center>
            </form>
            <?php
            if(isset($_POST['action']) && $_POST['action']== 'view'){
                $year = date('Y');
                
                $course = $_POST['course'];
                $mode = $_POST['mode'];
                $month = $_POST['month'];
                if($mode == 'overall'){                    
                    $overal = $object->getAllClasSchedulesInYear($year, $course);                    
                    $count = mysql_num_rows($overal);
                    
                    $attendance_result = $object->getAttendanceDates($student_id, $year, $course);
                    $present_count = mysql_num_rows($attendance_result);
               
                    $percentage = ($present_count/$count)*100;
                    
                
            ?>            
            
        </fieldset>
    <div style="width: 95%">
                <center>
            <?php 
                $overal_chart = $object->getAllClasSchedulesByMonth($year, $course, $student_id);
                $course_details = $object->getCoursesById($course);
            ?>
        <table style="display: none;" class="highchart" 
           data-graph-container-before="1" data-graph-datalabels-enabled="1"
           data-graph-type="column" 
           data-graph-subtitle-text="Course: <?php echo $course_details['course_category_name']."-".$course_details['course_name'] ?>"
           data-graph-color-1="#89A53E" data-graph-color-2="#EFEF09" data-graph-color-3="#B55F5C">
        <caption>Attendance Reports</caption>
  <thead>
      <tr>
          <th>Months</th>
          <th>Attendance</th>
          <th>Late Attendance</th>
          <th>Absents</th>
      </tr>
    </thead>
        <tbody>
            
            <?php
//                $month_chart = array_filter($overal_chart);
//                print_r($month_chart);
//                die;
                $months = array(
        "1" => 'January',
        "2" => 'February',
        "3" => 'March',
        "4" => 'April',
        "5" => 'May',
        "6" => 'June',
        "7" => 'July ',
        "8" => 'August',
        "9" => 'September',
        "10" => 'October',
        "11" => 'November',
        "12" => 'December',
);        
            while($chartRow = mysql_fetch_assoc($overal_chart)) 
                {    
                if(array_key_exists($chartRow['month'], $months))
                {
                    $month_num =  $chartRow['month'];                    
                }
            ?>
                <tr>
                    <td><?php echo $months[$month_num]; ?></td>
                    <td><?php echo $chartRow['attended']; ?></td>
                    <td><?php echo ($count-$chartRow['attendance_count']); ?></td>
                    <td><?php echo $chartRow['late_attended']; ?></td>                    
                </tr>
            <?php } ?>
            </tbody>
    </table>
                <table>
                    <caption>Attendance Summery</caption>
                <tr>
                    <td>Total No of Class Dates </td><td>:<?php echo $count;?> </td>
                       
                </tr>
                <tr>
                    <td>Total Present </td><td>:<?php echo $present_count;?> </td>
                    </tr>
                <tr>
                    <td>Percentage </td><td>:<?php echo $percentage."%";?></td>
                </tr>
            </table>
                      
</center>
</div>
<?php
}
                    else{
                       $monthly = $object->getschDates($course, $month);
                       $count = mysql_num_rows($monthly);
                       
                       $month_attendance = $object->getAttendanceDatesInMonth($student_id, $month, $course);
                       $present_count = mysql_num_rows($month_attendance);
                       
                       if($count!=0){
                         $percentage = ($present_count/$count)*100;  
                       }
                       else{
                           $percentage= "0";
                       }
?>
                    
   </div>
            <div style="width: 95%">
                <center>
            <?php 
                $course_details = $object->getCoursesById($course);
            ?>
        <table style="display: none;" class="highchart_pie" 
           data-graph-container-before="1" data-graph-datalabels-enabled="1"
           data-graph-type="pie" 
           data-graph-subtitle-text="Course: <?php echo $course_details['course_category_name']."-".$course_details['course_name'] ?>" >
        <caption><?php
        $months = array(
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July ',
        'August',
        'September',
        'October',
        'November',
        'December',
);
        if(array_key_exists($_POST['month'], $months))
        {
            $month_num =  --$_POST['month'];
            echo $months[$month_num];
        }
        ?> Attendance Reports</caption>
  <thead>
      <tr>
          <th>Month</th>
          <th>Attendance</th>
      </tr>
    </thead>
        <tbody>
            
            <?php
                $month_chart = $object->getAttendanceChartDatesInMonth($student_id,$month,$course);
//                print_r($month_chart);
//                die;
//                $month_chart = array_filter($month_chart);
                foreach ($month_chart as $key => $chartRow)
                {
            ?>
                <tr>
                    <td><?php echo $key; ?></td>                    
                    <td data-graph-name="<?php echo $key;?>" <?php if($key == 'Attended'){ echo 'data-graph-item-highlight=1 data-graph-item-color=#89A54E ';} ?>><?php echo $chartRow[$key];?></td>
                </tr>
            <?php }?>
            </tbody>
    </table>
                <table>
                    <caption>Attendance Summery</caption>
                <tr>
                    <td>Total No of Class Dates </td><td>:<?php echo $count;?> </td>
                       
                </tr>
                <tr>
                    <td>Total Present </td><td>:<?php echo $present_count;?> </td>
                    </tr>
                <tr>
                    <td>Percentage </td><td>:<?php echo $percentage."%";?></td>
                </tr>
            </table>
                      
</center>
</div>
            <?php }} ?>
</div>
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
<script type="text/javascript" language="javascript">
    function checkValues()
    {
        var course = $('#course').val();
        var mode = $('#mode').val();
        var month = $('#months_ids').val();
        if(mode == "")
            {
                $('#error_msg').html('<p>Mode needs to be selected...</p>').css('display','block');
                return false;
            }
            else if(mode == 'monthly')
            {
                if(month == '')
                    {
                        $('#error_msg').html('<p>Month needs to be selected...</p>').css('display','block');
                        return false;
                    }                
            }
            if(course == '')
            {
                $('#error_msg').html('<p>Course needs to be selected...</p>').css('display','block');
                return false;                
            }
        
        
    }
</script>
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
