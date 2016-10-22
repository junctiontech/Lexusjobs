<div class="page-contener">	
	<div id="content">	
		<div class="container">       
			<div class="row">
				<div class="col-md-12">  
			 <!-- Classic Heading --> 				
					<h4 class="classic-title"><span>Register</span></h4> 
			 <!-- Start Contact Form --> 					
					<div role="forl" id="rootwizard" class="form-wizard" >					
						<ul class="tabs">					
							<li class="active"  id="fwli1">						
								<a href="#fwv-1" data-toggle="tab">							
									Personal Info						
								</a>					
							</li>					
							<li class="" id="fwli2">						
								<a href="#fwv-2" data-toggle="tab">							
									Experience						
								</a>				
							</li>					
							<li>						
								<a href="#fwv-3" data-toggle="tab">							
									Education						
								</a>					
							</li>					
							<li>						
								<a href="#fwv-4" data-toggle="tab">							
									Skills						
								</a>					
							</li>							 				
						</ul>							
						<div class="progress-indicator" id="widht">							
							<span></span>
						</div>
						<div class="tab-content no-margin">
							<!-- Tabs Content -->							
							<div class="tab-pane with-bg active" id="fwv-1">								
								<form  class="form-horizontal" id="uploadForm" onsubmit="return check()" role="form" method="POST" enctype="multipart/form-data" action="#">
									<input type="hidden" name="CandidateID" value="<?php if(isset($candidateRagistertion[0]->CandidateID)){echo $candidateRagistertion[0]->CandidateID;}?>">
 									<div class="row">
										<div class="error"></div>
										<div class="success"></div>
										<div class="col-md-2"></div>
										<div class="col-md-7">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group group">
														<label class="col-md-4 control-label" for="name">Name<span style="color:red;">*</span></label>
														<div class="col-md-8">
															<input class="form-control input-lg" maxlength="40"  data-message-required="Please Enter Name" 	 name="candidateName" placeholder="Please Enter Name" value="<?php if(isset($candidateRagistertion[0]->Name)){ echo $candidateRagistertion[0]->Name; } ?>" />
														</div>
													</div>
												</div>
												<div class="col-md-12">	
													<div class="form-group group">
														<label class="col-md-4 control-label">Email ID<span style="color:red;">*</span></label>
														<div class="col-md-8">
															<input type="email" maxlength="50"  class="form-control input-lg" data-message-required="Please Enter Email" data-validate="required" name="candidateEmail" placeholder="Please Enter Email Id" value="<?php if(isset($candidateRagistertion[0]->Email)){ echo $candidateRagistertion[0]->Email; } ?>" />
														</div>
													</div>
												</div>
												<div class="col-md-12">	
													<div class="form-group group">
														<label class="col-md-4 control-label">Create Password<span style="color:red;">*</span></label>
														<div class="col-md-8">
															<input type="password" class="form-control input-lg" data-message-required="Please Enter Password" data-validate="required" name="candidatePassword" placeholder="Please Enter Password" value="<?php if(isset($candidateRagistertion[0]->Password)){ echo $candidateRagistertion[0]->Password; } ?>"  >
														</div>
													</div>	
												</div>
												<div class="col-md-12">	
													<div class="form-group group">
														<label class="col-md-4 control-label">Date OF Birth<span style="color:red;">*</span></label>
														<div class="col-md-8">
															<input type="text"  class="form-control datepicker" data-message-required="Please Select Date Of Birth" data-validate="required" name="candidateDOB" placeholder="Please Select Date of Birth" value="<?php if(isset($candidateRagistertion[0]->DOB)){ echo $candidateRagistertion[0]->DOB; } ?>"  readonly>
														</div>
													</div>
												</div>											
												<div class="col-md-12">
													<div class="form-group group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Gender<span style="color:red;">*</span></label>  
														<div class="col-md-6 col-sm-6 col-xs-12"> 
															<input type="radio" class="flat"   data-validate="required" name="candidateGender" id="gender" value="Male"/>Male
															<input type="radio" class="flat"   data-validate="required" name="candidateGender" id="gender" value="Female"/> Female		
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group group">
														<label class="col-md-4 control-label">Mobile number<span style="color:red;">*</span></label>							
														<div class="col-md-8">														
															<input type="text" id="candidateMobile" class="form-control input-lg Number" data-message-required="Please Enter Mobile Number" data-validate="required" name="candidateMobile" placeholder="Please Enter Mobile Number" value="<?php if(isset($candidateRagistertion[0]->Mobile)){ echo $candidateRagistertion[0]->Mobile; } ?>"  >
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group group"> <?php //print_r($candidateRagistertion) ?>
														<label class="col-sm-4 control-label">Profile Image</label>	
														<div class="col-sm-8" align="center">
															<div class="col-sm-8" align="center">
																<img id="userProfile_Image" src="" style="width: 200px; height: 150px;margin-bottom:10px;"/>					
																<input type="file"  id="candidateProfileImage" class="form-control" onchange="readURL()" name="candidateProfileImage">						
															<!--<div class="col-sm-12 col-md-12 col-lg-12" style="margin-top:150px" >
   																	<?php if(isset($candidateRagistertion)&&$candidateRagistertion['profileImage']){ ?> 
																	<img src="<?=base_url();?>uploads/candidateProfileImage/<?=$candidateRagistertion['profileImage'];?>" class="avatar img-circle img-thumbnail" style="display: block; margin: 0 auto; height:150px; width:150px; "alt="user image">
																		<?php }else{ ?>
																	<img src="<?=base_url();?>images/NoImage.gif" class="avatar img-circle img-thumbnail" style="display: block; margin: 0 auto; height:150px; width:150px; "alt="user image">
																		<?php } ?>
																</div>-->
															</div>	
														</div>												
													</div>											
												</div>										
											</div> 
											<ul class="wizard" style="text-align: center;  margin: 20px;">	
												<li class=" ">
													<input type="submit"  style="background-color: ghostwhite;" value="continue">
												</li>								
											</ul>								
										</div>									
										<div class="col-md-3"></div>								
									</div>									
								</form>							
							</div>							
							<div class="tab-pane with-bg" id="fwv-2">
								<form class="form-horizontal" id="Experience" role="forl" method="POST" action="javasrcipt:;">
									<div class="error"></div>									
									<div class="success"></div>									
									<div id="candidateID"></div>								
									<div class="row">								
										<div class="col-md-2"></div>
										<div class="col-md-7">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group group">
														<label class="col-sm-4 control-label">Total Work Experience</label>	
														<div class="col-sm-4">
															<select   class="form-control input-lg" name="Totalyearexperience">
																<option value="" selected >Year</option>
																<?php for($x=1; $x <=30; $x++){ ?>
																<option value="<?php echo $x ;?>"<?php if(isset($candidateRagistertion[0]->totalWorkExperienceYear) && $candidateRagistertion[0]->totalWorkExperienceYear==$x){ echo 'selected';}?>><?php echo $x; ?></option>	
																<?php } ?>	
															</select>
														</div>	
														<div class="col-sm-4">
															<select name="Totalmonthexperience"  class="form-control input-lg">
																<option value="" selected >Month</option>
																<?php for ($i = 1; $i <= 12; $i++){ ?>
																<option value="<?php echo $i ;?>"<?php if(isset($candidateRagistertion[0]->totalWorkExperienceMonth) && $candidateRagistertion[0]->totalWorkExperienceMonth==$i){ echo 'selected';}?>><?php echo $i; ?></option>
																
																<?php }?>	
															</select>													
														</div>												
													</div>											
												</div>										 
												<div class="col-md-12">
													<div class="form-group group">													
														<label class="col-sm-4 control-label">Curunt Salary</label>
														<div class="col-sm-8">														
															<input type="text" class="form-control input-lg" name="curuntSalary"  placeholder="Please Enter curunt salary" value="<?php if(isset($candidateRagistertion[0]->currentCTC)){ echo $candidateRagistertion[0]->currentCTC; } ?>">
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group group">													
														<label class="col-sm-4 control-label">Salary Expactation</label>
														<div class="col-sm-8">
															<input type="text" class="form-control input-lg" name="salaryExpactation" placeholder="Please Enter salary expactation" value="<?php if(isset($candidateRagistertion[0]->expactationCTC)){ echo $candidateRagistertion[0]->expactationCTC; } ?>">
														</div>
													</div>
												</div>
												<div class="col-md-12">	
													<div class="form-group group">
														<label class="col-sm-4 control-label">Current Location</label>
														<div class="col-sm-8">
															<input type="text"  class="form-control input-lg" name="currentLocation" placeholder="Please Enter Current location" value="<?php if(isset($candidateRagistertion[0]->CurrentLocation)){ echo $candidateRagistertion[0]->CurrentLocation; } ?>">
														</div>
													</div>
												</div>
												<?php if(isset($candidateExperience) && count($candidateExperience)>0)  {
													foreach($candidateExperience as $list) { ?>
												<div class="col-md-12">	
													<div class="form-group group">
														<label class="col-sm-4 control-label">Working since</label>
														<div class="col-sm-8">
															<div class="row">
																<div class="col-sm-6">																	
																	<select  class="form-control input-lg" name="StartWorkyear[]">
																		<option value="" selected >Start Working Year</option>	
																		<?php $year= date("Y"); for($x=$year; $x >=1970; $x--){ ?>		
																		<option value="<?php echo $x ;?>"<?php if(isset($list->fromYear) && $list->fromYear==$x){ echo 'selected';}?>><?php echo $x; ?></option>	
																		<?php } ?>
																	</select>
																</div>
																<div class="col-sm-6">
																	<select name="StartWorkMonth[]"  class="form-control input-lg">
																		<option value="" selected >Start Working Month</option>
																		<?php for ($i = 1; $i <= 12; $i++){ ?>
																		<option value="<?php echo $i ;?>"<?php if(isset($list->fromMonth) && $list->fromMonth==$i){ echo 'selected';}?>><?php echo $i; ?></option>	
																		<?php }?>
																	</select>
																</div>
																<label class="col-sm-12 control-label" style="text-align: center ! important; margin-bottom: 0;"> To</label>
																<div class="col-sm-6">
																	<select  class="form-control input-lg" onchange="visible(this.value,0)" name="EndWorkingYear[]">
																		<option value="Present" selected >Present</option>
																		<?php $year= date("Y"); for($x=$year; $x >=1970; $x--){ ?>	
																		<option value="<?php echo $x ;?>"<?php if(isset($list->toYear) && $list->toYear==$x){ echo 'selected';}?>><?php echo $x; ?></option>	
																		<?php } ?>	
																	</select>														
																</div>
																<div class="col-sm-6 hidden" id="visible0">
																	<select name="EndWorkingMonth[]"   class="form-control input-lg">
																		<option value="" selected >Month</option>
																		<?php for ($i = 1; $i <= 12; $i++){ ?>														
																		<option value="<?php echo $i ;?>"<?php if(isset($list->toMonth) && $list->toMonth==$i){ echo 'selected';}?>><?php echo $i; ?></option>	
																		<?php }?>
																	</select>
																</div>
																<div class="col-sm-6">
																	<input type="text" style="margin-bottom: 10px;" name="CompanyName[]" class="form-control input-lg" placeholder="Please Enter Company Name">
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group group">
														<label class="col-sm-4 control-label">Job Rol</label>
														<div class="col-sm-8">
															<select class="form-control input-lg" onchange="othefild(this.value,this.name,'jobrole')" name="jobRole[]">
																<option value="a">Please Select job Role</option>														
																<?php if(!empty($Jobrole)) { foreach($Jobrole as $data) { ?>													
																<option value="<?=$data->masterValueID ;?>"<?php if(isset($list->jobRole) && $data->masterValueID==$list->jobRole){ echo 'selected'; }?>><?=$data->masterValueName;?></option>
																<?php } } ?>
																<option value="Other">Other</option>
															</select>
															<div id="jobrolea"></div>
														</div>												
													</div>											
												</div>											
												<div class="col-md-12">												
													<div class="form-group group">												
														<label class="col-sm-4 control-label">Job Type</label>													
														<div class="col-sm-8">													
															<select  class="form-control input-lg" name="jobType[]">
																<option value="a" selected >select job Type</option>
																<?php if(!empty($jobtype)) { foreach($jobtype as $data) {?>
																<option value="<?php echo $data->masterValueID ?>" <?php if(isset($list->jobType) && $data->masterValueID==$list->jobType){ echo 'selected'; }?>><?php echo $data->masterValueName; ?></option>
																<?php } } ?>																 
															</select>
															<div id="jobType0a"></div>
														</div>
													</div>
												</div>
										<?php } } else{ ?>
												<div class="col-md-12">	
													<div class="form-group group">
														<label class="col-sm-4 control-label">Working since</label>
														<div class="col-sm-8">
															<div class="row">
																<div class="col-sm-6">																	
																	<select  class="form-control input-lg" name="StartWorkyear[]">
																		<option value="" selected >Start Working Year</option>	
																		<?php $year= date("Y"); for($x=$year; $x >=1970; $x--){ ?>		
																		<option value="<?=$x;?>"><?php echo $x; ?></option>	
																		<?php } ?>
																	</select>
																</div>
																<div class="col-sm-6">
																	<select name="StartWorkMonth[]"  class="form-control input-lg">
																		<option value="" selected >Start Working Month</option>
																		<?php for ($i = 1; $i <= 12; $i++){ ?>
																		<option value="<?=$i;?>"><?php echo $i; ?></option>	
																		<?php }?>
																	</select>
																</div>
																<label class="col-sm-12 control-label" style="text-align: center ! important; margin-bottom: 0;"> To</label>
																<div class="col-sm-6">
																	<select  class="form-control input-lg" onchange="visible(this.value,0)" name="EndWorkingYear[]">
																		<option value="Present" selected >Present</option>
																		<?php $year= date("Y"); for($x=$year; $x >=1970; $x--){ ?>	
																		<option value="<?=$x;?>"><?php echo $x; ?></option>	
																		<?php } ?>	
																	</select>														
																</div>
																<div class="col-sm-6 hidden" id="visible0">
																	<select name="EndWorkingMonth[]"   class="form-control input-lg">
																		<option value="" selected >Month</option>
																		<?php for ($i = 1; $i <= 12; $i++){ ?>														
																		<option value="<?=$i;?>"><?php echo $i; ?></option>	
																		<?php }?>
																	</select>
																</div>
																<div class="col-sm-6">
																	<input type="text" style="margin-bottom: 10px;" name="CompanyName[]" class="form-control input-lg" placeholder="Please Enter Company Name">
																</div>
															</div>
														</div>
													</div>
												</div> 	
												<div class="col-md-12">
													<div class="form-group group">
														<label class="col-sm-4 control-label">Job Rol</label>
														<div class="col-sm-8">
															<select class="form-control input-lg" onchange="othefild(this.value,this.name,'jobrole')" name="jobRole[]">
																<option value="a">Please Select job Role</option>														
																<?php if(!empty($Jobrole)) { foreach($Jobrole as $data) {?>													
																<option value="<?php echo $data->masterValueID; ?>"><?php echo $data->masterValueName; ?></option>			
																<?php } } ?>
																<option value="Other">Other</option>
															</select>
															<div id="jobrolea"></div>
														</div>												
													</div>											
												</div>											
												<div class="col-md-12">												
													<div class="form-group group">												
														<label class="col-sm-4 control-label">Job Type</label>													
														<div class="col-sm-8">													
															<select  class="form-control input-lg" name="jobType[]">
																<option value="a" selected >select job Type</option>
																<?php if(!empty($jobtype)) { foreach($jobtype as $data) {?>
																<option value="<?php echo $data->masterValueID ?>"><?php echo $data->masterValueName; ?></option>
																<?php } } ?>																 
															</select>
															<div id="jobType0a"></div>
														</div>
													</div>
												</div>
												<?php }?>
												<div class="col-md-1" style="float: right;">
													<a href="javascript:void(0);" class="add_button" title="Add field">
														<img src="<?=base_url();?>frontend/images/add-icon.png" style="margin-top: 5px;max-width: 24px;height: 24px;"/>
													</a>
												</div>
												<div class="field_wrapper"></div>
												<ul class="wizard" style="text-align: center;  margin: 20px;">
													<li class="next">
														<input class="btn btn-success" type="submit">
													</li>
												</ul>
											</div>	
										</div>	
										<div class="col-md-3"></div>
									</div>	
								</form>
							</div>
							<div class="tab-pane with-bg" id="fwv-3">
								<form class="form-horizontal" id="Qualification" role="forl" method="POST" action="javasrcipt:;">
									<div class="row">
										<div class="col-md-2"></div>
										<div class="col-md-7">
											<div class="row">
											<?php if(isset($candidateEducation) && !empty($candidateEducation)) { 
												  foreach($candidateEducation as $list){ ?>
												<div class="addmoreeducation">
													<div class="col-md-12">
														<div class="form-group group">
															<label class="col-sm-4 control-label">Highest Qualification</label>
															<div class="col-sm-8">
																<select onchange="getdata(this.value,0)"  class="form-control input-lg" name="Qualification[]">
																	<option value="">Select Qualification</option>
																	<?php if(!empty($Qualification)) { foreach($Qualification as $data) {?>										
																	<option value="<?php echo $data->masterValueID ?>" <?php if(isset($list->Qualification) && $data->masterValueID==$list->Qualification){ echo 'selected'; }?>><?php echo $data->masterValueName; ?></option>
																	<?php } } ?>																 
																</select>																 
															</div> 
														</div>	
													</div>	
													<div class="col-md-12">
														<div class="form-group group">
															<label class="col-sm-4 control-label">Course</label>
															<div class="col-sm-8">	
																<select onchange="othefild(this.value,this.name,'course');getspecializationdata(this.value,0)" id="course0" class="form-control input-lg" name="Course[]">
																	<option value="">Select Course</option>															
																	<option value="Other">Other</option>
																</select>
																<div id="coursea"></div>
															</div> 
														</div>	
													</div>
													<div class="col-md-12">
														<div class="form-group group">
															<label class="col-sm-4 control-label">Select Specialization</label>
															<div class="col-sm-8">
																<select class="form-control input-lg"onchange="othefild(this.value,this.name,'specializtion')" id="specialization0" name="Specialization[]">
																	<option value="">Select Specialization</option>
																	<option value="Other">Other</option>
																</select>
																<div id="specializtiona"></div>
															</div> 
														</div>	
													</div>
													<div class="col-md-12">
														<div class="form-group group">
															<label class="col-sm-4 control-label">Univercity/College</label>
															<div class="col-sm-8">
																<select   class="form-control input-lg" onchange="othefild(this.value,this.name,'university')" name="UniversityCollege[]">
																	<option value="">Select Univercity/College</option>
																	<?php if(!empty($UniversityCollege)){ foreach ($UniversityCollege as $data){ ?>								
																	<option value="<?php echo $data->masterValueID ?>" <?php if(isset($list->universityCollegeName) && $data->masterValueID==$list->universityCollegeName){ echo 'selected'; }?>><?php echo $data->masterValueName; ?></option>
																	<?php } } ?>
																	<option value="Other">Other</option>
																</select>
																<div id="universitya"></div>
															</div>
														</div>	
													</div>	
													<div class="col-md-12">
														<div class="form-group group">
															<label class="col-sm-4 control-label">Course Type</label>
															<div class="col-sm-8">
																<select   class="form-control input-lg" name="CourseType">
																	<option value="">Select Course Type</option>
																	<?php if(!empty($Coursetype)) { foreach($Coursetype as $data){ ?>
																	<option value="<?php echo $data->masterValueID ?>" <?php if(isset($list->CourseType) && $data->masterValueID==$list->CourseType){ echo 'selected'; }?>><?php echo $data->masterValueName; ?></option>
																	<?php } } ?>
																</select>
															</div> 
														</div>	
													</div>	
													<div class="col-md-12">
														<div class="form-group group">
															<label class="col-sm-4 control-label">Passing Year</label>
															<div class="col-sm-8">
																<select   class="form-control input-lg" name="PassingYear[]">														
																	<option value=" ">Passing Year</option>														
																	<?php $year= date("Y"); $year2=$year+5; for($x=$year2; $x >=1970; $x--){ ?>									
																		<option value="<?php echo $x ;?>"<?php if(isset($list->passingYear) && $list->passingYear==$x){ echo 'selected';}?>><?php echo $x; ?></option>	
																	<?php } ?>
																</select>
															</div>
														</div>
													</div>
												</div>
											<?php }}else {?>
												<div class="addmoreeducation">
													<div class="col-md-12">
														<div class="form-group group">
															<label class="col-sm-4 control-label">Highest Qualification</label>
															<div class="col-sm-8">
																<select onchange="getdata(this.value,0)"  class="form-control input-lg" name="Qualification[]">
																	<option value="">Select Qualification</option>
																	<?php if(!empty($Qualification)) { foreach($Qualification as $data) {?>										
																	<option value="<?php echo $data->masterValueID ?>"><?php echo $data->masterValueName; ?></option>
																	<?php } } ?>																 
																</select>																 
															</div> 
														</div>	
													</div>	
													<div class="col-md-12">
														<div class="form-group group">
															<label class="col-sm-4 control-label">Course</label>
															<div class="col-sm-8">	
																<select onchange="othefild(this.value,this.name,'course');getspecializationdata(this.value,0)" id="course0" class="form-control input-lg" name="Course[]">
																	<option value="">Select Course</option>															
																	<option value="Other">Other</option>
																</select>
																<div id="coursea"></div>
															</div> 
														</div>	
													</div>
													<div class="col-md-12">
														<div class="form-group group">
															<label class="col-sm-4 control-label">Select Specialization</label>
															<div class="col-sm-8">
																<select class="form-control input-lg"onchange="othefild(this.value,this.name,'specializtion')" id="specialization0" name="Specialization[]">
																	<option value="">Select Specialization</option>
																	<option value="Other">Other</option>
																</select>
																<div id="specializtiona"></div>
															</div> 
														</div>	
													</div>
													<div class="col-md-12">
														<div class="form-group group">
															<label class="col-sm-4 control-label">Univercity/College</label>
															<div class="col-sm-8">
																<select   class="form-control input-lg" onchange="othefild(this.value,this.name,'university')" name="UniversityCollege[]">
																	<option value="">Select Univercity/College</option>
																	<?php if(!empty($UniversityCollege)){ foreach ($UniversityCollege as $data){ ?>								
																	<option value="<?php echo $data->masterValueID;?>"><?php echo $data->masterValueName;?></option>
																	<?php } } ?>
																	<option value="Other">Other</option>
																</select>
																<div id="universitya"></div>
															</div>
														</div>	
													</div>	
													<div class="col-md-12">
														<div class="form-group group">
															<label class="col-sm-4 control-label">Course Type</label>
															<div class="col-sm-8">
																<select   class="form-control input-lg" name="CourseType">
																	<option value="">Select Course Type</option>
																	<?php if(!empty($Coursetype)) { foreach($Coursetype as $data){ ?>
																	<option value="<?php echo $data->masterValueID;?>"><?php echo $data->masterValueName;?></option>
																	<?php } } ?>
																</select>
															</div> 
														</div>	
													</div>	
													<div class="col-md-12">
														<div class="form-group group">
															<label class="col-sm-4 control-label">Passing Year</label>
															<div class="col-sm-8">
																<select   class="form-control input-lg" name="PassingYear[]">														
																	<option value=" ">Passing Year</option>														
																	<?php $year= date("Y"); $year2=$year+5; for($x=$year2; $x >=1970; $x--){ ?>									
																	<option value="<?=$x;?>"><?php echo $x; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
													</div>
												</div>
												<?php }?>
												<ul class="wizard" style="text-align: center;  margin: 20px;">												
													<li class="next">												
														<input class="btn btn-success"  type="submit">												
													</li>											
												</ul>
											</div>
											<div class="col-md-4"></div>
											<div class="col-md-8">
												<a  href="javascript:;" class="Othereduction">+ More Education</a>
											</div>
											<hr>
										</div>
										<div class="col-md-3"></div>
									</div>
								</form>
							</div>
							<div class="tab-pane with-bg " id="fwv-4">
								<form class="form-horizontal" id="Skills" role="forl" method="POST" action="javasrcipt:;">
									<div class="row">
										<div class="col-md-2"></div>
										<div class="col-md-7">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group group">
														<label class="col-sm-4 control-label">Skills</label>
														<div class="col-sm-8">
															<div class="row">
																<?php  if(isset($candidateSkill) && !empty($candidateSkill)){ ?>
																<?php foreach($candidateSkill as $list){?>
																<div class="skills_field_wrapper">
																	<div class="col-sm-4">
																		<select class="form-control input-lg" onchange="othefild(this.value,this.name,'skills')" name="Skills[]">
																			<option value="">Select Skills</option>
																			<?php if(!empty($candidateskills)){ foreach ($candidateskills as $data){ ?>
																			<option value="<?php echo $data->masterValueID ?>" <?php if(isset($list->Skills) && $data->masterValueID==$list->Skills){ echo 'selected'; }?>><?php echo $data->masterValueName; ?></option>
																			<?php } }?>
																			<option value="Other">Other</option>
																		</select>
																		<div id="skillsa"></div>
																	</div>
																	<div class="col-sm-4">
																		<select name="SkillsExperienceYear[]"  class="form-control input-lg">
																			<option value="" selected >Experience Year</option>
																			<?php for ($i = 1; $i <=30; $i++){ ?>
																		<option value="<?php echo $i ;?>"<?php if(isset($list->skillsExperienceYear) && $list->skillsExperienceYear==$i){ echo 'selected';}?>><?php echo $i; ?></option>	
																			<?php }?>
																		</select>
																	</div>	
																	<div class="col-sm-4">
																		<select name="SkillsExperienceMonth[]"  class="form-control input-lg">
																			<option value="" selected >Experience Month</option>
																			<?php for ($i = 1; $i <=12; $i++){ ?>
																			<option value="<?php echo $i ;?>"<?php if(isset($list->skillsExperienceMonth) && $list->skillsExperienceMonth==$i){ echo 'selected';}?>><?php echo $i; ?></option>	
																			<?php }?>																
																		</select>
																	</div>
																</div>
																<?php } }else { ?>
																<div class="skills_field_wrapper">
																	<div class="col-sm-4">
																		<select class="form-control input-lg" onchange="othefild(this.value,this.name,'skills')" name="Skills[]">
																			<option value="">Select Skills</option>
																			<?php if(!empty($candidateskills)){ foreach ($candidateskills as $data){ ?>
																			<option value="<?php echo $data->masterValueID ?>" <?php if(isset($lists->Skills) && $data->masterValueID==$lists->Skills){ echo 'selected'; }?>><?php echo $data->masterValueName; ?></option>
																			<?php } } ?>
																			<option value="Other">Other</option>
																		</select>
																		<div id="skillsa"></div>
																	</div>
																	<div class="col-sm-4">
																		<select name="SkillsExperienceYear[]"  class="form-control input-lg">
																			<option value="" selected >Experience Year</option>
																			<?php for ($i = 1; $i <=30; $i++){ ?>
																			<option value="<?php echo $i ;?>"<?php if(isset($lists->skillsExperienceYear) && $lists->skillsExperienceYear==$i){ echo 'selected';}?>><?php echo $i; ?></option>	
																			<?php }?>
																		</select>
																	</div>	
																	<div class="col-sm-4">
																		<select name="SkillsExperienceMonth[]"  class="form-control input-lg">
																			<option value="" selected >Experience Month</option>
																			<?php for ($i = 1; $i <=12; $i++){ ?>
																			<option value="<?php echo $i ;?>"<?php if(isset($lists->skillsExperienceMonth) && $lists->skillsExperienceMonth==$i){ echo 'selected';}?>><?php echo $i; ?></option>	
																			<?php }?>																
																		</select>
																	</div>
																	<div class="col-md-12">
																		<a href="javascript:void(0);" style="float: right;" class="add_skills" title="Add field">
																			<img src="<?=base_url();?>frontend/images/add-icon.png" style="margin-top: 5px;max-width: 24px;height: 24px;"/>													
																		</a>
																	</div>
																</div>
																<?php }?>
															</div>
														</div>	
													</div>											
												</div>										
												<div class="col-md-12">											
													<div class="form-group group">											
														<label class="col-sm-4 control-label">Resume<span style="color:red;">*</span></label>								
														<div class="col-sm-8">
															<input type="file" class="form-control" data-validate="required" data-message-required="Please Upload Resume" name="candidateResume"/>
														</div>
													</div>
												</div></br></br>
												<div class="form-group text-center">											
													<button type="submit" class="btn btn-success">Submit</button>											
												</div>										
											</div>									
										</div>									
										<div class="col-md-3"></div>								
									</div>							
								</form>							
							</div>
							<div class="clear"></div>
					<!-- Tabs Pager -->								
							<ul class="pager wizard">
								<li class="previous">						
									<a href="#"><i class="entypo-left-open"></i> Previous</a>					
								</li>
								<li class="next">							
									<a href="#">Next <i class="entypo-right-open"></i></a>						
								</li>
							</ul> 
						</div>
					</div>
            <!-- End Contact Form -->  			
				</div>       
			</div>     
		</div>   
	</div>
</div>
<script type="text/javascript">
	 
	$(document).ready(function (e){		
		$("#uploadForm").on('submit',(function(e){	//alert('hi');		
			e.preventDefault();	
		 
			$.ajax({			
				url: base_url+'Master/InsertCandidateRagistertion',				
				type: "POST",				
				data:  new FormData(this),							
				contentType: false,			
				cache: false,			
				processData:false,	
			//	async: false,	
				success: function(data){ alert(data);
					var json = JSON.parse(data);
					if(json["code"]=='300'){
					//	alert('error');
						$( ".error" ).text(json["message"]);			
						$('.error').fadeIn().delay(3000).fadeOut();						 						
					}else if (json["code"]=='200'){
						$("#fwv-2").addClass("active");	
						$("#fwli2").addClass("active");	
						$("#fwv-1").removeClass("active");						
						$("#fwli1").removeClass("active");
						$( ".success" ).text(json["message"]);			
						$('.success').fadeIn().delay(3000).fadeOut();	
						//alert(json["message"]);
					}
								
				},			
				error: function(){} 			
			});		
		}));	
	});	
	
	$(document).ready(function (e){		
		$("#Experience").on('submit',(function(e){	//alert('hello');
			e.preventDefault();		 		
			$.ajax({			
				url: base_url+'Master/InsertcandidateExperience',
				type: "POST",
				data:  new FormData(this),
			//	async: false,	
				contentType: false,
				cache: false,
				processData:false,				
				success: function(data){ 					 
					//alert(data);
				},
				error: function(){} 
			});
		}));

	});
	
	$(document).ready(function (e){
		$("#Qualification").on('submit',(function(e){ //alert('testing qualification'); //return false;
			e.preventDefault();		 
			$.ajax({
				url: base_url+'Master/InsertCandidateQualification',
				type: "POST",
				data:  new FormData(this),
		//		async: false,	
				contentType: false,
				cache: false,
				processData:false,				
				success: function(data){ 					 
					//alert(data);					
				},
				error: function(){} 
			});
		}));

	});	
		$(document).ready(function (e){
		$("#Skills").on('submit',(function(e){
			e.preventDefault();		 
			$.ajax({
				url: base_url+'Master/InsertCandidateSkills',
				type: "POST",
				data:  new FormData(this),
			//	async: false,	
				contentType: false,
				cache: false,
				processData:false,				
				success: function(data){ 					 
					 //alert(data);
				},
				error: function(){} 
			});
		}));

	});
</script> 
<script type="text/javascript">
	$(document).ready(function(){	
		var maxField = 10; 	
		var x = 1; 
		var addButton = $('.add_button'); 	
		var wrapper = $('.field_wrapper'); 	
		var themtlfild ='';
		$(addButton).click(function(){ 	
			if(x < maxField){ 
			 	var theHtml ='<div><div class="row"><div class="col-md-12"><div class="form-group group"><label class="col-sm-4 control-label">Working since</label><div class="col-sm-8"><div class="row"><div class="col-sm-6"><select  class="form-control input-lg" name="StartWorkyear[]"><option value="" selected >Start Working Year</option><?php $year= date("Y"); for($x=$year; $x >=1970; $x--){ ?><option value="<?=$x;?>"><?php echo $x; ?></option><?php } ?></select></div><div class="col-sm-6"><select name="StartWorkMonth[]"  class="form-control input-lg"><option value="" selected >Start Working Month</option><?php for ($i = 1; $i <= 12; $i++){ ?><option value="<?=$i;?>"><?php echo $i; ?></option><?php }?></select></div><label class="col-sm-12 control-label" style="text-align: center ! important; margin-bottom: 0;"> To</label><div class="col-sm-6"><select  class="form-control input-lg" onchange="visible(this.value,'+x+')" name="EndWorkingYear[]"><option value="Present" selected >Present</option><?php $year= date("Y"); for($x=$year; $x >=1970; $x--){ ?><option value="<?=$x;?>"><?php echo $x; ?></option><?php } ?></select></div><div class="col-sm-6 hidden" id="visible'+x+'"><select name="EndWorkingMonth[]"   class="form-control input-lg"><option value="" selected >Month</option><?php for ($i = 1; $i <= 12; $i++){ ?><option value="<?=$i;?>"><?php echo $i; ?></option><?php }?></select></div><div class="col-sm-6"><input type="text" style="margin-bottom: 10px;" name="CompanyName[]" class="form-control input-lg" placeholder="Please Enter Company Name"></div></div></div></div></div><div class="col-md-12"><div class="form-group group"><label class="col-sm-4 control-label">Job Rol</label><div class="col-sm-8"><select class="form-control input-lg" onchange="othefild(this.value,this.name,this.id)" id="jobrole'+x+'" name="jobRole[]"><option value="">Please Select job Role</option><?php if(!empty($Jobrole)) { foreach($Jobrole as $data) {?><option value="<?php echo $data->masterValueID ?>"><?php echo $data->masterValueName; ?></option><?php } } ?><option value="Other">Other</option></select><div id="jobrole'+x+'a"></div></div></div></div><div class="col-md-12"><div class="form-group group"><label class="col-sm-4 control-label">Job Type</label><div class="col-sm-8"><select  class="form-control input-lg" name="jobType[]"><option value="" selected >select job Type</option><?php if(!empty($jobtype)) { foreach($jobtype as $data) {?><option value="<?php echo $data->masterValueID ?>"><?php echo $data->masterValueName; ?></option><?php } } ?></select></div></div></div></div><a href="javascript:void(0);" style="float: right;"class="col-md-1 remove_button" title="Remove field"><img src="<?=base_url();?>frontend/images/remove-icon.png" style="margin-top: 5px;max-width: 24px;height: 24px;"/></a></div></div>'; 
				x++;		
				$(wrapper).append(theHtml); 	
			 	
			}	
		});	
		$(wrapper).on('click', '.remove_button', function(e){ 	
			e.preventDefault();	
			$(this).parent('div').remove(); 	
			x--; 
		});
	});
	
	$(document).ready(function(){	
		var maxField = 10; 	
		var add_skills = $('.add_skills'); 	
		var wrapper = $('.skills_field_wrapper'); 
			
		 
		var x = 1; 	
		$(add_skills).click(function(){ 	
			if(x < maxField){ 
				var theHtml = '<div> <div class="col-sm-4"><select onchange="othefild(this.value,this.name,this.id)" id="skills'+x+'" class="form-control input-lg" name="Skills[]"><option value="">Select Skills</option><?php if(!empty($candidateskills)){ foreach ($candidateskills as $data){ ?><option value="<?php $data->masterValueID;?>"><?php echo $data->masterValueName;?></option><?php } } ?><option value="Other">Other</option></select><div id="skills'+x+'a"></div></div><div class="col-sm-4"><select name="SkillsExperienceYear[]"  class="form-control input-lg"><option value="" selected >Experience</option><?php for ($i = 1; $i <= 30; $i++){ ?><option value="<?=$i;?>"><?php echo $i; ?></option>	<?php }?></select></div><div class="col-sm-4"><select name="SkillsExperienceMonth[]"  class="form-control input-lg"><option value="" selected >Experience</option><?php for ($i = 1; $i <=12; $i++){ ?><option value="<?=$i;?>"><?php echo $i; ?></option><?php }?></select></div><a href="javascript:void(0);" style="float: right;margin-right: 15px;" class="remove_button" title="Remove field"><img src="<?=base_url();?>frontend/images/remove-icon.png"/></a></div>';
				x++;		
				$(wrapper).append(theHtml); 	
			}	
		});	
		$(wrapper).on('click', '.remove_button', function(e){ 	
			e.preventDefault();	
			$(this).parent('div').remove(); 	
			x--; 
		});
	});	
	
	function visible(value,x){
		var y =x;
		var val = value;
		if(val=='Present'){
			$("#visible"+y).addClass("hidden");			
		}			
		else{				
			$("#visible"+y).removeClass("hidden");
		}
	}
	
	function readURL(input) {  
		if (input.files && input.files[0]) {     
			var reader = new FileReader();      
			reader.onload = function (e) {      
				$('#userProfile_Image').attr('src', e.target.result);      
			}       
			reader.readAsDataURL(input.files[0]);     
		}  
	}
 

	function othefild(value,name1,id1){
		var val=value;
		var name = name1;//alert(id1);return false;
		var id = id1;
		
				if(val=='Other'){	// alert(id);
			var theHtml ='<input type="text" class="form-control input-lg" name="other'+name+'" style="margin-bottom:10px;" data-validate="" placeholder="Please Enter '+name+'" />';	
						$("#"+id+'a').html(theHtml); 
		}
		else{
			
			$("#"+id+'a').html(''); 
		}
		
		
		}
	
	$(document).ready(function(){	
		var maxField = 3; 	
		var x = 1; 
		var addButton = $('.Othereduction'); 	
		var wrapper = $('.addmoreeducation');
		$(addButton).click(function(){ 		
			if(x < maxField){ 				
				var theHtml ='<div class="row"><div class="col-md-4"></div><div class="col-md-8"><label class="control-label"><b>Other Education</b></label></div><div class="col-md-12"><div class="form-group group"><label class="col-sm-4 control-label">Qualification</label><div class="col-sm-8"><select onchange="getdata(this.value,'+x+')"class="form-control input-lg" name="Qualification[]"><option value="">Select Qualification</option><?php if(!empty($Qualification)) { foreach($Qualification as $data) {?><option value="<?php echo $data->masterValueID ?>"><?php echo $data->masterValueName; ?></option><?php } } ?></select></div></div></div></div><div class="col-md-12"><div class="form-group group"><label class="col-sm-4 control-label">Course</label><div class="col-sm-8"><select onchange="othefild(this.value,this.name,this.id);getspecializationdata(this.value,'+x+')" id="course'+x+'" class="form-control input-lg" name="Course[]"><option value="">Select Course</option><option value="Other">Other</option></select><div id="course'+x+'a"></div></div></div></div><div class="col-md-12"><div class="form-group group"><label class="col-sm-4 control-label">Specialization</label><div class="col-sm-8"><select class="form-control input-lg" onchange="othefild(this.value,this.name,this.id)" id="specialization'+x+'" name="Specialization[]"><option value="">Select Specialization</option><option value="Other">Other</option></select><div id="specialization'+x+'a"></div></div></div></div><div class="col-md-12"><div class="form-group group"><label class="col-sm-4 control-label">University/College</label><div class="col-sm-8"><select   class="form-control input-lg" onchange="othefild(this.value,this.name,this.id)" id="college'+x+'" name="UniversityCollege[]"><option value="">Select University/College</option><?php if(!empty($UniversityCollege)){ foreach ($UniversityCollege as $data){ ?><option value="<?php echo $data->masterValueID;?>"><?php echo $data->masterValueName;?></option><?php } } ?><option value="Other">Other</option></select><div id="college'+x+'a"></div></div></div></div><div class="col-md-12"><div class="form-group group"><label class="col-sm-4 control-label">Passing Year</label><div class="col-sm-8"><select   class="form-control input-lg" name="PassingYear[]"><option value=" ">Passing Year</option><?php $year= date("Y"); $year2=$year+5; for($x=$year2; $x >=1970; $x--){ ?><option value="<?=$x;?>"><?php echo $x; ?></option><?php } ?></select></div></div></div></div>';				
				x++;					
				$(wrapper).append(theHtml); 				
			}	
	
		});	
	
		$(wrapper).on('click', '.remove_button', function(e){ 	
			e.preventDefault();	
			$(this).parent('div').remove(); 	
			x--; 
		});
	});	
</script>

<div class="panel panel-default">
				<!--<div class="panel-options">
					<a href="<?php echo base_url(); ?>Master/resumeUpdate/">
						<button style="margin-left: 90%;margin-bottom: -10px;" class="btn btn-theme btn-info btn-icon btn-sm"><i class="fa-plus"></i> <span>Add Resume</span></button>
					</a>
				</div>-->
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
									<th>Experience</th>
									<th>Current Location</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>S. no</th>
									<th>Name</th>
									<th>Mobile Number</th>
									<th>Experience</th>
									<th>Current Location</th>
									<th>Action</th>
								</tr>
							</tfoot>
							<tbody>
							<?php if(isset($resumeList) && !empty($resumeList)) {
								$i=1; foreach($resumeList as $list) { //print_r($resumeList);die();?>
								<tr>
									<td><?=$i;?></td>
									<td><?php if(isset($list->Name)){ echo $list->Name; } ?></td>
									<td><?php if(isset($list->Mobile)){ echo $list->Mobile; } ?></td>
									<td><?php if(isset($list->totalWorkExperienceYear)){echo $list->totalWorkExperienceYear; }?></td>
									<td><?php if(isset($list->CurrentLocation)){echo $list->CurrentLocation; }?></td>
									<td>
										<a href="<?php echo base_url(); ?>Master/retrieveData/<?=$list->CandidateID; ?>" class="btn btn-secondary btn-sm btn-icon icon-left"><i class="fa-pencil-square-o"></i> Edit </a>
										<a href="<?php echo base_url(); ?>Master/resumeDelete/<?=$list->CandidateID; ?>"onClick="return confirm('Are you sure you want to delete this resume.....')"class="btn btn-danger btn-sm btn-icon icon-left"><i class="fa fa-trash-o"></i> Delete 
										</a>
									</td>
								</tr>
							   <?php $i++; }} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		