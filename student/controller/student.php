<?php
require_once '../model/student.php';

$action = $_POST['action'];
switch ($action){
    case "updateStudent":
        update_stu_prof();
        break;
    case "request_transcript":
        request();
        break;
    case "add_evaluation":
        evaluation();
        break;
        
}
function update_stu_prof(){
    $title = $_POST['title'];
    $fname= $_POST['fname'];
    $user_name = $_POST['user_name'];
    $lname = $_POST['lname'];
    $login_acc = $_POST['login_acc'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone =$_POST['phone'];
    $school = $_POST['school'];
    $old_image = $_POST['old_image'];
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
    $obj = new Students();
    $res = $obj->updateStudentProf($title, $fname, $lname, $birthday, $address, $email, $phone, $school, $student_id, $prof_image, $user_name, $login_acc);
    header('location:../view/profile.php?updated_successfully');
    
}
function request(){
    
    $date = date('Y-m-d H:i:s');
    $student_id = $_POST['student_id'];
    $course = $_POST['course'];
    
    $obj = new Students();
    $res = $obj->requestTranscript($date, $student_id, $course);
    $msg = "Your request has been sent Successfully!!!.<br/>
        for more details contact the Institute ";
    header('location:../view/marks.php?msg='.base64_encode($msg));
    
}
function evaluation(){
    $student_id= $_POST['student_id'];
    $course_id = $_POST['course'];
    $c_one = $_POST['c_one'];
    $c_two = $_POST['c_two'];
    $c_three = $_POST['c_three'];
    $c_four = $_POST['c_four'];
    $c_five = $_POST['c_five'];
    $c_six = $_POST['c_six'];
    $l_one = $_POST['l_one'];
    $l_two = $_POST['l_two'];
    $l_three = $_POST['l_three'];
    $l_four = $_POST['l_four'];
    $l_five = $_POST['l_five'];
    $l_six = $_POST['l_six'];
    
    
    $evaluation = new Students();
    $res = $evaluation->lectureEvaluation($student_id, $course_id, $l_one, $l_two, $l_three, $l_four, $l_five, $l_six);
    $course_evaluation = $evaluation->courseEvaluation($student_id, $course_id, $c_one, $c_two, $c_three, $c_four, $c_five, $c_six);
    header('location:../view/evaluation.php');
    
    
    
    
    
}
?>
