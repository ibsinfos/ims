<?php
 require_once '../model/student.php';
 
 if(isset($_POST['lessons'])){
    $course = $_POST['courses'];
    
    $object_lesson = new Students();
    $res = $object_lesson->getLessonsByCourse($course);
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
if(isset($_POST['assignments'])){
    $course = $_POST['course'];
    $student_id = $_POST['student_id'];
    
    $date = date('Y-m-d');
    $obj = new Students();
    $res = $obj->getAllAssignments($course, $student_id);
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
if(isset($_POST['assignment'])){
    $course = $_POST['course'];
//    $student_id = $_POST['student_id'];
    $date = date('Y-m-d');
    $object_lesson = new Students();
    $res = $object_lesson->getAssignments($course, $date);
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