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
		    <?php if($this->session->flashdata('category_success')){?>
			<div style="margin-left:250px ;margin-right:250px"; class="alert alert-success">      
				<?php echo $this->session->flashdata('message')?>
			</div>
			<?php } ?>
		</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<form method="post" action="<?=base_url();?>Master/cvFilter">
						<div class="form-group" class="dropdown_show">
							<label class="col-sm-2 control-label" class="form-control" for="field-1">Experience</label>
							<div class="col-sm-4">
								<select name="experience" class="form-control input-lg">
									<?php 
									for($x=1 ; $x<=30 ;$x++ ){ ?>
									<option value="<?php echo $x;?>"><?php echo $x;?></option> 
									<?php } ?>
								</select>
							</div>
							<label class="col-sm-2 control-label" class="form-control" for="field-1">Job Type</label>
							<div class="col-sm-4">
								<select name="jobType" class="form-control input-lg">
									<option value="">Please select Job Type</option>
										<?php 
										foreach($master_jobtype as $list){ ?>
									<option value="<?=$list->masterValueID;?>"><?=$list->masterValueName;?></option> 
										<?php } ?>
								</select>
							</div>
						</div><br/><br/></br>
						<div class="form-group" class="dropdown_show">
							<label class="col-sm-2 control-label" class="form-control" for="field-1">Qualification</label>
							<div class="col-sm-4">
								<select name="qualification" class="form-control input-lg">
									<option value="">Please select Qualification</option>
										<?php 
										foreach($master_qualification as $list){ ?>
									<option value="<?=$list->masterValueID;?>"><?=$list->masterValueName;?></option> 
										<?php } ?>
								</select>
							</div>
							<label class="col-sm-2 control-label" class="form-control" for="field-1">Job Role</label>
							<div class="col-sm-4">
								<select name="jobRole" class="form-control input-lg">
									<option value="">Please select Job Role</option>
										<?php 
										foreach($master_jobrole as $list){ ?>
									<option value="<?=$list->masterValueID;?>"><?=$list->masterValueName;?></option>
										<?php } ?>
								</select>
							</div>
						</div></br></br>
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
						<?php if(isset($resumepost)&& !empty($resumepost)){
							$i=1; foreach($resumepost as $list){ //print_r($resumepost);die; ?>
							<tr>
								<td><?=$i;?></td>
								<td><?php if(isset($list->Name)){ echo $list->Name; } ?></td>
								<td><?php if(isset($list->totalWorkExperienceYear)){ echo $list->totalWorkExperienceYear; }?> year's</td>
								<td><?php if(isset($list->maxQallification)){ foreach($master_qualification as $val){if($list->maxQallification==$val->masterValueID){ echo $val->masterValueName;} } } ?></td>
								<td><?php if(isset($list->jobType)){ foreach($master_jobtype as $val){if($list->jobType==$val->masterValueID){ echo $val->masterValueName;} } } ?></td>
								<td><?php if(isset($list->jobRole)){ foreach($master_jobrole as $val){if($list->jobRole==$val->masterValueID){ echo $val->masterValueName;} } } ?></td>
								<td>
									<a href="<?php echo base_url(); ?>Master/downloadfilterCV?fileName=<?=$list->candidateResume;?>" name="fileName" class="btn btn-primary"><i class="fa-download"></i> Download CV</a>
									<a href="<?php echo base_url(); ?>Master/candidateInformation/<?=$list->CandidateID;?>"class="btn btn-info"><i class="fa-eye"></i> Candidate Information</a> 
									<a href="<?php echo base_url(); ?>Master/candidateFollowup/<?=$list->CandidateID;?>" onclick="show();" class="btn btn-success"><i class="fa fa-user"></i> Candidate Follw Up</a>
								</td>
							</tr>
						<?php $i++; }}?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
