<?php
//if(!class_exists('curl')){ include 'curl.php'; }
//include(APPPATH.'libraries/Restcurl.php');
class ProjectModel extends CI_Model
{
	private $apiUrl='http://192.168.1.151/lexusjobsapi/projectApi.php';
	//private $apiUrl='http://localhost:8080/lexusjobsapi/projectApi.php';
	
	function post($data)
	 {
		 $param=array('data'=>$data);
		 $url=$this->apiUrl;
		 $method='POST';
		// $obj= new Curl();
		 $profile=Curl::postCurl($method,$url,$param);//print_r($profile);die;
		 return $profile;
	}
		
    function put($data,$filter)
	 {
		 $param=json_encode(array('data'=>$data,'filter'=>$filter));
		 $var=str_replace(" ", "_", $param);//echo $param;die;
		 $url=$this->apiUrl.'?data='.$var;
		 $method='put';
		// $obj= new Curl();
		 $profile=Curl::getCurl($method,$url);//print_r($profile);die;
		 return $profile;
	 }
		
    function get($filter=false)
	 {
		  if(isset($filter) && $filter!=='' && count($filter)>0 &&!empty($filter))
		  {
				 $data=json_encode(array('filter'=>$filter));//echo $data;
				 $url=$this->apiUrl.'?data='.$data;//echo $url;die;
				 $method='get';
				// $obj= new Curl();
				 $profile=Curl::getCurl($method,$url);//print_r($profile->result);die;
				 return $profile->result;
		  }
	      else
	      {
				 $url=$this->apiUrl;
				 $method='get';
				 //$obj= new Curl();
				 $profile=Curl::getCurl($method,$url);//print_r($profile);die;
				 return $profile->result;
		  }
	 }
		
	 function delete($filter)
	 {
		 $data=json_encode(array('filter'=>$filter));
		 $url=$this->apiUrl.'?data='.$data;
		 $method='delete';
		// $obj= new Curl();
		 $profile=Curl::getCurl($method,$url);//print_r($profile);die;
		 return $profile;
	 }  
	 
 }
 ?>