<?php 
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='5'))
{   
    require_once '../model/teacher.php';
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
        <script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
        <link rel="stylesheet" type="text/css" href="css/validationEngine.jquery.css"></link>
	<!-- application script for Charisma demo -->
	<script src="js/charisma.js"></script> 
        <link rel="shortcut icon" href="images/favicon.ico">
		

            <link rel="stylesheet" type="text/css" href="css/teachers.css" media="all">
                <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">
<!--<script src="js/jquery-1.7.2.min.js"></script>-->
       <script>
    jQuery(document).ready(function(){
$("#teachers").validationEngine({
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
'#status':{
'required': {'message': "Status cannot be empty."}
         },
'#level':{
 'required': {'message': "Teacher level cannot be empty."}
 
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
	<?php   include 'common/coordinator_header.php';?>
		</div>
	</div>
	<!-- topbar ends -->
        <div class="container-fluid">
            <div class="row-fluid">
				
				<!-- left menu starts -->
            <div class="span2 main-menu-span">
               <?php include 'common/coordinator_side_nav.php';?><!--/.well -->
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
        	
        	<!----TAB UI FOR TEACHERS-->
            <ul class="nav nav-tabs" id="myTab">
            	                
            	                
                <li class="active"><a href="#manage">Manage teachers</a></li>
                
                <li><a href="#create">Add new Teacher</a></li>
            </ul>
            
            
            <div id="myTabContent" class="tab-content">
                
            	<!------MANAGE TEACHERS------->
                <div class="tab-pane active" id="manage">
                	<form action="#" class="form-horizontal">
        <fieldset>
            <legend><i class="icon32 icon-gear"></i>Teacher list</legend>
            <div class="center">
            
            </div>
        </fieldset>
</form>
    
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"><table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
  <thead>
      <tr role="row"><th aria-label="ID: activate to sort column descending" aria-sort="ascending" style="width: 24px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting_asc">ID</th><th aria-label="Photo: activate to sort column ascending" style="width: 80px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting" width="80">Photo</th><th aria-label="Name: activate to sort column ascending" style="width: 177px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting">Name</th><th aria-label="Email: activate to sort column ascending" style="width: 168px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting">Email</th><th aria-label="Options: activate to sort column ascending" style="width: 350px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting" width="350">Options</th></tr>
  </thead>   
  
<tbody aria-relevant="all" aria-live="polite" role="alert">
    <?php
    $object =new Teachers();
    $result = $object->get_all_teachers();
    while($row = mysql_fetch_array($result)){
?>
    <tr class="odd">
        <td class="  sorting_1"><?php echo $row['teacher_id'];?></td>
        <td class=" ">
                   <img class="image_thumbnail" src="../../store/user_images/<?php echo $row['prof_image'];?>" width="40" height="40" border="5"/>   
        </td>
        <td class=" "><?php echo $row['first_name']." ". $row['last_name'];?></td>
        <td class=" "><?php echo $row['email'];?></td>
        <td class=" ">
            <a class="btn btn-success" href="view_teacher.php?teacher_id=<?php echo $row['teacher_id'];?>" rel="facebox" >
                <i class="icon-user_1 icon-white"></i>  
                View Profile                                         
            </a>
            <a class="btn btn-info" href="edit_teacher.php?teacher_id=<?php echo $row['teacher_id']; ?>" rel="facebox">
                    <i class="icon-edit icon-white"></i>  
                        Edit                                            
                            </a>
            <a class="btn btn-danger" href="../controller/teacher.php?action=delete&teacher_id=<?php echo $row['teacher_id']; ?>" onclick="return confirm('Are you Sure you want to delete this record?');" >
                    <i class="icon-trash icon-white"></i> 
                        Delete
                            </a>
        </td>
    </tr>
<?php }
?>   
</tbody></table>
    </div>
    </div>
                
                <!------CREATE NEW TEACHER------->
                <div class="tab-pane" id="create">
                	<form class="form-horizontal" method="post" action="../controller/teacher.php" enctype="multipart/form-data" id="teachers">
    <fieldset>
        <legend><i class="icon32 icon-square-plus"></i>Add New Teacher</legend>
        <div class="control-group">
            <label class="control-label" for="typeahead">Title</label>
            <div class="controls">
                <select name="title" id="title" class="span6 typeahead" data-validation-engine="validate[required]">
                    <option value="">select</option>
                    <option value="Mr">Mr</option>
                    <option value="Miss">Miss</option>
                    <option value="Mrs">Mrs</option>
                    <option value="Rev">Rev</option>
                </select>
                <span id="err_title" style="color: red; display: none"></span>
            </div>
          </div>
        
        <div class="control-group">
            <label class="control-label" for="typeahead">First name</label>
            <div class="controls">
                <input class="span6 typeahead" name="fname" id ="fname" placeholder="" type="text" data-validation-engine="validate[required]"/>
                    <span id="err_fname" style="color: red; display: none"></span>
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="typeahead">Last name</label>
            <div class="controls">
                <input class="span6 typeahead" name="lname" id="lname" placeholder="" type="text" data-validation-engine="validate[required]"/>
           <span id="err_lname" style="color: red; display: none"></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="date01">Birthday</label>
            <div class="controls">
                <input class="span6" name="birthday" id="birthday" type="date" data-validation-engine="validate[required]"/>
                        <span id="err_birthday" style="color: red; display: none"></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Sex </label>
            <div class="controls">
                <select name="sex" class="span6 typeahead" id="sex" data-validation-engine="validate[required]">
                    <option value="">select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <span id="err_sex" style="color: red; display: none"></span>
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="typeahead">Address </label>
            <div class="controls">
                <textarea style="height: 18px;" class="span6 autogrow" name="address" id="address"></textarea>
           <span id="err_address" style="color: red; display: none"></span>
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="typeahead">Email </label>
            <div class="controls">
                <input value="" class="span6 typeahead" data-validation-engine="validate[required]" name="email" id="email" placeholder="" data-provide="typeahead" data-items="4" type="text">
                <span id="err_email" style="color: red; display: none"></span>    
            </div>
        </div>
       
        <div class="control-group">
            <label class="control-label" for="typeahead">Phone </label>
            <div class="controls">
                <input class="span6 typeahead" id="phone" name="phone" data-validation-engine="validate[required]" type="text">
                    <span id="err_phone" style="color: red; display: none"></span>    
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">NIC </label>
            <div class="controls">
                <input class="span6 typeahead" id="nic" name="nic" data-validation-engine="validate[custom[NIC],required]" type="text">
                    <span id="err_nic" style="color: red; display: none"></span>    
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="typeahead">Status </label>
            <div class="controls">
                <select id="status" name="status" data-validation-engine="validate[required]" class="span6 typeahead" id="nic">
                    <option value="">select</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                <span id="err_status" style="color: red; display: none"></span>    
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="typeahead">Educational Qualifications </label>
            <div class="controls">
                <textarea style="height: 18px;" class="span6 autogrow" name="edu_qualification" id="edu_qualification"></textarea>
            <span id="err_education" style="color: red; display: none"></span>    
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Achievements </label>
            <div class="controls">
                <textarea style="height: 18px;" class="span6 autogrow" name="achievements" id="achievements"></textarea>
                <span id="err_acheivments" style="color: red; display: none"></span>    
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="typeahead">Subjects intrest in </label>
            <div class="controls">
                <textarea style="height: 18px;" class="span6 autogrow" id="intrest_subject" name="intrest_subject"></textarea>
           <span id="err_subjects" style="color: red; display: none"></span>    
            </div>
        </div>
         <div class="control-group">
            <label class="control-label" for="typeahead">Profile Image </label>
           <div class="controls">
               <input class="span6 typeahead" name="prof_image" id="prof_image"  type="file">  
           <span id="err_image" style="color: red; display: none"></span>    
           </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Level </label>
            <div class="controls">
                <select id="level" name="level" class="span6 typeahead" data-validation-engine="validate[required]">
                    <option value="">select</option>
                    <?php
                    $obj_pay_rate = new Teachers();
                    $pay_rates = $obj_pay_rate->getAllPayRate();
                    while ($res = mysql_fetch_array($pay_rates)){
                    ?>
                    <option value="<?php echo $res['pay_rate_id']?>"><?php echo $res['teacher_level'];?></option>
                    <?php
                    
                    }?>
                    
                </select>
                <span id="err_level" style="color: red; display: none"></span>    
            </div>
        </div>

        <div class="form-actions">
        <input name="action" value="newTeacher" type="hidden">
            <input class="btn btn-primary" value="Create teacher" type="submit">
            <input class="btn" value="Clear form" type="reset">
        </div>
    </fieldset>
</form>
                       </div>
            </div>
        
			
		</div>
	</div>
</div>
                <!-- content ends -->
				</div><!--/#content.span10-->
			</div><!--/fluid-row-->

		<footer>
	<hr>
	<!---------facebook like page---------->
          
			<!---------facebook like page--------->
	<p class="pull-right">Powered by: <a href="#" target="_top">Key Institute</a></p>
</footer>		
		</div><!--/.fluid-container-->

	
	
		


<div style="display: none;" id="cboxOverlay"></div><div style="display: none; padding-bottom: 57px; padding-right: 28px;" class="" id="colorbox"><div id="cboxWrapper"><div><div style="float: left;" id="cboxTopLeft"></div><div style="float: left;" id="cboxTopCenter"></div><div style="float: left;" id="cboxTopRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxMiddleLeft"></div><div style="float: left;" id="cboxContent"><div style="width: 0px; height: 0px; overflow: hidden; float: left;" id="cboxLoadedContent"></div><div style="float: left;" id="cboxLoadingOverlay"></div><div style="float: left;" id="cboxLoadingGraphic"></div><div style="float: left;" id="cboxTitle"></div><div style="float: left;" id="cboxCurrent"></div><div style="float: left;" id="cboxNext"></div><div style="float: left;" id="cboxPrevious"></div><div style="float: left;" id="cboxSlideshow"></div><div style="float: left;" id="cboxClose"></div></div><div style="float: left;" id="cboxMiddleRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxBottomLeft"></div><div style="float: left;" id="cboxBottomCenter"></div><div style="float: left;" id="cboxBottomRight"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div><div style="position: absolute; top: -10000px; left: -10000px; width: 48.9362px; font-size: 13px; font-family: &quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif; font-weight: 400; line-height: 18px; resize: none;"></div>
<script type="text/javascript">
    function check_empty(){
          var fname = $('#')
    }
</script>


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