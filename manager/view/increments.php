<?php
require_once '../model/manager.php';
 $teacher_id = $_GET['teacher_id'];
 if(isset($_GET['teacher_id'])){
 $obj = new Manager();
 $result = $obj->getTeacherById($teacher_id);
 ?>
<html>
    <head>
                <link rel="stylesheet" type="text/css" href="css/student.css" media="all">
                <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">

                <script type="text/javascript">
                    function getAmount(level){
                        alert(level);
                    
                    $.ajax({
                       url: "../controller/ajax.php",
                       type:"POST",
                       cache:false,
                       async:false,
                       data:{payable_amount:true,level:level},
                       success:function(theResponse){
//                           alert(theResponse);
                           if(theResponse != 'no records'){
                               var amount = $.parseJSON(theResponse);
                             $.each(amount,function(i,val){
                                   $('#amount').append("<input type='text' value='"+val.rate+".00' name='new_amount'/>");                                   
                               }); 
                             }
                           
                       }

                    });
                }
                </script>
    </head>


<form class="form-horizontal" method="post" action="../controller/manager.php" enctype="multipart/form-data">
    <fieldset>
        <legend><i class="icon32 icon-square-plus"></i>Increments</legend>
        <div class="control-group">
            <label class="control-label" for="typeahead">Name</label>
            <div class="controls">
                <input value="<?php echo $result['first_name']." ".$result['last_name']?>" class="span6 typeahead" name="fname" placeholder="" type="text">
            </div>
        </div>
        <input type="hidden" name="teacher_id" value="<?php echo $result['teacher_id'];?>"/>
        <div class="control-group">
            <label class="control-label" for="typeahead">Lecturer grade</label>
            <div class="controls">
                <input value="<?php echo $result['teacher_level'];?>" class="span6 typeahead" name="" placeholder="" type="text">
            </div>
        </div>
        <input type="hidden" name="upgraded_date" value="<?php echo date('Y-m-d H:i:s');?>"/>
         <div class="control-group">
            <label class="control-label" for="typeahead">Promoted to:</label>
            <div class="controls">
                <select id="" name="level" id="level" class="span6 typeahead" onchange="getAmount(this.value);">
                    <option></option>
                      <?php
                   $obj_levels = new Manager();
                   $result = $obj_levels->getAllPayRate();
                   while ($row=  mysql_fetch_array($result)){
                       
                   ?>
                    <option value="<?php echo $row['pay_rate_id']?>"><?php echo $row['teacher_level'];?></option>
                    <?php }?>
                </select>
            </div>
        </div>
<div class="control-group">
            <label class="control-label" for="typeahead">Payable Amount<br/>(per hour)</label>
            <div class="controls" id="amount">
                    
            </div>
        </div>
        
         
             
        <div class="form-actions">
        <input name="action" value="upgrade" type="hidden">
            <input class="btn btn-primary" value="Update" type="submit">
            <input class="btn" value="reset form" type="reset">
        </div>
    </fieldset>
</form>
</html>
<?php }
?>