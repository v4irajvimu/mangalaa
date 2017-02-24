<?php

class Signup extends CI_Model{


    function __construct(){
      parent::__construct();
      $this->sd = $this->session->all_userdata();

  }


  public function base_details(){
    //$a['max_no']=$this->get_max_no("user","code");
    //return $a;

}
 public function generateCode() {
      $count = $this->db->get('customer')->num_rows();
            $str = ++$count;
            $paded = str_pad($str,5,"0",STR_PAD_LEFT);
            $code = "C".date('d')."".date('m')."".date('Y')."_".$paded;
            return $code;
}

public function save(){

  $this->db->trans_begin();
  error_reporting(E_ALL); 
  function exceptionThrower($type, $errMsg, $errFile, $errLine) { 
    throw new Exception($errMsg.$errFile.$errLine); 
    }
    set_error_handler('exceptionThrower'); 
    try { 
      $code = $this->generateCode();
      $sum = array();
      foreach ($_POST as $key => $value) {
        $sum [$key] = $value;
      }
      $sum['password'] = md5($sum['password']);
      unset($sum['confirm_password']);
       $this->db->insert('customer', $sum);
       $a['res']=$this->db->trans_commit();      
   } 
      catch ( Exception $e ) { 
      $a['res']=$this->db->trans_rollback();
    } 
     echo json_encode($a);

}



}


?> 