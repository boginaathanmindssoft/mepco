<?php session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Applications extends CI_Controller {

	protected $uploads_folder_path = 'assets/uploads/files/';
	protected $assets_img_path = 'assets/site/img/';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(['form', 'url', 'security']);
		$this->load->model('products_model');

	}

	public function index()
	{
		$redirect_to_all_applications = site_url("all-applications");
		header("location:".$redirect_to_all_applications);
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
	public function generateApplicationsSidebarList()
	{
		$genrate_prodcut_list = array();
		$genrate_category_list = array();
		$application_category_list = $this->products_model->get_product_category_list(1);
		foreach($application_category_list as $category_key => $category){
			$product_arr = array();
			$applications_list = $this->products_model->get_application_list($category->category_id);
			$category_id = $category->category_id;
			$category_name = $category->category_name;
			$category_slug = $this->generateSlugURL($category_name, $category_id);
			$category_url = site_url('applications')."/".$category_slug;
			$category_arr = array(
				"category_id" => $category_id,
				"category_name" => $category_name,
				"category_url" => $category_url
				);
			$genrate_category_list[$category->category_id] = $category_arr;


			if(count($applications_list) > 0){
				foreach($applications_list as $product_key => $product_value){

					$product_slug = $this->generateSlugURL($product_value->trans_title, $product_value->tran_id);

					$application_url = site_url('applications')."/".$category_slug."/".$product_slug;
					$trans_title = $product_value->trans_title;
					$product_arr[] = array(
						"product_id" => $product_value->tran_id,
						"product_short_title" => $this->subStringTheTitle($trans_title, 35),
						"product_title" => $trans_title,
						"application_url" => $application_url,
						);
				}

			}
			$genrate_prodcut_list[$category->category_id] = $product_arr;
		}
		return array($genrate_prodcut_list, $genrate_category_list);
	}
	public function generateApplicationListPageResults($limit_per_page, $page_limit_per_page, $category_id)
	{
		$result_array = array();
		$results = $this->products_model->get_filtered_page_records_application($limit_per_page, $page_limit_per_page, $category_id);

		foreach($results as $key => $value)
		{

			$category_name = $this->products_model->get_category_name($value->category_id);
			$category_slug = $this->generateSlugURL($category_name, $value->category_id);
			$product_slug = $this->generateSlugURL($value->trans_title, $value->tran_id);

			$application_url = site_url('applications')."/".$category_slug."/".$product_slug;

			$trans_title = $this->subStringTheTitle($value->trans_title, 50);

			$result_array[$key] = array(
				'tran_id' => $value->tran_id,
				'trans_title' => $trans_title,
				'category_id' => $value->category_id,
				'application_url' => $application_url,
				'image_path' => $value->image_path,
				);
		}
		return $result_array;
	}

	public function subStringTheDescription($description)
	{
		if(strlen($description) > 200)
		{
			$description = substr($description,0,200);
			$description .= '..';
			return $description;
		}
		else
		{
			return $description;
		}
	}

	public function subStringTheTitle($title, $length)
	{
		if(strlen($title) > $length)
		{
			$title = substr($title,0,$length);
			$title .= '..';
			return $title;
		}
		else
		{
			return $title;
		}
	}


	public function page()
	{
		$this->product_list_page();
	}
	public function application_detail_page()
	{

		$full_slug_name = $this->uri->segment(3);

		$searchBoxTitle = false;
		if($this->input->get('search'))
		{
			$searchBoxTitle = true;
		}
		$product = explode("-", $full_slug_name);
		$product_id = end($product);


		$data = array();


		$data["content"] = "application_details";
		$data["active_menu"] = "applications";


		$data['news_widget'] = $this->products_model->get_active_news_list();
		$data["img_dir_path"] = $this->uploads_folder_path;

		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";


		$result = $this->products_model->get_application_details_by_id($product_id);


		$data["product_name"] =  isset($result->trans_title)?$result->trans_title:'';

		$data["meta_title"] = $data["product_name"]." | Applications | Mepco - Metal Powder Company";

		$data["search_title"] = (isset($searchBoxTitle) && $searchBoxTitle == true)?$data["product_name"]:"";


		$data["category_name"] = isset($result->category_name)?$result->category_name:'';

		$data["product_description"] = isset($result->details)?$result->details:'';

		$category_slug = $this->generateSlugURL($result->category_name, $result->category_id);
		$category_url = site_url('applications')."/".$category_slug;
		$data["category_url"] = $category_url;
		$data["image_path"] = isset($result->image_path)?$result->image_path:'';

		$data["file_path"] = isset($result->file_url)?$result->file_url:'';
		$data["assets_img_path"] = $this->assets_img_path;

		$data["application_category_list"] = $this->generateApplicationsSidebarList();

		$this->load->view('pages/site_layout', $data);

	}
	public function product_list_page()
	{
		$full_slug_name = $this->uri->segment(2);
		$category = explode("-", $full_slug_name);
		$category_id = end($category);

		$this->load->library('pagination');
		$data = array();
		$data["content"] = "application_list";
		$data["active_menu"] = "applications";


		$data['news_widget'] = $this->products_model->get_active_news_list();
		$data["img_dir_path"] = $this->uploads_folder_path;



		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";

       $limit_per_page = 9;
       $page = ($this->uri->segment(4)) ? ($this->uri->segment(4) - 1) : 0;
       $total_records = $this->products_model->get_total_filtered_application($category_id);
       $data["category_name"] = $this->products_model->get_category_name($category_id);
       $data["application_category_list"] = $this->generateApplicationsSidebarList();

       $data["meta_title"] = $data["category_name"]."| Applications | Mepco - Metal Powder Company";

        if ($total_records > 0)
        {
			$data["results"] = $this->generateApplicationListPageResults($limit_per_page, $page*$limit_per_page, $category_id);
			$config = array();

			$config["base_url"] = base_url('applications/').$full_slug_name."/page";
			$config["total_rows"] = $total_records;
			$config["uri_segment"] = 4;
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
