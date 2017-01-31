<?php 
 require_once '../model/faq.php';
 ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">
	<title>FAQ Results | KEY - Institute Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="0">

	<!-- The styles -->
	
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
        <!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
 <style type="text/css" title="style">
         @import "css/pepper-grinder/jquery-ui-1.10.3.custom.css";
</style>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>

    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/student.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">
               <!-- jQuery -->
<script src="js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
<script type="text/javascript" src="js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
<script src="js/bootstrap-transition.js"></script>
	<!-- library for advanced tooltip -->
<script src="js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
<script src="js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
<script src="js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
<script src="js/bootstrap-collapse.js"></script>
	
<script src="js/jquery.noty.js"></script>
<link href="facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="facebox/facebox.js"></script>
<script type="text/javascript">
                    jQuery(document).ready(function($) {
                        $('a[rel*=facebox]').facebox({          
                            loadingImage : 'facebox/loading.gif',
                            closeImage   : 'facebox/closelabel.png'
                        })
                    })  
                    
                    $(document).bind('beforeReveal.facebox', function() {
                        $("#facebox .content").empty();
                    });
                    
</script>

<script src="js/jquery.uploadify-3.1.min.js"></script>
 <script src="js/bootstrap-dropdown.js"></script>
 
<script type="text/javascript">
     $(function() {
    $( "#accordion" ).accordion();
  });
</script>
</head>
<body>
		<!-- topbar starts -->
<div class="navbar">
<div class="navbar-inner">

</div>
	</div>
    <!-- topbar ends -->		
    <div class="container-fluid">
                    <div class="row-fluid">
				

                
                <div id="content" class="span10" style="width: 100%">
                <!-- content starts -->
<div class="row-fluid">
    <div class="box span12" style="width: 100%">
<!--		<div class="box-header well">
            <div class="box-icon">
                
            </div>
		</div>-->
        
<div class="box-content" >
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane active" id="manage">
                   
        <fieldset>
                        
            <div style="float:right;">
                <a href="add_faq.php" rel="facebox" ><img src="images/questions.png" /></a></div> 
                <center>
                <h3>Frequently Asked Questions</h3>
                </center>
                <br/>
                 <p>This is to help the users with some common errors warnings alerts that may occur while using the system. Some of these questions have already been posed and answered, and most common of which are shown here.</p>
                
                 <br/><div id="accordion">
                     <?php 
                          $object = new faq();
                          $results = $object->getAllFaq();
                          while ($row=  mysql_fetch_array($results))
                            {
                          ?>
                    <p><a href="#"><?php echo $row['problem'];?></a></p>
                    <div>
                      <p>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['answer'];?></p>  
                    </div>
                    <?php
                    
                    }?>
                </div>
                </fieldset>  
            </div>
       
   </div>
</div>
           </div>
       </div>
           </div>
   </div>
</div>
    </div><!--/#content.span10-->
            </div><!--/fluid-row-->

		<footer>
	<hr>
			<!---------facebook like page--------->
	<p class="pull-right">Powered by: <a href="#" target="_top">Key Institute</a></p>
</footer>		
		</div><!--/.fluid-container-->
</body>
        
</html>
