<?php session_start(); ?>

<form action="../../index/controller/change_password.php" method="post">
    <table>
        <?php
        $user = $_SESSION['cur_user'];
        ?>
        
        <tr>
            <td colspan="2"><i class="icon32 icon-lock"></i><h3>Change Password</h3></td>
        </tr>
        <tr>
            <td> Current password </td>
            <td>:<input type="text" name="current_password"  class="fieldInput"/></td>
        </tr>
        <tr>
            <td>New Password </td>
            <td>:<input type="text" name="new_password" class="fieldInput"/></td>
        </tr>
        <tr>
            <td>Confirm Password </td>
            <td>:<input type="text" name="confirm_password" class="fieldInput"/></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="hidden" value="<?php echo $user; ?>" name="user_name"/>
                <input type="hidden" name="action" value="change"/><input type="submit" name="submit" value="Change" id="registerFormSignUp"/></td>
        </tr>
    </table>



</form>