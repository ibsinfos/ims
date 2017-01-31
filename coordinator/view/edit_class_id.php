<?php 
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='5'))
{

 require_once '../model/class.php';
 ?>
<div class="box-content">
        	<!-----CUSTOM MESSAGE------>
        	
                        <!-----CUSTOM MESSAGE------>
            
        	<!----TAB UI FOR TEACHERS-->
            <ul class="nav nav-tabs" id="myTab">
            	                
            	                
                <!--<li class="active"><a href="#manage">Manage Class Rooms</a></li>-->
                
                <li><a href="#create">Class Room Details</a></li>
            </ul>
                <!------VIEW CLASS ROOM DETAILS------->
                <div class="tab-pane" id="create">
             <form class="form-horizontal" method="post" action="../controller/class.php" enctype="multipart/form-data">
            <fieldset>
        <!--<legend><i class="icon32 icon-square-plus"></i>Add new Class Room</legend>-->
                <?php 
                if(isset($_GET['classroom_id'])){
                $classroom_id = $_GET['classroom_id'];    
                $object =  new classes();
                $res = $object->getClassById($classroom_id);
               
                }
                 ?>
                <div class="control-group">
            <label class="control-label" for="typeahead">Class room id </label>
            <div class="controls">
                
                <input value="<?php echo $res['classroom_id'];?>" class="span6 typeahead" name="classroom_id"  type="text" />
            </div>
        </div>
                <div class="control-group">
            <label class="control-label" for="typeahead">Class room name </label>
            <div class="controls">
                <input value="<?php echo $res['class_name'];?>" class="span6 typeahead" name="class_name"  type="text" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="">Room type</label>
            <div class="controls">
               <?php
               $room_type = $res['classroom_type'];
               
               ?> 
                <select value="<?php echo $res['classroom_type'];?>" name="room_type">
                  <?php 
                  ?>
                     <option value="Lecture hall">Lecture Hall</option>
                    <option value="Conferance">Confereance Room</option>
                </select>
              

            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Floor </label>
            <div class="controls">
                <input  class="span6 typeahead" name="floor" value="<?php echo $res['floor'];?>" type="text" >    
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Size</label>
            <div class="controls">
                <input class="span6 typeahead" name="class_size"  value="<?php echo $res['size'];?>" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Location</label>
            <div class="controls">
                <input class="span6 typeahead" name="location" value="<?php echo $res['location'];?>" type="text" />
                    
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Description </label>
            <div class="controls">
                <textarea   class="span6 autogrow" name="description"><?php echo $res['description'];?></textarea>
            </div>
        </div>
        <div class="form-actions">
             <input type="hidden" name="action" value="update_class"/>
            <input class="btn btn-primary" value="Update" type="submit"/>
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