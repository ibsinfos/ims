<?php
require_once 'connection.php';

class Calendar
{
    function get_schedule()
    {
        $sql = "SELECT tbl_schedule.schedule_id as id, tbl_course.course_name as title, concat(tbl_schedule.date,' ',tbl_schedule.start_time) as start, concat(tbl_schedule.date,' ',tbl_schedule.end_time) as end FROM tbl_schedule
            INNER JOIN  tbl_course ON  tbl_course.course_category=tbl_schedule.course ";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }
    public function get_student_id($login_id){
        $sql= "SELECT student_id FROM tbl_students WHERE login_account_id='$login_id'";
        $object = new Connection();
        $result = $object->query($sql);
        $row = mysql_fetch_array($result);
        return $row['student_id'];
        }
    
    public function getStudentSchedule($student_id){
        $sql = "SELECT tbl_schedule.schedule_id as id, tbl_course.course_name as title, concat(tbl_schedule.date,' ',tbl_schedule.start_time) as start, concat(tbl_schedule.date,' ',tbl_schedule.end_time) as end FROM tbl_schedule 
        INNER JOIN  tbl_course ON tbl_course.course_id=tbl_schedule.course 
        INNER JOIN tbl_students ON tbl_course.course_id IN(tbl_students.course) WHERE tbl_students.student_id='$student_id'";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }
}
?>
