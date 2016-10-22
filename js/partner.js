	function partnerPost()
	  { 
		//partnerID = $('#partnerID').val();
		var data =$("#myform").serialize();
		$.ajax({ 
				type:"post",
			   	url:"Master/partnerPost",
				data:data,
				async:false,
			  })
			   .done(function(result){ alert(result);
									   if(result)
											{
											  if(partnerID =="")
											    { 
												  $('#message_success').fadeIn('slow', function(){
												  $('#message_success').delay(3000).fadeOut(); })
						                        }
											  	else
											  		{
											  		   $('#message_update').fadeIn('slow', function(){
											  		   $('#message_update').delay(3000).fadeOut(); })
											  		}
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
											$('.message_hide').hide();
											$('#message_error').fadeIn('slow', function(){
											$('#message_error').delay(3000).fadeOut();})
											$('#listingDiv').html(result);return false;
											}
										});
	 }
/*---------------------------------END DELETE PROJECT FUNCTION---------------*/	
	
	
	
/*-------------------------------------------------------------------------------------*/