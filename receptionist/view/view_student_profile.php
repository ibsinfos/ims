<?php 
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='2'))
{ 
    require_once '../model/student.php';

$student_id = $_GET['student_id'];
if(isset($student_id)){
   $obj = new Student();
   $result =$obj->get_student_by_id($student_id);
   
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
        <td>Name with initials</td>
        <td>
        <b><?php echo $result['name_initials'];?></b>
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
        <td>School</td>
        <td>
        <b><?php echo $result['school'];?></b>
        </td>
    </tr>
  
    <tr>
        <td>Address</td>
        <td>
        <b><?php echo $result['address'];?></b>
        </td>
    </tr>
    <tr>
        <td>Email</td>
        <td>
        <b><?php echo $result['email'];?></b>
        </td>
    </tr>
    <tr>
        <td>Contact</td>
        <td>
        <b><?php echo $result['phone'];?></b>
        </td>
    </tr>
    <tr>
        <td colspan="2"><legend>Parent Details</legend></td>
    </tr>

    <tr>
        
        <td>Parent's Name</td>
        <td>
        <b><?php echo $result['parent_name'];?></b>
        </td>
    </tr>
     <tr>
        
        <td>Relation</td>
        <td>
        <b><?php echo $result['relation'];?></b>
        </td>
    </tr>
     <tr>
        
        <td>Parent Contact</td>
        <td>
        <b><?php echo $result['parent_contact'];?></b>
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