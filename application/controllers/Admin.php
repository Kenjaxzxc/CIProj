<?php 
class Admin extends CI_Controller{


	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload');
		$this->load->model('AccountModel', 'am');
		$this->load->model('LogsModel','logs');
		$this->load->model('SectionModel','sm');
		$this->load->model('SubjectModel','subjectm');
		$this->load->model('TeacherModel','tm');
		$this->load->model('StudentModel','studentm');
	}

	public function session_isset()
	{
		if ($this->session->has_userdata('account_type')) //check if id is naka set
		{

			if ($this->session->account_type == 'teacher') 
			{

				header("location: ".base_url('teacher/dashboard')."");
				die();

			}
			elseif ($this->session->account_type == 'student') {

				header("location: ".base_url('student/student_page')."");
				die();
			}

		}

	}

	public function session_not_isset()
	{
		if (!$this->session->has_userdata('account_type')) //check if id is not set
		{

			header("location: ".base_url('admin/login')."");

			die();
			
		}
		
	}

	public function index(){
		$this->login();
	}

	public function login(){

		if ($this->session->has_userdata('account_type')) //check if id is naka set
		{

			if ($this->session->account_type == 'teacher') 
			{

				header("location: ".base_url('teacher')."");
				die();

			}
			elseif ($this->session->account_type == 'student') {

				header("location: ".base_url('student')."");
				die();
			}
			else
			{
				header("location: ".base_url('admin/dashboard')."");
			}

		}

		$data['title'] = "Admin Login";
		$this->load->view('extras/header',$data);
		$this->load->view('loginAdmin');
		$this->load->view('extras/footer');
	}

	public function loginAccount()
	{

		$loginUserData = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
		);


		$loginUSerRes = $this->am->loginUSer($loginUserData);

		foreach ($loginUSerRes->result() as $row) 
		{
			$this->session->account_id = $row->account_id;
			$this->session->username = $row->username;
			$this->session->account_type = $row->account_type;
		}

		if ($this->session->has_userdata('account_id')) 
		{
			$logsData = array(
			'action' => 'Login',
			'account_id' => $this->session->account_id
			);

			$this->logs->userlogs($logsData);

			echo 1;
		}
		else
		{
			//invalid
			echo 0;
		}

	}

	public function logout()
	{
		$logsData = array(
			'action' => 'Logout',
			'account_id' => $this->session->account_id
			);

		$this->logs->userlogs($logsData);

		session_destroy();
		header('location: '.base_url('admin/login').'');
	}
	public function dashboard(){
		
		$this->session_not_isset();//i heck kung wala naka set ang session
		$this->session_isset();// check kung unsa nga user type

		$data['all_sections'] = $this->sm->all_sections();
		$data['all_students'] = $this->studentm->all_students();
		$data['all_teachers'] = $this->tm->all_teachers();
		$data['all_subjects'] = $this->subjectm->all_subjects();

		$data['title'] = "Admin Dashboard";
		$this->load->view('extras/header',$data);
		$this->load->view('admin');
		$this->load->view('extras/footer');
	}

	public function section(){
		$this->session_not_isset();//i heck kung wala naka set ang session
		$this->session_isset();// check kung unsa nga user type

		$data['title'] = "Admin Section";
		$this->load->view('extras/header',$data);
		$this->load->view('section');
		$this->load->view('extras/footer');
	}

	public function addSection()
	{
		$this->session_not_isset();//i heck kung wala naka set ang session
		$this->session_isset();// check kung unsa nga user type

		$sectionName = ucwords($this->input->post('sectionName'));

		$sectionData = array(
			'section_name' => $sectionName
			);

		$checkSectionName = $this->sm->checkSectionName($sectionData);

		if ($checkSectionName->num_rows() > 0) 
		{
			echo 2;
		}
		else
		{
			$addSection = $this->sm->createSection($sectionData);//return last insert id

			if ($addSection == true) 
			{
				$logsData = array(
				'action' => 'Created section',
				'account_id' => $this->session->account_id
				);

				$this->logs->userlogs($logsData);

				echo 1;

			}
			else
			{
				echo 0;
			}

		}

	}

	public function subject(){
		$this->session_not_isset();//i heck kung wala naka set ang session
		$this->session_isset();// check kung unsa nga user type

		$data['title'] = "Admin Subject";
		$this->load->view('extras/header',$data);
		$this->load->view('subject');
		$this->load->view('extras/footer');
	}

	public function addSubject()
	{
		$this->session_not_isset();//i heck kung wala naka set ang session
		$this->session_isset();// check kung unsa nga user type

		$subjectName = ucwords($this->input->post('subjectName'));

		$subjectData = array(
			'subject_name' => $subjectName
			);

		$checkSubjectName = $this->subjectm->checkSubjectName($subjectData);

		if ($checkSubjectName->num_rows() > 0) 
		{
			echo 2;
		}
		else
		{
			$addSubject = $this->subjectm->createSubject($subjectData);//return last insert id

			if ($addSubject == true) 
			{
				$logsData = array(
				'action' => 'Created subject',
				'account_id' => $this->session->account_id
				);

				$this->logs->userlogs($logsData);

				echo 1;

			}
			else
			{
				echo 0;
			}

		}

	}

	public function teacher(){
		$this->session_not_isset();//i heck kung wala naka set ang session
		$this->session_isset();// check kung unsa nga user type
		$current = $this->db->query("SELECT `account_id` FROM `accounts` ORDER by account_id DESC limit 1")->result_array()[0]['account_id'];
		$data['teacher_id'] = date('yd').$current;
		$data['all_sections'] = $this->sm->all_sections();
		$data['all_subjects'] = $this->subjectm->all_subjects();

		$data['title'] = "Admin Teachers";
		$this->load->view('extras/header',$data);
		$this->load->view('teacher');
		$this->load->view('extras/footer');
	}

	public function addTeacher()
	{
		$this->session_not_isset();//i heck kung wala naka set ang session
		$this->session_isset();// check kung unsa nga user type

		$username = $this->input->post('idNo');//accounts table
		$account_type = 'teacher';//account table

		$firstname = $this->input->post('firstname');//teacher table
		$lastname = $this->input->post('lastname');//teacher tabel
		$gender = $this->input->post('selectedGender');//teacher table
		$age = $this->input->post('age');//teacher table
		$section_id = $this->input->post('selectedSection');//teacher table
		$subject_id = $this->input->post('selectedSubject');//subject table insert the teacher id

		// echo $firstname;
		// die();
		$usernameData = array(
			'username' => $username
		);

		$checkUsername = $this->am->checkUsername($usernameData);

		if ($checkUsername->num_rows() > 0) 
		{
			//username already exist
			echo 2;
		}
		else
		{
			$accountData = array(
				'username' => $username,
				'password' => md5($username),
				'account_type' => $account_type
			);

			$accountInsert = $this->am->registerAccount($accountData);//return last id

			if ($accountInsert > 0) 
			{
				$teacherData = array(
					'account_id' => $accountInsert,
					'fname' => $firstname,
					'lname' => $lastname,
					'gender' => $gender,
					'age' => $age,
					'section_id' => $section_id,
					'subject_id' => $subject_id
				);

				$teacherInsert = $this->tm->registerTeacher($teacherData);

				if ($teacherInsert == true) 
				{
					//teacher successfully registered
					$logsData = array(
						'action' => 'Added teacher',
						'account_id' => $this->session->account_id
						);

					$this->logs->userlogs($logsData);

					echo 1;
				}
				else
				{
					echo 0;

				}

			}

		}

	}
	public function student(){
		$this->session_not_isset();//i heck kung wala naka set ang session
		$this->session_isset();// check kung unsa nga user type

		$data['all_sections'] = $this->sm->all_sections();
		$data['all_subjects'] = $this->subjectm->all_subjects();
		$data['title'] = "Admin Student";
		$current = $this->db->query("SELECT `account_id` FROM `accounts` ORDER by account_id DESC limit 1")->result_array()[0]['account_id'];
		$data['student_id'] = date('yd').$current;
		$this->load->view('extras/header',$data);
		$this->load->view('student');
		$this->load->view('extras/footer');
	}

	public function addStudent()
	{
		$this->session_not_isset();//i heck kung wala naka set ang session
		$this->session_isset();// check kung unsa nga user type

		$config['upload_path']          = './assets/images';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['encrypt_name'] 		= TRUE;

        $this->load->library('upload', $config);

        $this->upload->initialize($config);

		$username = $this->input->post('idNo');//accounts table
		$account_type = 'student';//account table

		$firstname = $this->input->post('firstname');//teacher table
		$lastname = $this->input->post('lastname');//teacher tabel
		$gender = $this->input->post('selectedGender');//teacher table
		$age = $this->input->post('age');//teacher table
		$section_id = $this->input->post('selectedSection');//teacher table
		$subject_id = $this->input->post('selectedSubject');//subject table insert the teacher id

		$usernameData = array(
			'username' => $username
		);

		$checkUsername = $this->am->checkUsername($usernameData);

		if ($checkUsername->num_rows() > 0) 
		{
			//username already exist
			?>
				<script type="text/javascript">
					alert('Username already exist');
					window.history.back();
				</script>
			<?php

		}
		else
		{
			$accountData = array(
				'username' => $username,
				'password' => md5($username),
				'account_type' => $account_type
			);

			$accountInsert = $this->am->registerAccount($accountData);//return last id

			if ($accountInsert > 0) 
			{
				if ( ! $this->upload->do_upload('profile_pic'))
		        {
		                echo $this->upload->display_errors();
		        }
		        else
		        {
		            $data = array('upload_data' => $this->upload->data());

		            $target_file = $data['upload_data']['file_name'];


		            $studentData = array(
						'account_id' => $accountInsert,
						'fname' => $firstname,
						'lname' => $lastname,
						'gender' => $gender,
						'age' => $age,
						'section_id' => $section_id,
						'subject_id' => $subject_id,
						'profile_pic' => $target_file
					);

					$studentInsert = $this->studentm->registerStudent($studentData);

					if ($studentInsert == true) 
					{
						//teacher successfully registered
						$logsData = array(
							'action' => 'Added student',
							'account_id' => $this->session->account_id
							);

						$this->logs->userlogs($logsData);
						?>
							<script type="text/javascript">
								alert('Student successfully registered');
								window.location.href  ='http://localhost/CIProj/admin/student';
							</script>
						<?php

					}
					else
					{
						?>
							<script type="text/javascript">
								alert('Something went wrong');
								window.history.back();
							</script>
						<?php

					}

		        }
				

			}

		}

	}

	public function transaction(){
		$this->session_not_isset();//i heck kung wala naka set ang session
		$this->session_isset();// check kung unsa nga user type

		$data['all_logs'] = $this->logs->all_logs();
		$data['all_sections'] = $this->sm->all_sections();
		$data['all_subjects'] = $this->subjectm->all_subjects();

		$data['title'] = "Admin Transaction";
		$this->load->view('extras/header',$data);
		$this->load->view('transaction');
		$this->load->view('extras/footer');
	}

	public function teacher_list(){
		$this->session_not_isset();//i heck kung wala naka set ang session
		$this->session_isset();// check kung unsa nga user type

		$data['all_teachers_section'] = $this->tm->all_teachers_section();

		$data['title'] = "Admin Teacher List";
		$this->load->view('extras/header',$data);
		$this->load->view('tlist');
		$this->load->view('extras/footer');
	}

	public function student_list(){
		$this->session_not_isset();//i heck kung wala naka set ang session
		$this->session_isset();// check kung unsa nga user type

		$data['all_students_section'] = $this->studentm->all_students_section();
		$data['all_sections'] = $this->sm->all_sections();
		$data['all_subjects'] = $this->subjectm->all_subjects();

		$data['title'] = "Admin Student List";
		$this->load->view('extras/header',$data);
		$this->load->view('slist');
		$this->load->view('extras/footer');
	}
}

?>