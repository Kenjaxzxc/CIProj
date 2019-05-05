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


	$('#addSection').submit(function(evt){

		evt.preventDefault();

		let addSection = $(this).serialize();
		let url = $(this).attr('action');
		let sectionName = $('#sectionName').val();

		if (sectionName == '') 
		{
			alert('Input section name');
		}
		else{

			$.ajax({
				//url
				url:url,
				//type
				type:'POST',
				//loginAdminForm
				data:addSection,
				//success
				success:function(result){

					if (result == '1') 
					{
						alert('Section successfully added');
						let sectionName = $('#sectionName').val('');
					}
					else if (result == '2') 
					{
						alert('Section already exist');
					}
					else
					{
						alert('Something went wrong');
					}
				},

				error:function(result)
				{
					alert('Something went wrong');
				}

			});

		}

	});


	$('#addSubject').submit(function(evt){

		evt.preventDefault();

		let addSubject = $(this).serialize();
		let url = $(this).attr('action');
		let subjectName = $('#subjectName').val();

		if (subjectName == '') 
		{
			alert('Input section name');
		}
		else{

			$.ajax({
				//url
				url:url,
				//type
				type:'POST',
				//loginAdminForm
				data:addSubject,
				//success
				success:function(result){

					if (result == '1') 
					{
						alert('Subject successfully added');
						let subjectName = $('#subjectName').val('');
					}
					else if (result == '2') 
					{
						alert('Subject already exist');
					}
					else
					{
						alert('Something went wrong');
					}
				},

				error:function(result)
				{
					alert('Something went wrong');
				}

			});

		}

	});

	$('#addTeacher').submit(function(evt){

		evt.preventDefault();

		let url = $(this).attr('action');
		let idNo = $('#idNo').val();
		let firstname = $('#firstname').val();
		let lastname = $('#lastname').val();
		let age = $('#age').val();
		let selectedGender = $('.selectedGender option:selected').val();
		let selectedSection = $('.selectedSection option:selected').val();
		let selectedSubject = $('.selectedSubject option:selected').val();

		//console.log(idNo, firstname, lastname, age, selectedGender, selectedSection, selectedSubject);

		if (idNo == '') 
		{
			alert('Input id no');
		}
		else if (firstname == '') 
		{
			alert('Input firstname');
		}
		else if (lastname == '') 
		{
			alert('Input lastname');
		}
		else if (age == '') 
		{
			alert('Input age');
		}
		else if (selectedGender == '') 
		{
			alert('Select gender');
		}
		else if (selectedSection == '') 
		{
			alert('Select section');
		}
		else if (selectedSubject == '') 
		{
			alert('Select subject');
		}

		else{

			$.ajax({
				//url
				url:url,
				//type
				type:'POST',
				//loginAdminForm
				data:{idNo:idNo, firstname:firstname, lastname:lastname, age:age, selectedGender:selectedGender, selectedSection:selectedSection, selectedSubject:selectedSubject},
				//success
				success:function(result){

					if (result == '1') 
					{
						alert('Teacher successfully registered');
						$('#reset').click();
						window.location = 'teacher';
					}
					else if (result == '2') 
					{
						alert('ID no. already exist');
					}
					else
					{
						alert('Something went wrong');
					}
				},

				error:function(result)
				{
					alert('Something went wrong');
				}

			});

		}

	});

	
});