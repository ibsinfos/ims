<?php
require_once '../model/manager.php';

if(isset($_POST['payable_amount'])){
   $level = $_POST['level'];
   $object = new Manager();
   $res = $object->payRate($level);
   $count = mysql_num_rows($res);
   if($count)
   {
        while($row = mysql_fetch_assoc($res)){
       $data[] = $row;
       
   }
    echo json_encode($data);
   }
   else
   {
       echo 'no records';
   }
   
}
?>
