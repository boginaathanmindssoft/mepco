<?php
class Careers_model extends CI_Model
{
	function __construct(){
		parent::__construct();
		$this->load->database();
		/*$this->load->library('email','date');
		$this->load->model('email_model');*/
	}

	function get_all_careers_list(){

		$where = '(status = 1)';
		$this->db->select('*');
		$this->db->from('tbl_career');
		$this->db->where($where);
		$this->db->order_by("created_at","desc");
		$query = $this->db->get();
		$result = $query->result();
		/*print_r($result);*/
		return $result;
	}
	function get_job_detail_by_id($job_id){

		$where = '(job_id = '.$job_id.' AND status = 1)';
		$this->db->select('*');
		$this->db->from('tbl_career');
		$this->db->where($where);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
}