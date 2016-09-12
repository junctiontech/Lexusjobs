<?php
include(APPPATH.'libraries/Curl.php');
class Master_model extends CI_Model
{
  function __construct()
  {
     parent::__construct();
     $this->load->database();
  }
  
/*---------------------------------Start function for Insert user Data in database--------------------------------------*/  
  function post($table,$data)
   {
      $this->db->insert($table,$data);
	  $id=$this->db->insert_id();
	  if($id)
	  {
		return $id;
	  }
    } 
/*-------------------------------------End function for insert details -----------------------------------------------------*/

/*------------------------------- Start function for retrive user all detail ------------------------------------------*/
  function get($table)
   {
	   $qry=$this->db->get($table);
	   return $qry->result();
   }
/*-----------------------------------End retrive user all detail function--------------------------------------------------*/

/*------------------------------- Start function for retrive single detail-------------------------------------------------*/
 function getData($table,$filter)
   {
	   $qry=$this->db->get_where($table,$filter);
	   
	   return $qry->result();
   } 
/*--------------------------------------End retrive single user detail--------------------------------- -----------------------*/

/*-------------------------------- ---Start function for update user detail---------------------------------------------------*/
 function put($table,$data,$filter)
	{
		$this->db->where($filter);
		$query=$this->db->update($table,$data);
		return $query;
	} 
/*-------------End update user detail Function---------------*/

  function getjoin($projectID)
	{	
		$query=$this->db->query("SELECT projectdetails.*,projectrequirement.* from projectdetails,projectrequirement where projectdetails.projectID=$projectID and projectrequirement.projectID=$projectID");
		return $query->result();
	} 
/*-------------------------------------------------------------*/
   function update($masterValueID)
	{	
		$query=$this->db->query("update mastervalue set masterValueName='$masterValueName',where id='$masterValueID'");
		return $query->result();
	}
/*-----------------------------------------------------------*/	
/*-------Start function for Delete user detail----------------*/
 function delete($table,$filter)
	{
		$query=$this->db->delete($table,$filter);
		return $query;
	} 
/*------------------End Delete user detail function----------------*/

/*------------------start project filter function------------------*/	
   function cvFilter($query)
	 { //echo "select * from resumepost where  $query ";die;
		$qry=$this->db->query(" select * from resumepost where  $query ");
		return $qry->result();
	 } 
/*-------------------End project filter function -------------------*/

/*----------------------------------------------------------*/	 

  function shortlistCv($jobRole,$experience,$jobType,$maxQallification)
    {    //echo "select * from resumepost where jobRole='$jobRole' and experience >='$experience' and maxQallification = '$maxQallification' and jobType = '$jobType' ";die;
		$qry=$this->db->query(" select * from resumepost where jobRole ='$jobRole' and experience >= '$experience' and   maxQallification ='$maxQallification' and jobType ='$jobType' ORDER BY status DESC");
		return $qry->result();
	}
 
	 
/*---------------------------------------------------------*/
	  // function projectFilter($projectID)
	 // {
		 // $query=$this->db->query("select resumepost.* from resumepost,projectrequirement where projectrequirement.projectID='$projectID' and projectrequirement.jobPost=resumepost.jobPost and projectrequirement.jobType=resumepost.jobType and projectrequirement.maxQualification=resumepost.maxQallification and projectrequirement.Experience <= resumepost.experience ORDER BY resumepost.experience DESC");
		
		 // return $query->result();
	 // } 
/*--------------------------------------------------------------------------------*/	
   function status()
    {
	   $qry=$this->db->query("UPDATE projectdetails SET id = 8");
    } 
/*-------------------------------------------------------------------------------*/   
   function shortCv($projectID)
     {
	  $qry =$this->db->query("select * from projectrequirement where projectID") ;
      return $qry->result();	
     } 
/*-------------------------------------------------------------------------------*/   
  function shortList()
	{	  
		$qry= $this->db->query("select * from resumepost where resumepost.experience= projectrequirement.Experience and resumepost.jobRole=projectrequirement.jobRole and resumepost.jobType = projectrequirement.jobType and resumepost.maxQallification=projectrequirement.maxQualification");
		return $qry->result();  
	} 
/*---------------------------------------------------------------------------------*/  
/*----------------------------------------------Rest API---------------------------*/
   function post($table,$data)
	{
		$param=array('table'=>$table,'data'=>$data);
		$url='http://192.168.1.151/Lexusjobsapi/Api.php';
		$method='POST';
		$CURL= new Curl();
		$profile=$CURL->postCurl($method,$url,$param);//print_r($profile);die;
		return $profile;
	}
	
	function put($table,$data,$filter)
	{
		$param=json_encode(array('table'=>$table,'data'=>$data,'filter'=>$filter));
		$url='http://192.168.1.151/Lexusjobsapi/Api.php?data='.$param;
		$method='put';
		$CURL= new Curl();
		$profile=$CURL->getCurl($method,$url);//print_r($profile);die;
		return $profile;
	}
	
	function get($table,$filter=false)
	{
		if(isset($filter) &&$filter!=='' && count($filter)>0)
		{
			$data=json_encode(array('table'=>$table,'filter'=>$filter));
			$url='http://192.168.1.151/Lexusjobsapi/Api.php?data='.$data;
			$method='get';
			$CURL= new Curl();
			$profile=$CURL->getCurl($method,$url);//print_R($profile);die;
			return $profile;
		}
		else 
		{
			$data=json_encode(array('table'=>$table));
			$url='http://192.168.1.151/Lexusjobsapi/Api.php?data='.$data;
			$method='get';
			$CURL= new Curl();
			$profile=$CURL->getCurl($method,$url);
			return $profile;
		}
	}
	
	function delete($table,$filter)
	{
		$data=json_encode(array('filter'=>$filter,'table'=>$table));
		$url='http://192.168.1.151/Lexusjobsapi/Api.php?data='.$data;
		$method='delete';
		$CURL= new Curl();
		$profile=$CURL->getCurl($method,$url);//print_r($profile);die;
		return $profile;
	}  
/*------------------------------------ens section------------------------------*/
	function cvlist()
	{   
	  $data = json_encode(array('table'=>$table));
	  $url='http://192.168.1.151/Lexusjobsapi/Api.php?data='.$data;
	  $method = 'delete';
	  $CURL = new Curl();
	  $profile = $CURL->getCurl($method,$url);print_r($profilr);
	  return $profile;
	}
}
?>