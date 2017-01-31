<?php
require_once '../model/teacher.php';
$action = $_REQUEST['action'];

switch ($action){
    case "newTeacher":
        addTeacher();
        break;
    case "delete":
        delete();
        break;
}


function addTeacher(){
   $title= $_POST['title'];
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $dob = $_POST['birthday'];
   $gender = $_POST['sex'];
   $address = $_POST['address'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $nic = $_POST['nic'];
   $status = $_POST['status'];
   $edu_qualification = $_POST['edu_qualification'];
   $intrest_subject = $_POST['intrest_subject'];
     
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
      header('location:../view/teachers.php?feedback='.$feedback);
  }
$user_account_obj = new Teachers();
$result = $user_account_obj->add_login($fname, $nic, $email);
if($result!=0){

    $obj_new_teacher = new Teachers();
    $res = $obj_new_teacher->getLastTeachetLoginAccID();
    $last_id = mysql_fetch_array($res);
    $last_account_id = $last_id['login_acc_id'];
    
$teacher_obj = new Teachers();
$results = $teacher_obj->add_teacher($title, $fname, $lname, $dob, $gender, $address, $email, $phone, $nic, $status, $edu_qualification, $intrest_subject, $prof_image, $last_account_id);
header('location:../view/teachers.php');
}

}
function delete(){
    $teacher_id = $_REQUEST['teacher_id'];
    
    $obj = new Teachers();
    $result =$obj->delete_teacher($teacher_id);
    header('location:../view/teachers.php');
}
?>
