<?php
require_once '../model/student.php';
require_once '../model/course.php';

if (isset($_POST['get_students'])) {
    $course_id = $_POST['course_id'];
    $object = new Student();
    $res = $object->getStudents($course_id);
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
if(isset($_POST['due_paymentcourse'])){
   $sub_id = $_POST['course'];
   $object = new Course();
   $res = $object->getCourseCatById($sub_id);
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

//due_payment
if(isset($_POST['due_payment'])){
    $course = $_POST['course'];
    $start_date = $_POST['start'];
    $end_date = $_POST['end'];
    $object_due = new Course();
    $res = $object_due->CourseDuePayments($course, $start_date, $end_date);
    $count = mysql_num_rows($res);    
    if($count>0)
    {
        while($row = mysql_fetch_assoc($res)){
            $student_id = $row['student_id'];
            $notification_list = $object_due->notificationsPayments($student_id, $course, $start_date, $end_date);                        
            
            if(count($notification_list)>0)
            {
//                echo count($notification_list);
                if(count($notification_list)==1)
                {
                    if($row['student_id']==$notification_list['student_id']  )
                    {
                        $row['notification_type'] = $notification_list['notification_type'];
                        $row['sent_to'] = $notification_list['sent_to'];
                    }                    
                }
                else
                    {
                        $row['notification_type'] = 'both';
                    }
                
            } 
            $data[] = $row;
        }
    echo json_encode($data);
   }
   else
   {
       echo 'no records';
   }
}
if(isset($_POST['follwing_courses'])){
   $student = $_POST['student'];
    $object_course = new Course();
    $res = $object_course->getFollowingCourses($student);
    $count = mysql_num_rows($res);    
    if($count>0){
        while($row = mysql_fetch_assoc($res)){
//        $courses = $row['course'];
//         $course = explode(",", $courses);
        $data[] = $row;
        }
        echo json_encode($data);
    }
 else {
        echo 'no records';
    }
}
?>
