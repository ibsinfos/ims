
<?php
session_start();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta charset="utf-8">
                <title>Login | KEY - Institute Management System</title>
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
                            <script type="text/javascript" src="facebox/facebox.js"></script>
                            <link href="facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />

                            <script type="text/javascript">
                                jQuery(document).ready(function($) {
                                    $('a[rel*=facebox]').facebox({
                                        loadingImage : 'facebox/loading.gif',
                                        closeImage   : 'facebox/closelabel.png'
                                    })
                                })
                            </script>

                            <link rel="stylesheet" type="text/css" href="css/index.css" media="all">
                                </head>
                                <body>
                                    <div class="container-fluid">
                                        <div class="row-fluid">
                                            <div class="clear">
                                            </div>
                                            <div class="row-fluid center">
                                                <a indepth="true" href="index.php"><img src="images/logo.png" style="max-height: 150px;"></a>
                                                <br>
                                                    <h2>KEY - Institute Management System</h2>
                                                    <div class="well span5 center login-box">

                                                        <!-------LOGIN VALIDATION ERRORS------->

                                                        <!-------TABS FOR LOGIN SELECTION------>
                                                        <ul class="nav nav-tabs" id="myTab">
                                                            <li class="active"><a href="#admin_login">User Login</a></li>
                                                            <!--<li><a href="#teacher_login">Teacher Login</a></li>-->
                                                        </ul>
                                                        <div id="myTabContent" class="tab-content">
                                                            <div class="tab-pane active" id="admin_login">
                                                                <div class="alert alert-info">
                                                                    LOGIN TO YOUR ACCOUNT
                                                                </div>
                                                                <br/>
                                                                <!---- LOGIN FORM----->

                                                                <form class="form-horizontal" action="../controller/login.php" method="post">
                                                                    <fieldset>
                                                                        <div  class="input-prepend">
                                                                            <span class="add-on"><i class="icon-user"></i></span><input autofocus="" class="input-large span10" name="user_name" id="email" value="" placeholder="user name" autocomplete="on" type="text">
                                                                        </div>
                                                                        <div class="clearfix">
                                                                        </div>
                                                                        <div  class="input-prepend">
                                                                            <span class="add-on"><i class="icon-lock_1"></i></span><input class="input-large span10" name="password" id="password" value="" placeholder="password" type="password">
                                                                        </div>
                                                                        <div class="clearfix">
                                                                        </div>
                                                                        <div class="clearfix">
                                                                        </div>
                                                                        <p class="center span5">
                                                                            <input name="action" value="login" type="hidden">
                                                                                <input class="btn btn-primary" value="Login" type="submit">
                                                                                    </p>
                                                                                    </fieldset>
                                                                                    </form>
                                                                                    </div>

                                                                                    </div>
                                                                                    <?php
                                                                                    if (isset($_GET['error'])) {
                                                                                        $err_msg = $_GET['error'];

                                                                                        if ($err_msg == "un") {
                                                                                            echo "<p style='color:red;'>Invalid User Name!!</p>";
                                                                                        } elseif ($err_msg == "password") {
                                                                                            echo "<p style='color:red;'>Invalid Password!!</p>";
                                                                                        } elseif ($err_msg == "login_error") {


                                                                                            echo "<p style='color:red;'>Try again!!
                                                                                                <a href='faq_results.php' target='_blank'>FAQ</a>
                                                                                                </p>";
                                                                                            echo "<p>forgot password? <a href='forgot_password.php' style='color:red' rel='facebox'>Click</a> to reset password </p>";
                                                                                        }
                                                                                    } else {
                                                                                        echo "<p> Please type your user name and password to login...</p>";
                                                                                    }
                                                                                    ?>



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