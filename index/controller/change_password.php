<?php
require_once '../model/change_password.php';
$action = $_POST['action'];
switch ($action)
{
    case "change":
        change();
        break;
        
}

function change()
{
    $user=$_POST['user_name'];
    $password=$_POST['current_password'];
    $new_password = $_POST['new_password'];
    
    $obj_change_password = new password();
    $result = $obj_change_password->update_password($user, $new_password, $password);
    
    header('location:../view/index.php');
    }

?>
