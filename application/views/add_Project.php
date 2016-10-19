<!-- add organization page added by Rajendra on 20th July -->
<!-- add organization body starts -->
	<div class="page-title">
		<div class="title-env">
			<h1 class="title">Add Project</h1>
			<p class="description">Add Project</p>
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
					<form role="form" id="myform" class="form-horizontal" method="post" onsubmit="return project();" enctype="multipart/form-data" id="return add_validation()" action="">
						<input type="hidden" name="projectID" id="projectID" value="<?php if(isset($update[0]->projectID)){ echo $update[0]->projectID; } ?>" >
						<div class="form-group">
							<label class="col-sm-2 control-label" for="inputlg">Project Name<span style="color:red;">*</span></label>
							<div class="col-sm-8">
								<input type="text" maxlength="70"  class="form-control input-lg" name="projectName" id="projectName" placeholder="Please Enter Project Name" value="" required>
								<span id="projectName_error" style="color:red"></span> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-1">Project Type<span style="color:red;">*</span></label>
							<div class="col-sm-8">
								<select id="projectType" name="projectType" class="form-control input-lg" required>
									<option value="">Please Select Project Type<span style="color:red;"></span></option>
									<?php 
									foreach ($master_projectType as $list){ ?>
									<option value="<?=$list->masterValueID ;?>"<?php if(isset($update[0]->projectType) && $list->masterValueID==$update[0]->projectType){ echo 'selected'; }?>><?=$list->masterValueName;?></option>
									<?php } ?>
								</select>
								<span id="projectType_error" style="color:red"></span> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-1">Client Name<span style="color:red;">*</span></label>
							<div class="col-sm-8">
								<select name="clientName" id="clientName" class="form-control input-lg" required>
									<option value="">Please Select Client Name<span style="color:red;"></span></option>
									<?php 
									foreach ($clientListName as $list){ ?>
									<option value="<?=$list->clientID ;?>"<?php if(isset($update[0]->clientName) && $list->clientID==$update[0]->clientName){ echo 'selected'; }?>><?=$list->clientName;?></option>
									<?php } ?>
								</select>
								<span id="ClientName_error" style="color:red"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-1">Partner Name<span style="color:red;">*</span></label>
							<div class="col-sm-8">
								<select name="partnerName" id="partnerName" class="form-control input-lg" placeholder="Please Enter Partner Name" required>
									<option value="">Please Select Partner Name</option>
									<?php 
									foreach ($partnerListName as $list){?>
									<option value="<?=$list->partnerID ;?>"<?php if(isset($update[0]->partnerName) && $list->partnerID==$update[0]->partnerName){ echo 'selected'; }?>><?=$list->partnerName;?></option>
									<?php } ?>
								</select>
								<span id="partnerName_error" style="color:red"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-1">Project Duration<span style="color:red;">*</span></label>
							<div class="col-sm-3">
								<input type="text" maxlength="30" class="form-control input-lg" name="projectDuration" id="projectDuration" placeholder="Please Enter Project Duration" value="" required>
								<span id="projectDuration_error" style="color:red"></span>						
							</div>   
							<label class="col-sm-2 control-label" for="field-1">Tender Submission Date<span style="color:red;">*</span></label>
							<div class="col-sm-3">
								<input type="" class="form-control datepicker" name="projectStartDate" id="projectStartDate" placeholder="Please Select Project Start Date" value="" required readonly>
								<span id="projectStartDate_error" style="color:red"></span>
							</div>
						</div><br/>
						<!--<div class="col-md-12">											
							<div class="form-group group">											
								<label class="col-sm-4 control-label">Resume<span style="color:red;">*</span></label>								
								<div class="col-sm-8">
									<input type="file" class="form-control input-lg" data-validate="required" data-message-required="Please Upload Resume" name="tenderDocument"/>
								</div>
							</div>
						</div>-->
						<div class="form-group" style="margin-left: 80px;">
							<button type="submit" name="submit" class="btn btn-success">Submit</button>
							<button type="reset" class="btn btn-white" onClick="window.history.back();">Cancel</button>
						</div>
					</form>
				</div>
				<div class="panel panel-default">
					<div id="listingdiv">
						<div class="panel-body">
						<script type="text/javascript">
							jQuery(document).ready(function($)
							{
							$("#example-1").dataTable({
							aLengthMenu: [
							[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
							]
							});
							});
							</script>
							<div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">
								<table id="example-1" cellspacing="0" class="table table-small-font table-bordered table-striped">
									<thead>
										<tr>
											<th>S. no</th>
											<th>Project Name</th>
											<th>Project Type</th>
											<th>Tender Submission Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>S. no</th>
											<th>Project Name</th>
											<th>Project Type</th>
											<th>Tender Submission Date</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
										<?php if(isset($projectList) && !empty($projectList)){
										$i=1; foreach($projectList as $list){?>
										<tr>
											<td><?=$i;?></td>
											<td><?php if(isset($list->projectName)){ echo $list->projectName; } ?></td>
											<td><?php if(isset($list->projectType)){  foreach($master_projectType as $type){ if($type->masterValueID==$list->projectType){ echo $type->masterValueName; }else{ echo ''; } } } ?></td>
											<td><?php if(isset($list->projectStartDate)){ echo date('d-m-Y',strtotime($list->projectStartDate)); } ?></td>
											<td>
												<a onclick="projectEditValue(<?=$list->projectID;?>)" class="btn btn-secondary btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="bottom" title="Edit" data-original-title="Edit" style="width: 40px; height: 30px;" class="status" value="Edit"><i class="fa-pencil-square-o"></i></a>
												<a onclick="projectDelete(<?=$list->projectID; ?>)"class="btn btn-danger btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="bottom" title="Delete" data-original-title="Delete" style="width: 40px; height: 30px;" class="status" value="Delete"><i class="fa fa-trash-o"></i></a>
												<a href="<?php echo base_url(); ?>Master/shortlist/<?=$list->projectID; ?>" class="btn btn-success btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="bottom" title="Short CV" data-original-title="Short CV" style="width: 40px; height: 30px;" class="status" value="Short CV" ><i class="fa-filter"></i></a>
												<a href="<?php echo base_url(); ?>Master/projectRequirementUpdate?projectID=<?=$list->projectID; ?>" class="btn btn-secondary btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="bottom" title="Project Requirement" data-original-title="Project Requirement" style="width: 40px; height: 30px;" class="status" value="Project Requirement"><i class="fa fa-bars" aria-hidden="true"></i></a>
												<a href="<?php echo base_url(); ?>Master/projectDocument/<?=$list->projectID; ?>" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Document Upload" data-original-title="Document Upload" style="width: 40px; height: 30px;" class="status" value="Document Upload"><i class="fa fa-upload" aria-hidden="true"></i></a>
												<?php
												//if($list->status =='Active'){ ?>
												<!--<a href="<?php echo base_url();?>Master/status" class="btn btn-success btn-sm btn-icon icon-left">Inactive</a>
												<?php //}else{ ?>	  
												<a href="<?php echo base_url();?>Master/status" class="btn btn-success btn-sm btn-icon icon-left">Active</a>-->
												<?php// }?>
											</td>
										</tr>
										<?php $i++; } }?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>