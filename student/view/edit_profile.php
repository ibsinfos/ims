<?php 
require_once '../model/student.php';

$student_id =$_GET['student_id'];
if(isset($student_id)){
   
    
   $obj = new Students();
   $result = $obj->getStudentById($student_id);
   
?>
<html><head>
                <link rel="stylesheet" type="text/css" href="css/student.css" media="all">
                <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">

</head>


<form class="form-horizontal" method="post" action="../controller/student.php" enctype="multipart/form-data">
    <fieldset>
        <legend><i class="icon32 icon-square-plus"></i>Edit Details</legend>
        <div class="control-group">
            <label class="control-label" for="typeahead">Title</label>
            <div class="controls">
                <select id="" name="title" class="span6 typeahead" value="">
                   
                    <option value="Mr"<?php if($result['title']== 'Mr'){ echo 'selected="selected"';}?>>Mr</option>
                    <option value="Miss"<?php if($result['title']== 'Miss'){ echo 'selected="selected"';}?>>Miss</option>
                    <option value="Mrs" <?php if($result['titlle']== 'Mrs'){ echo 'selected="selected"';}?>>Mrs</option>
                    <option value="Rev" <?php if($result['title']== 'Rev'){ echo 'selected="selected"';}?>>Rev</option>
                </select>
            </div>
        </div>
        
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
            <label class="control-label" for="typeahead">User name</label>
            <div class="controls">
                <input value="<?php echo $result['user_name'];?>" class="span6 typeahead" name="user_name" placeholder="" type="text">
            </div>
        </div>
        <input type="hidden" value="<?php echo $result['login_acc_id'];?>" name="login_acc">
           
               <div class="control-group">
            <label class="control-label" for="date01">Birthday</label>
            <div class="controls">
       <input class="span6" name="birthday"  type="date" value="<?php echo $result['dob'];?>"/>
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
                <input value="<?php echo $result['email']?>" class="span6 typeahead" name="email" placeholder="" data-provide="typeahead" data-items="4" type="text">
                    
            </div>
        </div>
       
        <div class="control-group">
            <label class="control-label" for="typeahead">Phone </label>
            <div class="controls">
                <input class="span6 typeahead" name="phone" placeholder="" value="<?php echo $result['phone']?>" type="text">
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="typeahead">School</label>
            <div class="controls">
               <input class="span6 typeahead" name="school" placeholder="" value="<?php echo $result['school']?>" type="text">
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="typeahead">Subjects </label>
            <div class="controls">
                <textarea style="height: 18px;" class="span6 autogrow" name="subjects">
                    <?php 
                                
                                $obj= new Students();
                                $result_1 = $obj->getCoursesByStudent($student_id);
                                if($count = mysql_num_rows($result_1)){
                                while ($row =  mysql_fetch_array($result_1)){
                                    echo $row['course_name'];
                                    
                                }}
                                
                            ?> 
                </textarea>
            </div>
        </div>
        <input type="hidden" value="<?php echo $result['prof_image'];?>" name="old_image"/>
         <label class="control-label" for="typeahead">Profile Image </label>
           <div class="controls">
              <img class="image_thumbnail" src="../../store/user_images/<?php echo $result['prof_image'];?>" width="40" height="40" border="5"/>
               <input class="span6 typeahead" name="prof_image" placeholder="" value="" type="file">  
            </div>
         <input type="hidden" value="<?php echo $result['student_id'];?>" name="teacher_id"/>
             
        <div class="form-actions">
        <input name="action" value="updateStudent" type="hidden">
            <input class="btn btn-primary" value="Update" type="submit">
            <input class="btn" value="reset form" type="reset">
        </div>
    </fieldset>
</form>
</html>
<?php
}
?>