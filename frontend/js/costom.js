 if(window.location.hostname=="localhost"){
	var base_url = 'http://localhost/lexusjobs.in/'; 
}

if(window.location.hostname=="192.168.1.151"){
	var base_url = 'http://192.168.1.151/lexusjobs.in/'; 
}

function getdata(value,id){		
	var qualification=value;	
	var x =id;
	$.ajax({	
		type: "POST",		
		data: {data:qualification},		
		async: false,	
		url : base_url+'Home/getCourse',	
	})
		.done(function(data){		
		$('#course'+x).html(data);		
		return true;	
	}); 
	return false;
}

function getspecializationdata(value,id){		
	var specialization=value;
	var x =id; 
	$.ajax({	
		type: "POST",		
		data: {data:specialization},		
		async: false,	
		url : base_url+'Home/getSpecialization',	
	})
		.done(function(data){		
		$('#specialization'+x).html(data);
	
		return true;	
	}); 
	return false;
}

function checkemail(value){		
	var email=value;
	$.ajax({	
		type: "POST",		
		data: {data:email},		
		async: false,	
		url : base_url+'Home/checkemail',	
	})
		.done(function(data){
		var json = JSON.parse(data);
		 if(json['code']=='200'){	
			  $('#matchemail').html('');
			 return true;						 
		 }else{
			 if(json['code']=='300'){			 
				 $('#matchemail').html(json["message"]);
				 return false;
			 }
		 }	
		return true;	
	}); 
	return false;	
}

function Checked_login(value){
	var useremail = document.getElementById("useremail").value;
	var password = document.getElementById("userpassword").value;
//	var submit = document.getElementById("submit").value;
	$.ajax({
				type: "POST",
				data: {useremail:useremail,password:password},
				async: false,
				url : base_url+'Userlogin/checklogin',				
			})	
				
		.done(function(msg){	 
		
					if(msg==true){					
					//	alert(msg);					
						window.location = (base_url+'Userlogin/Dashboard');					
					 					
						return true;	
					}else{						
					//	alert(msg);	
						//	var mass=msg;//alert(msg);					
						$( ".error" ).text(msg);					
						$('.error').fadeIn().delay(3000).fadeOut();						
						return false;		
					}				
	}); 
	return false;
}

function Match_otp(){
	var otp = document.getElementById("otp").value; //alert(value);
	 var big=false;
	$.ajax({	
		type: "POST",		
		data: {data:otp},		
		async: false,	
		url : base_url+'Userlogin/checkopt',	
	})
		.done(function(data){//alert(data);
		var json = JSON.parse(data);
		 if(json['code']=='200'){	
			  $('#matchopt').html('');
			big = true;					 
		 }else{
			 if(json['code']=='300'){			 
				 $('#matchopt').html(json["message"]);
			big= false;
			 }
		 }	
	 
	}); 
	return big;
}
