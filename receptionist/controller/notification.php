<?php
require_once '../model/student.php';
require_once '../model/course.php';
$action = $_REQUEST['action'];

switch($action){
    case "Send_SMS":
        send_sms_notification();
        break;
    case "Send_EMAIL":
        send_email_notification();
        break;
}

function send_sms_notification()
{
    $course_id = $_POST['course'];
//    $cousr_cat = $_POST['course_and_cat'];
    $std_obj = new Student();    
    $student_id = $_POST['send_notification'];
    foreach ($student_id as $row)
    {        
        $res = $std_obj->get_student_phone_by_id($row);
        if($res['phone'] != '' || $res['phone'] != NULL)
        {
//            $student_email_list["student"][] = array($res['student_id'] => $res['email']);
            $phone_list[] = array($res['student_id'] => $res['phone']);
        }
        $totlist[] = $res['phone'];
    }
    $phone_list_count = count($phone_list);
    $tot_count = count($totlist);
    
    foreach ($phone_list as $key => $phone_nums) {
        foreach($phone_nums as $key => $numbers)
        {
            $recepient = $numbers;
            $message = $_POST['message'];
            $gatewayURL  =   'http://localhost:9333/ozeki?'; 
            $request = 'login=admin'; 
            $request .= '&password=abc123'; 
            $request .= '&action=sendMessage'; 
            $request .= '&messageType=SMS:TEXT'; 
            $request .= '&recepient='.urlencode($recepient); 
            $request .= '&messageData='.urlencode($message); 

            $url =  $gatewayURL . $request;  

            //Open the URL to send the message 
            file($url);
            //add notification to the DB
            $to = "student";
            $notification = "sms";
            $date = date("Y-m-d");
            
            $std_obj->addNotification($key, $notification, $to, $date, $course_id);
        }
    }
    if($tot_count == $phone_list_count)
    {
        header('location:../view/due_payments.php?sent_count=allsent');
    }
    else if($tot_count > $phone_list_count)
    {
        header('location:../view/due_payments.php?sent_count='.$phone_list_count);        
    }
    header('location:../view/due_payments.php?sent_count='.$phone_list_count.'&tot_count='.$tot_count);
}
function send_email_notification()
{
    $course_id = $_POST['course'];
    $cousr_cat = $_POST['course_and_cat'];
    $std_obj = new Student();    
    $student_id = $_POST['send_notification'];
    foreach ($student_id as $row)
    {        
        $res = $std_obj->get_student_email_by_id($row);
        if($res['email'] != '' || $res['email'] != NULL)
        {
            $student_email_list["student"][] = array($res['student_id'] => $res['email']);
        }
        else if($res['parent_email'] != '')
        {
            $parent_email_list["parent"][] = array($res['student_id'] => $res['parent_email']);
        }
        $totlist[] = $res['email'];
    }
    $email_list_count = count($student_email_list);
    $parent_email_list_count = count($parent_email_list);
    $tot_count = count($totlist);
    
    //error_reporting(E_ALL);
            error_reporting(E_STRICT);

            date_default_timezone_set('Asia/Colombo');

//require_once('../class.phpmailer.php');
            include("../../phpmailer/class.phpmailer.php");
            include("../../phpmailer/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
    $mail = new PHPMailer();
    
    $results = array_merge($student_email_list, $parent_email_list);
    if($email_list_count > 0 || $parent_email_list_count > 0)
    {
        foreach ($results as $key => $email_rows)
        {
            if($key == 'student')
            {
                $to = $key;
                $body = file_get_contents('../view/templete_email.html');
            }
            else {
                $to = $key;
                $body = file_get_contents('../view/templete_email_parent.html');
            }
            foreach ($email_rows as $test)
            {
                foreach ($test as $key => $value) {
                $mail->IsSMTP(); // telling the class to use SMTP
                $mail->Host = "mail.yourdomain.com"; // SMTP server
                $mail->SMTPDebug = 2;                     // enables SMTP debug information (for testing)
                $mail->SMTPAuth = true;                  // enable SMTP authentication
                $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
                $mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
                $mail->Port = 465;                   // set the SMTP port for the GMAIL server
                $mail->Username = "user.name@gmail.com";  // GMAIL username
                $mail->Password = "password";            // GMAIL password
                $mail->SetFrom('test@gmail.com', 'Test');
                $mail->AddReplyTo("test@gmail.com", "test");
                $date = date("M, Y");
                $mail->Subject =  "Due Payment Notification for - ".$cousr_cat." ".$date.".";
                $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
                $mail->IsHTML(true);
                $mail->MsgHTML($body);
                $mail->AddAddress($value, "");
                $mail->AddEmbeddedImage("../../phpmailer/examples/images/new-logo.jpg", "logo");      // attachment
                $mail->Send();
                $mail->ClearAddresses(); // remove previous email addresses
                //add notification to the DB
                $notification = "email";
                $date = date("Y-m-d");
                $std_obj->addNotification($key, $notification, $to, $date, $course_id);
            }
         }            
      }
    }
    if($tot_count == $email_list_count)
    {
        header('location:../view/due_payments.php?sent_count=allsent');
    }
    else if($tot_count > $email_list_count)
    {
        header('location:../view/due_payments.php?sent_count='.$email_list_count."&parent=".$parent_email_list_count);        
    }
    header('location:../view/due_payments.php?sent_count='.$email_list_count."&parent=".$parent_email_list_count.'&tot_count='.$tot_count);
}
?>