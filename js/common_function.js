/*-------------------Start Master Value ADD Function---------------------------*/
 function masterValuePost()
   {
	 //alert('data');
     if($('#masterValueName').val()=='')
       {
	     alert('Please Select Master Value');
		 return false;
       }else
    	   	var data=$('#form').serialize();
     		$.ajax({ 
     				type:'post',
     				data:{data:data},
     				url:"Master/masterValuePost",
					})
					.done(function(result){	
					var identity=result.split('%&%',1); //alert(identity);
					  if(result)
					  {	
						if(identity!=='add')
						{
						 alert('Master Value Add ');
					   }
					  else
					   {
						  alert('Master Value Update Successfully');
					   }
					$('#masterValueName').val('');
					$('#masterValueID').val('');
					$('#val').html(result);
				  }
			   });
    }
/*---------------------------End Master Value ADD Function------------------------*/

/*--------------------Master Entry Dropdown List Function Section-----------------*/   
  function masterEntryList(id)
    { 	//alert(id);
	  $.ajax({
			  url:"Master/MasterValueGet",
			  type:"post",
			  data:{value:id},
		    })
		  .done(function(result){ //alert(result);
		   $('#val').html(result);
		   $('#masterEntry').val(val);
		   $('#masterValueID').val('');
		   $('#masterValueName').val('');
		   $('#masterEntryID').val(id);
		   $('#editInput_Show').show();
	    });
    }		
/*----------------------End Master Dropdown List Section---------------------------*/ 
 
/*-----------------Star Master Value Edit And Update Function----------------------*/
function ValueEdit(id)
   { //alert(id);
     $.ajax({ 			  
	          url:"Master/masterValueUpdate",
              type:"post",
	          data:{value:id},
		  })
			.done(function(result){ //alert('result');
		     $('#masterValueName').val(result);
			 $('#masterValueID').val(id);
			 //$('#div').show();
			 $('#masterValueName').focus();
			 $('.message_hide').hide();
	 });
    }

/*-----------------------End Master Value Edit And Upadte Function---------------------*/

/*------------------------Start Master Value  Add button Function----------------------*/
  /*function masterValueAddValue()
  {
	 $('#masterValueName').val('');
	 $('#masterValueID').val('');
	 $('#message').show();
  }*/
/*-------------------------End Master Add Value ADD function---------------------------*/

/*--------------------Master Value Delete Function-------------------------------------*/
  function masterValueDelete(id)
  { //alert(id)
     if (confirm("Are yor sure you want to delete master Value ?"))
	 {
        $.ajax({
            url: "Master/masterValueDelete",
            type: 'post',
            data: {id:id},
            success:function(result) { //alert(result); 
			 if(result)
			    {
				 $('#masterEntryID').val('');
				 $('#val').html(result);
                }
            }
        });
      } 
  }
/*------------------End Master Value Delete Function-----------------------------------*/
  
  /*-------------------------START FOLLOW UP POST VALUE FUNCTION----------------------*/
    function followup()
 	{  
    	//followupValidation();   	
    	var followupID='';
        var contact = [];
    	$('.contact').each(function(){
    		if($(this).is(":checked"))
    			{
    			  contact.push($(this).val());
    			}
    	 	});
    	 	contact = contact.toString();
    	 	if($('#followupID').val()!=='')
    	 	  {
    	 		followupID=$('#followupID').val();
    		 
    	 	  }
    	// alert(followupID);return false;
    	/*for (var i=0, n=checkboxes.length;i<n;i++) 
    	{
    	    if (checkboxes[i].checked) 
    	    {
    	    	contact += ","+checkboxes[i].value;
    	    }
    	}alert(contact);//return false;*/
	    	 var status = $('.status:checked').val();
	    	 var nextfollowupDate = $('#nextfollowupDate').val();
	    	 var followupDate = $('#followupDate').val();
	    	 var time = $('#time').val();
	    	 var response = $('#response').val();
	    	 var CandidateID = $('#CandidateID').val();
 		     $.ajax({
 			          type :"post",
			           url :"Master/followupPost",
			          data :{
			        	  	  followupID:followupID,
			        	      CandidateID:CandidateID,
			        	      contact:contact,
			        	  	  status:status,
				        	  nextfollowupDate:nextfollowupDate,
				        	  followupDate:followupDate,
				        	  time:time,
				        	  response:response,
			          	    }
 		     		 })
			          .done(function(result){//alert(result);return false;
			        	  if(result)
			        	    { 
			        	      if(result!=='add')
			        		   {
				        	   	  alert('Candidate followup insert Successfully');
			        		    }
			        	   else
			        	   	  {
			        			  //alert('Candidate followup update Successfully');
			        		  }
			        	      $('#calls').attr('checked',false);
			        	      $('#email').attr('checked',false);
				        	  $('#followupDate').val('');
				        	  $('#nextfollowupDate').val('');
				        	  $('#time').val('');
				        	  $('#response').val('');
							  $('#divHide').html(result);
							  $('#followupID').val('');
				    	     // $('#divHide').focus();
				    	     // $('#val').html(result);
			           }
			      }); 
	   }
   /*--------------------------END FOLLOW UP POST VALUE FUNCTION-----------------------*/
    function followupEdit(id)
    { //alert(id);
    	var chk='<input type="checkbox" style="width: 25px; height: 30px;"  class="contact" name="contact[]" value="call"><span style="vertical-align:10px; hight:20px;">Call</span>';
    	$.ajax({ 
    	        type: "post",
    		    url : "Master/followupRenovate",
    		    data:{id:id},
    	     })
    	      .done(function(result){
    	                              var followup=   JSON.parse(result);//alert(followup.userID);
    	                              $('#followupID').val(followup.followupID);//alert(followup.contact);
    	                              var followupString=followup.contact;
    	                              var followupArray = followupString.split(',');//alert(followupArray[0]);
                                        if(followupArray[0]=='call' )
    	                            	  {	
    	                                    $("#calls").prop('checked',true);
    	                                    $("#email").prop('checked',false);
    	                                  }
    									  if(followupArray[0]=='email'|| followupArray[1]=='email')
    	                                  {
      	                                    $("#email").prop('checked',true);
      	                                    $("#calls").prop('checked',false);
    	                                  }
    									  if(followupArray[0]=='call' && followupArray[1]=='email')
    	                                  {
      	                                    $("#email").prop('checked',true);
      	                                    $("#calls").prop('checked',true);
    	                                  }
    								 if(followupArray=='')
    									 {
     	                                    $("#calls").prop('checked',false);
      	                                    $("#email").prop('checked',false);
    									 }
    								  var followupstring=followup.status;
       	                              var followuparray = followupstring.split(',');//alert(followuparray[1]);
                                         
                                       if(followuparray[0]=='Interested')
                                         {
                                    	   $("#Interesteds").prop('checked',true);
                                    	   $("#Notinteresteds").prop('checked',false);
                                  	  	 }
                                       if(followuparray[0]=='Notinterested')
                                    	   {
                                    	     $("#Notinteresteds").prop('checked',true);
                                    	     $("#Interesteds").prop('checked',false);
                                    	   }
                                      $('#followupDate').val(followup.followupDate);
						    	      $('#nextfollowupDate').val(followup.nextfollowupDate);
						    	      $('#time').val(followup.time);
						    	      $('#response').val(followup.response);
						    	      $('.contact').focus();

					 	});
    	}
/*-------------------------------STARA FOLLOW UP DELETE FUNCTION-------------------------*/
    
    function followupDelete(id)
    { //alert(id);
    	if(confirm("Are yor sure you want to delete followup ?"))
    	$.ajax({ 
    	        type: "post",
    		    url : "Master/followupDelete",
    		    data:{id:id},
    	     success:function(result){ //alert(result);//return false;
    	          if(result)
    	        	  {
						  $('#calls').attr('checked',false);
		        	      $('#email').attr('checked',false);
			        	  $('#followupDate').val('');
			        	  $('#nextfollowupDate').val('');
			        	  $('#time').val('');
			        	  $('#response').val('');
    	        	      $('#CandidateID').val('');
    	        	  	  $('#divHide').html(result);
    				   }
    	        }
    	 });
     }
/*----------------------------------END FOLLOW UP DELETE FUNCTION------------------------*/ 
    
/*--------------------------FOLLOWUP JAVA SCRIPT TIME FUNCTION------------------------*/
    
/*-------------------------------END JAVA SCRIPT TIME FUNCTION------------------------*/
