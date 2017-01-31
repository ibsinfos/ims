<?php
require_once '../model/settings.php';
$action = $_POST['action'];
switch ($action){
    case "createTemplate":
        createNewTemplate();
        break;
}
function createNewTemplate(){
    $sms_title = $_POST['sms_title'];
    $msg = $_POST['msg'];
    
    $add_sms = new Settings();
    $result= $add_sms->addTemplate($sms_title, $msg);
    header('location:../view/sms_settings.php');
}
?>
