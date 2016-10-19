<!-- add organization page added by Rajendra on 20th July -->
<!-- add organization body starts -->
	<div class="page-title">
		<div class="title-env">
			<h1 class="title">Add Partner</h1>
			<p class="description">Add Partner</p>
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
				<form role="form" class="form-horizontal" id="myform" onsubmit="return partnerPost();" method="post" enctype="multipart/form-data" action="">
					<input type="hidden" name="partnerID" id="partnerID" value="<?php if(isset($partnerID)){echo partnerID; }?>" >
					<div class="form-group">
						<label class="col-sm-2 control-label" for="field-1"> Partner Name<span style="color:red;">*</span></label>
						<div class="col-sm-8">
							<input type="text" class="form-control input-lg"  maxlength="30" name="partnerName" id="partnerName" placeholder="Enter Partner Name" value="<?php if(isset($updateDetail[0]->partnerName)){ echo $updateDetail[0]->partnerName; } ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="field-1">Contact Person<span style="color:red;">*</span></label>
						<div class="col-sm-8">
							<input type="text" class="form-control input-lg"  maxlength="30" name="contactPerson" id="contactPerson" placeholder=" Enter Contact Person"value="<?php if(isset($updateDetail[0]->contactPerson)){ echo $updateDetail[0]->contactPerson; }?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="field-1">Address<span style="color:red;">*</span></label>
						<div class="col-sm-8">
							<input type="text" class="form-control input-lg"  maxlength="50" name="address" id="address" placeholder="Please Enter Full Address" value="<?php if(isset($updateDetail[0]->address)){ echo $updateDetail[0]->address; }?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="field-1">Contact Number<span style="color:red;">*</span></label>
						<div class="col-sm-8">
							<input type="text" class="form-control input-lg Number" maxlength="12" id="contactNumber" name="contactNumber" placeholder="Please Enter Contact Number" value="<?php if(isset($updateDetail[0]->contactNumber)){ echo $updateDetail[0]->contactNumber;}?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="field-1">Email Id<span style="color:red;">*</span></label>
						<div class="col-sm-8">
							<input type="email" class="form-control input-lg" maxlength="30" name="emailID" id="emailID" placeholder="Please Enter Email ID" value="<?php if(isset($updateDetail[0]->emailID)){ echo $updateDetail[0]->emailID;}?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="field-1">Website<span style="color:red;">*</span></label>
						<div class="col-sm-8">
							<input type="text" class="form-control input-lg"  maxlength="50" name="webSite" id="webSite" placeholder="Please Enter Website Name" value="<?php if(isset($updateDetail[0]->webSite)){ echo $updateDetail[0]->webSite;}?>" required>
						</div>
					</div><br/>
					<div class="form-group">
						<button type="submit" class="btn btn-success">Submit</button>
						<button type="reset" class="btn btn-white" onClick="window.history.back();">Cancel</button>
					</div>
				</form>
			</div>
			<div class="panel panel-default">
				<div id="listingDiv">	
				<!--<div class="panel-options">
						<a href="<?php echo base_url(); ?>Master/partnerUpdate/"><button style="margin-left: 90%;margin-bottom: -10px;" class="btn btn-theme btn-info btn-icon btn-sm"><i class="fa-plus"></i> <span>Add Partner</span></button></a>
					</div>-->
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
											<th>Partner Name</th>
											<th>Contact Persone</th>
											<th>Contact Number</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>S. no</th>
											<th>Partner Name</th>
											<th>Contact Persone</th>
											<th>Contact Number</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
									<?php if(isset($partnerList) && !empty($partnerList)){
									$i=1; foreach($partnerList as $list){?>
									<tr>
										<td><?=$i;?></td>
										<td><?php if(isset($list->partnerName)){ echo $list->partnerName; } ?></td>
										<td><?php if(isset($list->contactPerson)){ echo $list->contactPerson; } ?></td>
										<td><?php if(isset($list->contactNumber)){ echo $list->contactNumber; } ?></td>
										<td>
											<a onclick="partnerEditValue(<?=$list->partnerID; ?>);" class="btn btn-secondary btn-sm btn-icon icon-left"><i class="fa-pencil-square-o"></i> Edit </a>
											<a onclick="partnerDelete(<?=$list->partnerID; ?>);" class="btn btn-danger btn-sm btn-icon icon-left"><i class="fa fa-trash-o"></i> Delete </a>
											<!--<a href="<?php echo base_url(); ?>Master/shortlist/<?=$list->projectID; ?>" class="btn btn-success btn-sm btn-icon icon-left">ShortlistCV</a>
											<a href="<?php echo base_url(); ?>Master/manage_requierment/<?=$list->projectID; ?>" class="btn btn-secondary btn-sm btn-icon icon-left">Requirement</a>
											<?php
											//if($list->status =='Active'){ ?>
											<a href="<?php echo base_url();?>Master/status" class="btn btn-success btn-sm btn-icon icon-left">Inactive</a>
											<?php //}else{ ?>	  
											<a href="<?php echo base_url();?>Master/status" class="btn btn-success btn-sm btn-icon icon-left">Active</a>-->
											<?php// }?>
										</td>
									</tr>
									<?php $i++; }} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- body container ends starts -->
