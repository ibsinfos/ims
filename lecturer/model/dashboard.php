<?php
require_once 'connection.php';


class dashboard{
    
    public function get_total_students($lecturer){
        $sql ="SELECT count(distinct(tbl_students.stu_admission_no)) AS stu_count, tbl_course.course_name,course_category_name 
            FROM tbl_students INNER JOIN tbl_course ON tbl_students.course = tbl_course.course_id INNER JOIN tbl_course_category ON tbl_course_category.course_category_id=tbl_course.course_category
            WHERE tbl_course.teacher ='$lecturer' GROUP BY tbl_course.course_name";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }
    public function get_schedules_for_week ($teacher){
        $now = time();
    $new_time = $now +(60*60*24*2);
    $new_time = date("Y-m-d",$new_time);
   $now_date= date("Y-m-d",$now);
   
        $sql = "SELECT tbl_course.course_name,tbl_schedule.date,tbl_schedule.start_time,tbl_schedule.end_time FROM tbl_schedule INNER JOIN tbl_course ON tbl_schedule.course = tbl_course.course_id WHERE tbl_course.teacher='$teacher' AND date BETWEEN '$now_date' AND '$new_time'ORDER BY date ASC LIMIT 1";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }
    public function get_teacher_byID($teacher_login_id){
        $sql= "SELECT tbl_teachers.teacher_id FROM tbl_teachers WHERE login_account_id='$teacher_login_id'";
        $object = new Connection();
        $result = $object->query($sql);
        return mysql_fetch_array($result);
        }
    public function get_teacher_id($teacher_uname){
        $sql= "SELECT tbl_teachers.teacher_id FROM tbl_teachers INNER JOIN tbl_user_login_account ON tbl_teachers.first_name = tbl_user_login_account.user_name WHERE tbl_user_login_account.user_name ='$teacher_uname'";
        $object = new Connection();
        $result = $object->query($sql);
        return mysql_fetch_array($result);
        }
            public function getLastLogin($lecturer){
    $sql ="SELECT * FROM tbl_user_login_account WHERE user_name ='$lecturer'";
    $object = new Connection();
        $result = $object->query($sql);
        return mysql_fetch_array($result);
    }
    public function getScheduleByRange(){
    $now = time();
    $new_time = $now +(60*60*24*3);
    $new_time = date("Y-m-d",$new_time);
   $now_date= date("Y-m-d",$now);
   
   $sql= "SELECT tbl_course.course_name,tbl_schedule.date,tbl_schedule.start_time,tbl_schedule.end_time FROM tbl_schedule INNER JOIN tbl_course ON tbl_schedule.course= tbl_course.course_id WHERE date BETWEEN '$now_date' AND '$new_time'ORDER BY date ASC";
   $object = new Connection();
  $result = $object->query($sql);
 
  return $result; 
  
    }
} 
?>
