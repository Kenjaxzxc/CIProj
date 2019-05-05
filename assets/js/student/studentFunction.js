$(document).ready(function(){

	$('#loginStudentForm').submit(function(evt){

		evt.preventDefault();

		let loginStudentForm = $(this).serialize();
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
				//loginStudentForm
				data:loginStudentForm,
				//success
				success:function(result){
					//console.log(result);
					// successfully login
					if (result == '1') 
					{
						alert('login success');
						window.location.href  ='http://localhost/CIProj/student/student_page';
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