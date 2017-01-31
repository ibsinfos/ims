<?php

require_once 'connection.php';

class Course {

    public function addCourseCategory($course_cat_name, $description) {
        $sql = "INSERT INTO tbl_course_category VALUES('NULL','$course_cat_name','$description')";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }

    public function getCourseCategory() {
        $sql = "SELECT * FROM tbl_course_category";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }

    public function getCourseCategoryById($course_category_id) {
        $sql = "SELECT * FROM tbl_course_category WHERE course_category_id= $course_category_id";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }

    public function addNewCourse($course_name, $course_category, $description) {
        $sql = "INSERT INTO tbl_course VALUES('NULL','$course_category','$course_name','$description')";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }

    public function getCourses() {
        $sql = "SELECT tbl_course.*,tbl_course_category.course_category_name FROM tbl_course INNER JOIN tbl_course_category ON tbl_course.course_category = tbl_course_category.course_category_id ORDER BY course_id";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }

    public function getCoursesById($course_id) {
        $sql = "SELECT tbl_course.*,tbl_course_category.course_category FROM tbl_course INNER JOIN tbl_course_category ON tbl_course.course_category = tbl_course_category.course_category_id WHERE tbl_course.course_id=$course_id";
        $object = new Connection();
        $result = $object->query($sql);
        return mysql_fetch_array($result);
    }

    public function updateCourse($course_id, $course_name, $course_category, $description) {
        $sql = "UPDATE tbl_course SET course_name='$course_name', course_category='$course_category',description ='$description' WHERE course_id= '$course_id'";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }

    public function getCoursesByCatId($cat_id) {
        $sql = "SELECT tbl_course.*,tbl_course_category.course_category_name 
            FROM tbl_course 
            INNER JOIN tbl_course_category 
            ON tbl_course.course_category = tbl_course_category.course_category_id 
            WHERE tbl_course.course_category=$cat_id";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }

    public function getScheduleDates($course) {
        $sql = "SELECT * FROM tbl_schedule INNER JOIN tbl_course ON tbl_schedule.course = tbl_course.course_id WHERE tbl_course.course_id='$course' ORDER BY date DESC LIMIT 10";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }

    public function getScheduleDatesBYMonth($course, $month) {
        $sql = "SELECT schedule_id date FROM tbl_schedule INNER JOIN tbl_course ON tbl_schedule.course = tbl_course.course_id WHERE tbl_course.course_id='$course' AND MONTH(tbl_schedule.date)='$month' ORDER BY date DESC LIMIT 10";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }

    public function addStudentAttendance($result, $schedule, $status) {
        $sql = "INSERT INTO tbl_student_attendance VALUES('NULL','$result', '$schedule', '$status')";
//         echo $sql;
//         die;
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }

    public function getCourseById($course_id) {
        $sql = "SELECT * FROM tbl_course WHERE course_id='$course_id'";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }
    
    public function getCourseCatById($course_id) {
        $sql = "SELECT tbl_course.course_name,tbl_course_category.course_category_name FROM tbl_course INNER JOIN tbl_course_category ON tbl_course.course_category = tbl_course_category.course_category_id WHERE tbl_course.course_id='$course_id'";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }

    public function addCoursePayments($stu_id, $course_id, $status, $date, $amount, $remark) {
        $sql = "INSERT INTO tbl_course_payments (course_payment_id, stu_id, course_id, status, date, amount, remark)
            VALUES (null ,'$stu_id', '$course_id', '$status', '$date', '$amount', '$remark')";
        $db = new Connection();
        $result = $db->query($sql);
        if ($result == 1) {
            $sql2 = "INSERT INTO tbl_stu_payment_schemes VALUES (null ,'$stu_id', '$course_id', '$status')";
            $db = new Connection();
            $result2 = $db->query($sql2);
        }
        return $result2;
    }

    public function getCourseRecipId() {
        $sql = "SELECT recip_id FROM tbl_course_payments ORDER BY recip_id DESC LIMIT 1 ";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }

    public function CourseDuePayments($course, $start_date, $end_date) {
        $sql = "SELECT tbl_students.student_id, tbl_students.stu_admission_no, CONCAT(tbl_students.first_name, ' ', tbl_students.last_name) as student_name,tbl_course.course_name,tbl_course.fee AS due_fee, UPPER(tbl_course_payments.status) as status
        FROM tbl_students 
        JOIN tbl_course ON FIND_IN_SET(tbl_course.course_id,tbl_students.course)>0 
        INNER JOIN tbl_course_payments ON tbl_course_payments.stu_id = tbl_students.student_id
        WHERE FIND_IN_SET('$course',tbl_students.course)>0 
        AND tbl_course.course_id='$course' 
        AND tbl_students.student_id 
        NOT IN(SELECT tbl_course_payments.stu_id FROM tbl_course_payments 
        WHERE tbl_course_payments.date 
        BETWEEN '$start_date' AND '$end_date') 
        AND tbl_course_payments.course_id='$course'
        GROUP BY tbl_students.student_id";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }
    public function getFollowingCourses($student){
        $sql="SELECT * FROM tbl_students,tbl_course WHERE FIND_IN_SET(tbl_course.course_id,tbl_students.course)>0 AND tbl_students.stu_admission_no='$student'";
       
        $object = new Connection();
       $result = $object->query($sql);
       return $result;
        
    }
    public function notificationsPayments($student_id, $course, $start_date, $end_date)
    {
        $sql = "SELECT * FROM tbl_notifications WHERE student_id='$student_id' AND course_id='$course' AND tbl_notifications.date BETWEEN '$start_date' AND '$end_date' GROUP BY student_id, notification_type ";
        $object = new Connection();
        $result = $object->query($sql);
        return mysql_fetch_assoc($result);
    }

}

?>
