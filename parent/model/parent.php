<?php
require_once 'connection.php';

class Parents{
    public function getParentById($parent_id){
        $sql ="SELECT * FROM tbl_parents INNER JOIN tbl_students ON tbl_parents.student_id= tbl_students.student_id WHERE login_acc_id='$parent_id'";
        $db = new Connection();
        $res = $db->query($sql);
        return mysql_fetch_assoc($res);
    }
    public function getParentDetails($parent_id){
        $sql ="SELECT * FROM tbl_parents INNER JOIN tbl_students ON tbl_parents.student_id= tbl_students.student_id 
            INNER JOIN tbl_user_login_account ON tbl_parents.login_acc_id=tbl_user_login_account.login_acc_id WHERE tbl_parents.parent_id='$parent_id'";
        $db = new Connection();
        $res = $db->query($sql);
        return $res;
    }
    public function updateParentProfile($parent_name,$user_name,$occupation,$nic,$address,$parent_email,$parent_contact,$login_acc){
    $sql1 = "UPDATE tbl_parents SET parent_name='$parent_name', occupation = '$occupation', nic='$nic',parent_email='$parent_email',parent_contact='$parent_contact'";
    $db = new Connection();
    $res = $db->query($sql1);
    $sql2 = "UPDATE tbl_user_login_account SET user_name='$user_name' WHERE login_acc_id ='$login_acc'";
    $db = new Connection();
    $results= $db->query($sql2);
    return $results;
    
    }
    public function getAdmissionNoById($student){
        $sql="SELECT stu_admission_no,first_name,last_name FROM tbl_students WHERE student_id='$student'";
        $db = new Connection();
        $res = $db->query($sql);
        return mysql_fetch_array($res);
        
    }

    public function getStudentByParentId($parent_id){
        $sql = "SELECT * FROM tbl_students INNER JOIN tbl_parents ON tbl_students.student_id= tbl_parents.student_id WHERE tbl_parents.login_acc_id='$parent_id' ";
        $obj = new Connection();
        $result = $obj->query($sql);
        return mysql_fetch_array($result);;
    }
    public function getCoursesByStudent($student_id){
        $sql="SELECT * FROM tbl_students,tbl_course WHERE FIND_IN_SET(tbl_course.course_id,tbl_students.course)>0 AND tbl_students.student_id='$student_id' ";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
        
    }
    public function getAllAssignments($course,$student_id){
      $sql ="SELECT * FROM tbl_assignments INNER JOIN tbl_assignment_marks ON tbl_assignments.assignment_id = tbl_assignment_marks.assignment_id WHERE course_id='$course'AND student_id='$student_id' ORDER BY tbl_assignments.assignment_id DESC ";
      $db = new Connection();
      $result = $db->query($sql);
      return $result;
    } 
    public function getAllClasSchedulesInYear($year,$course){
        $sql = "SELECT * FROM tbl_schedule WHERE course='$course' AND YEAR(date)='$year'";
        $db = new Connection();
        $result =$db->query($sql);
        return $result;
            
        }
        public function getAttendanceDates($student_id,$year,$course){
         $sql = "SELECT * FROM tbl_student_attendance INNER JOIN 
             tbl_schedule ON tbl_schedule.schedule_id=tbl_student_attendance.schedule_id WHERE attendance='$student_id' AND YEAR(date)='$year' AND course='$course'";
        $db = new Connection();
        $result =$db->query($sql);
        return $result;
        }
        public function getschDates($course,$month){
        $sql="SELECT date FROM tbl_schedule WHERE course='$course' AND month(date)='$month'";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }
     public function getAttendanceDatesInMonth($student_id,$month,$course){
         $sql = "SELECT * FROM tbl_student_attendance INNER JOIN 
             tbl_schedule ON tbl_schedule.schedule_id=tbl_student_attendance.schedule_id WHERE attendance='$student_id' AND MONTH(date)='$month' AND course='$course'";
          $db = new Connection();
        $result =$db->query($sql);
        return $result;
        }
        public function getAllClasSchedulesByMonth($year,$course,$student_id){
       
//       $sql = "SELECT *,Month(date) as month FROM tbl_schedule WHERE course='$course' AND YEAR(date)='$year'";
       $sql1 = "SELECT Month(tbl_schedule.date) as month,
            count(CASE WHEN tbl_student_attendance.status='0' THEN tbl_student_attendance.status END) as attended,           
            count(CASE WHEN tbl_student_attendance.status='1' THEN tbl_student_attendance.status END) as late_attended,
            COUNT(tbl_schedule.date) as attendance_count
            FROM tbl_student_attendance 
            INNER JOIN tbl_schedule 
            ON tbl_schedule.schedule_id=tbl_student_attendance.schedule_id 
            WHERE tbl_student_attendance.attendance='$student_id' 
            AND YEAR(tbl_schedule.date)='$year' 
            AND tbl_schedule.course='$course'
            GROUP BY Month(tbl_schedule.date)";
       $db = new Connection();
       $result =$db->query($sql1);
       return $result;            
   }
    public function getCoursesById($course_id){
        $sql= "SELECT tbl_course.course_name,tbl_course_category.course_category_name FROM tbl_course INNER JOIN tbl_course_category ON tbl_course.course_category = tbl_course_category.course_category_id WHERE tbl_course.course_id='$course_id'";
        $object = new Connection();
        $result = $object->query($sql);
        return mysql_fetch_assoc($result);
    }
     public function getAttendanceChartDatesInMonth($student_id,$month,$course){
         $sql1 = "SELECT
            count(CASE WHEN tbl_student_attendance.status='0' THEN tbl_student_attendance.status END) as attended,           
            count(CASE WHEN tbl_student_attendance.status='1' THEN tbl_student_attendance.status END) as late_attended,
            COUNT(tbl_schedule.date) as attendance_count
            FROM tbl_student_attendance 
            INNER JOIN tbl_schedule 
            ON tbl_schedule.schedule_id=tbl_student_attendance.schedule_id 
            WHERE tbl_student_attendance.attendance='$student_id' 
            AND MONTH(tbl_schedule.date)='$month' 
            AND tbl_schedule.course='$course'";
        $sql2 = "SELECT count(date) as classes FROM tbl_schedule WHERE course='$course' AND month(date)='$month'";
//        echo $sql1;
//        die;
        $db = new Connection();
        $res1 =$db->query($sql1);
        $res2 =$db->query($sql2);
        
        $rec1 = mysql_fetch_assoc($res1);
        $rec2 = mysql_fetch_assoc($res2);

        
        $attended = $rec1["attended"];
        $late_attended = $rec1["late_attended"];
        $all_attended = $rec1["attendance_count"];
        $count_class = $rec2["classes"];
        if(!empty($attended) && !empty($count_class))
        {
            $not_attended = ($count_class-$all_attended);
        }
        else
        {
            $not_attended = 0;
        }
        
//        $results = [ 
//            "Attended" => "$attended", 
//            "Late attended" => "$late_attended", 
//            "Not attended" =>"$not_attended",
//            ];
        $results = array( "$attended", "$late_attended", "$not_attended" ,"$count_class");
        return $results;
        }
       
    
       
}


?>
