<?php 
 require_once '../model/users.php';

$employee_id = $_GET['employee_id'];


if(isset($employee_id)){
 $obj = new Users();
 $res = $obj->getEmployeeByID($employee_id);
 $result = mysql_fetch_array($res);
 
?>
<html>
    <head>
                <link rel="stylesheet" type="text/css" href="css/student.css" media="all">
                <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">

</head>


<form class="form-horizontal" method="post" action="../controller/users.php" enctype="multipart/form-data">
    <fieldset>
        <legend><i class="icon32 icon-square-plus"></i>Edit Details</legend>
        
        <div class="control-group">
            <label class="control-label" for="typeahead">First name</label>
            <div class="controls">
                <input value="<?php echo $result['first_name'];?>" class="span6 typeahead" name="fname" placeholder="" type="text">
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="typeahead">Last name</label>
            <div class="controls">
                <input value="<?php echo $result['last_name'];?>" class="span6 typeahead" name="lname" placeholder="" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="date01">Birthday</label>
            <div class="controls">
                    <input class="span6" name="birthday"  type="date" value="<?php echo $result['dob'];?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Sex </label>
            <div class="controls">
                <select id="" name="sex">
                    <option value="">select</option>
                    <option value="male" <?php if($result['gender']== 'male'){ echo 'selected="selected"';}?>>Male</option>
                    <option value="female" <?php if($result['gender']== 'female'){ echo 'selected="selected"';}?>>Female</option>
                </select>
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="typeahead">Address </label>
            <div class="controls">
                <textarea style="height: 18px;" class="span6 autogrow" name="address"><?php echo $result['address'];?></textarea>
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="typeahead">Email </label>
            <div class="controls">
                <input value="<?php echo $result['email'];?>" class="span6 typeahead" name="email" placeholder="" data-provide="typeahead" data-items="4" type="text">
                    
            </div>
        </div>
       
        <div class="control-group">
            <label class="control-label" for="typeahead">Phone </label>
            <div class="controls">
                <input class="span6 typeahead" name="phone" placeholder="" value="<?php echo $result['phone'];?>" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">NIC </label>
            <div class="controls">
                <input class="span6 typeahead" name="nic" placeholder="" value="<?php echo $result['nic']?>" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">User Name </label>
            <div class="controls">
                <input class="span6 typeahead" name="uname" placeholder="" value="<?php echo $result['user_name']?>" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Password </label>
            <div class="controls">
                <input class="span6 typeahead" name="password" value="<?php echo $result['password']?>" type="password">
            </div>
        </div>
         
            
         <label class="control-label" for="typeahead">Profile Image </label>
           <div class="controls">
               <input type="hidden" value="<?php echo $result['prof_image'];?>" name="old_image" /> <img class="image_thumbnail" src="../../store/user_images/<?php echo $result['prof_image'];?>" width="40" height="40" border="5"/>
               <input class="span6 typeahead" name="prof_image" value="" type="file">  
            </div>
        <input class="span6 typeahead" name="login_acc" value="<?php echo $result['login_acc_id']?>" type="hidden">
        <div class="form-actions">
        <input name="action" value="edit_user" type="hidden">
            <input class="btn btn-primary" value="Update" type="submit">
            <input class="btn" value="reset form" type="reset">
        </div>
    </fieldset>
</form>
</html>
<?php
}
?>