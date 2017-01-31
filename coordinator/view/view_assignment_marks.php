<?php
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='5'))
{
    require_once '../model/student.php';
    $course = $_GET['course'];
    $student = $_GET['student_id'];
    
  ?>
<html>
    <head>
        <script src="js/charisma_mod.js"></script>
        <script type="text/javascript">
      
    </script>
    </head>
    <body>
        
        <div id="facebox_overlay" class="facebox_hide"></div>
        <form action="../controller/teacher.php" method="post">
    <center>
        
        <div  style="width: 650px;" name="print_area" id="print_area">            
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
            <table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
        <form>
        <tr>
            <td colspan="2">
                <img src="images/logo.png" width="50" height="50"/>
                <font size="+3" color="#1C75B9">Key Institute Sri Lanka (Pvt) Ltd.</font>
                <br/>
                <font size="+1" color="#1C75B9">51/B,Maharagama road,Piliyandala.</font>
            </td>
       
        </tr>
       
         <tr>
             <td align ="center" colspan="2">
                 <hr style="height:8px; color: black;"/>
                 <h3><font color="#1C75B9">Student Transcript</font></h3></td>
         </tr>
         <tr>
            <td colspan="2">
                <hr>  
            </td>
         </tr>
         <tr>
             <td colspan="2">
         <center>
                 <table style="width: 640px;" >
                     <tr>
                         <th>Assignment</th>
                         <th>Marks</th>
                         <th>Grade</th>
                         
                     </tr>
                     <?php
                     $marks_obj = new Student();
                     $result = $marks_obj->getAssignmentMars($course, $student);
                     while($row=  mysql_fetch_array($result)){?>
                     <tr>
                         <td><?php echo $row['title'];?></td>
                         <td><?php echo $row['Marks'];?></td>
                         <?php
                         if($row['Marks']>75){
                             $grade = "A";
                         }
                         elseif ($row['Marks']>=65) {
                         $grade ="B";
                         }
                         elseif ($row['Marks']>=55) {
                          $grade = "C";
                         }
                         elseif ($row['Marks']>=35) {
                            $grade = "S";    
                                }      
                        else {
                           $grade = "F";
     
                            }?>
                         <td><?php echo $grade;?></td>
                     </tr>
                     <?php }?>
                 </table> 
             </center>
             </td>
         </tr>
         <tr>
             <td colspan="2">
                 <br/><br/>
                 
             </td>
         </tr>
         <tr>
             <td colspan="2">&nbsp;</td>
         </tr>
    </table>
    </div>
            <input type="hidden" name="course" value="<?php echo $course;?>"/>
            <input type="hidden" name="student_id" value="<?php echo $student; ?>"
            </div>
        <table width="580">
            <tr>
                <td>
                 <a href="marks.php">
                     <input type="hidden" name="action" value="print_transcript"/>
                     <button type="submit" name="transcript" class="btn btn-info"><i class='icon icon-print icon-white' onclick="printDiv('print_area');"></i> Print</button>
                </a>
                </td>
            </tr>
        </table>
         
        </center>
            </form>
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