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