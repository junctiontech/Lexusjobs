<?php 
	Class Master extends CI_Controller
	{
		function __construct() 
		{
			parent::__construct();
				$this->data[]='';
				$this->load->helper('url');
				$this->data['url']=base_url();
				$this->load->library('parser');
				$this->load->library('session');
				$this->load->library('upload');
				$this->data['userinfos']=$this->userinfos=$this->session->userdata('lexusjobs.in');
				$this->load->model('Master_model');
				$this->load->model('MasterEntryModel');
				$this->load->model('ProjectModel');
				$this->load->model('RequiermentModel');
				$this->load->model('Mastervaluecourse_model');
				$this->load->model('Mastervaluespecialization_model');
				$this->load->model('MasterValueModel');
				$this->load->model('PartnerModel');
				$this->load->model('FollowupModel');
				$this->load->model('ClientModel');
				$this->load->model('CandidateModel');
				$this->load->model('Candidateragistertion_model');
				$this->load->model('Candidateexperience_model');
				$this->load->model('Candidatequalification_model');
				$this->load->model('Candidateskills_model');
				$this->load->model('Document_model');
				$this->load->model('CVFilterModel');
				
				//$this->load->library('session');
				//$this->load->library('upload');

		}

/*------------------------------------------------Start All Master Entry And Master Value Functions Section---------------------------------*/

/*----------------------Master Entry view section Function--------------------------*/
	function masterEntry()
	{
		$masterList = $this->data['masterList']=$this->MasterEntryModel->get();
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('master_Entry',$this->data);
		$this->parser->parse('include/footer',$this->data);	
	}
/*-----------------------------------End Master View Section Function-------------------------------*/

/*----------------------------------Start Master Value POST AND UPDATE function-------------------*/
  function masterValuePost() 
    { 
        $data=$this->input->post('data');
		$explode=explode('&',$data);
		if(isset($explode) && !empty($explode))
		 {
			$explodeMasterEntryID=explode('=',$explode[0]);
			$explodeMasterValueID=explode('=',$explode[1]);
			$explodeMasterValueName=explode('=',$explode[2]);
		    $explodeMasterValuename= str_replace('+',' ',$explodeMasterValueName);
			if(isset($explodeMasterValueID[1]) && !empty($explodeMasterValueID[1]))
			{
				$masterValuePost=$this->data['masterValuePost']=$this->MasterValueModel->put(array('masterValueName'=>($explodeMasterValuename[1])),array('masterValueID'=>$explodeMasterValueID[1]));
				if($masterValuePost)
				 {
					$this->MasterValueGet($explodeMasterEntryID[1],'update');
				 }
			}
			else
			{
				$masterValuePost=$this->data['masterValuePost']=$this->MasterValueModel->post(array('masterEntryID'=>$explodeMasterEntryID[1],'masterValueName'=>$explodeMasterValuename[1]));
				if($masterValuePost)
				{
					$this->MasterValueGet($explodeMasterEntryID[1],'add');
				}
			}
		}
	}   
/*-------------------------------------End Section-------------------------------------*/
	
/*---------------------Star Master VALUE LISTING Section FUNCTION----------------------*/	
	function MasterValueGet($masterEntryID=false,$identity=false)
	{	
		if(isset($masterEntryID)&&!empty($masterEntryID))
		 {
			$mastervalue=$this->data['mastervalue']=$this->MasterValueModel->get(array('masterEntryID'=>$masterEntryID));
		 }
		else
		 {
			$mastervalue=$this->data['mastervalue']=$this->MasterValueModel->get(array('masterEntryID'=>$this->input->post('value')));
		 }
			?>	
			<!--<div id="div"  style="display:none"; style="margin-left:0px;margin-bottom: -6px;margin-top: -10px"; class="panel-options">
			<button onclick="masterValueAddValue();" id="" class="btn btn-success"><i class="fa-plus"></i> <span>Add Master Value</span></button>
			</div>-->
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
							<th>Master Value</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>S. no</th>
							<th>Master Value</th>
							<th>Action</th>
						</tr>
					</tfoot>
					<tbody>
					<?php if(isset($mastervalue) && !empty($mastervalue)){ $i=1; foreach ($mastervalue as $list){?>
						<tr>
							<td><?=$i;?></td>
							<td><?php if(isset($list->masterValueName)){ echo $list->masterValueName; } ?></td>
							<td>
								<a class="btn btn-secondary btn-sm btn-icon icon-left" onclick="ValueEdit(<?=$list->masterValueID; ?>);" ><i class="fa-pencil-square-o"></i> Edit </a>
								<a onclick="masterValueDelete(<?=$list->masterValueID; ?>);"class="btn btn-danger btn-sm btn-icon icon-left"><i class="fa fa-trash-o"></i> Delete</a>
							</td>
						</tr>
					<?php $i++; }}?>
					</tbody>
				</table>
			</div>
		<?php
	}
/*------------------------------End section-----------------------------------*/	

/*-----------------------Start masterValue Edit Function-----------------------*/
  function masterValueUpdate()
    {        
		$masterUpdate = $this->data['masterUpdate'] = $this->MasterValueModel->get(array('masterValueID'=>$this->input->post('value')));
	    echo($masterUpdate[0]->masterValueName);
	}
/*-----------------------------------End section---------------------------------------*/
			
/*--------------------master value delete function-------------------------------------*/	
	function masterValueDelete()
       {
	       $masterValueID= $this->input->post('id');
		   if(isset($masterValueID)&&!empty($masterValueID))
		    { 
				$masterEntryID = $this->data['masterEntryID']= $this->MasterValueModel->get(array('masterValueID'=>$masterValueID));
				$deleteMasterValue=$this->data['deleteMasterValue']= $this->MasterValueModel->delete(array('masterValueID'=>$this->input->post('id')));
				$masterEntry=$masterEntryID[0]->masterEntryID;
				$this->MasterValueGet($masterEntry);
		    }
	   }   
/*-------------------------------------------End function------------------------------*/

/*--------------------------Start ADD Project View section Function-------------------*/	
  function projectUpdate($projectID=false)
	{
	  	//$projectID=$this->input->post('id');
	  	//$today = date('d-m-Y');
	  	//$data = date('d-m-Y',strtotime("+7day")); //echo $data;die;
	  	//$projectSubmission = $this->data['projectSubmission'];
		$projectList=$this->data['projectList']=$this->ProjectModel->get();
		$this->data['projectID']=$projectID;
        $clientListName=$this->data['clientListName']=$this->ClientModel->get();
		$partnerListName=$this->data['partnerListName']=$this->PartnerModel->get();
		$master_projectType=$this->data['master_projectType']=$this->MasterValueModel->get(array('masterEntryID'=>'1'));
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('add_Project',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*----------------------------End Add view function Section------------------------*/

/*---------------------Start ADD Project Insert AND Update Function-----------------*/	
 function projectPost()
	{ 		
		$post=$_POST; //print_r($post);die;
  		$post = array(
					  'projectName'=>$this->input->post('projectName'),
					  'projectType'=>$this->input->post('projectType'),
					  'projectStartDate'=>$this->input->post('projectStartDate'),
					  'clientName'=>$this->input->post('clientName'),
					  'partnerName'=>$this->input->post('partnerName'),
					  'projectDuration'=>$this->input->post('projectDuration'),
					  'status'=>'Active',	
					  'createdBY'=>'admin',
					  'createdON'=>date('d-m-Y H:i:s'),
					  );//print_r($post);die;
			    $projectID= $this->input->post('projectID');
			    if(isset($projectID)&& !empty($projectID) && $projectID!=='')
					  {
						$projectRenovate=$this->data['projectRenovate']=$this->ProjectModel->put($post,array('projectID'=>$projectID));
                       	if($projectRenovate)
                        {
                        	$this->projectGetValue($projectID,'update');
                        }
					  }
					  else
					  {
						$projectpost = $this->data['projectpost']=$this->ProjectModel->post($post); 
						if($projectpost)
						  { 
						  	$this->projectGetValue($projectID,'ADD');
						  } 			 	
					  }
	}
/*---------------------------- End ADD Project Function Section------------------------*/

/*------------------------------------Start Project Listing Function-------------------*/
	function projectGetValue($projectID=false)
	 { 	
	 	if(isset($projectID) && !empty($projectID))
	 	{ 
	 		$master_projectType=$this->data['master_projectType']=$this->MasterValueModel->get(array('masterEntryID'=>'1'));
	 		
	 		$project=$this->data['project']=$this->ProjectModel->get(array('projectID'=>$projectID));
	 	}
	 	else 
	 		$master_projectType=$this->data['master_projectType']=$this->MasterValueModel->get(array('masterEntryID'=>'1'));
	 		$projectList = $this->data['projectList']=$this->ProjectModel->get();
	   ?>
	 	<div class="panel panel-default">
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
								<th>Project Name</th>
								<th>Project Type</th>
								<th>Tender/Bid Submission Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>S. no</th>
								<th>Project Name</th>
								<th>Project Type</th>
								<th>Tender/Bid Submission Date</th>
								<th>Action</th>
							</tr>
						</tfoot>
						<tbody>
							<?php if(isset($projectList) && !empty($projectList)){ //print_r($projectList);die;
							$i=1; foreach($projectList as $list){?>
							<tr>
								<td><?=$i;?></td>
								<td><?php if(isset($list->projectName)){ echo $list->projectName; } ?></td>
								<td><?php if(isset($list->projectType)){  foreach($master_projectType as $type){ if($type->masterValueID==$list->projectType){ echo $type->masterValueName; }else{ echo ''; } } } ?></td>
								<td><?php if(isset($list->projectStartDate)){ echo date('d-m-Y',strtotime($list->projectStartDate)); } ?></td>
								<td>
									<a onclick="projectEditValue(<?=$list->projectID;?>)" class="btn btn-secondary btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="bottom" title="Edit" data-original-title="Edit" style="width: 40px; height: 30px;" class="status" value="Edit"><i class="fa-pencil-square-o"></i></a>
									<a onclick="projectDelete(<?=$list->projectID; ?>)"class="btn btn-danger btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="bottom" title="Delete" data-original-title="Delete" style="width: 40px; height: 30px;" class="status" value="Delete"><i class="fa fa-trash-o"></i></a>
									<a href="<?php echo base_url(); ?>Master/shortlist/<?=$list->projectID; ?>" class="btn btn-success btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="bottom" title="Short CV" data-original-title="Short CV" style="width: 40px; height: 30px;" class="status" value="Short CV" ><i class="fa-filter"></i></a>
									<a href="<?php echo base_url(); ?>Master/projectRequirementUpdate?projectID=<?=$list->projectID; ?>" class="btn btn-secondary btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="bottom" title="Project Requirement" data-original-title="Project Requirement" style="width: 40px; height: 30px;" class="status" value="Project Requirement"><i class="fa fa-bars" aria-hidden="true"></i></a>
									<a href="<?php echo base_url(); ?>Master/projectDocument/<?=$list->projectID; ?>" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Document Upload" data-original-title="Document Upload" style="width: 40px; height: 30px;" class="status" value="Document Upload"><i class="fa fa-upload" aria-hidden="true"></i></a>

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
		<?php	 
  	}
/*-------------------------------End Project Listing Function--------------------------*/	
	
/*------------------------------START PROJECT EDIT VALUE FUNCTION----------------------*/
	function projectEdit()
      {        
		 $projectedit = $this->data['projectedit'] = $this->ProjectModel->get(array('projectID'=>$this->input->post('id')));
  		 echo json_encode($projectedit[0]);
	   }
/*-------------------------------END PROJECT EDIT VALUE FUNCTION-----------------------*/
	 
/*--------------------------------Start Project Delete function -----------------------*/	
		function delete()
		{ 
		   $projectID = $this->input->post('id');
		   if(isset($projectID) && !empty($projectID))
		     {
		    	$projectID=$this->data['projectID']=$this->ProjectModel->get(array('projectID'=>$projectID));
		    	$delete=$this->data['delete']=$this->ProjectModel->delete(array('projectID'=>$this->input->post('id')));
		        $projectDelete=$projectID[0]->projectID;
		        $this->projectGetValue($projectDelete);
		     }
		}
/*---------------------------End Project Delete Function Section--------------------*/

/*---------------------start ADD Requierment View Function--------------------------*/
		function projectRequirementUpdate($projectID = false)
		   { 
			   $projectID=$this->data['projectID']=$_GET['projectID'];
			   $projectRequirementList=$this->data['projectRequirementList']=$this->RequiermentModel->get(array('projectID'=>$projectID));//print_r($projectRequirementList);die;
			  	 
			  /* if(isset($_GET['projectID'])&&!empty($_GET['projectID']))
				  {
					$projectID=$this->data['projectID']=$_GET['projectID'];
				  }
			   if(isset($_GET['requiermentID'])&&!empty($_GET['requiermentID']))
				  {
				 	$requiermentID=$this->data['requiermentID']=$_GET['requiermentID'];
				  }
			   if(isset($requiermentID) && !empty($requiermentID))
				  { 
					$projectname=$this->data['projectname'] =$this->ProjectModel->get(array('projectID'=>$projectID));
					$requierment =$this->data['requierment'] =$this->RequiermentModel->get(array('projectRequirementID'=>$requiermentID));
                    $requiermentSkill=$requierment[0]->skill;
					$skill= $this->data['skill']= explode(',',$requiermentSkill);//print_r($skill);die;
					$this->data['projectrequirementID']=$requiermentID;
				  }*/
				 $master_jobrole=$this->data['master_jobrole']=$this->MasterValueModel->get(array('masterEntryID'=>'2'));
				 $master_qualification=$this->data['master_qualification']=$this->MasterValueModel->get(array('masterEntryID'=>'3'));
				 //$requierment =$this->data['requierment'] =$this->RequiermentModel->get(array('projectRequirementID'=>$requiermentID));
	             $clientListName=$this->data['clientListName']=$this->ClientModel->get();
				 $partnerListName=$this->data['partnerListName']=$this->PartnerModel->get();
				 $master_projectType=$this->data['master_projectType']=$this->MasterValueModel->get(array('masterEntryID'=>'1'));
				 $master_jobrole=$this->data['master_jobrole']=$this->MasterValueModel->get(array('masterEntryID'=>'2'));
				 $master_qualification=$this->data['master_qualification']=$this->MasterValueModel->get(array('masterEntryID'=>'3'));
				 $master_jobtype=$this->data['master_jobtype']=$this->MasterValueModel->get(array('masterEntryID'=>'4'));
				 $master_skill=$this->data['master_skill']=$this->MasterValueModel->get(array('masterEntryID'=>'5'));
				 $this->parser->parse('include/header',$this->data);
				 $this->parser->parse('include/left_menu',$this->data);
				 $this->load->view('add_requierment',$this->data); 
				 $this->parser->parse('include/footer',$this->data);
			}
/*----------------End ADD Requierment Insert AND Update Function Section------------------*/	

/*---------------start Project Requierment Post AND Update Function-----------------------*/
  function projectRequiermentPost()
   {
   	 $data = $_POST;print_r($data);die;
	 if(isset($_POST['submit']))
	    {
			if($_POST['jobRole']=="")
			{ 
				$this->session->set_flashdata('category_error','message');
			      $this->session->set_flashdata('message','Please Enter Job Rol ');
			      redirect($_SERVER['HTTP_REFERER']);
			}elseif($_POST['skill']=="")
			{
				$this->session->set_flashdata('category_error','message');
			      $this->session->set_flashdata('message','Please Select Job Skill');
			      redirect($_SERVER['HTTP_REFERER']);
			}elseif($_POST['clientName']=="")
			{
				$this->session->set_flashdata('category_error','message');
			      $this->session->set_flashdata('message','Please Enter Client Name');
			      redirect($_SERVER['HTTP_REFERER']);
			}elseif($_POST['partnerName']=="")
			{
				$this->session->set_flashdata('category_error','message');
			      $this->session->set_flashdata('message','Please Enter Partner Name');
			      redirect($_SERVER['HTTP_REFERER']);
			}elseif($_POST['jobDescription']=="")
			{
				$this->session->set_flashdata('category_error','message');
			      $this->session->set_flashdata('message','Please Enter job Description');
			      redirect($_SERVER['HTTP_REFERER']);
			}elseif($_POST['jobType']=="")
			{
				$this->session->set_flashdata('category_error','message');
			      $this->session->set_flashdata('message','Please Enter Job Type');
			      redirect($_SERVER['HTTP_REFERER']);
			}elseif($_POST['salary']=="")
			{
				$this->session->set_flashdata('category_error','message');
			      $this->session->set_flashdata('message','Please Enter salary');
			      redirect($_SERVER['HTTP_REFERER']);
			}elseif($_POST['salaryDuration']=="")
			{
				$this->session->set_flashdata('category_error','message');
			      $this->session->set_flashdata('message','Please Enter Job Type');
			      redirect($_SERVER['HTTP_REFERER']);
			}elseif($_POST['projectLocation']=="")
			{
				$this->session->set_flashdata('category_error','message');
			      $this->session->set_flashdata('message','Please Enter project Location');
			      redirect($_SERVER['HTTP_REFERER']);
			}elseif($_POST['maxQualification']=="")
			{
				$this->session->set_flashdata('category_error','message');
			      $this->session->set_flashdata('message','Please Enter  Qualification');
			      redirect($_SERVER['HTTP_REFERER']);
			}elseif($_POST['Opening']=="")
			{
				$this->session->set_flashdata('category_error','message');
			      $this->session->set_flashdata('message','Please Enter Job Opening');
			      redirect($_SERVER['HTTP_REFERER']);
			}
		else 		
				$projectID=$this->input->post('projectID');
				$projectRequirementID=$this->input->post('projectRequirementID');
				$skill = $this->input->post('skill');
				$skills = implode(',',$skill);
				$data = array(
							   'projectID'=>$projectID,
							   'maxQualification'=>$this->input->post('maxQualification'),
							   'skill'=>$skills,
							   'jobType'=>$this->input->post('jobType'),
							   'jobDescription'=>$this->input->post('jobDescription'),
							   'Opening'=>$this->input->post('Opening'),
							   'projectLocation'=>$this->input->post('projectLocation'),
							   'clientName'=>$this->input->post('clientName'),
							   'partnerName'=>$this->input->post('partnerName'),
							   'experience'=>$this->input->post('experience'),
							   'fillVacancy'=>'0',
							   'month'=>$this->input->post('month'), 
							   'jobRole'=>$this->input->post('jobRole'),
							   'salary'=>$this->input->post('salary'),
							   'salaryDuration'=>$this->input->post('salaryDuration'),
							   'createdBY'=>'admin',
							   'createdON'=>date('d-m-Y H:i:s'),
							  );
		if(isset($projectRequirementID) && !empty($projectRequirementID) && $projectRequirementID !=="")
		    { 
				$projectrequirementRenovate=$this->data['projectrequirementRenovate']=$this->RequiermentModel->put($data,array('projectRequirementID'=>$projectRequirementID));
				if($projectrequirementRenovate)
				{
					$this->projectRequiermentValue($projectRequirementID);
				}
		    }
		    else
		   	 { 
		    	$projectRequirement= $this->data['projectRequirement']=$this->RequiermentModel->post($data);//print_r($projectRequirement);die;	
		    	 if($projectRequirement)
		    	 {
		    	 	$this->projectRequiermentValue();
		    	 }
			}
		}
	}
/*--------------------End Project Requierment Post AND Update Function Section----------------*/
	
/*-------------------------START PROJECT REQUIERMENT LISTING FUNCTION-------------------------*/
function projectRequiermentValue($projectID = false)
	{
		if(isset($projectID) && !empty($projectID))
		{
			$projectretriveData = $this->data['projectretriveData']=$this->RequiermentModel->get(array('projectID'=>$projectID));
		}
			$master_projectType=$this->data['master_projectType']=$this->MasterValueModel->get(array('masterEntryID'=>'1'));
			$master_jobrole=$this->data['master_jobrole']=$this->MasterValueModel->get(array('masterEntryID'=>'2'));
			$master_qualification=$this->data['master_qualification']=$this->MasterValueModel->get(array('masterEntryID'=>'3'));
			$master_jobtype=$this->data['master_jobtype']=$this->MasterValueModel->get(array('masterEntryID'=>'4'));
			$master_skill=$this->data['master_skill']=$this->MasterValueModel->get(array('masterEntryID'=>'5'));
			$projectRequirement =$this->data['projectRequirement']=$this->RequiermentModel->get();//print_r($projectRequirement);die;
		?>
			<div class="panel panel-default">
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
								<?php if(isset($projectRequirement) && !empty($projectRequirement)){
									$i=1; foreach($projectRequirement as $list){ ?>
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
		<?php 
	}
/*----------------------------END PROJECT REQUIERMENT LISTING FUNCTION-----------------------*/

/*-----------------------------START PROJECT REQUIERMENT EDIT VALUE FUNCTION----------------*/
	function requiermentValue()
	 	{ 
	 		$requiermentEdit=$this->data['requiermentEdit']=$this->RequiermentModel->get(array('projectRequirementID'=>$this->input->post('id')));//print_r($requiermentEdit);die;
	 		echo json_encode($requiermentEdit[0]);
	 	}
/*-----------------------------END PROJECTREQUIERMENT EDIT VALUE FUNCTION--------------------*/	

/*-------------------------Start Project Requierment Delete Function--------------------------*/
	  function projectRequiermentDelete()
		{
			$projectRequirementID = $this->input->post('id');
		    if(isset($projectRequirementID) && !empty($projectRequirementID))
		     {
		    	$projectRequirementID=$this->data['projectRequirementID']=$this->RequiermentModel->get(array('projectRequirementID'=>$projectRequirementID));
		    	$delete=$this->data['delete']=$this->RequiermentModel->delete(array('projectRequirementID'=>$this->input->post('id')));
		        $projectRequirementDelete=$projectRequirementID[0]->projectRequirementID;
		        $this->projectRequiermentValue($projectRequirementDelete);
		     }
		}  
/*----------------------------End Project Requierment Delete Function---------------------*/


/*----------------------------Start Automatic Shortlist CV function------------------------*/
   function shortlist($id = false)
    {    		 
	   $projectName=$this->data['projectName'] = $this->ProjectModel->get(array('projectID'=>$id));
		foreach ($projectName as $name)
		{
			$projectname = array(
			'projectName'=>$name->projectName,
			);
		}     
		$projectname=$this->data['projectname']=$name->projectName;
		if(isset($id) && !empty($id))
		{  
			$projectRequiermentDetail =$this->data['projectRequiermentDetail'] = $this->RequiermentModel->get(array('projectID'=>$id));

			if(count($projectRequiermentDetail)>0 && !empty($projectRequiermentDetail))
			{
				foreach ($projectRequiermentDetail as $list)
				{ //print_r($list);die;
				//$data = array(
				//$experience = $list->experience;
				//$jobRole=$list->jobRole;
				//$jobType =$list->jobType;
				//$maxQallification=$list->maxQualification;
				// );
				//$shortresumeList=$this->data['shortresumeList'][]=$this->Master_model->shortlistCv($jobRole,$experience,$jobType,$maxQallification);
				//echo '<pre>' ;print_r($shortresumeList);echo'</pre>';die;
				//$jobRole=$this->data['jobRole'][]=$list->jobRole;
				//$projectRequirementID=$this->data['projectRequirementID'][]=$list->projectRequirementID;
				}//die;//print_r($shortresumeList);die;
			}
		} 
		$master_projectType=$this->data['master_projectType']=$this->MasterValueModel->get(array('masterEntryID'=>'1'));
		$master_jobrole=$this->data['master_jobrole']=$this->MasterValueModel->get(array('masterEntryID'=>'2'));
		$master_qualification=$this->data['master_qualification']=$this->MasterValueModel->get(array('masterEntryID'=>'3'));
		$master_jobtype=$this->data['master_jobtype']=$this->MasterValueModel->get(array('masterEntryID'=>'4'));
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('shortlist',$this->data);
		$this->parser->parse('include/footer',$this->data);
    }
/*------------------------------------End Automatic Shortlist function Section-----------------------*/

/*------------------------------Star Shortlist CV Approve Button function------------------*/	
 function approve($id= false)
   { 	
      if(isset($id) && !empty($id) && isset($_GET['CandidateID']))
	  {
		  $requiermentDetail =$this->data['requiermentDetail'] =$this->RequiermentModel->get(array('projectRequirementID'=>$id));
	      $opening = $requiermentDetail[0]->Opening; 
		  $fillVacancy = $requiermentDetail[0]->fillVacancy;
	      if($opening > $fillVacancy)
		   { 
			  $data = array(
							 'fillVacancy'=> 1+$fillVacancy,	
						    );
              $updateVacancy = $this->data['updateVacancy']=$this->RequiermentModel->put($data,array('projectRequirementID'=>$id));
			  if($updateVacancy)
			  {	
					$dataArray=array('status'=>'approve');
				    $updateVacancy = $this->data['updateVacancy']=$this->CandidateModel->put($dataArray,array('CandidateID'=>$_GET['CandidateID']));
					$this->session->set_flashdata('category_success','message');
					$this->session->set_flashdata('message','Resume Approved Successfully');
					redirect($_SERVER['HTTP_REFERER']);
			  }
			  else
			  {
				  $this->session->set_flashdata('category_error','message');
			      $this->session->set_flashdata('message','Resume Not Approved Successfully');
			      redirect($_SERVER['HTTP_REFERER']);
			  }
			}
		   else
		   {
				$this->session->set_flashdata('category_error','message');
			    $this->session->set_flashdata('message','Opening Already Full');
				redirect($_SERVER['HTTP_REFERER']);
	       }
	  }
	 
   }
/*----------------------------End Shortlist CV Button Function Section-------------------*/	

/*-------------------------Star Shortlist Cv Disapprove Button Function-------------------------*/	
 
 function disapprove($id = false)
 {
  	   if(isset($id) && !empty($id) && isset($_GET['CandidateID']))
	   {
		  $requiermentDetail=$this->data['requiermentDetail'] =$this->RequiermentModel->get(array('projectRequirementID'=>$id));
		  $fillVacancy = $requiermentDetail[0]->fillVacancy;
		  $data = array(
						 'fillVacancy'=>$fillVacancy-1,	
					    );
		  $updateVacancy =$this->data['updateVacancy']=$this->RequiermentModel->put($data,array('projectRequirementID'=>$id));
		  if($updateVacancy)
		  {
			   $dataArray=array('status'=>'');
			   $updateVacancy = $this->data['updateVacancy']=$this->CandidateModel->put($dataArray,array('CandidateID'=>$_GET['CandidateID']));
			   $this->session->set_flashdata('category_success','message');
			   $this->session->set_flashdata('message','Resume Disapproved Successfully');
			   redirect($_SERVER['HTTP_REFERER']);
		  }
		  else
		  {  
			  $this->session->set_flashdata('category_error','message');
			  $this->session->set_flashdata('message','Opening Already Full');
	  		  redirect($_SERVER['HTTP_REFERER']);
		  }
	   }
 } 
/*------------------------End Shortlist CV Disapproved Button section-----------------------*/

/*---------------------Star Project Document View Function---------------------------*/
   function projectDocument($id=false)
    { 
		if(isset($id) && !empty($id))
		{
			$project=$this->data['project']=$this->ProjectModel->get(array('projectID'=>$id)); 
		}
		$document = $this->data['document']=$this->Document_model->get(array('projectID'=>$id));
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('documentFile',$this->data);
		$this->parser->parse('include/footer',$this->data);
    }
/*-----------------------End Project Document View Function--------------------------*/

/*----------------------Start Project Document Data Post Function------------------------------*/
	function projectdocumentPost()
	 {		
		$file = $_FILES['fileName']['name'];
		$path= pathinfo($file);
		$fileExtension = $path['extension'];//print_r($fileExtension);die;
		if(strcasecmp($fileExtension,'pdf')==0|| strcasecmp($fileExtension,'doc')==0|| strcasecmp($fileExtension,'docx')==0|| strcasecmp($fileExtension,'rtf')==0)
		{ 
			$tmp  = $_FILES['fileName']['tmp_name'];
			$size=$_FILES['fileName']['size'];
			$uniq_id=substr(md5(microtime()),rand(0,26),10);
			$file = $uniq_id. '.' .$fileExtension;
			$documentMove= move_uploaded_file($tmp,'tenderFile/'.$file);    
			$projectID = $this->input->post('projectID');
			$data = array(
						  'projectID'=>$projectID,
						  'documentType'=>$this->input->post('documentType'),	
						  'documentName'=>$this->input->post('documentName'),
						  'fileName'=>$file,
						  'date'=>date('y-m-d'),
						 ); 
			$document = $this->data['document'] = $this->Document_model->post($data);
			$this->session->set_flashdata('category_success','message');
			$this->session->set_flashdata('message','Document upload successfully..!');
			redirect($_SERVER['HTTP_REFERER']);
		}
		else
		{
			$this->session->set_flashdata('category_error','message');
			$this->session->set_flashdata('message','Please select valid format..!');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
/*----------------------End Project Document Data Post Function-----------------*/

/*---------------------Start Project Document Download Function-----------------*/
    function projectdocumentDownload()
	 {
		$file = $_GET['fileName'];//print_r($file);die;
		$filePath= 'tenderFile/'.$file;
		header("Content-Disposition: attachment;filename=$file");
		readfile($filePath);
			 
	 }
/*----------------------End Project Document Download Function------------------------*/ 

/*---------------------Start Project Document Delete Function-------------------*/
	function projectdocumentDelete($file)
	  {
		  
		if(!empty($file))
		  {				
			$originalPath='tenderFile/'.$file;				
			unlink($originalPath);
		  }
	  $delete=$this->data['delete']=$this->Document_model->delete(array('fileName'=>$file));
	  $this->session->set_flashdata('category_success','message');
	  $this->session->set_flashdata ('message',"Your Record successfully  delete !!!" );
	  redirect($_SERVER['HTTP_REFERER']);
	  }
/*----------------------End Porject Document Delete Function-------------------*/

/*-------------------Start Manage Resume View function-------------------------*/
    function resumeUpdate($id=false)
	 {   session_destroy();
    	if(isset($id) && !empty($id))
		{	
	       $resume=$this->data['resume']=$this->Candidateragistertion_model->get(array('CandidateID'=>$id));
	    }
	    $resumeList=$this->data['resumeList']=$this->Candidateragistertion_model->get();//print_r($resumeList);die;
	    $master_projectType=$this->data['master_projectType']=$this->MasterValueModel->get(array('masterEntryID'=>'1'));
		$Jobrole=$this->data['Jobrole']=$this->MasterValueModel->get(array('masterEntryID'=>'2'));
	    $Qualification=$this->data['Qualification']=$this->MasterValueModel->get(array('masterEntryID'=>'3'));
		$Coursetype=$this->data['Coursetype']=$this->MasterValueModel->get(array('masterEntryID'=>'6'));
		$jobtype=$this->data['jobtype']=$this->MasterValueModel->get(array('masterEntryID'=>'4'));
		$candidateskills=$this->data['candidateskills']=$this->MasterValueModel->get(array('masterEntryID'=>'5'));
		$UniversityCollege=$this->data['UniversityCollege']=$this->MasterValueModel->get(array('masterEntryID'=>'7'));
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('add_Resume',$this->data);
		$this->parser->parse('include/footer',$this->data);
		
	 }
/*----------------------End  Manage Resume View function-----------------------------*/

/*---------------------Start Candidate Details Insert Function-----------------------*/		
   function InsertCandidateRagistertion()
	{	
		//session_destroy();
		error_reporting(0);
		if($_FILES['candidateProfileImage']['name']!='')			
		{	
			$data['image_z1']= $_FILES['candidateProfileImage']['name'];  			
			$candidateProfileImage=sha1($_FILES['candidateProfileImage']['name']).time().rand(0, 9);			
			if(!empty($_FILES['candidateProfileImage']['name']))			
			{					
				$config =  array(
				'upload_path'	  => 'uploads/candidateProfileImage',				
				'file_name'       => $candidateProfileImage,				
				'allowed_types'   => "gif|jpg|png|jpeg|JPG|JPEG|PNG|JPG",					
				'overwrite'       => true,
				);
				$this->upload->initialize($config);
				$this->load->library('upload');						 
				if($this->upload->do_upload("candidateProfileImage"))
				{		
					$upload_data = $this->upload->data();
					$candidateProfileImage=$upload_data['file_name'];		
				}
				else			
				{	
					echo $this->upload->display_errors()."file upload failed";
					$image    ="";	
				}				
			}
		}			
		$name=$this->input->post('candidateName');
		$email=$this->input->post('candidateEmail');
		$Password=md5($this->input->post('candidatePassword'));
		$DOB=$this->input->post('candidateDOB');
		$Gender=$this->input->post('candidateGender');
		$Mobile=$this->input->post('candidateMobile');
		$CandidateID=$this->input->post('CandidateID');
		if(isset($CandidateID)&&!empty($CandidateID))
		{   $lexusjobs = array(	
								'CandidateID' => $CandidateID,									
							   );					
								$this->session->set_userdata('CandidateID', $lexusjobs);	
								$this->session->userdata('CandidateID');	
			$CandidateID=$this->session->userdata('CandidateID');
			$this->userinfos['CandidateID']=$CandidateID['CandidateID']; 
		} 
		$oldprofileimages=$this->input->post('candidateProfileImage');
		if(!empty($this->userinfos['CandidateID']))
			{			
				$data = array(				
				'Name'=>$name,						 				
				'DOB'=>$DOB,				
				'Gender'=>$Gender,				
				'Mobile'=>$Mobile			
				);							
				if(!empty($candidateProfileImage))
				{								
					($data['profileImage'] = $candidateProfileImage);						
					$originalPath='uploads/candidateProfileImage/'.$oldprofileimages;
					unlink($originalPath);
				}					
				$user=$this->Candidateragistertion_model->put($data, array('CandidateID'=>$this->userinfos['CandidateID']));						
				echo json_encode(array('code'=>200,'message'=>'Update Profile successfully!!'));			
			}
		else 
			{ 
				if(!empty($name) && !empty($email) && !empty($Password) && !empty($DOB) && !empty($Gender) && !empty($Mobile) )
				  { 
					$checkuser=$this->Candidateragistertion_model->get(array('Email'=>$email));
					if(!empty($checkuser))
						{ 
							echo json_encode(array('code'=>300,'message'=>'You are alredy ragister'));
						}
						else
						{		
							$data = array(				
							'Name'=>$name,				
							'Email'=>$email,				
							'Password'=>$Password,					
							'DOB'=>$DOB,				
							'Gender'=>$Gender,				
							'Mobile'=>$Mobile			
							);							
						if(!empty($candidateProfileImage))				
							{
								$data['profileImage']=$candidateProfileImage;			
							} 
							$user=$this->Candidateragistertion_model->post($data);						
							if(!empty($user))
							  {	
								$userinfo=$this->Candidateragistertion_model->get(array('CandidateID'=>$user['result']));
								if(!empty($userinfo))
									{
										$lexusjobs = array(	
										'CandidateID' => $userinfo[0]->CandidateID,									
										'Name' => $userinfo[0]->Name,							
										'profileImage' => $userinfo[0]->profileImage,							
										);						
										$this->session->set_userdata('lexusjobs.in', $lexusjobs);					
									}
								if(!empty($userinfo))
									{
										$lexusjobs = array(	
										'CandidateID' => $userinfo[0]->CandidateID,									
										'Name' => $userinfo[0]->Name,							
										'profileImage' => $userinfo[0]->profileImage,							
										);						
										$this->session->set_userdata('CandidateID', $lexusjobs);	
										$this->session->userdata('CandidateID');										
									}								
									echo json_encode(array('code'=>200,'message'=>'Ragistration successfully!!'));					
							  }					
						}			
				  }
				else			
				  { 
					echo json_encode(array('code'=>300,'message'=>'All Fields Are Mendatory!!'));
				  }
			}
		}
/*--------------------------------End Candidate Detail Insert Function---------------------*/

/*--------------------------------Start Candidate Edit Value Function---------------------*/
      function retrieveData($id = false)
	  {
		if(isset($id) && ($id))
			{
				$candidateRagistertion = $this->data['candidateRagistertion']=$this->Candidateragistertion_model->get(array('CandidateID'=>$id));//print_r($candidateRagistertion);die;
				$candidateExperience = $this->data['candidateExperience']=$this->Candidateexperience_model->get(array('CandidateID'=>$id));//print_r($candidateExperience);die;
				$candidateSkill = $this->data['candidateSkill']=$this->Candidateskills_model->get(array('CandidateID'=>$id));//print_r($candidateSkill);die;
				$candidateEducation = $this->data['candidateEducation']=$this->Candidatequalification_model->get(array('CandidateID'=>$id));//print_r($candidateEducation);die;
				$candidateCourse = $this->data['candidateCourse']=$this->Mastervaluecourse_model->get(array('qualificationID'=>$id));//print_r($candidateCourse);die;
				$candidateSpecialization = $this->data['candidateSpecialization']=$this->Mastervaluespecialization_model->get(array('specializationID'=>$id));//print_r($candidateSpecialization);die;
			}
			$resumeList=$this->data['resumeList']=$this->Candidateragistertion_model->get();//print_r($resumeList);die;
			$master_projectType=$this->data['master_projectType']=$this->MasterValueModel->get(array('masterEntryID'=>'1'));
			$Jobrole=$this->data['Jobrole']=$this->MasterValueModel->get(array('masterEntryID'=>'2'));
			$Qualification=$this->data['Qualification']=$this->MasterValueModel->get(array('masterEntryID'=>'3'));
			$Coursetype=$this->data['Coursetype']=$this->MasterValueModel->get(array('masterEntryID'=>'6'));
			$jobtype=$this->data['jobtype']=$this->MasterValueModel->get(array('masterEntryID'=>'4'));
			$candidateskills=$this->data['candidateskills']=$this->MasterValueModel->get(array('masterEntryID'=>'5'));
			$UniversityCollege=$this->data['UniversityCollege']=$this->MasterValueModel->get(array('masterEntryID'=>'7'));	
			$this->parser->parse('include/header',$this->data);
			$this->parser->parse('include/left_menu',$this->data);
			$this->load->view('add_Resume',$this->data);
			$this->parser->parse('include/footer',$this->data);
	  }	  
/*--------------------------------End Candidate Edit Value  Function---------------------*/
	
/*--------------------------------START CANDIDATE RESUME EXPERIENCE FUNCTION----------------------*/	
 function InsertcandidateExperience ()		
	{ 			
		$filter =$this->session->userdata('CandidateID');//print_r($filter);die;
		$Expdata = array(		
			'totalWorkExperienceYear'=>$this->input->post('Totalyearexperience'),
			'totalWorkExperienceMonth'=>$this->input->post('Totalmonthexperience'),
			'currentCTC'=>$this->input->post('curuntSalary'),
			'expactationCTC'=>$this->input->post('salaryExpactation'),
			'CurrentLocation'=>$this->input->post('currentLocation')
		);  
		if(!empty($Expdata))
		{
			$user=$this->Candidateragistertion_model->put($Expdata,array('CandidateID'=>$filter['CandidateID']));	
		}	
		$StartWorkyear = $this->input->post('StartWorkyear');
		$StartWorkMonth = $this->input->post('StartWorkMonth');	
		$EndWorkingYear = $this->input->post('EndWorkingYear');
		$EndWorkingMonth = $this->input->post('EndWorkingMonth');
		$CompanyName = $this->input->post('CompanyName');
		$jobRole = $this->input->post('jobRole');	
		$jobType = $this->input->post('jobType');	
		$otherjobRole = $this->input->post('otherjobRole');	
		$otherjobType = $this->input->post('otherjobType');	 
		if(!empty($StartWorkyear) && $StartWorkyear[0] !=''){	
			if(!empty($filter)){			
			$user=$this->Candidateexperience_model->delete(array('CandidateID'=>$filter));			
		}
			foreach ($StartWorkyear as $key=>$swy){	
				$experiencedata = array(					
						'CandidateID'=>$filter['CandidateID'],
						'fromYear'=>!empty($swy)?$swy:null,
						'fromMonth'=>!empty($StartWorkMonth[$key])?$StartWorkMonth[$key]:null,
						'toMonth'=>!empty($EndWorkingMonth[$key])?$EndWorkingMonth[$key]:null,
						'companyName'=>!empty($CompanyName[$key])?$CompanyName[$key]:null										
					); 
				if($EndWorkingYear[$key]=='Present'){
					$experiencedata['current']=$EndWorkingYear[$key];
				}else{
					$experiencedata['toYear']=!empty($EndWorkingYear[$key])?$EndWorkingYear[$key]:null;
				}
				
				if($jobRole[$key]=='Other'){
					$data['masterEntryID']='';
					$data['masterValueName']=!empty($otherjobRole[$key])?$otherjobRole[$key]:null;
					$mastarvalurjobrole=$this->MasterValueModel->post($data);	
					$experiencedata['jobRole']=$mastarvalurjobrole['result'];
				}else{					
					$experiencedata['jobRole']=!empty($jobRole[$key])?$jobRole[$key]:null;
				}
				if($jobType[$key]=='Other'){
					$data['masterEntryID']='';
					$data['masterValueName']=!empty($otherjobType[$key])?$otherjobType[$key]:null;
					$mastarvalurjobtype=$this->MasterValueModel->post($data);	
					$experiencedata['jobType']=$mastarvalurjobtype['result'];
				}else{					
					$experiencedata['jobType']=!empty($jobType[$key])?$jobType[$key]:null;			
				}
				$user=$this->Candidateexperience_model->post($experiencedata);		
			} 
		}	
	}
/*---------------------------------END CANDIDATE EXPERIENCE FUNCTION-----------------*/

/*--------------------------------START CANDIDATE QUALIFICATION FUNCTION-------------*/
 function InsertCandidateQualification()
	{  
		$filter = $this->userinfos['CandidateID'];//print_r($filter);die;	
		$Qualification = $this->input->post('Qualification'); 
		$Course = $this->input->post('Course');		
		$Specialization = $this->input->post('Specialization');			
		$UniversityCollege = $this->input->post('UniversityCollege');
		$CourseType = $this->input->post('CourseType');					
		$PassingYear = $this->input->post('PassingYear');
		$othercoures=$this->input->post('otherCourse');	
		$otherSpecialization=$this->input->post('otherSpecialization');
		$otherUniversityCollege=$this->input->post('otherUniversityCollege');

		if(!empty($Qualification) && $Qualification[0] !=''){ 
			if(!empty($filter)){			
				$user=$this->Candidatequalification_model->delete(array('CandidateID'=>$filter));			
			}    
			foreach ($Qualification as $key=>$qu){ 	
				$Education = array(	
					'CandidateID'=>$filter,
					'Qualification'=>!empty($qu)?$qu:null,						 			
					'CourseType'=>!empty($CourseType[$key])?$CourseType[$key]:null,				
					'passingYear'=>!empty($PassingYear[$key])?$PassingYear[$key]:null
					);		
				if($Course[$key]=='Other'){
					$Othecoursedata['qualificationID']=!empty($qu)?$qu:null;
					$Othecoursedata['courseName']=!empty($othercoures[$key])?$othercoures[$key]:null;					
					$mastarvalue=$this->Mastervaluecourse_model->post($Othecoursedata);
					$Education['Couser']=$mastarvalue['result'];
					$Course[$key]=$mastarvalue['result'];
				}else{
					$Education['Couser']=!empty($Course[$key])?$Course[$key]:null;
				}
				if($Specialization[$key]=='Other'){ 
					$OtherSpecializationdata['courseID']=!empty($Course[$key])?$Course[$key]:null;
					$OtherSpecializationdata['specializationCouser']=!empty($otherSpecialization[$key])?$otherSpecialization[$key]:null;					 
					$mastarvalue=$this->Mastervaluespecialization_model->post($OtherSpecializationdata);					 
					$Education['Specialzation']=$mastarvalue['result'];
				}else{
					$Education['Specialzation']=!empty($Specialization[$key])?$Specialization[$key]:null;
				}				
				if($UniversityCollege[$key]=='Other'){
					$OtherUniversityCollegedata['masterEntryID']='7';
					$OtherUniversityCollegedata['masterValueName']=!empty($otherUniversityCollege[$key])?$otherUniversityCollege[$key]:null;
					$mastarvalue=$this->MasterValueModel->post($OtherUniversityCollegedata);	
					$Education['universityCollegeName']=$mastarvalue['result'];
				}else{
					$Education['universityCollegeName']=!empty($UniversityCollege[$key])?$UniversityCollege[$key]:null;
				}	//print_r($Education);die;
				
				$user=$this->Candidatequalification_model->post($Education);
			}				
		}			 
	 }
/*--------------------------------END CANDIDATE QUALIFICATION FUNCTION---------------*/

/*--------------------------------START CANDIDATE SKILLS FUNCTION--------------------*/
  function InsertCandidateSkills()
	{   
	    error_reporting(0);
		$filter = $this->userinfos['CandidateID'];	 
		$Skill = $this->input->post('Skills'); 
		$oldresume = $this->input->post('oldresume');
		$otherSkills = $this->input->post('otherSkills');
		$SkillsExperienceYear = $this->input->post('SkillsExperienceYear');
		$SkillsExperienceMonth = $this->input->post('SkillsExperienceMonth');		
	    		
		if(!empty($Skill) && $Skill[0]!=''){ 
					
			if(!empty($filter)){	
				$user=$this->Candidateskills_model->delete(array('CandidateID'=>$filter));//print_r($user);die;		
			}	 
			foreach ($Skill as $key=>$sk){ 
				$Skilldata =array(	
					'CandidateID'=>$filter,										
					'skillsExperienceYear'=>!empty($SkillsExperienceYear[$key])?$SkillsExperienceYear[$key]:null,					
					'skillsExperienceMonth'=>!empty($SkillsExperienceMonth[$key])?$SkillsExperienceMonth[$key]:null	
				);//print_r($Skilldata);die;
				
				if($sk=='Other'){
					$otherskiildata['masterEntryID']= '';
					$otherskiildata['masterValueName']=!empty($otherSkills[$key])?$otherSkills[$key]:null;					 
					$skillsdata1=$this->MasterValueModel->post($otherskiildata);//print_r($skillsdata1);die;					 
					$Skilldata['Skills']=$skillsdata1['result'];					
				}else{
					$Skilldata['Skills']=!empty($sk)?$sk:null;
				}
			 
		 	$user=$this->Candidateskills_model->post($Skilldata);	
			 
			}			
		} 		
		if($_FILES['candidateResume']['name']!='')			
		{
			$data['image_z1']= $_FILES['candidateResume']['name']; 
			$candidateResume=sha1($_FILES['candidateResume']['name']).time().rand(0, 9);				
			if(!empty($_FILES['candidateResume']['name']))
			{
				$config =  array(						
					'upload_path'	  => 'uploads/candidateResume',					
					'file_name'       => $candidateResume,				
					'allowed_types'   => "doc|docx|rtf|pdf",
					'overwrite'       => true,
				);				//	doc, docx, rtf, pdf
				$this->upload->initialize($config);
				$this->load->library('upload');
				if($this->upload->do_upload("candidateResume"))
				{
					$upload_data = $this->upload->data();					
					$candidateResume=$upload_data['file_name'];				
				}					
				else
				{
					echo $this->upload->display_errors()."file upload failed";
					$image    ="";
				}
			}
			if(!empty($candidateResume)){			
				if(!empty($oldresume)){				
					$originalPath='uploads/candidateResume/'.$oldresume;				
					unlink($originalPath);
				}
				$data=array(				
					'candidateResume'=>$candidateResume				
				);			
			}
			$user=$this->Candidateragistertion_model->put($data,array('CandidateID'=>$filter));//print_r($user);die;
			session_destroy();
			session_unset($user);			
		}	
	}
/*--------------------------------END CANDIDATE SKILLS FUNCTION---------------*/	
	
/*----------------------Start Resume Post AND Update data Function -------------------*/
	function resumePost()
	  { 		   	
		if(isset($_POST['submit']))
			{ 
				if($_POST['name']=="")
				{ 
				  $this->session->set_flashdata('category_error','message');
			      $this->session->set_flashdata('message','Please Enter Full Name');
			      redirect($_SERVER['HTTP_REFERER']);
				}elseif($_POST['mobile']=="")
				{
					$this->session->set_flashdata('category_error','message');
					$this->session->set_flashdata('message','Please Enter Mobile Number');
					redirect($_SERVER['HTTP_REFERER']);
				}elseif($_POST['email']=="")
				{
					$this->session->set_flashdata('category_error','message');
					$this->session->set_flashdata('message','Please Enter Email ID');
					redirect($_SERVER['HTTP_REFERER']);
				}elseif($_POST['lastCompany']=="")
				{
					$this->session->set_flashdata('category_error','message');
					$this->session->set_flashdata('message','Please Enter last Company Name');
					redirect($_SERVER['HTTP_REFERER']);
				}elseif($_POST['jobRole']=="")
				{
					$this->session->set_flashdata('category_error','message');
					$this->session->set_flashdata('message','Please Enter Job Rol');
					redirect($_SERVER['HTTP_REFERER']);
				}elseif($_POST['jobType']=="")
				{
					$this->session->set_flashdata('category_error','message');
					$this->session->set_flashdata('message','Please Enter Job Type');
					redirect($_SERVER['HTTP_REFERER']);
				}elseif($_POST['ExpactionLocation']=="")
				{
					$this->session->set_flashdata('category_error','message');
					$this->session->set_flashdata('message','Please Enter Expaction Location');
					redirect($_SERVER['HTTP_REFERER']);
				}elseif($_POST['curuntSalary']=="")
				{
					$this->session->set_flashdata('category_error','message');
					$this->session->set_flashdata('message','Please Enter Curunt Salary');
					redirect($_SERVER['HTTP_REFERER']);
				}elseif($_POST['salaryExpactation']=="")
				{
					$this->session->set_flashdata('category_error','message');
					$this->session->set_flashdata('message','Please Enter Salary Expactation');
					redirect($_SERVER['HTTP_REFERER']);
				}elseif($_POST['maxQualification']=="")
				{
					$this->session->set_flashdata('category_error','message');
					$this->session->set_flashdata('message','Please Enter Qualification');
					redirect($_SERVER['HTTP_REFERER']);
				}else 

		 			$file = $_FILES['resume']['name'];
		 			$path= pathinfo($file);//print_r($path);die;
		 			$fileExtension = $path['extension'];
		 			$tmp  = $_FILES['resume']['tmp_name'];
					$size=$_FILES['resume']['size'];
					$uniq_id=substr(md5(microtime()),rand(0,26),10);
					$filename = $uniq_id. '.' .$fileExtension;
					$moveCV= move_uploaded_file($tmp,"resume/".$filename);//print_r($moveCV);die;
					$cv = $filename;
				    $data = array(
								  'name'=>$this->input->post('name'),
								  'mobile'=>$this->input->post('mobile'),  
								  'email'=>$this->input->post('email'),
								  'lastCompany'=>$this->input->post('lastCompany'),
								  'jobRole'=>$this->input->post('jobRole'),
								  'jobType'=>$this->input->post('jobType'),
								  'experience'=>$this->input->post('experience'),
								  'month'=>$this->input->post('month'), 
								  'currentLocation'=>$this->input->post('currentLocation'),
								  'curuntSalary'=>$this->input->post('curuntSalary'),
								  'salaryExpactation'=>$this->input->post('salaryExpactation'), 
								  'maxQallification'=>$this->input->post('maxQallification'),
								  'DOB'=>$this->input->post('DOB'),
								  'resume'=>$cv,
								  'createdBY'=>'admin',
				    			  'chnagedBY'=>'admin',
								  'createdON'=>date('d-m-Y H:i:s'),
				    			  'changedON'=>date('d-m-Y H:i:s'),
								 );
					if($this->input->post('CandidateID'))
					  {
						$CandidateID=$this->input->post('CandidateID');
						$resumeUpdate=$this->data['resumeUpdate']=$this->Candidateragistertion_model->put($data,array('CandidateID'=>$CandidateID));
						$this->session->set_flashdata('category_success','message');
						$this->session->set_flashdata ( 'message','Resume update successfully !!!' );
						redirect('Master/resumeUpdate');
					}else{	
						  $mobile =$this->input->post('mobile');
						  $email=$this->input->post('email');
						  $checkEmail = $this->data['checkEmail']=$this->Master_model->checkData($email,$mobile);
						  if(count($checkEmail)>0)
							  {
								$this->session->set_flashdata('category_error','message');
								$this->session->set_flashdata('message','Emial id or mobile number already registered...');
								redirect($_SERVER['HTTP_REFERER']);
							  }else 
									$resumePost= $this->data['resumePost']=$this->Candidateragistertion_model->post($data);
									$this->session->set_flashdata('category_success','message');
									$this->session->set_flashdata ( 'message','Resume Insert successfully !!!' );
									redirect('Master/resumeUpdate');
							}	
			}
	}
/*-------------------End Resume Post AND Update function Section------------------------*/

/*------------------------------Star Resume Delete function---------------------------*/	
	function resumeDelete($id)
      {
	    $delete=$this->Candidateragistertion_model->delete(array('CandidateID'=>$id));
	    $this->session->set_flashdata('category_success','message');
	    $this->session->set_flashdata ('message',"Your Resume successfully  delete !!!" );
		redirect($_SERVER['HTTP_REFERER']);
      }
/*-------------------------End Resume Delete Function Section---------------------------*/	
	
/*------------------Start Manual CV Filter Function----- --------------------*/
function cvFilter()
	 {	
	 	$data=array();
		$experience=$this->input->post('experience');//echo $experience;die;
		$jobType= $this->input->post('jobType');
		$qualification= $this->input->post('qualification');
		$jobRole= $this->input->post('jobRole'); 
		if(!empty($experience) || !empty($jobType) || !empty($qualification) || !empty($jobRole))
		 {	 
			 	if(!empty($experience)){ $query =" experience>='$experience'"; }
				if(!empty($jobType)){ $query.=" and jobType='$jobType'"; }
				if(!empty($qualification)){ $query.=" and maxQallification='$qualification'"; }
				if(!empty($jobRole)){ $query.=" and jobRole='$jobRole'"; }
				$resumepost=$this->data['resumepost']=$this->CandidateModel->search($query);
				$master_jobrole=$this->data['master_jobrole']=$this->MasterValueModel->get(array('masterEntryID'=>'2'));//print_r($master_jobrole);die;
				$master_qualification=$this->data['master_qualification']=$this->MasterValueModel->get(array('masterEntryID'=>'3'));
				$master_jobtype=$this->data['master_jobtype']=$this->MasterValueModel->get(array('masterEntryID'=>'4'));
				
		 }else{ 
				$resumepost=$this->data['resumepost']=$this->CandidateModel->get();//print_r($resumepost);die;
				$detail = $this->data['detail']=$this->Candidatequalification_model->get();//print_r($detail);die;
				$master_jobrole=$this->data['master_jobrole']=$this->CVFilterModel->getFilter();//print_r($master_jobrole);die;
				$master_qualification=$this->data['master_qualification']=$this->MasterValueModel->get(array('masterEntryID'=>'3'));
				$master_jobtype=$this->data['master_jobtype']=$this->MasterValueModel->get(array('masterEntryID'=>'4'));
			}
		$this->parser->parse('include/header',$this->data);
  	    $this->parser->parse('include/left_menu',$this->data);
		$this->load->view('cvFilter',$this->data);
		$this->parser->parse('include/footer',$this->data);
    }
/*--------------------------End CV List ADN CV Filter Section------------------------*/	

/*-----------------Start Download CV Function In CV Filter View Section-------------*/	
	
	function downloadfilterCV()
	 {	 
	   	$file = $_GET['fileName'];//print_r($file);die;
	    $filePath= 'uploads/candidateResume/'.$file;
	    header("Content-Disposition: attachment;filename=$file");
	    readfile($filePath);
	    //die;//$filename = 'UPLOAD_RESUME/f3e0eAGRA';
	 }
/*-----------------End Download CV Function In CV Filter Section-------------------*/ 

/*---------------------Star View CV Information function---------------------------*/
  function candidateInformation($id =false)
    {
       if(isset($id) && !empty($id))
		{
            $viewInfo=$this->data['viewInfo']=$this->Candidateragistertion_model->get(array('CandidateID'=>$id));//print_r($viewInfo);die;
			$master_jobtype=$this->data['master_jobtype']=$this->Candidatequalification_model->get(array('CandidateID'=>$id));//print_r($master_jobtype);die;
		}
		$master_projectType=$this->data['master_projectType']=$this->MasterValueModel->get(array('masterEntryID'=>'1'));//print_r($master_projectType);die;
		$master_jobrole=$this->data['master_jobrole']=$this->Candidatequalification_model->get(array('masterEntryID'=>'2'));
	    $master_qualification=$this->data['master_qualification']=$this->MasterValueModel->get(array('masterEntryID'=>'3'));//print_r($master_qualification);die;
        $master_jobtype=$this->data['master_jobtype']=$this->Candidatequalification_model->get(array('CandidateID'=>$id));
        $this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('view_Info',$this->data);
		$this->parser->parse('include/footer',$this->data);
    }
/*-----------------------End View  CV Information Section--------------------------*/
    	
/*-------------------- START Candidate Follw Up View FUNCTION------------------------*/
    function candidateFollowup($CandidateID = false)
     {  
     	$followupDetail= $this->data['followupDetail']=$this->FollowupModel->get(array('CandidateID'=>$CandidateID));//print_r($followupDetail);die;
     	$this->data['CandidateID']=$CandidateID;
     	$this->parser->parse('include/header',$this->data);
     	$this->parser->parse('include/left_menu',$this->data);
     	$this->load->view('candidateFollowup',$this->data);
     	$this->parser->parse('include/footer',$this->data);
     }
/*--------------------------END Candidate Follw Up View FUNCTION---------------------*/
      
 /*---------------------------SATAR Candidate Follw Up DATA Insert FUNCTION-------------------*/
     function followupPost()
      { //echo $_POST['contact'];echo $this->input->post('contact');die;
      		/*if($_POST['contact']=="")
				{ 
				  $this->session->set_flashdata('category_error','message');
			      $this->session->set_flashdata('message','please select candidate contact');
			      redirect($_SERVER['HTTP_REFERER']);
				}elseif($_POST['status']=="")
				{
					$this->session->set_flashdata('category_error','message');
					$this->session->set_flashdata('message','please select candidate status');
					redirect($_SERVER['HTTP_REFERER']);
				}elseif($_POST['followupDate']=="")
				{
					$this->session->set_flashdata('category_error','message');
					$this->session->set_flashdata('message','please Select current date');
					redirect($_SERVER['HTTP_REFERER']);
				}elseif($_POST['nextfollowupDate']=="")
				{
					$this->session->set_flashdata('category_error','message');
					$this->session->set_flashdata('message','please enter next follow up data');
					redirect($_SERVER['HTTP_REFERER']);
				}elseif($_POST['response']=="")
				{
					$this->session->set_flashdata('category_error','message');
					$this->session->set_flashdata('message','Please Enter candidate response');
					redirect($_SERVER['HTTP_REFERER']);
				}
			else{*/
					$followupID=$this->input->post('followupID');//print_r($followupID);die;
			      	$CandidateID=$this->input->post('CandidateID');//echo $CandidateID ;die;	
			      	$contact = $this->input->post('contact');
			      	$dates= $this->input->post('followupDate');
			      	$sequencedate=strtotime($dates);
			      	$date = date("d-m-Y",$sequencedate);
			      	$nextDate = $this->input->post('nextfollowupDate');
			      	$nextdate = strtotime($nextDate);
			      	$nextfollowup =date("d-m-Y",$nextdate); 
			     	$data = array( 
			     				  'CandidateID'=>$CandidateID,
			     			      'userID'=>'1',
			     			      'contact'=>$contact,
			     				  'status'=>$this->input->post('status'), 
			     			      'followupDate'=>$date,
			     				  'time'=>$this->input->post('time'),
			     			      'nextfollowupDate'=>$nextfollowup,
			     				  'response'=>$this->input->post('response'),
			     			      'createdBY'=>'admin',
			     				  'createdON'=>date('y-m-d H:i:s'),
			     				  );//print_r($data);die;
			      		if(isset($followupID)&&!empty($followupID)&&$followupID!=='')
			      		{
			      		   $follow=$this->data['follow']=$this->FollowupModel->put($data,array('followupID'=>$followupID));
			     		   if($follow)
			     			{ 
			     			   $this->followupValueGet($CandidateID,'update');
			     			}
			     		}
			     		else
			     		{
			     		   $follow = $this->data['follow']= $this->FollowupModel->post($data);
			         	   if($follow)
			                {
			        	       $this->followupValueGet($CandidateID,'add');
			                }
			     	    }
			//}	
			
      }
/*----------------------------END Candidate Follw Up Insert Data Function-----------------*/

/*--------------------------------Satar Candidate FollwUp Listing Data FUnction-------------------*/
  function followupValueGet($CandidateID=false)
	{	
		if(isset($CandidateID)&&!empty($CandidateID))
			{
				$followupDetail=$this->data['followupDetail']=$this->FollowupModel->get(array('CandidateID'=>$CandidateID));//print_r($followupDetail);die;
			}
		?> 
      		<div class="panel panel-default">
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
								$i=1; foreach($followupDetail as $list){ //print_r($followupDetail);die; ?>
								<tr>
									<td><?=$i;?></td>
									<!--<td><?php// if(isset($list->contact)){ echo $list->contact; } ?></td>-->
									<td><?php if(isset($list->status)){ echo $list->status; } ?></td>
									<td><?php if(isset($list->followupDate)){   echo $list->followupDate; } ?></td>
									<td><?php if(isset($list->nextfollowupDate)){ echo $list->nextfollowupDate; } ?></td>
									<td>
										<a  onclick="followupEdit(<?=$list->followupID; ?>);" class="btn btn-secondary btn-sm btn-icon icon-left"><i class="fa-pencil-square-o"></i> Edit </a>
										<a onclick="followupDelete(<?=$list->followupID ;?>);"
										   class="btn btn-danger btn-sm btn-icon icon-left"><i class="fa fa-trash-o"></i> Delete 
										</a>
									</td>
								</tr>
								<?php $i++; } }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>		
		<?php  
	}
/*---------------------------------End Candidate Follw Up Listing function----------------*/ 
  
/*---------------------------START Candidate Follw Up Edit Value Function-----------------*/
   function followupRenovate()
  	 { 
  		 $followuprenovate=$this->data['$followuprenovate']=$this->FollowupModel->get(array('followupID'=>$this->input->post('id')));//print_r($followuprenovate);die;
  		 echo json_encode($followuprenovate[0]);
  	 } 
/*-----------------------------END Candidate Follw Up Edit Value Function-----------------*/
                 
/*-------------------------Start Candidate Follw Up Delete Function-------------------------*/
    function followupDelete()
      { 
      	$followupID= $this->input->post('id');//print_r($followupID);die;
      	if(isset($followupID)&&!empty($followupID))
      	{ 
      		$followupDelete=$this->data['followupDelete']=$this->FollowupModel->get(array('followupID'=>$followupID));
      		$delete=$this->data['delete']=$this->FollowupModel->delete(array('followupID'=>$this->input->post('id')));
            $followup=$followupDelete[0]->CandidateID; 
            $this->followupValueGet($followup);     		
      	}
      }
/*-----------------------------End Candidate Follw Up Delete Function------------------*/
                 
 /*--------------------------Satar Partner View Function----------------------------*/
   function partnerUpdate($partnerID= false)
   { 
       if(isset($partnerID) && !empty($partnerID))
	   { //echo'sdfas';die;
		   //$table = array('table'=>'partner');
		 $updateDetail = $this->data['updateDetail']=$this->PartnerModel->get(array('partnerID'=>$partnerID));
	   }
	    $partnerList= $this->data['partnerList']=$this->PartnerModel->get();//print_r($partnerList);die;
	    $this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('partner_Detail',$this->data);
		$this->parser->parse('include/footer',$this->data);
   }
/*----------------------------------------End Partner View Section----------------------------------*/

/*------------------------------------Star partner Data Insert Function------------*/
	function partnerPost()
       {			
		   $post = $_POST; 
		   $post = array(
					     'partnerName'=>$this->input->post('partnerName'),
						 'contactPerson'=>$this->input->post('contactPerson'),
						 'address'=>$this->input->post('address'),
						 'contactNumber'=>$this->input->post('contactNumber'),
						 'emailID'=>$this->input->post('emailID'),
						 'webSite'=>$this->input->post('webSite'),
						); 
	  	   $partnerID=$this->input->post('partnerID'); 
		   if(isset($partnerID) && !empty($partnerID) && $partnerID!=='')
		    {
				$partnerRenovate=$this->data['partnerRenovate']=$this->PartnerModel->put($post,array('partnerID'=>$partnerID));
					if($partnerRenovate)
					{
						$this->partnerGetValue($partnerID);
					}
			}
		    else
		   	{	
		          $partner=$this->data['partner']=$this->PartnerModel->post($post);
		          if($partner)
		          {
		              $this->partnerGetValue();	
		          }
		   	}
     }
/*--------------------------End Partner Data Insert Function-----------------------------*/
     
/*-------------------START PARTNER GET VALUE LISTING VIEW DATA FUNCTION----------------*/ 
  function partnerGetValue($partnerID=false)
    {	
    	if(isset($partnerID) && !empty($partnerID))
			{
				$retrieveList=$this->data['retrieveList']=$this->PartnerModel->get(array('partnerID'=>$partnerID));
			}
			$partnerList= $this->data['partnerList']=$this->PartnerModel->get();//print_r($partnerList);die;
			?>
				<div class="panel panel-default">
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
										<th>Partner Name</th>
										<th>Contact Persone</th>
										<th>Contact Number</th>
										<th>Action</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>S. no</th>
										<th>Partner Name</th>
										<th>Contact Persone</th>
										<th>Contact Number</th>
										<th>Action</th>
									</tr>
								</tfoot>
								<tbody>
									<?php if(isset($partnerList) && !empty($partnerList)){
										$i=1; foreach($partnerList as $list){?>
										<tr>
											<td><?=$i;?></td>
											<td><?php if(isset($list->partnerName)){ echo $list->partnerName; } ?></td>
											<td><?php if(isset($list->contactPerson)){ echo $list->contactPerson; } ?></td>
											<td><?php if(isset($list->contactNumber)){ echo $list->contactNumber; } ?></td>
											<td>
												<a onclick="partnerEditValue(<?=$list->partnerID; ?>);" class="btn btn-secondary btn-sm btn-icon icon-left"><i class="fa-pencil-square-o"></i> Edit </a>
												<a onclick="partnerDelete(<?=$list->partnerID; ?>);" class="btn btn-danger btn-sm btn-icon icon-left"><i class="fa fa-trash-o"></i> Delete </a>
												<!--<a href="<?php echo base_url(); ?>Master/shortlist/<?=$list->projectID; ?>" class="btn btn-success btn-sm btn-icon icon-left">ShortlistCV</a>
												<a href="<?php echo base_url(); ?>Master/manage_requierment/<?=$list->projectID; ?>" class="btn btn-secondary btn-sm btn-icon icon-left">Requirement</a>
												<?php
												//if($list->status =='Active'){ ?>
												<a href="<?php echo base_url();?>Master/status" class="btn btn-success btn-sm btn-icon icon-left">Inactive</a>
												<?php //}else{ ?>	  
												<a href="<?php echo base_url();?>Master/status" class="btn btn-success btn-sm btn-icon icon-left">Active</a>-->
												<?php// }?>
											</td>
										</tr>
									<?php $i++; }} ?>
								 </tbody>
							</table>
						</div>
					</div>
				</div>  
		<?php
    } 
/*-------------------END PARTNER GET VALUE LISTING VIEW DATA FUNCTION-----------------*/

/*----------------------------START PARTNER EDIT FUNCTION----------------------*/
    function partnerRenovate()
    {
    	$partnerrenovate=$this->data['partnerrenovate']=$this->PartnerModel->get(array('partnerID'=>$this->input->post('id')));
    	echo json_encode($partnerrenovate[0]);
    }
/*-----------------------------END PARTNER EDIT FUNCTION------------------------*/
    
/*-----------------------------start Partner Delete Function--------------------*/
	function partnerDelete()
      { 
      	$partnerID= $this->input->post('id');
      	 if(isset($partnerID)&&!empty($partnerID))
      	   { 
      		$partnerID=$this->data['partnerID']=$this->PartnerModel->get(array('partnerID'=>$partnerID));
      		$delete=$this->data['delete']=$this->PartnerModel->delete(array('partnerID'=>$this->input->post('id')));
            $partner=$partnerID[0]->partnerID; 
            $this->partnerGetValue($partner);     		
      	  }
      }
/*---------------------------End Partner delete function------------------------*/

/*------------------------------Start function Client View------------------*/
   function clientUpdate($clientID=false)
    {	
		 if(isset($clientID) && !empty($clientID))
		 {
		   $clientupdate= $this->data['clientupdate']=$this->ClientModel->get(array('clientID'=>$clientID));
		 }
		$clientList= $this->data['clientList'] = $this->ClientModel->get();//7print_r($clientList);die;
		$this->data['clientID']=$clientID;
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('client_Detail',$this->data);
		$this->parser->parse('include/footer',$this->data);
    }
/*-----------------------------------End Function------------------------------*/

/*---------------------------Star Client Data Insert function------------------*/
   function clientPost()
    {			
	   $post = $_POST;
	   $post = array(
				     'clientName'=>$this->input->post('clientName'),
					 'contactPerson'=>$this->input->post('contactPerson'),
					 'address'=>$this->input->post('address'),
					 'contactNumber'=>$this->input->post('contactNumber'),
					 'emailID'=>$this->input->post('emailID'),
					 'webSite'=>$this->input->post('webSite'),
					); 
	   unset($post[0]);
  	   $clientID=$this->input->post('clientID'); 
	   if(isset($clientID) && !empty($clientID) &&$clientID!=='')
	    {
			$clientRenovate=$this->data['clientRenovate']=$this->ClientModel->put($post,array('clientID'=>$clientID));
			if($clientRenovate)
			{
				$this->clientGetValue($clientID);
			}
	    }
	    else
	   	{
          $client=$this->data['client']=$this->ClientModel->post($post);
          if($client)
          {
              $this->clientGetValue();	
          }
	   	}
     }
/*-----------------------------End Client Data Insert Function-----------------*/
     
/*-----------------------START CLIENT  LISTING DATA FUNCTION-------------------*/
	function clientGetValue($clientID=false)
     {	
		if(isset($clientID) && !empty($clientID))
     		{
     			$retrieveList =$this->data['retrieveList']=$this->ClientModel->get(array('clientID'=>$clientID));
     		}
    		$clientLists = $this->data['clientLists']=$this->ClientModel->get(); 	
		?>
			<div class="panel panel-default">
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
									<th>Client Name</th>
									<th>Contact Persone</th>
									<th>Contact Number</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>S. no</th>
									<th>Client Name</th>
									<th>Contact Persone</th>
									<th>Contact Number</th>
									<th>Action</th>
								</tr>
							</tfoot>
							<tbody>
							<?php if(isset($clientLists) && !empty($clientLists)){ $i=1; foreach($clientLists as $list){?>
								<tr>
									<td><?=$i;?></td>
									<td><?php if(isset($list->clientName)){ echo $list->clientName; } ?></td>
									<td><?php if(isset($list->contactPerson)){ echo $list->contactPerson; } ?></td>
									<td><?php if(isset($list->contactNumber)){ echo $list->contactNumber; } ?></td>
									<td>
										<a onclick="clientEditValue(<?=$list->clientID; ?>);" class="btn btn-secondary btn-sm btn-icon icon-left"><i class="fa-pencil-square-o"></i> Edit </a>
										<a onclick="clientDelete(<?=$list->clientID; ?>);"class="btn btn-danger btn-sm btn-icon icon-left"><i class="fa fa-trash-o"></i> Delete </a>
									</td>
								</tr>
								<?php $i++;}}?>
							</tbody>	
						</table>
					</div>
				</div>
			</div>
		<?php  
     } 
/*-----------------------END CLIENT GET LISTING DATA FUNCTION--------------*/

/*----------------------START FOLLOW UP EDIT AND UPDATE FUNCTION------------ */
function clientRenovate()
{
	$clientrenovate=$this->data['clientrenovate']=$this->ClientModel->get(array('clientID'=>$this->input->post('id')));
	echo json_encode($clientrenovate[0]);
}
/*-----------------------------END FOLLOW UP EDIT AND UPDATE FUNCTION--------------*/
					
/*-----------------------------start Client Delete Function--------------------*/
   function clientDelete()
      { 
      	$clientID= $this->input->post('id');//print_r($clientID);die;
      	 if(isset($clientID)&&!empty($clientID))
      	   { 
      		$clientID=$this->data['clientID']=$this->ClientModel->get(array('clientID'=>$clientID));
      		$delete=$this->data['delete']=$this->ClientModel->delete(array('clientID'=>$this->input->post('id')));
            $client=$clientID[0]->clientID; 
            $this->clientGetValue($client);     		
      	  }
      }
/*---------------------------End client delete Function---------------------------*/


/*---------------------Star Repost Query View Function---------------------------*/
   function reportQuery()
   {
  	 	$this->load->view('reportQuery',$this->data);
   }
/*---------------End Repost Query View Function	---------------------------*/

/*-----------------------Start Report Query Function------------------------*/   
	function reportRegister()
	 {
		$url='http://'.$_SERVER['HTTP_HOST'].'/cpanel/Login/reportQuery';
		$method='POST';
		$data=json_encode($_POST,true);
		$response=Curl::queryCurl($method,$url,$data);	
		if($response['code']=='200')
		{
			$this->session->set_flashdata('category_success', 'message');
			$this->session->set_flashdata('message', $this->config->item("user").'Your Query registerd successfully..... ');
			redirect($response['url']); 
		}
		else
		{
			$this->session->set_flashdata('category_error', 'message');
			$this->session->set_flashdata('message', $this->config->item("user").'Your Query not registerd please try again.....');
			redirect($response['url']);
		}
	 }
/*-----------------------End Report Query Function------------------------*/   
   }
	
	
