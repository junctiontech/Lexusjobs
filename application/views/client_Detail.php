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
	<div align="center">        
			<span id="message_success" align="center"  style="display:none ;">
					<h3 style="border: 1px solid; margin: 10px 0px;padding: 15px 10px 15px 50px;background-repeat: no-repeat; background-position: 10px center; color: #4F8A10 ;background-color: #DFF2BF;"><i class="fa fa-check" aria-hidden="true"></i> <i>Client create successfully</i></h3>
			</span>
			<span id="message_update" align="center" class="message_hide"  style="display:none ;">
					<h3 style="border: 1px solid; margin: 10px 0px;padding: 15px 10px 15px 50px;background-repeat: no-repeat; background-position: 10px center; color: #059 ; background-color: #BEF;"> <i class="fa fa-info-circle"></i> <i>Client update successfully</i></h3>
			</span>
			<span id="message_error" align="center"  style="display:none">
				<h3 style= "border: 1px solid; margin: 10px 0px;padding: 15px 10px 15px 50px;background-repeat: no-repeat; background-position: 10px center; color: #D8000C; background-color: #FFBABA;"><i class="fa fa-times-circle"></i> <i>Client delete successfully</i></h3>
			</span>
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
					<form role="form" class="form-horizontal" id="form" method="post"  onsubmit="return clientPost();" action="">
						<input type="hidden" name="clientID" id="clientID" value="<?php if(isset($clientID)){echo $clientID; }?>" >
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-1"> Client Name<span style="color:red;">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control input-lg"  maxlength="30" id="clientName" name="clientName" placeholder="Enter Client Name" value="<?php if(isset($clientupdate[0]->clientName)){ echo $clientupdate[0]->clientName; } ?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-1">Contact Person<span style="color:red;">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control input-lg"  maxlength="30" id="contactPerson" name="contactPerson" placeholder=" Enter Contact Person"value="<?php if(isset($clientupdate[0]->contactPerson)){ echo $clientupdate[0]->contactPerson; }?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-1">Address<span style="color:red;">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control input-lg"  maxlength="50" id="address" name="address" placeholder="Please Enter Full Address" value="<?php if(isset($clientupdate[0]->address)){ echo $clientupdate[0]->address; }?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-1">Contact Number<span style="color:red;">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control input-lg Number" id="contactNumber" maxlength="12" name="contactNumber" placeholder="Please Enter Contact Number" value="<?php if(isset($clientupdate[0]->contactNumber)){ echo $clientupdate[0]->contactNumber;}?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-1">Email Id<span style="color:red;">*</span></label>
							<div class="col-sm-8">
								<input type="email" class="form-control input-lg" maxlength="30" id="emailID" name="emailID" placeholder="Please Enter Email ID" value="<?php if(isset($clientupdate[0]->emailID)){ echo $clientupdate[0]->emailID;}?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-1">Website<span style="color:red;">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control input-lg"  maxlength="50" id="webSite" name="webSite" placeholder="Please Enter Website Name" value="<?php if(isset($clientupdate[0]->webSite)){ echo $clientupdate[0]->webSite;}?>" required>
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
					<?php echo"hello"?>	<table id="example-1" cellspacing="0" class="table table-small-font table-bordered table-striped">
							<thead>
								<tr>
									<th>S. no</th>
									<th>Client Name</th>
									<th>Contact Persone</th>
									<th>Contact Number</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>S. no</th>
									<th>Client Name</th>
									<th>Contact Persone</th>
									<th>Contact Number</th>
									<th>Action</th>
								</tr>
							</tfoot>
							<tbody>
							<?php if(isset($clientList) && !empty($clientList)){
								$i=1; foreach($clientList as $list){?>
								<tr>
									<td><?=$i;?></td>
									<td><?php if(isset($list->clientName)){ echo $list->clientName; } ?></td>
									<td><?php if(isset($list->contactPerson)){ echo $list->contactPerson; } ?></td>
									<td><?php if(isset($list->contactNumber)){ echo $list->contactNumber; } ?></td>
									<td>
										<a href="javascript:;" onclick="return clientEditValue(<?=$list->clientID; ?>);" class="btn btn-secondary btn-sm btn-icon icon-left"><i class="fa-pencil-square-o"></i> Edit </a>
										<a onclick=" return clientDelete(<?=$list->clientID; ?>);" class="btn btn-danger btn-sm btn-icon icon-left"><i class="fa fa-trash-o"></i> Delete 
										</a>
										<!--<a href="<?php echo base_url(); ?>Master/shortlist/<?=$list->projectID; ?>" class="btn btn-success btn-sm btn-icon icon-left">ShortlistCV</a>
										<a href="<?php echo base_url(); ?>Master/manage_requierment/<?=$list->projectID; ?>" class="btn btn-secondary btn-sm btn-icon icon-left">Requirement</a>
										<?php
										//if($list->status =='Active'){ ?>
										<!--<a href="<?php echo base_url();?>Master/status" class="btn btn-success btn-sm btn-icon icon-left">Inactive</a>
										<?php //}else{ ?>	  
										<a href="<?php echo base_url();?>Master/status" class="btn btn-success btn-sm btn-icon icon-left">Active</a>-->
										<?php// }?>
									</td>
								</tr>
							<?php $i++;}}?>
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