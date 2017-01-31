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
    case "add_lecture_log":
        add_lecture_log();
        break;
    case "print_transcript";
        print_transcript();
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
   $achievements = $_POST['achievements'];
   $rate = $_POST['level'];
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
$results = $teacher_obj->add_teacher($title, $fname, $lname, $dob, $gender, $address, $email, $phone, $nic, $status, $edu_qualification, $achievements, $intrest_subject, $prof_image, $rate, $last_account_id);
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
    $course= $_POST['course'];
    $date = $_POST['date'];
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

        header('location:../view/add_assignment_marks.php?msg=added');
    
}
function add_lecture_log(){
    $status = $_POST['status'];
    $teacher = $_POST['teacher'];
    $schedule = $_POST['schedule'];
    $actual_start_time = $_POST['act_start'];
    $actual_start = date("H:i:s",strtotime($actual_start_time." "));
    $actual_end_time = $_POST['act_end'];
    $count = count($schedule);
//  
    for($x=0; $x<$count; $x++){
        
    
        if($status[$x]=='0'){
            $obj_cancel = new Teachers();
            $results = $obj_cancel->addCancelledClasses($status[$x], $schedule[$x]);
        }
 else {
     $actual_start = date("H:i:s", strtotime($actual_start_time[$x]));
     $actual_end = date("H:i:s", strtotime($actual_end_time[$x]));
     $act_start = strtotime($actual_start_time[$x]);
     $act_end = strtotime($actual_end_time[$x]);
     $total = abs($act_end-$act_start)/60/60;
//      $total = date("Y-m-d H:i:s",$act_end-$act_start);
//     echo $status[$x]."".$schedule[$x]."".$actual_start."".$teacher[$x]."".$total."<br/>";
//     die;
     $obj_done = new Teachers();
     $res = $obj_done->addDoneClasses($status[$x], $schedule[$x], $actual_start, $actual_end, $total);
     
     }
        
        
    }
    header('location:../view/lecture_log.php?feedback=added');
    }
    function print_transcript(){
        $student_id = $_POST['student_id'];
        $course = $_POST['course'];
        $date = date('Y-m-d H:i:s');
        $print_obj = new Teachers();
        $res = $print_obj->printTranscript($student_id, $course, $date);
        header('location:../view/marks.php');
        
    }
?>
