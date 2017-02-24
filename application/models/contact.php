<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->sd = $this->session->all_userdata();

	}


	public function base_details(){
		
	}

}


?>