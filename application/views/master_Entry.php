<div class="page-title">
	<div class="title-env">
		<h1 class="title">Master Entry</h1>
		<p class="description">Master Entry</p>
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
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
					$("#s2example-1").select2({
					placeholder: 'Select your User Type...',
					allowClear: true
					}).on('select2-open', function()
					{
					// Adding Custom Scrollbar
					$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
					});

					});
				</script>
			
<!--------------------------Start Dropdown Div ----------------------------->
			<div align="center" class="row">
				<div id ="" class="panel panel-default">
					<label class="col-sm-2 control-label" class="form-control" for="inputlg"><h4>Master Entry<span style="color:red;">*</span></h4></label>
					<div class="col-sm-8 control-label" class="form-control input-lg">
						<select  role="menu"  name="masterEntryName" id="s2example-1" onclick="masterEntryList(this.value);" class="form-control input-lg">
							<option value="" selected>Please Select Master Entry</option>
								<?php 
								foreach ($masterList as $list){ ?>
							<option value="<?=$list->masterEntryID;?>"><?=$list->masterEntryName;?></option>
								<?php } ?>
						</select>
					</div>
				</div>
			</div>
<!-----------------------------------End Dropdown Div-------------------------->

<!---------------------------Start Master Value ADD Div------------------------>				
			<form id="form" class="form-horizontal" method="">
				<input type="hidden" name="masterEntryID" id="masterEntryID" value="" >
				<input type="hidden" name="masterValueID" id="masterValueID" value="" >
				<div style="display:none;" id="editInput_Show">
					<div class="form-group">
						<label class="col-sm-2 control-label" class="form-control"  for="field-1">Master Value<span style="color:red;">*</span></label>
						<div class="col-sm-8" id="" style="    margin-left: 21px;" > 
							<input type="text" class="form-control input-lg" maxlength="70" id="masterValueName" name="masterValueName" placeholder=" Please Enter Master Value" value="" required>
						</div>
					</div>
					<!--<div id="div" class="form-group">
						<label class="col-sm-2 control-label" class="form-control"  for="field-1">Add Master Value</label>
						<div class="col-sm-8" id=""> 
							<input type="text" class="form-control" id="masterValueName" name="masterValueName" value="">
						</div>
					</div>-->
					<!--<div id="editDiv_show" style="display:none;" class="form-group">
						<label class="col-sm-2 control-label" class="form-control" for="field-1"><b>Master Value</b></label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="masterValueName" id="value" value="">
						</div>
					</div><br/><br/>-->
					
					<div class="form-group"  style="margin-left: 18.8%;">
						<input type="button" class="btn btn-success" onclick="masterValuePost();" value="submit"/>
					</div>
				</div>
			</form><br/><br/>
			
<!------------------------------End Master Edit Value Div---------------------->			
		</div>
	<div id="val"></div>
</div>

