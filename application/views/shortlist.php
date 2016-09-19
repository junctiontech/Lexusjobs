	<div align="center" class="page-title">
		<h4 style="margin-left:-80%;" class="title">Shortlist CV</h4><br>
		<!--<p style="margin-left:-80%;" class="description">Lexus Infra</p>-->
		<div align="left">
			<h2 style="color:#696969"><i><?php echo $projectname;?></i></h2>
		</div>
		<div class="panel-heading" style="margin-top:-70px;">
			<div class="panel-options">
				<a href="javascript:void(0);" data-toggle="panel">
					<span style="font-size: 30px; margin-left:1000px;" id="flip" class="expand-icon">+</span>
				</a>	
			</div>
		</div>
		<div id="panel">
			<div class="panel-body">
				<div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">
					<table id="example-1" style="background-color:white;"  cellspacing="0" class="table table-small-font table-bordered table-striped">
						<thead>
							<tr>
								<th>Job Role</th>
								<th>Opening</th>
								<th>Fill</th>
								<th>Vacnt</th>
							</tr>  
						</thead>
						<tbody>
						<?php if(isset($projectRequiermentDetail)&& !empty($projectRequiermentDetail)){
							foreach($projectRequiermentDetail as $list){ ?>
							<tr>
								<td><?php foreach($master_jobrole as $val){ if($list->jobRole==$val->masterValueID){ echo $val->masterValueName;} }   ?></td>
								<td><?=$list->Opening?></td>
								<td><?=$list->fillVacancy?></td>
								<td><?=$list->Opening-$list->fillVacancy ?></td>
							</tr>
						<?php  } }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="breadcrumb-env">
			<ol class="breadcrumb bc-1"></ol>
		</div>
	</div>
 <!--php alert message-->
		
	   <!--php alert message-->
<!--------------------------------------------------------------------------Team Leader-------------------------------------------------------------------------------------------->
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
		<div class="col-md-12">
			<?php if(isset($short_Resume) && !empty($short_Resume)){
				$k=0; foreach($short_Resume as $lists){ ?>
			<div class="panel panel-color panel-gray" style=" margin-bottom: -10px;">
				<div class="panel panel-default  collapsed"><!-- Add class "collapsed" to minimize the panel -->
					<div class="panel-heading">
						<h3 class="panel-title"><?php foreach($master_jobrole as $val){ if($jobRole[$k]==$val->masterValueID){ echo $val->masterValueName;} }   ?></h3>
						<div class="panel-options">
							<a href="#" data-toggle="panel">
								<span style="font-size: 30px"; class="collapse-icon">&ndash;</span>
								<span style="font-size: 30px" class="expand-icon">+</span>
							</a>
							<!--<a href="<?=base_url();?>homework/createhomework/<?=isset($homework->classid)?$homework->classid:''?>/<?=isset($homework->sectionid)?$homework->sectionid:''?>/<?=isset($homework->subjectid)?$homework->subjectid:''?>/<?=isset($homework->dateofhomework)?$homework->dateofhomework:''?>" >
								<i class="fa-rotate-right"></i>
							</a>-->
							<!--<a onClick="return confirm('Are you sure to delete this Record')" href="<?=base_url();?>Master/deleteshortlist/<?=$projectRequirementID[$k]?>">
								<span style="font-size: 30px" class="collapse-icon">&times;</span>
							</a>-->
						</div>
					</div>
					<div class="panel-body">
					<div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">
					<table id="example-1" cellspacing="0" class="table table-small-font table-bordered table-striped">
						<thead>
							<tr>
								<th>S.no</th>
								<th>Name</th>
								<th>Experience Type</th>
								<th>Qualification</th>
								<th>Job Type</th>
								<th>Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>S.no</th>
								<th>Name</th>
								<th>Experience</th>
								<th>Qualification</th>
								<th>Job Type</th>
								<th>Action</th>
							</tr>
						</tfoot>
						<tbody>
							<?php $i=1; foreach($lists as $list){ ?>
							<div><?php //{ foreach($master_jobrole as $val){if($list->jobRole==$val->masterValueID){ echo $val->masterValueName;} } } ?></div>
								<tr>
									<td><?=$i;?></td>								
									<td><?php if(isset($list->name)){ echo $list->name; } ?></td>
									<td><?php if(isset($list->experience)){ echo $list->experience; }?></td>
									<td><?php if(isset($list->maxQallification)){ foreach($master_qualification as $val){if($list->maxQallification==$val->masterValueID){ echo $val->masterValueName;} } } ?></td>
									<td><?php if(isset($list->jobType)){ foreach($master_jobtype as $val){if($list->jobType==$val->masterValueID){ echo $val->masterValueName;} } } ?></td>
									<td>
										<?php 
										if(strcasecmp($list->status,'approve')==0){ ?>
										<a href="<?php echo base_url();?>Master/disapprove/<?=$projectRequirementID[$k];?>?resumeID=<?=$list->resumeID;?>" class="btn btn-success btn-sm btn-icon icon-left">Disapprove</a>
										<?php }else{ ?>	
										<a href="<?php echo base_url(); ?>Master/approve/<?=$projectRequirementID[$k];?>?resumeID=<?=$list->resumeID;?>" class="btn btn-success btn-sm btn-icon icon-left"> Approve </a>
										<?php }?>
										<a href="<?php //echo base_url(); ?>Master/downloadfile?fileName=<?= $list->resume; ?>" class="btn btn-info btn-sm btn-icon icon-left"> Download CV </a>
										<a href="<?php echo base_url(); ?>Master/viewInformation/<?=$list->resumeID;?>" class="btn btn-secondary btn-sm btn-icon icon-left"> View Information </a>
									</td>
								</tr>
								<?php $i++;} ?>
						</tbody>
					</table>
					</div>
				</div> 
			</div>
		</div>
			<?php $k++; } }?>
	</div>
</div>
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->								