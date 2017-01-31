<?php
session_start();
if(!empty($_SESSION['cur_user']))
{
    require_once '../model/login.php';
    $parent = $_SESSION['user_id'];
    
    $obj = new Login();
    $res = $obj->getParentId($parent);
    $parent_id = $res['parent_id'];
 ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
            <title>select_student| KEY - Institute Management System</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="description" content="0">

                    <!-- The styles -->
                    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
                    <!--[if lt IE 9]>
                      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
                    <![endif]-->

                    <!-- The fav icon -->
                    <link rel="shortcut icon" href="images/favicon.ico">
                        <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
                        <link rel="stylesheet" type="text/css" href="css/index.css" media="all">
                           <link rel="stylesheet" type="text/css" href="css/student.css" media="all">
                         <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">
                            </head>
                            <body>
                                <a class="btn btn-navbar" href="../../index/view/logout.php" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse" style="float: right; margin-top: 30px; margin-right: 30px;padding-top: 10px; vertical-align: middle;">
                                    <span ><i class="icon-off icon-darkgray"></i>
                            		Logout</span>
<!--					<span class="icon-bar"></span>
					<span class="icon-bar"></span>-->
				</a>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="clear">
        </div>
        <div class="row-fluid center">
            <br> <center>
                <div style="width: 450px;">
                   
                <div class="well span5 center login-box_1">

<div id="myTabContent" class="tab-content">
<div class="tab-pane active" id="admin_login">
    <div class="alert alert-info">
        SELECT STUDENT
    </div>
    <br/>
<?php
                    $obj = new Login();
                    $student = $obj->getStudentforParents($parent_id);
                    $count = mysql_num_rows($student);
                
            ?>
    <form class="form-horizontal" action="../controller/login.php" method="post">
        <fieldset>
            
            <div  class="input-prepend">
                Student admission No:
                <select name="student">
                    <?php while($row = mysql_fetch_assoc($student)){?>
                        
                    <option value="<?php echo $row['student_id'];?>">
                        <?php echo $row['stu_admission_no'];?>
                    </option>
                    <?php } ?>
                </select>                
            </div>
            <br/> <br/>       
            <p class="center span5">
                <input name="action" value="student_uname" type="hidden">
                    <input class="btn btn-primary" value="Continue" type="submit">
                        </p>
                        </fieldset>
                        </form>
                        </div>
    </div>
                    </div>
                       
                </div>
                 </center>

                                                                                </div>

                                                                                </div>
                                                                                <footer>
                                                                                    <hr>
                                                                                        <!---------facebook like page---------->


                                                                                        <!---------facebook like page--------->

                                                                                        <p class="pull-right">Powered by: <a href="#" target="_top">Key Institute</a></p>
                                                                                </footer>
                                                                                <!--/span-->
                                                                                </div>
                                                                                <!--/row-->
                                                                                </div>
                                                                                <!--/fluid-row-->
                                                                                </div>
                                                                                </footer>
                                                                                <!--/.fluid-container-->

                                                                                    <!-- external javascript
                                                                                    ================================================== -->
                                                                                    <!-- Placed at the end of the document so the pages load faster -->


                                                                                    </body>
                                                                                    </html>
<?php }
else
{
//    $_SESSION['cur_user']=NULL;
    unset($_SESSION['cur_user']);
    session_destroy();
    header("location: ../../index/view/index.php");
}
?>