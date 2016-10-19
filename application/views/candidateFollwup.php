	<!-- add organization page added by Rajendra on 20th July -->
	<!-- add organization body starts -->
	<div class="page-title">
		<div class="title-env">
			<h1 class="title">Candidate Follw Up</h1>
			<p class="description">Candidate Follw Up</p>
		</div>
		<div class="breadcrumb-env">
			<ol class="breadcrumb bc-1"></ol>
		</div>
	</div>
	<div class="row">
			<div class="col-sm-12">
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
				<!-- body container  starts -->
				<div class="panel panel-default">
						<div class="panel-body">
							<form  class="form-horizontal"  method="post" onsubmit="return followupValidation()" action="">
								<input type="hidden" name="CandidateID" id="CandidateID" value="<?=isset($CandidateID)?$CandidateID:'';?>" >
								<input type="hidden" name="followupID" id="followupID" value="<?php if(isset($followupID)){ echo $followupID; } ?>" >
							    <input type="hidden" name="userID" value="3" >
								<div class="form-group">
									<span class="col-sm-2 control-label"  class="checkbox-inline" value="contact">Contact Type<span style="color:red;">*</span></span>
									<div class="col-sm-2">
										<p id="chk"></p>
										<i style="vertical-align:10px; hight:20px;" class="fa fa-phone" aria-hidden="true"></i>
										<input type="checkbox" style=" width: 20px; height: 30px;" id="calls" class="contact" name="contact[]" value="call">
										<i style="vertical-align:10px; margin-left: 5px; hight:20px;" class="fa fa-envelope" aria-hidden="true"></i>
										<input type="checkbox" style="margin-left: 5px; width: 20px; height: 30px;" id="email" class="contact" name="contact[]" value="email">
										<span id="contact_error" style="color:red"></span>
									</div>
									<div class="col-sm-2">
									    <span style=" vertical-align:10px;margin-left: -71px;">Status<span style="color: red;">*</span></span>
									    <i style=" width: 20px; vertical-align:10px; hight:20px; font-size:19px;" class="fa fa-smile-o" aria-hidden="true"></i>
										<input type="radio" data-toggle="tooltip" data-placement="bottom" title="Interested" data-original-title="Interested" style="width: 20px; height: 30px;" class="status" id="Interesteds" name="status" value="Interested" required>
										<span id="Interested_error" style="color:red"></span>
							    		<i style=" width: 20px; vertical-align:10px; hight:20px; font-size:19px; margin-left: 5px;" class="fa-frown-o" aria-hidden="true"></i>
										<input type="radio" data-toggle="tooltip" data-placement="bottom" title="Not Interested" data-original-title="Not Interested"
										 style="width: 20px; height: 30px;" class="status"  id="Notinteresteds" name="status" value="Notinterested" checked required>
										<span id="Notinterested_error" style="color:red"></span>
									</div>
	      							<label class="col-sm-2 control-label" for="field-1">Current Date<span style="color:red;">*</span></label>
									<div  class="col-sm-4">
										<input type="text" data-provide="datepicker" class="form-control input-lg" maxlength="30"  name="followupDate" id="followupDate" placeholder="please seletc date" value="" readonly required>
										<span id="followupDate_error" style="color:red"></span>						
									</div>
								</div>
								<div class="form-group">
								   <label class="col-sm-2 control-label" for="field-1">Next Follow Up Date<span style="color:red;">*</span></label>
								   <div class="col-sm-4">
										<input type="text" maxlength="30" id="nextfollowupDate" class="form-control input-lg" data-provide="datepicker" name="nextfollowupDate" id="nextfollowupDate" placeholder="please select next follow up date" value="" readonly required>
										<span id="nextfollowupDate_error" style="color:red"></span>						
									</div>
									<label class="col-sm-2 control-label" for="field-1">Time<span style="color:red;">*</span></label>
									<div class="col-sm-4">
										<input type="text"  class="form-control timepicker input-lg"   name="time" id="time" placeholder="please select time" value="" required>
										<span id="time_error" style="color:red"></span>
									</div>
								</div>
								<div class="form-group">
									   
								</div><br/>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">Candidate Response<span style="color:red;">*</span></label>
									<div class="col-sm-10">
										<textarea rows="4" cols="50" maxlength="300" type="text" class="form-control input-lg" id="response" name="response"  placeholder="Please Enter Description" value="" required></textarea>
										<span id="response_error" style="color:red"></span> 
									</div>
								</div>
							<div class="form-group">
									<button type="button" name="submit" onclick="followup();" class="btn btn-success">Submit</button>
									<button type="reset" class="btn btn-white" onClick="window.history.back();">Cancel</button>
								</div></br></br>
							</form>
							<div class="panel panel-default">
								<div id="divHide">
									<div class="panel-body">
										<div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">
										<table  cellspacing="0" class="table table-small-font table-bordered table-striped example-1">
										<thead>
											<tr>
												<th>S. no</th>
												<th>Status</th>
												<th>Current Date</th>
												<th>Next Follow Up Date</th>
												<th>Action</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>S. no</th>
												<th>Status</th>
												<th>Current Date</th>
												<th>Next Follow Up Date</th>
												<th>Action</th>
											</tr>
										</tfoot>
										<tbody>
										<?php if(isset($followupDetail) && !empty($followupDetail)){
											$i=1; foreach($followupDetail as $list){ ?>
											<tr>
												<td><?=$i;?></td>
												<!--<td><?php// if(isset($list->contact)){ echo $list->contact; } ?></td>-->
												<td><?php if(isset($list->status)){ echo $list->status; } ?></td>
												<td><?php if(isset($list->followupDate)){   echo $list->followupDate; } ?></td>
												<td><?php if(isset($list->nextfollowupDate)){ echo $list->nextfollowupDate; } ?></td>
												<td>
													<a  onclick="followupEdit(<?=$list->followupID; ?>)" class="btn btn-secondary btn-sm btn-icon icon-left"><i class="fa-pencil-square-o"></i> Edit </a>
													<a onclick="followupDelete(<?=$list->followupID ;?>);"class="btn btn-danger btn-sm btn-icon icon-left"><i class="fa fa-trash-o"></i> Delete</a>
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
		</div>
	</div>