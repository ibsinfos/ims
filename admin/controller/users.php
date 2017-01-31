<?php
require_once '../model/users.php';

$action = $_POST['action'];
switch ($action){
case "add_user":
    add_user();
    break;
case "edit_user":
    edit_user();
    break;
case "delete":
    delete();
    break;
case "update_admission_fee":
    update_admission_fee();
    break;
case "set_payment_date":
    set_payment_date();
    break;
case "reset_all_course":
    reset_all_course();
    break;
case "update_faq":
    update_faq();
    break;
case "delete_faq":
    dalete_faq();
    break;
}

function add_user(){
    $title = $_POST['title'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob =$_POST['birthday'];
    $gender = $_POST['sex'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $nic =$_POST['nic'];
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
      header('location:../view/users.php?feedback='.$feedback);
  }
  $user_role = $_POST['user_role'];
  $user_name = $_POST['uname'];
  $password = sha1($_POST['password']);
 
  $login_obj = new Users();
  $result = $login_obj->addUserLogin($user_name, $password, $user_role, $email);
  
  $lastid_onj = new Users();
  $res = $lastid_onj->getLastLoginID();
     $login_acc_id = $res['login_acc_id'];
  
  $emp_obj = new Users();
  $res = $emp_obj->addEmpDetails($title, $fname, $lname, $dob, $gender, $email, $phone, $nic, $address, $prof_image, $user_role, $login_acc_id);
  
  header('location:../view/users.php');
}
function edit_user(){
  
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob =$_POST['birthday'];
    $gender = $_POST['sex'];
    $address= $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $nic =$_POST['nic'];
    $login=$_POST['login_acc'];
    $old_image = $_POST['old_image'];
    if($_FILES['prof_image']['name']!= ""){
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
      header('location:../view/users.php?feedback='.$feedback);
  }
    }
 else {
        $prof_image =$old_image;
    }
  $user_name = $_POST['uname'];
  $password = $_POST['password'];  

  $edit_obj= new Users();
  $result = $edit_obj->editUsers($fname, $lname, $dob, $gender, $address, $phone, $email, $nic, $user_name, $password, $prof_image, $login);
  $msg="profileupdated";
  header('location:../view/profile.php?'.$msg);
}

function delete(){
    $employee_id = $_REQUEST['employee_id'];
    
    $obj = new Users();
    $result =$obj->deleteemployee($employee_id);
    header('location:../view/users.php');
}
function update_admission_fee(){
    $new_admission_fee = $_POST['new_admission_fee'];
    $object = new Users();
    $update_admission = $object->updateCourseAdmissonFee($new_admission_fee);
    header('location:../view/control_panel.php');
}
function set_payment_date(){
    $payment_date = $_POST['payment_date'];
    $objct = new Users();
    $update = $objct->UpdatePaymentDate($payment_date);
    header('location:../view/control_panel.php');
}
function reset_all_course(){
    $reset_obj = new Users();
    $reset = $reset_obj->deleteAllCourses(); 
    header('location:../view/control_panel.php');
}
function update_faq()
{
    $faq_id = $_POST['faq_id'];
    
    $faq_answer = $_POST['faq_answer'];
    $status = $_POST['faq_status'];
    if($status=='0'){
        $done='1';
     }
     else{
         $done='1';
     }
     
     $faq_obj = new Users();
     $res =$faq_obj->updateFaq($faq_id, $faq_answer, $done);
     header('location:../view/faq.php');
     
}
function dalete_faq(){
    $faq_id = $_GET['faq_id'];
    $del_obj =new Users();
    $res = $del_obj->delete_faq($faq_id);
    header('location:../view/faq.php');
}

?>
