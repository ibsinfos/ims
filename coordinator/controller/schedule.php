<?php
require_once '../model/schedule.php';
$action = $_POST['action'];
switch ($action){
    case "add_schedule":
        add_schedule();
        break;
    
}
function add_schedule(){
    $subject = $_POST['course'];
    $date = explode(',',$_POST['date']);
    
    $date_count= count($date);
    
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $object = new Schedules();
    for($i=0;$i<$date_count;$i++){
    $result = $object->addSchedule($subject, $date[$i], $start_time, $end_time);
    }
    header('location:../view/class_schedule.php?feedback=added');
}

     


?>
