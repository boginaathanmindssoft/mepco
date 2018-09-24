<?php session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller {

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
		$redirect_to_all_products = site_url("all-products");
		header("location:".$redirect_to_all_products);
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
	public function generateProductsSidebarList()
	{
		$genrate_prodcut_list = array();
		$genrate_category_list = array();
		$product_category_list = $this->products_model->get_product_category_list(2);
		foreach($product_category_list as $category_key => $category){
			$product_arr = array();
			$products_list = $this->products_model->get_product_list($category->category_id);
			$category_id = $category->category_id;
			$category_name = $category->category_name;
			$category_slug = $this->generateSlugURL($category_name, $category_id);
			$category_url = site_url('products')."/".$category_slug;
			$category_arr = array(
				"category_id" => $category_id,
				"category_name" => $category_name,
				"category_url" => $category_url
				);
			$genrate_category_list[$category->category_id] = $category_arr;


			if(count($products_list) > 0){
				foreach($products_list as $product_key => $product_value){

					$product_slug = $this->generateSlugURL($product_value->trans_title, $product_value->tran_id);

					$product_url = site_url('products')."/".$category_slug."/".$product_slug;
					$trans_title = $product_value->trans_title;
					$product_arr[] = array(
						"product_id" => $product_value->tran_id,
						"product_short_title" => $this->subStringTheTitle($trans_title, 35),
						"product_title" => $trans_title,
						"product_url" => $product_url,
						);
				}

			}
			$genrate_prodcut_list[$category->category_id] = $product_arr;
		}
		return array($genrate_prodcut_list, $genrate_category_list);
	}
	public function generateProductListPageResults($limit_per_page, $page_limit_per_page, $category_id)
	{
		$result_array = array();
		$results = $this->products_model->get_filtered_page_records($limit_per_page, $page_limit_per_page, $category_id);
		foreach($results as $key => $value)
		{

			$category_name = $this->products_model->get_category_name($value->category_id);
			$category_slug = $this->generateSlugURL($category_name, $value->category_id);
			$product_slug = $this->generateSlugURL($value->trans_title, $value->tran_id);

			$product_url = site_url('products')."/".$category_slug."/".$product_slug;

			$trans_title = $this->subStringTheTitle($value->trans_title, 50);

			$result_array[$key] = array(
				'tran_id' => $value->tran_id,
				'trans_title' => $trans_title,
				'category_id' => $value->category_id,
				'product_url' => $product_url,
				'image_path' => $value->image_path
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
	public function product_detail_page()
	{
		$full_slug_name = $this->uri->segment(3);
		$product = explode("-", $full_slug_name);
		$product_id = end($product);

		$searchBoxTitle = false;
		if($this->input->get('search'))
		{
			$searchBoxTitle = true;
		}



		$data = array();
		$data["content"] = "product_details";
		$data["active_menu"] = "products";
		$data["detail_page"] = true;
		


		$data['news_widget'] = $this->products_model->get_active_news_list();
		$data["img_dir_path"] = $this->uploads_folder_path;

		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";


		$result = $this->products_model->get_product_details_by_id($product_id);
		$data["product_id"] =  isset($result->tran_id)?$result->tran_id:0;
		$data["product_name"] =  isset($result->trans_title)?$result->trans_title:'';
		$data["meta_title"] = $data["product_name"]."| Products | Mepco - Metal Powder Company";

		$data["search_title"] = (isset($searchBoxTitle) && $searchBoxTitle == true)?$data["product_name"]:"";

		$data["category_name"] = isset($result->category_name)?$result->category_name:'';

		$data["product_description"] = isset($result->details)?$result->details:'';

		$category_slug = $this->generateSlugURL($result->category_name, $result->category_id);
		$category_url = site_url('products')."/".$category_slug;
		$data["category_url"] = $category_url;
		$data["image_path"] = isset($result->image_path)?$result->image_path:'';

		$data["file_path"] = isset($result->file_url)?$result->file_url:'';
		$data["assets_img_path"] = $this->assets_img_path;

		$data["product_category_list"] = $this->generateProductsSidebarList();




		$this->load->view('pages/site_layout', $data);

	}
	public function product_list_page()
	{
		$full_slug_name = $this->uri->segment(2);
		$category = explode("-", $full_slug_name);
		$category_id = end($category);

		$this->load->library('pagination');
		$data = array();
		$data["content"] = "product_list";
		$data["active_menu"] = "products";


		$data['news_widget'] = $this->products_model->get_active_news_list();
		$data["img_dir_path"] = $this->uploads_folder_path;

		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";

       $limit_per_page = 9;
       $page = ($this->uri->segment(4)) ? ($this->uri->segment(4) - 1) : 0;
       $total_records = $this->products_model->get_total_filtered_product($category_id);
       $data["category_name"] = $this->products_model->get_category_name($category_id);
       $data["product_category_list"] = $this->generateProductsSidebarList();

       $data["meta_title"] = $data["category_name"]."| Products | Mepco - Metal Powder Company";

        if ($total_records > 0)
        {
			$data["results"] = $this->generateProductListPageResults($limit_per_page, $page*$limit_per_page, $category_id);
			$config = array();

			$config["base_url"] = base_url('products/').$full_slug_name."/page";
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

	public function products_compare(){

		$data = array();
		$data["content"] = "product_compare";
		$data["active_menu"] = "";

		$data["meta_title"] = "Compare Products | Mepco - Metal Powder Company";
		$data['news_widget'] = $this->products_model->get_active_news_list();

		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";

		$data["compare_product_list"] = isset($_SESSION['compare-pro'])?$_SESSION['compare-pro']:array();


		$this->load->view('pages/site_layout', $data);
	}

	public function ajax_products_compare(){
		$product_id = $this->input->post('compare-id');
		$result = $this->products_model->get_product_details_by_id($product_id);
		/*unset($_SESSION['compare-pro']);
		exit;*/

		$total_count = 0;
		if(isset($_SESSION['compare-pro']) && count($_SESSION['compare-pro']) > 0){
			$total_count = count($_SESSION['compare-pro']);
			if(count($_SESSION['compare-pro']) < 3){
				if(!array_key_exists($result->tran_id, $_SESSION['compare-pro']) == true)
				{
					/*$first_sess_data = $_SESSION['compare-pro'];*/
					$_SESSION['compare-pro'][$result->tran_id] = $result;
				}
			}
		}
		else
		{
			$_SESSION['compare-pro'] = array();
			$_SESSION['compare-pro'][$result->tran_id] = $result;
			$total_count = count($_SESSION['compare-pro']);
		}
		/*print_r($_SESSION['compare-pro']);*/
		echo json_encode(array("total_count" => $total_count));
	}

	public function ajax_clear_product(){
		if(isset($_SESSION['compare-pro'])){
			unset($_SESSION['compare-pro']);
			echo json_encode(array("total_count" => 0));
		}
	}

	public function ajax_popupBox(){
		$encode_product_id = $this->input->post('PID');
		$product_type = $this->input->post('product_type');
		if(isset($encode_product_id))
		{
		$product_id = base64_decode($encode_product_id);
		if(is_numeric($product_id)){

		if($product_type == "products"){
			$result = $this->products_model->get_product_details_by_id($product_id);
		}
		else
		{
			$result = $this->products_model->get_application_details_by_id($product_id);
		}


		$data["product_id"] =  isset($result->tran_id)?$result->tran_id:0;
		$data["product_name"] =  isset($result->trans_title)?$result->trans_title:'';
		$data["category_name"] = isset($result->category_name)?$result->category_name:'';
		$data["quick_view_details"] = isset($result->quick_view_details)?$result->quick_view_details:'';
		$category_slug = $this->generateSlugURL($result->category_name, $result->category_id);
		$category_url = site_url($product_type)."/".$category_slug;
		$data["category_url"] = $category_url;
		$data["image_path"] = (isset($result->image_path) && !empty($result->image_path))?$result->image_path:'no-image.jpg';

		$product_slug = $this->generateSlugURL($result->trans_title, $result->tran_id);
		$data["product_url"] = site_url($product_type)."/".$category_slug."/".$product_slug;

		$data["file_path"] = isset($result->file_url)?$result->file_url:'';
		$data["assets_img_path"] = $this->uploads_folder_path;
		$this->load->view('pages/light_box', $data);
	    }
	   }
	}

}
