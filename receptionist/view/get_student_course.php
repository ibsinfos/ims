<?php
require_once '../model/student.php';
$admission_no =$_GET['admission_no'];
$course = $_GET['courses'];
?>
<html>
    <head>
        <script type="text/javascript">
    function getAmount(status){
        var fees = $('#fee').val();
//        alert(fees);
        // geting the statues
        if(status == "half")
        {
            //get the fee value from the id
//            var fees = $('#fee').val();
            var half = parseInt(fees/2);
            $('#amount').val(half+'.00');
           
            return false;
        }
        else if(status == "free")
        {
            $('#amount').val('0.00');
            
            return false;
        }
        else if(status == "full")
        {
            var fees = $('#fee').val();
            $('#amount').val(fees+'.00');
            
            return false;
        }
    }     
    </script>
    </head>
    <body>

<?php

$obj = new Student();
$res = $obj->searchByadmissionCourse($admission_no, $course);
$count = mysql_num_rows($res);
$result = mysql_fetch_assoc($res);


//    print_r($res);
//    echo $count;
//    die;

?>
        <form action="../controller/student.php" method="post">
        <table width="700">
            <thead>
            <tr>
                <th>Student No</th>
                <th>Name</th>
                <th>Payment Mode</th>
                <th>Amount</th>
                <th>Late Status</th>
               
            </tr>
            </thead>
           
            <tbody>
            <?php
            if($count>0){
                ?>
             
            <tr>
                
            <input type="hidden" value="<?php echo date('Y-m-d');?>" name="pay_date">
                <input type="hidden" value="<?php echo $result['fee']; ?>" name="fee" id="fee">
             <input type="hidden" value="<?php echo $result['student_id'];?>" name="stu_id"/>
             <input type="hidden" value="<?php echo $course;?>" name="course">
                <td align="center"><?php echo $result['stu_admission_no'];?></td>
                <td align="center"><?php echo $result['first_name']." ".$result['last_name'];?></td>
                <td align="center">
                    <select name="status" id="status" style="width: 100px;" onchange="getAmount(this.value);">
                        <option></option>
                        <option value="full">Full</option>
                        <option value="half">Half</option>
                        <option value="free">Free</option>
                        
                    </select></td>
                    <td align="center"><input type="text" name="amount" style="width: 100px; " id="amount"></td>
                    <td>
                        <select name="late_state" style="width: 100px;">
                            <option></option>
                            <option value="1">late</option>
                            <option value="0">Not late</option>
                                
                        </select>
                    </td>
            </tr>
            <?php
}
 else {
 ?>
            <tr>
                <td align="center" colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td align="center" colspan="4" style="color: violet;"><b>NO records Found</b></td>
            </tr> 
<?php 
    }
?>
        <tr>
                <td colspan="4" align="right" >
                    <input type="hidden" name="action" value="add_course_fee"/>                        
                    <button type="submit" name="studnet_list" class="btn btn-success">
                        <i class="icon-zoom-in icon-white"></i> Add Payment</button>
                    
                
                                                         
              </td>
            </tr>
        </tbody>
        
        </table>
            
         </form>
        

    </body>
</html>
