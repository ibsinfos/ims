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
        
        $sql="SELECT * FROM tbl_students,tbl_course WHERE FIND_IN_SET(tbl_course.course_id,tbl_students.course)>0 AND tbl_students.stu_admission_no='$student' ";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
        
    }
     public function getLessonById($lesson){
        $sql= "SELECT content from tbl_lessons WHERE tbl_lesson_id='$lesson'";
        $db = new Connection();
        $result = $db->query($sql);
        return mysql_fetch_array($result);
    }
     public function getCoursesByStudentId($student_id){
        
        $sql="SELECT * FROM tbl_students,tbl_course WHERE FIND_IN_SET(tbl_course.course_id,tbl_students.course)>0 AND tbl_students.student_id='$student_id' ";
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
    public function getScheduleByRange($student){
    $now = time();
    $new_time = $now +(60*60*24*3);
    $new_time = date("Y-m-d",$new_time);
   $now_date= date("Y-m-d",$now);
   
   $sql= "SELECT tbl_course.course_name,tbl_schedule.date,tbl_schedule.start_time,tbl_schedule.end_time FROM
       tbl_schedule INNER JOIN tbl_course ON tbl_schedule.course= tbl_course.course_id 
       INNER JOIN tbl_students ON FIND_IN_SET(tbl_course.course_id,tbl_students.course)>0 WHERE date BETWEEN '$now_date' AND '$new_time' AND tbl_students.stu_admission_no='$student' ORDER BY date ASC";
   $object = new Connection();
  $result = $object->query($sql);
 
  return $result; 
  
    }
    public function getNextPaymentDate(){
       
        $sql ="SELECT * FROM tbl_payment_dates";
        $object = new Connection();
        $result = $object->query($sql);
        return mysql_fetch_array($result); 
    }

    public function getStudentById($student_id){
        $sql = "SELECT * FROM tbl_students INNER JOIN 
            tbl_user_login_account ON 
            tbl_students.login_account_id= tbl_user_login_account.login_acc_id 
            WHERE stu_admission_no='$student_id'";
        $obj = new Connection();
        $result = $obj->query($sql);
        return mysql_fetch_array($result);;
    }
    public function getLessonsByCourse($course){
        $sql = "SELECT * FROM tbl_lessons WHERE course='$course'";
        $obj = new Connection();
        $res = $obj ->query($sql);
        return $res;
    }
    public function getStudent($student){
        $sql="SELECT student_id FROM tbl_students WHERE login_account_id='$student'";
        $obj = new Connection();
        $res = $obj ->query($sql);
        return mysql_fetch_array($res);
    }

        public function getAssignments($course,$date){
      $sql ="SELECT * FROM tbl_assignments WHERE course_id= '$course' AND due_date > '$date' ORDER BY assignment_id DESC ";
      $db = new Connection();
      $result = $db->query($sql);
      return $result;
    } 
    public function getAllAssignments($course,$student_id){
      $sql ="SELECT * FROM tbl_assignments INNER JOIN tbl_assignment_marks ON tbl_assignments.assignment_id = tbl_assignment_marks.assignment_id WHERE course_id='$course'AND student_id='$student_id' ORDER BY tbl_assignments.assignment_id DESC";
      $db = new Connection();
      $result = $db->query($sql);
      return $result;
    } 
    
     public function updateStudentProf($title,$fname,$lname,$birthday,$address,$email,$phone,$school,$student_id,$prof_image,$user_name,$login_acc){
    $sql1 = "UPDATE tbl_students 
        SET title='$title',first_name='$fname',
            last_name='$lname',dob='$birthday',
                address='$address',prof_image='$prof_image'
                    WHERE student_id='$student_id'";
    $db = new Connection();
    $result= $db->query($sql1);
    $sql2 = "UPDATE tbl_user_login_account SET user_name='$user_name', email='$email' WHERE login_acc_id='$login_acc'";
    $db = new Connection();
    $res = $db->query($sql2);
    return $result;
    }
    public function getschDates($course,$month){
        $sql="SELECT date FROM tbl_schedule WHERE course='$course' AND month(date)='$month'";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }
    public function getAssignmentsById($assignment){
      $sql ="SELECT * FROM tbl_assignments INNER JOIN tbl_course ON tbl_assignments.course_id = tbl_course.course_id WHERE assignment_id= '$assignment'";
      $db = new Connection();
      $result = $db->query($sql);
      return mysql_fetch_array($result);
    }

    public function getAllClasSchedulesInYear($year,$course){
       $sql = "SELECT * FROM tbl_schedule WHERE course='$course' AND YEAR(date)='$year'";
        $db = new Connection();
        $result =$db->query($sql);
        return $result;
            
        }
        public function getStudentId($student){
            $sql = "SELECT * FROM tbl_students INNER JOIN 
                tbl_user_login_account ON tbl_students.login_account_id=tbl_user_login_account.login_acc_id 
                WHERE tbl_user_login_account.login_acc_id='$student'";
             $db = new Connection();
        $result =$db->query($sql);
        return mysql_fetch_array($result);
        }

        public function getAttendanceDates($student_id,$year,$course){
         $sql = "SELECT * FROM tbl_student_attendance INNER JOIN 
             tbl_schedule ON tbl_schedule.schedule_id=tbl_student_attendance.schedule_id WHERE attendance='$student_id' AND YEAR(date)='$year' AND course='$course'";
          $db = new Connection();
        $result =$db->query($sql);
        return $result;
        }
        public function getAttendanceDatesInMonth($student_id,$month,$course){
         $sql = "SELECT DISTINCT * FROM tbl_student_attendance INNER JOIN 
             tbl_schedule ON tbl_schedule.schedule_id=tbl_student_attendance.schedule_id WHERE attendance='$student_id' AND MONTH(date)='$month' AND course='$course' GROUP BY date";
         $db = new Connection();
        $result =$db->query($sql);
        return $result;
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
        
//        $results = [ "Attended" => "$attended", 
//            "Late attended" => "$late_attended", 
//            "Not attended" =>"$not_attended",
//            ];
        $results = array( "$attended", "$late_attended", "$not_attended" ,"$count_class");
        return $results;
        }
        
        public function getCoursesById($course_id){
        $sql= "SELECT tbl_course.course_name,tbl_course_category.course_category_name FROM tbl_course INNER JOIN tbl_course_category ON tbl_course.course_category = tbl_course_category.course_category_id WHERE tbl_course.course_id='$course_id'";
        $object = new Connection();
        $result = $object->query($sql);
        return mysql_fetch_assoc($result);
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
   public function requestTranscript($date,$student_id,$course){
       $sql="INSERT INTO tbl_transcripts VALUES('NULL','$student_id','$course','$date','pending','0')";
       $db = new Connection();
       $result =$db->query($sql);
       return $result;            
       
   }
   public function lectureEvaluation($student_id,$course_id,$l_one,$l_two,$l_three,$l_four,$l_five,$l_six){
       $sql = "INSERT INTO tbl_lecture_evaluation VALUES(NULL,'$student_id','$course_id','$l_one','$l_two','$l_three','$l_four','$l_five','$l_six')";
       $db = new Connection();
       $result =$db->query($sql);
       return $result;            
   }
   public function courseEvaluation($student_id,$course_id,$c_one,$c_two,$c_three,$c_four,$c_five,$c_six){
       $sql = "INSERT INTO tbl_course_evaluation VALUES('NULL','$student_id','$course_id','$c_one','$c_two','$c_three','$c_four','$c_five','$c_six')";
       $db = new Connection();
       $result =$db->query($sql);
       return $result;            
   }
}
?>