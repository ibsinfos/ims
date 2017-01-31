<?php 
session_start() ;
require_once('dompdf/dompdf_config.inc.php');
require_once '../model/student.php';
   
if(isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];

       $obj = new Student();
       $result = $obj->getLastPayment($student_id);
       $results = mysql_fetch_assoc($result);
   
?>
<html>
 <div  style="width: 660px; border: 1px solid black;">
        <div id="rec_header">
            <h4>No : <?php echo $receipt_no;?></h4>
            <table width="500">
                <tr>
                    <td><img src="images/logo.png" width="50" height="50"/></td>
                    <td><font size="+3" color="#1C75B9">Key Institute Sri Lanka (pvt) Ltd.</font><br/>
                    <font size="+1" color="#1C75B9">51/B,Maharagama road,Piliyandala.</font>
                    </td>
                    <td> <h4 align="right"><font color="#1C75B9">St.No :</font><?php echo $results['stu_admission_no'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4></td>
                </tr>
            </table>

          </div>
      <div style="clear: both;"> </div>
      <div id="content" style="width: 345px;  text-align: left; ">
         <br/><br/><br/><br/>
          <table width="495" border="1">
             <tr>
               <td colspan="2">
                &nbsp; <font color="#1C75B9" size="+1">
                <i>Received with many thanks from</i>
                        </font>
                       <p> <b><?php echo " ".$results['title']." ". $results['first_name']." ".$results['last_name'];  ?></b></p>
                  <br/>
                  <font color="#1C75B9"> .............................................
                  .............................................</font>
             <br/>
              </td>
              <td>
                 <u><i><font color="#1C75B9">Amount</font></i></u> 
              </td>
             
              </tr>
              
              <tr>
                  <td width="250">
                   <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u><i><font color="#1C75B9">On Account of</font></i></u>
                        <br/>
                    <b> &nbsp;&nbsp;&nbsp;</b>
                   </p>
                  </td>
                  <td></td>
                  <td width="100">
                 
                  
                  <b> <?php echo $results['amount']; ?></b>
                  </td>
              </tr>
              <tr>
                  <td></td>  
                  <td><img src="images/seal.png" width="125" height="100"/></td>  
                  <td><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><br/>
                    <?php echo $results['amount']; ?>
                     <br/>
                   =======</td>  
              </tr>
              
          </table>
  </div>
    </div>
  
</html>
<?php


}
else{
    echo "No records found!";
        
}

$file_name=$results['first_name']."_".$results['last_name'].date('Ymd');
$html = ob_get_contents();
ob_clean();
$dompdf = new DOMPDF();
$dompdf->set_paper('A4' , "portrait");
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream($file_name.".pdf");
$message="successfully added";
header('location:students.php?message='.$message);
?>
