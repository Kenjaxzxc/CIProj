<?php 

	class Student extends CI_Controller{

		public function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library('upload');
			$this->load->model('AccountModel', 'am');
			$this->load->model('LogsModel','logs');
			$this->load->model('TeacherModel', 'tm');
		}


		public function session_isset()
		{
			if ($this->session->has_userdata('account_type')) //check if id is naka set
			{

				if ($this->session->account_type == 'admin') 
				{

					header("location: ".base_url('admin/dashboard')."");
					die();

				}
				elseif ($this->session->account_type == 'teacher') {

					header("location: ".base_url('teacher/teacher_page')."");
					die();
				}

			}

		}

		public function session_not_isset()
		{
			if (!$this->session->has_userdata('account_type')) //check if id is not set
			{

				header("location: ".base_url('student/login')."");

				die();
				
			}
			
		}

		public function index(){
			$this->login();
		}

		public function login(){

			if ($this->session->has_userdata('account_type')) //check if id is naka set
			{

				if ($this->session->account_type == 'admin') 
				{

					header("location: ".base_url('admin/dashboard')."");
					die();

				}
				elseif ($this->session->account_type == 'student') {

					header("location: ".base_url('student/student_page')."");
					die();
				}
				else
				{
					header("location: ".base_url('teacher/teacher_page')."");
				}

			}

			$data['title'] = "Student Login";
			$this->load->view('extras/header',$data);
			$this->load->view('loginStudent');
			$this->load->view('extras/footer');
		}

		public function loginAccount()
		{

			$loginUserData = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password'))
			);


			$loginUSerRes = $this->am->loginUSer($loginUserData);
			if($loginUSerRes->result()[0]->account_type == 'student'){
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
			}else{
				echo 0;
			}
		}

		public function student_page(){
			$this->session_not_isset();//i heck kung wala naka set ang session
			$this->session_isset();// check kung unsa nga user type
			$account_id = $this->session->account_id;

			$section = $this->db->query("SELECT `section_name` FROM `sections` WHERE `section_id` = (SELECT `section_id` FROM `students` WHERE `account_id` = $account_id)");
			$grades = $this->db->query("SELECT * FROM `grades` WHERE `student_id` = (SELECT `student_id` FROM `students` WHERE `account_id` = $account_id)");
			$subjectname = $this->db->query("SELECT * FROM `subjects` WHERE `subject_id` = (SELECT `subject_id` FROM `students` WHERE `account_id` = $account_id)");
			
			$data['title'] = "Student Page";
			$data['sectionName'] = (!empty($section->result_array())?$section->result_array()[0]['section_name']:"");
			$data['grade'] = (!empty($grades->result_array())?$grades->result_array()[0]['grade']:"");
			$data['subjectname'] = (!empty($subjectname->result_array())?$subjectname->result_array()[0]['subject_name']:"");

			$this->load->view('extras/header',$data);
			$this->load->view('studentPage',$data);
			$this->load->view('extras/footer');
		}

		public function changePassword(){
			$data = [];
			$this->session_not_isset();//i heck kung wala naka set ang session
			$this->session_isset();// check kung unsa nga user type 
			$current = $this->input->post('current');
			$newpass = $this->input->post('newpass');
			if(empty($current) || empty($newpass)){
				redirect('student/student_page');
			}
			$account_id = $this->session->account_id;
			$curpass = $this->tm->selectQueryBuilder('accounts','password',array('account_id'=>$account_id))[0]['password'];
			if(md5($current) != $curpass){
				echo "
					<script>
					alert('Sorry, Password does not match');
					window.history.back();
					</script>

					";
			} else {
				$changepass = $this->tm->updatePass(array('password'=>md5($newpass)),$account_id);
				if($changepass){
					echo "
					<script>
					alert('Successfully changed!');
					window.history.back();
					</script>

					";
				}
			}
		}

	}

?>