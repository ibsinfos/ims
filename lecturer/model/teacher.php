<?php
require_once 'connection.php';

class Teachers{

    public function add_teacher($title,$fname,$lname,$dob,$gender,$address,$email,$phone,$nic,$status,$edu_qualification,$intrest_subject,$prof_image,$last_account_id){
        $sql ="INSERT INTO tbl_teachers VALUES('NULL','$title','$fname','$lname','$dob','$gender','$address','$email','$phone','$nic','$status','$edu_qualification','$intrest_subject','$prof_image','$last_account_id')";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }
    public function get_all_teachers(){
        $sql="SELECT * FROM tbl_teachers";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }
     public function getLessonsByCourse($course, $limit){
        $sql = "SELECT * FROM tbl_lessons WHERE course='$course' ORDER BY date DESC limit $limit ";
        $obj = new Connection();
        $res = $obj ->query($sql);
        return $res;
    }
     public function getLessonByCourse($course, $limit){
        $sql = "SELECT * FROM tbl_lessons WHERE course='$course' ORDER BY date LIMIT $limit";
        $obj = new Connection();
        $res = $obj ->query($sql);
        return $res;
    }
    public function getAssignmentMarks($assignment){
        $sql = "SELECT * FROM tbl_assignment_marks INNER JOIN tbl_students ON tbl_assignment_marks.student_id= tbl_students.student_id WHERE assignment_id='$assignment'";
        $obj = new Connection();
        $res = $obj ->query($sql);
        return $res;
    }
    public function getAssignmentMarksId($assignment){
        $sql = "SELECT * FROM tbl_assignment_marks 
            INNER JOIN tbl_students ON tbl_assignment_marks.student_id= tbl_students.student_id 
            INNER JOIN tbl_assignments ON tbl_assignments.assignment_id=tbl_assignment_marks.assignment_id 
            WHERE assignment_mark_id='$assignment'";
        $obj = new Connection();
        $res = $obj ->query($sql);
        return mysql_fetch_array($res);
    }

    public function add_login($fname,$nic,$email){
        $sql ="INSERT INTO tbl_user_login_account VALUES('NULL','$fname','$nic','7','$email','0','0','0')";
        $obj = new Connection();
        $result = $obj->query($sql);
        return $result;
    }
    public function get_teacher_by_id($teacher_id){
        $sql = "SELECT * FROM tbl_teachers INNER JOIN 
            tbl_user_login_account ON 
            tbl_teachers.login_account_id= tbl_user_login_account.login_acc_id 
            WHERE user_name='$teacher_id'";
        $obj = new Connection();
        $result = $obj->query($sql);
        return mysql_fetch_array($result);;
    }
    public function getLastTeachetLoginAccID(){
        $sql = "SELECT * FROM tbl_user_login_account WHERE user_role =7 ORDER BY login_acc_id DESC LIMIT 1";
        $db = new Connection();
        $result= $db->query($sql);
        return $result;
    }

    public function delete_teacher($teacher_id){
        $sql="DELETE FROM tbl_teachers WHERE teacher_id='$teacher_id'";
        $db= new Connection();
        $result = $db->query($sql);
        return $result;
        
    }
    public function addLesson($course,$date,$content){
        $sql = "INSERT INTO tbl_lessons VALUES('NULL','$course','$date','$content')";
        $obj_db = new Connection();
        $res = $obj_db->query($sql);
        return $res;
        
    }
    public function addAssignment($course,$assignment_title,$upload_date,$closing_date,$assignment_file,$lecturer,$content){
        $sql="INSERT INTO tbl_assignments VALUES('NULL','$assignment_title','$upload_date','$closing_date','$content','$course','$assignment_file','$lecturer')";
        $obj_db = new Connection();
        $res = $obj_db->query($sql);
        return $res;
        }
        public function updateAssignment($title,$course,$uploaded_date,$due_date,$content,$assignment_file,$assignment_id){
            $sql=" UPDATE tbl_assignments SET title='$title',uploaded_date='$uploaded_date',due_date='$due_date',content='$content',course_id='$course',file='$assignment_file' WHERE assignment_id='$assignment_id'";
           $obj = new Connection();
           $result = $obj->query($sql);
           return $result;
        }

        public function getTeacherByUser($lecturer){
         $query = "SELECT teacher_id,rate FROM tbl_teachers INNER JOIN tbl_teacher_payrates ON tbl_teacher_payrates.pay_rate_id=tbl_teachers.pay_rate WHERE login_account_id='$lecturer'";
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
public function getScheduleDates($course){
       $sql = "SELECT * FROM tbl_schedule INNER JOIN tbl_course ON tbl_schedule.course = tbl_course.course_id WHERE tbl_course.course_id='$course' ORDER BY date DESC LIMIT 5";
       $object = new Connection();
       $result = $object->query($sql);
       return $result;
    }
//    public function getLessonsByCourse($course,$limit){
//        $sql = "SELECT * FROM tbl_lessons WHERE course='$course' ORDER BY date DESC limit $limit ";
//        $obj = new Connection();
//        $res = $obj ->query($sql);
//        return $res;
//    }
    public function getAssignments($course){
      $sql ="SELECT * FROM tbl_assignments WHERE course_id= '$course'";
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

    public function getLessonById($lesson){
        $sql= "SELECT content from tbl_lessons WHERE tbl_lesson_id='$lesson'";
        $db = new Connection();
        $result = $db->query($sql);
        return mysql_fetch_array($result);
    }

    public function updateTeacher($title,$fname,$lname,$dob,$address,$email,$phone,$nic,$edu_qualification,$intrest_subject,$prof_image,$teacher){
        $sql1 ="UPDATE tbl_teachers SET title='$title',first_name='$fname',last_name='$lname',dob='$dob',nic='$nic',address='$address',email='$email',qualification='$edu_qualification',subjects='$intrest_subject',prof_image='$prof_image',phone='$phone' WHERE teacher_id='$teacher'"; 
        $up_obj = new Connection();
        $res = $up_obj->query($sql1);
        return $res;
    }
            
    public function getAssignmentsByCourse($course){
      $sql ="SELECT * FROM tbl_assignments WHERE course_id= '$course'";
      $db = new Connection();
      $result = $db->query($sql);
      return $result;
    }
    public function getStudentsByCourse($course){
        $sql="SELECT * FROM tbl_students WHERE FIND_IN_SET('$course',course)>0 ";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
        
    }
      public function addAssignmentMarks($student,$date,$assignment,$marks){
        $sql = "INSERT INTO tbl_assignment_marks VALUES('NULL','$student','$assignment','$marks','$date')";
        
        $db = new Connection();
        $res =$db->query($sql);
        return $res;
        
    }
    public function getLectureHoursDetails($start,$end,$teacher){
        $sql="SELECT * FROM tbl_lecture_hours INNER JOIN tbl_schedule ON 
            tbl_lecture_hours.schedule_id=tbl_schedule.schedule_id 
            INNER JOIN tbl_course ON tbl_schedule.course= tbl_course.course_id 
            INNER JOIN tbl_teachers ON tbl_course.teacher= tbl_teachers.teacher_id 
            WHERE tbl_schedule.date BETWEEN '$start' AND '$end' 
                AND tbl_teachers.teacher_id='$teacher'";
      
        $db = new Connection();
        $res =$db->query($sql);
        return $res ;
    }
    public function getLecturerPayments($start,$end,$teacher){
        $sql="SELECT tbl_course.course_name,tbl_course_category.course_category_name,sum(tbl_lecture_hours.total_hours) AS total 
            FROM tbl_course INNER JOIN tbl_course_category ON tbl_course.course_category=tbl_course_category.course_category_id 
            INNER JOIN tbl_schedule ON tbl_schedule.course=tbl_course.course_id 
            INNER JOIN tbl_lecture_hours ON tbl_lecture_hours.schedule_id=tbl_schedule.schedule_id 
            WHERE tbl_course.teacher ='$teacher' AND tbl_schedule.date BETWEEN '$start' AND '$end' 
                GROUP BY course_id";
       
        $db = new Connection();
        $res =$db->query($sql);
        return $res ;
        
    }
     public function getLecturerHoursSummery($start,$end,$course)
    {
        $sql = "SELECT tbl_lecture_hours.*, Count(tbl_lecture_hours.schedule_id) as total, TIMEDIFF(tbl_schedule.end_time, tbl_schedule.start_time) as timediff FROM tbl_lecture_hours 
            INNER JOIN tbl_schedule 
            ON tbl_schedule.schedule_id=tbl_lecture_hours.schedule_id
            WHERE tbl_schedule.date BETWEEN '$start' AND '$end'
            AND tbl_schedule.course='$course'
            Group by tbl_lecture_hours.schedule_id";
        $db = new Connection();
        $res =$db->query($sql);
        return $res;
    }
    public function getLecturerFeedbackRating($start,$end,$course)
    {
        $sql = "SELECT SUM(question_one) as question_one,
        SUM(question_two) as question_two,
        SUM(question_three) as question_three,
        SUM(question_four) as question_four,
        SUM(question_five) as question_five,
        COUNT(*)*5 as total
        FROM tbl_lecture_evaluation
        WHERE course_id='$course' 
        AND feedback_date BETWEEN '$start' AND '$end'";
        $db = new Connection();
        $res =$db->query($sql);
        return mysql_fetch_assoc($res);
    }
    public function getCourseFeedbackRating($start,$end,$course)
    {
        $sql = "SELECT SUM(question_one) as question_one,
        SUM(question_two) as question_two,
        SUM(question_three) as question_three,
        SUM(question_four) as question_four,
        SUM(question_five) as question_five,
        COUNT(*)*5 as total
        FROM tbl_course_evaluation
        WHERE course_id='$course' 
        AND feedback_date BETWEEN '$start' AND '$end'";
        $db = new Connection();
        $res =$db->query($sql);
        return mysql_fetch_assoc($res);
    }

}
?>