<?php 
//require_once __file__ . '\resume\a';
//include(APPPATH.'resume');
Class Master extends CI_Controller
{
	function __construct() {
		parent::__construct();
		$this->data[]='';
		$this->load->helper('url');
		$this->data['url']=base_url();
		$this->load->library('parser');
		$this->load->library('session');
		$this->load->model('Master_model');
		$this->load->library('session');
		$this->load->library('upload');
		
	 }
/*-----------------------------Start All Master Entry And Master Value Functions Section--------------------------*/
	 
/*------------------------------------Master Entry view section Function--------------------------*/
    function masterEntry($id=false)
     {
	    $masterList = $this->data['masterList']=$this->Master_model->get('masterentry');
	    $this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('master_Entry',$this->data);
		$this->parser->parse('include/footer',$this->data);	
     }
/*-----------------------------------End Master View Section Function-------------------------------*/
/*----------------------------------Start Master Value Inseert function------------------------------------------------*/
    function masterValuePost() 
     { 
	 	$data=$this->input->post('data');//echo $data;die;
		$explode=explode('&',$data);
		if(isset($explode) && !empty($explode))
		{
			$explodeMasterEntryID=explode('=',$explode[0]);
			$explodeMasterValueID=explode('=',$explode[1]);
			$explodeMasterValueName=explode('=',$explode[2]);
		    $explodeMasterValuename= str_replace('+',' ',$explodeMasterValueName);//print_r($explodeMasterValuename);die;
			if(isset($explodeMasterValueID[1]) && !empty($explodeMasterValueID[1]))
			{
				$masterValuePost=$this->data['masterValuePost']=$this->Master_model->put('mastervalue',array('masterValueName'=>($explodeMasterValuename[1])),array('masterValueID'=>$explodeMasterValueID[1]));

				if($masterValuePost)
				{
					$this->MasterValueGet($explodeMasterEntryID[1],'update');
				}
			}
			else
			{
				$masterValuePost=$this->data['masterValuePost']=$this->Master_model->post('mastervalue',array('masterEntryID'=>$explodeMasterEntryID[1],'masterValueName'=>$explodeMasterValuename[1]));
				if($masterValuePost)
				{
					$this->MasterValueGet($explodeMasterEntryID[1],'add');
				}
			}
		}
	  
   }   

/*----------------------------------------------End Section-------------------------------------*/
	
/*---------------------Star function for Master Value edit Section------------------------------*/	
	 function MasterValueGet($masterEntryID=false,$identity=false)
	 {	//echo $masterEntryID;die;
		 if(isset($masterEntryID)&&!empty($masterEntryID))
		 {
			 $mastervalue=$this->data['mastervalue']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>$masterEntryID));//print_r($masterValue);die;
		 }
		 else
		 {
			 $mastervalue=$this->data['mastervalue']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>$this->input->post('value')));//print_r($masterValue);die;
		 }
		 //echo '%&%';
		 ?>	
					<!--<div id="div"  style="display:none"; style="margin-left:0px;margin-bottom: -6px;margin-top: -10px"; class="panel-options">
						<button onclick="masterValueAddValue();" id="" class="btn btn-success"><i class="fa-plus"></i> <span>Add Master Value</span></button>
					</div>-->
					<table id="example-1" cellspacing="0" class="table table-small-font table-bordered table-striped">
					<!--<button onclick="addvalue(this.value)" class="btn btn-theme btn-info btn-icon btn-sm"><i class="fa-plus"></i> <span>Add Project</span></button></a>-->
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
							<?php $i=1; foreach ($mastervalue as $list){?>
							<tr>
								<td><?=$i;?></td>
								<td><?php if(isset($list->masterValueName)){ echo $list->masterValueName; } ?></td>
								<td>
									<a class="btn btn-secondary btn-sm btn-icon icon-left" onclick="ValueEdit(<?=$list->masterValueID; ?>);" ><i class="fa-pencil-square-o"></i> Edit </a>
									<a onclick="masterValueDelete(<?=$list->masterValueID; ?>);"
									class="btn btn-danger btn-sm btn-icon icon-left"><i class="fa fa-trash-o"></i> Delete</a>
								</td>
							</tr>
							<?php $i++; } ?>
						</tbody>
					</table>
		 <?php
     }
/*------------------------------End section-----------------------------------------------*/	

/*-----------------------Start master Value Update Function--------------------------------*/
  function masterValueUpdate()
    {        
		$masterUpdate = $this->data['masterUpdate'] = $this->Master_model->getData('masterValue',array('masterValueID'=>$this->input->post('value')));
	    print($masterUpdate);die;
		echo($masterUpdate[0]->masterValueName);

	}
/*-----------------------------------End section---------------------------------------*/
			
/*--------------------master value delete function-------------------------------------*/	
	function masterValueDelete()
       {
		   $masterValueID= $this->input->post('id');
		   if(isset($masterValueID)&&!empty($masterValueID))
		   { 
				$masterEntryID = $this->data['masterEntryID']= $this->Master_model->getData('mastervalue',array('masterValueID'=>$masterValueID));
				$deleteMasterValue=$this->data['deleteMasterValue']= $this->Master_model->delete('mastervalue',array('masterValueID'=>$this->input->post('id')));
				$masterEntry=$masterEntryID[0]->masterEntryID;
				$this->MasterValueGet($masterEntry);
		   }
	   }   
/*-------------------------------------------End function------------------------------*/

	
/*--------------------------Start Manage Project View section function----------------*/ 	 
	function manageProject()
	{
		$projectList=$this->data['projectList']=$this->Master_model->get('projectdetails');
		$master_projectType=$this->data['master_projectType']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'1'));
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('manage_Project',$this->data); 
		$this->parser->parse('include/footer',$this->data);
	}
/*--------------------------End Master Project view function Section-----------------------*/

/*--------------------------Start ADD Project View section Function------------------------*/	
	function projectUpdate($info=false)
	  {
		if(isset($info) && !empty($info))
		{	
		   $update=$this->data['update']=$this->Master_model->getData('projectdetails',array('projectID'=>$info));
        }
        $clientListName=$this->data['clientListName']=$this->Master_model->get('client');
		$partnerListName=$this->data['partnerListName']=$this->Master_model->get('partner');
		$master_projectType=$this->data['master_projectType']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'1'));
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('add_Project',$this->data);
		$this->parser->parse('include/footer',$this->data);
      }
/*----------------------------End Add view function Section------------------------*/

/*---------------------Start ADD Project Insert AND Update Function-----------------*/	
 function projectPost()
	{ 
	  if(isset($_POST['submit']))
	    {	
			if($_POST['projectName']=="")
	    	{ 
				$this->session->set_flashdata('category_error','message');
				$this->session->set_flashdata('message','Please Enter Project Name');
				redirect($_SERVER['HTTP_REFERER']);
			}elseif($_POST['projectType']=="")
			{
				$this->session->set_flashdata('category_error','message');
				$this->session->set_flashdata('message','Please Enter Project Type');
				redirect($_SERVER['HTTP_REFERER']);
			}
			elseif($_POST['clientName']=="")
			{
				$this->session->set_flashdata('category_error','message');
				$this->session->set_flashdata('message','Please Enter client Name');
				redirect($_SERVER['HTTP_REFERER']);
			}elseif($_POST['partnerName']=="")
			{
				$this->session->set_flashdata('category_error','message');
				$this->session->set_flashdata('message','Please Enter partner Name');
				redirect($_SERVER['HTTP_REFERER']);
			}elseif($_POST['projectDuration']=="")
			{
				$this->session->set_flashdata('category_error','message');
				$this->session->set_flashdata("message",'Please Enter project Duration');
				redirect($_SERVER['HTTP_REFERER']);
			}elseif($_POST['projectStartDate']=="")
			{
				$this->session->set_flashdata('category_error','message');
				$this->session->set_flashdata('message','Please Enter project Start Date');
				redirect($_SERVER['HTTP_REFERER']);
			}else				
				 $projectID= $this->input->post('projectID');
				 $data = array(
							  'projectID'=>$projectID,
							  'projectName'=>$this->input->post('projectName'),
							  'projectType'=>$this->input->post('projectType'),
							  'projectStartDate'=>$this->input->post('projectStartDate'),
							  'clientName'=>$this->input->post('clientName'),
							  'partnerName'=>$this->input->post('partnerName'),
							  'projectDuration'=>$this->input->post('projectDuration'),
							  'status'=>'Active',	
							  'createdBY'=>'admin',
							  'createdON'=>date('d-m-Y H:i:s'),
							 );
					if($projectID)
					 {
					$this->data['projectID']=$this->Master_model->put('projectdetails',$data,array('projectID'=>$projectID));
					$this->session->set_flashdata('category_success','message');
					$this->session->set_flashdata ( 'message','Project Update Successfully..!!!');
					redirect('Master/manageProject');
					 }else{
						  $projectpost = $this->data['projectpost']=$this->Master_model->post('projectdetails',$data);
						  $this->session->set_flashdata('category_success','message');
						  $this->session->set_flashdata ( 'message','Project Create successfully !!!' );
						  redirect('Master/manageProject');
					}
				}
	}
	
/*---------------------------- End ADD Project Function Section------------------------*/

/*--------------------------------Start Project Delete function -----------------------*/	
		function delete($info)
		{ 
			$projectDelete=$this->Master_model->delete('projectdetails',array('projectID'=>$info));
			$this->session->set_flashdata('category_success','message');
		    $this->session->set_flashdata('message','Project delete successfully !!!');
			redirect('Master/manageProject');
		}
/*---------------------------End Project Delete Function Section--------------------*/

/*--------------------Start Manage Project Requierment FUnction--------------------*/  
   function manageProjectRequirement($id = false)
     {
		 if(isset($id) && !empty($id))
		   {
	          $projectRequirementList=$this->data['projectRequirementList']=$this->Master_model->getData('projectrequirement',array('projectID'=>$id));
			  $this->data['id']=$id;
           }
		$master_jobrole=$this->data['master_jobrole']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'2'));
	    $master_qualification=$this->data['master_qualification']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'3'));
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('manage_requierment',$this->data);
		$this->parser->parse('include/footer',$this->data);
     }
/*---------------- End Manage Project Requierment Section----------------------------------*/

/*---------------------start ADD Requierment View Function--------------------------------*/
		function projectRequirementUpdate($id = false)
		   {
			   if(isset($_GET['id'])&&!empty($_GET['id']))
				 {
					$this->data['projectID']=$_GET['id'];
				 }
			   if(isset($id) && !empty($id))
				 {
					$projectname=$this->data['projectname'] =$this->Master_model->getData('projectdetails',array('projectID'=>$id));
					$requierment =$this->data['requierment'] =$this->Master_model->getData('projectrequirement',array('projectRequirementID'=>$id));
                    $requiermentSkill=$requierment[0]->skill;
					$skill= $this->data['skill']= explode(',',$requiermentSkill);//print_r($skill);die;
					$this->data['projectrequirementID']=$id;
				}
			 $requierment =$this->data['requierment'] =$this->Master_model->getData('projectrequirement',array('projectRequirementID'=>$id));
             $clientListName=$this->data['clientListName']=$this->Master_model->get('client');
			 $partnerListName=$this->data['partnerListName']=$this->Master_model->get('partner');
			 $master_projectType=$this->data['master_projectType']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'1'));
			 $master_jobrole=$this->data['master_jobrole']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'2'));
			 $master_qualification=$this->data['master_qualification']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'3'));
			 $master_jobtype=$this->data['master_jobtype']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'4'));
			 $master_skill=$this->data['master_skill']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'5'));
			 $this->parser->parse('include/header',$this->data);
			 $this->parser->parse('include/left_menu',$this->data);
			 $this->load->view('add_requierment',$this->data); 
			 $this->parser->parse('include/footer',$this->data);
			}
/*----------------End ADD Requierment Insert AND Update Function Section------------------*/	

/*---------------start Project Requierment Post AND Update Function-----------------------*/
  function projectRequiermentPost()
   {
	 /*  if(isset($_POST['submit']))
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
		else */			
				$projectID=$this->input->post('projectID');
				$projectRequirementID=$this->input->post('projectRequirementID');
				$skill = $this->input->post('skill');//print_r($skill);die;
				$skills = implode(',',$skill);//print_r($skills);die;
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
							   'month'=>$this->input->post('month'), 
							   'jobRole'=>$this->input->post('jobRole'),
							   'salary'=>$this->input->post('salary'),
							   'salaryDuration'=>$this->input->post('salaryDuration'),
							   'createdBY'=>'admin',
							   'createdON'=>date('d-m-Y H:i:s'),
							  );
		if($projectRequirementID !== "")
		    { 
			$projectrequirementUpdate=$this->data['projectrequirementUpdate']=$this->Master_model->put('projectrequirement',$data,array('projectRequirementID'=>$projectRequirementID));
			$this->session->set_flashdata('category_success','message');
			$this->session->set_flashdata ( 'message','Project Requirement Successfully Update..!!!');
			redirect('Master/manageProject');
		    }else{
			    $project= $this->data['project']=$this->Master_model->post('projectrequirement',$data);//print_r($project);die;	
				$this->session->set_flashdata('category_success','message');
				$this->session->set_flashdata ( 'message','Project Requirement successfully Enter !!!' );
		        redirect('Master/manageProject');
			}
		//}
	}
/*--------------------End Project Requierment Post AND Update Function Section----------------*/

/*-------------------------Start Project Requierment Delete Function--------------------------*/
		function projectRequiermentDelete($info)
		{
		  $delete=$this->Master_model->delete('projectrequirement',array('projectrequirementID'=>$info));
		  $this->session->set_flashdata('category_success','message');
		  $this->session->set_flashdata ('message',"Your Record successfully  delete !!!" );
		  redirect($_SERVER['HTTP_REFERER']);
		}  
/*--------------------End Project Requierment Delete Function---------------------------------*/

/*------------------------start Manage Resume View function-----------------------------------*/
		function manageResume()
		  {	
			$resumeList=$this->data['resumeList']=$this->Master_model->get('resumepost');
			$master_jobrole=$this->data['master_jobrole']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'2'));
            $master_qualification=$this->data['master_qualification']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'3'));
            $this->parser->parse('include/header',$this->data);
			$this->parser->parse('include/left_menu',$this->data);
			$this->load->view('manage_Resume',$this->data);
			$this->parser->parse('include/footer',$this->data);
		 }
/*-------------------End Manage Resume View function Section-----------------------------*/
	
/*-------------------------------Start ADD Resume View function -------------------------*/
    function resumeUpdate($id=false)
	 {   
    	if(isset($id) && !empty($id))
		{	
	       $resume=$this->data['resume']=$this->Master_model->getData('resumepost',array('resumeID'=>$id));
	    }
        $master_projectType=$this->data['master_projectType']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'1'));
		$master_jobrole=$this->data['master_jobrole']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'2'));
	    $master_qualification=$this->data['master_qualification']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'3'));
        $master_jobtype=$this->data['master_jobtype']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'4'));
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('add_Resume',$this->data);
		$this->parser->parse('include/footer',$this->data);
		
	 }
/*----------------------End  ADD Resume View function Section--------------------------*/
	
/*----------------------Start Resume Post AND Update data Function -------------------*/
	function resumePost()
	  { 		   	

		/*  if(isset($_POST['submit']))
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
				}else */
		 			$file = $_FILES['resume']['name'];
		 			$path= pathinfo($file);
		 			$fileExtension = $path['extension'];
		 			//$explode = explode(".",$file);
		 			//$ext = $explode[1];
					$tmp  = $_FILES['resume']['tmp_name'];
					$size=$_FILES['resume']['size'];
					$uniq_id=substr(md5(microtime()),rand(0,26),10);
					$filename = $uniq_id. '.' .$fileExtension;
					$ab = move_uploaded_file($tmp,"resume/".$filename);//print_r($ab);die;
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
								  'ExpactionLocation'=>$this->input->post('ExpactionLocation'),
								  'curuntSalary'=>$this->input->post('curuntSalary'),
								  'salaryExpactation'=>$this->input->post('salaryExpactation'), 
								  'maxQallification'=>$this->input->post('maxQallification'), 
								  'resume'=>$cv,
								  'createdBY'=>'admin',
								  'createdON'=>date('d-m-Y H:i:s'),
								 );
					if($this->input->post('resumeID'))
					  {
						$resumeID=$this->input->post('resumeID');
						$resumeUpdate=$this->data['resumeUpdate']=$this->Master_model->put('resumepost',$data,array('resumeID'=>$resumeID));
						$this->session->set_flashdata('category_success','message');
						$this->session->set_flashdata ( 'message','Resume update successfully !!!' );
						redirect('Master/manageResume');
					}else{
				$resumePost= $this->data['resumePost']=$this->Master_model->post('resumepost',$data);
				$this->session->set_flashdata('category_success','message');
				$this->session->set_flashdata ( 'message','Resume Insert successfully !!!' );
				redirect('Master/manageResume'); 
			}	
			
		//}
	}
/*-------------------End Resume Post AND Update function Section------------------------*/

/*------------------------------Star Resume Delete function---------------------------*/	
    function resumeDelete($id)
     {
	   $delete=$this->Master_model->delete('resumepost',array('resumeID'=>$id));
	   $this->session->set_flashdata('category_success','message');
	   $this->session->set_flashdata ('message',"Your Resume successfully  delete !!!" );
       redirect('Master/manageResume');
     }
/*-------------------------End Resume Delete Function Section---------------------------*/	
	
/*------------------Start Job Matching AND Filter CV Function----- --------------------*/
    function cvList()
	 {	
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
			$resumepost=$this->data['resumepost']=$this->Master_model->cvFilter($query); 
			$master_jobrole=$this->data['master_jobrole']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'2'));
			$master_qualification=$this->data['master_qualification']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'3'));
			$master_jobtype=$this->data['master_jobtype']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'4'));
			$this->session->set_flashdata('category_success','message');
			$this->session->set_flashdata ( 'message',"Thease Are The List As Per Your Filter !!!" );
		 }else{
				$resumepost=$this->data['resumepost']=$this->Master_model->get('resumepost');
				$master_jobrole=$this->data['master_jobrole']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'2'));
				$master_qualification=$this->data['master_qualification']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'3'));
				$master_jobtype=$this->data['master_jobtype']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'4'));

			 }
		$this->parser->parse('include/header',$this->data);
  	    $this->parser->parse('include/left_menu',$this->data);
		$this->load->view('job_Matching',$this->data);
		$this->parser->parse('include/footer',$this->data);
    }
/*---------------------End CV List ADN CV Filter Section------------------------------*/	

/*---------------------Star View CV Information function---------------------------*/
  function viewInformation($id =false)
    {
       if(isset($id) && !empty($id))
		{
            $viewInfo=$this->data['viewInfo']=$this->Master_model->getData('resumepost',array('resumeID'=>$id));
		}
		$master_projectType=$this->data['master_projectType']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'1'));
		$master_jobrole=$this->data['master_jobrole']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'2'));
	    $master_qualification=$this->data['master_qualification']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'3'));
        $master_jobtype=$this->data['master_jobtype']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'4'));
        $this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('view_Info',$this->data);
		$this->parser->parse('include/footer',$this->data);
    }
/*---------------End View  CV Information Section----------------------------------*/	

/*---------------Start Download File Function--------------------------------------*/	
	function downloadfile()
	{	 
	   	$file = $_GET['fileName'];
	    $filePath= 'resume/'.$file;
	    header("Content-Disposition: attachment;filename=$file");
	    readfile($filePath);
	    //die;//$filename = 'UPLOAD_RESUME/f3e0eAGRA';
	 }
/*---------------------------End CV Download Function----------------------------*/ 

/*----------------------------start Shortlist CV function------------------------*/
   function shortlist($id = false)
    {    		 
	    
        $projectName=$this->data['projectName'] = $this->Master_model->getData('projectdetails',array('projectID'=>$id));
		foreach ($projectName as $name)
		{
			$projectname = array(
			'projectName'=>$name->projectName,
			);
		}     
		$projectname=$this->data['projectname']=$name->projectName;
		if(isset($id) && !empty($id))
		{   
			$projectRequiermentDetail =$this->data['projectRequiermentDetail'] = $this->Master_model->getData('projectrequirement',array('projectID'=>$id));
			foreach ($projectRequiermentDetail as $list)
			{ //print_r($list);die;
				//$data = array(
							  $experience = $list->experience;
							  $jobRole=$list->jobRole;
							  $jobType =$list->jobType;	  
							  $maxQallification=$list->maxQualification;	  
							// );
				$short_Resume=$this->data['short_Resume'][]=$this->Master_model->shortlistCv($jobRole,$experience,$jobType,$maxQallification);
				//echo '<pre>' ;print_r($short_Resume);echo'</pre>';die;
				$jobRole=$this->data['jobRole'][]=$list->jobRole;
				$projectRequirementID=$this->data['projectRequirementID'][]=$list->projectRequirementID;
			}//die;//print_r($short_Resume);die;
		} 
		
		$master_projectType=$this->data['master_projectType']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'1'));
		$master_jobrole=$this->data['master_jobrole']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'2'));
		$master_qualification=$this->data['master_qualification']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'3'));
		$master_jobtype=$this->data['master_jobtype']=$this->Master_model->getData('mastervalue',array('masterEntryID'=>'4'));
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('shortlist',$this->data);
		$this->parser->parse('include/footer',$this->data);
    }
/*-------------------------------End Shortlist function Section-----------------------------------------------------*/
 
/*---------------------------star delete shortlist cv function------------------------------------------------------*/
  // function deleteshortlist($info)
    // {
	  // $delete=$this->Master_model->delete('projectrequirement',array('projectrequirementID'=>$info));
	  // $this->session->set_flashdata ('message',"Your Record successfully  delete !!!" );
      // redirect('Master/manage_Project');
    // }   
/*-------------------------End section------------------------------------------------*/

/*----------------------start Status Active AND Inactive function----------------------*/
   function status()
     {
	    $projectdata= $this->input->post('projectID');
		$status = array(
			            'status' =>'Active',
					     'status' =>'Inactive',
                        );
	    $statusUpdate = $this->data['statusUpdate']=$this->Master_model->put('projectdetails',$status,array('projectID'=>'8'));
      }
/*------------------------------End function---------------------------------------------*/ 

/*-------------------------Start Manage partner Function--------------------------------*/    
	function manage_Partner()
	 {	
	    //$table = array('table'=>'partner'); 
	    $partnerList= $this->data['partnerList']=$this->Master_model->get('partner');//print_r($partnerList);die;		
        $this->parser->parse('include/header',$this->data);
  	    $this->parser->parse('include/left_menu',$this->data);
		$this->load->view('manage_Partner',$this->data);
		$this->parser->parse('include/footer',$this->data);
     }
/*-------------------------------------End Section--------------------------------------*/

/*------------------------------------satar function parentview------------------------*/
   function partnerUpdate($id= false) 
   { 
       if(isset($id) && !empty($id))
	   {
		   //$table = array('table'=>'partner');
		 $updateDetail = $this->data['updateDetail']=$this->Master_model->getData('partner',array('partnerID'=>$id));
	   }
	    $this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('partner_Detail',$this->data);
		$this->parser->parse('include/footer',$this->data);
   }
/*----------------------------------------End Section----------------------------------*/
/*------------------------------------Star partner Post and Update function-------------------------------------------------*/
		function partnerPost()
		  {			      
			$partnerID=$this->input->post('partnerID');
			$data = array(
						  'partnerName'=>$this->input->post('partnerName'),
						  'contactPerson'=>$this->input->post('contactPerson'),
						  'address'=>$this->input->post('address'),
						  'contactNumber'=>$this->input->post('contactNumber'),
	   					  'emailID'=>$this->input->post('emailID'),
						  'webSite'=>$this->input->post('webSite'),
						 );  
			if($partnerID !=="")
			 { 
		        //$table = array('table'=>'partner');
				$update=$this->data['update']=$this->Master_model->put('partner',$data,array('partnerID'=>$partnerID));
				$this->session->set_flashdata('category_success','message');
				$this->session->set_flashdata ( 'message','partner Detail Upadate successfully !!!' );
				redirect('Master/manage_Partner');
			 }else{
					//$table=array('table'=>'partner');
					$detail= $this->data['detail']=$this->Master_model->post('partner',$data);	
					$this->session->set_flashdata('category_success','message');
					$this->session->set_flashdata ( 'message','partner Detail Insert successfully !!!' );
					redirect('Master/manage_Partner'); 
             }
		  }
/*--------------------------End section----------------------------------------*/

/*-----------------------------start Partner Delete Function--------------------*/
   function partnerDelete($id)
   {
	  $delete =$this->Master_model->delete('partner',array('partnerID'=>$id)); 
	  $this->session->set_flashdata('category_error','message');
	  $this->session->set_flashdata ('message',"Your Partner Detail successfully delete !!!" );
      redirect('Master/manage_Partner');
   }
/*---------------------------End Partner delete function------------------------*/

/*-------------------------------------Client Name------------------------------*/	
	function manage_Client()
	{	
	    $clientList= $this->data['clientList'] = $this->Master_model->get('client');
		$this->parser->parse('include/header',$this->data);
  	    $this->parser->parse('include/left_menu',$this->data);
		$this->load->view('manage_Client',$this->data);
		$this->parser->parse('include/footer',$this->data);
    }
/*--------------------------------------End Section-------------------------*/	

/*------------------------------Start function Client View------------------*/
   function clientUpdate($id=false)
    {
		if(isset($id) && !empty($id))
		 {
		   $clientupdate= $this->data['clientupdate']=$this->Master_model->getData('client',array('clientID'=>$id));
		 }
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('client_Detail',$this->data);
		$this->parser->parse('include/footer',$this->data);
    }
/*-----------------------------------End Function------------------------------*/

/*---------------------------star Client Add and Update function---------------*/
		function clientPost()
		 {					 
		   $clientID=$this->input->post('clientID');
		   $data = array(
					     'clientName'=>$this->input->post('clientName'),
						 'contactPerson'=>$this->input->post('contactPerson'),
						 'address'=>$this->input->post('address'),
						 'contactNumber'=>$this->input->post('contactNumber'),
						 'emailID'=>$this->input->post('emailID'),
						 'webSite'=>$this->input->post('webSite'),
						); 
		  if($clientID)
		    {
				$client=$this->data['client']=$this->Master_model->put('client',$data,array('clientID'=>$clientID));
				$this->session->set_flashdata('category_success','message');
				$this->session->set_flashdata ( 'message','Client Detail Upadate successfully !!!' );
				redirect('Master/manage_Client');
			}else{
					$clientpostData= $this->data['clientpostData']=$this->Master_model->post('client',$data);
					$this->session->set_flashdata('category_success','message');
					$this->session->set_flashdata ( 'message','Client Detail Insert successfully !!!' );
					redirect('Master/manage_Client'); 
		     }
         }
/*-----------------------------End Section-------------------------------------*/

/*-----------------------------start Client Delete Function--------------------*/
  function clientDelete($id)
    {
	   $delete=$this->Master_model->delete('client',array('clientID'=>$id));
	   $this->session->set_flashdata('category_error','message');
	   $this->session->set_flashdata ('message',"Your Client Detail successfully delete !!!" );
       redirect('Master/manage_Client');
	}
/*---------------------------End client delete function------------------------*/

/*-------------------------star shortlist CV Approve function------------------*/	
   function approve($id= false)
   { 	
      if(isset($id) && !empty($id) && isset($_GET['resumeID']))
	  {
		  $requiermentDetail =$this->data['requiermentDetail'] =$this->Master_model->getData('projectrequirement',array('projectRequirementID'=>$id));
	      $opening = $requiermentDetail[0]->Opening; 
		  $fillVacancy = $requiermentDetail[0]->fillVacancy;
	      if($opening > $fillVacancy)
		   { 
			  $data = array(
							 'fillVacancy'=> 1+$fillVacancy,	
						    );
              $updateVacancy = $this->data['updateVacancy']=$this->Master_model->put('projectrequirement',$data,array('projectRequirementID'=>$id));
			  if($updateVacancy)
			  {	
					$dataArray=array('status'=>'approve');
				    $updateVacancy = $this->data['updateVacancy']=$this->Master_model->put('resumepost',$dataArray,array('resumeID'=>$_GET['resumeID']));
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
/*-----------------------------------End Section-----------------------------------------*/	

/*-------------------------star shortlist Cv Disapprove Function-------------------------*/	
 
 function disapprove($id = false)
   {
	   if(isset($id) && !empty($id) && isset($_GET['resumeID']))
	   {
		  $requiermentDetail=$this->data['requiermentDetail'] =$this->Master_model->getData('projectrequirement',array('projectRequirementID'=>$id));
		  $fillVacancy = $requiermentDetail[0]->fillVacancy;
		  $data = array(
						 'fillVacancy'=>$fillVacancy-1,	
					    );
		  $updateVacancy =$this->data['updateVacancy']=$this->Master_model->put('projectrequirement',$data,array('projectRequirementID'=>$id));
		  if($updateVacancy)
		  {
			   $dataArray=array('status'=>'');
			   $updateVacancy = $this->data['updateVacancy']=$this->Master_model->put('resumepost',$dataArray,array('resumeID'=>$_GET['resumeID']));
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
/*--------------------------------------------End section-------------------------------*/    
   	 
/*---------------------------- Start master Entry Function For Insert Datat------------------------*/
   /*function master()
    {
	   $masterEntryID=$this->input->post('masterEntryID');
	   if($masterEntryID=="" )
	   {   
			$masterEntryName=$this->input->post('masterEntryValue');//echo"hevauydfv";//print_r($masterEntryName[0]);die;
			$countArray=count($this->input->post('masterEntryValue'));
			for($i=0;$i<$countArray;$i++)
		      {
			    $masterdetail = $this->data['masterdetail']=$this->Master_model->post('masterentry',array('masterEntryName'=>$masterEntryName[$i]));
		      } 
	     if($masterValueID)
		 {
				$masterEntryID=$this->input->post('masterEntryID');
				$masterEntry = $this->input->post('masterEntryValue');		 
				$countArray=count($this->input->post('masterEntryValue'));echo"hello raj";print_r($countArray);die;
				for($i=0;$i<$countArray;$i++)
				{
					$master = $this->data['master']=$this->Master_model->post('mastervalue',array('masterValueName'=>$masterEntry[$i],'masterEntryID'=>$masterEntryID)); 
				}
		 }else{				
				$this->session->set_flashdata('category_success','message');
				$this->session->set_flashdata ( 'message','Master Entry Value successfully Insert' );
				redirect('Master/master_entry');						
				}
	        }else{
	        $this->session->set_flashdata('category_success','message');
			$this->session->set_flashdata ( 'message','Master Entry  successfully Insert' );
			redirect('Master/master_entry');
		}
 }*/
/*-------------------End Master Entry  Function Section------------------------------------*/
    
/*-------------------------Start Project Filter View Section-----------------------*/	
	// function ProjectFilter($projectID)
	// {
		// $ProjectFilter=$this->data['ProjectFilter']=$this->Master_model->projectFilter($projectID);
		// $this->parser->parse('include/header',$this->data);
  	    // $this->parser->parse('include/left_menu',$this->data);
		// $this->load->view('Project_Filter',$this->data);
		// $this->parser->parse('include/footer',$this->data);
	// }
/*---------------------End Project Filter View Function Section-------------------*/	

  }
?>