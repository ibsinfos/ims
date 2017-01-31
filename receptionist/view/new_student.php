<?php 
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='2'))
{
   require_once '../model/course.php';
   require_once '../model/student.php';
 ?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
	<title>Admission | KEY - Institute Management System</title>
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
        <!-- application script for Charisma demo -->
	<script src="js/charisma.js"></script>
        <script>
        jQuery(document).ready(function(){
        $("#admission").validationEngine({
        'custom_error_messages': {
        // Custom Error Messages for Validation Types
        '#first_name':{
        'required': {'message': "First Name cannot be blank"}
            },
        '#last_name':{
        'required': {'message': "Last Name cannot be blank"}
            },
        '#title':{
        'required': {'message': "title cannot be empty"}
            },
        '#name_initials':{
        'required': {'message': "Initials should be given"}
            },
        '#dob':{
        'required': {'message': "field cannot be empty"}
            },
        '#sex':{
        'required': {'message': "Select the gender."}
            },
        '#course':{
        'required': {'message': "Select the gender."}
            },
        'checkbox':{
        'required': {'message': "Select atleast one course."}
            }            
        }
        });
        });
        </script>
        <script type="text/javascript">
        $(function() {
            //Datepicker
            $( "#dob" ).datepicker({
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
          $(function() {
            //Datepicker
            $( "#admission_date" ).datepicker({
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
	
        <script type="text/javascript">
            function get_course_name(cat_id)
            {   
                $.ajax({
                        url: "../controller/ajaxfunctions.php",
                        type: "POST",
                        cache: false,
                        async:false,
                        data: {course_cats:true,cat_id:cat_id},
                        success: function(theResponse){
                            var course_subs = $.parseJSON(theResponse);
                            $('#course_subs').html('');
                            $.each(course_subs, function(i, val) {
                                $('#course_subs').append("<input data-validation-engine='validate[required]' type='checkbox' onChange='checkBoxVal(this.value)' id='"+val.course_id+"' name='course[]' value='"+ val.course_id +"' /> "+val.course_name+" <br/>");                                
                            });
                        }
                    });
            }
            var total_fees = 0;
            function checkBoxVal(checkval){
                var subject_checked = $('#'+checkval).is(':checked');
                var sub_id = checkval;
                if(subject_checked === true)
                    {                                                
                        $.ajax({
                        url: "../controller/ajaxfunctions.php",
                        type: "POST",
                        cache: false,
                        async:false,
                        data: {subject_values:true,sub_id:sub_id},
                        success: function(theResponse){
                            var course_subs = $.parseJSON(theResponse);
                            $.each(course_subs, function(i, val) {
                                $("#payments_subs").append("<tr><td class='"+val.course_id+"'>"+val.course_name+"<input type='hidden' name='course_id[]' value='"+val.course_id+"'></td><td> - "+val.fee+"<input type='hidden' name='crs_payment[]' id='crs_actual_fee_"+val.course_id+"' value='"+val.fee+"'></td><td align='center'><select class='span6 typeahead' onchange='chk_payment_status(this.value,actual_fee_"+val.course_id+");' style='width: auto !important; height: auto !important' name='course_payment_status[]'><option value='full'>Full Payment</option><option value='half'>Half Payment</option><option value='free'>Free Card</option></select></td><td align='center'><input type='text' value='"+val.fee+"' class='span7' readonly name='actual_fee[]' class='controls' id='actual_fee_"+val.course_id+"' /></td></tr>");
//                                $('#hidden_values').append("<input type='hidden' name='payment[]' value='"+val.fee+"' >")
//                                $('#hidden_values').append("<input type='hidden' name='check_val[]' value='"+val.fee+"' >")
                                total_fees = total_fees+parseInt(val.fee);
                            });
                        }
                    });                    
                }
                else if(subject_checked === false)
                {
                    $("td."+sub_id).remove();
                    $.ajax({
                        url: "../controller/ajaxfunctions.php",
                        type: "POST",
                        cache: false,
                        async:false,
                        data: {subject_values:true,sub_id:sub_id},
                        success: function(theResponse){
                            var course_subs = $.parseJSON(theResponse);
                            $.each(course_subs, function(i, val) {
                                total_fees = total_fees-parseInt(val.fee);
                            });
                        }
                    });
                }
                $('#total_fees').val(total_fees);
            }
        </script>
        
<script type="text/javascript">    
    function payment_form(){
        var classes = $('#classes').val();
        if(classes == '')
            {
                return false;
            }
        var fees = $('#total_fees').val();
        var amount = $('#admission').val();
        var tot_amount = parseInt(fees)+parseInt(amount);
//        var course_subs =getElementByName('course_id');
//        alert(course_subs);
//        alert(course);
        
        $('#tot_amount').val(tot_amount+".00");
         $("#student_details_form").css('display', 'none');
         $("#payment_form").css('display', 'block');
    
    
}
function chk_payment_status(payment_status,course_fee_id)
{
    var status = payment_status;
    if(status === "half")
        {
            if(course_fee_id.value == 0)
                {
                    var course_fee = course_fee_id.id;
                    var full_fees = document.getElementById("crs_"+course_fee).value;
                    var payment_fee = parseInt(full_fees/2);
                    course_fee_id.value = payment_fee;
                    tot = $('#tot_amount').val();
                    act_tot = (parseInt(tot) + parseInt(payment_fee));
                    $('#tot_amount').val(act_tot+".00");
                    return false;
                }
                else
                    {
                        var course_fee = course_fee_id.value;
                        var payment_fee = parseInt(course_fee/2);
                        course_fee_id.value = payment_fee;
                        tot = $('#tot_amount').val();
                        act_tot = (parseInt(tot) - parseInt(payment_fee));
                        $('#tot_amount').val(act_tot+".00");
                        return false;
                    }
        }
        else if(status === "free")
        {
            var course_fee = course_fee_id.value;
            course_fee_id.value = 0;
            tot = $('#tot_amount').val();
            act_tot = (parseInt(tot) - parseInt(course_fee));
            $('#tot_amount').val(act_tot+".00");
            return false;
        }
        else if(status === "full")
        {
            var course_fee = course_fee_id.id;
            var full_fees = document.getElementById("crs_"+course_fee).value;
            course_fee_id.value = full_fees;
            if(course_fee_id.value == 0)
                {
                    tot = $('#tot_amount').val();
                    act_tot = (parseInt(tot) + parseInt(full_fees));
                    $('#tot_amount').val(act_tot+".00");
                    return false;
                }
                else
                    {
                        course_fee = course_fee_id.value
                        tot = $('#tot_amount').val();
                        act_tot = (parseInt(tot) + (parseInt(course_fee)));
                        $('#tot_amount').val(act_tot+".00");
                        return false;
                    }
        }
}
function getexsist(){
if($('#existing').is(':checked')){
    $('#parent_details').css('display','none');
    $('#existing_parent').css('display','block');
}
else{
    $('#existing_parent').css('display','none');
    $('#parent_details').css('display','block');
}
}
</script>      
        
        
        <link rel="shortcut icon" href="images/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="css/student.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all"/>                
                
</head>
<body>
		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
		<?php include 'common/receptionist_header.php';?>                    
		</div>
	</div>
	<!-- topbar ends -->		<div class="container-fluid">
			<div class="row-fluid">
				
				<!-- left menu starts -->
            <div class="span2 main-menu-span">
                <?php include 'common/receptionist_side_nav.php'; ?>
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
                    
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#manage">Manage students</a></li>
                         <li class=""><a href="#create">Add student</a></li>
                    </ul>
            
            
            <div id="myTabContent" class="tab-content">
            
            	
            	<!------MANAGE STUDENTS------->
                <div class="tab-pane active" id="manage">
                    <form class="form-horizontal" method="post" action="" >
        <fieldset>
            <legend>
                <i class="icon32 icon-gear"></i>Student list
                <select id="courses" style="margin: 20px;" name="courses">
                    <option selected="selected" value="0">Select a Course</option>
                        <?php
                        $obj = new Course();
                        $result = $obj->getCourses();
                        while ($row = mysql_fetch_array($result)) {
                            ?>                 
                    <option value="<?php echo $row['course_id']; ?>"><?php echo $row['course_category_name'] . " - " . $row['course_name']; ?></option>
                        <?php } ?>                                                
                    </select>
                                     
                                   
                
                <input type="hidden" name="action" value="search"/>
                <button type="submit" name="studnet_list" class="btn btn-info"><i class="icon-zoom-in icon-white"></i> Browse</button>
            </legend>
            <div class="center">
            
            </div>
        </fieldset>
    </form>
       <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"><table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
  <thead>
      <tr role="row">
          <th aria-label="ID: activate to sort column descending" aria-sort="ascending" style="width:12px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting_asc">Admission No</th>
          <th aria-label="Photo: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting" width="80">Name</th>
          <th aria-label="Name: activate to sort column ascending" style="width: 70px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting">Image</th>
          <th aria-label="Options: activate to sort column ascending" style="width: 310px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting" width="350">Options</th></tr>
  </thead>
               <?php 
               if(isset($_POST['action'])&& $_POST['action']=="search"){
                   $course = $_POST['courses'];
                  
                   $obj = new Student();
                   $result = $obj->getStudentsByCourse($course);
                  while($res = mysql_fetch_array($result)){
                       
               ?>
<tbody aria-relevant="all" aria-live="polite" role="alert">
    
    <tr class="odd">
        
        <td class=" "><?php echo $res['stu_admission_no'];?>
                              </td>
        <td class=" "><?php echo $res['first_name'];?> <?php echo $res['last_name'];?></td>
        <td class =" "> <img class="image_thumbnail" src="../../store/user_images/<?php echo $res['prof_image'];?>" width="40" height="40" border="5"/>    </td>
       
        <td class=" " >
            <a class="btn btn-success" rel="facebox" href="view_student_profile.php?student_id=<?php echo $res['student_id'];?>">
                <i class="icon-user icon-white"></i>  
                View Profile                                         
            </a>
            <a class="btn btn-info" rel="facebox" href="edit_student_profile.php?student_id=<?php echo $res['student_id'];?>">
                    <i class="icon-edit icon-white"></i>  
                        Edit                                            
                            </a>
<!--            <a class="btn btn-success" href="">
                       <i class="icon-book icon-white"></i>
                        Academic Result
            </a>-->
           <a class="btn btn-danger" href="../controller/student.php?action=delete&student_id=<?php echo $res['student_id']; ?>" onclick="return confirm('Are you Sure you want to delete this record?');">
<i class="icon-trash icon-white"></i>
Delete
</a> 
        </td>
    </tr>
    <?php } }   ?>
    </tbody>
</table>             
     </div>
    <div class="alert alert-info" style="margin: 50px;">Select a class to browse it's students</div>
                </div>
                
                <!------CREATE NEW STUDENT------->
                <div class="tab-pane" id="create">
                    
                	<form class="form-horizontal" method="post" action="../controller/student.php" enctype="multipart/form-data" id="admission">
                    <div id="student_details_form">        
                    <fieldset>
        <legend><i class="icon32 icon-square-plus"></i>Add new student </legend>
         <table>
                                <tr>
                                    <?php  
                                    $object = new Student();
                                    $result = $object->getLastRecord();
                                    $new_student_admission_no = ++$result['stu_admission_no'];
                                    ?>
                                    <td><div class="control-group">
            <label class="control-label" for="typeahead">Admission No </label>
            <div class="controls">
                <input class="span6 typeahead" name="admission_no" placeholder="" value="<?php echo $new_student_admission_no;?>" type="text" readonly="readonly"/>
            </div>
        </div></td>
                                    <td>
                                        <div class="control-group">
            <label class="control-label" for="typeahead">Admission Date </label>
            <div class="controls">
                <input class="span typeahead" name="admission_date"  id="admission_date" placeholder="" value="<?php echo date("Y-m-d");?>" type="text" />
            </div>
        </div>
                                        
                                    </td>
                                </tr>
                            </table>   
        <h2>Basic Information</h2>
        <hr/>
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
                <input class="span6 typeahead" name="first_name" id="first_name" data-validation-engine="validate[required]" placeholder="" value="" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Last name </label>
            <div class="controls">
                <input class="span6 typeahead" id="last_name" name="last_name" data-validation-engine="validate[required]"value="" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Name with initials </label>
            <div class="controls">
                <input class="span6 typeahead" id="name_initials" data-validation-engine="validate[required]" name="name_initials" placeholder="" value="" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="date01">Birthday</label>
            <div class="controls">
                <input id="dob" data-validation-engine="validate[required]" class="span6 " name="birthday" type="date"id="dob">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Sex </label>
            <div class="controls">
                <select id="sex" name="sex" class="span6 typeahead" data-validation-engine="validate[required]">
                    <option value="">select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Profile Image </label>
            <div class="controls">
               <input class="span6 typeahead" name="prof_image" placeholder="" value="" type="file">  
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">School</label>
            <div class="controls">
                 <input class="span6 typeahead" id="school" data-validation-engine="validate[required]" name="school" placeholder="" value="" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Course </label>
            <div class="controls">
                <select id="classes" onchange="get_course_name(this.value);"  name="course_id" class="span6 typeahead" data-validation-engine="validate[required]">
                    <option></option>
                        <?php
                        $obj = new Course();
                        $result = $obj->getCourseCategory();
                        while ($row = mysql_fetch_array($result)) {
                            ?>
                 
                            <option value="<?php echo $row['course_category_id']; ?>"><?php echo $row['course_category_name']; ?></option>
                        <?php 
                        
                        } 
                        ?>
                                                
                    </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Subjects </label>
            <div class="controls">
                  <div id="course_subs">                      
                  </div>
            </div>
        </div>
        
        <br/><br/>
        
        <h2>Contact Information</h2>
        <hr/>
        <div class="control-group">
            <label class="control-label" for="typeahead">Address </label>
            <div class="controls">
                <textarea id="address" style="height: 18px;" class="span6 autogrow" name="address" data-validation-engine="validate[required]"></textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Mobile </label>
            <div class="controls">
                <input id="phone" class="span6 typeahead" name="phone" type="text" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Fix No</label>
            <div class="controls">
                <input id="home_phone" class="span6 typeahead" name="home_phone" data-validation-engine="validate[required]" value="" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Email </label>
            <div class="controls">
                <input id="email" class="span6 typeahead" data-validation-engine="validate[required]" name="email"  value="" type="email">
            </div>
        </div>
       <div class="control-group">
            <label class="control-label" for="typeahead"> </label>
            <div class="controls">
                <label> <input type="checkbox" name="existing" id="existing" onchange="getexsist();"/>Parent Records Exist</label>
            </div>
        </div> 
       <br/><br/>
       <div id="parent_details">
        <h2>Parent Information</h2>
        <hr/>        
        <div class="control-group">
            <label class="control-label" for="typeahead">Parent's name </label>
            <div class="controls">
                <input id="parent_name" class="span6 typeahead" name="parent_name"  type="text" data-validation-engine="validate[required]">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Relation </label>
            <div class="controls">
                <input id="relation" class="span6 typeahead" name="relation" type="text"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Occupation </label>
            <div class="controls">
                <input id="occupation" class="span6 typeahead" name="occupation" type="text"/>
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="typeahead">NIC no</label>
            <div class="controls">
                <input id="nic" class="span6 typeahead" name="nic" type="text"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Contact No</label>
            <div class="controls">
                <input id="parent_contact" class="span6 typeahead" name="parent_contact" placeholder="" value="" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead">Email</label>
            <div class="controls">
                <input class="span6 typeahead" name="parent_email" type="text" />
            </div>
        </div>
        </div>
       <div id="existing_parent" style="display: none;">
       <div class="control-group">
            <label class="control-label" for="typeahead">Student Admission No:</label>
            <div class="controls">
                <input class="span6 typeahead" name="existing_stduent" placeholder="" value="" type="text" />
            </div>
        </div>
        </div>
        <div class="form-actions">
                
            <input class="btn btn-primary" value="Create student" type="button" onclick="payment_form();"/>
            <input class="btn" value="Clear" type="reset"/>
        </div>
    </fieldset>
    </div>
                    
    <div id="payment_form" style="display: none;">
    <fieldset>
        <?php 
        $object = new Student();
        $res = $object->getLastRecord();
        $stu_id=$res['student_id'];
        $student_id=$stu_id+1;
        $course = $res['course'];
        $courses = explode(",", $course);
        $count = count($courses);
        ?>
      
        <div class="control-group">
            <label class="control-label" for="typeahead">Admission Date:</label>
            <div class="controls">
                <input class="span6 typeahead" name="admission_date" id="admission_date" placeholder="" value="<?php echo date("Y-m-d");?>" type="text" readonly="readonly"/>
            </div>   
        </div>
      
       <?php        
       $admission_obj = new Student();
       $get_admission = $admission_obj->getAdmission();
       
            $tot_admission = $get_admission['amount'];
        ?>
        <div class="control-group">
            <label class="control-label" for="typeahead">Admission Fee: </label>
            <div class="controls">
                
              Rs.<input class="span6 typeahead" name="admission_amount" value="<?php echo $tot_admission.'.00'; ?>" type="text" />
            </div>
                <label class="control-label" for="typeahead">Subjects</label>
                <br/>
                <div class="controls">
                <table id="payments_subs" width="50%">
                    <tr>
                        <th>Subject</th>
                        <th>Actual Fee</th>
                        <th>Method</th>
                        <th>Payment</th>                        
                    </tr>
                    
                </table>
                </div>
                </div>
        
        
        <div class="control-group">
            <label class="control-label" for="typeahead"> Total Amount: </label>
            <div class="controls">
                <input type="hidden" id="total_fees" name="total_fees"/>
                <input type="hidden" id="admission" name="admission" value="<?php echo $tot_admission;?>" />
              Rs. <input class="span2 typeahead" id="tot_amount" name="amount"  value="" type="text" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead"> Remarks: </label>
            <div class="controls">
                <textarea name="remarks"></textarea>
            </div>
        </div>        
        <div class="form-actions">
            <input type="hidden" value="<?php echo $student_id;?>" name="new_student_id"/>
            <input name="action" value="add_student" type="hidden" />
          
            <input class="btn btn-primary" value="Add Payment" type="submit" />
          
            <input class="btn" value="reset form" type="reset" />
        </div>
        </fieldset>
    
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
	<hr />
			<!---------facebook like page--------->
	<p class="pull-right">Powered by: <a href="#" target="_top">Key Institute</a></p>
</footer>
                        <?php
    if(isset($_GET['print'])&& isset($_GET['print'])=='facebox')
    {   $std_id = $_GET['std_id'];
//        $course_id = $_GET['subject'];
        ?>
                <script type="text/javascript">
//       payment_reciept.php?student_id=28
            jQuery.facebox({ ajax:'payment_reciept.php?student_id=<?php echo $std_id;?>'});
        </script>
<?php
        }?>
		</div><!--/.fluid-container-->

	
	
		


<div style="display: none;" id="cboxOverlay"></div>
<div style="display: none; padding-bottom: 57px; padding-right: 28px;" class="" id="colorbox">
    <div id="cboxWrapper">
        <div>
            <div style="float: left;" id="cboxTopLeft"></div>
            <div style="float: left;" id="cboxTopCenter"></div>
            <div style="float: left;" id="cboxTopRight"></div>
            
        </div>
        <div style="clear: left;">
            <div style="float: left;" id="cboxMiddleLeft"></div>
            <div style="float: left;" id="cboxContent">
                <div style="width: 0px; height: 0px; overflow: hidden; float: left;" id="cboxLoadedContent"></div>
                <div style="float: left;" id="cboxLoadingOverlay"></div>
                <div style="float: left;" id="cboxLoadingGraphic"></div>
                <div style="float: left;" id="cboxTitle"></div>
                <div style="float: left;" id="cboxCurrent"></div>
                <div style="float: left;" id="cboxNext"></div>
                <div style="float: left;" id="cboxPrevious"></div>
                <div style="float: left;" id="cboxSlideshow"></div>
                <div style="float: left;" id="cboxClose"></div>
                
            </div>
            <div style="float: left;" id="cboxMiddleRight"></div>
            
        </div><div style="clear: left;"><div style="float: left;" id="cboxBottomLeft"></div><div style="float: left;" id="cboxBottomCenter"></div><div style="float: left;" id="cboxBottomRight"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div><div style="position: absolute; top: -10000px; left: -10000px; width: 48.9362px; font-size: 13px; font-family: &quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif; font-weight: 400; line-height: 18px; resize: none;"></div></body>
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