<?php

require_once 'connection.php';

class Schedules{
     public function addSchedule($subject,$date,$start_time,$end_time){
       $sql="INSERT INTO tbl_schedule VALUES('NULL', $subject,$date,$start_time,$end_time)"; 
       $object = new Connection();
       $result = $object->query($sql);
       return $result;
       
    }
    public function getCourse(){
        $sql = "SELECT tbl_course.course_name,";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }
     public function getAllSchedules(){
        $sql = "SELECT tbl_schedule.schedule_id,tbl_course.course_name 
            FROM tbl_schedule INNER JOIN tbl_course ON tbl_schedule.course= tbl_course.course_id";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }

    public function getSchedules($start_date,$end_date){
        $sql = "SELECT * FROM tbl_schedule WHERE date BETWEEN '$start_date' AND '$end_date'";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }
    public function getAssignmentByCourse($course){
        $sql ="SELECT * FROM tbl_assignments WHERE course='$course'";
        $db =new Connection();
        $res = $db->query($sql);
        return $res;
    }

    public function getTeacherByUser($lecturer){
         $query = "SELECT teacher_id FROM tbl_teachers WHERE login_account_id='$lecturer'";
              $db = new Connection();
              $result = $db->query($query);
              return mysql_fetch_array($result);
    }

    public function getCourseByLecturer($lecturer){
        $sql="SELECT tbl_course.course_id,tbl_course.course_name,
tbl_course_category.course_category_name
FROM tbl_Course_category INNER JOIN tbl_course 
ON tbl_course.course_category=tbl_course_category.course_category_id 
WHERE tbl_course.teacher='$lecturer'";
        $object = new Connection();
        $result=$object->query($sql);
        return $result;
        
    }

    public function getScheduleById($schedule_id){
        $sql = "SELECT tbl_course.course_name FROM tbl_course INNER JOIN tbl_schedule ON tbl_course.course_id = tbl_schedule.course WHERE schedule_id='$schedule_id'";
        $object = new Connection();
        $result = $object->query($sql);
        return mysql_fetch_array($result);
       
    }
}

?>
