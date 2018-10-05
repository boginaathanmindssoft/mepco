<?php
class Products_model extends CI_Model
{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function get_all_product_category(){

		$where = '(category_type ="2" and status = 1)';
		$this->db->select('category_id, category_name, category_image, category_description');
		$this->db->from('tbl_category_master');
		$this->db->where($where);
		$this->db->order_by("priority","ASC");
		$query = $this->db->get();
		$result = $query->result();
		/*print_r($result);*/
		return $result;
	}
	function get_total_products($category_type){

        if($category_type == 2){
            $join_tbl_name = "tbl_product";
        }
        elseif($category_type == 1){
            $join_tbl_name = "tbl_application";
        }
        
        $where = '(t1.category_type ="'.$category_type.'" and t1.status = 1)';
        $this->db->select('count(*) as total_products');
        $this->db->from('tbl_category_master as t1');
        $this->db->join($join_tbl_name.' as t2', 't2.category_id = t1.category_id and t2.status = 1');
        $this->db->where($where);
        $this->db->group_by('t2.category_id');
        $this->db->order_by("t1.priority","ASC");
		$query = $this->db->get();
		$result = $query->result();
		return count($result);
	}
	public function get_current_page_records($limit, $start, $category_type)
    {
        if($category_type == 2){
            $join_tbl_name = "tbl_product";
        }
        elseif($category_type == 1){
            $join_tbl_name = "tbl_application";
        }

    	$where = '(t1.category_type ="'.$category_type.'" and t1.status = 1)';
    	$this->db->select('*');
		$this->db->from('tbl_category_master as t1');
        $this->db->join($join_tbl_name.' as t2', 't2.category_id = t1.category_id and t2.status = 1');
		$this->db->where($where);
        $this->db->group_by('t2.category_id');
        $this->db->order_by("t1.priority","ASC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }

    function get_total_filtered_product($category_id){

		$where = '(category_id ="'.$category_id.'" and status = 1)';
		$this->db->select('count(*) as total_products');
		$this->db->from('tbl_product');
		$this->db->where($where);
		$this->db->order_by("priority","ASC");
		$query = $this->db->get();
		$result = $query->row();
		return $result->total_products;
	}
    function get_total_filtered_application($category_id){

        $where = '(category_id ="'.$category_id.'" and status = 1)';
        $this->db->select('count(*) as total_products');
        $this->db->from('tbl_application');
        $this->db->where($where);
        $this->db->order_by("priority","ASC");
        $query = $this->db->get();
        $result = $query->row();


        return $result->total_products;
    }

	public function get_filtered_page_records($limit, $start, $category_id)
    {
    	$where = '(category_id ="'.$category_id.'" and status = 1)';
		$this->db->select('*');
		$this->db->from('tbl_product');
		$this->db->where($where);
        $this->db->limit($limit, $start);
        $this->db->order_by("priority","ASC");
        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }

    public function get_filtered_page_records_application($limit, $start, $category_id)
    {
        $where = '(category_id ="'.$category_id.'" and status = 1)';
        $this->db->select('*');
        $this->db->from('tbl_application');
        $this->db->where($where);
        $this->db->limit($limit, $start);
        $this->db->order_by("priority","ASC");
        $query = $this->db->get();


        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }

    public function get_category_name($category_id)
    {
    	$where = '(category_id ="'.$category_id.'" and status = 1)';
    	$this->db->select('category_name');
		$this->db->from('tbl_category_master');
		$this->db->where($where);
		$query = $this->db->get();
        $result = $query->row();
		return $result->category_name;
    }
    public function get_product_category_list($category_type){
        if($category_type == 2){
            $join_tbl_name = "tbl_product";
        }
        elseif($category_type == 1){
            $join_tbl_name = "tbl_application";
        }
    	$where = '(t1.category_type ="'.$category_type.'" and t1.status = 1)';

    	$this->db->select('t1.category_name, t1.category_id');
		$this->db->from('tbl_category_master as t1');
        $this->db->join($join_tbl_name.' as t2', 't2.category_id = t1.category_id and t2.status = 1');
        $this->db->where($where);
        $this->db->group_by('t2.category_id');
        $this->db->order_by("t1.priority","ASC");
		$query = $this->db->get();
        $result = $query->result();
		return $result;

    }
    public function get_product_list($category_id){

    	$where = '(category_id ="'.$category_id.'" and status = 1)';

    	$this->db->select('tran_id, trans_title, category_id');
		$this->db->from('tbl_product');
		$this->db->where($where);
		$query = $this->db->get();

        $result = $query->result();
        ///echo $this->db->last_query();
		return $result;

    }
    public function get_application_list($category_id){

        $where = '(category_id ="'.$category_id.'" and status = 1)';

        $this->db->select('tran_id, trans_title, category_id');
        $this->db->from('tbl_application');
        $this->db->where($where);
        $query = $this->db->get();

        $result = $query->result();
        ///echo $this->db->last_query();
        return $result;

    }

    public function get_product_details_by_id($product_id){
    	$where = '(t1.tran_id ="'.$product_id.'" and t1.status = 1)';
    	$this->db->select('*');
		$this->db->from('tbl_product as t1');
		$this->db->join('tbl_category_master as t2', 't2.category_id = t1.category_id');
		$this->db->where($where);
		$query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query();
		return $result;
    }
    public function get_product_grade_details_by_id($product_id){
        $where = '(t1.product_tran_id ="'.$product_id.'" and t1.status = 1)';
        $this->db->select('*');
        $this->db->from('tbl_product_grade as t1');
        $this->db->where($where);
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query();
        return $result;
    }
    public function get_application_details_by_id($product_id){
        $where = '(t1.tran_id ="'.$product_id.'" and t1.status = 1)';
        $this->db->select('*');
        $this->db->from('tbl_application as t1');
        $this->db->join('tbl_category_master as t2', 't2.category_id = t1.category_id');
        $this->db->where($where);
        $query = $this->db->get();
        $result = $query->row();
        //echo $this->db->last_query();
        return $result;
    }
    public function show_all_count(){
        $where = '(t1.gallery_type ="1" and t1.status = 1)';

        $this->db->select('count(*) as show_all');
        $this->db->from('tbl_gallery as t1');
        $this->db->join('tbl_gallery_image as t2', 't2.gallery_id = t1.gallery_id');
        $this->db->where($where);
        $this->db->order_by("t1.gallery_id","DESC");
        $query = $this->db->get();
        $result = $query->row();
        /*echo $this->db->last_query();
        exit;*/
        return $result->show_all;
    }
    public function get_galllery_list(){
        $where = '((t1.gallery_type ="1" OR t1.gallery_type ="2") and t1.status = 1)';

        $gallery_img = "(SELECT COUNT(*) FROM tbl_gallery_image WHERE gallery_id = t1.gallery_id) as imgcount, t1.gallery_id, t1.gallery_category";

        $this->db->select($gallery_img);
        $this->db->from('tbl_gallery as t1');
        $this->db->where($where);
        $this->db->order_by("t1.gallery_id","DESC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_galllery_image_list(){

        $where = '((t1.gallery_type ="1" OR t1.gallery_type ="2") and t1.status = 1)';

        $this->db->select('t1.gallery_id, t1.gallery_category, t2.img_url, t1.video_url, t1.gallery_type');
        $this->db->from('tbl_gallery as t1');
        $this->db->join('tbl_gallery_image as t2', 't2.gallery_id = t1.gallery_id');
        $this->db->where($where);
        $this->db->order_by("t1.gallery_id, t1.gallery_type","DESC");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_news_details_by_id($news_id){

        $current_date = date("Y-m-d H:i:s");

        if($news_id != NULL){
            $where = '(news_id ="'.$news_id.'" and status = 1)';
        }
        else
        {
         $where = '(status = 1)';
        }


        $this->db->select('*');
        $this->db->from('tbl_news');
        $this->db->where($where);
        $this->db->where("DATE_FORMAT(from_date,'%Y-%m-%d H:i:s') <= '".$current_date."'",NULL,FALSE);
        $this->db->where("DATE_FORMAT(to_date,'%Y-%m-%d H:i:s') >= '".$current_date."'",NULL,FALSE);
        $this->db->order_by("news_id","DESC");

        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function get_active_news_list(){
        $current_date = date("Y-m-d H:i:s");
        $where = '(status = 1)';
        $this->db->select('*');
        $this->db->from('tbl_news');
        $this->db->where($where);
        $this->db->where("DATE_FORMAT(from_date,'%Y-%m-%d H:i:s') <= '".$current_date."'",NULL,FALSE);
        $this->db->where("DATE_FORMAT(to_date,'%Y-%m-%d H:i:s') >= '".$current_date."'",NULL,FALSE);
        $this->db->order_by("news_id","DESC");

        $query = $this->db->get();
        $result = $query->result();
        $news_list = array();
        foreach ($result as $key => $value) {
            $news_detail = array();
            $news_detail['news_title'] = $value->news_title;
            $news_detail['news_description'] = substr($value->news_description, 0, 25);
            $news_detail['news_short_title'] = substr($value->news_title, 0, 40);
            $news_detail['slug_url'] = site_url("latest-news")."/".$this->generateSlugURL($value->news_title, $value->news_id);
            $news_list[] = $news_detail;

        }
        return $news_list;
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

     public function get_search_result($searchQuery){

        /*$searchQuery =  htmlspecialchars($searchQuery);*/
        $sqlQuery = "SELECT
        t1.trans_title,
        t1.tran_id,
        t1.category_id,
        (select category_name from tbl_category_master where category_id = t1.category_id) as category_name,
        (select category_type_name from tbl_category_type where category_type_id = (select category_type from tbl_category_master where category_id = t1.category_id)) as category_type
        FROM tbl_product as t1
        WHERE trans_title LIKE %searchQuery%
        UNION
        SELECT
        t2.trans_title,
        t2.tran_id,
        t2.category_id,
        (select category_name from tbl_category_master where category_id = t2.category_id) as category_name,
        (select category_type_name from tbl_category_type where category_type_id = (select category_type from tbl_category_master where category_id = t2.category_id)) as category_type
        FROM `tbl_application` as t2
        WHERE trans_title LIKE %searchQuery%";

        $sqlQueryWithValues = str_replace("%searchQuery%", $searchQuery, $sqlQuery);


        $query = $this->db->query($sqlQueryWithValues);
        $result = $query->result();
        /*echo $this->db->last_query();*/

        return $result;
    }

    public function get_faq_list(){
        $where = '(status = 1)';
        $this->db->select('faq_question, faq_answer, faq_id');
        $this->db->from('tbl_faq');
        $this->db->where($where);
        $this->db->order_by("priority","ASC");
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;

    }
}
	/* End of file Products_model.php */
	/* Location: ./main/application/Products_model.php */


