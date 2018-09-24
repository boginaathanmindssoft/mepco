<?php
class Login_model extends CI_Model
{
	function __construct(){
		parent::__construct();
		$this->load->database();
		/*$this->load->library('email','date');
		$this->load->model('email_model');*/
	}

	function checkUser($user_name, $user_password){

		$user_password = base64_decode($user_password);
		$user_password = md5($user_password);
		$where = '(user_name ="'.$user_name.'" and password ="'.$user_password.'")';
		$this->db->select('count(user_id) as authendicate, user_id');
		$this->db->from('tbl_login');
		$this->db->where($where);
		$query = $this->db->get();
		$result = $query->result();
		//echo $this->db->last_query();
		return $result[0];
	}
	function priority_update($table_name, $field_key, $field_value, $key, $value){


		if($this->db->update($table_name, array($field_key => $field_value),array($key => $value))){
			/*echo $this->db->last_query();*/

			return true;
		}
		else
		{
			require false;
		}
	}
	function category_priority_update($table_name, $field_key, $field_value, $key, $value, $category_type){

		if($this->db->update($table_name, array($field_key => $field_value),array($key => $value, 'category_type' => $category_type))){
			//echo $this->db->last_query();

			//UPDATE `tbl_category_master` SET `status` = '0' WHERE `category_id` = '12' AND `category_type` = '2'
			return true;
		}
		else
		{
			require false;
		}
	}
	public function checkProductCategoryName($category_name){
		$where = '(category_name ="'.$category_name.'" and category_type = 2)';
		$this->db->select('count(category_id) as existing_count');
		$this->db->from('tbl_category_master');
		$this->db->where($where);
		$query = $this->db->get();
		$result = $query->row();
		return $result->existing_count;
	}

	public function checkProductCategoryNameWhenUpdate($category_name, $primary_key){
		$where = '(category_name ="'.$category_name.'" and category_type = 2)';
		$this->db->select('count(category_id) as tot_count');
		$this->db->from('tbl_category_master');
		$this->db->where($where);
		$query = $this->db->get();
		$result = $query->row();
		return $result->tot_count;
	}
	public function checkProductCategoryID($category_name){
		$where = '(category_name ="'.$category_name.'" and category_type = 2)';
		$this->db->select('category_id');
		$this->db->from('tbl_category_master');
		$this->db->where($where);
		$query = $this->db->get();
		$result = $query->row();
		return $result->category_id;

	}
	public function checkApplicationCategoryName($category_name){
		$where = '(category_name ="'.$category_name.'" and category_type = 1)';
		$this->db->select('count(category_id) as existing_count');
		$this->db->from('tbl_category_master');
		$this->db->where($where);
		$query = $this->db->get();
		$result = $query->row();
		return $result->existing_count;
	}

	public function checkApplicationCategoryNameWhenUpdate($category_name, $primary_key){
		$where = '(category_name ="'.$category_name.'" and category_type = 1)';
		$this->db->select('count(category_id) as tot_count');
		$this->db->from('tbl_category_master');
		$this->db->where($where);
		$query = $this->db->get();
		$result = $query->row();
		return $result->tot_count;
	}
	public function checkApplicationCategoryID($category_name){
		$where = '(category_name ="'.$category_name.'" and category_type = 1)';
		$this->db->select('category_id');
		$this->db->from('tbl_category_master');
		$this->db->where($where);
		$query = $this->db->get();
		$result = $query->row();
		return $result->category_id;

	}
}
	/* End of file login_model.php */
	/* Location: ./main/application/login_model.php */