<?php

require_once '../model/connection.php';

class Student {

    public function getLastStudentLoginAccID() {
        $sql = "SELECT * FROM tbl_user_login_account WHERE user_role =3 ORDER BY login_acc_id DESC LIMIT 1";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function getLastParentLoginAccID() {
        $sql = "SELECT * FROM tbl_user_login_account WHERE user_role =4 ORDER BY login_acc_id DESC LIMIT 1";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function addStudent($admission_no, $admission_date, $title, $first_name, $last_name, $name_initials, $birthday, $sex, $school, $course, $address, $phone, $home_phone, $email, $parent_name, $relation, $occupation, $nic, $parent_contact, $parent_email, $last_stu_acc_id, $last_parent_id, $prof_image) {
        $sql1 = "INSERT INTO tbl_students VALUES('NULL','$admission_no','$admission_date','$title','$first_name','$last_name','$name_initials','$birthday','$sex','$prof_image','$school','$course','$address','$phone','$home_phone','$email','$last_stu_acc_id')";
        $db = new Connection();
        $result = $db->query($sql1);
        $student_id = mysql_insert_id();
        $sql2 = "INSERT INTO tbl_parents VALUES('NULL','$parent_name','$relation','$occupation','$nic','$parent_contact','$parent_email','$student_id','$last_parent_id')";
        $db = new Connection();
        $result = $db->query($sql2);
        $parent_id = mysql_insert_id();
        
        $sql3 ="INSERT INTO tbl_parent_student_relation VALUES('NULL','$student_id','$parent_id')";
        $new_student = array("new_student_id"=>"$student_id","new_parent_id"=>"$parent_id");
        return $new_student;
    }

    public function NewStudent($admission_no, $admission_date, $title, $first_name, $last_name, $name_initials, $birthday, $sex, $school, $course, $address, $phone, $home_phone, $email, $last_stu_acc_id,$prof_image) {
        $sql1 = "INSERT INTO tbl_students VALUES('NULL','$admission_no','$admission_date','$title','$first_name','$last_name','$name_initials','$birthday','$sex','$prof_image','$school','$course','$address','$phone','$home_phone','$email','$last_stu_acc_id')";
        $db = new Connection();
        $result = $db->query($sql1);
        return $result;
    }

    public function updateStudentProf($title, $fname, $lname, $birthday, $initials, $address, $email, $phone, $school, $student_id, $prof_image) {
        $sql = "UPDATE tbl_students SET title='$title',first_name='$fname',last_name='$lname',name_initials='$initials',dob='$birthday',address='$address',prof_image='$prof_image' WHERE student_id='$student_id'";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function addLoginStudent($admission_no, $email) {
        $sql = "INSERT INTO tbl_user_login_account VALUES('NULL','$admission_no','$admission_no','3','$email','0','0','0')";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function addLoginParent($admission_no, $parent_admission_no, $parent_email) {
        $sql = "INSERT INTO tbl_user_login_account VALUES('NULL','$parent_admission_no','$admission_no','4','$parent_email','0','0','0')";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function lastAdmissionDetails($student_id) {
        $sql = "SELECT * FROM tbl_payments INNER JOIN tbl_students ON tbl_students.student_id=tbl_payments.student_id WHERE tbl_payments.student_id='$student_id' ORDER BY payment_id DESC LIMIT 1";
//        echo $sql;
//        die;
        $db = new Connection();
        $result = $db->query($sql);
        return mysql_fetch_array($result);
    }

    public function getAdmission() {
        $sql = "SELECT amount FROM tbl_course_payment_scheme";
        $db = new Connection();
        $res = $db->query($sql);
        return mysql_fetch_array($res);
    }

    public function addAdmissionPayment($admission_date, $student_id, $amount, $fee, $remarks) {
        $sql = "INSERT INTO tbl_payments VALUES('NULL','admission','$admission_date','$amount','$student_id','$remarks')";        
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function getLastPayment($student_id) {
        $sql = "SELECT * FROM tbl_course_payments INNER JOIN tbl_students ON tbl_course_payments.stu_id=tbl_students.student_id INNER JOIN tbl_course ON tbl_course.course_id= tbl_course_payments.course_id WHERE stu_id='$student_id'";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function getTotalFee($student_id) {
        $sql = "SELECT sum(fee) as total FROM tbl_course_payments INNER JOIN tbl_students ON tbl_course_payments.stu_id=tbl_students.student_id INNER JOIN tbl_course ON tbl_course.course_id= tbl_course_payments.course_id WHERE stu_id='$student_id'";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function getLastRecord() {
        $sql = "SELECT * FROM tbl_students where course='bcs' order by student_id desc limit 1";
        $db = new Connection();
        $result = $db->query($sql);
        return mysql_fetch_array($result);
    }

    public function getStudentsByCourse($course) {
        $sql = "SELECT * FROM tbl_students WHERE FIND_IN_SET('$course',course)>0 ";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function get_student_by_id($student_id) {
        $sql = "SELECT * FROM tbl_students INNER JOIN tbl_parents ON tbl_students.student_id=tbl_parents.student_id WHERE tbl_students.student_id='$student_id'";
        $obj = new Connection();
        $result = $obj->query($sql);
        return mysql_fetch_array($result);
        ;
    }    
    

    public function delete_student_record($student_id) {
        $sql = "DELETE FROM tbl_students WHERE student_id='$student_id'";
        $db = new Connection();
        $result = $db->query($sql);
        return mysql_fetch_array($result);
    }

    public function get_admission_payment() {
        $sql = "SELECT amount FROM tbl_payment_scheme WHERE payment='admission'";

        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function getStudent($course) {
        $sql = "SELECT student_id,stu_admission_no FROM tbl_students WHERE $course IN (course)";

        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function getschDates($course, $month) {
        $sql = "SELECT date FROM tbl_schedule WHERE course='$course' AND month(date)='$month'";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function getattendance($course, $stu_id, $date) {
        $sql = "SELECT * FROM tbl_student_attendance INNER JOIN 
            tbl_schedule ON tbl_student_attendance.schedule_id=tbl_schedule.schedule_id 
            INNER JOIN tbl_course ON tbl_schedule.course=tbl_course.course_id
            WHERE tbl_course.course_id='$course' AND tbl_student_attendance.attendance='$stu_id' AND tbl_schedule.date='$date'";
//    echo $sql;
//    die;
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function getRecBysession($User_name) {
        $sql = "SELECT * FROM tbl_employees INNER JOIN 
            tbl_user_login_account on tbl_employees.login_acc_id = tbl_user_login_account.login_acc_id 
            WHERE user_name='$User_name'";
        $obj = new Connection();
        $result = $obj->query($sql);
        return mysql_fetch_array($result);
        ;
    }

    public function getRecByEmpID($emp_id) {
        $sql = "SELECT * FROM tbl_employees INNER JOIN 
            tbl_user_login_account on tbl_employees.login_acc_id = tbl_user_login_account.login_acc_id 
            WHERE employee_id='$emp_id'";
        $obj = new Connection();
        $result = $obj->query($sql);
        return mysql_fetch_array($result);
        ;
    }

    public function editRecDetails($fname, $lname, $dob, $address, $phone, $email, $nic, $user_name, $prof_image, $emp_id, $login) {
        $sql1 = "UPDATE tbl_employees SET first_name='$fname',last_name='$lname',dob='$dob',prof_image='$prof_image',phone='$phone',address='$address',nic='$nic' WHERE employee_id='$emp_id'";
        $db = new Connection();
        $result = $db->query($sql1);
        $sql2 = "UPDATE tbl_user_login_account
        SET user_name='$user_name',
        email='$email' WHERE tbl_user_login_account.login_acc_id='$login'";
        $db = new Connection();
        $results = $db->query($sql2);
        return $results;
    }

    public function searchStudent($admission_no) {
        $sql = "SELECT * FROM tbl_students WHERE stu_admission_no='$admission_no'";
        $db = new Connection();
        $res = $db->query($sql);
        return mysql_fetch_array($res);
    }

    public function searchByadmissionCourse($admission_no, $course) {
        $sql = "SELECT * FROM tbl_students,tbl_course WHERE stu_admission_no ='$admission_no' AND course LIKE '%$course%' AND tbl_course.course_id LIKE '%$course%'";
        $db = new Connection();
        $res = $db->query($sql);
        return $res;
    }

    public function getcourseById($course) {
        $sql = "SELECT * FROM tbl_course WHERE course_id='$course'";
        $db = new Connection();
        $result = $db->query($sql);
        return mysql_fetch_array($result);
    }

    public function RecentCourses() {
        $sql = "SELECT * FROM tbl_course INNER JOIN tbl_course_category ON tbl_course_category.course_category_id =tbl_course.course_category ORDER BY course_id DESC LIMIT 2";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function getAllCourses() {
        $sql = "SELECT * FROM tbl_course INNER JOIN tbl_course_category ON tbl_course_category.course_category_id =tbl_course.course_category ORDER BY course_category_name ";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function getAllCourseTeachers() {
        $sql = "SELECT * FROM tbl_course INNER JOIN tbl_course_category ON tbl_course_category.course_category_id =tbl_course.course_category INNER JOIN tbl_teachers ON tbl_course.teacher = tbl_teachers.teacher_id ORDER BY course_category_name ";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function getAllTeachers() {
        $sql = "SELECT * FROM tbl_teachers";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function getRecentAdmission($seven_days_ago) {
        $sql = "SELECT * FROM tbl_students WHERE stu_admission_date > $seven_days_ago ORDER BY student_id DESC";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function addOnePayment($receipt_id, $stu_id, $course, $status, $pay_date, $amount, $late_state) {
        $sql = "INSERT INTO tbl_course_payments (recip_id,stu_id,course_id,status,date,amount,late_status) VALUES('$receipt_id','$stu_id','$course','$status','$pay_date','$amount','$late_state')";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function getPaymentDetailsById($student_id, $course_id, $date) {
        $sql = "SELECT tbl_course_payments.*, tbl_course.course_name, tbl_course.fee, tbl_course_category.course_category_name  
        FROM tbl_course_payments 
        INNER JOIN tbl_course 
        ON tbl_course_payments.course_id=tbl_course.course_id
        INNER JOIN  tbl_course_category
        ON  tbl_course_category.course_category_id=tbl_course.course_category
        WHERE tbl_course_payments.stu_id='$student_id' AND tbl_course_payments.course_id='$course_id' AND tbl_course_payments.date='$date'
        ORDER BY course_payment_id DESC LIMIT 1";
        $db = new Connection();
        $res = $db->query($sql);
        return mysql_fetch_array($res);
    }

    public function getAllPaymentDetailsById($student_id, $date) {
        $sql = "SELECT tbl_course_payments.*, tbl_course.course_name, tbl_course.fee, tbl_course_category.course_category_name  
        FROM tbl_course_payments 
        INNER JOIN tbl_course 
        ON tbl_course_payments.course_id=tbl_course.course_id
        INNER JOIN  tbl_course_category
        ON  tbl_course_category.course_category_id=tbl_course.course_category
        WHERE tbl_course_payments.stu_id='$student_id' AND tbl_course_payments.date='$date'
        ORDER BY course_payment_id ASC";
        $db = new Connection();
        $res = $db->query($sql);
        return $res;
    }

    public function getReceiptId($student_id, $date) {
        $sql = "SELECT * 
        FROM tbl_course_payments
        WHERE tbl_course_payments.stu_id='$student_id' AND date='$date'
        GROUP BY recip_id ASC";
        $db = new Connection();
        $res = $db->query($sql);
        return mysql_fetch_array($res);
    }

    public function ClearAllCourse($student) {
        $sql = "UPDATE tbl_students SET course=null WHERE stu_admission_no='$student'";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function UpdateCourses($student, $new_courses) {
        $sql = "UPDATE tbl_students SET course='$new_courses' WHERE stu_admission_no='$student'";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function dropCourse($student_id, $course, $date) {
        $sql = "INSERT INTO tbl_course_drops VALUES('NULL','$student_id','$course','$date')";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }

    public function getStudentId($student) {
        $sql = "SELECT student_id FROM tbl_students WHERE stu_admission_no='$student'";
        $db = new Connection();
        $result = $db->query($sql);
        return mysql_fetch_array($result);
    }
    public function getParentByStudent($student){
        $sql= "SELECT parent_id FROM tbl_parents WHERE student_id='$student'";
        $db = new Connection();
        $result = $db->query($sql);
        return mysql_fetch_array($result);
    }
    public function studentParentRelation($stud_id,$parent_id){
        $sql ="INSERT INTO tbl_parent_student_relation VALUES('NULL','$stud_id','$parent_id')";
        $db = new Connection();
        $result = $db->query($sql);
        return $result;
    }
    
    public function get_student_email_by_id($student_id) {
        $sql = "SELECT
        tbl_students.student_id,
        CASE WHEN email !='' THEN email END as email,
        CASE WHEN email = '' THEN tbl_parents.parent_email END as parent_email
        FROM tbl_students 
        INNER JOIN tbl_parents ON tbl_students.student_id=tbl_parents.student_id 
        WHERE tbl_students.student_id='$student_id'";
        $obj = new Connection();
        $result = $obj->query($sql);
        return mysql_fetch_array($result);
    }
    public function get_student_phone_by_id($student_id) {
        $sql = "SELECT
        tbl_students.student_id,
        CASE WHEN phone !='' THEN phone END as phone,
        CASE WHEN phone = '' THEN tbl_parents.parent_contact END as parent_phone
        FROM tbl_students 
        INNER JOIN tbl_parents ON tbl_students.student_id=tbl_parents.student_id 
        WHERE tbl_students.student_id='$student_id'";
        $obj = new Connection();
        $result = $obj->query($sql);
        return mysql_fetch_array($result);
    }
    public function addNotification($student_id, $notification, $to, $date, $course_id)
    {
        $sql = "INSERT INTO tbl_notifications VALUE('null','$student_id','$notification','$to', '$date', '$course_id')";
        $obj = new Connection();
        $result = $obj->query($sql);
        return $result;
    }
}

?>
