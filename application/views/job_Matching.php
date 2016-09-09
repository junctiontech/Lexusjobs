	<!-- manage organization page added by palak on 20 th june -->
<!-- manage organization body starts -->
<div class="page-title">
	<div class="title-env">
		<h1 class="title">Curriculum Vitae</h1>
		<p class="description">Curriculum Vitae</p>
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
					<form method="post" action="<?=base_url();?>master/cvList">
						<div class="form-group" class="dropdown_show">
							<label class="col-sm-2 control-label" class="form-control" for="field-1">Experience</label>
							<div class="col-sm-4">
								<select name="experience" class="form-control">
									<?php 
									for($x=1 ; $x<=30 ;$x++ ){ ?>
									<option value="<?php echo $x;?>"><?php echo $x;?></option> 
									<?php } ?>
								</select>
							</div>
							<label class="col-sm-2 control-label" class="form-control" for="field-1">Job Type</label>
							<div class="col-sm-4">
								<select name="jobType" class="form-control">
									<option value="">Please select Job Type</option>
										<?php 
										foreach($master_jobtype as $list){ ?>
									<option value="<?=$list->masterValueID;?>"><?=$list->masterValueName;?></option> 
										<?php } ?>
								</select>
							</div>
						</div><br/><br/>
						<div class="form-group" class="dropdown_show">
							<label class="col-sm-2 control-label" class="form-control" for="field-1">Qualification</label>
							<div class="col-sm-4">
								<select name="qualification" class="form-control">
									<option value="">Please select Qualification</option>
										<?php 
										foreach($master_qualification as $list){ ?>
									<option value="<?=$list->masterValueID;?>"><?=$list->masterValueName;?></option> 
										<?php } ?>
								</select>
							</div>
							<label class="col-sm-2 control-label" class="form-control" for="field-1">Job Role</label>
							<div class="col-sm-4">
								<select name="jobRole" class="form-control">
									<option value="">Please select Job Role</option>
										<?php 
										foreach($master_jobrole as $list){ ?>
									<option value="<?=$list->masterValueID;?>"><?=$list->masterValueName;?></option>
										<?php } ?>
								</select>
							</div>
						</div></br>
						<div align="right">
							<button type="submit" class="btn btn-info">
							<i class="fa-search"></i>Search</button>
						</div>
					</form>
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
									<th>Experience</th>
									<th>Qualification</th>
									<th>Job Type</th>
									<th>Job Role</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>S. no</th>
									<th>Name</th>
									<th>Experience</th>
									<th>Qualification</th>
									<th>Job Type</th>
									<th>Job Role</th>
									<th>Action</th>
								</tr>
							</tfoot>
						<tbody>
						<?php $i=1; foreach($resumepost as $list){ ?>
							<tr>
								<td><?=$i;?></td>
								<td><?php if(isset($list->name)){ echo $list->name; } ?></td>
								<td><?php if(isset($list->experience)){ echo $list->experience; }?> year's</td>
								<td><?php if(isset($list->maxQallification)){ foreach($master_qualification as $val){if($list->maxQallification==$val->masterValueID){ echo $val->masterValueName;} } } ?></td>
								<td><?php if(isset($list->jobType)){ foreach($master_jobtype as $val){if($list->jobType==$val->masterValueID){ echo $val->masterValueName;} } } ?></td>
								<td><?php if(isset($list->jobRole)){ foreach($master_jobrole as $val){if($list->jobRole==$val->masterValueID){ echo $val->masterValueName;} } } ?></td>
								<td>
									<a href="<?php echo base_url(); ?>Master/downloadfile" class="btn btn-primary"><i class="fa-download"></i> Download CV</a>
									<a href="<?php echo base_url(); ?>Master/viewInformation/<?=$list->resumeID;?>"class="btn btn-info"><i class="fa-eye"></i>View Information</a> 
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
