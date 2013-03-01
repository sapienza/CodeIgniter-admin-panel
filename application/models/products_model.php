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

    public function get_products($manufacture_id=null, $filter)
    {
	    
		$this->db->select('*');
		$this->db->from('products');
		if($manufacture_id != null && $manufacture_id != 0){
		  $this->db->where('manufacture_id', $manufacture_id);
		}
		
		//$limit = '1, 5';
		//$limit = explode(',', $limit);
		//$this->db->limit($limit[0], $limit[1]);

		$this->db->order_by('sell_price', $filter);
		$query = $this->db->get();
		
		return $query->result_array(); 

		
    }
 
}
?>	
