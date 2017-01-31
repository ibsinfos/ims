<?php
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='2'))
{
   require_once '../model/course.php';
   require_once '../model/student.php';
   
   if(isset($_GET['student_id'])){
       
       $student_id = $_GET['student_id'];
       $receipt_obj = new Student();
       $results = $receipt_obj->lastAdmissionDetails($student_id); 
       
       $obj = new Student();
       $course_fee = $obj->getLastPayment($student_id);
       
       $course_payment_no= $results['payment_id'];
       $receipt_no = "00".$course_payment_no;
       
//       
   }
?>
<html>
    <head>
        <script src="js/charisma.js"></script>
        <script type="text/javascript">
      
    </script>
    <link rel="stylesheet" type="text/css" href="css/student.css" media="all">
    </head>
    <body>
        <div id="facebox_overlay" class="facebox_hide"></div>
    <center>        
        <div  style="width: 600px;">            
    <table width="580" id="receipt">
        <tr>
            <td colspan="2">
                <img src="images/logo.png" width="50" height="50"/>
                <font size="+3" color="#1C75B9">Key Institute Sri Lanka (pvt) Ltd.</font>
                <br/>
                <font size="+1" color="#1C75B9">51/B,Maharagama road,Piliyandala.</font>
            </td>
       
        </tr>
        <tr>
            <td colspan="2">
                <h4 align="right">Rec. No:<?php echo $receipt_no;?></h4>
                <hr>  
            </td>
         </tr>
         <tr>
             <td align ="center" colspan="2"><h3><font color="#1C75B9">Fee Receipt</font></h3></td>
         </tr>
         <tr>
            <td colspan="2">
                <hr>  
            </td>
         </tr>
         <tr>
             <td>
                 <font size="+1">Name:</font>&nbsp;&nbsp;&nbsp;<?php echo $results['first_name']." ".$results['last_name'];?><br/>
                 <font size="+1">Admission No:</font>&nbsp;&nbsp;<?php echo $results['stu_admission_no'];?>
                 
             </td>
         </tr>
         <tr>
             <td colspan="2">
                 <br/><br/>
                 <table width="100%">
               <tr>
             <td width="80%"><h4>On account Of</h4></td>
             <td align="right"><h4>Amount</h4></td>
          </tr>
          <tr>
              <td><?php echo $results['payment_type'];?></td>
              <td align="right"><?php echo $results['amount'];?></td>
          </tr>
          <?php 
          $a =0;
 while ($row = mysql_fetch_array($course_fee)){
     
     ?>
         
          
          <tr>
              <td><?php echo $row['course_name'];?></td>
              <td align="right"><?php echo $row['fee'].".00";?></td>
          </tr>
         <?php 
          $a=$a+ $row['fee'];
         }
          ?>
             <tr>
              <td><h4>Total</h4></td>
              <?php $a = $a +$results['amount'];?>
              <td align="right">---------<h4><?php echo $a.".00";?></h4>======</td>
          </tr>  
            </table> 
             </td>
         </tr>
         <tr>
             
         </tr>
    </table>
            </div>
        <table width="580">
            <tr>
                <td>
                 <a href="new_student.php">
                 <button class="pull-right btn btn-info" onclick="printDiv('receipt');">
                <i class="icon icon-print icon-white"></i>
                    Print
                 </button>
                </a>
                </td>
            </tr>
        </table>
        </center>
  </body>  
</html>
<?php 

}

else
{
//    $_SESSION['cur_user']=NULL;   
    unset($_SESSION['cur_user']);
    session_destroy();
    header("location: ../../index/view/index.php");
}
?>