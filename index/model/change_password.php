<?php
require_once '../model/connection.php';
class password{
    
public function update_password($user,$password,$new_password){
        $sql ="UPDATE tbl_user_login_account SET password='$password' WHERE user_name='$user' AND password='$new_password'";
        $object = new dbconnect();
        $result = $object->query($sql);
        return $result;
        
    }
    
    }
   
?>
