<?php
$id = $_GET['id'];
$event = $_GET['Event'];
$start = $_GET['start'];
$end = $_GET['end'];
?>
<head>
    <style type="text/css" title="style">        
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
        
        function confirmation()
        {
            var schedule_id = $('#schedule_id').val();
            var conf = confirm("Are you sure do you want to delete this record?");
            if(conf)
            {
                location.href = "../controller/calendar.php?action=delete&schedule_id="+schedule_id;
            }
            return false;
        }
    </script>
</head>
<body>
<div style="width: 500px; height: auto;">
<form action="../controller/calendar.php" method="post">
<table class="datepair" data-language="javascript">
    <caption><b>Schedule Changes</b></caption>
    <tr>
        <td>Subject</td>
        <td>:  <?php echo $event;?></td>
    </tr>
    <tr>
        <td>Scheduled Date</td>
        <td>: <input type="text" name="class_date" id="class_date" value="<?php echo date("Y-m-d", strtotime($start));?>"/></td>
    </tr>
    <tr>
        <td>Start Time</td>
        <td>: <input type="text" class="time start" name="start_time" value="<?php echo date("g:ia", strtotime($start));?>"/></td>
    </tr>
    <tr>
        <td>End Time</td>
        <td>: <input type="text" class="time end" name="end_time" id="end_time" value="<?php echo date("g:ia", strtotime($end));?>"/></td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <input type="hidden" name="schedule_id" id="schedule_id" value="<?php echo $id;?>"/>
            <input type="hidden" name="action" value="update"/>
            <input type="reset" class="btn" name="reset_schedule" value="Clear"/>
            <input type="submit" class="btn btn-primary" name="submit" value="Update"/>
            <button name="delete_schedule" class="btn btn-primary" id="delete_schedule" onclick="return confirmation();">Delete</button>
        </td>
    </tr>
</table>    
</form>
</div>
</body>