$(function() {

	/*
	number of div
	*/
	var divCount = $('#registerform').children().length;


	/*
	current position of fieldset / navigation link
	*/
	var current = 1;
	
	/*
	to avoid problems in IE, focus the first input of the form
	*/
	$('#registerform').children(':first').find(':input:first').focus();	


	/*
	validates errors on all the fieldsets
	records if the Form has errors in $('#formElem').data()
	*/

	function validateDivs()
	{
		var FormErrorslog = false;
		for(var i = 1; i < divCount; i++){
			var error = validateDiv(i);
			if(error == -1)
				FormErrorslog = true;
		}
		$('#registerform').data('errors',FormErrorslog);	
	}
	
/*
	validates one fieldset
	and returns -1 if errors found, or 1 if not
	*/
var ck_name = /^(([A-Za-z0-9])+(\s*[A-Za-z0-9])*){1,80}$/;
var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
var ck_username = /^[A-Za-z0-9_]{1,20}$/;
var ck_password =  /^[A-Za-z0-9!@#?$%^&*()_]{4,20}$/;
var ck_phone = /^[\d+]{6,15}$/;
var ck_country = /^[A-Za-z]{1,30}$/;



	function validateDiv(step)
	{
		if(step == divCount) return;
		
		var error = 1;
		var hasError = false;
		$('#registerform').children(':nth-child('+ parseInt(step) +')').find(':input:not(button)').each(function(){
			
			var $this 		= $(this);
			var currentId = $(this).attr('id');
			var valu= jQuery.trim($this.val());

			var valueLength = jQuery.trim($this.val()).length;
			
		
		if (currentId=='username')
			{
				
				if (!ck_username.test(valu)  || valueLength == '')
				
					{
						hasError = true;
						$("#userw").show();
						
					
					}
					else
					{
						$("#userw").hide();
						

					}
			}
			
		/*else if (currentId=='name' )
			{
				if (!ck_name.test(valu) || valueLength == '')
					{
						hasError = true;
						$("#fnamew").show();
					}
				else
					{
						$("#fnamew").css("display", "none");

					}
						
			}*/
			
		else if (currentId=='email' )
			{
				if (!ck_email.test(valu) || valueLength == '')
					{
						hasError = true;
					
						$("#mailw").show();
						
					}
				else
					{
						
						$("#mailw").css("display", "none");
						
					}
			}
		 else if (currentId=='password' )
			{
				if (!ck_password.test(valu) || $('#confpassword').val() != $('#password').val() || valueLength == '')
					{
						hasError = true;
						
						$("#passw").show();
					}
				else
					{
						$("#passw").css("display", "none");

					}
			}
			
		/*else if (currentId=='tel')
			{
				if (!ck_phone.test(valu) || valueLength == '')
					{
						hasError = true;
					
						$("#phonew").show();
					}
				else
					{
						$("#phonew").css("display", "none");
						
					}
			}*/
				
		});
		if(hasError){
			error = -1;
	
		}
		return error;
	}
	

	/*
	if there are errors don't allow the user to submit
	*/
	
	$('#registerIt').bind('click',function(){
		validateDivs()
		
		if($('#registerform').data('errors'))
		
		{
			alert('Please correct the errors in the Form');
			return false;
		}
		
			
			
	});
});

