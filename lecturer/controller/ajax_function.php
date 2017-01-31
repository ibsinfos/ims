<?php
require_once '../model/teacher.php';
//require_once '../model/course.php';

if(isset($_POST['class_dates'])){
   $course = $_POST['course'];
   $object = new Teachers();
   $res = $object->getScheduleDates($course);
   $count = mysql_num_rows($res);
   if($count)
   {
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
if(isset($_POST['lessons'])){
    $course = $_POST['course_id'];
    $limit = $_POST['limit'];
    $object_lesson = new Teachers();
    $res = $object_lesson->getLessonByCourse($course,$limit);
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
if(isset($_POST['assignment_marks'])){
    $assignment = $_POST['assignment_id'];
    
    $object_lesson = new Teachers();
    $res = $object_lesson->getAssignmentMarks($assignment);
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
    $object_lesson = new Teachers();
    $res = $object_lesson->getAssignments($course);
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
    $course = $_POST['courses_id'];
    $object_lesson = new Teachers();
    $res = $object_lesson->getAssignmentsByCourse($course);
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
if(isset($_POST['student'])){
    $course = $_POST['courses_id'];
        $obj_student = new Teachers();
    $res = $obj_student->getStudentsByCourse($course);
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
