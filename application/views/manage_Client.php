	<!-- manage organization body starts -->
<div class="page-title">
	<div class="title-env">
		<h1 class="title">Manage Client</h1>
		<p class="description">Manage Client</p>
	</div>
	<div class="breadcrumb-env">
		<ol class="breadcrumb bc-1"></ol>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div align="center">
			<?php if($this->session->flashdata('message')){?>
			<div style="margin-left:250px ;margin-right:250px"; class="alert alert-success">      
				<?php echo $this->session->flashdata('message')?>
			</div>
			<?php } ?>
			</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Manage Client</h3>
						<div class="panel-options">
							<a href="<?php echo base_url(); ?>Master/clientUpdate/">
								<button class="btn btn-theme btn-info btn-icon btn-sm"><i class="fa-plus"></i> <span>Add Client</span></button>
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
							<?php $i=1; foreach($clientList as $list){?>
								<tr>
									<td><?=$i;?></td>
									<td><?php if(isset($list->clientName)){ echo $list->clientName; } ?></td>
									<td><?php if(isset($list->contactPerson)){ echo $list->contactPerson; } ?></td>
									<td><?php if(isset($list->contactNumber)){ echo $list->contactNumber; } ?></td>
									<td>
										<a href="<?php echo base_url(); ?>Master/clientUpdate/<?=$list->clientID; ?>" class="btn btn-secondary btn-sm btn-icon icon-left"><i class="fa-pencil-square-o"></i> Edit </a>
										<a href="<?php echo base_url(); ?>Master/clientDelete/<?=$list->clientID; ?>"
										onClick="return confirm('Are you sure you want to delete Client Detail....')"
										class="btn btn-danger btn-sm btn-icon icon-left"><i class="fa fa-trash-o"></i> Delete 
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
								<?php $i++; } ?>
						</tbody>	
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
