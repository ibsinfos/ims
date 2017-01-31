<?php
require_once '../model/resources.php';


$action = $_POST['action'];

switch ($action){
    case "add_equipment":
        add_equipment();
        break;
    case "allocate_class":
        allocate_class();
        break;
    case "allocate_resource":
        allocate_resource();
        break;
        
    case "update_resource":
        update_resource();
        break;
    
}
function add_equipment(){
 
    $equipment_name = $_POST['equip_name'];
    $equipment_type = $_POST['equip_type'];
    $brand = $_POST['brand'];
    $purchase_date = $_POST['purchase_date'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    
    $object = new Resources();
    $result = $object->addEquipment($equipment_name, $equipment_type, $brand, $purchase_date, $price, $description);
   
    header('location:../view/resources.php?feedback=added');
    
    
}
function  allocate_class(){
    $schedule = $_POST['schedule'];
    $class_room = $_POST['class_room'];
    $obj = new Resources();
    $result = $obj->allocateClass($schedule, $class_room);
    $set_availability = $obj->updateClassAvailability($class_room);
    header('location:../view/res_allocation.php?feedback=added');
    
    
}
function update_resource(){
    $resource_id = $_REQUEST['resource_id'];
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $purchase_date = $_POST['purchase_date'];
    $availability = $_POST['availability'];
    
    $price = $_POST['price'];
    $description = $_POST['description'];
   
    $object = new Resources();
    $result = $object->updateResource($resource_id, $name, $brand, $price, $purchase_date, $availability, $description);
    
    
    header('location:../view/resources.php?feedback=res_updated');
    
}

function allocate_resource(){
    
    $schedule = $_POST['schedules'];
    $res_name = $_POST['res_name'];
    $resource_count = count($res_name);
//    echo $resource_count;die;
    $res = implode(',', $res_name);
    $res_obj = new Resources();
    $results = $res_obj->allocateResources($schedule, $res);
   
   
 for($i=0;$i<$resource_count;$i++){
     $resource = $res_name[$i];
     $res = $res_obj->updateResourceAvailability($resource);
 }      
  header('location:../view/res_allocation.php?feedback=res_allocated');
}


?>
