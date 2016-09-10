/*-------------------Start Master Value ADD Function---------------------------*/
 function masterValuePost()
  {// alert('data');
   if($('#masterValueName').val()=='')
   {
     alert('Please Insert Master Value');
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
		   $('#masterEntryID').val(id);
		   $('#editInput_Show').show();
	    });
    }		
/*----------------------End Master Dropdown List Section---------------------------*/ 
 
/*-----------------Star Master Value Edit And Update Function----------------------*/
function ValueEdit(id)
   { alert(id);
     $.ajax({ 			  
	          url:"Master/masterUpdate",
              type:"post",
	          data:{value:id},
		  })
			.done(function(result){ alert('result');
		     $('#masterValueName').val(result);
			 $('#masterValueID').val(id);
			 $('#div').show();
			 $('#masterValueName').focus();
			 $('.message_hide').hide();
	 });
    }

/*-----------------------End Master Value Edit And Upadte Function---------------------*/

/*------------------------Start Master Value  Add button Function----------------------*/
  function masterValueAddValue()
  {
	 $('#masterValueName').val('');
	 $('#masterValueID').val('');
	 $('#message').show();
  }
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
            success:function (result) { //alert(result); 
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