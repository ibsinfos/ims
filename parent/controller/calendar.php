<?php
require_once '../model/calender.php';
//session_start();

//$student_uname= $_SESSION['cur_user'];
//$obj = new Calendar();
//$results = $obj->get_student_id($student_uname);
//$student_id = $results['student_id'];
//
//$object = new Calendar();
//$results = $object->getStudentSchedule($student_id);
//$arr = array();
//$x = 0;
    
    
    
    if(isset($_POST['get_calender_data']))
    {
        $student_id = $_POST['login_id'];
        $obj = new Calendar();
//        $parent_id = $obj->get_parent_id($login_id);
        $results = $obj->getParentSchedule($student_id);
        while ($row = mysql_fetch_assoc($results)) {    
        $row['allDay'] = false;
        $arr[] = $row;
        
    }
        echo json_encode($arr);
    }
?>
