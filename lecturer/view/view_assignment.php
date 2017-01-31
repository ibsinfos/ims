<link rel="stylesheet" type="text/css" href="css/teachers.css" media="all">
<link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">

<?php 
require_once '../model/teacher.php';

$assignment = $_GET['assignment_id'];
if(isset($assignment)){
    $obj = new Teachers();
    $res = $obj->getAssignmentsById($assignment);
    ?>

<table width="700">
    <tr>
        <td>Assignment Title:</td>
        <td>
            <b> <?php echo $res['title'];?></b>
        </td>
        <td>Course:</td>
         <td>
            <b> <?php echo $res['title'];?></b>
        </td>
    </tr>
    <tr>
        <td>Uploaded ON:</td>
        <td>
            <b> <?php echo $res['uploaded_date'];?></b>
        </td>
         <td>Closing ON:</td>
        <td>
            <b> <?php echo $res['due_date'];?></b>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <br/><br/>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <?php echo $res['content'];?>
        </td>
    </tr>
    <?php 
    if($res['file']!=''){?>
    <tr>
        <td>Attachments</td>
        <td colspan="2">
            <a href="../../store/assignment_files/<?php echo $res['file'];?>" download="<?php echo $res['file'];?>">
                <img src="images/file.png" width="40" height="40"/>
            <a/>
        </td>
    </tr>
    <?php }
    ?>
</table>
<?php

}


?>