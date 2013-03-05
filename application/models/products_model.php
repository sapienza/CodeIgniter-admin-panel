<?php
class Products_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }

    public function get_manufacturers()
    {
		$this->db->select('id, name');
		$this->db->from('manufacturers');
		$this->db->order_by('name', 'ASC');
		$query = $this->db->get();
		return $query->result_array(); 
    }

    /*
    products = main table
    manufactures = category/join table
    */
    public function get_products($manufacture_id=null, $search_string=null, $order=null, $order_type='Asc', $limit_start, $limit_end)
    {
	    
		$this->db->select('products.id');
		$this->db->select('products.description');
		$this->db->select('products.stock');
		$this->db->select('products.cost_price');
		$this->db->select('products.sell_price');
		$this->db->select('products.manufacture_id');
		$this->db->select('manufacturers.name as manufacture_name');
		$this->db->from('products');
		if($manufacture_id != null && $manufacture_id != 0){
			$this->db->where('manufacture_id', $manufacture_id);
		}
		if($search_string){
			$this->db->like('description', $search_string);
		}

		$this->db->join('manufacturers', 'products.manufacture_id = manufacturers.id', 'left');

		$this->db->group_by('products.id');

		if($order){
			$this->db->order_by($order, $order_type);
		}else{
		    $this->db->order_by('id', $order_type);
		}


		//$this->db->group_by('products.id');
		//$limit = '1, 5';
		//$limit = explode(',', $limit);
		$this->db->limit($limit_start, $limit_end);


		$query = $this->db->get();
		
		return $query->result_array(); 	
    }

    function count_products($manufacture_id=null, $search_string=null, $order=null){
		$this->db->select('*');
		$this->db->from('products');
		if($manufacture_id != null && $manufacture_id != 0){
			$this->db->where('manufacture_id', $manufacture_id);
		}
		if($search_string){
			$this->db->like('description', $search_string);
		}
		if($order){
			$this->db->order_by($order, 'Asc');
		}else{
		    $this->db->order_by('id', 'Asc');
		}
		$query = $this->db->get();
		return $query->num_rows();        
    }
 
}
?>	
