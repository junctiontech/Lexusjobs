	function projectRequierment()
	  {
		var data = $('#form').serialize();//alert(data);
		$.ajax({
			    type:'post',
			    url:'Master/projectRequiermentPost',
			    data:data,
			   async:false,
			})
			.done(function(result){ 
									$('#jobRole').val('');
								  	$('#skill').val('');
								  	$('#clientName').val('');
								  	$('#partnerName').val('');
								  	$('#jobDescription').val('');
								  	$('#jobType').val('');
								  	$('#salary').val('');
								  	$('#salaryDuration').val('');
								  	$('#projectLocation').val('');
								  	$('#maxQualification').val('');
								  	$('#Opening').val('');
								  	$('#experience').val('');
								  	$('#month').val('');
								  	$('#listingDiv').html(result);return false;
				});return false;
		 }
/*--------------------------END POST VALUE PROJECT FUNCTION-------------------*/

/*--------------------------START EDIT VALUE PROJECT FUNCTION-------------------*/
	function requiermentGetValue(id)
		{ //alert(id);
		     $.ajax({
		    	     type:'post',
		    	     url:'Master/requiermentValue',
		    	     data:{id:id},
		    	   })
		    	   .done(function(result){ //alert(result);
			    	   						var requiermentValue= JSON.parse(result);//alert(requiermentValue.projectID);//alert(requiermentValue);
		    	                            $('#projectRequirementID').val(requiermentValue.projectRequirementID);//alert(requiermentValue.jobRole);
											$('#jobRole').val(requiermentValue.jobRole);
											//$('#skill').val(requiermentValue.skill);
											$('#clientName').val(requiermentValue.clientName);
											$('#partnerName').val(requiermentValue.partnerName);
											$('#jobDescription').val(requiermentValue.jobDescription);
											$('#jobType').val(requiermentValue.jobType);
											$('#salary').val(requiermentValue.salary);
											$('#salaryDuration').val(requiermentValue.salaryDuration);
											$('#projectLocation').val(requiermentValue.projectLocation);
											$('#maxQualification').val(requiermentValue.maxQualification);
											$('#Opening').val(requiermentValue.Opening);
											$('#experience').val(requiermentValue.experience);
											$('#month').val(requiermentValue.month);
											$('#jobRole').focus();
								});
		}
/*---------------------------END EDIT VALUE PROJECT FUUNCTION-----------------*/
	
/*-------------------------------START PROJECT DELETE FUNCTION---------------*/
   function requiermentDelete(id)
	 {  //alert(id);
		if(confirm("Are yor sure you want to delete  project ?"))
			$.ajax({
					type:'post',
					url:'Master/projectRequiermentDelete',
					data:{id:id},
					success:function(result){ 
							                $('#listingDiv').html(result);return false;
  				}
		  })
	 }
/*---------------------------------END DELETE PROJECT FUNCTION---------------*/	
	
	
	
/*-------------------------------------------------------------------------------------*/