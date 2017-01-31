<?php
require_once '../model/student.php';
$action = $_POST['action'];

switch ($action){
    case "edit_marks":
        edit_marks();
        break;
}
function edit_marks(){
    $assignment_mark_id = $_POST['assignment_mark_id'];
    
    $mark = $_POST['marks'];
    $edit_obj= new Students();
    $result = $edit_obj->edit_assignment_marks($assignment_mark_id, $mark);
    header('location:../view/add_assignment_marks.php');
    
}

?>























}


?>
