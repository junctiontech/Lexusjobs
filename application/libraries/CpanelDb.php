<?php
Class CpanelDb
{
	function connection($databaseName)
	{	
		$connect=mysqli_connect('localhost','root','',$databaseName);
		return $connect;
	}
}