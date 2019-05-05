<?php 
	class Teacher extends CI_Controller{


		public function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library('upload');
			$this->load->model('TeacherModel', 'tm');
			$this->load->model('AccountModel', 'am');
			$this->load->model('LogsModel','logs');
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

				header("location: ".base_url('teacher/login')."");

				die();
				
			}
			
		}

		public function index(){
			$this->login();
		}

		public function login()
		{
			
			if ($this->session->has_userdata('account_type')) //check if id is naka set
			{

				if ($this->session->account_type == 'admin/dashboard') 
				{

					header("location: ".base_url('admin')."");
					die();

				}
				elseif ($this->session->account_type == 'student') {

					header("location: ".base_url('student/student_page')."");
					die();
				}
				else
				{
					header("location: ".base_url('teacher/dashboard')."");
				}

			}

			$data['title'] = "Teacher Login";
			$this->load->view('extras/header',$data);
			$this->load->view('loginTeacher');
			$this->load->view('extras/footer');
		}

		public function trylang()
		{
			$data = array(
			    'subject_id' => 1
			);
			redirect("teacher/getSomething?data=".http_build_query($data)."&table=grades&field=subject_id");
			// $this->getSomething() http_build_query($data) . "\n";
		}

		public function getSomething()
		{
			$table = $this->input->post('table');
			$field = $this->input->post('field');
			$data = $this->input->post('data');
			echo json_encode($this->tm->selectQueryBuilder($table,$field,$data));
		}

		public function loginAccount()
		{

			$loginUserData = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password'))
			);

			$loginUSerRes = $this->am->loginUSer($loginUserData);
			if($loginUSerRes->result()[0]->account_type == 'teacher'){
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
					print_r($loginUSerRes->result());
					//invalid
					echo 0;
				}

			}else{
				echo 0;
			}
		}

		public function dashboard()
		{
			$studentCount = $sections = $account_id = $sectionID = null;
			$data = [];
			$this->session_not_isset();//i heck kung wala naka set ang session
			$this->session_isset();// check kung unsa nga user type
			$account_id = $this->session->account_id;

			$studentCount = $this->db->query("SELECT count(*) as count from `students` WHERE `section_id` = (select `section_id` from `teachers` where `account_id` = $account_id)");
			$section = $this->db->query("SELECT `section_name` FROM `sections` WHERE `section_id` = (SELECT `section_id` FROM `teachers` WHERE `account_id` = $account_id)");
			$sectionID = $this->db->query("SELECT `section_id` FROM `teachers` WHERE `account_id` = $account_id");
			$data['title'] = "Teacher Page";
			$data['studentCount'] = $studentCount->result_array()[0]['count'];
			$data['sections'] = $section->result_array()[0]['section_name'];
			$data['sectionID'] = $sectionID->result_array()[0]['section_id'];
 			$this->load->view('extras/header',$data);
			$this->load->view('teacherPage',$data);
			$this->load->view('extras/footer');
		}

		public function teacher_view_student()
		{
			$studentList = $section_id = $builder = $dom = $grade =  null;
			$data = [];
			if(!empty($this->input->get('id'))){
				$this->session_not_isset();//i heck kung wala naka set ang session
				$this->session_isset();// check kung unsa nga user type
				$account_id = $this->session->account_id;
				$section_id = $this->input->get('id');
				$section = $this->db->query("SELECT `section_name` FROM `sections` WHERE `section_id` = (SELECT `section_id` FROM `teachers` WHERE `account_id` = $account_id)");
				$data['sections'] = $section->result_array()[0]['section_name'];
				$studentList = $this->db->query("SELECT * FROM `students` a, `sections` b, `accounts` c, `subjects` d WHERE a.`account_id` = c.`account_id`AND a.`section_id` = b.`section_id` AND a.`subject_id` = d.`subject_id` AND a.`section_id` = $section_id ORDER BY a.`date` DESC")->result_array();
				
				foreach($studentList as $d){
					$grade = $this->tm->getGrade($d['subject_id'],$d['student_id']);
                    $builder =
                    '
                    <tr>
                      <td>
                        <img src="'.base_url()."assets/images/".$d['profile_pic'].'" class="rounded-circle border border-success" width="60px">
                      </td>
                       <td>
                         <p>'.$d['fname']." ".$d['lname'].'</p>
                      </td>
                      <td>
                         <p>'.($d['gender'] == 'f'?'Female':'Male').'</p>
                      </td>
                      <td>
                         <p>'.$d['age'].'</p>
                      </td>
                      <td>
                         <p>'.$d['subject_name'].'</p>
                         <input type="hidden" name="subID" value="'.$d['subject_id'].'">
                         <input type="hidden" name="studID" value="'.$d['student_id'].'">
                         <input type="hidden" name="courseid" value="'.$section_id.'">
                      </td>
                       <td>
                       '.(empty($grade)?
                       	'
                       	<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addgrade" id="addGradeStudent">Add Grade</button>
                         <button type="button" class="btn btn-secondary editinfoStud" data-toggle="modal" data-target="#editinfo">Edit info</button>'
                         :
                         '
                      	<small class="font-weight-bold"> Grade= '.$grade[0]['grade'].' </small><span class="badge badge-'.($grade[0]['grade'] < 3.1?'success">Passed':'danger">Fail').'</span>
                          <br>
                         <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#editgrade" id="editGradeStudent">Edit Grade</button>
                         <button class="btn btn-secondary editinfoStud" data-toggle="modal" data-target="#editinfo">Edit info</button>')
                       .'
                      </td>
                    </tr>
                    ';
                    $dom = $dom."".$builder;
                }
                 
				$data['title'] = "View Student Page";
				$data['studentList'] = $dom;
				$this->load->view('extras/header',$data);
				$this->load->view('teacherViewStudent',$data);
				$this->load->view('extras/footer');
			}
		}

		public function addGrade(){
			if(!empty($this->input->post('grade'))){
				$grade = $this->input->post('grade');
				$studid = $this->input->post('studid');
				$subid = $this->input->post('subid');
				$this->session_not_isset();//i heck kung wala naka set ang session
				$this->session_isset();// check kung unsa nga user type
				if(!is_numeric($grade)){
					echo "Sorry, not in numeric form!";
				} elseif($grade > 5) {
					echo "Must be less than 5!";
				} else {

				$data = array(
					'subject_id'=>$subid,
					'student_id'=>$studid,
					'grade'=>$grade
				);
				$this->tm->addGrade($data);
				echo "success";
				}
			}
		}

		public function editGrade(){
			if(!empty($this->input->post('grade'))){
				$grade = $this->input->post('grade');
				$studid = $this->input->post('studid');
				$this->session_not_isset();//i heck kung wala naka set ang session
				$this->session_isset();// check kung unsa nga user type
				if(!is_numeric($grade)){
					echo "Sorry, not in numeric form!";
				} elseif($grade > 5) {
					echo "Must be less than 5!";
				} else {
				$this->tm->editGrade($studid,$grade);
				echo "success";
				}
			}
		}

		public function editStud(){
			$data = [];
			$this->session_not_isset();//i heck kung wala naka set ang session
			$this->session_isset();// check kung unsa nga user type
			$account_id = $this->session->account_id;
			$sectionID = $this->db->query("SELECT `section_id` FROM `teachers` WHERE `account_id` = $account_id")->result_array()[0]['section_id'];
			if(empty($this->input->post('studid'))){
				redirect("teacher/teacher_view_student?id=".$sectionID);
			}
			$fname = $this->input->post('studfn');
			$studln = $this->input->post('studln');
			$studage = $this->input->post('studage');
	        if(empty($_FILES['studimage']['name'])){
        	  $studentData = array(
					'fname' => $fname,
					'lname' => $studln,
					'age' => $studage
				);

				$studentInsert = $this->tm->updateStudent($studentData);
				if($studentInsert){redirect("teacher/teacher_view_student?id=".$sectionID);}
	        } else {
				$config['upload_path']          = './assets/images';
		        $config['allowed_types']        = 'gif|jpg|png';
		        $config['max_size']             = 1000;
		        $config['max_width']            = 0;
		        $config['max_height']           = 0;
		        $config['encrypt_name'] 		= TRUE;

		        $this->load->library('upload', $config);
		        $this->upload->initialize($config);
		        if ( ! $this->upload->do_upload('studimage'))
		        {
		            echo $this->upload->display_errors();
		        }
		        else
		        {
		            $data = array('upload_data' => $this->upload->data());
		            echo $target_file = $data['upload_data']['file_name'];
		            $studentData = array(
						'fname' => $fname,
						'lname' => $studln,
						'age' => $studage,
						'profile_pic'=>$target_file
					);

				$studentInsert = $this->tm->updateStudent($studentData);
				if($studentInsert){redirect("teacher/teacher_view_student?id=".$sectionID);}
		        }
	        }
		}

		public function changePassword(){
			$data = [];
			$this->session_not_isset();//i heck kung wala naka set ang session
			$this->session_isset();// check kung unsa nga user type 
			$current = $this->input->post('current');
			$newpass = $this->input->post('newpass');
			if(empty($current) || empty($newpass)){
				redirect('teacher/dashboard');
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