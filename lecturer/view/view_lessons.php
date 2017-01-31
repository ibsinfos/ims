<?php
require_once '../model/teacher.php';
    $lesson = $_GET['lesson_id'];
if(isset($lesson)){
$lesson_obj = new Teachers();
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
<!--         <a class="btn btn-info" href="edit_profile.php?teacher_id=<?php echo $teacher_id; ?>" rel="facebox">
                    <i class="icon-edit icon-white"></i>  
                        Edit                                            
                            </a>-->
          
        </td></tr>
</table>
    </center>
<?php

}
?>
