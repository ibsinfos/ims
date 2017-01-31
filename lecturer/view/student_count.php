<?php 
$teacher =$_GET['teacher_id'];
require_once '../model/dashboard.php';
?>
                <table width="350">
                    <tr>
                       
                        <td colspan="3" align="center">
                            <h3 style="float: left;" >Student count per subject</h3>
                            <br/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                                <hr/>
                        </td>
                    </tr>
                                    <tr style="color: #000;">
                                        <th>Subject Category</th>
                                    <th>Subject</th>
                                    <th>Student Count</th>
                                    </tr>
                            
                            <?php
                            $obj = new dashboard();
                            $result = $obj->get_total_students($teacher);
                            while ($row = mysql_fetch_array($result)) {
                            ?>
                                    <tr>
                                        <td><?php echo $row['course_category_name'];?></td>
                                        <td><?php echo $row['course_name']; ?></td>
                                        <td><?php echo $row['stu_count']; ?></td>
                                    </tr>
                               <?php } ?>
                                    </table>
    