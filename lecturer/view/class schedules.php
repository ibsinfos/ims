<?php 
require_once '../model/dashboard.php';
$teacher = $_GET['teacher_id'];

?>
<html>
    <head>
        
    </head>
    <body>
        
        <table>
            
            <tr>
                <th>Date</th><th>Course</th><th> Time</th>
            </tr><?php
                $res = $obj->get_schedules_for_week($teacher);
//                  $count =mysql_num_rows($res);
//                   if($count>0){
                   while($row = mysql_fetch_array($res)){?>
            <tr>
                <td><?php echo $row['date'];?></td>
                <td><?php echo $row['course_name'];?></td>
                <td><?php echo $row['start_time']."-".$row['end_time'];?></td>
            </tr>        
                             <?php } ?>
                                ?>
            <tr>
                
            </tr>
        </table>
            
    </body>
</html>