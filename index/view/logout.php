<?php
require_once '../model/login.php';
session_start();
$time_now = date("Y-m-d H:i:s");

$user =$_SESSION['cur_user'];
$login_time =$_SESSION['start_time'];

//$no_of_hours = round(abs(strtotime($time_now) - strtotime($login_time))/3600);
//$object = new Login();
//        $result = $object->logIN($login_time, $user);
$object = new Login();
$result= $object->logOut($user, $time_now);
$hour_object = new Login();
$hours = $hour_object->updateLoginHours($no_of_hours, $user);

if($result>0){


unset($_SESSION['cur_user']);
session_destroy();





header("Location: index.php");}
?>
