<?php 
ini_set('display_errors',0);
require_once '../model/schedule.php';
$obj = new Schedules();
$res = $obj->AlltranscriptRequests();

?>
<center>
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
            <table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
                    <tr>
                       
                        <td colspan="4" align="center">
                            <h3 style="float: left;" >All Transcript Requests</h3>
                            <br/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                                <hr/>
                        </td>
                    </tr>
                                    <tr style="color: #000;">
                                        <th>Student Admission NO</th>
                                        <th>Requested Student</th>
                                    <th>Requested ON</th>
                                    <th>Status</th>
                                    </tr>
                            <?php
                            while($row = mysql_fetch_array($res)){
                                $request_date = date('Y-m-d',$row['requested_on']);?>
                           
                                    <tr>
                                         <td><?php echo $row['stu_admission_no'];?></td>
                                        <td><?php echo $row['title']." ".$row['first_name']." ".$row['first_name']; ?></td>
                                        <td><?php echo $request_date;?></td>
                                        <td><?php echo $row['status']; ?></td>
                                    </tr>
                               <?php } ?>
                                    </table>
        </div>
    </center>