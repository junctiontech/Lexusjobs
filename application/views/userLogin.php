<body background="<?=base_url();?>image/login_bckground.jpg">
					<!-- ***************************** Error show here ************************* -->
	<div class="row" >
		<div class="col-md-4 col-md-offset-4 ">
			<?php if($this->session->flashdata('message_type')=='login_error') { ?>
				 <div class="alert alert-danger alert-dismissible fade in" role="alert">
					<strong><?=$this->session->flashdata('messages')?></strong>  
				 </div>
			<?php } ?>
			<?php if($this->session->flashdata('message_type')=='error') { ?>
				 <div class="alert alert-danger alert-dismissible fade in" role="alert">
					<strong><?=$this->session->flashdata('message')?></strong>  
				 </div>
			<?php } ?>
			<?php  if($this->session->flashdata('message_type')=='success') { ?>
				  <div class="alert alert-success alert-dismissible fade in" role="alert">
						<strong><?=$this->session->flashdata('message')?></strong>  </div>
			<?php } ?>
		</div>
	</div>
	<h1 class="h1_head"></h1><br>
	<div class="row">
		<div class="col-md-2 col-md-offset-5">
			<form action="<?php echo base_url(); ?>" method="POST" class="validate form-horizontal" style="margin-top:30px">
				<div class="row">
					<div class="form-group">
						<input type="text" class="form-control input-lg" name="email" id="field-1" placeholder="Email">
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						<input type="password" class="form-control input-lg" name="password" id="field-1" placeholder="Password" >
					</div>
				</div>
				<div align="">
					<div class="form-actions">
					  <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-sign-out"></i> Login</button>
				   </div>
			   </div>
			</form>
		</div>
	</div>
	<div align="right">
		<section class="text-center">
			<p>For new user click here <a href="<?=base_url();?>login/registrationView" class="regi-btn"> Registration</a></p>
		</section>
	</div>
		