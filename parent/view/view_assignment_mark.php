<link rel="stylesheet" type="text/css" href="css/teachers.css" media="all">
<link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">

<?php 
require_once '../model/teacher.php';

$assignment = $_GET['assignment_mark_id'];

if(isset($assignment)){
    $obj = new Teachers();
    $res = $obj->getAssignmentMarksId($assignment);
    ?>
<form action="" >
<table width="500">
    
        <td>Assignment Title:</td>
        <td>
            <b><?php echo $res['title'];?></b>
        </td>
    </tr>
    <tr>
        <td>Marks:</td>
         <td>
            <b><?php echo $res['Marks'];?></b>
        </td>
    </tr>
    <?php
    if($res['Marks']>75){
        $grade = "A";
    }
    elseif ($res['Marks']>65) {
        $grade = "B";
}
elseif ($res['Marks']>55) {
        $grade = "C";
}
elseif ($res['Marks']>35) {
        $grade = "S";
}
else {
        $grade = "F";
}
    ?>
        <tr>
         <td>Grade:</td>
        <td>
            <b><?php echo $grade;?></b>
        </td>
    </tr>
    <tr><td colspan="2">
         <div class="form-actions">
                
            <input class="btn btn-primary" value="Create student" type="button" onclick="payment_form();"/>
            <input class="btn" value="reset form" type="reset"/>
        </div>
            </td>
    </tr>
    </table>
    </form>
    <?php }
    ?>