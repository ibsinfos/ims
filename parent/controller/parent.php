<?php
require_once '../model/parent.php';
$action = $_POST['action'];
switch ($action){
    case "updateparent":
        update_prof();
        break;
}
function update_prof(){
    $parent_name=$_POST['parent_name'];
    $user_name = $_POST['user_name'];
    $occupation = $_POST['occupation'];
    $nic = $_POST['nic'];
    $login_acc = $_POST['login_acc'];
    $address = $_POST['address'];
    $parent_email = $_POST['parent_email'];
    $parent_contact =$_POST['parent_contact'];
    $prof_obj = new Parents();
    $result = $prof_obj->updateParentProfile($parent_name, $user_name, $occupation, $nic, $address, $parent_email, $parent_contact, $login_acc);
    header('location:../view/profile.php?update=successful'); 
}
?>
