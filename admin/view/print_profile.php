<?php 
session_start() ;
require_once('dompdf/dompdf_config.inc.php');
require_once '../model/teacher.php';

$teacher_id = $_GET['teacher_id'];
if(isset($teacher_id)){
   $obj = new Teachers();
   $result =$obj->get_teacher_by_id($teacher_id);
   
?>
<!------MANAGE STUDENTS------->
                <div class="tab-pane active" id="manage">
                	



<div id="printableArea">
<form class="form-horizontal" method="post">
<fieldset>
<legend>
<i class="icon32 icon-user"></i>
Personal Profile
</legend>
<center>
<img class="image_thumbnail_large" style="max-height:200px; max-width:200px;" src="../../store/user_images/<?php echo $result['prof_image'];?>">
<br/><br/><br/>
    <table class="table table-striped " style="width:500px;">
<tbody>
    <tr>
        <td width="150">Name</td>
        <td>
        <b><?php echo $result['first_name'];?> <?php echo $result['last_name']?></b>
        </td>
    </tr>
   
    <tr>
        <td>Birthday</td>
        <td>
        <b><?php echo $result['dob'];?></b>
        </td>
    </tr>
    <tr>
        <td>Gender</td>
        <td>
        <b><?php echo $result['gender'];?></b>
        </td>
    </tr>
    <tr>
        <td>Address</td>
        <td>
        <b><?php echo $result['address']?></b>
        </td>
    </tr>
    <tr>
        <td>Email</td>
        <td>
        <b><?php echo $result['email']?></b>
        </td>
    </tr>
    <tr>
        <td>Contact</td>
        <td>
        <b><?php echo $result['phone']?></b>
        </td>
    </tr>
   <tr>
        <td>NIC</td>
        <td>
        <b><?php echo $result['nic'];?></b>
        </td>
    </tr>
    <tr>
        <td>Educational Qualification</td>
        <td>
        <b><?php echo $result['qualification'];?></b>
        </td>
    </tr>
<tr>
        <td>Subjects</td>
        <td>
        <b><?php echo $result['subjects'];?></b>
        </td>
    </tr>
        
    
</tbody>
</table>
</center>
</fieldset>
</form>
</div>
</div>
<?php
}
else{
    echo "No records found!";
        
}

$file_name=$result['first_name']."_".$result['last_name'].date('Ymd');
$html = ob_get_contents();
ob_clean();
$dompdf = new DOMPDF();
$dompdf->set_paper('letter' , "portrait");
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream($file_name.".pdf");

?>
