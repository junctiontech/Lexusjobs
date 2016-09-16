<?php
class ProjectModel extends CI_Model
{
	private $apiUrl='http://192.168.1.151/lexusjobsapi/projectApi.php';
 	function post($data)
	 {
		 $param=array('data'=>$data);
		 $url=$this->apiUrl;
		 $method='POST';
		 $CURL= new Curl();
		 $profile=$CURL->postCurl($method,$url,$param);//print_r($profile);die;
		 return $profile;
	}
		
    function put($data,$filter)
	 {
		 $param=json_encode(array('data'=>$data,'filter'=>$filter));
		 $var=str_replace(" ", "_", $param);//echo $param;die;
		 $url=$this->apiUrl.'?data='.$var;
		 $method='put';
		 $CURL= new Curl();
		 $profile=$CURL->getCurl($method,$url);//print_r($profile);die;
		 return $profile;
	 }
		
    function get($filter=false)
	 {
		  if(isset($filter) && $filter!=='' && count($filter)>0 &&!empty($filter))
		  {
				 $data=json_encode(array('filter'=>$filter));
				 $url=$this->apiUrl.'?data='.$data;
				 $method='get';
				 $CURL= new Curl();
				 $profile=$CURL->getCurl($method,$url);//print_R($profile->result);die;
				 return $profile->result;
		  }
	      else
	      {
				 $url=$this->apiUrl;
				 $method='get';
				 $CURL= new Curl();
				 $profile=$CURL->getCurl($method,$url);//print_r($profile);die;
				 return $profile->result;
		  }
	 }
		
	 function delete($filter)
	 {
		 $data=json_encode(array('filter'=>$filter));
		 $url=$this->apiUrl.'?data='.$data;
		 $method='delete';
		 $CURL= new Curl();
		 $profile=$CURL->getCurl($method,$url);//print_r($profile);die;
		 return $profile;
	 }  
	 
 }
 ?>