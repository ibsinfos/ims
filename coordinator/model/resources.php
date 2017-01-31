<?php 
require_once 'connection.php';

class Resources{
    
 public function getResourceCategory(){
     $sql = "SELECT * FROM tbl_resource_category";
     $object = new Connection();
     $result = $object->query($sql);
     return $result;
 }
 
 
  public function getResourcesByCategory($category_id){
     $sql = "SELECT tbl_resources . * , tbl_resource_category.resource_category_id FROM tbl_resources INNER JOIN tbl_resource_category ON tbl_resources.category = tbl_resource_category.resource_category_id WHERE tbl_resources.category ='$category_id'";
     $object = new Connection();
     $result = $object->query($sql);
      return $result;
     
 }
  public function getResourceById($resource_id){
        $sql = "SELECT * FROM tbl_resources WHERE resource_id='$resource_id'";
        $object = new Connection();
        $result = $object->query($sql);
        return mysql_fetch_array($result);
       
    }
    public function updateResource($resource_id,$name,$brand,$price,$purchase_date,$availability,$description){
       $sql = "UPDATE tbl_resources SET name='$name',brand='$brand',price='$price',purchase_date='$purchase_date', availability='$availability',description='$description' WHERE resource_id =$resource_id"; 
       $object = new Connection();
       $result = $object->query($sql);
       return $result;
    }

        public function addEquipment($equipment_name,$equipment_type,$brand,$purchase_date,$price,$description){
//       $sql="INSERT INTO tbl_resources VALUES('NULL', $equipment_type', '$equipment_name','$brand', '$purchase_date', '$price', '$description')"; 
              $sql="INSERT INTO tbl_resources VALUES('NULL','$equipment_type','$equipment_name','$brand','$purchase_date','$price','$description')"; 
       $object = new Connection();
       $result = $object->query($sql);
       return $result;
    }

 public function allocateClass($schedule,$class_room){
     $sql = "INSERT INTO tbl_allocation VALUES('NULL','$schedule','$class_room','0')";
     $object = new Connection();
     $result = $object->query($sql);
     return $result;
     
 }
 public function allocateResources($schedule,$res){
     $sql = "UPDATE tbl_allocation SET resource_id='$res' WHERE schedule_id='$schedule'";
     $object = new Connection();
     $result = $object->query($sql);
     return $result;
 }
 public function updateResourceAvailability($resource){
     $sql ="UPDATE tbl_resources SET availability='0' WHERE resource_id='$resource'";
     $object = new Connection();
     $result = $object->query($sql);
     return $result;
     
 }
 public function updateClassAvailability($class_room){
     $sql ="UPDATE tbl_classroom SET availability='0' WHERE classroom_id='$class_room'";
     $object = new Connection();
     $result = $object->query($sql);
     return $result;
     
 }
    
}



?>