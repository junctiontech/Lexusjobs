	<!-- add organization page added by Rajendra on 20th July -->
	<!-- add organization body starts -->
<div class="page-title">
	<div class="title-env">
		<h1 class="title">View Information</h1>
		<p class="description">View Information</p>
	</div>
	<!-- breadcrumbs starts -->
	<div class="breadcrumb-env">
		<ol class="breadcrumb bc-1"></ol>
	</div>
	<!-- breadcrumbs ends -->	
</div>
	<!-- page title closed -->
<div class="panel-body">
	<form role="form" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>">
		<input type="hidden" name="CandidateID" value="<?php if(isset($viewInfo[0]->CandidateID)){ echo $viewInfo[0]->CandidateID; } ?>" >
		<div class="form-group">
			<label class="col-sm-2 control-label" for="field-1">Name</label>
			<div class="col-sm-4">
				<input type="text" class="form-control input-lg" name="Name" value="<?php if(isset($viewInfo[0]->Name)){ echo $viewInfo[0]->Name; } ?>">
			</div>
			<label class="col-sm-2 control-label" for="field-1">Mobile</label>
			<div class="col-sm-4">
				<input type="text" class="form-control input-lg" name="Mobile" value="<?php if(isset($viewInfo[0]->Mobile)){ echo $viewInfo[0]->Mobile; }?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="field-1">Email</label>
			<div class="col-sm-4">
				<input type="text" class="form-control input-lg" name="Email" value="<?php if(isset($viewInfo[0]->Email	)){ echo $viewInfo[0]->Email	; }?>">
			</div>
			<label class="col-sm-2 control-label" for="field-1">Qualification</label>
			<div class="col-sm-4">
				<select type="text" class="form-control input-lg" name="Qualification" value="">
						<?php 
						foreach($master_qualification as $list){ ?>
					<option value="<?=$list->masterValueID ;?>"<?php if($list->masterValueID==$viewInfo[0]->Qualification){ echo 'selected'; }?>><?=$list->masterValueName;?></option>
						<?php } ?> 
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="field-1">Job Role</label>
			<div class="col-sm-4">
				<select  class="form-control input-lg" name="jobRole"  value="">
						<?php 
						foreach($master_jobrole as $list){ ?>
						<option value="<?=$list->masterValueID ;?>"<?php if($list->masterValueID==$viewInfo[0]->jobRole){ echo 'selected'; }?>><?=$list->masterValueName;?></option>
						<?php } ?>
				</select>
			</div>
			<label class="col-sm-2 control-label" for="field-1">Job Type</label>
			<div class="col-sm-4">
				<select  class="form-control input-lg" name="jobType"  value="">
						<?php 
						foreach($master_jobtype as $list){ ?>
					    <option value="<?=$list->masterValueID ;?>"<?php if($list->masterValueID==$viewInfo[0]->jobType){ echo 'selected'; }?>><?=$list->masterValueName;?></option>
						<?php }?> 
				</select>	
			</div>
		</div>	
		<div class="form-group">
			<label class="col-sm-2 control-label" for="field-1">Experience</label>
			<div class="col-sm-2">
				<select style="width:auto;" class="form-control input-lg" name="totalWorkExperienceYear" value="">
						<?php for($x=1 ; $x<=30; $x++){ ?>
					<option value="<?php $x;?>"<?php if($x==$viewInfo[0]->totalWorkExperienceYear){echo 'selected';}?>><?php echo $x ;?></option>
						<?php } ?>
				</select><p style="margin-top: -22px; margin-left: 73px;">  Year's</p>
			</div>
			<div class="col-sm-2">
				<select name="totalWorkExperienceMonth	"  style="width:auto;" class="form-control input-lg" value="">
						<?php for($i=1; $i<=12 ;$i++ ){ ?>
					<option value="<?php $i?>"<?php if($i==$viewInfo[0]->totalWorkExperienceMonth	){echo 'selected';}?>><?php echo $i;?></option> 
						<?php }?>
				</select><p style="margin-top: -22px; margin-left: 73px;">  month</p>		
			</div>
			<label class="col-sm-2 control-label" for="field-1">Expaction Location</label>
			<div class="col-sm-4">
				<input type="text" class="form-control input-lg" name="CurrentLocation"  value="<?php if(isset($viewInfo[0]->CurrentLocation)){ echo $viewInfo[0]->CurrentLocation;}?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="field-1">Curunt Salary</label>
			<div class="col-sm-4">
				<input type="text" class="form-control input-lg" name="currentCTC" value="<?php if(isset($viewInfo[0]->currentCTC)){ echo $viewInfo[0]->currentCTC;}?>">
			</div>
			<label class="col-sm-2 control-label" for="field-1">Salary Expactation</label>
			<div class="col-sm-4">
				<input type="text" class="form-control input-lg" name="expactationCTC"  value="<?php if(isset($viewInfo[0]->expactationCTC)){ echo $viewInfo[0]->expactationCTC;}?>">
			</div>
		</div>
		<div class="form-group">
			<button type="reset" class="btn btn-white" onClick="window.history.back();">Cancel</button>
		</div>
	</form>
</div>
	<!-- body container ends starts -->
	</div><!-- main content div end -->
	</div><!-- page container div end -->