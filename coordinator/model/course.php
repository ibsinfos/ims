<?php
require_once 'connection.php';

class Course{
    
    public function addCourseCategory($course_cat_name,$description){
        $sql="INSERT INTO tbl_course_category VALUES('NULL','$course_cat_name','$description')";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
      }
    
    public function getCourseCategory(){
        $sql= "SELECT * FROM tbl_course_category";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }
    public function getCourseCategoryById($course_category_id){
        $sql= "SELECT * FROM tbl_course_category WHERE course_category_id= $course_category_id";
        $object = new Connection();
        $result = $object->query($sql);
        return mysql_fetch_array($result);
    }
    public function addNewCourse($course_name,$course_category,$description,$teacher,$course_fee){
         $sql="INSERT INTO tbl_course VALUES('NULL','$course_category','$course_name','$teacher','$course_fee','$description')";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
       
    }
      public function getCourses(){
        $sql= "SELECT tbl_course.*,tbl_course_category.course_category_id, tbl_course_category.course_category_name FROM tbl_course INNER JOIN tbl_course_category ON tbl_course.course_category = tbl_course_category.course_category_id";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    } 
    public function getCoursesById($course_id){
        $sql= "SELECT tbl_course.*,tbl_course_category.course_category_name FROM tbl_course INNER JOIN tbl_course_category ON tbl_course.course_category = tbl_course_category.course_category_id WHERE tbl_course.course_id='$course_id'";
        $object = new Connection();
        $result = $object->query($sql);
         return mysql_fetch_array($result);
    } 
    
    public function updateCourse($course_id,$course_name,$course_category,$description){
        $sql ="UPDATE tbl_course SET course_name='$course_name', course_category='$course_category',description ='$description' WHERE course_id= '$course_id'";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
        
    }
    public function updateCourseCategory($course_category_id,$course_category_name,$description){
        $sql = "UPDATE tbl_course_category SET course_category_name='$course_category_name', description='$description' WHERE course_category_id='$course_category_id'";
        $object = new Connection();
        $res = $object->query($sql);
        return $res;
        
    }

    public function get_all_teachers(){
        $sql="SELECT * FROM tbl_teachers";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }
    public function add_new_payment_scheme($course,$method,$payment_date,$description){
        $sql = "INSERT INTO tbl_payment_scheme VALUES('NULL','$course','$method','$payment_date','$description')";
        $object = new Connection();
        $result =$object->query($sql);
        return $result;
    }
    public function editCoordinatorDetails($fname,$lname,$dob,$address,$phone,$email,$nic,$user_name,$prof_image,$emp_id,$login){
    $sql1 = "UPDATE tbl_employees SET first_name='$fname',last_name='$lname',dob='$dob',prof_image='$prof_image',phone='$phone',address='$address',nic='$nic' WHERE employee_id='$emp_id'"; 
    $db = new Connection();
    $result = $db->query($sql1);
    $sql2="UPDATE tbl_user_login_account
        SET user_name='$user_name',
        email='$email' WHERE tbl_user_login_account.login_acc_id='$login'";
    $db = new Connection();
    $results = $db ->query($sql2);
    return $results;
    }
    
     public function getScheduleByDate($date){
       $sql = "SELECT * FROM tbl_schedule INNER JOIN tbl_course ON tbl_schedule.course = tbl_course.course_id  INNER JOIN tbl_teachers ON tbl_course.teacher = tbl_teachers.teacher_id WHERE tbl_schedule.date='$date'";
       $object = new Connection();
       $result = $object->query($sql);
       return $result;
    }
    
}

?>
