<?php 
//ini_set("display_errors", 0);
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='6'))
{
    require_once '../model/manager.php';
?>

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
         <link rel="shortcut icon" href="images/favicon.ico">
	 <link rel="stylesheet" type="text/css" href="css/student.css" media="all">
         <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">
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
         <script src="js/charts/highcharts.js"></script>
        <script src="js/charts/modules/data.js"></script>
        <script src="js/charts/modules/exporting.js"></script>
        <script src="js/charts/jquery.highchartTable.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
             
            
    $('table.highChartTable').highchartTable(); 
      
    $('table.pie_chart').highchartTable();
    $('table.chart_1').highchartTable();
    $('table.chart_2').highchartTable();
    $('table.chart_3').highchartTable();
    $('table.chart_4').highchartTable();
    $('table.chart_5').highchartTable();
    $('table.highChartTable02').highchartTable();
    
     
     
 }); 
        </script>
               
                
</head>
<body>
		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
<?php   include 'common/manager_header.php';?>
		</div>
	</div>
	<!-- topbar ends -->		<div class="container-fluid">
			<div class="row-fluid">
				
				<!-- left menu starts -->
            <div class="span2 main-menu-span">
                <?php include 'common/manager_side_nav.php';?><!--/.well -->
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
            <li class="active"><a href="#manage">Year Wise Income Reports</a></li>
            <li class=""><a href="#create">Course Wise Income Reports</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
            <!------MANAGE STUDENTS------->
                <div class="tab-pane active" id="manage">
                	
        <fieldset>
            <center>
            <div style="width: 70%;">
            <table style="display: none;" class="highChartTable" 
           data-graph-container-before="1" data-graph-datalabels-enabled="1"
           data-graph-type="line" graph-height="300"
           data-graph-subtitle-text="Source:Student fees and admissions">
                <caption>Yearly Income Report</caption>
                <thead>
                <tr>
                    <th>Month</th>
                    <?php 
                    $obj = new Manager();
                    $columns = $obj->getYear();
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
                    $year_result = $obj->getYear();
                    while ($year_res = mysql_fetch_array($year_result)){
                    $year = $year_res['Year'];
                    $income = $obj->yearlyIncome($year, $months[$i]);
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
            </table>
                </div>
                <div style="clear: both"></div>
                <hr/>
                <div id="form" style="width: 450px;">
                    <form class="form-horizontal" method="post" action="">
                        <h3 align="left">Select a year to get the year wise expenditure</h3>
                        <br/>
                        <div class="control-group">
            <label class="control-label" for="typeahead">Select a Year : </label>
            <div class="controls">
                <select style="width: 100px;" name="year">
                    <option></option>
                    <option <?php if(isset($_POST['year']) && $_POST['year'] ==2011){ echo "selected ";} ?>value="2011">2011</option>
                    <option <?php if(isset($_POST['year']) && $_POST['year'] ==2012){ echo "selected ";} ?>value="2012">2012</option>
                    <option <?php if(isset($_POST['year']) && $_POST['year'] ==2013){ echo "selected ";} ?>value="2013">2013</option>
                </select>
                        <input type="hidden" name="action" value="get_result"/>
                        <input class="btn btn-primary" value="Submit" type="submit"/>
            </div>
             </div>
                    </form>
                    <?php
                    if(isset($_POST['action'])&& $_POST['action']=='get_result'){
                        $year = $_POST['year'];?>
                    
                    
                     <table style="display: none;" class="pie_chart" 
           data-graph-container-before="1" data-graph-datalabels-enabled="1"
           data-graph-type="pie"
           data-graph-subtitle-text="Source:Lecturer wise payment">
                         <caption>Lecturer Payments by Grade</caption>
                         <thead>
                            <tr>
                                <th>Lecturer Grade</th>
                                <th>Total paid amount</th>
                            </tr>
                        </thead>
                          <tbody>
                   <?php
                   $lecture_payment = $obj->getTotalPaymentByLectureGrade($year);
                        while($row= mysql_fetch_array($lecture_payment)){
                            ?>
                       
                            <?php
                            ?>
                            <tr>
                                <td><?php echo $row['teacher_level'];?></td>
                                <td data-graph-name="<?php echo $row['teacher_level'];?>" <?php if($row['teacher_level'] == 'Junior Lecturer'){ echo 'data-graph-item-highlight=1';} ?>><?php echo $row['Amount'];?></td>
                            </tr>
                       
                         <?php
                        }?>
                             </tbody> 
                        <?php
                    }?>
                         </table>
                </div>
                <div>
                        
                </div>
            </center>
        </fieldset>
   
   
                </div>
                
                <!------CREATE NEW STUDENT------->
                <div class="tab-pane" id="create">
                    <div id="category_income">
                        
                        <form class="form-horizontal" method="post" action="">
                        <div class="control-group">
            <label class="control-label" for="typeahead">Select a Year : </label>
            <div class="controls">
                <select style="width: 100px;" name="select_year">
                    <option></option>
                    <option <?php if(isset($_POST['select_year']) && $_POST['select_year'] =='2011'){ echo "selected";} ?>value="2011">2011</option>
                    <option <?php if(isset($_POST['select_year']) && $_POST['select_year'] =='2012'){ echo "selected";} ?>value="2012">2012</option>
                    <option <?php if(isset($_POST['select_year']) && $_POST['select_year'] =='2013'){ echo "selected";} ?>value="2013">2013</option>
                </select>
            <input type="hidden" name="action" value="get_income"/>
            <input class="btn btn-primary" value="Submit" type="submit"/>
            </div>
             </div>         
                    </form>
                        <?php
                        if(isset($_POST['action'])&& $_POST['action']=='get_income'){
                           $income = "true" ;
                            $year = $_POST['select_year'];
                            ?>
<div style="width:50%; float: left; ">
            <table style="display: none;" class="chart_1"
                   data-graph-container-before="1"
                   data-graph-datalabels-enabled="1"
                   data-graph-type="column"
                   data-graph-subtitle-text="Source:Course fees">
                <caption>Yearly Income for Primary Courses</caption>
                 <thead>
                    <tr>
                        <th>Course category</th>
                        <th>Total Income</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $primary = $obj->getIncomeOFPrimary($year);
                    while($row_1 =  mysql_fetch_array($primary)){?>
                    <tr>
                        <td><?php echo $row_1['course_category_name'];?></td>
                        <td><?php echo $row_1['total_fee'];?></td>
                    </tr>
                   <?php
                   }
                    ?>
                </tbody>
                  
                         </table>
                            </div>
                        <div style="width:48%;">
                                    <table style="display: none;" class="chart_2"
                                           data-graph-container-before="1"
                                           data-graph-datalabels-enabled="1"
                                           data-graph-type="column"
                                           data-graph-color-1="#A47D7C"
                                           data-graph-subtitle-text="Source:Course fees">
                                        <caption>Yearly Income for Secondary Courses</caption>
                                        <thead>
                                            <tr>
                                                <th>Course category</th>
                                                <th>Total Income</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $secondary = $obj->getIncomeOFSecondary($year);
                                            while ($row_2 = mysql_fetch_array($secondary)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row_2['course_category_name']; ?></td>
                                                    <td><?php echo $row_2['total_fee']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                            
                                    </table>
</div>
<br/>
<div style="width:50%; float: left; ">
                        <table style="display:none;" class="chart_3"
                   data-graph-container-before="1"
                   data-graph-datalabels-enabled="1"
                   data-graph-type="column"
                   data-graph-color-1="#80699B"
                   data-graph-subtitle-text="Source:Course fees">
                <caption>Yearly Income for O/L Courses</caption>
                 <thead>
                    <tr>
                        <th>Course category</th>
                        <th>Total Income</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $ol = $obj->getIncomeOFOL($year);
                    while($row_3 =  mysql_fetch_array($ol)){?>
                    <tr>
                        <td><?php echo $row_3['course_category_name'];?></td>
                        <td><?php echo $row_3['total_fee'];?></td>
                    </tr>
                   <?php
                   }
                    ?>
                </tbody>
                  
                         </table>
</div>
<div style="width:50%;">
    <table style="display: none;" class="chart_4"
                   data-graph-container-before="1"
                   data-graph-datalabels-enabled="1"
                   data-graph-type="column"
                   data-graph-color-1="#AA4643"
                   data-graph-subtitle-text="Source:Course fees">
                <caption>Yearly Income for A/L Courses</caption>
                 <thead>
                    <tr>
                        <th>Course category</th>
                        <th>Total Income</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $al = $obj->getIncomeOFAL($year);
                    while($row_4 =  mysql_fetch_array($al)){?>
                    <tr>
                        <td><?php echo $row_4['course_category_name'];?></td>
                        <td><?php echo $row_4['total_fee'];?></td>
                    </tr>
                   <?php
                   }
                    ?>
                </tbody>
                  
                         </table>
</div>
<center>
<div style="width:50%; ">
                  <table style="display: none;" class="chart_5"
                   data-graph-container-before="1"
                   data-graph-datalabels-enabled="1"
                   data-graph-type="column"
                   data-graph-color-1="#89A54E"
                   data-graph-subtitle-text="Source:Course fees">
                <caption>Yearly Income for Other Courses</caption>
                 <thead>
                    <tr>
                        <th>Course category</th>
                        <th>Total Income</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $other = $obj->getIncomeOFOtherCourses($year);
                    while($row_5 =  mysql_fetch_array($other)){?>
                    <tr>
                        <td><?php echo $row_5['course_category_name'];?></td>
                        <td><?php echo $row_5['total_fee'];?></td>
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
                    ?></div>
                       
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

        </div>
        <?php
        if(isset($income)&& $income=='true'){?>
<script type="text/javascript">
                setTimeout(function() {
      // Do something after 5 seconds
                $('ul#myTab li:first').removeClass('active');
                $('ul#myTab li:first-child').next().addClass('active');
                $('#manage').removeClass('active');
                $('#create').addClass('active');
            }, 100);                
            </script>  	
		<?php }
                ?>


<div style="display: none;" id="cboxOverlay"></div><div style="display: none; padding-bottom: 57px; padding-right: 28px;" class="" id="colorbox"><div id="cboxWrapper"><div><div style="float: left;" id="cboxTopLeft"></div><div style="float: left;" id="cboxTopCenter"></div><div style="float: left;" id="cboxTopRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxMiddleLeft"></div><div style="float: left;" id="cboxContent"><div style="width: 0px; height: 0px; overflow: hidden; float: left;" id="cboxLoadedContent"></div><div style="float: left;" id="cboxLoadingOverlay"></div><div style="float: left;" id="cboxLoadingGraphic"></div><div style="float: left;" id="cboxTitle"></div><div style="float: left;" id="cboxCurrent"></div><div style="float: left;" id="cboxNext"></div><div style="float: left;" id="cboxPrevious"></div><div style="float: left;" id="cboxSlideshow"></div><div style="float: left;" id="cboxClose"></div></div><div style="float: left;" id="cboxMiddleRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxBottomLeft"></div><div style="float: left;" id="cboxBottomCenter"></div><div style="float: left;" id="cboxBottomRight"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div><div style="position: absolute; top: -10000px; left: -10000px; width: 48.9362px; font-size: 13px; font-family: &quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif; font-weight: 400; line-height: 18px; resize: none;"></div>
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