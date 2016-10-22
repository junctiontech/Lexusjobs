/*--------------------START CLIENT VALUE POST FUNCTION---------------------*/	
function clientPost()
	  {				
		clientID = $('#clientID').val();
		var data =$("#form").serialize();
		$.ajax({ 
				type:"post",
			   	url:"Master/clientPost",
				data:data,
				async:false,
			   })
			   .done(function(result){ 
				   						if(result)
			   							{
				   						  if(clientID =="")
				   						    { 
											  $('#message_success').fadeIn('slow', function(){
											  $('#message_success').delay(3000).fadeOut(); })
						                     }
				   						  	else
				   						  		{
							        		   	  $('#message_update').fadeIn('slow', function(){
									        	  $('#message_update').delay(3000).fadeOut(); })
				   						  		}
						   					$('#clientName').val('');
										  	$('#contactPerson').val('');
					   					  	$('#address').val('');
					   					  	$('#contactNumber').val('');
					   					  	$('#emailID').val('');
					   					  	$('#webSite').val('');
								    	    $('#listingDiv').html(result); return false;
			   							}
			   						});return false;
	  }
/*--------------------------END CLIENT POST VALUE PROJECT FUNCTION-------------------*/

/*--------------------------START EDIT VALUE CLIENT FUNCTION-------------------*/
	function clientEditValue(id)
		{ 
			$.ajax({ 
				     type:'post',
				     url:'Master/clientRenovate',
				     data:{id:id},
					async:false,

				   })
				   .done(function(result){ 
				   					  	var clientValue= JSON.parse(result);
				   					  	$('#clientID').val(clientValue.clientID);
				   					  	$('#clientName').val(clientValue.clientName);
				   					  	$('#contactPerson').val(clientValue.contactPerson);
				   					  	$('#address').val(clientValue.address);
				   					  	$('#contactNumber').val(clientValue.contactNumber);
				   					  	$('#emailID').val(clientValue.emailID);
				   					  	$('#webSite').val(clientValue.webSite);
							    	    $('#clientName').focus();
				   					});	
		}
/*---------------------------END EDIT VALUE CLIENT FUNCTION-----------------*/
	
/*-------------------------------START CLIENT DELETE FUNCTION---------------*/
   function clientDelete(id)
	 { 
		if(confirm("Are yor sure you want to delete  project ?"))
			$.ajax({
					type:'post',
					url:'Master/clientDelete',
					data:{id:id},
					success:function(result){  
											$('.message_hide').hide();
											$('#message_error').fadeIn('slow', function(){
											$('#message_error').delay(3000).fadeOut();})
											$('#listingDiv').html(result);return false;
								}
						});
	 }
/*---------------------------------END CLIENT PROJECT FUNCTION---------------*/	
	
	
	
/*-------------------------------------------------------------------------------------*/