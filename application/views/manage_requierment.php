<!-- manage organization body starts -->
<div class="page-title">
	<div class="title-env">
		<h1 class="title">Manage Requierment</h1>
		<p class="description">Manage Requierment</p>
	</div>
	<div class="breadcrumb-env">
		<ol class="breadcrumb bc-1"></ol>
	</div>
</div>
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
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Manage Requierment</h3>
				<div class="panel-options">
					<a href="<?php echo base_url(); ?>Master/projectRequirementUpdate?id=<?=$id?>">
					<button class="btn btn-theme btn-info btn-icon btn-sm"><i class="fa-plus"></i><span>Add Requierment</span></button>
					</a>
				</div>
			</div>
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
								<th>Job Role</th>
								<th>Experience</th>
								<th>Qualification</th>
								<th>Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>S. no</th>
								<th>Job Role</th>
								<th>Experience</th>
								<th>Qualification</th>
								<th>Action</th>
							</tr>
						</tfoot>
						<tbody>
							<?php $i=1; foreach($projectRequirementList as $list){ //print_r($list);die;?>
							<tr>
								<td><?=$i;?></td>
								<td><?php if(isset($list->jobRole)) { foreach($master_jobrole as $role){if($role->masterValueID==$list->jobRole){echo $role->masterValueName; }else{echo'';} } }?></td>
								<td><?php if(isset($list->experience)){echo $list->experience ;}?> year's</td>
								<td><?php if(isset($list->maxQualification)){foreach($master_qualification as $qualification){if($qualification->masterValueID==$list->maxQualification){echo $qualification->masterValueName;}else{echo '';} } } ?></td>
								<td>
									<a href="<?php echo base_url(); ?>Master/projectRequirementUpdate/<?=$list->projectRequirementID;?>?id=<?=$id?>" class="btn btn-secondary btn-sm btn-icon icon-left"><i class="fa-pencil-square-o"></i> Edit </a>
									<a href="<?php echo base_url(); ?>Master/projectRequiermentDelete/<?=$list->projectRequirementID; ?>"
									onClick="return confirm('Are you sure you want to delete this Project Requirement....')"
									class="btn btn-danger btn-sm btn-icon icon-left"><i class="fa fa-trash-o"></i> Delete 
									</a>
									<?php
									//if($list->status =='Active'){ ?>
									<!--<a href="<?php echo base_url();?>Master/status" class="btn btn-success btn-sm btn-icon icon-left">Inactive</a>
									<?php //}else{ ?>	  
									<a href="<?php echo base_url();?>Master/status" class="btn btn-success btn-sm btn-icon icon-left">Active</a>-->
									<?php// }?>
								</td>
							</tr>
							<?php $i++; } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

