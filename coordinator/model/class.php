<?php

require_once 'connection.php';

class classes{
    
    public function addClass($class_name,$room_type,$floor,$class_size,$location,$description){
       $sql="INSERT INTO tbl_classroom VALUES('NULL', '$class_name',' $room_type','$class_size', '$floor', '$location', '$description')"; 
       $object = new Connection();
       $result = $object->query($sql);
       return $result;
    }
    public function getClasses(){
       $sql="SELECT * FROM tbl_classroom";
       $object = new Connection();
       $result= $object->query($sql);
       return $result;
        
    }
    public function getAvailableClasses(){
       $sql="SELECT * FROM tbl_classroom WHERE availability='1'";
       $object = new Connection();
       $result= $object->query($sql);
       return $result;
        
    }
    public function getClassById($classroom_id){
        $sql = "SELECT * FROM tbl_classroom WHERE classroom_id='$classroom_id'";
        $object = new Connection();
        $result = $object->query($sql);
        return mysql_fetch_array($result);
       
    }
    public function updateClass($classroom_id,$class_name,$room_type,$floor,$class_size,$location,$description){
       $sql = "UPDATE tbl_classroom SET class_name='$class_name',classroom_type='$room_type',floor='$floor',size='$class_size',location='$location',description='$description' WHERE classroom_id='$classroom_id'"; 
       $object = new Connection();
       $result = $object->query($sql);
       return $result;
    }
    
    
    
}
?>
