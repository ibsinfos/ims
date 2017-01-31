<?php
require_once '../model/users.php';
$faq_id = $_GET['faq_id'];
$object = new Users();
$res = $object->getFaQById($faq_id);
$answer = $res['answer'];
?>
<h3>ADD: Answer</h3>
<hr/>

<form class="form-horizontal" method="post" action="../controller/users.php">
    <center>
    <table width="300">
        <tr>
            <td>Answer</td>
            <td style="float: right;"><?php
        if($answer!=" "){?>
                <textarea name="faq_answer"><?php echo $answer;?></textarea>
        <?php }
        else{?>
        <textarea name="faq_answer"></textarea>
       <?php }?></td>
        </tr>
        <input type="hidden" name="faq_id" value="<?php echo $res['id_faq'];?>"/>
        <input type="hidden" name="faq_status" value="<?php echo $res['done'];?>"/>
        <tr>
            <td colspan="2" align="center">
                <br/>
                <div style="background-color: rgb(245, 245, 245); border-top: 1px solid rgb(229, 229, 229);">
                <br/>
                <input type="hidden" name="action" value="update_faq"/>
            <input class="btn btn-primary" value="Submit" type="submit" />
            <input class="btn" value="Clear" type="reset"/>
            <br/><br/>
        </div>
            </td>
        </tr>
    </table>
     </center>   
    
</form>