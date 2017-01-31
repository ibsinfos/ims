<?php
require_once '../model/calender.php';
$selectdate = $_GET['selectdate'];
$obj = new Calendar();
$res = $obj->get_all_schedules();
?>
<head>
    <style type="text/css" title="style">        
         @import "css/pepper-grinder/jquery-ui-1.10.3.custom.css";
         @import "css/jquery.timepicker.css";
    </style>
        <script src="js/jquery.timepicker.js" type="text/javascript"></script>
        <script src="js/lib/datepair.js" type="text/javascript"></script>
    <script>
        $(function() {
            //Datepicker
            $( "#class_date" ).datepicker({
                showOn: "both",
                buttonImage: "images/calendar.png",
                buttonImageOnly: true,
                changeMonth: true,
                changeYear: true,
                yearRange: "2012:2013",
//                maxDate: '0',
                dateFormat: "yy-mm-dd"
            });
        });       
    </script>
</head>
<body>
<div style="width: 500px; height: auto;">
<form action="../controller/calendar.php" method="post">
<table class="datepair" data-language="javascript">
    <caption><b>Add New Schedule for Subject</b></caption>
    <tr>
        <td>Subject</td>
        <td>:  
            <select name="schedule_id">
                <option></option>
                <?php 
                while ($row = mysql_fetch_array($res)) {
                ?>
                <option value="<?php echo $row['course_id'];?>"><?php echo $row['course_category_name']." - ".$row['course_name'] ?></option>
                <?php
                    }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Scheduled Date</td>
        <td>: <input type="text" name="class_date" id="class_date" value="<?php echo $selectdate; ?>"/></td>
    </tr>
    <tr>
        <td>Start Time</td>
        <td>: <input type="text" class="time start" name="start_time" value=""/></td>
    </tr>
    <tr>
        <td>End Time</td>
        <td>: <input type="text" class="time end" name="end_time" id="end_time" value=""/></td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <input type="hidden" name="action" value="add_new"/>
            <input type="reset" class="btn" name="reset_schedule" value="Clear"/>
            <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
        </td>
    </tr>
</table>    
</form>
</div>
</body>