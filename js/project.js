	function project()
	  { 
		var data =$("#myform").serialize();//alert(data);//return false;
		$.ajax({ 
				type:"post",
			   	url:"Master/projectPost",
				data:data,
			   })
			   .done(function(result){ //alert(result);
								   		$('#projectName').val('');
									  	$('#projectType').val('');
									  	$('#clientName').val('');
									  	$('#partnerName').val('');
									  	$('#projectDuration').val('');
									  	$('#projectStartDate').val('');
			   							$('#hide').show();
			   							$('#show').hide();
			   							$('#listingdiv').html(result);return false;
			   }); return false;
	  }
/*--------------------------END POST VALUE PROJECT FUNCTION-------------------*/

/*--------------------------START EDIT VALUE PROJECT FUNCTION-------------------*/
	function projectEditValue(id)
		{ //alert(id);
			$.ajax({ 
				     type:'post',
				     url:'Master/projectEdit',
				     data:{id:id},
				   })
				   .done(function(result){ //alert(result);
				   					  	var projectValue= JSON.parse(result);
				   					  	$('#projectID').val(projectValue.projectID);
				   					  	$('#projectName').val(projectValue.projectName);
				   					  	$('#projectType').val(projectValue.projectType);
				   					  	$('#clientName').val(projectValue.clientName);
				   					  	$('#partnerName').val(projectValue.partnerName);
				   					  	$('#projectDuration').val(projectValue.projectDuration);
				   					  	$('#projectStartDate').val(projectValue.projectStartDate);
							    	    $('#projectName').focus();
				   					});	
		}
/*---------------------------END EDIT VALUE PROJECT FUUNCTION-----------------*/
	
/*-------------------------------START PROJECT DELETE FUNCTION---------------*/
   function projectDelete(id)
	 {  //alert(id);
		if(confirm("Are yor sure you want to delete  project ?"))
			$.ajax({
					type:'post',
					url:'Master/delete',
					data:{id:id},
					success:function(result){ 
							                $('#listingdiv').html(result);return false;
  				}
		  })
	 }
/*---------------------------------END DELETE PROJECT FUNCTION---------------*/	
	
	
	
/*-------------------------------------------------------------------------------------*/