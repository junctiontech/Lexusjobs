/*-----------------Add Project Java script Validation------------------*/
function add_validation()
   { 
		var projectName = document.getElementById('projectName').value;
			if( projectName== "")
			{
			  document.getElementById('projectName_error').innerHTML ="<h4>please Enter peoject Name</h4>"
			  return false;
			}
		var projectType = document.getElementById('projectType').value;
			if( projectType== "")
			{
			  $('#projectName_error').hide();
			  document.getElementById('projectType_error').innerHTML ="<h4>please Enter project Type</h4>"
			  return false;
			}
		var ClientName = document.getElementById('ClientName').value;
            if(ClientName=="")
		    {
			    $('#projectType_error').hide();
		       document.getElementById('ClientName_error').innerHTML="<h4>please Enter Client Name Name</h4>"
			   return false;
		    }
		var partnerName = document.getElementById('partnerName').value;
		    if(partnerName=="")
	     	{ 
			    $('#ClientName_error').hide();
			    document.getElementById('partnerName_error').innerHTML="<h4>please Enter Partner Name</h4>"
				return false;
		    }
		var projectDuration = document.getElementById('projectDuration').value;
		    if(projectDuration=="")
		    {   
			     $('#partnerName_error').hide();
		        document.getElementById('projectDuration_error').innerHTML="<h4>please Enter project Duration Time</h4>"
				return false;
		    }
			var projectStartDate = document.getElementById('projectStartDate').value;
		    if(projectStartDate=="")
		    { 
			   $('#projectDuration_error').hide();
		       document.getElementById('projectStartDate_error').innerHTML="<h4>please Enter Project Start Date</h4>"
			   return false;
		    }
	}
/*--------------------------------------------------------End Java script Function-----------------------------------------------------*/

/*-----------------------------------------------------Add Requriment Java script Validation--------------------------------------------*/
function addrequriment_validation()
   { 
		var jobRole = document.getElementById('jobRole').value;
			if( jobRole== "")
			{
			  document.getElementById('jobrole_error').innerHTML ="<h4>please Enter Peoject Job role</h4>"
			  return false;
			}
		var skill = document.getElementById('skill').value;
			if( skill== "")
			{
			  $('#jobrole_error').hide();
			  document.getElementById('skill_error').innerHTML ="<h4>please Select Skill</h4>"
			  return false;
			}
		var clientName = document.getElementById('clientName').value;
            if(clientName=="")
		    {
			    $('#skill_error').hide();
		       document.getElementById('clientname_error').innerHTML="<h4>please Enter Client Name</h4>"
			   return false;
		    }
		var partnerName = document.getElementById('partnerName').value;
		    if(partnerName=="")
	     	{ 
			    $('#clientname_error').hide();
			    document.getElementById('partnername_error').innerHTML="<h4>please Enter Partner Name</h4>"
				return false;
		    }
		var jobDescription = document.getElementById('jobDescription').value;
		    if(jobDescription=="")
		    {   
			     $('#partnername_error').hide();
		        document.getElementById('jobdescription_error').innerHTML="<h4>please Enter Job Description</h4>"
				return false;
		    }
		var jobType = document.getElementById('jobType').value;
		    if(jobType=="")
		    { 
			   $('#jobdescription_error').hide();
		       document.getElementById('jobtype_error').innerHTML="<h4>please Enter Job Type</h4>"
			   return false;
		    }
		var salary = document.getElementById('salary').value;
		    if(salary=="")
		    {   
			     $('#jobtype_error').hide();
		        document.getElementById('salary_error').innerHTML="<h4>please Enter Salary</h4>"
				return false;
		    }
		var salaryDuration = document.getElementById('salaryDuration').value;
		    if(salaryDuration=="")
		    {   
			     $('#salary_error').hide();
		        document.getElementById('salaryduration_error').innerHTML="<h4>please Enter Salary duraction</h4>"
				return false;
		    }
		var projectLocation = document.getElementById('projectLocation').value;
		    if(projectLocation=="")
		    {   
			     $('#salaryduration_error').hide();
		        document.getElementById('projectlocation_error').innerHTML="<h4>please Enter Project Location</h4>"
				return false;
		    }
		var maxQualification = document.getElementById('maxQualification').value;
		    if(maxQualification=="")
		    {   
			     $('#projectlocation_error').hide();
		        document.getElementById('maxQualification_error').innerHTML="<h4>please Enter Qualification</h4>"
				return false;
		    }
		var Opening = document.getElementById('Opening').value;
		    if(Opening=="")
		    {   
			     $('#maxQualification_error').hide();
		        document.getElementById('jobopening_error').innerHTML="<h4>please Enter Number oF Opening</h4>"
				return false;
		    }
		var experience = document.getElementById('experience').value;
		    if(experience=="")
		    {   
			     $('#jobopening_error').hide();
		        document.getElementById('experience_error').innerHTML="<h4>please Select Experience</h4>"
				return false;
		    }
		var month = document.getElementById('month').value;
		    if(month=="")
		    {   
			     $('#experience_error').hide();
		        document.getElementById('month_error').innerHTML="<h4>please Select Month</h4>"
				return false;
		    }			
	}

/*------------------------------------------------------------------End Java Script Function--------------------------------------*/

/*----------------------------------------------------ADD Resume Java Script Validation---------------------------------------------*/
 function addResume_Validation()
	{   
		/* var emailRegex = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/;
		var name = document.form.name.value; 
		var mobile = document.form.mobile.value;
		var email = document.form.email.value;
		var lastCompany = document.form.lastCompany.value;
		var jobRole = document.form.jobRole.value;
		var jobType = document.form.jobType.value;
		var experience = document.form.experience.value;
		var month = document.form.month.value;
		var ExpactionLocation = document.form.ExpactionLocation.value;
		var curuntSalary = document.form.curuntSalary.value;
		var salaryExpactation = document.form.salaryExpactation.value;
		var maxQallification = document.form.maxQallification.value;
		if( name== "")
			{
               document.form.name.focus();
			   document.getElementById("error_msg").innerHTML = "<h3><i>Please Enter Full Name</i></h3>";
			   return false;
			}
		if( mobile== "")
			{
			  document.form.mobile.focus();
			  document.getElementById('error_msg').innerHTML ="<h3><i>Please Enter Mobile Number</i></h3>";
			  return false;
			}
        if(email=="")
		    { 
			   document.form.email.focus();
			   document.getElementById('error_msg').innerHTML="<h3><i>please Enter Email ID</i></h4>";
			   return false;
		    }
		if(lastCompany=="")
	     	{ 
				document.form.lastCompany.focus();
				document.getElementById('error_msg').innerHTML="<h3><i>please Enter Last Company Name</i></h3>"
				return false;
		    }
		
		if(jobRole=="")
		    {   
			    document.form.jobRole.focus();
		        document.getElementById('error_msg').innerHTML="<h3><i>please Select Job Role</i></h3>"
				return false;
		    }
		if(jobType=="")
		    { 
			  document.form.jobType.focus();
		       document.getElementById('error_msg').innerHTML="<h3><i>please Select Job Type</i></h3>"
			   return false;
		    }
		if(experience=="")
		    {   
			  document.form.experience.focus();
		        document.getElementById('error_msg').innerHTML="<h3><i>please Select Year</i></h3>"
				return false;
		    }
		if(month=="")
		    {  
			  document.form.month.focus();
		        document.getElementById('error_msg').innerHTML="<h3><i>please Select Month</i></h3>"
				return false;
		    }
		if(ExpactionLocation=="")
		    {   
			  document.form.ExpactionLocation.focus();
		        document.getElementById('error_msg').innerHTML="<h3><i>please Enter Expaction Location</i></h3>"
				return false;
		    }
		if(curuntSalary=="")
		    {   
			  document.form.curuntSalary.focus();
		        document.getElementById('error_msg').innerHTML="<h3><i>please Enter Curunt Salary</i></h3>"
				return false;
		    }
		if(salaryExpactation=="")
		    {   
			  document.form.salaryExpactation.focus();
		        document.getElementById('error_msg').innerHTML="<h3><i>please Enter Salary Expactation</i></h3>"
				return false;
		    }
	    if(maxQallification=="")
		    {   
			  document.form.maxQallification.focus();alert('hello');
		        document.getElementById('error_msg').innerHTML="<h3><i>please Select Qualification</i></h3>"
				return false;
		    }
		 else
		  { 
			window.location.assign('Master/resumePost');
		} */
	} 
/*----------------------------------------------------End Resume Java script Validation-----------------------------------------------*/
	
/*------------------------------------------------Only Mobile Number Insert Validation---------------------------------------------*/
	$(document).ready(function () {
	$("#quantity").keypress(function (e) {
     if (e.which != 8 && e.which != 0 && (e.which <48 || e.which > 57)) {
        //display error message
        //$("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
			}
		});
	});

/*--------------------------------------------------------------End Function---------------------------------------------------*/  

$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
    });
});

