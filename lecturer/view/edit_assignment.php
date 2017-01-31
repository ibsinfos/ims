<style type="text/css" title="style">
         @import "css/jquery-te-1.3.6.css";
         @import "css/pepper-grinder/jquery-ui-1.10.3.custom.css";
        </style>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
        <script type="text/javascript" src="js/jquery-te-1.3.6.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/teachers.css" media="all">
<link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">

<?php 
require_once '../model/teacher.php';

$assignment = $_GET['assignment_id'];
if(isset($assignment)){
    $obj = new Teachers();
    $res = $obj->getAssignmentsById($assignment);
    ?>
<form class="form-horizontal" method="post" action="../controller/teacher.php" enctype="multipart/form-data">
    <input type="hidden" name="assignment_id" value="<?php echo $res['assignment_id'];?>">
    <div class="control-group">
        <label class="control-label" for="typeahead">Assignment Title:</label>
        <div class="controls">
            <input type="text" name="title" value="<?php echo $res['title'];?>" />
        </div> 
        </div>
    <div class="control-group">
        <label class="control-label" for="typeahead">Course:</label>
        <div class="controls">
        <input type="text" name="course_name" value="<?php echo $res['course_name'];?>" readonly="readonly" />
        <input type="hidden" name="course" value="<?php echo $res['course_id'];?>" readonly="readonly" />
        </div>
        </div>
    <div class="control-group">
        <label class="control-label" for="typeahead">Uploaded ON:</label>
        <div class="controls">           
        <input type="text" name="uploaded_date" value="<?php echo $res['uploaded_date'];?>" readonly="readonly" />
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="typeahead">Closing ON:</label>    
            <div class="controls">
            <input type="text" name="due_date" value="<?php echo $res['due_date'];?>" />
        </div>
        </div>
            
    <?php
            if($res['file']!=''){?>
    <div class="control-group">
          <label class="control-label" for="typeahead">Content: </label>  
          <div class="controls">
          
              <!--<textarea style="height: 18px;" class="span6 autogrow" name="address" id="content"></textarea>-->   
              <textarea name="content" class="jqte-test"><b><u><span style="color:rgb(0, 148, 133);"><?php echo $res['content'];?></span></u></b></textarea>
          </div>
          
        </div>
    <div class="control-group">
        
        <label class="control-label" for="typeahead">Attachments</label>  
        <div class="controls">
            <input type="hidden" name="old_attachment" value="<?php echo $res['file'];?>">   
        <a href="../../store/assignment_files/<?php echo $res['file'];?>" download="<?php echo $res['file'];?>">
                <img src="images/file.png" width="40" height="40"/>
            </a>
            <?php 
            
            }?>
        </div>   
   </div>
    <div class="control-group">
          <label class="control-label" for="typeahead">Attach Files: </label>  
          <div class="controls">
             <input class="span6 typeahead" name="assignment_file" placeholder="" value="" type="file">  
             
          </div>
        </div>
    <div class="form-actions">
        <input name="action" value="update_assignment" type="hidden">
            <input class="btn btn-primary" value="Update Assignment" type="submit">
            <input class="btn" value="reset form" type="reset">
        </div>
    </form>
    <?php 
    
    
    }
?>
<script>
    // call text editor
	$('.jqte-test').jqte();
</script>