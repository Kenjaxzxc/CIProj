$(document).ready(function(){

	$('#loginTeacherForm').submit(function(evt){

		evt.preventDefault();

		let loginTeacherForm = $(this).serialize();
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
				//loginTeacherForm
				data:loginTeacherForm,
				//success
				success:function(result){
					console.log(result);
					
					// successfully login
					if (result == '1') 
					{
						alert('login success');
						window.location.href  ='http://localhost/CIProj/teacher/dashboard';
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

	let subid;
	let studid;
	let courseID;
	$("#addGradeStudent, #editGradeStudent, .editinfoStud").click(function(){
		subid = $(this).parent().prev().find("input[name=subID]").val();
		studid = $(this).parent().prev().find("input[name=studID]").val();
		courseID = $(this).parent().prev().find("input[name=courseid]").val();
	});

	$(".editinfoStud").click(function(){
		let studfn = $("input[name=studfn]");
		let studln = $("input[name=studln]");
		let studage = $("input[name=studage]");
		let studidDOM = $("input[name=studid]");
		$.ajax({
			url: 'http://localhost/CIProj/teacher/getSomething',
			method: "POST",
			data: {"table":"students","field":"*","data":{"student_id":studid}},
			success: function(a){
				console.log(studid);
				let b = JSON.parse(a)[0];
				studidDOM.empty().val(studid);
				studfn.empty().val(b.fname);
				studln.empty().val(b.lname);
				studage.empty().val(b.age);
			}
		});
	});

	$("#editGradeStudent").click(function(){
		let grade = $("input[name=editGrade]");
		$.ajax({
			url: 'http://localhost/CIProj/teacher/getSomething',
			method: "POST",
			data: {"table":"grades","field":"grade","data":{"student_id":studid}},
			success: function(a){
				let b = JSON.parse(a)[0]['grade'];
				grade.empty().val(b);
			}
		});
	});


	$("#addGrade").click(function(){
		let grade = $("input[name=grade]").val();
		if(grade.trim() == ""){
			alert("Please input grade");
		}else{
			$.ajax({
				url: 'http://localhost/CIProj/teacher/addGrade',
				method: "POST",
				data: {"grade":grade,"studid":studid,"subid":subid},
				success: function(a){
					if(a != "success"){
						alert(a);
					} else {
						alert("Successfully added a grade");
						window.location="teacher_view_student?id="+courseID;
					}
				}
			});
		}
	});


	$("#updateGrade").click(function(){
		let grade = $("input[name=editGrade]").val();
		if(grade.trim() == ""){
			alert("Please input grade");
		}else{
			$.ajax({
				url: 'http://localhost/CIProj/teacher/editGrade',
				method: "POST",
				data: {"grade":grade,"studid":studid},
				success: function(a){
					if(a != "success"){
						alert(a);
					} else {
						alert("Successfully edited a grade");
						window.location="teacher_view_student?id="+courseID;
					}
				}
			});
		}
	});

});