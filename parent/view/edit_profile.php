<?php 
require_once '../model/parent.php';

$parent_id =$_GET['parent_id'];
//echo $parent_id;
//die;
if(isset($parent_id)){
   
    
  $object = new Parents();
  $results = $object->getParentDetails($parent_id);
  $result = mysql_fetch_array($results);
//  echo $result['parent_name'];
 
   
?>
<html>
    <head>
                <link rel="stylesheet" type="text/css" href="css/student.css" media="all">
                <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">

</head>


<form class="form-horizontal" method="post" action="../controller/parent.php" enctype="multipart/form-data">
    <fieldset>
        <legend><i class="icon32 icon-square-plus"></i>Edit Details</legend>
            
        <div class="control-group">
            <label class="control-label" for="typeahead">Name</label>
            <div class="controls">
                <input value="<?php echo $result['parent_name'];?>" class="span6 typeahead" name="parent_name" placeholder="" type="text">
            </div>
        </div>
         
         <div class="control-group">
            <label class="control-label" for="typeahead">User name</label>
            <div class="controls">
                <input value="<?php echo $result['user_name'];?>" class="span6 typeahead" name="user_name" placeholder="" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Occupation</label>
            <div class="controls">
                <input value="<?php echo $result['occupation'];?>" class="span6 typeahead" name="occupation" placeholder="" type="text">
            </div>
        </div>
        <input type="hidden" value="<?php echo $result['login_acc_id'];?>" name="login_acc">
           
               <div class="control-group">
            <label class="control-label" >NIC</label>
            <div class="controls">
       <input class="span6" name="nic"  type="text" value="<?php echo $result['nic'];?>"/>
            </div>
        </div>
       

         <div class="control-group">
            <label class="control-label" for="typeahead">Address </label>
            <div class="controls">
                <textarea style="height: 18px;" class="span6 autogrow" name="address"><?php echo $result['address']?></textarea>
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="typeahead">Email </label>
            <div class="controls">
                <input value="<?php echo $result['parent_email']?>" class="span6 typeahead" name="email" placeholder="" data-provide="typeahead" data-items="4" type="text">
                    
            </div>
        </div>
       
        <div class="control-group">
            <label class="control-label" for="typeahead">Phone </label>
            <div class="controls">
                <input class="span6 typeahead" name="parent_contact" placeholder="" value="<?php echo $result['parent_contact']?>" type="text">
            </div>
        </div>
         
        
        
         <input type="hidden" value="<?php echo $result['student_id'];?>" name="teacher_id"/>
             
        <div class="form-actions">
        <input name="action" value="updateparent" type="hidden">
            <input class="btn btn-primary" value="Update" type="submit">
            <input class="btn" value="reset form" type="reset">
        </div>
    </fieldset>
</form>
</html>
<?php
}
?>