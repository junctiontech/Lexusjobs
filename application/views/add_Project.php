<!-- add organization page added by Rajendra on 20th July -->
<!-- add organization body starts -->
<div class="page-title">
	<div class="title-env">
		<h1 class="title">Add Project</h1>
		<p class="description">Add Project</p>
	</div>
<!-- breadcrumbs starts -->
		<div class="breadcrumb-env">
			<ol class="breadcrumb bc-1"></ol>
		</div>
<!-- breadcrumbs ends -->	
</div>	
<!-- page title closed -->
<!-- body container  starts -->
<div class="row">
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
	<div class="panel-body">
		<form role="form" class="form-horizontal" method="post" onsubmit="return add_validation()" action="<?php echo base_url();?>Master/projectPost/">
			<input type="hidden" name="projectID" value="<?php if(isset($update[0]->projectID)){ echo $update[0]->projectID; } ?>" >
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Project Name</label>
				<div class="col-sm-10">
					<input type="text" maxlength="70" class="form-control" name="projectName" id="projectName" placeholder="Please Enter Project Name" value="<?php if(isset($update[0]->projectName)){ echo $update[0]->projectName; } ?>"required>
						<span id="projectName_error" style="color:red"></span> 
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Project Type</label>
				<div class="col-sm-10">
					<select id="projectType" name="projectType" class="form-control" required>
						<option value="">Please Select Project Type</option>
							<?php 
							foreach ($master_projectType as $list){ ?>
						<option value="<?=$list->masterValueID ;?>"<?php if(isset($update[0]->projectType) && $list->masterValueID==$update[0]->projectType){ echo 'selected'; }?>><?=$list->masterValueName;?></option>
							<?php } ?>
					</select>
					<span id="projectType_error" style="color:red"></span> 
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Client Name</label>
				<div class="col-sm-10">
					<select name="clientName" id="ClientName" class="form-control" required>
						<option value="">Please Select Client Name</option>
							<?php 
								foreach ($clientListName as $list){ ?>
						<option value="<?=$list->clientID ;?>"<?php if(isset($update[0]->clientName) && $list->clientID==$update[0]->clientName){ echo 'selected'; }?>><?=$list->clientName;?></option>
							<?php } ?>
					</select>
					<span id="ClientName_error" style="color:red"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Partner Name</label>
				<div class="col-sm-10">
					<select name="partnerName" id="partnerName" class="form-control" placeholder="Please Enter Partner Name" required>
						<option value="">Please Select Partner Name</option>
							<?php 
								foreach ($partnerListName as $list){?>
						<option value="<?=$list->partnerID ;?>"<?php if(isset($update[0]->partnerName) && $list->partnerID==$update[0]->partnerName){ echo 'selected'; }?>><?=$list->partnerName;?></option>
							<?php } ?>
					</select>
					<div id="partnerName_error" style="color:red"></div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="field-1">Project Duration</label>
				<div class="col-sm-4">
					<input type="text" maxlength="30" class="form-control" name="projectDuration" id="projectDuration" placeholder="Please Enter Project Duration" value="<?php if(isset($update[0]->projectDuration)){ echo $update[0]->projectDuration;}?>" required>
					<div id="projectDuration_error" style="color:red"></div>						
				</div>   
				<label class="col-sm-2 control-label" for="field-1">Tender/Bid Submission Date</label>
				<div class="col-sm-4">
					<input type="" class="form-control datepicker" name="projectStartDate" id="projectStartDate" placeholder="Please Select Project Start Date" value="<?php if(isset($update[0]->projectStartDate)){ echo $update[0]->projectStartDate;}?>" required readonly>
					<div id="projectStartDate_error" style="color:red"></div>
				</div>
			</div><br/>
			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-success">Submit</button>
				<button type="reset" class="btn btn-white" onClick="window.history.back();">Cancel</button>
			</div>
		</form>
	</div>
</div>
	