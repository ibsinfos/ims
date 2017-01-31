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
    case "updateTeacher":
        update();
        break;
    case "add_lesson":
        add_lesson();
        break;
    case "add_assignment":
        add_assignment();
        break;
    case "add_marks":
        add_assignment_marks();
        break;
    case "update_assignment":
        update_assignment();
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
function update(){
    $teacher = $_POST['teacher_id'];
    
    $title= $_POST['title'];
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $dob = $_POST['birthday'];
   $gender = $_POST['sex'];
   $address = $_POST['address'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $nic = $_POST['nic'];
//   $status = $_POST['status'];
   $edu_qualification = $_POST['edu_qualification'];
   $intrest_subject = $_POST['intrest_subject'];
   $old_image= $_POST['old_image'];
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
      header('location:../view/teachers.php?feedback='.$feedback);
  }
    }
 else {
        $prof_image =$old_image;
    }
    
   $update_teacher = new Teachers();
   $result = $update_teacher->updateTeacher($title, $fname, $lname, $dob, $address, $email, $phone, $nic, $edu_qualification, $intrest_subject, $prof_image, $teacher);
   $msg="successfully_updated";
   header('location:../view/profile.php?feedback='.$msg);
}
function add_lesson(){
    $course= $_POST['courses'];
    $date = $_POST['class_dates'];
    $content = $_POST['content'];
    $obj_add_lesson = new Teachers();
    $results = $obj_add_lesson->addLesson($course, $date, $content);
    header('location:../view/add_lessons.php');
    
}
function add_assignment(){
    $course= $_POST['course'];
    $assignment_title= $_POST['title'];
    $upload_date= $_POST['upload_date'];
    $closing_date = $_POST['closing_date'];
//    $assignment_file = $_FILES['assignment_file'];
    if($_FILES['assignment_file']['size'] < 50000){

     $assignment_file = date('U')."_".$_FILES['assignment_file']['name'];
     move_uploaded_file($_FILES['assignment_file']['tmp_name'], '../../store/assignment_files/'.$assignment_file);
      
}
else{
      $feedback="file_error";
      header('location:../view/add_assignments.php?feedback='.$feedback);
  }
    $lecturer = $_POST['lecturer'];
   
    $content = $_POST['content'];
    
    $add_assign_obj= new Teachers();
    $result = $add_assign_obj->addAssignment($course, $assignment_title, $upload_date, $closing_date, $assignment_file, $lecturer, $content);
    header('location:../view/add_assignments.php');
}
function add_assignment_marks(){
    $course = $_POST['courses'];
    $assignment = $_POST['assignment'];
    $date = date('Y-m-d');
    $student_id = $_POST['stu_id'];
    $count =count($student_id);
    $marks = $_POST['marks'];
     $obj = new Teachers();
   foreach ($student_id as $key => $student){
//              $marks = $marks[$key];
             
        $result = $obj->addAssignmentMarks($student, $date, $assignment,$marks[$key]);
              
          }
//    for($i=0;$i<$count;$i++){
//        $student = $student_id[$i];
//        $marks = $marks[$i];
//        echo $student."<br/>";
//        die;
//         $obj = new Teachers();
//        $result = $obj->addAssignmentMarks($student, $date, $assignment, $marks);
 
//    }
        header('location:../view/add_assignment_marks.php?msg=added');
    
}
function update_assignment(){
    $assignment_id = $_POST['assignment_id'];
    $title = $_POST['title'];
    $course = $_POST['course'];
    $uploaded_date = $_POST['uploaded_date'];
    $due_date = $_POST['due_date'];
    $content = $_POST['content'];
    $old_attachment = $_POST['old_attachment'];
    if($_POST['assignment_file']['name'] !=''){
       if($_FILES['assignment_file']['size'] < 50000){

     $assignment_file = date('U')."_".$_FILES['assignment_file']['name'];
     move_uploaded_file($_FILES['assignment_file']['tmp_name'], '../../store/assignment_files/'.$assignment_file);
      
}
else{
      $feedback="file_error";
      header('location:../view/add_assignments.php?feedback='.$feedback);
  } 
    }
    else {
        $assignment_file = $old_attachment;
    }
    $update_assignment_obj = new Teachers();
    $results =$update_assignment_obj->updateAssignment($title, $course, $uploaded_date, $due_date, $content, $assignment_file, $assignment_id);
    $msg = "updated";
    header('location:../view/add_assignments.php?feedback='.$msg);
    
}
?>
