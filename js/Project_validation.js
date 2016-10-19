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
///
function addrequriment_validation()
   { 
		var jobRole = document.getElementById('jobRole').value;
			if( jobRole== "")
			{ 
			  document.getElementById('jobrole_error').innerHTML ="<h4>please Enter Peoject Job role</h4>"
			  return false;
			}
		var skill = document.getElementByid('skill').checked;//alert(skill);return false;//!this.form.checkbox.checked
			if( skill== "")
			{ 
			  $('#jobrole_error').hide();
			  document.getElementByid('skill_error').innerHTML ="<h4>please Select Skill</h4>"
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
   { //alert('hello');
		var name = document.getElementById('name').value;
			if( name== "")
			{ 
			  document.getElementById('name_error').innerHTML ="<h4>please enter full name</h4>"
			  return false;
			}
		var mobile = document.getElementById('mobile').value;
			if( mobile== "")
			{ 
			  $('#name_error').hide();
			  document.getElementById('mobile_error').innerHTML ="<h4>please enter mobile number</h4>"
			  return false;
			}
		var email = document.getElementById('email').value;
            if(email=="")
		    {
			    $('#mobile_error').hide();
		       document.getElementById('email_error').innerHTML="<h4>please enter Email id</h4>"
			   return false;
		    }
		var lastCompany = document.getElementById('lastCompany').value;
		    if(lastCompany=="")
	     	{ 
			    $('#email_error').hide();
			    document.getElementById('lastCompany_error').innerHTML="<h4>please Enter last company Name</h4>"
				return false;
		    }
		var jobRole = document.getElementById('jobRole').value;
		    if(jobRole=="")
		    {   
			     $('#lastCompany_error').hide();
		        document.getElementById('jobRole_error').innerHTML="<h4>please select Job role</h4>"
				return false;
		    }
		var jobType = document.getElementById('jobType').value;
		    if(jobType=="")
		    { 
			   $('#jobRole_error').hide();
		       document.getElementById('jobType_error').innerHTML="<h4>please select Job Type</h4>"
			   return false;
		    }
		var experience = document.getElementById('experience').value;
		    if(experience=="")
		    {   
			     $('#jobtype_error').hide();
		        document.getElementById('experience_error').innerHTML="<h4>please Enter work experience</h4>"
				return false;
		    }
		var month = document.getElementById('month').value;
		    if(month=="")
		    {   
			     $('#experience_error').hide();
		        document.getElementById('month_error').innerHTML="<h4>please enter work experience</h4>"
				return false;
		    }
		var currentLocation = document.getElementById('currentLocation').value;
		    if(currentLocation=="")
		    {   
			     $('#month_error').hide();
		        document.getElementById('currentLocation_error').innerHTML="<h4>please Enter current location</h4>"
				return false;
		    }
		var curuntSalary = document.getElementById('curuntSalary').value;
		    if(curuntSalary=="")
		    {   
			     $('#currentLocation_error').hide();
		        document.getElementById('maxQualification_error').innerHTML="<h4>please Enter current salary</h4>"
				return false;
		    }
		var salaryExpactation = document.getElementById('salaryExpactation').value;
		    if(salaryExpactation=="")
		    {   
			     $('#curuntSalary_error').hide();
		        document.getElementById('salaryExpactation_error').innerHTML="<h4>please Enter salary expaction</h4>"
				return false;
		    }
		var maxQallification = document.getElementById('maxQallification').value;
		    if(maxQallification=="")
		    {   
			     $('#salaryExpactation_error').hide();
		        document.getElementById('maxQallification_error').innerHTML="<h4>please Select qualification</h4>"
				return false;
		    }
		var DOB = document.getElementById('DOB').value;
		    if(DOB=="")
		    {   
			     $('#maxQallification_error').hide();
		        document.getElementById('DOB_error').innerHTML="<h4>please enter data of birth</h4>"
				return false;
		    }			
	}

/*----------------------------------------------------End Resume Java script Validation-----------------------------------------------*/
	
/*------------------------------------------------Only Mobile Number Insert Validation---------------------------------------------*/
	$(document).ready(function () { 
	$(".Number").keypress(function (e) {
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
/*--------------------------------------------------------------------------------------*/
 function followupValidation()
   { 
	 alert('hello');
	 /*var contact = document.getElementById('contact').value;
	    if(contact=="")
	    {   
	        document.getElementById('contact_error').innerHTML="<h4>please select candidate contact</h4>"
			return false;
	    }
    var email = document.getElementById('email').ckecked;
	    if(email=="")
	    {   
	        document.getElementById('email_error').innerHTML="<h4>please select candidate contact</h4>"
			return false;
	    }
    var Interested = document.getElementById('Interested').value;
	    if(Interested=="")
	    {   
	        document.getElementById('Interested_error').innerHTML="<h4>please select candidate contact</h4>"
			return false;
	    }
	var status = document.getElementById('Notinterested').value;
	    if(Notinterested=="")
	    {   
		     $('#Interested').hide();
	        document.getElementById('Notinterested_error').innerHTML="<h4>please select candidate status</h4>"
			return false;
	    }*/
	var followupDate = document.getElementById('followupDate').value;
	    if(followupDate=="")
	    {   
		     $('#status_error').hide();
	        document.getElementById('followupDate_error').innerHTML="<h4>please Select current date</h4>"
			return false;
	    }
	var nextfollowupDate = document.getElementById('nextfollowupDate').value;
	    if(nextfollowupDate=="")
	    {   
		     $('#followupDate_error').hide();
	        document.getElementById('nextfollowupDate_error').innerHTML="<h4>please enter next follow up data</h4>"
			return false;
	    }
    var time = document.getElementById('time').value;
	    if(time=="")
	    {   
		     $('#nextfollowupDate_error').hide();
	        document.getElementById('time_error').innerHTML="<h4>please enter time</h4>"
			return false;
	    }
    var response = document.getElementById('response').value;
	    if(response=="")
	    {   
		     $('#time_error').hide();
	        document.getElementById('response_error').innerHTML="<h4>please enter candidate response</h4>"
			return false;
	    }
   }