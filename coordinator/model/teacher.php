<?php

require_once 'connection.php';

class Teachers {

    public function add_teacher($title, $fname, $lname, $dob, $gender, $address, $email, $phone, $nic, $status, $edu_qualification, $achievements, $intrest_subject, $prof_image, $rate, $last_account_id) {
        $sql = "INSERT INTO tbl_teachers VALUES('NULL','$title','$fname','$lname','$dob','$gender','$address','$email','$phone','$nic','$status','$edu_qualification','$intrest_subject','$achievements','$prof_image','$rate','$last_account_id')";

        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }

    public function get_all_teachers() {
        $sql = "SELECT * FROM tbl_teachers";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }

    public function add_login($fname, $nic, $email) {
        $sql = "INSERT INTO tbl_user_login_account VALUES('NULL','$fname','$nic','7','$email','0','0','0')";
        $obj = new Connection();
        $result = $obj->query($sql);
        return $result;
    }

    public function get_teacher_by_id($teacher_id) {
        $sql = "SELECT * FROM tbl_teachers WHERE teacher_id='$teacher_id'";
        $obj = new Connection();
        $result = $obj->query($sql);
        return mysql_fetch_array($result);
        ;
    }

    public function getLastTeachetLoginAccID() {
        $sql = "SELECT * FROM tbl_user_login_account WHERE user_role =7 ORDER BY login_acc_id DESC LIMIT 1";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function delete_teacher($teacher_id) {
        $sql = "DELETE FROM tbl_teachers WHERE teacher_id='$teacher_id'";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function getAllPayRate() {
        $sql = "SELECT * FROM tbl_teacher_payrates";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function addDoneClasses($status, $schedule, $actual_start, $actual_end, $total) {
        $sql = "INSERT INTO tbl_lecture_hours VALUES('NULL','$status','$schedule','$actual_start','$actual_end','$total')";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function addCancelledClasses($status, $schedule) {
        $sql = "INSERT INTO tbl_lecture_hours VALUES('NULL','$status','$schedule','0','0','0')";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function getTeacherById($teacher_id) {
        $sql = "SELECT * FROM tbl_teachers INNER JOIN 
            tbl_user_login_account ON 
            tbl_teachers.login_account_id= tbl_user_login_account.login_acc_id 
            WHERE user_name='$teacher_id'";
        $obj = new Connection();
        $result = $obj->query($sql);
        return mysql_fetch_array($result);
        ;
    }
    public function printTranscript($student_id,$course,$date){
        $sql ="UPDATE tbl_transcripts SET status='done',issued_on='$date' WHERE student_id='$student_id' AND course='$course'";
        $obj = new Connection();
        $result = $obj->query($sql);
        return $result;
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
public function getLecturerHoursSummery($lecturer_id, $start, $end, $course)
    {
        $sql = "SELECT tbl_lecture_hours.*, 
            Count(tbl_lecture_hours.schedule_id) as total, 
            TIMEDIFF(tbl_schedule.end_time, tbl_schedule.start_time) as timediff 
            FROM tbl_lecture_hours 
            INNER JOIN tbl_schedule 
            ON tbl_schedule.schedule_id=tbl_lecture_hours.schedule_id
            INNER JOIN tbl_course 
            ON tbl_course.course_id=tbl_schedule.course
            INNER JOIN tbl_teachers 
            ON tbl_teachers.teacher_id = tbl_course.teacher
            WHERE tbl_schedule.date BETWEEN '$start' AND '$end'
            AND tbl_schedule.course='$course'
            AND tbl_teachers.teacher_id='$lecturer_id'
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
