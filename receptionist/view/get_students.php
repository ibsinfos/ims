<?php
require_once '../model/student.php';
$admission_no =$_GET['admission_no'];
$course = $_GET['courses'];
$obj = new Student();
$res = $obj->searchStudent($admission_no);
$courses = explode(",", $res['course']);
$count = count($courses);
$std_id = $res['student_id'];
?>
<html>
    <head>
        <script type="text/javascript">
    function getAmount(status, id){
        // geting the statues
        if(status === "half")
        {
            //get the fee value from the id
            var fees = $('#fee_'+id).val();
            var half = parseInt(fees/2);
            $('#amount_'+id).val(half+'.00');
            getTotal();
            return false;
        }
        else if(status === "free")
        {
            $('#amount_'+id).val('0.00');
            getTotal();
            return false;
        }
        else if(status === "full")
        {
            var fees = $('#fee_'+id).val();
            $('#amount_'+id).val(fees+'.00');
            getTotal();
            return false;
        }
    }  
      // get the total
function getTotal(){
    var total = 0;
    // get the sum of all the amounts using the field name amount[]
    $("input[name='amount[]']").each(function(){
        total += parseInt($(this).val(), 10) || 0;
        $('#total').val(total+".00");
    });
return false;
}

function checkLateStatus(stat_id)
{
    if($('#'+stat_id).is(':checked'))
    {
        $('#status_'+stat_id).val(1);
    }
    else
        {
            $('#status_'+stat_id).val(0);
        }
}

    </script>
    </head>
    <body>
        <form action="../controller/student.php" method="post">
        <table cellpadding="4" width="600">
            <tr>
                <td colspan="2">Name</td>
                <td colspan="2">: <?php echo $res['first_name']." ".$res['last_name'];?></td>
            </tr>
            <tr>
                <td colspan="2">Admission No</td>
                <td colspan="2">: <?php echo $res['stu_admission_no'];?></td>
                
            </tr>
            <tr >
                <th>Course</th><th>Payment method</th><th>Amount</th><th>Status</th>
            </tr>
            <?php
                for($i=0;$i<$count;$i++){?>
            <tr>
                <td align="left">
                    <?php
                    $course=$courses[$i];
                    
                    $obj = new Student();
                    $res = $obj->getcourseById($course);
                    echo $res['course_name'];
                    ?>
                </td>
                <input type="hidden" value="<?php echo $res['course_id']; ?>" name="course_id[]">
                <input type="hidden" value="<?php echo $res['fee']; ?>" name="fee[]" id="fee_status_<?php echo $i;?>">
                <td align="center">
                    <select name="status[]" id="status_<?php echo $i; ?>" style="width: 120px;" onchange="getAmount(this.value, this.id);">
                        <option></option>
                        <option value="full">Full</option>
                        <option value="half">Half</option>
                        <option value="free">Free</option>
                    </select>
                </td>
                <td align="center"><input type="text" name="amount[]" id="amount_status_<?php echo $i;?>" style="width: 100px;"/></td>
                <td align="right">
                    <label><input type="checkbox" id="late_<?php echo $i; ?>" onchange="checkLateStatus(this.id)" value="1" /> Late Payment</label>
                    <input type="hidden" name="late_status[]" id="status_late_<?php echo $i; ?>" value="0" />
                </td>              
            </tr>
             <?php
               }
               ?>
            <tr>
                <td colspan="4" align="right">
                    <b>Total Rs.</b>
                <input type="text" name="total" id="total"/>
                </td>
            </tr>
            <tr>
                <td colspan="4" align="right">
                 <input type="hidden" name="std_id" value="<?php echo $std_id;  ?>" />
                 <input type="hidden" name="action" value="add_all_course_fees" />                        
                    <button type="submit" name="studnet_list" class="btn btn-success">
                        <i class="icon-zoom-in icon-white"></i> Add Payment
                    </button>  
                </td>
                       
            </tr>
        </table>
        </form>
    </body>
</html>