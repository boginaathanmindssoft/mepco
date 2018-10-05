<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->helper(['form', 'url', 'security']);
		$this->load->library('grocery_CRUD');
		$this->load->library('image_CRUD');
		$this->load->model('login_model');
	}
	public function validate_logged_in_users()
	{
		try{

			$sess_id = isset($_SESSION['sessionUserLoggedIn'])?$_SESSION['sessionUserLoggedIn']:0;
			if($sess_id == 1){
				return true;
			}
			else
			{
				$redirect = site_url('admin/logout');
				/*header("location:".$redirect);*/
				echo '<script type="text/javascript">
				window.location="'.$redirect.'";
				</script>';
				exit;
			}
		}
		catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function _template_method_1($output = null, $template_file)
	{
		$this->load->view($template_file, (array)$output);
	}

	public function _template_method_2($output = null)
	{
		$this->validate_logged_in_users();
		$user_data = $this->session->userdata('userData');
		$output->logged_user_id = $user_data["user_id"];
		$output->logged_user_name = ucfirst($this->get_logged_user_details(
		$user_data["user_id"]));
		$this->load->view('layout.php',(array)$output);
	}

	public function _template_method_4($output = null)
	{
		$this->validate_logged_in_users();
		$user_data = $this->session->userdata('userData');
		$output->logged_user_id = $user_data["user_id"];
		$output->logged_user_name = ucfirst($this->get_logged_user_details(
		$user_data["user_id"]));
			//exit;
		$output->controller = $this;
		$this->load->view('gallery_layout.php',(array)$output);
	}

	public function _template_method_3($output = null, $template_file)
	{
		$this->validate_logged_in_users();
		$user_data = $this->session->userdata('userData');
		$output->logged_user_id = $user_data["user_id"];
		$output->logged_user_name = ucfirst($this->get_logged_user_details(
			$user_data["user_id"]));
		$this->load->view($template_file, (array)$output);
	}

	public function index()
	{
		if($this->session->userdata('userData')){
			$user_data = $this->session->userdata('userData');
			if($_SESSION['sessionUserLoggedIn'] == 1){
				$redirect = site_url('admin/dashboard');
				/*header("location:".$redirect);*/
				echo '<script type="text/javascript">
				window.location="'.$redirect.'";
				</script>';
				exit;
			}
			else
			{
				$redirect = site_url('admin');
				/*header("location:".$redirect);*/
				echo '<script type="text/javascript">
				window.location="'.$redirect.'";
				</script>';
				exit;
			}
		}
		$this->_template_method_1((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()), 'admin/login.php');
	}
	public function logout()
	{
		if(isset($_SESSION['sessionUserData']['loggedIn']) == true){
			unset($_SESSION['sessionUserData']);
			unset($_SESSION["__ci_last_regenerate"]);
			unset($_SESSION["sessionUserLoggedIn"]);
			$this->session->unset_userdata('loggedIn');
			$this->session->unset_userdata('userData');
			$this->session->sess_destroy();
			/*session_destroy();*/
		}
		$redirect = site_url('admin');
		/*header("location:".$redirect);*/
		echo '<script type="text/javascript">
				window.location="'.$redirect.'";
				</script>';
				exit;
	}

	public function checkLogin()
	{
		$user_name = $this->input->post('access_key');
		$user_password = $this->input->post('access_value');
		$result = $this->login_model->checkUser($user_name, $user_password);
		if($result->authendicate == 1) {
			$session_data = array(
				'user_id'  =>  $result->user_id,
				'loggedIn' => TRUE
			);

			$_SESSION['sessionUserLoggedIn'] = TRUE;
			$_SESSION['sessionUserData'] = $session_data;


			$this->session->set_userdata('userLoggedIn', TRUE);
			$this->session->set_userdata('userData', $session_data);
			$response["authendicate"] = "success";
			$response["redirect"] = "admin/dashboard";
			echo json_encode($response);
			//header('Access-Control-Allow-Origin: *');
		}
		else{
			$error["authendicate"] = "error";
			echo json_encode($error);
			//header('Access-Control-Allow-Origin: *');
		}
	}
	public function dashboard() {
		$user_data = $this->session->userdata('userData');
		$this->_template_method_3((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()), 'admin/dashboard.php');
	}
	public function profile() {
		$crud = new grocery_CRUD();
		$crud->set_theme('mepco');
		$crud->custom_state_code = 21;
		$crud->set_subject('Profile');
		$crud->set_table('tbl_login');
		$crud->display_as('password','Change password');
		$crud->field_type('user_name','readonly');
		$crud->unset_columns('user_name');
		$crud->required_fields('password');
		$crud->unset_list();
		$crud->unset_add();

		$crud->set_rules('password', 'Password', 'required|min_length[8]|max_length[20]|alpha_numeric');

		$crud->callback_before_update(array($this,'encrypt_password_callback'));
		$crud->callback_field('password',array($this,'field_callback_1'));
		$output = $crud->render();
		$this->_template_method_2($output);
	}
	public function encrypt_password_callback($post_array, $primary_key) {
		$this->load->library('encrypt');
		if(!empty($post_array['password']))
		{
			$post_array['password'] = md5($post_array['password']);
		}
		else
		{
			unset($post_array['password']);
			echo json_encode(array(
				'success' => false,
				'error_message' => "Required !",
			));
			return false;
		}
		return $post_array;
	}
	public function field_callback_1($value = '', $primary_key = null)
	{
		return '<input id="field-password" class="form-control" name="password" type="text" value="" maxlength="200">';
	}

	public function category()
	{
		try{

			$crud = new grocery_CRUD();
			$crud->set_theme('mepco');
			$crud->set_table('tbl_category_master');
			$default = '';
			$status_default = null;
			if(isset($this->uri->segments[3]) && $this->uri->segments[3] == "application"){
				$category_type = 1;
				$crud->where('category_type', $category_type);
				if(isset($this->uri->segments[4]) && $this->uri->segments[4] == "add"){
					$default = 1;
					$status_default = 1;
				}
			}
			else if(isset($this->uri->segments[3]) && $this->uri->segments[3] == "product"){
				$category_type = 2;
				$crud->where('category_type', $category_type);
				if(isset($this->uri->segments[4]) && $this->uri->segments[4] == "add"){
					$default = 2;
					$status_default = 1;
				}
			}
			$crud->order_by('priority','asc');

			$crud->set_subject('Category');
			$crud->required_fields(array('category_type', 'category_name', 'status'));
			$crud->set_rules('category_description','Description ','trim|max_length[250]');

			$crud->columns('category_name','category_description','category_image','category_type');
			$crud->display_as('category_image','Image');
			$crud->display_as('category_description','Description');

			if($category_type == 1){
			$crud->callback_before_insert(array($this,'application_categoryname_check_before_insert'));
			$crud->callback_before_update(array($this,'application_categoryname_check_before_update'));

			}
			else{
			$crud->callback_before_insert(array($this,'categoryname_check_before_insert'));
			$crud->callback_before_update(array($this,'categoryname_check_before_update'));

			}




			$crud->fields('category_name','category_image','category_description','category_type','priority', 'status');

			$crud->callback_column('category_description',array($this,'_callback_description'));

			$crud->callback_column('category_name',array($this,'_callback_title'));




			$crud->callback_before_delete(array($this,'check_transactions_before_delete'));

			$crud->callback_add_field('priority', function () {
				$last_priority = $this->getLastPriorityCategoryType('tbl_category_master');
				$last_priority += 1;
				return '<input type="text" value="'.$last_priority.'" name="priority">';
			});

			$crud->callback_add_field('category_name', function () {
				return '<input id="field-category_name" class="form-control" name="category_name" value="" maxlength="100" type="text">';
			});
			$crud->callback_edit_field('category_name', function ($value, $primary_key) {
				return '<input id="field-category_name" class="form-control" name="category_name" maxlength="100" value="'.$value.'" type="text">';
			});

			$crud->set_field_upload('category_image','assets/uploads/files', 'jpeg|jpg|png| gif');

			$crud->unset_fields('created');

			$crud->unset_texteditor('category_description','full_text');
		    $crud->field_type('category_type','dropdown', array(1 => "Application", 2 => 'Product'), $default);
		    $crud->field_type('status','dropdown', array(1 => "Active", 2 => 'Disable'), $status_default);
			$output = $crud->render();
			$this->_template_method_2($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}

	}

	public function categoryname_check_before_insert($post_array) {
		if(isset($post_array['category_name']))
		{
			$category_name = $post_array['category_name'];
			$get_existing_count = $this->login_model->checkProductCategoryName($category_name);
			if($get_existing_count >= 1){
				echo json_encode(
					array(
						"io_error" => "Category Name Already Exists."
						)
				);
				exit;
			}
		}
	}
	public function categoryname_check_before_update($post_array, $primary_key) {
		if(isset($post_array['category_name']))
		{
			$category_name = $post_array['category_name'];
			$category_count = $this->login_model->checkProductCategoryNameWhenUpdate($category_name, $primary_key);

			if($category_count >= 1){
				$check_category_id = $this->login_model->checkProductCategoryID($category_name);
				if($check_category_id == $primary_key)
				{
					return True;
				}
				else
				{
					echo json_encode(
					array(
						"io_error" => "Category Name Already Exists."
						)
					);
					exit;

				}
			}else if($category_count == 0){
				return true;
			}
			else{
				echo json_encode(
					array(
						"io_error" => "Category Name Already Exists."
						)
				);
				exit;

			}
		}
	}
	public function application_categoryname_check_before_insert($post_array) {
		if(isset($post_array['category_name']))
		{
			$category_name = $post_array['category_name'];
			$get_existing_count = $this->login_model->checkApplicationCategoryName($category_name);
			if($get_existing_count >= 1){
				echo json_encode(
					array(
						"io_error" => "Category Name Already Exists."
						)
				);
				exit;
			}
		}
	}
	public function application_categoryname_check_before_update($post_array, $primary_key) {
		if(isset($post_array['category_name']))
		{
			$category_name = $post_array['category_name'];
			$category_count = $this->login_model->checkApplicationCategoryNameWhenUpdate($category_name, $primary_key);

			if($category_count >= 1){
				$check_category_id = $this->login_model->checkApplicationCategoryID($category_name);
				if($check_category_id == $primary_key)
				{
					return True;
				}
				else
				{
					echo json_encode(
					array(
						"io_error" => "Category Name Already Exists."
						)
					);
					exit;

				}
			}else if($category_count == 0){
				return true;
			}
			else{
				echo json_encode(
					array(
						"io_error" => "Category Name Already Exists."
						)
				);
				exit;

			}
		}
	}

	public function _callback_description($value, $row)
	{
		return substr($value, 0, 35);
	}
	public function _callback_title($value, $row)
	{
		return substr($value, 0, 35);
	}

	public function check_transactions_before_delete($primary_key)
	{
		try{

			$where = "t1.category_id = '".$primary_key."'";
			$this->db->select('COUNT(category_id) as transaction_count');
			$this->db->from('tbl_application as t1');
			$this->db->where($where);
			$query = $this->db->get();
			$result_array = $query->row();


			$where2 = "t1.category_id = '".$primary_key."'";
			$this->db->select('COUNT(category_id) as transaction_count');
			$this->db->from('tbl_product as t1');
			$this->db->where($where2);
			$query2 = $this->db->get();
			$result_array2 = $query2->row();

			if($result_array->transaction_count == 0 && $result_array2->transaction_count == 0){
				return true;
			}
			else{

				echo json_encode(
					array(
						'success' => false,
						'error_message' => 'Transaction already Exists.',
						'error_fields' => array(
							'category_id' => 'Transaction already Exists.'
						)
					)
				);
				exit;
			}

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}

	}

	public function gallery()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('mepco');
			$crud->set_table('tbl_gallery');
			$crud->set_subject('Gallery');
			$crud->set_relation('gallery_id',' tbl_gallery_image','gallery_id');
			$crud->required_fields(array('gallery_type', 'gallery_category', 'status'));
			/*$crud->fields('gallery_type','gallery_category','image_url','video_url','gallery_description','status', 'gallery_id');*/


			$crud->fields('gallery_type','gallery_category','video_url','gallery_description','status', 'gallery_id');

			$crud->columns('gallery_category','gallery_description','gallery_type');
			$crud->unset_columns(array('video_url', 'status', 'upload_image', 'gallery_id'));
			$crud->display_as('gallery_type','Type');
			$crud->display_as('gallery_category','Title');
			$crud->display_as('gallery_description','Description');
			$crud->display_as('gallery_id','Upload Image');

			$crud->set_rules('video_url','Video url','trim|valid_url|callback_validate_url');

			$crud->unset_read_fields('gallery_id');
			$crud->unset_texteditor('gallery_description','full_text');

			if(isset($this->uri->segments[3]) && $this->uri->segments[3] == "edit"){
				$default = null;
			}
			else
			{
				$default = 1;
			}
		    $crud->field_type('gallery_type','dropdown', array(1 => "Image", 2 => 'Video'), $default);
		    $crud->field_type('status','dropdown', array(1 => "Active", 2 => 'Disable'), $default);

		    $crud->callback_field('gallery_id',array($this,'typefacture'));

			$crud->callback_before_insert(array($this, 'multiple_image_upload_validate'));

		    $crud->callback_before_update(array($this, 'multiple_image_upload_validate'));

		    $crud->callback_after_update(array($this, 'multiple_image_upload_after_update'));

		    $crud->callback_after_insert(array($this, 'multiple_image_upload_after_update'));

		    $crud->callback_before_delete(array($this,'multiple_image_delete'));

		    /*$crud->callback_after_update(array($this, 'validate_to_clear_value'));*/

		    


		    
			$output = $crud->render();
			$this->_template_method_4($output);
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}

	}
	function validate_url(){
		$pattern = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";
		$video_url = $this->input->post('video_url');
		if(isset($video_url) && !empty($video_url)){
			if (!preg_match($pattern, $video_url))
			{
				$this->form_validation->set_message('validate_url','The Video url field must contain a valid URL.');
				return FALSE;
			}
		}
		else
		{
			$_POST['video_url'] = '';
			return TRUE;
		}
	}

	function validate_to_clear_value($post_array, $primary_key){
		$gallery_type = $post_array['gallery_type'];
		if($gallery_type == 2){
			$this->multiple_image_delete($primary_key);
			return TRUE;
		}		
		else
		{
			$this->db->set('video_url', '');
			$this->db->where('gallery_id', $primary_key);
			if($this->db->update('tbl_gallery')){
				return TRUE;	
			}			
		}
	}
	function showGallery()
	{
		$edit_gallery_id = $this->input->post('g_list');
		$edit_gallery_id = base64_decode($edit_gallery_id);

		$this->db->select('img_url, img_id');
		$this->db->from('tbl_gallery_image');
		$this->db->where('gallery_id', $edit_gallery_id);
		$query = $this->db->get();
		$result_array = $query->result_array();
		$img_url = array();
		$path_url = "assets/uploads/gallery/";
		foreach($result_array as $key => $value){
			$img_url[]= array($path_url.$value['img_url'], $value['img_id']);
		}
		echo json_encode($img_url);
	}
	function deleteSelectedGalleryImage(){
		$edit_gallery_id = $this->input->post('gID');
		$edit_gallery_id = base64_decode($edit_gallery_id);

		$this->db->select('img_url, img_id');
		$this->db->from('tbl_gallery_image');
		$this->db->where('img_id', $edit_gallery_id);
		$query = $this->db->get();
		$result_array = $query->result_array();
		$return = "false";
		foreach($result_array as $key=>$value){
			$file_url = $value["img_url"];
			$file_id = $value["img_id"];
			$path_url = "assets/uploads/gallery/";
			if(file_exists($path_url.$file_url) == true){
				unlink($path_url.$file_url);
			}
			$this->db->where('img_id', $file_id);
			$this->db->delete('tbl_gallery_image');
			$return = "true";
		}
		if($return == "true"){
			echo json_encode(array('success' => true));
			exit;
		}

	}
	function priorityOrder(){

		$dataID = $this->input->post('dataID');
		$dataID = base64_decode($dataID);
		$priority = $this->input->post('priority');
		$caseID = $this->input->post('caseID');
		$order_level = $this->input->post('level');
		$is_update = false;
		$is_update_category = false;

		if($order_level == "up" || $order_level == "down"){

			if($caseID == 5){
				$tbl_name = "tbl_product";
				$where_key_1 = "tran_id";
				$where_key_2 = "priority";
			}
			elseif($caseID == 7){
				$tbl_name = "tbl_application";
				$where_key_1 = "tran_id";
				$where_key_2 = "priority";
			}
			elseif($caseID == 2){
				$tbl_name = "tbl_faq";
				$where_key_1 = "faq_id";
				$where_key_2 = "priority";
			}
			elseif($caseID == 8){
				$tbl_name = "tbl_category_master";
				$where_key_1 = "category_id";
				$where_key_2 = "priority";
				$is_update_category = true;
				$category_type = 2;	// Product
			}
			elseif($caseID == 1){
				$tbl_name = "tbl_category_master";
				$where_key_1 = "category_id";
				$where_key_2 = "priority";
				$is_update_category = true;
				$category_type = 1;	// Product
			}
			$getLastPriority = $this->getLastPriority($tbl_name);

			if($priority > 0){
				if($order_level == "up" && $priority > 1){
					$updated_priority = $priority - 1;
					$is_update = true;
				}
				else if($order_level == "down")
				{
					$check_priority = $priority + 1;
					if($check_priority <= $getLastPriority){
						$updated_priority = $priority + 1;
						$is_update = true;
					}
					else{
						$is_update = false;
					}
				}
				else{
						$is_update = false;
					}

				if($is_update == true && $is_update_category == false){

					$result_2 = $this->login_model->priority_update($tbl_name,
					"priority", $priority, $where_key_2, $updated_priority);

					$result_1 = $this->login_model->priority_update($tbl_name,
					"priority", $updated_priority, $where_key_1, $dataID);

					$response = array('status'=>'success');
					echo json_encode($response);
					exit;
				}
				else if($is_update == true && $is_update_category == true){

					$result_2 = $this->login_model->category_priority_update($tbl_name,
					"priority", $priority, $where_key_2, $updated_priority, $category_type);

					$result_1 = $this->login_model->category_priority_update($tbl_name,
					"priority", $updated_priority, $where_key_1, $dataID, $category_type);

					$response = array('status'=>'success');
					echo json_encode($response);
					exit;
				}
				else
				{
					$response = array('status'=>'success');
					echo json_encode($response);
					exit;
				}


			}
		}
		else
		{
			$response = array('success'=>'false', 'io_error' => 'Invalid Directions.');
				echo json_encode($response);
				exit;
		}

	}
	function getLastPriority($tbl_name, $where = ''){
		$this->db->select('MAX(priority) as last');
		$this->db->from($tbl_name);

		if(!empty($where)){
			$this->db->where($where);
		}

		$query = $this->db->get();
		$result_array = $query->result_array();
		foreach($result_array as $key => $value){
			return $value["last"];
		}
	}
	function getLastPriorityCategoryType($tbl_name){

		if($this->uri->segments[3] == "application"){
			$category_type = 1;
		}
		else
		{
			$category_type = 2;
		}

		$this->db->select('MAX(priority) as last');
		$this->db->from($tbl_name);
		$this->db->where('category_type', $category_type);
		$query = $this->db->get();

		$result_array = $query->result_array();
		foreach($result_array as $key => $value){
			return $value["last"];
		}
	}
	function typefacture($value = '', $primary_key = null)
	{
		return '<input type="file" id="uploadFile" name="uploadFile[]" multiple="">';
	}
	function generate_slug_name_from_title($string)
	{
		$string = str_replace(' ', '-', $string);
		return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
	}
	function multiple_image_delete($primary_key){
		$this->db->select('img_url, img_id');
		$this->db->from('tbl_gallery_image');
		$this->db->where('gallery_id', $primary_key);
		$query = $this->db->get();
		$result_array = $query->result_array();
		foreach($result_array as $key=>$value){
			$file_url = $value["img_url"];
			$file_id = $value["img_id"];
			$path_url = "assets/uploads/gallery/";
			if(file_exists($path_url.$file_url) == true){
				unlink($path_url.$file_url);
			}
			$this->db->where('img_id', $file_id);
			$this->db->delete('tbl_gallery_image');
		}
		return true;
	}
	function multiple_image_upload_validate(){
		try{

			if(isset($_FILES["uploadFile"]) && $_FILES["uploadFile"]["size"] > 0){
			$crud = new grocery_CRUD();
			$crud->set_theme('mepco');
			$extension = array("jpeg","jpg","png","gif");
			$return_data = array();

			$bytes = 1024;
			$KB = 1024;
			$totalBytes = $bytes * $KB;
			$file_size = '';
			foreach($_FILES["uploadFile"]["tmp_name"] as $key=>$tmp_name){
				$temp = $_FILES["uploadFile"]["tmp_name"][$key];
				$name = $_FILES["uploadFile"]["name"][$key];

				$ext = pathinfo($name, PATHINFO_EXTENSION);
				if(in_array($ext, $extension) == false){
					$return_data[] = 'false';
				}
				else if($_FILES["uploadFile"]["size"][$key] > $totalBytes)
				{
					$file_size = 'false';
				}
				else
				{
					$return_data[] = 'true';
				}
			}
			if(in_array('false', $return_data) == true){
				echo json_encode(array('success' => false, 'io_error' => 'Invalid upload file format, allow only jpeg, jpg, png, gif files.'));
					exit;
			}
			else if($file_size == 'false')
			{
				echo json_encode(array('success' => false, 'io_error' => 'File size is larger than the 1 MB..'));
					exit;
			}
		}

		}
        catch(Exception $e)
        {

        }

	}
	function multiple_image_upload_after_update($post_array, $primary_key){
	try{
		if(isset($_FILES["uploadFile"]) && $_FILES["uploadFile"]["size"] > 0){
			$errors = array();
			$uploadedFiles = array();
			$extension = array("jpeg","jpg","png","gif");
			$bytes = 1024;
			$KB = 1024;
			$totalBytes = $bytes * $KB;
			$UploadFolder = "assets/uploads/gallery";
			$insertData = false;
			$data = array();
			foreach($_FILES["uploadFile"]["tmp_name"] as $key=>$tmp_name){
				$temp = $_FILES["uploadFile"]["tmp_name"][$key];
				$name = $_FILES["uploadFile"]["name"][$key];
				$UploadOk = true;
				if($UploadOk == true){

					$prod = rand(100000, 10000000000000);
					$upload_filename=$_FILES["uploadFile"]["name"][$key];
					$upload_filename_exp = explode(".", $upload_filename);
					$upload_file_extension=end($upload_filename_exp);

					$new_file_name = $this->generate_slug_name_from_title($post_array["gallery_category"]);
					$upload_newfilename=$new_file_name."-".$prod.".".$upload_file_extension;
					if(move_uploaded_file($temp,$UploadFolder."/".$upload_newfilename)){

						$insertData = True;
						$data[] = array(
								'gallery_id' => $primary_key,
								'img_url' => $upload_newfilename
							);
					}
				}
			}
			if($insertData == true){
				$this->db->insert_batch('tbl_gallery_image', $data);
			}
		}

		$this->validate_to_clear_value($post_array, $primary_key);

		}
		catch(Exception $e){
		}

	}

	public function news()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('mepco');
			$crud->set_table('tbl_news');
			$crud->order_by('from_date, to_date','desc');

			$crud->set_subject('News');
			$crud->required_fields(array('news_title', 'from_date', 'to_date','status'));
			$crud->fields('news_title','from_date','to_date','news_description','status');

			$crud->set_rules('news_description','News description ','trim|xss_clean|max_length[50000]');

			$crud->unset_fields('created_at');
			$crud->unset_texteditor('news_description','full_text');

			$crud->unset_columns(array('created_at', 'status'));
			$crud->set_rules('to_date','to date','callback_check_dates[from_date]');




			if(isset($this->uri->segments[3]) && $this->uri->segments[3] == "edit"){
				$default = null;
			}
			else
			{
				$default = 1;
			}

		    $crud->field_type('status','dropdown', array(1 => "Active", 2 => 'Disable'), $default);
			$output = $crud->render();
			$this->_template_method_2($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}

	}
	public function check_dates($to_date, $fecha1){
		$from_date = $this->input->post($fecha1);
		if ($to_date >= $from_date)
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_dates', "To-date is less than From-date.");
			return FALSE;
		}

	}
	public function faq()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('mepco');
			$crud->set_table('tbl_faq');
			$crud->set_subject('FAQ');
			$crud->required_fields(array('faq_question','faq_answer', 'status'));
			$crud->fields('priority', 'status', 'faq_question','faq_answer');
			$crud->order_by('priority','asc');

			$crud->set_rules('faq_question','Question','trim|xss_clean|max_length[500]');

			$crud->set_rules('faq_answer','Answer','trim|xss_clean|max_length[1500]');

			$crud->callback_add_field('priority', function () {
				$last_priority = $this->getLastPriority('tbl_faq');
				$last_priority += 1;
				return '<input type="text" value="'.$last_priority.'" name="priority">';
			});


			$crud->callback_add_field('faq_question', function () {
				return '<textarea id="field-faq_question" name="faq_question" class="form-control" maxlength="350"></textarea>';
			});

			$crud->callback_edit_field('faq_question', function ($value, $primary_key) {
				return '<textarea id="field-faq_question" name="faq_question" class="form-control" maxlength="350">'.$value.'</textarea>';
			});

			$crud->callback_add_field('faq_answer', function () {
				return '<textarea id="field-faq_question" name="faq_answer" class="form-control" maxlength="600"></textarea>';
			});

			$crud->callback_edit_field('faq_answer', function ($value, $primary_key) {
				return '<textarea id="field-faq_answer" name="faq_answer" class="form-control" maxlength="600">'.$value.'</textarea>';
			});



			if(isset($this->uri->segments[3]) && $this->uri->segments[3] == "edit"){
				$default = null;
			}
			else
			{
				$default = 1;
			}

			$crud->field_type('status','dropdown', array(1 => "Active", 2 => 'Disable'), $default);
			$crud->unset_texteditor('faq_question','full_text');
			$crud->unset_texteditor('faq_answer','full_text');
			$crud->unset_columns(array('status', 'priority'));
			/*$crud->unset_fields(array('priority'));*/

			$crud->display_as('faq_question','Question');
			$crud->display_as('faq_answer','Answer');

			$output = $crud->render();
			$this->_template_method_2($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}

	}
	public function product_title_check_before_update($post_array, $primary_key){
		$this->db->select('trans_title');
		$this->db->from('tbl_product');
		$this->db->where('tran_id', $primary_key);
		$query = $this->db->get();
		$user_data = $query->row();
	    if($user_data->trans_title != $post_array['trans_title'])
	    {
             echo json_encode(
				array(
					"io_error" => "The Title field must contain a unique value."
					)
			);
			exit;
	    }
	    else
	    {
	       	return true;
	    }
	}
	public function product_title_check_before_insert($post_array){
		$this->db->select('count(trans_title) as tot_count');
		$this->db->from('tbl_product');
		$this->db->where('trans_title', $post_array['trans_title']);
		$query = $this->db->get();
		$user_data = $query->row();
	    if($user_data->tot_count >= 1)
	    {
             echo json_encode(
				array(
					"io_error" => "The Title field must contain a unique value."
					)
			);
			exit;
	    }
	    else
	    {
	       	return true;
	    }
	}
	public function products()
	{
		try{
			$get_category_list = $this->get_category_list(2);
			$crud = new grocery_CRUD();
			$crud->set_theme('mepco');
			$crud->set_table('tbl_product');
			$crud->set_subject('Products');
			$crud->required_fields(array('trans_title', 'category_id','details', 'quick_view_details','status'));
			$crud->set_rules('trans_title', 'Title', 'trim|required');

			$crud->set_rules('quick_view_details','Quick View Details ','trim|xss_clean|max_length[2000]');
			$crud->set_rules('details','Details ','trim|xss_clean|max_length[50000]');

			$crud->callback_before_insert(array($this,'product_title_check_before_insert'));
			$crud->callback_before_update(array($this,'product_title_check_before_update'));


		   $crud->fields('trans_title', 'category_id','image_path','file_url','quick_view_details', 'details', 'status', 'priority');
		   $crud->order_by('priority','asc');

		   $crud->unset_columns(
				array('file_url','quick_view_details', 'details', 'status', 'priority', 'image_path')
			);



			$crud->callback_add_field('priority', function () {
				$last_priority = $this->getLastPriority('tbl_product');
				$last_priority += 1;
				return '<input type="text" value="'.$last_priority.'" name="priority">';
			});

			$crud->display_as('trans_title','Title');
			$crud->display_as('category_id','Category');
			$crud->display_as('details','Details');
			$crud->display_as('quick_view_details','Quick View Details');
			$crud->set_field_upload('image_path','assets/uploads/files');
			$crud->set_field_upload	('file_url','assets/uploads/files');

			$crud->display_as('image_path','Image');
			$crud->display_as('file_url','Upload Document');

		    $crud->field_type('category_id','dropdown', $get_category_list);
		    if(isset($this->uri->segments[3]) && $this->uri->segments[3] == "edit"){
				$default = null;
			}
			else
			{
				$default = 1;
			}

		    $crud->field_type('status','dropdown', array(1 => "Active", 2 => 'Disable'), $default);
			$output = $crud->render();
			$this->_template_method_2($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}

	}

	public function product_grade()
	{
		try{
			$get_product_list = $this->get_product_list(1);
			$crud = new grocery_CRUD();
			$crud->set_theme('mepco');
			$crud->set_table('tbl_product_grade');
			$crud->set_subject('Product Grades');

			$crud->required_fields(array('grade_name','grade_description','product_tran_id', 'grade_color_shade','status'));

			$crud->set_rules('grade_name', 'Title', 'trim|required');
			/*$crud->callback_before_insert(array($this,'application_title_check_before_insert'));
			$crud->callback_before_update(array($this,'application_title_check_before_update'));*/

			$crud->fields('grade_name', 'product_tran_id','grade_color_shade','file_url','grade_description','status');
			$crud->order_by('product_tran_id','desc');

			$crud->display_as('grade_name','Title');
			$crud->display_as('product_tran_id','Product');
			$crud->display_as('grade_description','Details');
			$crud->display_as('grade_color_shade','Color');
			$crud->set_field_upload	('file_url','assets/uploads/files');

			$crud->unset_columns(
				array('file_url','grade_description', 'status', 'file_url')
			);

		/*	$crud->callback_add_field('priority', function () {
				$last_priority = $this->getLastPriority('tbl_application');
				$last_priority += 1;
				return '<input type="text" value="'.$last_priority.'" name="priority">';
			});*/

		    /*$crud->field_type('tran_type','dropdown', array(1 => "Application"), '1');*/

		    $crud->field_type('product_tran_id','dropdown', $get_product_list);

		    if(isset($this->uri->segments[3]) && $this->uri->segments[3] == "edit"){
				$default = null;
			}
			else
			{
				$default = 1;
			}

		    $crud->field_type('status','dropdown', array(1 => "Active", 2 => 'Disable'), $default);

			$output = $crud->render();
			$this->_template_method_2($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}

	}

	public function application_title_check_before_update($post_array, $primary_key){
		$this->db->select('trans_title');
		$this->db->from('tbl_application');
		$this->db->where('tran_id', $primary_key);
		$query = $this->db->get();
		$user_data = $query->row();
	    if($user_data->trans_title != $post_array['trans_title'])
	    {
             echo json_encode(
				array(
					"io_error" => "The Title field must contain a unique value."
					)
			);
			exit;
	    }
	    else
	    {
	       	return true;
	    }
	}
	public function application_title_check_before_insert($post_array){
		$this->db->select('count(trans_title) as tot_count');
		$this->db->from('tbl_application');
		$this->db->where('trans_title', $post_array['trans_title']);
		$query = $this->db->get();
		$user_data = $query->row();
	    if($user_data->tot_count >= 1)
	    {
             echo json_encode(
				array(
					"io_error" => "The Title field must contain a unique value."
					)
			);
			exit;
	    }
	    else
	    {
	       	return true;
	    }
	}

	public function applications()
	{
		try{
			$get_category_list = $this->get_category_list(1);
			$crud = new grocery_CRUD();
			$crud->set_theme('mepco');
			$crud->set_table('tbl_application');
			$crud->set_subject('Applications');

			$crud->required_fields(array('trans_title','category_id','details', 'quick_view_details','status'));

			$crud->set_rules('trans_title', 'Title', 'trim|required');
			$crud->callback_before_insert(array($this,'application_title_check_before_insert'));
			$crud->callback_before_update(array($this,'application_title_check_before_update'));

			$crud->fields('trans_title', 'category_id','image_path','file_url','quick_view_details', 'details', 'status', 'priority');
			$crud->order_by('priority','asc');


			$crud->display_as('trans_title','Title');
			$crud->display_as('category_id','Category');
			$crud->display_as('details','Details');
			$crud->display_as('quick_view_details','Quick View Details');
			$crud->set_field_upload('image_path','assets/uploads/files');
			$crud->set_field_upload	('file_url','assets/uploads/files');

			$crud->unset_columns(
				array('file_url','quick_view_details', 'details', 'status', 'priority', 'tran_type', 'image_path')
			);

			$crud->callback_add_field('priority', function () {
				$last_priority = $this->getLastPriority('tbl_application');
				$last_priority += 1;
				return '<input type="text" value="'.$last_priority.'" name="priority">';
			});

		    $crud->field_type('tran_type','dropdown', array(1 => "Application"), '1');

		    $crud->field_type('category_id','dropdown', $get_category_list);

		    if(isset($this->uri->segments[3]) && $this->uri->segments[3] == "edit"){
				$default = null;
			}
			else
			{
				$default = 1;
			}

		    $crud->field_type('status','dropdown', array(1 => "Active", 2 => 'Disable'), $default);

			$output = $crud->render();
			$this->_template_method_2($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}

	}
	public function career()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('mepco');
			$crud->set_table('tbl_career');
			$crud->set_subject('Career');
			$crud->order_by('created_at desc, job_title asc','desc, asc');

			$crud->required_fields(array('job_title','job_qualification', 'job_experience', 'status'));
			$crud->set_rules('job_description','Job description','trim|xss_clean|max_length[1000]');

			$crud->fields('job_title', 'job_qualification', 'job_experience','job_description', 'status');

			$crud->columns('job_title','job_qualification','job_description','created_at','status');


			if(isset($this->uri->segments[3]) && $this->uri->segments[3] == "edit"){
				$default = null;
			}
			else
			{
				$default = 1;
			}

			$crud->set_rules('job_experience', 'Experience', 'trim|required|numeric');
			$crud->field_type('status','dropdown', array(1 => "Active", 2 => 'Disable'),
				$default);

			$crud->callback_add_field('job_title', function () {
				return '<input id="field-job_title" class="form-control" name="job_title" value="" maxlength="100" type="text">';
			});

			$crud->callback_edit_field('job_title', function ($value, $primary_key) {
				return '<input id="field-job_title" class="form-control" name="job_title" maxlength="100" type="text" value="'.$value.'">';
			});


			$crud->callback_add_field('job_description', function () {
				return '<textarea maxlength="350" id="field-job_description" name="job_description" class="form-control"></textarea>';
			});

			$crud->callback_edit_field('job_description', function ($value, $primary_key) {
				return '<textarea maxlength="350" id="field-job_description" name="job_description" class="form-control">'.$value.'</textarea>';
			});






			$crud->unset_texteditor('job_qualification','full_text');
			$crud->unset_texteditor('job_description','full_text');
			$crud->unset_columns(array('status'));

			$crud->display_as('job_title','Title');
			$crud->display_as('job_qualification','Qualification');
			$crud->display_as('job_experience','Experience');
			$crud->display_as('status','Status');


			$output = $crud->render();
			$this->_template_method_2($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}

	}

	public function category_list(){

		$category_type_1 = $this->get_category_list(1);
		$category_type_2 = $this->get_category_list(2);
		$category_type = array($category_type_1, $category_type_2);
		echo json_encode($category_type);
	}
	public function get_category_list($category_type_id){
		$this->db->select('category_id, category_name');
		$this->db->from('tbl_category_master');
		$this->db->where('category_type', $category_type_id);
		$query = $this->db->get();
		$array = array();
		foreach ($query->result_array() as $key => $value)
		{
        	$category_id = $value['category_id'];
        	$category_name = $value['category_name'];
        	$array[$category_id] = $category_name;
        }
        return $array;
	}

	public function get_product_list($category_type_id){
		$this->db->select('tran_id, trans_title');
		$this->db->from('tbl_product');
		$this->db->where('status', '1');
		$query = $this->db->get();
		$array = array();
		foreach ($query->result_array() as $key => $value)
		{
        	$category_id = $value['tran_id'];
        	$category_name = $value['trans_title'];
        	$array[$category_id] = $category_name;
        }
        return $array;
	}
	public function get_logged_user_details($user_id){
		if(!empty($user_id)){
			$this->db->select('user_name');
			$this->db->from('tbl_login');
			$this->db->where('user_id='.$user_id);
			$query = $this->db->get();
			$result = $query->result_array();
			$user_name = $result[0]['user_name'];
			return $user_name;
		}
		else
		{
			return '';
		}
	}
	public function update_data_status()
	{
		$case = $this->input->post('dataCase');
		if(is_numeric($case)){
			switch($case){
				case 1:
					$tbl_name = "tbl_category_master";
					$key = "category_id";
					$value = $this->input->post('dataKey');
					$field_value = $this->input->post('dataStatus');

					$result = $this->login_model->category_priority_update($tbl_name,
						"status", $field_value, $key, $value, '1');
					$response = array('status'=>'success');
					echo json_encode($response);
					break;
				case 2:
					$tbl_name = "tbl_faq";
					$key = "faq_id";
					$value = $this->input->post('dataKey');
					$field_value = $this->input->post('dataStatus');

					$result = $this->login_model->priority_update($tbl_name,
						"status", $field_value, $key, $value);
					$response = array('status'=>'success');
					echo json_encode($response);
					break;
				case 3:
					$tbl_name = "tbl_gallery";
					$key = "gallery_id";
					$value = $this->input->post('dataKey');
					$field_value = $this->input->post('dataStatus');

					$result = $this->login_model->priority_update($tbl_name,
						"status", $field_value, $key, $value);
					$response = array('status'=>'success');
					echo json_encode($response);
					break;
				case 4:
					$tbl_name = "tbl_news";
					$key = "news_id";
					$value = $this->input->post('dataKey');
					$field_value = $this->input->post('dataStatus');

					$result = $this->login_model->priority_update($tbl_name,
						"status", $field_value, $key, $value);
					$response = array('status'=>'success');
					echo json_encode($response);
					break;
				case 5:
					$tbl_name = "tbl_product";
					$key = "tran_id";
					$value = $this->input->post('dataKey');
					$field_value = $this->input->post('dataStatus');

					$result = $this->login_model->priority_update($tbl_name,
						"status", $field_value, $key, $value);
					$response = array('status'=>'success');
					echo json_encode($response);
					break;
				case 6:
					$tbl_name = "tbl_career";
					$key = "job_id";
					$value = $this->input->post('dataKey');
					$field_value = $this->input->post('dataStatus');

					$result = $this->login_model->priority_update($tbl_name,
						"status", $field_value, $key, $value);
					$response = array('status'=>'success');
					echo json_encode($response);
					break;
				case 7:
					$tbl_name = "tbl_application";
					$key = "tran_id";
					$value = $this->input->post('dataKey');
					$field_value = $this->input->post('dataStatus');

					$result = $this->login_model->priority_update($tbl_name,
						"status", $field_value, $key, $value);
					$response = array('status'=>'success');
					echo json_encode($response);
					break;
				case 8:
					$tbl_name = "tbl_category_master";
					$key = "category_id";
					$value = $this->input->post('dataKey');
					$field_value = $this->input->post('dataStatus');

					$result = $this->login_model->category_priority_update($tbl_name,
						"status", $field_value, $key, $value, '2');
					$response = array('status'=>'success');
					echo json_encode($response);
					break;

			}
		}
	}

/*	public function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_template_method_1($output);
	}


	public function offices_management()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('offices');
			$crud->set_subject('Office');
			$crud->required_fields('city');
			$crud->columns('city','country','phone','addressLine1','postalCode');

			$output = $crud->render();

			$this->_template_method_1($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function employees_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('employees');
			$crud->set_relation('officeCode','offices','city');
			$crud->display_as('officeCode','Office City');
			$crud->set_subject('Employee');

			$crud->required_fields('lastName');

			$crud->set_field_upload('file_url','assets/uploads/files');

			$output = $crud->render();

			$this->_template_method_1($output);
	}

	public function customers_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('customers');
			$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
			$crud->display_as('salesRepEmployeeNumber','from Employeer')
				 ->display_as('customerName','Name')
				 ->display_as('contactLastName','Last Name');
			$crud->set_subject('Customer');
			$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

			$output = $crud->render();

			$this->_template_method_1($output);
	}

	public function orders_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_relation('customerNumber','customers','{contactLastName} {contactFirstName}');
			$crud->display_as('customerNumber','Customer');
			$crud->set_table('orders');
			$crud->set_subject('Order');
			$crud->unset_add();
			$crud->unset_delete();

			$output = $crud->render();

			$this->_template_method_1($output);
	}

	public function products_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('products');
			$crud->set_subject('Product');
			$crud->unset_columns('productDescription');
			$crud->callback_column('buyPrice',array($this,'valueToEuro'));

			$output = $crud->render();

			$this->_template_method_1($output);
	}

	public function valueToEuro($value, $row)
	{
		return $value.' &euro;';
	}

	public function film_management()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('film');
		$crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
		$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
		$crud->unset_columns('special_features','description','actors');

		$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

		$output = $crud->render();

		$this->_template_method_1($output);
	}

	public function film_management_twitter_bootstrap()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');
			$crud->set_table('film');
			$crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
			$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
			$crud->unset_columns('special_features','description','actors');

			$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

			$output = $crud->render();
			$this->_template_method_1($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	function multigrids()
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output1 = $this->offices_management2();

		$output2 = $this->employees_management2();

		$output3 = $this->customers_management2();

		$js_files = $output1->js_files + $output2->js_files + $output3->js_files;
		$css_files = $output1->css_files + $output2->css_files + $output3->css_files;
		$output = "<h1>List 1</h1>".$output1->output."<h1>List 2</h1>".$output2->output."<h1>List 3</h1>".$output3->output;

		$this->_template_method_1((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));
	}

	public function offices_management2()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('offices');
		$crud->set_subject('Office');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_template_method_1($output);
		} else {
			return $output;
		}
	}

	public function employees_management2()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('employees');
		$crud->set_relation('officeCode','offices','city');
		$crud->display_as('officeCode','Office City');
		$crud->set_subject('Employee');

		$crud->required_fields('lastName');

		$crud->set_field_upload('file_url','assets/uploads/files');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_template_method_1($output);
		} else {
			return $output;
		}
	}

	public function customers_management2()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('customers');
		$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
		$crud->display_as('salesRepEmployeeNumber','from Employeer')
			 ->display_as('customerName','Name')
			 ->display_as('contactLastName','Last Name');
		$crud->set_subject('Customer');
		$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_template_method_1($output);
		} else {
			return $output;
		}
	}*/

}
?>