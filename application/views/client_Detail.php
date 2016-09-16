	<!-- add organization page added by Rajendra on 20th July -->
	<!-- add organization body starts -->
	<div class="page-title">
		<div class="title-env">
			<h1 class="title">Add Client</h1>
			<p class="description">Add Client</p>
		</div>
		<div class="breadcrumb-env">
			<ol class="breadcrumb bc-1"></ol>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<?php  if($this->session->flashdata('category_success')) { ?>
				<div class="row">
					<div style="margin-left:250px ;margin-right:250px"; class="alert alert-success">
						<strong><?=$this->session->flashdata('message')?></strong> 
					</div>
				</div>
				<?php }?>
				<?php  if($this->session->flashdata('category_error')) { ?>
				<div class="row">
					<div style="margin-left:250px ;margin-right:250px"; class="alert alert-danger">
						<strong><?=$this->session->flashdata('message')?></strong> 
					</div>
				</div>
				<?php }?>
				<!-- body container  starts -->		
				<div class="panel-body">
					<form role="form" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>Master/clientPost/">
						<input type="hidden" name="clientID" value="<?php if(isset($clientupdate[0]->clientID)){ echo $clientupdate[0]->clientID; } ?>" >
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-1"> Client Name<span style="color:red;">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control input-lg"  maxlength="30"  name="clientName" placeholder="Enter Client Name" value="<?php if(isset($clientupdate[0]->clientName)){ echo $clientupdate[0]->clientName; } ?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-1">Contact Persone<span style="color:red;">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control input-lg"  maxlength="30" name="contactPerson" placeholder=" Enter Contact Persone"value="<?php if(isset($clientupdate[0]->contactPerson)){ echo $clientupdate[0]->contactPerson; }?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-1">Address<span style="color:red;">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control input-lg"  maxlength="50" name="address" placeholder="Please Enter Full Address" value="<?php if(isset($clientupdate[0]->address)){ echo $clientupdate[0]->address; }?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-1">Contact Number<span style="color:red;">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control input-lg" id="quantity" maxlength="12" name="contactNumber" placeholder="Please Enter Contact Number" value="<?php if(isset($clientupdate[0]->contactNumber)){ echo $clientupdate[0]->contactNumber;}?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-1">Email Id<span style="color:red;">*</span></label>
							<div class="col-sm-8">
								<input type="email" class="form-control input-lg" maxlength="30" name="emailID" placeholder="Please Enter Email ID" value="<?php if(isset($clientupdate[0]->emailID)){ echo $clientupdate[0]->emailID;}?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-1">Website<span style="color:red;">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control input-lg"  maxlength="50" name="webSite" placeholder="Please Enter Website Name" value="<?php if(isset($clientupdate[0]->webSite)){ echo $clientupdate[0]->webSite;}?>" required>
							</div>
						</div><br/>
						<div class="form-group">
							<button type="submit" class="btn btn-success">Submit</button>
							<button type="reset" class="btn btn-white" onClick="window.history.back();">Cancel</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- body container ends starts -->