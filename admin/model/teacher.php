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
    public function add_login($fname,$nic,$email){
        $sql ="INSERT INTO tbl_user_login_account VALUES('NULL','$fname','$nic','7','$email','0','0','0')";
        $obj = new Connection();
        $result = $obj->query($sql);
        return $result;
    }
    public function get_teacher_by_id($teacher_id){
        $sql = "SELECT * FROM tbl_teachers WHERE teacher_id='$teacher_id'";
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
  
            
}
?>