<link rel="stylesheet" href="css/pepper-grinder/jquery-ui-1.10.3.custom.css" type="text/css" media="screen" />
<script type="text/javascript" src="facebox/facebox.js"></script>
<link href="facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<link type="text/css" href="css/jquery.ui.chatbox.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery.ui.chatbox.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'facebox/loading.gif',
        closeImage   : 'facebox/closelabel.png'
      })
    })
</script>
<script type="text/javascript">
      $(document).ready(function(){
          var box = null;
          $("a[id='chatlist']").click(function(event, ui) {
              if(box) {
                  box.chatbox("option", "boxManager").toggleBox();
              }
              else {
                  box = $("#chat_div").chatbox({id:"KIOO1", 
                                                user:{key : "value"},
                                                title : "KIOO1",
                                                messageSent : function(id, user, msg) {
                                                    $("#log").append(id + " said: " + msg + "<br/>");
                                                    $("#chat_div").chatbox("option", "boxManager").addMsg(id, msg);
                                                }});
              }
          });
      });
</script>
<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
                            <a indepth="true" class="brand" href="dashboard.php"> <img alt="Charisma Logo" src="images/logo.png"> </a>
				

				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="log_top">
						<i class="icon-user"></i><span class="hidden-phone"> Logged in as <?php echo $_SESSION['cur_user']; ?></span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
                        	<a indepth="true" href="../../index/view/change_password.php" rel="facebox">
                            	<i class="icon-pencil icon-darkgray"></i>
                                	Change password</a>
                        </li>
						<li class="divider"></li>
						
                        <li>
                                                    <a indepth="true" href="../../index/view/faq_results.php" target="_blank">
                            	<i class="icon-faq icon-darkgray"></i>
                                	FAQ</a>
                        </li>
						<li>
                                <a indepth="true" href="#" id="chatlist">
                        		<i class="icon-faq icon-darkgray"></i>
                            		Chat List</a>
                        </li>
                        <li>
                        	<a indepth="true" href="../../index/view/logout.php">
                        		<i class="icon-off icon-darkgray"></i>
                            		Logout</a>
                        </li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
				<div class="top-nav nav-collapse" style="margin-top: 5px;">
					<h2>KEY - Institute Management System</h2>
				</div><!--/.nav-collapse -->
			</div>
<div id="chat_div">
</div>