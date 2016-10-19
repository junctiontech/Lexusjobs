
<?php
//include(APPPATH.'libraries/Curl.php');
class Candidateragistertion_model extends CI_Model
{
	private $apiUrl='http://192.168.1.151/lexusjobsapi/candidateApi.php';
	//private $apiUrl='http://localhost:8080/lexusjobsapi/candidateApi.php';
	function post($data)
	 { 
		 $param=array('data'=>$data);
		 $url=$this->apiUrl;
		 $method='POST';
		 $profile=Curl::postCurl($method,$url,$param);//print_r($profile);die;
		 return $profile;
	}
	function put($data,$filter)
	 { 
		 $param=json_encode(array('data'=>$data,'filter'=>$filter));
		 $var=str_replace(" ", "_", $param);//echo $param;die;
		 $url=$this->apiUrl.'?data='.$var;
		 $method='put';
		// $CURL= new Curl();
		 $profile=Curl::getCurl($method,$url);//print_r($profile);die;
		 return $profile;
	 }
		
    function get($filter=false)
	 {
		  if(isset($filter) && $filter!=='' && count($filter)>0 &&!empty($filter))
		  {
				 $data=json_encode(array('filter'=>$filter));
				 $url=$this->apiUrl.'?data='.$data;
				 $method='get';
				// $CURL= new Curl();
				 $profile=Curl::getCurl($method,$url);//print_R($profile->result);die;
				 return $profile->result;
		  }
	      else
	      {
				 $url=$this->apiUrl;
				 $method='get';
				// $CURL= new Curl();
				 $profile=Curl::getCurl($method,$url);//print_r($profile);die;
				 return $profile->result;
		  }
	 }
		
	 function delete($filter)
	 {
		 $data=json_encode(array('filter'=>$filter));
		 $url=$this->apiUrl.'?data='.$data;
		 $method='delete';
		// $CURL= new Curl();
		 $profile=Curl::getCurl($method,$url);//print_r($profile);die;
		 return $profile;
	 }  
	 
	 function search($data)
	 {	
		$var=str_replace(' ','_',$data);//echo $var;die;
		//$url='http://localhost:8080/lexusjobsapi/candidateSearchApi.php?value='.$var;
		$url='http://192.168.1.151/lexusjobsapi/candidateSearchApi.php?value='.$var;
	 	$method='get';
	 //	$CURL= new Curl();
	 	$profile=Curl::getCurl($method,$url);//print_r($profile);die;
	 	return $profile->result;
	 }
 }
 ?>