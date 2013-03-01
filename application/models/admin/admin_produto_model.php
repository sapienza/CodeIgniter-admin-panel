<?php

class Admin_produto_model extends CI_Model {

	const TABLENAME = 'produto';
	function table_name() {
        return self::TABLENAME;
    }

	function load_columns()
	{
		$this->db->select('COLUMN_NAME');
		$this->db->from('INFORMATION_SCHEMA.Columns');
		$this->db->where('TABLE_NAME', $this->table_name());
		$query = $this->db->get();
		return $query->result_array(); 
	}

    function load()
    {    
		$this->db->select('*');
		$this->db->from($this->table_name());
		$this->db->order_by('id', 'ASC');
		$query = $this->db->get();
		return $query->result_array(); 
    }

	function save($ar){				
		$this->db->insert($this->table_name(), $ar);
		return true;
	}

	function del($id){				
		$this->db->delete($this->table_name(), array('id' => $id)); 
		return true;
	}	
}

?>