<?php session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(['form', 'url', 'security', 'email']);
		$this->load->model('products_model');
	}

	public function index()
	{
		$data = array();
		$data["content"] = "home_page";
		$data["active_menu"] = "home";

		$data["meta_title"] = "Mepco - Metal Powder Company";
		$data['news_widget'] = $this->products_model->get_active_news_list();

		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";

		$this->load->view('pages/site_layout', $data);
	}

	public function about_us()
	{
		$data = array();
		$data["content"] = "about_us";
		$data["active_menu"] = "about-us";

		$data["meta_title"] = "About Us | Mepco - Metal Powder Company";
		$data['news_widget'] = $this->products_model->get_active_news_list();

		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";

		$this->load->view('pages/site_layout', $data);
	}

	public function global_presence()
	{
		$data = array();
		$data["content"] = "global_presence";
		$data["active_menu"] = "global-presence";

		$data["meta_title"] = "Global Presence | Mepco - Metal Powder Company";
		$data['news_widget'] = $this->products_model->get_active_news_list();

		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";

		$this->load->view('pages/site_layout', $data);
	}
	public function global_location()
	{
		$this->load->view('pages/global_location');
	}
	public function contact_us()
	{
		$data = array();
		$data["content"] = "contact_us_page";
		$data["active_menu"] = "contact-us";

		$data["meta_title"] = "Contact Us | Mepco - Metal Powder Company";
		$data['news_widget'] = $this->products_model->get_active_news_list();

		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";

		$this->load->view('pages/site_layout', $data);
	}
	public function contact_location()
	{
		$this->load->view('pages/contact_location');
	}
	public function contact_us_mapview()
	{
		$data = array();
		$data["content"] = "contact_us_mapview";
		$data["active_menu"] = "contact-us";

		$data["meta_title"] = "Map View | Mepco - Metal Powder Company";
		$data['news_widget'] = $this->products_model->get_active_news_list();

		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";

		$this->load->view('pages/site_layout', $data);
	}
	public function feedback(){
		$data = array();

		$feedback_user_name = $this->input->post('feedback_user_name');
		$email = $this->input->post('email');
		$company = $this->input->post('company');
		$good_about_us = $this->input->post('good_about_us');
		$phone = $this->input->post('phone');
		$improve_msg = $this->input->post('improve_msg');
		$suggestions = $this->input->post('suggestions');

		$sendMail = false;
		$data['error'] = '';
		$data['error_1'] = '';
		$data['error_2'] = '';

		if($this->input->post('send-feedbacks') == true){
			$sendMail = true;
			if(empty($email)){
				$sendMail = false;
				$data['error'] =  "* Please fill all required fields.";
			}
			else if(isset($email) && !valid_email($email)){
				$sendMail = false;
				$data['error_1'] =  "* Enter a Valid email.";
			}
			else if(empty($feedback_user_name)){
				$sendMail = false;
				$data['error'] =  "* Please fill all required fields.";
			}
			else if(empty($company)){
				$sendMail = false;
				$data['error'] =  "* Please fill all required fields.";
			}
			else if(empty($phone)){
				$sendMail = false;
				$data['error'] =  "* Please fill all required fields.";
			}
			else if(preg_match("/^[6-9][0-9]{9}$/", $phone) === 0){
				$sendMail = false;
				$data['error_2'] =  "* Enter a valid phone number.";
			}

			else if(empty($good_about_us)){
				$sendMail = false;
				$data['error'] =  "* Please fill all required fields.";
			}
			else if(empty($improve_msg)){
				$sendMail = false;
				$data['error'] =  "* Please fill all required fields.";
			}
			else if(empty($suggestions)){
				$sendMail = false;
				$data['error'] =  "* Please fill all required fields.";
			}
		}
		if($sendMail == true){
			//echo $this->email->print_debugger();
			$data = array();

			$data["email"] = $email;
			$data["company"] = $company;
			$data["good_about_us"] = $good_about_us;
			$data["phone"] = $phone;
			$data["improve_msg"] = $improve_msg;
			$data["suggestions"] = $suggestions;
			$data["feedback_user_name"] = $feedback_user_name;

			$message = $this->load->view("pages/feedback_admin_mail_template", $data,  TRUE);
			$from = FEEDBACK_FROM_MAIL_ID;
			$subject=FEEDBACK_ADMIN_MAIL_SUBJECT;
			$to = FEEDBACK_ADMIN_TO_MAIL_ID;
			$mailSent = $this->sendMail($to, $from, $subject, $message);

			if($mailSent == true){
				$message = FEEDBACK_USER_MAIL_MESSAGE;
				$from = FEEDBACK_FROM_MAIL_ID;
				$subject=FEEDBACK_USER_MAIL_SUBJECT;
				$to = $email;
				$userMailSent = $this->sendMail($to, $from, $subject, $message);
				if($userMailSent == true){
					$redirect = site_url('feedback')."/success";
					$redirection_Script = "<script type='text/javascript'>";
					$redirection_Script .= "window.location ='".$redirect."'";
					echo $redirection_Script .= "</script>";
					exit;
				}
			}
			else
			{
				echo "Cannot Send Email....";
				exit;
			}
		}

		$data["content"] = "feedback_form";
		$data["active_menu"] = "feedback";

		$data["meta_title"] = "Feedback | Mepco - Metal Powder Company";
		$data['news_widget'] = $this->products_model->get_active_news_list();

		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";

		$data["feedback_user_name"] = isset($feedback_user_name)?$feedback_user_name:'';
		$data["email"] = isset($email)?$email:'';
		$data["company"] = isset($company)?$company:'';
		$data["phone"] = isset($phone)?$phone:'';
		$data["good_about_us"] = isset($good_about_us)?$good_about_us:'';
		$data["improve_msg"] = isset($improve_msg)?$improve_msg:'';
		$data["suggestions"] = isset($suggestions)?$suggestions:'';
		$this->load->view('pages/site_layout', $data);
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
      		return true;
      	}
      	else
      	{
      		return false;
      	}
	}

	public function gallery(){

		$data = array();
		$data['show_all_count'] = $this->products_model->show_all_count();

		$data['gallery_list'] = $this->products_model->get_galllery_list();

		$data['gallery_image_list'] = $this->products_model->get_galllery_image_list();

		$data["content"] = "gallery_page";
		$data["active_menu"] = "gallery";

		$data["meta_title"] = "Gallery | Mepco - Metal Powder Company";
		$data['news_widget'] = $this->products_model->get_active_news_list();

		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";

		$this->load->view('pages/site_layout', $data);
	}

	public function search(){
		$return_array = array();
		$search_string = $this->input->get('term');
		$search_string = htmlspecialchars($search_string);
		$search_string = "%".$search_string."%";
		$search_string = $this->db->escape($search_string);
		$searchResult = $this->products_model->get_search_result($search_string);
		foreach ($searchResult as $key => $value) {
			$set_arr = array();

			$category_slug = $this->generateSlugURL($value->category_name, $value->category_id);
			$product_slug = $this->generateSlugURL($value->trans_title, $value->tran_id);

			$set_arr['title'] = $value->trans_title.'<span class="search_category_type"> - '.$value->category_type.'</span>';
			$category_type = strtolower($value->category_type);
			$set_arr['url'] = site_url($category_type)."/".$category_slug."/".$product_slug."?search=true";

			$return_array[] = $set_arr;

		}
		echo json_encode($return_array);
		exit;
	}

	public function generateSlugURL($title, $title_id){
			$slug_name = (isset($title) && !empty($title))?$title:'un-name';
			$slug_name = $slug_name.'-'.$title_id;
			$slug_name = strtolower($slug_name);
			$slug_name = preg_replace("/\W+/", "-", $slug_name);
			$slug_name = preg_replace('/[^A-Za-z0-9\-]/', '', $slug_name);
			$slug_name = trim($slug_name, "-");
			return $slug_name;
	}

	public function vision(){
		$data = array();
		$data['show_all_count'] = $this->products_model->show_all_count();

		$data["content"] = "vision_mission";
		$data["active_menu"] = "";

		$data["meta_title"] = "Vision Mission | Mepco - Metal Powder Company";
		$data['news_widget'] = $this->products_model->get_active_news_list();

		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";

		$this->load->view('pages/site_layout', $data);

	}
	public function faq_page(){
		$data = array();
		$data['show_all_count'] = $this->products_model->show_all_count();

		$data["content"] = "faq_page";
		$data["active_menu"] = "";

		$data["meta_title"] = "Frequently Ask Questions - FAQ | Mepco - Metal Powder Company";
		$data['news_widget'] = $this->products_model->get_active_news_list();

		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";
		$data["faq_list"] = $faq_list = $this->products_model->get_faq_list();

		$this->load->view('pages/site_layout', $data);


	}
	public function speciality_products(){

		$data = array();
		$data['show_all_count'] = $this->products_model->show_all_count();

		$data["content"] = "speciality_products_page";
		$data["active_menu"] = "";

		$data["meta_title"] = "Mepco Speciality Products - FAQ | Mepco - Metal Powder Company";
		$data['news_widget'] = $this->products_model->get_active_news_list();

		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";

		$this->load->view('pages/site_layout', $data);


	}

	public function awards_page(){

		$data = array();
		$data['show_all_count'] = $this->products_model->show_all_count();

		$data["content"] = "awards_certification_page";
		$data["active_menu"] = "";

		$data["meta_title"] = "Mepco Speciality Products - FAQ | Mepco - Metal Powder Company";
		$data['news_widget'] = $this->products_model->get_active_news_list();

		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";

		$this->load->view('pages/site_layout', $data);
	}
	public function award_one(){

		$data = array();
		$data['show_all_count'] = $this->products_model->show_all_count();

		$data["content"] = "award_one_page";
		$data["active_menu"] = "";

		$data["meta_title"] = "Capexil’s Export Merit Award 2014-2015 | Mepco - Metal Powder Company";
		$data['news_widget'] = $this->products_model->get_active_news_list();
		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";

		$this->load->view('pages/site_layout', $data);

	}
	public function award_two(){

		$data = array();
		$data['show_all_count'] = $this->products_model->show_all_count();

		$data["content"] = "award_two_page";
		$data["active_menu"] = "";

		$data["meta_title"] = "Capexil’s Export Merit Award 2014-2015 | Mepco - Metal Powder Company";
		$data['news_widget'] = $this->products_model->get_active_news_list();
		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";

		$this->load->view('pages/site_layout', $data);

	}

	public function award_three(){
		$data = array();
		$data['show_all_count'] = $this->products_model->show_all_count();
		$data["content"] = "award_three_page";
		$data["active_menu"] = "";
		$data["meta_title"] = "Capexil’s Export Merit Award 2009-2010 | Mepco - Metal Powder Company";
		$data['news_widget'] = $this->products_model->get_active_news_list();
		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";

		$this->load->view('pages/site_layout', $data);
	}

	public function award_four(){
		$data = array();
		$data['show_all_count'] = $this->products_model->show_all_count();
		$data["content"] = "award_four_page";
		$data["active_menu"] = "";
		$data["meta_title"] = "Capexil’s Export Merit Award 2001-2002 | Mepco - Metal Powder Company";
		$data['news_widget'] = $this->products_model->get_active_news_list();
		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";
		$this->load->view('pages/site_layout', $data);
	}

	public function share_holder_page(){
		$data = array();
		$data['show_all_count'] = $this->products_model->show_all_count();
		$data["content"] = "share_holder_page";
		$data["active_menu"] = "";
		$data["meta_title"] = "Share Holders | Mepco - Metal Powder Company";
		$data['news_widget'] = $this->products_model->get_active_news_list();
		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";
		$this->load->view('pages/site_layout', $data);
	}

	

	
}
