<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservations extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->sd = $this->session->all_userdata();

	}


	public function base_details(){
		$a['packages'] = $this->db->get('package')->result();

		$sql="SELECT `eff_date` FROM `reservation` WHERE is_accepted='1' GROUP BY eff_date";

		if($this->db->query($sql)->num_rows()){
			$a['booked_dates'] = $this->db->query($sql)->result();
		}
		else{
			$a['booked_dates'] = null;
		}
		
		// print_r($a['booked_dates']);die();

		return $a;
	}

	function load(){
		$package_id = $_POST['package_id'];
		$tbl="";
		if($package_id != '0'){
			$sql = "SELECT * FROM package WHERE id='$package_id'";
			$sum = $this->db->query($sql)->result();

			$sql2 = "SELECT pf.* FROM `package_has_pkg_features` phf JOIN `pkg_features` pf 
					 ON pf.`id`=phf.`pkg_features_id`  WHERE phf.`package_id` = '$package_id'";
			$det = $this->db->query($sql2)->result();

			
			
			$tbl.='<div class="col-sm-12" id="pkg_feature_input">';
            $tbl.='<table class="table table-hover">';
            $tbl.='<tbody>';
            
            $count=0;
            foreach ($det as $value) {
            	$count++;
            	$tbl.='<tr>';
	            
	            $tbl.='<td class="col-sm-2" ></td>';

	            $tbl.='<td class="col-sm-1">';
	            $tbl.='<input name="pkg_features[]" style="display:none;" type="checkbox" data-selling="'.$value->selling.'" value="'.$value->id.'" data-id="'.$value->id.'" class="cl" checked readonly>';
	            $tbl.='</td>';
	            
	            $tbl.='<td class="col-sm-9">';
	            $tbl.= $value->name;
	            $tbl.='</td>';
	            
	            $tbl.='<td class="col-sm-2 text-right">';
				$tbl.= number_format($value->selling,2);
	            $tbl.='</td>';
	            
	            $tbl.='</tr>';	
            }
            $tbl.='</tbody>';
            $tbl.='</table>';
          	$tbl.='</div>';


		}
		else{
			$sql3 = "SELECT pf.* FROM  `pkg_features` pf ";
			$custom = $this->db->query($sql3)->result();

			

			$tbl.='<div class="col-sm-12" id="pkg_feature_input">';
            $tbl.='<table class="table table-hover">';
            $tbl.='<tbody>';
            foreach ($custom as  $value) {
				$tbl.='<tr>';
            	$tbl.='<td class="col-sm-2"></td>';

	            $tbl.='<td class="col-sm-1">';
	            $tbl.='<input name="pkg_features[]" type="checkbox" data-selling="'.$value->selling.'" data-id="'.$value->id.'" class="cl">';
	            $tbl.='</td>';
	            
	            $tbl.='<td class="col-sm-9">';
	            $tbl.= $value->name;
	            $tbl.='</td>';
	            
	            $tbl.='<td class="col-sm-2 text-right">';
				$tbl.= number_format($value->selling,2);
	            $tbl.='</td>';
	            $tbl.='</tr>';
			}
            
            
            $tbl.='</tbody>';
            $tbl.='</table>';
          	$tbl.='</div>';

		}
		echo $tbl;
	}

	public function save(){

		// print_r($_POST['data']['det']);
		// die();
		$sum = array();
		$det = array();
		$sum['eff_date'] = $_POST['data']['eff_date'];
		$sum['is_custom'] = $_POST['data']['is_custom'];
		$sum['package_id'] = $_POST['data']['package_id'];
		$sum['total'] = $_POST['data']['total'];
		$sum['customer_id'] = $this->session->userdata('customer_id');
		$sum['code'] = $this->generateCode();
		$sum['is_accepted'] = 0;

		$insertSum = $this->db->insert('reservation',$sum);

		if($insertSum){
			$reservation_id = $this->db->insert_id();
			foreach ($_POST['data']['det'] as $key => $value) {
				$det[]=array("reservation_id"=>$reservation_id,"pkg_features_id"=>$value);
			}

			//print_r($det); die();

			$insertDet = $this->db->insert_batch('reservation_has_pkg_features',$det);
			if($insertDet){
				$this->session->set_flashdata('vimu_alert', 'Thanks You..!! Your Reservation Code is '.$sum['code'] );
				echo "1";
			}
			else{
				echo "0";
			}
		}
	}

	public function generateCode() {
      $count = $this->db->get('reservation')->num_rows();
            $str = ++$count;
            $paded = str_pad($str,5,"0",STR_PAD_LEFT);
            $code = "RES".date('d')."".date('m')."".date('Y')."_".$paded;
            return $code;
}

}


?>