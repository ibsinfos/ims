<?php
 require_once '../model/users.php';
 
 if(isset ($_POST['chk_user_name']))
{
    $user_name = $_POST['chk_name'];
    $obj_user = new Users();
    $results = $obj_user->chk_available_user($user_name);
    if($results==TRUE)
    {
        echo "available";
    }
}
 ?>
