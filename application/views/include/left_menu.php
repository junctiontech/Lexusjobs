<?php $userdata = $this->session->userdata('username');
//print_r($userdata['organization_name']);die;
?>


<body class="page-body  skin-concrete">
<div class="page-loading-overlay">
	<div class="loader-2"></div>
</div>
<nav class="navbar horizontal-menu navbar-fixed-top"><!-- set fixed position by adding class "navbar-fixed-top" -->
		
		<div class="navbar-inner">
			<!-- Navbar Brand -->
			<div class="navbar-brand">
				<a href="javascript:;" class="logo">
					<img src="<?php echo base_url(); ?>assets/images/junctionerplogo.png" width="180" alt="" class="hidden-xs" />
					<img src="<?php echo base_url(); ?>assets/images/junctionerplogo.png" width="120" alt="" class="visible-xs" />
				</a>
		
			</div>
				<!-- Mobile Toggles Links -->
			<div class="nav navbar-mobile">
			
				<!-- This will toggle the mobile menu and will be visible only on mobile devices -->
				<div class="mobile-menu-toggle">
					<!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
				
					<!-- data-toggle="mobile-menu-horizontal" will show horizontal menu links only -->
					<!-- data-toggle="mobile-menu" will show sidebar menu links only -->
					<!-- data-toggle="mobile-menu-both" will show sidebar and horizontal menu links -->
					<a href="javascript:;" data-toggle="mobile-menu-both">
							<i class="fa-bars"></i>
						</a>
				</div>
				
			</div>
			
			<div class="navbar-mobile-clear"></div>
			
			<ul class="navbar-nav">
				<li>
					<a href="javascript:;" data-toggle="sidebar">
							<i class="fa-bars"></i>
						</a>
						</li>
					<!-- add class "multiple-expanded" to allow multiple submenus to open -->
					<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
					
					<li>
					    <a href="<?php echo base_url(); ?>Master/masterEntry">
							<i class="fa fa-cog" title="Manage_Project"></i>
							<span class="title">Setting</span>
						</a>
						<!--<a  href="<?php echo base_url(); ?>home?menu=report" >
							<i class="linecons-money"></i>
							<span id="payable" class="title">Reporting</span>
						</a>-->
				
					</li>
					<li>
					    <a href="<?php echo base_url(); ?>Master/reportQuery" data-toggle="modal" data-target="#modal-6">
							<i class="fa fa-bug" title="Report Query"></i>
							<span class=" title">Report Query</span>
						</a>
					</li>
					<li>
					<a href="javascript:;" onclick="var el = document.getElementById('element'); el.webkitRequestFullscreen();">
							<i class="fa-arrows-alt"></i>
						
					</a>
					</li>
				</ul>
				<ul class="nav nav-userinfo navbar-right">
				
					<li class="dropdown user-profile">
					<a href="#" data-toggle="dropdown">
						<img src="<?php echo base_url(); ?>assets/images/user-1.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
						<span>
							<?=$userdata['username'];?>
							<i class="fa-angle-down"></i>
						</span>
					</a>
					
					<ul class="dropdown-menu user-profile-menu list-unstyled">
						<li>
								<a href="<?=base_url();?>admin_panel/acc_setting">
									<i class="fa-wrench"></i>
									Settings
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<i class="fa-user"></i>
									Profile
								</a>
							</li>
							
							<li class="last">
								<a href="<?php echo base_url(); ?>login/logout">
									<i class="fa-lock"></i>
									Logout
								</a>
							</li>
					</ul>
				</li>
				
				</ul>
			</div>
		
	</nav>
<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
			
		<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
		<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
		<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
		<div class="sidebar-menu toggle-others fixed">
			
			<div class="sidebar-menu-inner">	
			<?php if(isset($_GET['menu'])!=1){  ?>		
				<ul id="main-menu" class="main-menu hr">
					<!-- add class "multiple-expanded" to allow multiple submenus to open -->
					<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
					<li>
						<a href="javascript:void(0);">
							<i class="linecons-lightbulb" title="Dashboard"></i>
							<span class="title" >Dashboard</span>
						</a>
					
					</li>
					<li>
						<!--<a href="<?php echo base_url(); ?>Master/master_entry">
							<i class="fa fa-cog" title="Manage_Project"></i>
							<span class="title">Setting</span>
						</a>-->
					
					</li>
					<li>
						<a href="<?php echo base_url(); ?>Master/projectUpdate">
							<i class="linecons-cog" title="manageProject"></i>
							<span class="title">Manage Project</span>
						</a>
					
					</li>
					 <li>
						<a href="<?php echo base_url(); ?>Master/resumeUpdate">
							<i class="linecons-cog" title="manageResume"></i>
							<span class="title">Manage Resume</span>
						</a>
				
					</li>
					 <li>
						<a href="<?php echo base_url(); ?>Master/cvFilter">
							<i class="linecons-cog"  title="cvFilter"></i>
							<span class="title" >CV Filter</span>
						</a>
				
					</li>
					<li>
						<a href="<?php echo base_url(); ?>Master/partnerUpdate">
							<i class="linecons-cog"  title="Designations"></i>
							<span class="title" >Partner</span>
						</a>
				
					</li>
					<li>
						<a href="<?php echo base_url(); ?>Master/clientUpdate">
							<i class="linecons-database"  title="Designations"></i>
							<span class="title" >Client</span>
						</a>
				
					</li>
				<!--  <li><a href="<?=base_url()?>role/user_role"> <i class="linecons-t-shirt" title="User Management"></i><span class="title" >User Management</span></a></li>
					<li><a href="<?=base_url()?>role/role_management"> <i class="linecons-comment" title="Role Management"></i><span class="title" >Role Management</span></a></li> -->
				</ul>
				<?php }?>
				
				</div>
				<!--  ul End for payable -->
			
		
		</div>

<div class="main-content"  id="element">


				
			
			
			
			
			
	
