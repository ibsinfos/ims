<?php
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='2'))
{
   require_once '../model/course.php';
   require_once '../model/student.php';
   $student_id = $_GET['student_id'];
   $date = date("Y-m-d");
   if(isset($student_id)){
       $obj_student = new Student();
       $results = $obj_student->get_student_by_id($student_id);       
       $payments = $obj_student->getAllPaymentDetailsById($student_id, $date);
       $receipt = $obj_student->getReceiptId($student_id, $date);
       $receipt_no = $receipt['recip_id'];
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
                <font size="+3" color="#1C75B9">Key Institute Sri Lanka (Pvt) Ltd.</font>
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
             <td align ="center" colspan="2"><h3><font color="#1C75B9">Course Fee Receipt</font></h3></td>
         </tr>
         <tr>
            <td colspan="2">
                <hr>  
            </td>
         </tr>
         <tr>
             <td colspan="2">
                 <table>
                     <tr>
                         <td>Name</td>
                         <td>:<?php echo $results['first_name']." ".$results['last_name'];?></td>
                     </tr>
                     <tr>
                         <td>Admission No</td>
                         <td>:<?php echo $results['stu_admission_no'];?></td>
                     </tr>
                 </table>         
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
          <?php 
          $cat_name = null;
          $tot = 0;
          while ($row = mysql_fetch_assoc($payments)) {
              ?>
          <?php 
            if($row['course_category_name'] !== $cat_name )
            {
          ?>
          <tr>
              <td><?php echo $row['course_category_name']; ?></td>
              <td align="right">&nbsp;</td>
          </tr>
          <?php 
            }
          ?>
          <tr>
              <td><?php echo $row['course_name'];?></td>
              <td align="right"><?php echo $row['amount'].".00";?></td>
          </tr>
          <?php
            $cat_name = $row['course_category_name'];
            $tot += $row['amount'];
          }
          ?>          
             <tr>
              <td><h3>Total</h3></td>
              <td align="right">---------<h4><?php echo $tot.".00";?></h4>======</td>
          </tr>  
            </table> 
             </td>
         </tr>
         <tr>
             <td colspan="2">&nbsp;</td>
         </tr>
    </table>
            </div>
        <table width="580">
            <tr>
                <td>
                 <a href="course_fee.php">
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