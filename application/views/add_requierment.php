	<!-- add organization page added by Rajendra on 20th July -->
	<!-- add organization body starts -->
<?php 'session_start'; ?>
	<div class="page-title">
		<div class="title-env">
			<h1 class="title">Project Requierment</h1>
			<p class="description">Project Requierment</p>
		</div>
			<!-- breadcrumbs starts -->
		<div class="breadcrumb-env">
			<ol class="breadcrumb bc-1"></ol>
		</div>
	</div>
	<!-- breadcrumbs ends -->	
	<!-- page title closed -->
	<!-- body container  starts -->
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
			<div class="panel-body">
				<form role="form" class="form-horizontal" method="post" onsubmit="return addrequriment_validation()" action="">
					<input type="hidden" name="projectID" value="<?php if(isset($projectID)){ echo $projectID; } ?>">
					<input type="hidden" name="projectRequirementID" id="projectRequirementID" value="<?php if(isset($projectrequirementID)){ echo $projectrequirementID; } ?>"></br></br>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="field-1">Job Role</label>
						<div class="col-sm-4">
							<select  class="form-control" id="jobRole" name="jobRole"  value="" required>
								<option value="">Please Select job Role</option>
									<?php foreach($master_jobrole as $list){ ?>
								<option value="<?=$list->masterValueID ;?>"<?php if(isset($requierment[0]->jobRole) && $list->masterValueID==$requierment[0]->jobRole){ echo 'selected'; }?>><?=$list->masterValueName;?></option>
									<?php } ?>
							</select>
							<span id="jobrole_error" style="color:red"></span>
						</div>
						<label class="col-sm-2 control-label" for="field-1">Skill</label>
						<div class="col-sm-4">
								<?php foreach($master_skill as $list){?>
							<input type="checkbox" id="skill" name="skill[]" value="<?=$list->masterValueID?>" <?php if(isset($skill)){foreach($skill as $value) if(isset($value) && $value== $list->masterValueID) {echo "checked" ;}}?> ><?=$list->masterValueName?>
							<span id="skill_error" style="color:red"></span>
								<?php }?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="field-1">Client Name</label>
						<div class="col-sm-4">
							<select name="clientName" id="clientName" class="form-control" required>
								<option value="">Please Select Client Name</option>
									<?php foreach ($clientListName as $list){ ?>
								<option value="<?=$list->clientID ;?>"<?php if(isset($requierment[0]->clientName) && $list->clientID==$requierment[0]->clientName){ echo 'selected'; }?>><?=$list->clientName;?></option>
									<?php } ?>
							</select>
							<span id="clientname_error" style="color:red"></span>
						</div>
						<label class="col-sm-2 control-label" for="field-1">Partner Name</label>
						<div class="col-sm-4">
							<select name="partnerName" id="partnerName" class="form-control" placeholder="Please Enter Partner Name" required>
								<option value="">Please Select Partner Name</option>
									<?php foreach ($partnerListName as $list){?>
								<option value="<?=$list->partnerID ;?>"<?php if(isset($requierment[0]->partnerName) && $list->partnerID==$requierment[0]->partnerName){ echo 'selected'; }?>><?=$list->partnerName;?></option>
									<?php } ?>
							</select>
							<span id="partnername_error" style="color:red"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="field-1">Job Description</label>
						<div class="col-sm-10">
							<textarea rows="4" cols="50" maxlength="300" type="text" class="form-control" id="jobDescription" name="jobDescription"  placeholder="Please Enter job Description" value="" required><?php if(isset($requierment[0]->jobDescription)){ echo $requierment[0]->jobDescription;}?></textarea>
							<span id="jobdescription_error" style="color:red"></span> 
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" class="form-control" for="field-1">Job Type</label>
						<div class="col-sm-4">
							<select name="jobType" id="jobType" class="form-control" required>
								<option value="">Please Select Job Type</option>
									<?php foreach($master_jobtype as $list){ ?>
								<option value="<?=$list->masterValueID ;?>"<?php if(isset($requierment[0]->jobType) && $list->masterValueID==$requierment[0]->jobType){ echo 'selected'; }?>><?=$list->masterValueName;?></option>
									<?php } ?> 
							</select>
							<span id="jobtype_error" style="color:red"></span>
						</div>
						<label class="col-sm-2 control-label" for="field-1">Salary</label>
						<div class="col-sm-2">
							<input type="text" maxlength="20" class="form-control" name="salary" id="salary" value="<?php if(isset($requierment[0]->salary)){ echo $requierment[0]->salary;}?>" required>
							<span id="salary_error" style="color:red"></span>
						</div>
						<div class="col-sm-2">
							<select name="salaryDuration" id="salaryDuration" class="form-control" value="">
								<option value="per_day" <?php if(isset($requierment[0]->salaryDuration) && $requierment[0]->salaryDuration =="per_day") {echo 'selected' ;} ?>required> Per Day</option>
								<option value="per_month" <?php if(isset($requierment[0]->salaryDuration) && $requierment[0]->salaryDuration =="per_month") {echo 'selected' ;} ?>required>Per Month</option> 
								<option value="per_year" <?php if(isset($requierment[0]->salaryDuration)&& $requierment[0]->salaryDuration =="per_year") {echo 'selected' ;} ?>required>Per Year</option>
							</select>
							<span id="salaryduration_error" style="color:red"></span>
						</div>
					</div>
					<div class="form-group">						
						<label class="col-sm-2 control-label" for="field-1">Project location<span  style="color:red;">*</span></label>
						<div class="col-sm-4">
							<input type="text" maxlength="40" class="form-control" id="projectLocation" name="projectLocation"  placeholder="Please Enter project Location" value="<?php if(isset($requierment[0]->projectLocation)){ echo $requierment[0]->projectLocation;}?>" required>
							<span id="projectlocation_error" style="color:red"></span>
						</div>
						<label class="col-sm-2 control-label" for="field-1">Highest qualification</label>
						<div class="col-sm-4">
							<select class="form-control" id="maxQualification" name="maxQualification"  value="<?php if(isset($requierment[0]->maxQualification)){ echo $requierment[0]->maxQualification;}?>" required>
								<option value="">Please select qualification</option>
									<?php foreach($master_qualification as $list){ ?>
								<option value="<?=$list->masterValueID ;?>"<?php if(isset($requierment[0]->maxQualification) && $list->masterValueID==$requierment[0]->maxQualification){ echo 'selected'; }?>><?=$list->masterValueName;?></option>
									<?php } ?> 
							</select>
							<span id="maxQualification_error" style="color:red"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label"  for="field-1">Job Opening</label>
						<div class="col-sm-4">
							<input type="text" maxlength="20" class="form-control" id="Opening" name="Opening" placeholder="Please Enter Salary Expactation" value="<?php if(isset($requierment[0]->Opening)){ echo $requierment[0]->Opening;}?>" required>
							<span id="jobopening_error" style="color:red"></span>
						</div>
						<label class="col-sm-2 control-label" for="field-1">Total Work Experience</label>
						<div class="col-sm-2">
							<select style="width:auto;" class="form-control" id="experience" name="experience" value="" required >
								<option value="" selected >Year</option>
									<?php for($x=1; $x <=30; $x++){ ?>
								<option value="<?php echo $x ;?>"<?php if(isset($requierment[0]->experience) && $requierment[0]->experience==$x){ echo 'selected';}?>><?php echo $x; ?></option>
									<?php }?> 
							</select><p style="margin-top: -22px; margin-left: 73px;"></p>
							<span id="experience_error" style="color:red"></span>
						</div>
						<div class="col-sm-2">
							<select name="month"  style="width:auto;" id="month" class="form-control" value="" required >
								<option value="" selected >Month</option>
									<?php for ($i = 1; $i <= 12; $i++){ ?>
								<option value="<?php echo $i ;?>"<?php if(isset($requierment[0]->month) && $requierment[0]->month==$i){echo 'selected';} ?>><?php echo $i; ?></option>
									<?php }?>
							</select><p style="margin-top: -22px; margin-left: 73px;">[</p>
							<span id="month_error" style="color:red"></span>
						</div>
					</div><br/>
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-success">Submit</button>
						<button type="reset" class="btn btn-white" onClick="window.history.back();">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
			<!-- body container ends starts -->
