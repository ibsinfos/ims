<form action="../controller/login.php" method="post">
    <table>
        <tr>
            <td colspan="2">Request for Password</td>
        </tr>
        <tr>
            <td><b>User Name</b></td>
            <td><input type="text" name="user_name"  class="fieldInput"/></td>
        </tr>
        <tr>
            <td><b>Email address</b></td>
            <td><input type="text" name="user_email" class="fieldInput"/></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="hidden" name="action" value="reset"/><input type="submit" name="submit" value="Reset" id="registerFormSignUp"/></td>
        </tr>
    </table>



</form>