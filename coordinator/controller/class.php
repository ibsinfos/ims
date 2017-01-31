<?php
require_once '../model/class.php';

$action = $_POST['action'];
switch ($action){
    
    case "add_class":
        add_class();
        break;
    case "update_class":
        update_class();
        break;
}

function add_class(){
 
    
$class_name = $_POST['class_name'];
$room_type = $_POST['room_type'];
$floor = $_POST['floor'];
$class_size = $_POST['class_size'];
$location = $_POST['location'];
$description = $_POST['description'];

$obj = new classes();
$res = $obj->addClass($class_name, $room_type, $floor, $class_size, $location, $description);
header('location:../view/class.php?feedback=added');

}

function update_class(){
 
$classroom_id = $_REQUEST['classroom_id'];    
$class_name = $_POST['class_name'];
$room_type = $_POST['room_type'];
$floor = $_POST['floor'];
$class_size = $_POST['class_size'];
$location = $_POST['location'];
$description = $_POST['description'];


 

$obj = new classes();
$res = $obj->updateClass($classroom_id,$class_name, $room_type, $floor, $class_size, $location, $description);


header('location:../view/class.php?feedback=updated');
 
}
?>
