<?php
require_once 'connection.php';

class Settings{
    public function addTemplate($sms_title,$msg){
        $sql = "INSERT INTO tbl_sms_templates VALUES('NULL','$sms_title',$msg')";
        $object = new Connection();
        $result = $object->query($sql);
        return $result;
    }
    
}

?>
