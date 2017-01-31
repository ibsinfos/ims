<html>
    <head>
        
    </head>
    <body>
        <form action="../controller/login.php" method="post" >
        <table>
            
            <tr>
                <td colspan="2"><h3>ADD: FAQ</h3>
                <hr/></td>
                
            </tr>
            <tr>
                <td>Add Question:</td>
                <td><input type="text" name="question" maxlength="200"/> </td>
            </tr>
            <tr>
                <td>Add Answer:</td>
                <td><textarea name="faq_answer"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    
                    <div style="background-color: rgb(245, 245, 245); border-top: 1px solid rgb(229, 229, 229);">
                        <br/>
                    <input  type="hidden" name="action" value="add_new_faq"/>
                    <input class="btn btn-primary" type="submit" name="" value="Submit"/> 
                   <br/><br/>
                    </div>
                </td>
            </tr>
        </table>
            </form>
    </body>
</html>