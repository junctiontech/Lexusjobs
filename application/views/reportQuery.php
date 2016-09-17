<div class="modal-content">
	<div class="modal-header">
		<!--  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
		</br>
		<h4 class="modal-title">Report Query</h4>
		<!--  <div class="errors-container">
		</div>-->
	</div>
	<div class="modal-body">
		<form role="form" method="POST" class="" action="<?=base_url();?>Master/reportRegister" style="border:#d1d1d1 1px solid; padding: 25px;">
			<input type="hidden" name="reportDevice" value="web"/>
			<input type="hidden" name="mobile" value="1234567890"/>
			<input type="hidden" name="url" value="<?=$_SERVER['HTTP_REFERER'];?>"/>
			<div class="form-group">
				<label class="control-label" for="username">Email Id</label>
				<input type="text" class="form-control" name="email" id="email" autocomplete="off" required/>
			</div>
			<div class="form-group">
				<label class="control-label" for="username">Description</label>
				<textarea type="text" class="form-control" style="height:200px; width:638px;" name="description" id="description" autocomplete="off" required></textarea>
			</div>
			<div class="">
				<button type="submit" class="btn btn-primary "><i class=""></i>    Send</button>
				<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
			</div>
		</form>
	</div>
</div>
</div>