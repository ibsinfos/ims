<?php 
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='5'))
{ 
 require_once '../model/course.php';
 ?>
<link rel="stylesheet" type="text/css" href="css/teachers.css" media="all">
<div class="box-content">
        	<!-----CUSTOM MESSAGE------>
        	
                        <!-----CUSTOM MESSAGE------>
            
        	<!----TAB UI FOR TEACHERS-->
                
                <!------VIEW CLASS ROOM DETAILS------->
                <div class="tab-pane" id="create">
             <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
    <fieldset>
        <?php 
        
        if(isset($_GET['course_id'])){
            $course_id = $_GET['course_id'];
            $object = new Course();
            $result = $object->getCoursesById($course_id);
            $description = $result['description'];
            $course_cat = $result['course_category'];
           
            
        }
            
        ?>
        
        <div class="control-group">
            
            <label class="control-label" for="typeahead">Course ID </label>
            <div class="controls">
                <input value="<?php echo $result['course_id'];?>" class="span6 typeahead" name="course_id" placeholder="" type="text" readonly="true">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Course name </label>
            <div class="controls">
                <input value="<?php echo $result['course_name'];?>" class="span6 typeahead" name="course_name" placeholder="" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Course Category </label>
            <div class="controls">
                <select name="course_category" value="" >
                    <?php 
                    $object = new Course();
                    $result = $object->getCourseCategory();
                    while($row = mysql_fetch_array($result)){
//                        
                        ?>
                    <option value="<?php echo $row['course_category_id'];?>" <?php if($row['course_category_id']==$course_cat ){ echo 'selected="selected"';}?>><?php echo $row['course_category_name'];?></option>
                    <?php }?>
                </select>
            </div>
        </div>
               <div class="control-group">
            <label class="control-label" for="typeahead">Description </label>
            <div class="controls">
                <textarea style="height: 18px;" class="span6 autogrow" name="description"><?php echo $description;?> </textarea>
            </div>
        </div>
        <div class="form-actions">
            <!--<input type="hidden" name="action" value="update_course"/>-->
            <input class="btn btn-primary" value="OK" type="submit">
            <input class="btn" value="Reset" type="reset">
        </div>
    </fieldset>
</form>
                       </div>
</div>
<?php }
else
{
//    $_SESSION['cur_user']=NULL;
    unset($_SESSION['cur_user']);
    session_destroy();
    header("location: ../../index/view/index.php");
}
?>