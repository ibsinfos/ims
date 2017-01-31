<?php 
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='1'))
{ 
    require_once '../model/teacher.php';

$teacher_id =$_GET['teacher_id'];
if(isset($teacher_id)){
   $obj = new Teachers();
   $result = $obj->get_teacher_by_id($teacher_id);
   
?>
<!------MANAGE STUDENTS------->
                <div class="tab-pane active" id="manage">
                	
    <button class="pull-right btn btn-info" onclick="printDiv('printableArea')">
<i class="icon icon-print icon-white"></i>
Print
</button>


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
<td>NIC No</td>
<td>
<b><?php echo $result['nic']?></b>
</td>
</tr>
<tr>
<td>Educational Qualifications</td>
<td>
<b><?php echo $result['qualification']?></b>
</td>
</tr>
<tr>
<td>Subjects</td>
<td>
<b><?php echo $result['subjects']?></b>
</td>
</tr>

</tbody>
</table>
</center>
</fieldset>
</form>
</div>
</div>

<?php }}
else
{
//    $_SESSION['cur_user']=NULL;
    unset($_SESSION['cur_user']);
    session_destroy();
    header("location: ../../index/view/index.php");
}
?>