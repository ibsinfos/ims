<?php 
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='1'))
    
{
    require_once '../model/users.php';
    ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">
	<title>Employees | KEY - Institute Management System</title>
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
        <script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
        <link rel="stylesheet" type="text/css" href="css/validationEngine.jquery.css"></link>
	<script src="js/charisma.js"></script> 
        <!--<script type="text/javascript" src="js/jquery.js"></script>-->
        <link rel="shortcut icon" href="images/favicon.ico">
           	<script type="text/javascript">
        $(function() {
            //Datepicker
            $( "#birthday" ).datepicker({
                showOn: "both",
                buttonImage: "images/calendar.png",
                buttonImageOnly: true,
                changeMonth: true,
                changeYear: true,
                yearRange: "1980:2013",
                maxDate: '0',
                dateFormat: "yy-mm-dd"
            });
        });
        </script>

            <link rel="stylesheet" type="text/css" href="css/student.css" media="all">
            <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">
                
          <script>
    jQuery(document).ready(function(){
$("#users").validationEngine({
    'custom_error_messages': {
// Custom Error Messages for Validation Types
'#title':{
'required': {'message': "Select User Title."}
        },
'#fname':{
'required': {'message': "First Name cannot be empty."}
        },
'#lname':{
'required': {'message': "Last Name cannot be empty."}
         },
'#birthday':{
'required': {'message': "Birthday cannot be empty."}
         },
'#sex':{
'required': {'message': "Select Gender ."}
         },
'#phone':{
'required': {'message': "Phone number cannot be empty."}
         },
'#email':{
'required': {'message': "Email cannot be empty."}
         },
'#nic':{
'required': {'message': "NIC cannot be empty."}
},
'#user_role':{
'required': {'message': "User role cannot be empty."}
         },
'#user_name':{
 'required': {'message': "User Name cannot be empty."},
 'ajaxUserCall':{
     "url": "../controller/ajaxvalidation.php",
     "alertText": "* This user is already taken",
    "alertTextOk": "All good!",
    "alertTextLoad": "Validating, please wait"
     
 }
},
'#password':{
'required': {'message': "Password cannot be empty."}
         }

}
});

});

</script>
</head>
<body>
		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
<?php   include 'common/admin_header.php';?>
		</div>
	</div>
	<!-- topbar ends -->		<div class="container-fluid">
			<div class="row-fluid">
				
				<!-- left menu starts -->
            <div class="span2 main-menu-span">
        <?php include 'common/admin_side_nav.php'; ?><!--/.well -->
            </div> <!--/span-->
			<!-- left menu ends -->                
                
                <div id="content" class="span10">
                <!-- content starts -->
                
                
<!---------------MANAGE STUDENT LISTS------------>
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
            
        	<!----TAB UI FOR STUDENTS-->
            <ul class="nav nav-tabs" id="myTab">
            
            	            
            	                
            	                
                <li class="active"><a href="#manage">View Employees</a></li>
                
                <li class=""><a href="#create">Add Employees</a></li>
            </ul>
            
            
            <div id="myTabContent" class="tab-content">
            
            	<!------EDIT STUDENT------->
                <div class="tab-pane" id="edit">
            		                </div>
                
            	<!------MANAGE STUDENTS------->
                <div class="tab-pane active" id="manage">
                	<form class="form-horizontal" method="post" action="#">
        <fieldset>
            <legend><i class="icon32 icon-gear"></i>Select user  Designation 
                <select id="classes" style="margin: 20px;" name="user_type">
                    <option></option>
                     <?php
                    $user_obj = new Users();
                    $result = $user_obj->getEmployeeUserRoles();
                    while($row = mysql_fetch_array($result)){?>
                    <option value="<?php echo $row['user_role_id'];?>"><?php echo $row['user_role'];?></option>    
                   <?php }?>
                                  
                 </select>
                <input type="hidden" value="search_user" name="action"/>
                <button type="submit" class="btn btn-info"><i class="icon-zoom-in icon-white"></i> Browse</button>
            </legend>
            <div class="center">
            
            </div>
        </fieldset>
    </form>
                    <?php
                    if(isset($_POST['action']) && $_POST['action']=='search_user'){
                        $user_role = $_POST['user_type'];
                        ?>
                          
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"><table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
  <thead>
      <tr role="row"><th aria-label="ID: activate to sort column descending" aria-sort="ascending" style="width: 24px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting_asc">ID</th><th aria-label="Photo: activate to sort column ascending" style="width: 80px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting" width="80">Photo</th><th aria-label="Name: activate to sort column ascending" style="width: 177px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting">Name</th><th aria-label="Options: activate to sort column ascending" style="width: 350px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting" width="350">Options</th></tr>
  </thead>   
  
<tbody aria-relevant="all" aria-live="polite" role="alert">
    <?php
  $emp_obj = new Users();
  $res = $emp_obj->getUsersByRole($user_role);
  while($row = mysql_fetch_array($res)){
  ?>
    <tr class="odd">
        <td class="  sorting_1"><?php echo $row['employee_id'];?></td>
        <td class=" ">
                   <img class="image_thumbnail" src="../../store/user_images/<?php echo $row['prof_image'];?>" width="40" height="40" border="5"/>   
        </td>
        <td class=" "><?php echo $row['title']." ".$row['first_name']." ". $row['last_name'];;?></td>
        
        <td class=" ">
            <a class="btn btn-success" href="personal_profile.php?employee_id=<?php echo $row['employee_id'];?>" rel="facebox" >
                <i class="icon-user_1 icon-white"></i>  
                View Profile                                         
            </a>
            <a class="btn btn-info" href="edit_profile.php?employee_id=<?php echo $row['employee_id']; ?>" rel="facebox">
                    <i class="icon-edit icon-white"></i>  
                        Edit                                            
                            </a>
            <a class="btn btn-danger" href="../controller/users.php?action=delete&employee_id=<?php echo $row['employee_id']; ?>" onclick="return confirm('Are you Sure you want to delete this record?');" >
                    <i class="icon-trash icon-white"></i> 
                        Delete
                            </a>
        </td>
    </tr>
<?php }?>
</tbody></table>
    </div>  
               <?php
               }
               ?>
    <div class="alert alert-info" style="margin: 50px;">Select user role to browse System users</div>
                </div>
                
                <!------CREATE NEW STUDENT------->
                <div class="tab-pane" id="create">
                	<form class="form-horizontal" method="post" action="../controller/users.php" enctype="multipart/form-data" id="users">
    <fieldset>
        <legend><i class="icon32 icon-square-plus"></i>Create a new User</legend>
         <div class="control-group">
            <label class="control-label" for="typeahead">Title</label>
            <div class="controls">
                <select id="title" name="title" class="span6 typeahead" data-validation-engine="validate[required]">
                    <option value="">select</option>
                    <option value="Mr">Mr</option>
                    <option value="Miss">Miss</option>
                    <option value="Mrs">Mrs</option>
                    <option value="Rev">Rev</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">First name </label>
            <div class="controls">
                <input class="span6 typeahead" data-validation-engine="validate[required]"name="fname" id="fname" value="" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Last name </label>
            <div class="controls">
                <input class="span6 typeahead" data-validation-engine="validate[required]" name="lname" id="lname" value="" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="date01">Birthday</label>
            <div class="controls">
                <input value="" class="span6 " data-validation-engine="validate[required]" name="birthday" id="birthday" type="date">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Sex </label>
            <div class="controls">
                <select id="sex" name="sex" data-validation-engine="validate[required]" class="span6 typeahead">
                    <option value="">select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
        </div>
        
       
        <div class="control-group">
            <label class="control-label" for="typeahead">Phone </label>
            <div class="controls">
                <input class="span6 typeahead" name="phone" data-validation-engine="validate[required]" id="phone" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Address </label>
            <div class="controls">
                <textarea style="height: 18px;" class="span6 autogrow" name="address"></textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Email </label>
            <div class="controls">
                <input class="span6 typeahead" name="email" id="email" data-validation-engine="validate[required]" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">NIC</label>
            <div class="controls">
                <input class="span6 typeahead" name="nic" id="nic" data-validation-engine="validate[custom[NIC],required]" value="" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Profile Image </label>
            <div class="controls">
               <input class="span6 typeahead" name="prof_image" placeholder="" value="" type="file">  
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">User Role </label>
            <div class="controls">
                <select  name="user_role" id="user_role" data-validation-engine="validate[required]" class="span6 typeahead">
                    <option value="">select</option>
                    <option value="1">Admin</option>
                    <option value="2">Receptionist</option>
                    <option value="5">Coordinator</option>
                    <option value="6">Manger</option>
                    
                </select>
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="typeahead">User Name </label>
            <div class="controls">
                <input class="span6 typeahead" id="user_name" data-validation-engine="validate[required,ajax[ajaxUserCall]]" name="uname" value="" type="text" onblur="getPassword();">
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="typeahead">Password </label>
            <div class="controls">
                <input class="span6 typeahead" name="password" value="" type="password" id="password">
            </div>
        </div>
        
        
        <div class="form-actions">
            <input name="action" value="add_user" type="hidden">
            <input class="btn btn-primary" value="Create User" type="submit">
            <input class="btn" value="reset form" type="reset">
        </div>
    </fieldset>
</form>                </div>
            </div>
        
			
		</div>
	</div>
</div>

<!-----MODAL WINDOW FOR CAPTURING PHOTO FROM A PC WEBCAM-------->

<!-----MODAL WINDOW FOR CAPTURING PHOTO FROM A PC WEBCAM-------->                <!-- content ends -->
				</div><!--/#content.span10-->
			</div><!--/fluid-row-->

		<footer>
	<hr>
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