<?php $userdata = $this->session->userdata ('username'); ?>
<!-- manage organization page added by palak on 20 th june -->
<!-- manage organization body starts -->
<div class="page-title">
	<div class="title-env">
		<h1 class="title">Porject Requirement Matching Resume</h1>
		<p class="description">Porject Requirement Matching Resume</p>
	</div>
	<div class="breadcrumb-env">
		<ol class="breadcrumb bc-1">
				
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<?php if($this->session->flashdata('message')){?>
          <div class="alert alert-success">      
            <?php echo $this->session->flashdata('message')?>
          </div>
        <?php } ?>
	
	    <div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Matching Data</h3>
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
								<th>S. no</th>
								<th>Name</th>
								<th>Designation</th>
								<th>experience</th>
								<th>Quallification</th>
								<th>Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>S. no</th>
								<th> Name</th>
								<th>Designation</th>
								<th>experience</th>
								<th>Quallification</th>
								<th>Action</th>
							</tr>
						</tfoot>
						<tbody>
						<?php $i=1; foreach($ProjectFilter as $list){ ?>
							<tr>
								<td><?=$i;?></td>
								<td><?php if(isset($list->name)){ echo $list->name; } ?></td>
								<td><?php if(isset($list->jobPost)){ echo $list->jobPost; } ?></td>
								<td><?php if(isset($list->experience)){ echo $list->experience; } ?></td>
								<td><?php if(isset($list->maxQallification)){ echo $list->maxQallification; } ?></td>
								<td>
									<!--<a href="<?php echo base_url(); ?>Master/add_Project/<?=$list->candidateID; ?>" class="btn btn-secondary btn-sm btn-icon icon-left"> Edit </a>
									<a href="<?php echo base_url(); ?>Master/delete/<?=$list->candidateID; ?>"
									onClick="return confirm('Are you sure you want to delete this post....')"
									class="btn btn-danger btn-sm btn-icon icon-left"> Delete 
									</a>-->
								</td>
							</tr>
						<?php $i++; } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
