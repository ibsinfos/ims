<?php
session_start();
require_once '../model/calender.php';
$teacher_uname= $_SESSION['cur_user'];
$obj = new Calendar();
$results = $obj->get_teacher_id($teacher_uname);
$teacher = $results['teacher_id'];

$obj = new Calendar();
$results = $obj->getLecturerSchedule($teacher);
$arr = array();
$x = 0;
    while ($row = mysql_fetch_assoc($results)) {    
        $row['allDay'] = false;
        $arr[] = $row;
        
    }
    echo json_encode($arr);
?>
