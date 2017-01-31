<?php
require_once '../model/course.php';

$action = $_POST['action'];

switch ($action){
    case "add_course_cat":
        add_course_cat();
        break;
    case "add_course":
        add_course();
        break;
    case "update_course":
        update_course();
        break;   
    case "payment_scheme":
        add_payment_scheme();
        break;
    case "edit_course_cat":
        edit_course_category();
        break;
    case "updateCoordinator":
        update_coor_prof();
        break;
}

function add_course_cat(){
    $course_cat_name= $_POST['course_category_name'];
    $description = $_POST['description'];
 
    $object = new Course();
    $res = $object->addCourseCategory($course_cat_name, $description);
    header('location:../view/course_category.php');
}
function add_course(){
    $course_name = $_POST['course_name'];
    $course_category = $_POST['course_category'];
    $teacher = $_POST['teacher'];
    $course_fee = $_POST['course_fee'];
    $description = $_POST['description'];
    $object = new Course();
    $res = $object->addNewCourse($course_name, $course_category, $description, $teacher, $course_fee);
    header('location:../view/course.php?feedback=added');
    
    
}
function update_course(){
    $course_id = $_REQUEST['course_id'];
     $course_name = $_POST['course_name'];
    $course_category = $_POST['course_category'];
    $description = $_POST['description'];
    
   $object = new Course();
   $res = $object->updateCourse($course_id, $course_name, $course_category, $description);
   header('location:../view/course.php');
   
}

function add_payment_scheme(){
    $course = $_POST['course'];
    $method = $_POST['method'];
    $payment_date = $_POST['payment_date'];
    $description = $_POST['description'];
    $payment_obj = new Course();
    $result = $payment_obj->add_new_payment_scheme($course, $method, $payment_date, $description);
 header('location:../view/course.php');
 }
 function edit_course_category(){
     $course_category_id = $_POST['course_category_id'];
     $course_category_name= $_POST['course_category'];
     $description = $_POST['description'];
     $edit_obj = new Course();
     $edit_cat_res = $edit_obj->updateCourseCategory($course_category_id, $course_category_name, $description);
     
     $msg = 'updated';
     header('location:../view/course_category.php?msg='.$msg);
 }
 function update_coor_prof(){
    $emp_id = $_POST['emp_id'];
    $title = $_POST['title'];
    $fname=$_POST['fname'];
    $user_name=$_POST['user_name'];
    $lname= $_POST['lname'];
    $dob = $_POST['birthday'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone =$_POST['phone'];
    $nic = $_POST['nic'];
    $login = $_POST['login_acc'];
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
    $update_cooordinator = new Course();
    $recep = $update_cooordinator->editCoordinatorDetails($fname, $lname, $dob, $address, $phone, $email, $nic, $user_name, $prof_image, $emp_id, $login);
    header('location:../view/personal_profile.php');
    
}
?>
