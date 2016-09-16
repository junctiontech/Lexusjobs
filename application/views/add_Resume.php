	<!-- add organization page added by Rajendra on 20th July -->
	<!-- add organization body starts -->
	<div class="page-title">
		<div class="title-env">
			<h1 class="title">Add Resume</h1>
			<p class="description">Add Resume</p>
		</div>
		<!-- breadcrumbs starts -->
		<div class="breadcrumb-env">
			<ol class="breadcrumb bc-1"></ol>
		</div>
		<!-- breadcrumbs ends -->	
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
			<div class="panel-body">
				<form role="form" name="form" class="form-horizontal" onsubmit=" return addResume_Validation();"   method="post"  enctype="multipart/form-data" action="<?php echo base_url();?>Master/resumePost/">
			       <div align="center"  id="error_msg" style="color:red;"></div></br>
						<input type="hidden" name="resumeID" value="<?php if(isset($resume[0]->resumeID)){ echo $resume[0]->resumeID; } ?>" >
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-1">Name<span style="color:red;">*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control input-lg" name="name" id="name" maxlength="50" placeholder="Please Enter Name" value="<?php if(isset($resume[0]->name)){ echo $resume[0]->name; } ?>" required>
								<div id="name_error" style="color:red"></div>
							</div>
							<label class="col-sm-2 control-label" for="field-1">Mobile<span style="color:red;">*</span></label>
							<div class="col-sm-4" id="onlyNumber">
								<input type="text"  class="form-control input-lg" maxlength="12" id="mobile" name="mobile"   placeholder="Please Enter mobile number"value="<?php if(isset($resume[0]->mobile)){ echo $resume[0]->mobile; }?>" required>
								<div id="mobile_error" style="color:red"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-1">Email ID<span style="color:red;">*</span></label>
							<div class="col-sm-4">
								<input type="email" class="form-control input-lg" maxlength="40" id="email" name="email" placeholder="Please Enter Email Id" value="<?php if(isset($resume[0]->email)){ echo $resume[0]->email; }?>" required>
								<div id="email_error" style="color:red"></div>
							</div>
							<label class="col-sm-2 control-label" for="field-1">Last Company<span style="color:red;">*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control input-lg" id="lastCompany" name="lastCompany" maxlength="50" placeholder="Please Enter last company name" value="<?php if(isset($resume[0]->lastCompany)){ echo $resume[0]->lastCompany;}?>" required>
								<div id="lastCompany_error" style="color:red"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-1">Job Role<span style="color:red;">*</span></label>
							<div class="col-sm-4">
								<select class="form-control input-lg" name="jobRole" id="jobRole" value="" required>
									<option value="">Please Select job Role</option>
										<?php foreach($master_jobrole as $list){ ?>
									<option value="<?=$list->masterValueID ;?>"<?php if(isset($resume[0]->jobRole) && $list->masterValueID==$resume[0]->jobRole){ echo 'selected'; }?>><?=$list->masterValueName;?></option>
									<?php } ?>
								</select>								
								<div id="jobRole_error" style="color:red"></div>
							</div>
							<label class="col-sm-2 control-label" for="field-1">Job Type<span style="color:red;">*</span></label>
							<div class="col-sm-4">
								<select  class="form-control input-lg" name="jobType" id="jobType" value="" required>
									<option value="" selected >select job Type</option>
										<?php foreach($master_jobtype as $list){ ?>
									<option value="<?=$list->masterValueID ;?>"<?php if(isset($resume[0]->jobType) && $list->masterValueID==$resume[0]->jobType){ echo 'selected'; }?>><?=$list->masterValueName;?></option>
										<?php } ?> 
								</select>
								<div id="jobType_error" style="color:red"></div>
							</div>
						</div>	
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-1">Total Work Experience<span style="color:red;">*</span></label>
							<div class="col-sm-2">
								<select style="width:auto;" class="form-control input-lg" id="experience" name="experience" value="" required>
									<option value="" selected >Year</option>
										<?php for($x=1; $x <=30; $x++){ ?>
									<option value="<?=$x;?>"<?php if(isset($resume[0]->experience)&& $resume[0]->experience==$x){echo 'selected' ;} ?>><?php echo $x; ?></option>
										<?php } ?>
								</select><p style="margin-top: -22px; margin-left: 73px;"></p>
								<div id="experience_error" style="color:red"></div>
							</div>
							<div class="col-sm-2">
								<select name="month" id="month"  style="width:auto;" class="form-control input-lg" value="" required>
									<option value="" selected >Month</option>
										<?php for ($i = 1; $i <= 12; $i++){ ?>							
									<option value="<?=$i;?>"<?php if(isset($resume[0]->month)&& $resume[0]->month==$i){echo 'selected' ;} ?>><?php echo $i; ?></option>
										<?php }?>
								</select><p style="margin-top: -22px; margin-left: 73px;"></p>
								<div id="month_error" style="color:red"></div>
							</div>
							<label class="col-sm-2 control-label" for="field-1">Current Location<span style="color:red;">*</span></label>
							<div class="col-sm-4">
								<input type="text" maxlength="50" class="form-control input-lg" id="currentLocation" name="currentLocation" placeholder="Please Enter expaction location" value="<?php if(isset($resume[0]->currentLocation)){ echo $resume[0]->currentLocation;}?>" required>
								<div id="currentLocation_error" style="color:red"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-1">Curunt Salary<span style="color:red;">*</span></label>
							<div class="col-sm-4">
								<input type="text" maxlength="30" class="form-control input-lg" id="curuntSalary" name="curuntSalary"  placeholder="Please Enter curunt salary" value="<?php if(isset($resume[0]->curuntSalary)){ echo $resume[0]->curuntSalary;}?>" required>
								<div id="curuntSalary_error" style="color:red"></div>
							</div>
							<label class="col-sm-2 control-label" for="field-1">Salary Expactation<span style="color:red;">*</span></label>
							<div class="col-sm-4">
								<input type="text" maxlength="30" class="form-control input-lg" id="salaryExpactation" name="salaryExpactation" placeholder="Please Enter salary expactation" value="<?php if(isset($resume[0]->salaryExpactation)){ echo $resume[0]->salaryExpactation;}?>" required>
								<div id="salaryExpactation_error" style="color:red"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-1">Qualification<span style="color:red;">*</span></label>
							<div class="col-sm-4">
								<select type="text" class="form-control input-lg" id="maxQallification" name="maxQallification" value="" required>
									<option value="">Please Select Maximum Qualification</option>
										<?php foreach($master_qualification as $list){ ?>
									<option value="<?=$list->masterValueID ;?>"<?php if(isset($resume[0]->maxQallification) && $list->masterValueID==$resume[0]->maxQallification){ echo 'selected'; }?>><?=$list->masterValueName;?></option>
										<?php } ?> 
								</select>
								<div id="maxQallification_error" style="color:red"></div>
							</div>
							<label class="col-sm-2 control-label" for="field-1">Date OF Birth<span style="color:red;">*</span></label>
								<div class="col-sm-4">
									<input type="" class="form-control datepicker" name="DOB" id="DOB" placeholder="Please Select Date of Birth" value="<?php if(isset($resume[0]->DOB)){ echo $resume[0]->DOB;}?>" readonly required>
									<div id="DOB_error" style="color:red"></div>
								</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="field-1">Resume<span style="color:red;">*</span></label>
							<div class="col-sm-4">
								<input type="file"  name="resume" value="<?php if(isset($resume[0]->resume)){ echo $resume[0]->resume;}?>">
							</div>
						</div>
							<div class="form-group">
								<button type="submit" name="submit"  class="btn btn-success">Submit</button>
								<button type="reset" class="btn btn-white" onClick="window.history.back();">Cancel</button>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>