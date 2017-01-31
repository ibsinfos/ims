<?php
require_once '../model/student.php';
require_once '../model/course.php';
$action = $_REQUEST['action'];

switch($action){
    case "add_student":
        new_student();
        break;
    case "delete":
        delete_student();
        break;
    case "updateStuprof":
        update_prof();
        break;
    case "save_result":
        add_attendance();
        break;
    case "updateRecprof":
        update();
        break;
    case "add_course_fee":
        add_fee();
        break;
    case "add_all_course_fees":
        add_all_payments();
        break;
  case "leave_course":
      course_remove();
      break;
}
 
function new_student(){
    
    $admission_no = $_POST['admission_no'];
    $admission_date = $_POST['admission_date'];
    $title= $_POST['title'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $name_initials = $_POST['name_initials'];
    $birthday = $_POST['birthday'];
    $sex = $_POST['sex'];
    $school = $_POST['school'];
    $courses = $_POST['course'];
    $a= count($courses);
    
    for($i=0; $i<$a; $i++){
        $course = $courses[$i];  
    }
    $course = implode(",",$courses);
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $home_phone = $_POST['home_phone'];
    $email = $_POST['email'];
    $parent_name = $_POST['parent_name'];
    $relation =$_POST['relation'];
    $occupation = $_POST['occupation'];
    $nic = $_POST['nic'];
    $parent_contact = $_POST['parent_contact'];
    $parent_email = $_POST['parent_email'];
    $parent_admission_no = "PA".substr($admission_no, 2);
    $student_id =$_POST['new_student_id'];
    $amount = $_POST['admission_amount'];
    $tot_amount = $_POST['amount'];
    $remarks =$_POST['remarks'];
    
     $fee = $tot_amount - $amount;   
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
      header('location:../view/students.php?feedback='.$feedback);
  }
  
  
  if(isset($_POST['existing'])){
       $exsisting_student=$_POST['existing_stduent'];
       
        $object = new Student();
        $stu_login_account = $object->addLoginStudent($admission_no, $parent_admission_no, $email);

        if ($stu_login_account != 0) {

            $id = $object->getLastStudentLoginAccID();
            $stu_id = mysql_fetch_array($id);
            $last_stu_acc_id = $stu_id['login_acc_id'];
            
            $addNewStudent = $object->NewStudent($admission_no, $admission_date, $title, $first_name, $last_name, $name_initials, $birthday, $sex, $school, $course, $address, $phone, $home_phone, $email, $last_stu_acc_id,$prof_image);

            $get_student = $object->getStudentId($exsisting_student);
            $add_student = $get_student['student_id'];
            $parent_details =$object->getParentByStudent($add_student);
            $parent = $parent_details['parent_id'];
            $add_relation= $object->studentParentRelation($add_student, $parent);

            $payment = $object->addAdmissionPayment($admission_date, $student_id, $amount, $fee, $remarks);
          
//            $stu_id = $_POST['new_student_id'];
            $actual_fee = $_POST['actual_fee'];
            $course_payment_status = $_POST['course_payment_status'];
            $crs_payment = $_POST['crs_payment'];
            $course_id = $_POST['course_id'];
            $date = date("Y-m-d");
            $remark = '';
            $count = count($course_id);
            $obj_std = new Course();
            for($x=0; $x<$count; $x++)
        {
            $result = $obj_std->addCoursePayments($student_id, $course_id[$x], $course_payment_status[$x], $date, $actual_fee[$x], $remark);
//            $result_2 = $obj_std->addStudentPaymentMethod($stu_id, $course_id[$x], $course_payment_status[$x]);
        }
        if($result)
        {
//            echo "recrods added";
            header('location:../view/new_student.php?print=facebox&std_id='.$student_id);
        }        
          
          } 
    
  }
  else{
     $object =  new Student();
    $stu_login_account = $object->addLoginStudent($admission_no, $email);
    $parent_login_account = $object->addLoginParent($admission_no, $parent_admission_no, $parent_email);
    
    
    if($stu_login_account>0 && $parent_login_account>0){        
        $obj = new Student();
        $id = $obj->getLastStudentLoginAccID();
        $stu_id= mysql_fetch_array($id);
        $last_stu_acc_id = $stu_id['login_acc_id'];
        

        $id_01 = $obj->getLastParentLoginAccID();
        $parent_id = mysql_fetch_array($id_01);
        $last_parent_id = $parent_id['login_acc_id'];

       $result = $obj->addStudent($admission_no, $admission_date, $title, $first_name, $last_name, $name_initials, $birthday, $sex, $school, $course, $address, $phone, $home_phone, $email, $parent_name, $relation, $occupation, $nic, $parent_contact, $parent_email, $last_stu_acc_id, $last_parent_id, $prof_image);
//       foreach ($new_student as $key=>$new_reocord){
//           if( $key == "new_student_id" )
//           {
//               $student_id = $new_reocord['new_student_id'];
//           }
//           else if($key == "new_parent_id") {
//               $parent_id = $new_reocord['new_parent_id'];
//           }
//          $add_relations= $obj->studentParentRelation($student_id, $parent_id); 
//       }
         $result = $obj->addAdmissionPayment($admission_date, $student_id, $amount, $fee, $remarks);
    

    $actual_fee = $_POST['actual_fee'];
    $course_payment_status = $_POST['course_payment_status'];
    $crs_payment = $_POST['crs_payment'];
    $course_id = $_POST['course_id'];
    $date = date("Y-m-d");
    $remark = '';
    $count = count($course_id);
    $obj_std = new Course();
        for($x=0; $x<$count; $x++)
        {
            $result = $obj_std->addCoursePayments($student_id, $course_id[$x], $course_payment_status[$x], $date, $actual_fee[$x], $remark);
//            $result_2 = $obj_std->addStudentPaymentMethod($stu_id, $course_id[$x], $course_payment_status[$x]);
        }
        if($result)
        {
//            echo "recrods added";
            header('location:../view/new_student.php?print=facebox&std_id='.$student_id);
        }        
    }
       } 
  
}
function update_prof(){
    $title= $_POST['title'];
    $fname= $_POST['fname'];
    $lname=$_POST['lname'];
    $initilas= $_POST['initials'];
    $birthday =$_POST['birthday'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $school =$_POST['school'];
    $student_id=$_POST['student_id'];
    $old_image= $_POST['old_image'];   
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
    $obj_update = new Student();
    $res = $obj_update->updateStudentProf($title, $fname, $lname, $birthday, $initials, $address, $email, $phone, $school, $student_id, $prof_image);
    header('location:../view/students.php');
    
}
function delete_student() {
    $student_id = $_REQUEST['student_id'];
   $object = new Student();
    $result = $object->delete_student_record($student_id);
     header('location:../view/students.php');
  
    
}
function add_attendance(){
          $schedule =$_POST['schedule_id'];
          $course = $_POST['course'];
          $late_state= $_POST['status'];
          $attendance =$_POST['attendance'];
          $count = count($attendance);
          foreach ($attendance as $key => $result){
              $status = $late_state[$key];
              $attendance_obj = new Course();
              $add_result = $attendance_obj->addStudentAttendance($result, $schedule, $status);
              
          }
           header('location:../view/mark_attendance.php');
          
}
function update(){
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
    $update_rec = new Student();
    $recep = $update_rec->editRecDetails($fname, $lname, $dob, $address, $phone, $email, $nic, $user_name, $prof_image, $emp_id, $login);
    header('location:../view/personal_profile.php');
    
}
function add_fee(){
    $stu_id = $_POST['stu_id'];
    $course = $_POST['course'];
    $status = $_POST['status'];
    $pay_date = $_POST['pay_date'];
    $amount = $_POST['amount'];
    $amount = substr($amount, 0,-3);
    $late_state = $_POST['late_state'];
    $obj_course = new Course();
    $receipt = $obj_course->getCourseRecipId();
    $count = mysql_num_rows($receipt);
    if($count > 0)
    {
        $rec_id = mysql_fetch_assoc($receipt);
        $receipt_id = ++$rec_id['recip_id'];
    }
    else 
    {
        $receipt_id = "PR-0001";
    }
    $obj = new Student();
    $add_single = $obj->addOnePayment($receipt_id, $stu_id, $course, $status, $pay_date, $amount, $late_state);
    $msg ='added';
    header('location:../view/course_fee.php?subject='.$course.'&student_id='.$stu_id);
}
function add_all_payments(){
    $std_id = $_POST['std_id'];
    $status = $_POST['status'];
    $course_id = $_POST['course_id'];
    $count = count($status);
    $pay_date = date("Y-m-d");
    $amount = $_POST['amount'];
    $late_state = $_POST['late_status'];
    $obj_course = new Course();
    $receipt = $obj_course->getCourseRecipId();
    $res_count = mysql_num_rows($receipt);
    if($res_count > 0)
    {
        $rec_id = mysql_fetch_assoc($receipt);
        $receipt_id = ++$rec_id['recip_id'];
    }
    else 
    {
        $receipt_id = "PR-0001";
    }
    $obj = new Student();
    for($x=0; $x<$count; $x++)
    {
        $add_single = $obj->addOnePayment($receipt_id,$std_id, $course_id[$x], $status[$x], $pay_date, substr($amount[$x], 0,-3), $late_state[$x]);
        if( $add_single != 1 )
        {
            header('location:../view/course_fee.php?feedback=error');
            break;           
        }
    }
//    $msg ='added';
//    header('location:../view/course_fee.php?feedback='.$msg);
        header('location:../view/course_fee.php?student_id='.$std_id.'&multiple=true');
}
function course_remove(){
    $student = $_POST['student'];
    $obj = new Student();
    $res= $obj->getStudentId($student);
    $student_id = $res['student_id'];
    $course = $_POST['course'];
    $date = $_POST['drop_date'];
    $all_courses= $_POST['all_course'];
    $count = count($course);
    
    $new_course = array_diff($all_courses, $course);
    $new_courses = implode(",", $new_course);
    
    $clear_obj = new Student();
    for($i=0;$i<$count;$i++){
        $reslt= $clear_obj->dropCourse($student_id, $course[$i], $date);
       }
    $update_course = new Student();
    $result = $update_course->UpdateCourses($student, $new_courses);
    header('location:../view/course_drop.php?feedback=updated');
}


?>
