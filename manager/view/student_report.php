<?php 
session_start();
if(!empty($_SESSION['cur_user']) && ($_SESSION['user_role']=='6'))
{
    require_once '../model/teacher.php';
    require_once '../model/schedule.php';
    require_once '../model/course.php';
    require_once '../model/student.php';
    require_once '../model/manager.php';
//    $lecturer = $_SESSION['user_id'];
    $obj = new Manager();
    $obj_students = new Student();
    $res = $obj_students->getYearWiseAdmissionPayments();
    $count = mysql_num_rows($res);
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
        <link rel="shortcut icon" href="images/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="css/teachers.css" media="all" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all"/>
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
        <script src="js/charts/highcharts.js"></script>
        <script src="js/charts/modules/data.js"></script>
        <script src="js/charts/modules/exporting.js"></script>
        <script src="js/charts/jquery.highchartTable.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                showYearwise(2013);
                $('table.chart_1').highchartTable();
                $('table.chart_2').highchartTable();
                $('table.highchart_pie').highchartTable();
                $('table.highchart_2011').highchartTable();                
                $('table.highchart_2012').highchartTable();                
                $('table.highchart_2013').highchartTable();                
            });
            
            function showYearwise(year)
            {
                if(year == '2011')
                    {
                        $('#highchart_2012').hide();
                        $('#highchart_2013').hide();
                        $('#highchart_2011').show();                        
                    }
                else if(year == '2012')
                    {
                        $('#highchart_2012').show();
                        $('#highchart_2013').hide();
                        $('#highchart_2011').hide();                        
                    }
                else if(year == '2013')
                    {
                        $('#highchart_2012').hide();
                        $('#highchart_2013').show();
                        $('#highchart_2011').hide();                        
                    }
            }
            
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
	<?php include 'common/manager_header.php';?>
		</div>
	</div>
	<!-- topbar ends -->		<div class="container-fluid">
			<div class="row-fluid">
				
				<!-- left menu starts -->
            <div class="span2 main-menu-span">
                <?php   include 'common/manager_side_nav.php';?><!--/.well -->
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
            	                
            	                
                <li class="active"><a href="#manage">Students Admissions</a></li>
                
                <li><a href="#create">Student Attendance</a></li>
            </ul>
            
            
            <div id="myTabContent" class="tab-content">
            
            	
                
            	<!------MANAGE TEACHERS------->
                <div class="tab-pane active" id="manage">
                    <form action="#" class="form-horizontal" method="post">
            <fieldset>
            <legend><i class="icon32 icon-gear"></i>Year Wise Students Admissions</legend>
            
<?php 
    if($count > 0)
    {
        
?>
<center>                    
<div class="dataTables_wrapper" role="grid" style="width: 100%;">
    <table style="display: none;" class="chart_1"
                   data-graph-container-before="1"
                   data-graph-datalabels-enabled="1"
                   data-graph-type="column"
                   data-graph-subtitle-text="Source:Admission Fees">
        <caption>Year wise students admission payments</caption>
        <thead>
            <tr>
                <th>Admissions Year</th>
                <th>Fee</th>
            </tr>
            <tbody>
                <?php 
                while ($row1 = mysql_fetch_array($res)) 
                    {                    
                ?>
            <tr>
                <td><?php echo $row1['year']; ?></td>
                <td><?php echo $row1['total']; ?></td>
            </tr>   
                <?php
                    }
                    ?>
            </tbody>
        </thead>
    </table>
</div>
</center>
       
<center>                    
<div class="dataTables_wrapper" role="grid" style="width: 100%;">
    <table style="display: none;" class="chart_2"
                   data-graph-container-before="1"
                   data-graph-datalabels-enabled="1"
                   data-graph-type="line"
                   data-graph-subtitle-text="Source:Admission Fees">
        <caption>Month wise comparison for admission payments</caption>
        <thead>
                <tr>
                    <th>Month</th>
                    <?php 
                    $obj = new Manager();
                    $columns = $obj->getAdmissionYears();
                    while($column = mysql_fetch_array($columns)){
                    
                    ?>
                    <th><?php echo $column['Year']?></th>
                    
                    <?php
                    }
                    ?>
                </tr>
                    </thead>
                <tbody>
                     <?php
                     
                           $months = array(
        "1" => '1',
        "2" => '2',
        "3" => '3',
        "4" => '4',
        "5" => '5',
        "6" => '6',
        "7" => '7',
        "8" => '8',
        "9" => '9',
        "10" => '10',
        "11" => '11',
        "12" => '12',
);        
                 $count = count($months);
                     for($i=1;$i<=$count;$i++){
                         $month = $months[$i];?>
                    <tr>
                    <td>
                    <?php 
                    if($month=='1'){
                        echo "Jan";
                        }
                    elseif ($month=='2') {
                        echo "Feb";
                        }
                        elseif ($month=='3') {
                            echo "March";
                        }
                        elseif ($month=='4') {
                            echo "April";
                         }
                        elseif ($month=='5') {
                         echo "May";
                        }
                        elseif ($month=='6') {
                            echo "Jun";
                        }
                        elseif($month=='7'){
                            echo "Jul";
                        }
                        elseif ($month=='8') {
                            echo "Aug";
                            }
                        elseif ($month=='9') {
                            echo "Sep";
                        }
                        elseif ($month=='10') {
                            echo "Oct";
                        }
                        elseif ($month=='11') {
                            echo "Nov";
                        }
                        elseif ($month=='12'){
                            echo "Dec";
                        }
                        
                        ?></td>
                    <?php
                    $year_result = $obj->getAdmissionYears();
                    while ($year_res = mysql_fetch_array($year_result)){
                    $year = $year_res['Year'];
                    $income = $obj->yearlyAdmissionIncome($year, $months[$i]);
                    while ($cell= mysql_fetch_array($income)){
                         if($cell != '' ){?>
                    <td><?php echo $cell['Income']?></td>
                    
                        <?php }
                        
                    else{?>
                    <td><?php echo "0";?></td>
                    <?php }
                     }
                    }
                    ?>
                    </tr>
                         <?php
                     }
                     ?>
                </tbody>
        </thead>
    </table>
</div>
</center>
<?php } ?>
                   
    <br/><br/>
    </div>
                
                <!------CREATE NEW LESSON------->
                <div class="tab-pane" id="create">
                   
                    <fieldset style="">
                        
            <form action="#" method="post">
                <legend><i class="icon32 icon-gear"></i>Student Attendance Details</legend>
                <center>
                    <div class="control-group">
            <label class="control-label" for="typeahead">Select a Year : </label>
            <div class="controls">
                <select style="width: 100px;" onchange="showYearwise(this.value)" name="year">
                    <option></option>
                    <option <?php if(isset($_POST['year']) && $_POST['year'] ==2011){ echo "selected ";} ?>value="2011">2011</option>
                    <option <?php if(isset($_POST['year']) && $_POST['year'] ==2012){ echo "selected ";} ?>value="2012">2012</option>
                    <option <?php if(isset($_POST['year']) && $_POST['year'] ==2013){ echo "selected ";} ?>value="2013">2013</option>
                </select>
            </div>
             </div>
<div id="highchart_2011">
                    <table style="display: none;" class="highchart_2011" 
           data-graph-container-before="1" data-graph-datalabels-enabled="1"
           data-graph-type="column" 
           data-graph-subtitle-text="All Courses" 
           data-graph-color-1="#89A53E" data-graph-color-2="#EFEF09" data-graph-color-3="#B55F5C">
        <caption>Attendance Reports</caption>
  <thead>
      <tr>
          <th>ALL</th>
          <th>Attendance</th>
          <th>Late Attendance</th>
          <th>Absents</th>
      </tr>
    </thead>
        <tbody>
            <tr>
                <td>Overall</td>
                <td>2500</td>
                <td>250</td>
                <td>150</td>
            </tr>
        </tbody>
    </table>
</div>
<div id="highchart_2012">
<table style="display: none;" class="highchart_2012" 
           data-graph-container-before="1" data-graph-datalabels-enabled="1"
           data-graph-type="column" 
           data-graph-subtitle-text="All Courses" 
           data-graph-color-1="#89A53E" data-graph-color-2="#EFEF09" data-graph-color-3="#B55F5C">
        <caption>Attendance Reports</caption>
  <thead>
      <tr>
          <th>ALL</th>
          <th>Attendance</th>
          <th>Late Attendance</th>
          <th>Absents</th>
      </tr>
    </thead>
        <tbody>
            <tr>
                <td>Overall</td>
                <td>2850</td>
                <td>275</td>
                <td>180</td>
            </tr>
        </tbody>
    </table>
</div>
<div id="highchart_2013">
<table style="display: none;" class="highchart_2013" 
           data-graph-container-before="1" data-graph-datalabels-enabled="1"
           data-graph-type="column" 
           data-graph-subtitle-text="All Courses" 
           data-graph-color-1="#89A53E" data-graph-color-2="#EFEF09" data-graph-color-3="#B55F5C">
        <caption>Attendance Reports</caption>
  <thead>
      <tr>
          <th>ALL</th>
          <th>Attendance</th>
          <th>Late Attendance</th>
          <th>Absents</th>
      </tr>
    </thead>
        <tbody>
            <tr>
                <td>Overall</td>
                <td>385</td>
                <td>78</td>
                <td>35</td>
            </tr>
        </tbody>
    </table>
             </div>  
                </center>
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