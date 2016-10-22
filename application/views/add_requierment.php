<!-- add organization page added by Rajendra on 20th July -->
<!-- add organization body starts -->
<?php 'session_start'; ?>
	<div class="page-title">
		<div class="title-env">
			<h1 class="title">Project Requierment</h1>
			<p class="description">Project Requierment</p>
		</div>
		<div class="breadcrumb-env">
			<ol class="breadcrumb bc-1"></ol>
		</div>
	</div>
	<div align="center">        
			<span id="message_success" align="center"  style="display:none ;">
					<h3 style="border: 1px solid; margin: 10px 0px;padding: 15px 10px 15px 50px;background-repeat: no-repeat; background-position: 10px center; color: #4F8A10 ;background-color: #DFF2BF;"><i class="fa fa-check" aria-hidden="true"></i> <i>Project requierment create successfully</i></h3>
			</span>
			<span id="message_update" align="center" class="message_hide"  style="display:none ;">
					<h3 style="border: 1px solid; margin: 10px 0px;padding: 15px 10px 15px 50px;background-repeat: no-repeat; background-position: 10px center; color: #059 ; background-color: #BEF;"> <i class="fa fa-info-circle"></i> <i>Project requierment update successfully</i></h3>
			</span>
			<span id="message_error" align="center"  style="display:none">
				<h3 style= "border: 1px solid; margin: 10px 0px;padding: 15px 10px 15px 50px;background-repeat: no-repeat; background-position: 10px center; color: #D8000C; background-color: #FFBABA;"><i class="fa fa-times-circle"></i> <i>Project requierment delete successfully</i></h3>
			</span>
		</div>
<!-- body container  starts -->
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<form  role="form"  id="form"  class="form-horizontal"  method="post"  onsubmit="return projectRequierment();"  action="">
							<input  type="hidden"  name="projectID"  id="projectID"  value="<?=isset($projectID)?$projectID:'';?>">
							<input  type="hidden"  name="projectRequirementID"  id="projectRequirementID"  value="<?php if(isset( $projectRequirementID )){ echo $projectRequirementID ; }?>"></br></br>
							<div  class="form-group" >
								<label class="col-sm-2 control-label" for="field-1">Job Role<span style="color:red;">*</span></label>
								<div class="col-sm-4">
									<select  class="form-control input-lg"  id="jobRole"  name="jobRole"  value=""  required>
										<option  value="">Please Select job Role</option>
										<?php  foreach($master_jobrole as $list){ ?>
										<option  value="<?=$list->masterValueID ;?>"<?php if(isset($requierment[0]->jobRole) && $list->masterValueID==$requierment[0]->jobRole){ echo 'selected'; }?>><?=$list->masterValueName;?></option>
										<?php } ?>
									</select>
									<span  id="jobrole_error"  style="color:red"></span>
								</div>
								<label  class="col-sm-2 control-label"  for="field-1">Skill<span  style="color:red;">*</span></label>
								<div class="col-sm-4">
									<?php foreach($master_skill as $list){?>
									<input  type="checkbox"  id="skill"  name="skill[]"  value="<?=$list->masterValueID?>" <?php  if(isset($skill)){foreach($skill as $value) if(isset($value) && $value== $list->masterValueID) { echo "checked"  ;}}?> ><?=$list->masterValueName?>
									<span  id="skill_error"  style="color:red"></span>
									<?php }?>
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-2 control-label"  for="field-1">Client Name<span  style="color:red;">*</span></label>
								<div class="col-sm-4">
									<select name="clientName" id="clientName" class="form-control input-lg" required>
										<option value="">Please Select Client Name</option>
										<?php foreach ($clientListName as $list){ ?>
										<option value="<?=$list->clientID ;?>"<?php if(isset($requierment[0]->clientName) && $list->clientID==$requierment[0]->clientName){ echo 'selected'; }?>><?=$list->clientName;?></option>
										<?php } ?>
									</select>
									<span id="clientname_error" style="color:red"></span>
								</div>
								<label class="col-sm-2 control-label" for="field-1">Partner Name<span style="color:red;">*</span></label>
								<div class="col-sm-4">
									<select name="partnerName" id="partnerName" class="form-control input-lg" placeholder="Please Enter Partner Name" required>
										<option value="">Please Select Partner Name</option>
										<?php foreach ($partnerListName as $list){?>
										<option value="<?=$list->partnerID ;?>"<?php if(isset($requierment[0]->partnerName) && $list->partnerID==$requierment[0]->partnerName){ echo 'selected'; }?>><?=$list->partnerName;?></option>
										<?php } ?>
<									</select>
									<span id="partnername_error" style="color:red"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="field-1">Job Description<span style="color:red;">*</span></label>
								<div class="col-sm-10">
									<textarea rows="4" cols="50" maxlength="300" type="text" class="form-control input-lg" id="jobDescription" name="jobDescription"  placeholder="Please Enter job Description" value="" required></textarea>
									<span id="jobdescription_error" style="color:red"></span> 
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" class="form-control" for="field-1">Job Type<span style="color:red;">*</span></label>
								<div class="col-sm-4">
									<select name="jobType" id="jobType" class="form-control input-lg" required>
										<option value="">Please Select Job Type</option>
										<?php foreach($master_jobtype as $list){ ?>
										<option value="<?=$list->masterValueID ;?>"<?php if(isset($requierment[0]->jobType) && $list->masterValueID==$requierment[0]->jobType){ echo 'selected'; }?>><?=$list->masterValueName;?></option>
										<?php } ?> 
									</select>
									<span id="jobtype_error" style="color:red"></span>
								</div>
								<label class="col-sm-2 control-label" for="field-1">Salary<span style="color:red;">*</span></label>
								<div class="col-sm-2">
									<input type="text" maxlength="20" class="form-control input-lg" name="salary" id="salary" value="" required>
									<span id="salary_error" style="color:red"></span>
								</div>
								<div class="col-sm-2">
									<select name="salaryDuration" id="salaryDuration" class="form-control input-lg" value="">
										<option value="per_day" <?php if(isset($requierment[0]->salaryDuration) && $requierment[0]->salaryDuration =="per_day") {echo 'selected' ;} ?>required> Per Day</option>
										<option value="per_month" <?php if(isset($requierment[0]->salaryDuration) && $requierment[0]->salaryDuration =="per_month") {echo 'selected' ;} ?>required>Per Month</option> 
										<option value="per_year" <?php if(isset($requierment[0]->salaryDuration)&& $requierment[0]->salaryDuration =="per_year") {echo 'selected' ;} ?>required>Per Year</option>
									</select>
									<span id="salaryduration_error" style="color:red"></span>
								</div>
							</div>
							<div class="form-group">						
								<label class="col-sm-2 control-label" for="field-1">Project location<span style="color:red;">*</span></label>
								<div class="col-sm-4">
									<input type="text" maxlength="40" class="form-control input-lg" id="projectLocation" name="projectLocation"  placeholder="Please Enter project Location" value="" required>
									<span id="projectlocation_error" style="color:red"></span>
								</div>
								<label class="col-sm-2 control-label" for="field-1">Highest qualification<span style="color:red;">*</span></label>
								<div class="col-sm-4">
									<select class="form-control input-lg" id="maxQualification" name="maxQualification"  value="" required>
										<option value="">Please select qualification</option>
										<?php foreach($master_qualification as $list){ ?>
										<option value="<?=$list->masterValueID ;?>"<?php if(isset($requierment[0]->maxQualification) && $list->masterValueID==$requierment[0]->maxQualification){ echo 'selected'; }?>><?=$list->masterValueName;?></option>
										<?php } ?> 
									</select>
									<span id="maxQualification_error" style="color:red"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label"  for="field-1">Job Opening<span style="color:red;">*</span></label>
								<div class="col-sm-4">
									<input type="text" maxlength="20" class="form-control input-lg" id="Opening" name="Opening" placeholder="Please Enter Salary Expactation" value="<?php if(isset($requierment[0]->Opening)){ echo $requierment[0]->Opening;}?>" required>
									<span id="jobopening_error" style="color:red"></span>
								</div>
									<label class="col-sm-2 control-label" for="field-1">Total Work Experience<span style="color:red;">*</span></label>
									<div class="col-sm-2">
										<select style="width:auto;" class="form-control input-lg" id="experience" name="experience" value="" required >
											<option value="" selected >Year</option>
											<?php for($x=1; $x <=30; $x++){ ?>
											<option value="<?php echo $x ;?>"<?php if(isset($requierment[0]->experience) && $requierment[0]->experience==$x){ echo 'selected';}?>><?php echo $x; ?></option>
											<?php }?> 
										</select><p style="margin-top: -22px; margin-left: 73px;"></p>
										<span id="experience_error" style="color:red"></span>
									</div>
								<div class="col-sm-2">
									<select name="month"  style="width:auto;" id="month" class="form-control input-lg" value="" required >
										<option value="" selected >Month</option>
										<?php for ($i = 1; $i <= 12; $i++){ ?>
										<option value="<?php echo $i ;?>"<?php if(isset($requierment[0]->month) && $requierment[0]->month==$i){echo 'selected';} ?>><?php echo $i; ?></option>
										<?php }?>
									</select><p style="margin-top: -22px; margin-left: 73px;"></p>
									<span id="month_error" style="color:red"></span>
								</div>
							</div><br/>
							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-success">Submit</button>
								<button type="reset" class="btn btn-white" onClick="window.history.back();">Cancel</button>
							</div>
						</form>
					</div>
					<div class="panel-body">
					<div id="listingDiv">
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
									<?php if(isset($projectRequirementList) && !empty($projectRequirementList)){
									$i=1; foreach($projectRequirementList as $list){ //print_r($list);die;?>
										<tr>
											<td><?=$i;?></td>
											<td><?php if(isset($list->jobRole)) { foreach($master_jobrole as $role){if($role->masterValueID==$list->jobRole){echo $role->masterValueName; }else{echo'';} } }?></td>
											<td><?php if(isset($list->experience)){echo $list->experience ;}?> year's</td>
											<td><?php if(isset($list->maxQualification)){foreach($master_qualification as $qualification){if($qualification->masterValueID==$list->maxQualification){echo $qualification->masterValueName;}else{echo '';} } } ?></td>
											<td>	
												<a onclick="requiermentGetValue(<?=$list->projectRequirementID;?>);" class="btn btn-secondary btn-sm btn-icon icon-left"><i class="fa-pencil-square-o"></i> Edit </a>
												<a onclick="requiermentDelete(<?=$list->projectRequirementID; ?>);" class="btn btn-danger btn-sm btn-icon icon-left"><i class="fa fa-trash-o"></i> Delete </a>
												<?php
												//if($list->status =='Active'){ ?>
												<!--<a href="<?php echo base_url();?>Master/status" class="btn btn-success btn-sm btn-icon icon-left">Inactive</a>
												<?php //}else{ ?>	  
												<a href="<?php echo base_url();?>Master/status" class="btn btn-success btn-sm btn-icon icon-left">Active</a>-->
												<?php// }?>
											</td>
										</tr>
									<?php $i++; } }?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- body container ends starts -->
