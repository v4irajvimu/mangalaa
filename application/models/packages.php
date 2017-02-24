<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Packages extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->sd = $this->session->all_userdata();

	}


	public function base_details(){
		$a['packages']=$this->get_all_pkg();
		return $a;
	}

	public function get_all_pkg(){
		$sql = "";
		$res = $this->db->get('package')->result();

		return $res;
	}

	public function get_pkg_features(){
		$sql = "SELECT pf.* FROM `package_has_pkg_features` phf  JOIN `pkg_features` pf ON pf.`id` = phf.`pkg_features_id` 
				WHERE `package_id` = '".$_POST['pkg_id']."' ";
		$res = $this->db->query($sql)->result();

		$a="";
		foreach ($res as  $value) {
			$a.="<div>";
			$a.="<h3>";
			$a.='<span class="glyphicon glyphicon-tags"> </span> ';
			$a.=" &emsp; ".$value->name;				
			$a.="</h3>";

			$a.="<h5>";
			//$a.='<span class="glyphicon glyphicon-tags"></span> ';
			$a.=$value->desc;				
			$a.="</h5>";

			$a.="</div>";
		}

		echo $a;
	}

}


?>