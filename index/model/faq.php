<?php
require_once 'connection.php';

class faq{
    public function getAllFaq(){
        $sql="SELECT * FROM tbl_faq";
        $db = new dbconnect();
        $result = $db->query($sql);
        return $result;
    }
}
?>
