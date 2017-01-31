<?php
require_once '../model/calender.php';
$action = $_REQUEST['action'];
switch ($action)
{
    case "all":
        get_all_subjects();
        break;       
    case "update":
        update_schedule();
        break;
    case "delete":
        delete_schedule();
        break;
    case "add_new":
        add_schedule();
        break;
}

function get_all_subjects()
{    
    $obj = new Calendar();
    $results = $obj->get_schedule();
    $arr = array();
    while ($row = mysql_fetch_assoc($results)) {
        $row['allDay'] = false;
        $arr[] = $row;
    }
    echo json_encode($arr);
}
function update_schedule()
{
    $schedule_id = $_POST['schedule_id'];
    $date = $_POST['class_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $obj = new Calendar();
    $result = $obj->update_Schedule_by_id($schedule_id, $date, $start_time, $end_time);
    if($result==1)
    {
        header("location: ../view/view_class_schedules.php?feedback=done");
    }
    else
    {
        header("location: ../view/view_class_schedules.php?feedback=error");
    }
}
function delete_schedule()
{
    $schedule_id = $_GET['schedule_id'];
    $obj = new Calendar();
    $result = $obj->delete_Schedule_by_id($schedule_id);
    if($result==1)
    {
        header("location: ../view/view_class_schedules.php?feedback=delete_done");
    }
    else
    {
        header("location: ../view/view_class_schedules.php?feedback=error");
    }
}
function add_schedule()
    {
        $subject = $_POST['schedule_id'];
        $date = $_POST['class_date'];
        $start_time = date("h:i:s", strtotime($_POST['start_time']));
        $end_time = date("h:i:s", strtotime($_POST['end_time']));
        $object = new Calendar();
        $result = $object->add_Schedule($subject, $date, $start_time, $end_time);
        if($result == 1)
        {
            header('location: ../view/view_class_schedules.php?feedback=added');
        }
        else
        {
            header("location: ../view/view_class_schedules.php?feedback=error");
        }
        
    }

?>
