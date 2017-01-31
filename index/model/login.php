<?php
require_once 'connection.php';

class Login
{
    public function get_login($user_name,$password)
    {
        $sql=sprintf("SELECT * FROM tbl_user_login_account WHERE user_name='%s' AND password='%s'",
            $user_name,
            $password);
//        mysql_real_escape_string($user_name);
//        mysql_real_escape_string($password);
//        $sql="SELECT * FROM tbl_user_login_account WHERE user_name='$user_name' AND password='$password'";
        $obj_db=new dbconnect();
        $results=$obj_db->query($sql);
        return $results;
    }
    public function get_reset($user_name,$email){
      $sql = "SELECT * FROM users WHERE user_name= '$user_name' AND email='$email' ";
      $obj_db = new dbconnect();
      $results = $obj_db->query($sql);
      return $results;
      
    }
    public function add_log_in_rec($login_time,$user){
        $sql="UPDATE tbl_user_login_account SET log_in_time ='$login_time' WHERE user_name='$user'";
        $object = new dbconnect();
         $results = $object->query($sql);   
         return $results;
        }

    public function logOut($user,$time_now){
        $sql = "UPDATE tbl_user_login_account SET log_out_time ='$time_now' WHERE user_name='$user'";
        $object = new dbconnect();
        $results = $object->query($sql);
        return $results;
    }
    public function updateLoginHours($no_of_hours,$user){
        $sql="UPDATE tbl_user_login_account SET log_time ='$no_of_hours' WHERE user_name='$user'";
        $object = new dbconnect();
        $results = $object->query($sql);
        return $results;
        
    }
    public function getStudentforParents($parent_id){
        $sql="SELECT * FROM tbl_parent_student_relation INNER JOIN tbl_students ON tbl_students.student_id=tbl_parent_student_relation.student_id WHERE tbl_parent_student_relation.parent_id='$parent_id'";
        $object = new dbconnect();
        $results = $object->query($sql);
        return $results;
    }
    public function getParentId($parent){
        $sql ="SELECT * FROM tbl_parents WHERE login_acc_id='$parent'";
        $object = new dbconnect();
        $results = $object->query($sql);
        return mysql_fetch_array($results);
    }
    public function add_new_faq($question,$answer){
        $sql="INSERT INTO tbl_faq VALUES(NULL,'$question','$answer','0')";
        $object = new dbconnect();
        $results = $object->query($sql);
        return $results;
        
    }
            
}
?>
