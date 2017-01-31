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
    public function get_teacher_id($teacher_uname){
        $sql= "SELECT tbl_teachers.teacher_id FROM tbl_teachers INNER JOIN tbl_user_login_account ON tbl_teachers.first_name = tbl_user_login_account.user_name WHERE tbl_user_login_account.user_name ='$teacher_uname'";
        $object = new Connection();
        $result = $object->query($sql);
        return mysql_fetch_array($result);
        }
    function getLecturerSchedule($teacher){
        $sql = "SELECT tbl_schedule.schedule_id as id, concat(tbl_course_category.course_category_name,'-',tbl_course.course_name) as title, concat(tbl_schedule.date,' ',tbl_schedule.start_time) as start, concat(tbl_schedule.date,' ',tbl_schedule.end_time) as end FROM tbl_schedule
            INNER JOIN  tbl_course ON  tbl_course.course_id=tbl_schedule.course INNER JOIN tbl_course_category ON tbl_course.course_category=tbl_course_category.course_category_id WHERE tbl_course.teacher='$teacher' ";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }
}
?>
