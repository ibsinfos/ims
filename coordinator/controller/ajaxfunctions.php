<?php
require_once '../model/student.php';
require_once '../model/course.php';
require_once '../model/teacher.php';

if (isset($_POST['get_students'])) {
    $course = $_POST['course_id'];
    $object = new Student();
    $res = $object->getStudentsByCourse($course);
    if ($res == TRUE) {
        echo "available";
    }
}
if (isset($_POST['course_cats']))
{
    $cat_id = $_POST['cat_id'];
    $object = new Course();
    $results = $object->getCoursesByCatId($cat_id);
    while ($row = mysql_fetch_assoc($results)) {
        $data[] = $row;
    }
    echo json_encode($data);
}
if(isset($_POST['class_dates'])){
   
   $course = $_POST['course'];
   $object = new Course();
   $res = $object->getScheduleDates($course);
   $count = mysql_num_rows($res);
   //use this method to check if ther is any 
   //records retrieved by the query
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
if(isset($_POST['class_sch_dates'])){
   $course = $_POST['course'];
   $month = $_POST['month'];
//   echo $course." ".$month;
//   die;
   $object = new Course();
   $res = $object->getScheduleDatesBYMonth($course, $month);
   $count = mysql_num_rows($res);
   //use this method to check if ther is any 
   //records retrieved by the query
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
if(isset($_POST['subject_values'])){
   $sub_id = $_POST['sub_id'];
   $object = new Course();
   $res = $object->getCourseById($sub_id);
   $count = mysql_num_rows($res);
   //use this method to check if ther is any 
   //records retrieved by the query
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
    $course = $_POST['course'];
    $limit = $_POST['limit'];
    $object_lesson = new Teachers();
    $res = $object_lesson->getLessonsByCourse($course, $limit);
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
if(isset($_POST['classes'])){
   $date = $_POST['date'];
   $object = new Course();
   $res = $object->getScheduleByDate($date);
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

if(isset($_POST['get_student_list'])){
 $course = $_POST['course_id'];
   $object = new Student();
    $res = $object->getStudentsByCourse($course);
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
if(isset($_POST['get_subs_by_lect']))
{
    $teacher = $_POST['teacher'];
    $obj = new Teachers();
    $res = $obj->getCourseByLecturer($teacher);
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


?>
