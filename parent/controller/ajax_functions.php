<?php
 require_once '../model/parent.php';
 
 
if(isset($_POST['assignments'])){
    $course = $_POST['course'];
    $student_id = $_POST['student_id'];
    $date = date('Y-m-d');
    $object_lesson = new Parents();
    $res = $object_lesson->getAllAssignments($course, $student_id);
    $count = mysql_num_rows($res);    
    if($count>0){
        while($row = mysql_fetch_assoc($res)){
         $data[] = $row;
        }       
    echo json_encode($data);
   }
   else
   {
       echo 'no records';
   }
} 
 
 ?>