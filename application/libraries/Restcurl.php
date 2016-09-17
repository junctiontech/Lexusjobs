<?php 
class Curl
{
	static public function postCurl($method,$url,$param)
	{	 // echo $url;echo $method;//print_r($param);die;
		  $ch = curl_init(); // create curl handle
		  $url = $url;
		  curl_setopt($ch,CURLOPT_URL,$url); 
		  curl_setopt($ch,CURLOPT_POST, true);
		  curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query(array('data'=>$param)));
		  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
		  curl_setopt($ch, CURLOPT_FRESH_CONNECT, true); 
		  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
		  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,1800); //timeout in seconds
		  curl_setopt($ch,CURLOPT_TIMEOUT,1800 ); // same for here. Timeout in seconds.
		  $response = curl_exec($ch); //echo $response;die;
		  curl_close ($ch); 
		  $result=json_decode($response,true);//print_r($result);die;//echo $result['imageName'];die;
		  return $result;
	}
	
	static public function getCurl($method,$url)
	{	//echo $url;die;
		$ch = curl_init(); // create curl handle
		$url = $url;
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,1800); //timeout in seconds
		curl_setopt($ch,CURLOPT_TIMEOUT,1800 ); // same for here. Timeout in seconds.
		$response = curl_exec($ch);//echo $response;die;//print_r($response);die;//
		curl_close ($ch);
		$result=json_decode($response);//print_r($result);die;//echo $result['imageName'];die;
		return $result;
	}
	
	
	static public function queryCurl($method,$url,$param)
	{	 // echo $url;echo $method;//print_r($param);die;
	$ch = curl_init(); // create curl handle
	$url = $url;
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_POST, true);
	curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query(array('json'=>$param)));
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,1800); //timeout in seconds
	curl_setopt($ch,CURLOPT_TIMEOUT,1800 ); // same for here. Timeout in seconds.
	$response = curl_exec($ch); //echo $response;die;
	curl_close ($ch);
	$result=json_decode($response,true);//print_r($result);die;//echo $result['imageName'];die;
	return $result;
	}
}