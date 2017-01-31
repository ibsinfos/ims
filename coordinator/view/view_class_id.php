<?php 
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='5'))
{
 require_once '../model/class.php';
 ?>
<link rel="stylesheet" type="text/css" href="css/teachers.css" media="all">
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
             <form class="form-horizontal" method="" action="" >
            <fieldset>
        <!--<legend><i class="icon32 icon-square-plus"></i>Add new Class Room</legend>-->
                <?php 
                if(isset($_GET['classroom_id'])){
                $classroom_id = $_GET['classroom_id'];    
                $object =  new classes();
                $res = $object->getClassById($classroom_id);
               $availability = $res['availability'];
                
                 ?>
                <div class="control-group">
            <label class="control-label" for="typeahead">Class room name </label>
            <div class="controls">
                <input class="span6 typeahead" name="class_name" value="<?php echo $res['class_name'];?>" type="text" readonly="true">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="">Room type</label>
            <div class="controls">
                
            <input class="span6 typeahead" name="room_type" value="<?php echo $res['classroom_type'];?>" type="text" readonly="true">    

            </div>
        </div>
        <div class="control-group">
            
            <label class="control-label" for="typeahead">Floor </label>
            <div class="controls">
             <input class="span6 typeahead" name="floor" value="<?php echo $res['floor'];?>" type="text" readonly="true">    
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Size</label>
            <div class="controls">
                <input class="span6 typeahead" name="class_size"  value="<?php echo $res['size'];?>" type="text" readonly="true">
            </div>
        </div>
                <div class="control-group">
            <label class="control-label" for="typeahead">availability</label>
            <div class="controls">
                <?php if($availability == 1){
           
           echo "<input type='checkbox' checked='true' readonly='true'/>";     
                }
                else{
                     echo "<input type='checkbox' readonly='readonly'/>";     
                }
             ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Location</label>
            <div class="controls">
                <input class="span6 typeahead" name="location" value="<?php echo $res['location'];?>" type="text" readonly="true"/>
                    
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Description </label>
            <div class="controls">
                <textarea style="height: 18px;" class="span6 autogrow" name="description" type="text" readonly="true"><?php echo $res['description'];?></textarea>
            </div>
        </div>
        <div class="form-actions">
            <a href="class.php">
            <input class="btn btn-primary" value="OK" type="button" width="50px"></a>
            
        </div>
    </fieldset>
</form><?php
                }?>
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