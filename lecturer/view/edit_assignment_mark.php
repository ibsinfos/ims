<link rel="stylesheet" type="text/css" href="css/teachers.css" media="all">
<link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">
<script src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
function getGrade(){
    var mark= $('#marks').val();
//    alert(mark);
    if(mark>=75){
     $('#grade').val('A');
    }
     else if (mark>=65) {
       $('#grade').val('B');
}
    else if (mark>=50) {
       $('#grade').val('C');
}
    else if (mark>=35) {
        $('#grade').val('S');
}
    else {
        $('#grade').val('F');
}
}
</script>
<?php 
require_once '../model/teacher.php';

$assignment = $_GET['assignment_mark_id'];

if(isset($assignment)){
    $obj = new Teachers();
    $res = $obj->getAssignmentMarksId($assignment);
   
    ?>
<form action="../controller/student.php"  class="form-horizontal" method="post">
    <input type="hidden" value="<?php echo $res['Assignment_mark_id'];?>" name="assignment_mark_id"/>
    <div class="control-group">
            <label class="control-label" for="typeahead">Assignment Title:</label>
            <div class="controls">
                <input class="span6 typeahead" value="<?php echo $res['title'];?>" type="text" readonly="readonly"/>
            </div>
        </div>
    <div class="control-group">
            <label class="control-label" for="typeahead">Marks:</label>
            <div class="controls">
                <input class="span6 typeahead" id="marks" name="marks" value="<?php echo $res['Marks'];?>" type="text" onblur="getGrade(this.value);"/>
            </div>
        </div>
    
    <div class="control-group">
            <label class="control-label" for="typeahead">Grade:</label>
            <div class="controls">
                <input class="span6 typeahead"  type="text" readonly="readonly" id="grade"/>
            </div>
        </div>
       
         <div class="form-actions">
             <input type="hidden" name="action" value="edit_marks" >   
            <input class="btn btn-primary" value="Update" type="submit" onclick="payment_form();"/>
            <!--<input class="btn" value="reset form" type="reset"/>-->
        </div>
    </form>
    <?php }
    ?>