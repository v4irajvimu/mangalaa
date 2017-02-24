<?php

class login extends CI_Model
{
	function __construct(){
	parent::__construct();
	
	
    $this->load->database('default', true);
    $this->sd = $this->session->all_userdata();

    }

    public function base_details(){
	
	}

function get_users(){

	$query=$this->db->query("select * from customer where email='".$_POST['email']."' and password='".md5($_POST['password'])."' ");
	
	if($query->num_rows()>0){
		$res = $query->first_row();
		$session_data = array(
		    "is_login"=>true,
		    "up_is_login"=>true,
		    "code" =>$res->code		    
		);
		
		$this->session->set_userdata($session_data);
		echo 1;

	}else{
		echo 2;
	}

	}

}

?>