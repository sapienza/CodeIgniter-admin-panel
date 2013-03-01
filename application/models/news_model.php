<?php
class News_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }

    public function get_news($slug = FALSE)
	{
	    if ($slug === FALSE)
	    {
	        $query = $this->db->get('newss');
	        return $query->result_array();
	    }
	 
	    $query = $this->db->get_where('newss', array('slug' => $slug));
	    return $query->result_array();
	}
 
}