<?php

class Membership_model extends CI_Model {

	function validate()
	{
		$this->db->where('user_name', $this->input->post('username'));
		$this->db->where('pass_word', md5($this->input->post('password')));
		$query = $this->db->get('membership');

		//var_dump($query->num_rows);
		
		if($query->num_rows == 1)
		{
			return true;
		}
		
	}
	
	function create_member()
	{

		$this->db->where('user_name', $this->input->post('username'));
		$query = $this->db->get('membership');

        if($query->num_rows > 0){
			echo "nome de usuario ja existe";	
		}else{

			$new_member_insert_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email_addres' => $this->input->post('email_address'),			
				'user_name' => $this->input->post('username'),
				'pass_word' => md5($this->input->post('password'))						
			);
			$insert = $this->db->insert('membership', $new_member_insert_data);
		    return $insert;
		}
	      
	}//create_member
}

