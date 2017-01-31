<?php
require_once '../model/manager.php';

$action = $_POST['action'];
switch ($action){
    case "updateManager":
        update();
        break;
    case "upgrade":
        upgrade();
        break;
}
function update(){
    $emp_id = $_POST['emp_id'];
    $title = $_POST['title'];
    $fname=$_POST['fname'];
    $lname= $_POST['lname'];
    $dob = $_POST['birthday'];
    $address = $_POST['address'];
    $user_name=$_POST['user_name'];
    $email = $_POST['email'];
    $phone =$_POST['phone'];
    $nic = $_POST['nic'];
    $login = $_POST['login_acc_id'];
    $old_imge = $_POST['old_image'];
    if($_FILES['prof_image']['name']!=''){
    if((($_FILES['prof_image']['type']=='image/gif')||
   ($_FILES['prof_image']['type']=='image/jpeg')||
   ($_FILES['prof_image']['type']=='image/jpg')||
   ($_FILES['prof_image']['type']=='image/png'))
  &&($_FILES['prof_image']['size'] < 20000)){

     $prof_image = date('U')."_".$_FILES['prof_image']['name'];
     move_uploaded_file($_FILES['prof_image']['tmp_name'], '../../store/user_images/'.$prof_image);
      
}
else{
      $feedback="img_error";
      header('location:../view/personal_profile.php?feedback='.$feedback);
  }
    }
    else{
        $prof_image=$old_imge;
        
    }
    
    $obj = new Manager();
    $res = $obj->updateManager($fname, $lname, $title, $dob, $address, $user_name, $email, $phone, $nic, $login, $prof_image);
    header('location:../view/personal_profile.php');
}
function upgrade(){
    $date = $_POST['upgraded_date'];
    $new_amount = $_POST['new_amount'];
    $level = $_POST['level'];
    $teacher_id = $_POST['teacher_id'];
    
    
    $obj_update = new Manager();
    $result = $obj_update->updateTeacherLevel($level, $teacher_id);
    
    $obj_add = new Manager();
    $add_result = $obj_add->addIncrement($teacher_id, $date, $new_amount);
    header('location:../view/teachers.php?feedback=updated');
    
}
?>
