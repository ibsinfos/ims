<?php
require_once 'connection.php';

class Students{
    
    public function getAllStudents(){
        $sql="SELECT * FROM tbl_students";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }
  
    public function getCoursesByStudent($student){
        
        $sql="SELECT * FROM tbl_students INNER JOIN tbl_user_login_account ON tbl_students.login_account_id= tbl_user_login_account.login_acc_id  INNER JOIN tbl_course ON tbl_students.course=tbl_course.course_id WHERE tbl_students.stu_admission_no = '$student'";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
        
    }
     public function getCoursesByLecturer($lecturer){
        
        $sql="SELECT * FROM tbl_teachers INNER JOIN tbl_user_login_account 
            ON tbl_teachers.login_account_id= tbl_user_login_account.login_acc_id  
            INNER JOIN tbl_course ON tbl_teachers.teacher_id=tbl_course.teacher 
            WHERE tbl_teachers.teacher_id = '$lecturer'";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
        
    }
    public function getLastLogin($student){
    $sql ="SELECT * FROM tbl_user_login_account WHERE user_name ='$student'";
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
    public function edit_assignment_marks($assignment_mark_id,$mark){
        $sql ="UPDATE tbl_assignment_marks SET Marks ='$mark' WHERE Assignment_mark_id='$assignment_mark_id'";
        
    $object = new Connection();
  $result = $object->query($sql);
  return $result; 
  
    }
            
   
}
?>