<!-- add organization page added by Rajendra on 20th July -->
<!-- add organization body starts -->
<div class="page-title">
	<div class="title-env">
		<h1 class="title">Add Partner</h1>
		<p class="description">Add Partner</p>
	</div>
		<!-- breadcrumbs starts -->
	<div class="breadcrumb-env">
		<ol class="breadcrumb bc-1">
		</ol>
	</div>
		<!-- breadcrumbs ends -->	
</div>
	<!-- page title closed -->
	<!-- body container  starts -->		
<div class="panel-body">
	<form role="form" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>Master/partnerPost/">
		<input type="hidden" name="partnerID" value="<?php if(isset($updateDetail[0]->partnerID)){ echo $updateDetail[0]->partnerID; } ?>" >
		<div class="form-group">
			<label class="col-sm-2 control-label" for="field-1"> Partner Name</label>
			<div class="col-sm-8">
				<input type="text" class="form-control"  maxlength="30" name="partnerName" placeholder="Enter Partner Name" value="<?php if(isset($updateDetail[0]->partnerName)){ echo $updateDetail[0]->partnerName; } ?>" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="field-1">Contact Persone</label>
			<div class="col-sm-8">
				<input type="text" class="form-control"  maxlength="30" name="contactPerson" placeholder=" Enter Contact Persone"value="<?php if(isset($updateDetail[0]->contactPerson)){ echo $updateDetail[0]->contactPerson; }?>" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="field-1">Address</label>
			<div class="col-sm-8">
				<input type="text" class="form-control"  maxlength="50" name="address" placeholder="Please Enter Full Address" value="<?php if(isset($updateDetail[0]->address)){ echo $updateDetail[0]->address; }?>" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="field-1">Contact Number</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" maxlength="12" id="quantity" name="contactNumber" placeholder="Please Enter Contact Number" value="<?php if(isset($updateDetail[0]->contactNumber)){ echo $updateDetail[0]->contactNumber;}?>" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="field-1">Email Id</label>
			<div class="col-sm-8">
				<input type="email" class="form-control" maxlength="30" name="emailID" placeholder="Please Enter Email ID" value="<?php if(isset($updateDetail[0]->emailID)){ echo $updateDetail[0]->emailID;}?>" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="field-1">Website </label>
			<div class="col-sm-8">
				<input type="text" class="form-control"  maxlength="50" name="webSite" placeholder="Please Enter Website Name" value="<?php if(isset($updateDetail[0]->webSite)){ echo $updateDetail[0]->webSite;}?>" required>
			</div>
		</div><br/>
		<div class="form-group">
			<button type="submit" class="btn btn-success">Submit</button>
			<button type="reset" class="btn btn-white" onClick="window.history.back();">Cancel</button>
		</div>
	</form>
</div>
<!-- body container ends starts -->
	</div><!-- main content div end -->
	</div><!-- page container div end -->