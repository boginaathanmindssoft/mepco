<?php session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

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
		$this->news_detail_page($default=true);

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

	public function news_list_page()
	{
		$data = array();
		$data["content"] = "news_details";
		$data["active_menu"] = "news";

		$data["meta_title"] = "News | Mepco - Metal Powder Company";
		$data['news_widget'] = $this->products_model->get_active_news_list();

		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";

		$data['news_widget'] = $this->products_model->get_active_news_list();
		$this->load->view('pages/site_layout', $data);
	}

	public function news_detail_page($default=false)
	{

		if($default == false){
			$full_slug_name = $this->uri->segment(2);
			$product = explode("-", $full_slug_name);
			$news_id = end($product);
		}
		else
		{
			$news_id = NULL;

		}



		$data = array();
		$data["content"] = "news_details";
		$data["active_menu"] = "news";

		$data["meta_title"] = "News | Mepco - Metal Powder Company";
		$data['news_widget'] = $this->products_model->get_active_news_list();
		$data["img_dir_path"] = $this->uploads_folder_path;

		$data["meta_keywords"] = "Aluminium, Bismuth, Calcium Silicide, Cobalt, Copper, Gold Bronze, Magnesium, Phosphorus, Silicon, Silver, Tin, Tungsten, Zinc";


		$result = $this->products_model->get_news_details_by_id($news_id);

		$data["product_name"] =  isset($result->news_title)?$result->news_title:'';

		$data["product_description"] = isset($result->news_description)?$result->news_description:'';

		$data['news_widget'] = $this->products_model->get_active_news_list();

		/*$category_slug = $this->generateSlugURL($result->category_name, $result->category_id);*/

		/*$category_url = site_url('products')."/".$category_slug;
		$data["category_url"] = $category_url;*/
		/*$data["image_path"] = isset($result->image_path)?$result->image_path:'';*/

		/*$data["file_path"] = isset($result->file_url)?$result->file_url:'';*/
		/*$data["assets_img_path"] = $this->assets_img_path;*/
		$this->load->view('pages/site_layout', $data);

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
}
