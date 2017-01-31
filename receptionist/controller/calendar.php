<?php
require_once '../model/calender.php';
$obj = new Calendar();
$results = $obj->get_schedule();
$arr = array();
$x = 0;
    while ($row = mysql_fetch_assoc($results)) {    
        $row['allDay'] = false;
        $arr[] = $row;
        
        
    }
    echo json_encode($arr);
?>
