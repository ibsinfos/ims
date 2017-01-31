<?php 
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='5'))
{

 require_once '../model/course.php';
 $course_category_id = $_GET['course_category_id'];
 if(isset($_GET['course_category_id'])){
 $new_obj = new Course();
 $result = $new_obj->getCourseCategoryById($course_category_id);
 
 
 ?>
<div class="box-content">
        	<!-----CUSTOM MESSAGE------>
        	
                        <!-----CUSTOM MESSAGE------>
            
        	<!----TAB UI FOR TEACHERS-->
            <ul class="nav nav-tabs" id="myTab">
            	                
            	                
                <!--<li class="active"><a href="#manage">Manage Class Rooms</a></li>-->
                
                <li><a href="#create">Course Category Details</a></li>
            </ul>
                <!------VIEW CLASS ROOM DETAILS------->
                <div class="tab-pane" id="create">
             <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
            <fieldset>
        <!--<legend><i class="icon32 icon-square-plus"></i>Add new Class Room</legend>-->
                
                
                <div class="control-group">
            <label class="control-label" for="typeahead">Course Category id </label>
            <div class="controls">
                
                <input value="<?php echo $result['course_category_id'];?>" class="span6 typeahead" name="course_category_id"  type="text" readonly="true"/>
            </div>
        </div>
                <div class="control-group">
            <label class="control-label" for="typeahead">Course Category </label>
            <div class="controls">
                <input value="<?php echo $result['course_category_name'];?>" class="span6 typeahead" name="course_category"  type="text" readonly="true" />
            </div>
        </div>
         
        <div class="control-group">
            <label class="control-label" for="typeahead">Description </label>
            <div class="controls">
                <textarea   class="span6 autogrow" name="description"><?php echo $result['description'];?></textarea>
            </div>
        </div>
        <div class="form-actions">
            
            <input class="btn btn-primary" value="OK" type="button"/>
        </div>
    </fieldset>
</form>
                    
                       </div>
			
		</div>
<?php }

}
else
{
//    $_SESSION['cur_user']=NULL;
    unset($_SESSION['cur_user']);
    session_destroy();
    header("location: ../../index/view/index.php");
}
?>