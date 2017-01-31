<?php 
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='1'))
{   
    
    ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">
	<title>Teacher list | KEY - Institute Management System</title>
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

	<!-- jQuery -->
	<script src="js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
        <script src="js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src="js/fullcalendar.min.js"></script>
	<!-- data table plugin -->
	<script src="js/jquery.datatables.min.js"></script>

	<!-- chart libraries start -->
	<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.min.js"></script>
	<script src="js/jquery.flot.pie.min.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="js/charisma.js"></script> 
        <link rel="shortcut icon" href="images/favicon.ico">
		

            <link rel="stylesheet" type="text/css" href="css/student.css" media="all">
                <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">
<!--<script src="js/jquery-1.7.2.min.js"></script>-->
        
        <script type="text/javascript" charset="utf-8">

    </script>
                    <?php
if(isset($_GET['action']) && $_GET['action']== "save"){
    if(!is_dir('backups/')){
        mkdir('backups');
         }
         $backup ='backups\ims_backup_'.date('Y').'_'.date('m').'_'.date('d').'.sql';
         $cmd ='C:\xampp\mysql\bin\mysqldump -uroot ims > '.$backup;
         try{
         system($cmd);
         $error = false;
         $message['error']=false;
         $message['message']='Backup Successfully downloaded to '.$backup.'';
         $msg_bk ="<b>Backup Successfully downloaded to <br/> '.$backup.'</b>";
         }
         catch(PDOException $e){
             $error = true;
             $message['error'] = true;
             $message['message'] = $e->getMessage();
             print_r($e->getMessage());
         }
         
}
elseif (isset ($_GET['action'])&& ($_GET['action']== 'restore')) {
    $fname='backups/'.date('U').'_'.$_FILES['backup']['name'];
    move_uploaded_file($_FILES['backup']['tmp_name'],$fname);
    
    $cmd = 'C:\xampp\mysql\bin\mysql.exe -uroot ims <'.$fname;
    try {
    exec($cmd);
    $error = false;
         $message['error']=false;
         $message['message']='Restore successfully Completed';
         $msg_restore = "<b>Database has been restored successfully!</b>";
         
    
    }
 catch (PDOException $e){
            $error = true;
             $message['error'] = true;
             $message['message'] = $e->getMessage();
             print_r($e->getMessage());
}
}
?>
                    </head>
<body>
		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
	<?php   include 'common/admin_header.php';?>
		</div>
	</div>
	<!-- topbar ends -->
        <div class="container-fluid">
            <div class="row-fluid">
				
				<!-- left menu starts -->
            <div class="span2 main-menu-span">
               <?php include 'common/admin_side_nav.php';?><!--/.well -->
            </div> <!--/span-->
			<!-- left menu ends -->                
                
                <div id="content" class="span10">
                <!-- content starts -->
                
                
<!---------------MANAGE TEACHER LISTS------------>
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well">
            <div class="box-icon">
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            </div>
		</div>
        
		<div class="box-content">
        	<!-----CUSTOM MESSAGE------>
        	
                        <!-----CUSTOM MESSAGE------>
            
        	<!----TAB UI FOR TEACHERS-->
            <ul class="nav nav-tabs" id="myTab">
            	                
            	                
                <li class="active"><a href="#manage">Backup & Restore</a></li>
                
                <!--<li><a href="#create">Add new Teacher</a></li>-->
            </ul>
            
            
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane active" id="manage">
                 
                    <form action="backup.php?action=save" class="form-horizontal" method="post">
        <fieldset>
            <legend><i class="icon32 icon-gear"></i>Backup/Restore</legend>
            <div class="center">
                <table >
        <tr>
            <td>In order to take backup of the current database click backup button:</td>
            <td><button type="submit" class="btn btn-info" name="backup"><i class="icon-zoom-in icon-white"></i> BackUp</button></td>
            <td>
                <?php 
            if(isset($msg_bk)){
                echo $msg_bk;
            }
            ?>
            </td>
        </tr>
        
    </table>
            </div>
        </fieldset>
</form>
                    <form action="backup.php?action=restore" method="post" name="Myform" enctype="multipart/form-data">
                        <fieldset>
                            <!--<legend><i class="icon32 icon-gear"></i>Restore</legend>-->
                        <table>
        <tr>
            <td>Restore File:</td>
            <td><input type="file" name="backup"></td>
            </tr>
            <tr>
            <td ></td>
            <td><button type="submit" class="btn btn-info" name="restore"><i class="icon-zoom-in icon-white"></i> Restore</button>
            </td>
            <td>
               <?php 
            if(isset($msg_restore)){
                echo $msg_restore;
            }
            ?>
            </td>
        </tr>
        
    </table>
                            </fieldset>
        </form>
    

    </div>
                <div class="tab-pane" id="create">
                	
            </div>
        
			
		</div>
	</div>
</div>


                <!-- content ends -->
				</div><!--/#content.span10-->
			</div><!--/fluid-row-->

		<footer>
	<hr/>
	<!---------facebook like page---------->
          
			<!---------facebook like page--------->
	<p class="pull-right">Powered by: <a href="#" target="_top">Key Institute</a></p>
</footer>		
		</div><!--/.fluid-container-->

	
	
		


<div style="display: none;" id="cboxOverlay"></div><div style="display: none; padding-bottom: 57px; padding-right: 28px;" class="" id="colorbox"><div id="cboxWrapper"><div><div style="float: left;" id="cboxTopLeft"></div><div style="float: left;" id="cboxTopCenter"></div><div style="float: left;" id="cboxTopRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxMiddleLeft"></div><div style="float: left;" id="cboxContent"><div style="width: 0px; height: 0px; overflow: hidden; float: left;" id="cboxLoadedContent"></div><div style="float: left;" id="cboxLoadingOverlay"></div><div style="float: left;" id="cboxLoadingGraphic"></div><div style="float: left;" id="cboxTitle"></div><div style="float: left;" id="cboxCurrent"></div><div style="float: left;" id="cboxNext"></div><div style="float: left;" id="cboxPrevious"></div><div style="float: left;" id="cboxSlideshow"></div><div style="float: left;" id="cboxClose"></div></div><div style="float: left;" id="cboxMiddleRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxBottomLeft"></div><div style="float: left;" id="cboxBottomCenter"></div><div style="float: left;" id="cboxBottomRight"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div><div style="position: absolute; top: -10000px; left: -10000px; width: 48.9362px; font-size: 13px; font-family: &quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif; font-weight: 400; line-height: 18px; resize: none;"></div></body>
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