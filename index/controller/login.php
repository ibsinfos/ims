<?php
session_start();
require_once '../model/login.php';
$action = $_POST['action'];

switch ($action)
{
    case "login":
        login();
        break;
    case "reset":
        reset_password();
        break;
    case "student_uname":
        student_switch();
        break;
    case "add_new_faq":
        add_new_faq();
        break;
}

function login()
{
    
    $user_name = $_POST['user_name'];
    $password = sha1($_POST['password']);
    
    if($user_name==null||empty ($user_name)||$user_name==" ")
    {
        $error = "un";
        header('location:../view/index.php?error='.$error);
        die;
    }
    else if($password==null||empty($password)||$password==" ")
    {
        $error = "password";        
        header('location:../view/?error='.$error);
        die;
    } 
    
    $obj_login = new Login();    
    $results = $obj_login->get_login($user_name, $password);
    $count = mysql_num_rows($results);

    if($count>0)
    {
       $row = mysql_fetch_array($results);       //need to start the session to track the user. 
       
       $_SESSION['user_id'] = $row['login_acc_id'];
        $_SESSION['cur_user']=$row['user_name'];
       
        $_SESSION['user_role']=$row['user_role'];
        $_SESSION['start_time']= date("Y-m-d H:i:s");
        $login_time = $_SESSION['start_time'];
        $user =$_SESSION['cur_user'];
        $time_now = date("Y-m-d H:i:s");
        $no_of_hours = round(abs(strtotime($time_now) - strtotime($login_time))/3600);
        $res = $obj_login->add_log_in_rec($login_time, $user);
        
        
       
        if ($_SESSION['user_role'] == '1')
        {
            header("location:../../admin/view/dashboard.php");
        }
        else if($_SESSION['user_role']=='6')
        {
            header("location:../../manager/view/dashboard.php");
        }
        else if($_SESSION['user_role']=='3') 
        {
            header("location:../../student/view/dashboard.php");
        }
        else if($_SESSION['user_role']=='2') 
        {
            header("location:../../receptionist/view/dashboard.php");
        }
        else if($_SESSION['user_role']=='5') 
        {
            header("location:../../coordinator/view/dashboard.php");
        }
       else if($_SESSION['user_role']=='4') 
        {
           $objects = new Login();
           $parent = $_SESSION['user_id'];
           $res = $objects->getParentId($parent);
           $parent_id = $res['parent_id'];
           $students = $objects->getStudentforParents($parent_id);
           
           $student_count = mysql_num_rows($students);
                      
           if($student_count < 2){
            header("location:../../parent/view/dashboard.php");
            
            }
            else{
                header("location:../view/select_student.php");
            }
        }
        else if($_SESSION['user_role']=='7') 
        {
            header("location:../../lecturer/view/dashboard.php");
        }
    }
 else 
    {
         $error = "login_error";
        header('location:../view/index.php?error='.$error);
    }

    

}

function reset_password(){
    $user_name = $_POST['user_name'];
    $email = $_POST['user_email'];
    
    $object = new Login();
    $res = $object->get_reset($user_name, $email);
    $count = mysql_num_rows($res);
    if($count == 1){
        $row = mysql_fetch_array($res);
        $user_id = $row['user_id'];
        $new_password = rand();
        $reset_password = md5($new_password);
        $new_record = $object->update_password($user_id, $new_password);
        if($new_record){
           
            //error_reporting(E_ALL);
            error_reporting(E_STRICT);

            date_default_timezone_set('America/Toronto');

//require_once('../class.phpmailer.php');
            include("../../phpmailer/class.phpmailer.php");
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

            $mail = new PHPMailer();

//$body             = file_get_contents('contents.html');
//$body             = preg_replace('/[\]/','',$body);
            $mail->IsHTML(false);
            $mail->Body = "Your password have been changed please use the following " . $new_password . " to login to the system";
            $mail->IsSMTP(); // telling the class to use SMTP
            $mail->Host = "mail.yourdomain.com"; // SMTP server
            $mail->SMTPDebug = 2;                     // enables SMTP debug information (for testing)
            // 1 = errors and messages
            // 2 = messages only
            $mail->SMTPAuth = true;                  // enable SMTP authentication
            $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
            $mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
            $mail->Port = 465;                   // set the SMTP port for the GMAIL server
            $mail->Username = "user.name@gmail.com";  // GMAIL username
            $mail->Password = "password";            // GMAIL password

            $mail->SetFrom('test@gmail.com', 'Test');

            $mail->AddReplyTo("test@gmail.com", "Test");

            $mail->Subject = "Re-set the password";

            $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
//$mail->MsgHTML($body);
            $address = $email;
            $mail->AddAddress($address, $user_name);

//$mail->AddAttachment("../../phpmailer-01/examples/images/phpmailer.gif");      // attachment
//$mail->AddAttachment("../../phpmailer-01/examples/images/phpmailer_mini.gif"); // attachment

            if (!$mail->Send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
                
            } else {
                echo "Message sent!";
                
            }
            header('location:../view/index.php?req=1');
        }
        else {
            header('location:../view/index.php?req=2');
            }
    }
    else{
               header('location:../view/index.php?req=0');
    }
    
    
}
function student_switch(){
    $student = $_POST['student'];
    $_SESSION['student'] = $student;
     header("location:../../parent/view/dashboard.php");
    
}
function add_new_faq(){
    $question= $_POST['question'];
    $answer = $_POST['faq_answer'];
    
    $faq = new Login();
    $results= $faq->add_new_faq($question, $answer);
    header('location:../view/faq_results.php');
}

?>