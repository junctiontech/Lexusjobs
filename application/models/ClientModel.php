
<?php
class ClientModel extends CI_Model
{
	 	 private $apiUrl='http://192.168.1.151/lexusjobsapi/clientApi.php';
		//private $apiUrl='http://localhost:8080/lexusjobsapi/clientApi.php';
	
	function post($data)
	 {
		 $param=array('data'=>$data);
		 $url=$this->apiUrl;
		 $method='POST';
		// $CURL= new Curl();
		 $profile=Curl::postCurl($method,$url,$param);//print_r($profile);die;
		 return $profile;
	}
		
    function put($data,$filter)
	 {
		 $param=json_encode(array('data'=>$data,'filter'=>$filter));
		 $var=str_replace(" ", "_", $param);//echo $param;die;
		 $url=$this->apiUrl.'?data='.$var;
		 $method='put';
		 //$CURL= new Curl();
		 $profile=Curl::getCurl($method,$url);//print_r($profile);die;
		 return $profile;
	 }
		
    function get($filter=false)
	 {
		  if(isset($filter) && $filter!=='' && count($filter)>0)
		  {
				 $data=json_encode(array('filter'=>$filter));
				 $url=$this->apiUrl.'?data='.$data;
				 $method='get';
				 //$CURL= new Curl();
				 $profile=Curl::getCurl($method,$url);//print_R($profile->result);die;
				 return $profile->result;
		  }
	      else
	      {
				 $url=$this->apiUrl;
				 $method='get';
				// $CURL= new Curl();
				 $profile=Curl::getCurl($method,$url);
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
 }
 ?>