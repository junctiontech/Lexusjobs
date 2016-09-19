  <!-- manage organization body starts -->
<div class="page-title">
	<div class="title-env">
		<h1 class="title">Manage Resume</h1>
		<p class="description">Manage Resume</p>
	</div>
	<div class="breadcrumb-env">
		<ol class="breadcrumb bc-1"></ol>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
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
					<h3 class="panel-title">Manage Resume</h3>
					<div class="panel-options">
						<a href="<?php echo base_url(); ?>Master/resumeUpdate/">
						<button class="btn btn-theme btn-info btn-icon btn-sm"><i class="fa-plus"></i> <span>Add Resume</span></button>
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
								<th>Name</th>
								<th>Mobile Number</th>
								<th>Qualification</th>
								<th>Job Role</th>
								<th>Email ID</th>
								<th>Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>S. no</th>
								<th>Name</th>
								<th>Mobile Number</th>
								<th>Qualification</th>
								<th>Job Role</th>
								<th>Email ID</th>
								<th>Action</th>
							</tr>
						</tfoot>
						<tbody>
						<?php if(isset($resumeList) && !empty($resumeList)) {
							$i=1; foreach($resumeList as $list) { //print_r($resumeList);die();?>
							<tr>
								<td><?=$i;?></td>
								<td><?php if(isset($list->name)){ echo $list->name; } ?></td>
								<td><?php if(isset($list->mobile)){ echo $list->mobile; } ?></td>
                                <td><?php if(isset($list->maxQallification)){foreach ($master_qualification as $qualification){if($qualification->masterValueID == $list->maxQallification){echo $qualification->masterValueName;}else{echo '';} } }?></td>
								<td><?php if(isset($list->jobRole)){foreach ($master_jobrole as $role){if($role->masterValueID == $list->jobRole){echo $role->masterValueName;}else{echo '';} } }?></td>
								<td><?php if(isset($list->email)){ echo $list->email; } ?></td>
								<td>
									<a href="<?php echo base_url(); ?>Master/resumeUpdate/<?=$list->resumeID; ?>" class="btn btn-secondary btn-sm btn-icon icon-left"><i class="fa-pencil-square-o"></i> Edit </a>
									<a href="<?php echo base_url(); ?>Master/resumeDelete/<?=$list->resumeID; ?>"
									onClick="return confirm('Are you sure you want to delete this resume.....')"
									class="btn btn-danger btn-sm btn-icon icon-left"><i class="fa fa-trash-o"></i> Delete 
									</a>
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
