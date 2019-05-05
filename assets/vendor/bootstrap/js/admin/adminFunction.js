$(document).ready(function(){

	$('#loginAdminForm').submit(function(evt){

		evt.preventDefault();

		let loginAdminForm = $(this).serialize();
		let url = $(this).attr('action');
		let username = $('#username').val();
		let password = $('#password').val();

		if (username == '' && password == '') 
		{
			alert('Input your username & password');
		}
		else if (username == '') 
		{
			alert('Input your username');
		}
		else if (password == '') 
		{
			alert('Input your password');
		}
		else
		{
			$.ajax({
				//url
				url:url,
				//type
				type:'POST',
				//loginAdminForm
				data:loginAdminForm,
				//success
				success:function(result){
					
					// successfully login
					if (result == '1') 
					{
						alert('login success');
						window.location.href  ='http://localhost/CIProj/admin/dashboard';
					}
					else
					{
						alert('invalid username or password');
					}
					//console.log(result);
				},
				//error
				error:function(){
					alert('Something went wrong');
				}
			});
		}
		
	});	
	
});