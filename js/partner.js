	function partnerPost()
	  { 
		var data =$("#myform").serialize();
		$.ajax({ 
				type:"post",
			   	url:"Master/partnerPost",
				data:data,
				async:false,
			  })
			   .done(function(result){ 
				   					$('#partnerName').val('');
				   					$('#contactPerson').val('');
								  	$('#address').val('');
								  	$('#contactNumber').val('');
								  	$('#emailID').val('');
								  	$('#webSite').val('');
			   						$('#listingDiv').html(result);return false;
		   	}); return false;
	  }
/*--------------------------END POST VALUE PROJECT FUNCTION-------------------*/

/*--------------------------START EDIT VALUE PROJECT FUNCTION-------------------*/
	function partnerEditValue(id)
		{ 
			$.ajax({ 
				     type:'post',
				     url:'Master/partnerRenovate',
				     data:{id:id},
				   })
				   .done(function(result){ //alert(result);
				   					  	var projectValue= JSON.parse(result);
				   					  	$('#partnerID').val(projectValue.partnerID);
				   					  	$('#partnerName').val(projectValue.partnerName);
				   					  	$('#contactPerson').val(projectValue.contactPerson);
				   					  	$('#address').val(projectValue.address);
				   					  	$('#contactNumber').val(projectValue.contactNumber);
				   					  	$('#emailID').val(projectValue.emailID);
				   					  	$('#webSite').val(projectValue.webSite);
							    	    $('#partnerName').focus();
				   					});	
		}
/*---------------------------END EDIT VALUE PROJECT FUUNCTION-----------------*/
	
/*-------------------------------START PROJECT DELETE FUNCTION---------------*/
   function partnerDelete(id)
	 { 
		if(confirm("Are yor sure you want to delete  project ?"))
			$.ajax({
					type:'post',
					url:'Master/partnerDelete',
					data:{id:id},
					success:function(result){ 
												$('#listingDiv').html(result);return false;
											}
  	        	  	   });
	 }
/*---------------------------------END DELETE PROJECT FUNCTION---------------*/	
	
	
	
/*-------------------------------------------------------------------------------------*/