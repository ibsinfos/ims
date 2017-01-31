<?php
require_once 'connection.php';

class Manager{
    public function getManager($manager){
        $sql= "SELECT * FROM tbl_employees INNER JOIN tbl_user_login_account ON
            tbl_employees.login_acc_id = tbl_user_login_account.login_acc_id 
            WHERE tbl_user_login_account.user_name='$manager'";
        $db = new Connection();
        $result = $db->query($sql);
        return mysql_fetch_array($result);
    }
    public function getManagerByID($manager){
        $sql = "SELECT * FROM tbl_employees,tbl_user_login_account 
            WHERE tbl_employees.login_acc_id=tbl_user_login_account.login_acc_id AND employee_id='$manager'";
        $db = new Connection();
        $result = $db->query($sql);
        return mysql_fetch_array($result);
    }
    public function updateManager($fname,$lname,$title,$dob,$address,$user_name,$email,$phone,$nic,$login,$prof_image){
        $sql1="UPDATE tbl_employees SET 
            title='$title',first_name='$fname',last_name='$lname',dob='$dob',address='$address',phone='$phone',nic='$nic' prof_image='$prof_image'WHERE login_acc_id='$login'";
        $db=new Connection();
        $res = $db->query($sql1);
        echo $sql1;
        $sql2 = "UPDATE tbl_user_login_account SET email='$email',user_name='$user_name' WHERE user_login_acc_id='$login'";
        $db = new Connection();
        $result = $db->query($sql2);
        return $result;
        }
        
    public function get_all_teachers(){
        $sql="SELECT * FROM tbl_teachers";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }
    public function getTeacherById($teacher_id){
        $sql="SELECT * FROM tbl_teachers INNER JOIN tbl_teacher_payrates ON tbl_teachers.pay_rate=tbl_teacher_payrates.pay_rate_id WHERE teacher_id='$teacher_id'";
        $object = new Connection();
        $result = $object->query($sql);
        return mysql_fetch_array($result);
    }
    public function getAllPayRate(){
        $sql = "SELECT * FROM tbl_teacher_payrates";
        $db= new Connection();
        $result = $db->query($sql);
        return $result;
    }
    public function payRate($level){
        $sql ="SELECT rate FROM tbl_teacher_payrates WHERE pay_rate_id='$level'";
        $db= new Connection();
        $result = $db->query($sql);
        return $result;
    }
    public function updateTeacherLevel($level,$teacher_id){
        $sql="UPDATE tbl_teachers SET pay_rate='$level' WHERE teacher_id='$teacher_id'";
        $db= new Connection();
        $result = $db->query($sql);
        return $result;
    }
    public function addIncrement($teacher_id,$date,$new_amount){
        $sql ="INSERT INTO tbl_lecturer_increments VALUES('NULL','$teacher_id','$date','$new_amount')";
        $db= new Connection();
        $result = $db->query($sql);
        return $result;    
    
    }
    public function getAllStudents(){
        $sql ="SELECT student_id FROM tbl_students";
        $db= new Connection();
        $result = $db->query($sql);
        return $result;    
    }
    public function getAllTeachers(){
        $sql ="SELECT teacher_id FROM tbl_teachers";
        $db= new Connection();
        $result = $db->query($sql);
        return $result;    
    }
    public function getAllClasses(){
         $sql ="SELECT classroom_id FROM tbl_classroom";
        $db= new Connection();
        $result = $db->query($sql);
        return $result;    
    }
    public function getAllResources(){
         $sql ="SELECT resource_id FROM tbl_resources";
        $db= new Connection();
        $result = $db->query($sql);
        return $result;    
    }
    public function lastLoggedEmployee(){
        $sql="SELECT * FROM tbl_user_login_account WHERE user_role='2' or user_role='5' ORDER BY log_in_time DESC LIMIT 1";
        $db= new Connection();
        $result = $db->query($sql);
        return mysql_fetch_array($result);    
    }
    public function currentlyLoggedEmployees(){
        $sql ="SELECT * FROM tbl_user_login_account WHERE (log_in_time - log_out_time)>0 AND (user_role='2' or user_role='5') ORDER BY log_in_time DESC ";
        
        $db= new Connection();
        $result = $db->query($sql);
        return $result;    
    }
    public function yearlyIncome($year,$month){
        $sql ="SELECT MONTH(date) as month ,SUM(amount) as Income FROM tbl_course_payments WHERE YEAR(date)='$year' AND MONTH(date)='$month' GROUP BY MONTH(date)";
    
        $db= new Connection();
        $result = $db->query($sql);
        return $result;    
    }
    public function yearlyIncomeByYear(){
        $sql ="SELECT MONTH(date) as month ,SUM(amount) as Income FROM tbl_course_payments GROUP BY YEAR(date), MONTH(date)";
        echo $sql;
        die;
        $db= new Connection();
        $result = $db->query($sql);
        return $result;    
    }
    
    public function getYear(){
        $sql="SELECT DISTINCT(YEAR(date)) AS Year FROM tbl_course_payments";
        $db= new Connection();
        $result = $db->query($sql);
        return $result;    
    }
    public function getTotalPaymentByLectureGrade($year){
        $sql="SELECT SUM(total_hours) AS total,teacher_level,SUM(total_hours)*rate as Amount 
            FROM tbl_lecture_hours INNER JOIN tbl_schedule ON tbl_lecture_hours.schedule_id=tbl_schedule.schedule_id 
            INNER JOIN tbl_course ON tbl_schedule.course=tbl_course.course_id 
            INNER JOIN tbl_teachers ON tbl_course.teacher=tbl_teachers.teacher_id 
            INNER JOIN tbl_teacher_payrates ON tbl_teachers.pay_rate =tbl_teacher_payrates.pay_rate_id 
            WHERE YEAR(tbl_schedule.date)='$year' GROUP BY teacher_level";
        $db= new Connection();
        $result = $db->query($sql);
        return $result;    
    }
    public function getIncomeOFPrimary($year){
        $sql="SELECT course_category_name,SUM(amount) as total_fee 
            FROM tbl_course_payments INNER JOIN tbl_course ON tbl_course.course_id= tbl_course_payments.course_id 
            INNER JOIN tbl_course_category ON tbl_course_category.course_category_id = tbl_course.course_category 
            WHERE YEAR(tbl_course_payments.date)='$year' AND course_category_id BETWEEN '1' AND '4' GROUP BY course_category_name";
        $db= new Connection();
        $result = $db->query($sql);
        return $result;    
    }
    public function getIncomeOFSecondary($year){
        $sql="SELECT course_category_name,SUM(amount) as total_fee 
            FROM tbl_course_payments INNER JOIN tbl_course ON tbl_course.course_id= tbl_course_payments.course_id 
            INNER JOIN tbl_course_category ON tbl_course_category.course_category_id = tbl_course.course_category 
            WHERE YEAR(tbl_course_payments.date)='$year' AND course_category_id BETWEEN '5' AND '8' GROUP BY course_category_name";
        $db= new Connection();
        $result = $db->query($sql);
        return $result;    
    }
    public function getIncomeOFOL($year){
        $sql="SELECT course_category_name,SUM(amount) as total_fee 
            FROM tbl_course_payments INNER JOIN tbl_course ON tbl_course.course_id= tbl_course_payments.course_id 
            INNER JOIN tbl_course_category ON tbl_course_category.course_category_id = tbl_course.course_category 
            WHERE YEAR(tbl_course_payments.date)='$year' AND course_category_id BETWEEN '9' AND '10' GROUP BY course_category_name";
        $db= new Connection();
        $result = $db->query($sql);
        return $result;    
    }
    public function getIncomeOFAL($year){
        $sql="SELECT course_category_name,SUM(amount) as total_fee 
            FROM tbl_course_payments INNER JOIN tbl_course ON tbl_course.course_id= tbl_course_payments.course_id 
            INNER JOIN tbl_course_category ON tbl_course_category.course_category_id = tbl_course.course_category 
            WHERE YEAR(tbl_course_payments.date)='$year' AND course_category_id BETWEEN '11' AND '14' GROUP BY course_category_name";
        $db= new Connection();
        $result = $db->query($sql);
        return $result;    
    }
    public function getIncomeOFOtherCourses($year){
        $sql="SELECT course_category_name,SUM(amount) as total_fee 
            FROM tbl_course_payments INNER JOIN tbl_course ON tbl_course.course_id= tbl_course_payments.course_id 
            INNER JOIN tbl_course_category ON tbl_course_category.course_category_id = tbl_course.course_category 
            WHERE YEAR(tbl_course_payments.date)='$year' AND course_category_id BETWEEN '14' AND '15' GROUP BY course_category_name";
        $db= new Connection();
        $result = $db->query($sql);
        return $result;    
    }
    public function getAdmissionYears(){
        $sql="SELECT DISTINCT (YEAR(payment_date)) AS Year FROM tbl_payments ORDER BY payment_date ASC";
        $db= new Connection();
        $result = $db->query($sql);
        return $result;    
    }
    public function yearlyAdmissionIncome($year,$month){
        $sql ="SELECT MONTH(payment_date) as month, SUM(amount) as Income FROM tbl_payments WHERE YEAR(payment_date)='$year' AND MONTH(payment_date)='$month' GROUP BY MONTH(payment_date)";    
        $db= new Connection();
        $result = $db->query($sql);
        return $result;    
    }
    
}
?>
