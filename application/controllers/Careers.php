<?php session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Careers extends CI_Controller {

	protected $uploads_folder_path = 'assets/uploads/files/';
	protected $assets_img_path = 'assets/site/img/';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(['form', 'url', 'security', 'email']);
		$this->load->model(array('careers_model','products_model'));
	}

	public function index()
	{
		$data = array();
		$careers_list = $this->careers_model->get_all_careers_list();
		$result_array = array();
		foreach($careers_list as $key => $value)
		{

			$result_array[$key] = array(
				'job_id' => $value->job_id,
				'job_title' => $value->job_title,
				'job_qualification' => $value->job_qualification,
				'job_experience' => $value->job_experience,
				'job_description' => $value->job_description,
				'job_title_slug' => $this->generateSlugURL($value->job_title)
			);
		}

		$data["careers_list"] = $result_array;
		$data["content"] = "career_list_page";
		$data["active_menu"] = "career";

		$data["meta_title"] = "Career | Mepco - Metal Powder Company";
		$data['news_widget'] = $this->products_model->get_active_news_list();

		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";
		$data["job_mail_id"] = CAREER_CONTACT_ADMIN;


		$this->load->view('pages/site_layout', $data);

	}
	public function job_apply_now()
	{
		$slug_job_title = $this->uri->segment(3);
		$slug_job_id = $this->uri->segment(2);
		$result = $this->careers_model->get_job_detail_by_id($slug_job_id);
		$validate_slug = $this->generateSlugURL($result->job_title);
		if($result->job_id == $slug_job_id && $validate_slug == $slug_job_title){


			$data['form_submission_url'] = site_url('careers/send/').$slug_job_id."/".$slug_job_title;
			$data["careers_form"] = $result;
			$data["content"] = "career_form_page";
			$data["active_menu"] = "career";
			$data["meta_title"] = "Career | Mepco - Metal Powder Company";
			$data['news_widget'] = $this->products_model->get_active_news_list();
			$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";

			$career_name = $this->input->post('career_name');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$message = $this->input->post('message');
			$job_position = $this->input->post('job_position');


			$data['career_name'] = isset($career_name)?$career_name:'';
			$data['email'] = isset($email)?$email:'';
			$data['phone'] = isset($phone)?$phone:'';
			$data['message'] = isset($message)?$message:'';
			$data['job_position'] = isset($job_position)?$job_position:'';


			$this->load->view('pages/site_layout', $data);
		}
		else
		{
			echo "404 Error Page.";
			exit;
		}

	}
	public function submit_apply()
	{
		$slug_job_title = $this->uri->segment(4);
		$slug_job_id = $this->uri->segment(3);
		$result = $this->careers_model->get_job_detail_by_id($slug_job_id);
		$validate_slug = $this->generateSlugURL($result->job_title);
		if($result->job_id == $slug_job_id && $validate_slug == $slug_job_title){

			$data['error'] = "";
			$submit_form = $this->careers_form_sumbit_send_mail();
			if($submit_form == 'success'){

			}
			else
			{
				$data['error'] = $submit_form;

			}

			$career_name = $this->input->post('career_name');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$message = $this->input->post('message');
			$job_position = $this->input->post('job_position');

			$data['career_name'] = isset($career_name)?$career_name:'';
			$data['email'] = isset($email)?$email:'';
			$data['phone'] = isset($phone)?$phone:'';
			$data['message'] = isset($message)?$message:'';
			$data['job_position'] = isset($job_position)?$job_position:'';

			$data['form_submission_url'] = site_url('careers/send/').$slug_job_id."/".$slug_job_title;
			$data["careers_form"] = $result;
			$data["content"] = "career_form_page";
			$data["active_menu"] = "career";
			$data["meta_title"] = "Career | Mepco - Metal Powder Company";
			$data['news_widget'] = $this->products_model->get_active_news_list();
			$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";

			$data["job_mail_id"] = CAREER_CONTACT_ADMIN;

			$this->load->view('pages/site_layout', $data);
		}
		else
		{
			echo "404 Error Page.";
			exit;
		}

	}
	public function careers_form_sumbit_send_mail(){
		$career_name = $this->input->post('career_name');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$user_message = $this->input->post('message');
		$job_position = $this->input->post('job_position');
		$sendMail = true;
		$data = array();

		if(empty($email)){
			$sendMail = false;
			return $data['error'] =  "* Please fill all required fields.";
		}
		else if(isset($email) && !valid_email($email)){
				$sendMail = false;
			return $data['error_1'] =  "* Enter a Valid email.";
		}
		else if(empty($phone)){
			$sendMail = false;
			return $data['error'] =  "* Please fill all required fields.";
		}
		else if(preg_match("/^[6-9][0-9]{9}$/", $phone) === 0){
			$sendMail = false;
			return $data['error_2'] =  "* Enter a valid phone number.";
		}
		else if($_FILES['resume_file']['size'] == 0){
			$sendMail = false;
			return $data['error'] =  "* Please upload your resume.";
		}
		else if($_FILES['resume_file']['size'] > 1048576){
			$sendMail = false;
			return $data['error'] =  "Upload maximum 1MB file.";
		}

		if($sendMail == true){
		$attachmentFile = '';
		if($_FILES['resume_file']['type'] == 'application/pdf' ||
			$_FILES['resume_file']['type'] == 'application/doc' ||
			$_FILES['resume_file']['type'] == 'text/plain'
			)
		{
			$fileName = $_FILES['resume_file']['name'];
			$sendMail = true;
			if(move_uploaded_file($_FILES['resume_file']['tmp_name'], FCPATH.'assets/uploads/resume/'.$fileName)){
				$sendMail = true;
				$attachmentFile = FCPATH.'assets/uploads/resume/'.$fileName;
			}

		}
		else
		{
			$sendMail = false;
			return $data['error'] =  "* Upload file format is invalid, please upload only PDF, DOC files.";
		}

			if($sendMail == true){
				$to = CAREER_CONTACT_ADMIN;
				$from = CAREER_FROM_MAIL_ID;
				$subject = CAREER_ADMIN_MAIL_SUBJECT.ucfirst($job_position);

				$data['career_name'] = $this->input->post('career_name');
				$data['email'] = $this->input->post('email');
				$data['phone'] = $this->input->post('phone');
				$data['user_message'] = $this->input->post('message');
				$data['job_position'] = $this->input->post('job_position');


				$message = $this->load->view("pages/career_admin_mail_template", $data,  TRUE);


			$this->sendMailWithAttachment($to, $from, $subject,
			$message, $attachmentFile, $email);

			/*//var_dump(file_exists($attachmentFile));
				if(file_exists($attachmentFile) == true){
					unlink($attachmentFile);
				}*/
			return 'success';
			}
		}

	}
	public function showSuccessPage(){

		$data["content"] = "career_success_page";
		$data["active_menu"] = "career";
		$data["meta_title"] = "Career | Mepco - Metal Powder Company";
		$data['news_widget'] = $this->products_model->get_active_news_list();
		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";

		$this->load->view('pages/site_layout', $data);
	}
	public function generateSlugURL($title){
		$slug_name = (isset($title) && !empty($title))?$title:'un-name';
		$slug_name = $slug_name;
		$slug_name = strtolower($slug_name);
		$slug_name = preg_replace("/\W+/", "-", $slug_name);
		$slug_name = preg_replace('/[^A-Za-z0-9\-]/', '', $slug_name);
		$slug_name = trim($slug_name, "-");
		return $slug_name;
	}

	public function sendMailWithAttachment($to, $from, $subject,
		$message, $attachmentFile, $reply_user_email){

		$reply_subject = CAREER_USER_MAIL_SUBJECT;
		$reply_from = CAREER_FROM_MAIL_ID;
		$reply_message = CAREER_USER_MAIL_MESSAGE;
		if($this->sendMail($reply_user_email, $reply_from, $reply_subject, $reply_message)){
		$new_config = array(
			'protocol'  => 'smtp',
			'smtp_host' => SMTP_HOST,
			'smtp_port' => SMTP_PORT,
			'smtp_user' => SMTP_USER,
			'smtp_pass' => SMTP_PASSWORD,
			'mailtype'  => 'html',
			'charset'   => 'iso-8859-1',
			'wordwrap' => TRUE
			);
		$this->load->library('email', $new_config);
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("html");
		$this->email->from($from);
      	$this->email->to($to);
      	$this->email->subject($subject);
      	$this->email->message($message);
      	//$attachMentFiles = base_url().'/assets/uploads/files/pdftest.pdf';
      	if(!empty($attachmentFile)){
      		$this->email->attach($attachmentFile);
      	}
      	if($this->email->send()){
      			/*return true;*/
      			$redirect = site_url('careers')."/success";
				$redirection_Script = "<script type='text/javascript'>";
				$redirection_Script .= "window.location ='".$redirect."'";
				echo $redirection_Script .= "</script>";
				exit;
      	}
      	else
      	{
      		return false;
      	}

      }


	}
	public function sendMail($to, $from, $subject, $message){
		$config = array(
			'protocol'  => 'smtp',
			'smtp_host' => SMTP_HOST,
			'smtp_port' => SMTP_PORT,
			'smtp_user' => SMTP_USER,
			'smtp_pass' => SMTP_PASSWORD,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'wordwrap' => TRUE
			);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("html");
		$this->email->from($from);
      	$this->email->to($to);
      	$this->email->subject($subject);
      	$this->email->message($message);
      	if($this->email->send()){
      		unset($this->email);
      		return true;
      	}
      	else
      	{
      		return false;
      	}
	}
}
