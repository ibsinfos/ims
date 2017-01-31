<?php 
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='5'))
{
 require_once '../model/resources.php';
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
             <form class="form-horizontal" method="post" action="../controller/resources.php" enctype="multipart/form-data">
            <fieldset>
        <!--<legend><i class="icon32 icon-square-plus"></i>Add new Class Room</legend>-->
                <?php 
                if(isset($_GET['resource_id'])){
                $resource_id = $_GET['resource_id']; 
                
                $object = new Resources();
                 $res = $object->getResourceById($resource_id);
                $availability = $res['availability'];
                }
                 ?>
                <div class="control-group">
            <label class="control-label" for="typeahead">Resource ID </label>
            <div class="controls">
                <input class="span6 typeahead" name="resource_id" value="<?php echo $res['resource_id'];?>" type="text" readonly="true">
            </div>
                </div>
                <div class="control-group">
            <label class="control-label" for="typeahead">Resource name </label>
            <div class="controls">
                <input class="span6 typeahead" name="name" value="<?php echo $res['name'];?>" type="text" >
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="">brand</label>
            <div class="controls">
            <input class="span6 typeahead" name="brand" value="<?php echo $res['brand'];?>" type="text" >    

            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead"> Price</label>
            <div class="controls">
                <input class="span6 typeahead" name="price" value="<?php echo $res['price'];?>" type="text" >    
            </div>
        </div>
               
             <div class="control-group">
            <label class="control-label" for="typeahead">Availability</label>
            <div class="controls">
                 
               
                <select name="availability">
                <?php if($availability == 1){
                
               ?>
                <option selected="true" value="1">available</option>
                <option value="0">Not available</option>
                  <?php }
                else{?>
                    <option selected="true" value="0">Not available</option>
                    <option  value="1">available</option>
               <?php
               }?>       
                </select>
               
               
            </div>
        
                    
            </div>
        
                
        <div class="control-group">
            <label class="control-label" for="typeahead">Purchase Date</label>
            <div class="controls">
                <input class="span6 typeahead" name="purchase_date"  value="<?php echo $res['purchase_date'];?>" type="text" >
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Description </label>
            <div class="controls">
                <textarea style="height: 18px;" class="span6 autogrow" name="description" type="text" ><?php echo $res['description'];?></textarea>
            </div>
        </div>
        <div class="form-actions">
            <a href="resources.php">
           <input type="hidden" name="action" value="update_resource"/>
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