	<!-- manage organization body starts -->
		<div class="page-title">
			<div class="title-env">
				<h1 class="title">Tender Document</h1>
				<p class="description">Tender Document</p>
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
					<div class="panel-body">
						<div style="">
							<h2 style="color:#696969;"><i><?php foreach($project as $list) { echo $list->projectName ;}?></i></h2>
						</div>
						<form role="form" id="" class="form-horizontal" method="post"  enctype="multipart/form-data"  action="<?php echo base_url();?>Master/projectdocumentPost">
							<input type="hidden" name="projectID" value="<?php if(isset($project[0]->projectID)){ echo $project[0]->projectID; } ?>" >
							<div class="col-md-12">											
								<div class="form-group group">											
									<label class="col-sm-4 control-label">Document Type<span style="color:red;">*</span></label>								
									<div class="col-sm-4">
										<select name="documentType" id="salaryDuration" class="form-control input-lg" value="">
											<option value="">Please Select Document Type</option>
											<option value="projectDocument" <?php if(isset($requierment[0]->salaryDuration) && $requierment[0]->salaryDuration =="per_day") {echo 'selected' ;} ?>required>Project Document</option>
											<option value="tenderDocument" <?php if(isset($requierment[0]->salaryDuration) && $requierment[0]->salaryDuration =="per_month") {echo 'selected' ;} ?>required>Tender Document</option> 
											<option value="addendumDocument" <?php if(isset($requierment[0]->salaryDuration)&& $requierment[0]->salaryDuration =="per_year") {echo 'selected' ;} ?>required>Addendum Document</option>
											<option value="otherDocument" <?php if(isset($requierment[0]->salaryDuration) && $requierment[0]->salaryDuration =="per_day") {echo 'selected' ;} ?>required>Other Document</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">						
								<label class="col-sm-4 control-label" for="field-1">Document Name<span style="color:red;">*</span></label>
								<div class="col-sm-4">
									<input type="text" maxlength="40" class="form-control input-lg" id="documentName" name="documentName"  placeholder="Please Enter Document Name" value="" required>
									<span id="projectlocation_error" style="color:red"></span>
								</div>
							</div>
							<div class="form-group">						
								<label class="col-sm-4 control-label" for="field-1">Date<span style="color:red;">*</span></label>
								<div class="col-sm-4">
									<input type="" class="form-control datepicker" name="date" id="date" placeholder="Please Select document upload Date" value="" required readonly>
									<span id="projectStartDate_error" style="color:red"></span>
								</div>
							</div>
							<div class="col-md-12">											
								<div class="form-group group">											
									<label class="col-sm-4 control-label">Document<span style="color:red;">*</span></label>								
									<div class="col-sm-8">
										<input type="file"  class="bg-primary" name="fileName"/>
										<p class="text-danger" class="help-block">Please Upload Document.</p>
									</div>
								</div>
							</div>
							<!--<div class="col-md-12">											
								<div class="form-group group">											
									<label class="col-sm-4 control-label">Addendum<span style="color:red;">*</span></label>								
									<div class="col-sm-8">
										<input type="file" class="bg-primary"  name="addendumDocument"/>
										<p class="text-danger" class="help-block">Please Upload Addendum Document.</p>
									</div>
								</div>
							</div>
							<div class="col-md-12">											
								<div class="form-group group">											
									<label class="col-sm-4 control-label">Other document<span style="color:red;">*</span></label>								
									<div class="col-sm-8">
										<input type="file" class="bg-primary"  name="otherDocument"/>
										<p class="text-danger" class="help-block">Please Upload Other Document.</p>
									</div>
								</div>
							</div>-->							
							<div class="form-group" style="margin-left: 200px;">
								<button type="submit" name="submit" class="btn btn-success">Upload</button>
								<button type="reset" class="btn btn-white" onClick="window.history.back();">Cancel</button>
							</div>
						</form>
					</div>						
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Tender Document</h3>
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
											<th>S.no</th>
											<th>Document Type</th>
											<th>Document Name</th>
											<th>Upload Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>S.no</th>
											<th>Document Type</th>
											<th>Document Name</th>
											<th>Upload Date</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
									<?php if(isset($document) && !empty($document)){
									$i=1; foreach($document as $list){?>
										<tr>
												<td><?=$i;?></td>
												<td><?php if(isset($list->documentType)){ echo $list->documentType; } ?></td>
												<td><?php if(isset($list->documentName)){ echo $list->documentName; } ?></td>
												<td><?php if(isset($list->date)){ echo date('d-m-y',strtotime($list->date)); } ?></td>

											<td>
												<!--<a href="<?php// echo base_url(); ?>Master/documentDownload?tenderDocument=<?=$list->tenderDocument;?>&type=tender" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i>Tender Download</a>
												<a href="<?php// echo base_url(); ?>Master/documentDownload?projectDocument=<?=$list->projectDocument;?>&type=project" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i>Project Download </a>
												<a href="<?php// echo base_url(); ?>Master/documentDownload?addendumDocument=<?=$list->addendumDocument;?>&type=addendum" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i>Addendum Download</a>-->
												<a href="<?php echo base_url(); ?>Master/projectdocumentDownload?fileName=<?=$list->fileName;?>" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
												<a href="<?php echo base_url(); ?>Master/projectdocumentDelete/<?=$list->fileName ;?>" onClick="return confirm('Are you sure you want to delete this document.....')" class="btn btn-danger"><i class="fa fa-download" aria-hidden="true"></i> Delete</a>
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