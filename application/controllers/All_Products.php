<?php session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class All_Products extends CI_Controller {

	protected $uploads_folder_path = 'assets/uploads/files/';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(['form', 'url', 'security']);
		$this->load->model('products_model');

	}
	public function index()
	{
		$this->page();
	}
	public function page()
	{
		$this->load->library('pagination');
		$data = array();
		$data["content"] = "product_category_list";
		$data["active_menu"] = "products";

		$data["meta_title"] = "All Products | Mepco - Metal Powder Company";
		$data['news_widget'] = $this->products_model->get_active_news_list();
		$data["img_dir_path"] = $this->uploads_folder_path;

		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";

       $limit_per_page = 9;
       $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
       $total_records = $this->products_model->get_total_products(2);
        if ($total_records > 0)
        {
	        // get current page records
			$data["results"] = $this->products_model->get_current_page_records($limit_per_page, $page*$limit_per_page, 2);
			$config = array();

			$config["base_url"] = base_url('all-products/page');

			$config["total_rows"] = $total_records;

			$config["uri_segment"] = 3;
			$config['use_page_numbers'] = TRUE;
	        $config['per_page'] = $limit_per_page;

	        // custom paging configuration
	        $config['num_links'] = 2;
	        $config['reuse_query_string'] = TRUE;

	        $config['full_tag_open'] = '<ul class="pagination">';
	        $config['full_tag_close'] = '</ul>';

	        $config['first_link'] = '<< ';
	        $config['first_tag_open'] = '<li class="firstlink">';
	        $config['first_tag_close'] = '</li>';


	         $config['last_link'] = ' >>';
	        $config['last_tag_open'] = '<li class="lastlink">';
	        $config['last_tag_close'] = '</li>';


	        $config['next_link'] = 'Next >';
	        $config['next_tag_open'] = '<li class="nextlink">';
	        $config['next_tag_close'] = '</li>';

	        $config['prev_link'] = '< Prev ';
	        $config['prev_tag_open'] = '<li class="prevlink">';
	        $config['prev_tag_close'] = '</li>';

	        $config['cur_tag_open'] = '<li class="curlink"><a href="javascript:void(0);">';
	        $config['cur_tag_close'] = '</a></li>';

	        $config['num_tag_open'] = '<li class="numlink">';
	        $config['num_tag_close'] = '</li>';

	        $this->pagination->initialize($config);
	        $data["links"] = $this->pagination->create_links();
        }
        else
        {
        	$data["results"] = array();
        	$data["links"] = '';
        }

		$this->load->view('pages/site_layout', $data);
	}
}
