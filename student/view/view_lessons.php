<?php
require_once '../model/student.php';
    $lesson = $_GET['lesson_id'];
if(isset($lesson)){
$lesson_obj = new Students();
$results =$lesson_obj->getLessonById($lesson);
?>
<link rel="stylesheet" type="text/css" href="css/teachers.css" media="all">
<link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">
<center>
<table width="350" >
    <tr>
        <td>
            <?php echo $results['content'];?>
        </td>
    </tr>
    <tr>
        <td>
            <hr/>
         
          
        </td></tr>
</table>
    </center>
<?php

}
?>
