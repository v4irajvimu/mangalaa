<?php

class Signup extends CI_Model{


    function __construct(){
      parent::__construct();
      $this->sd = $this->session->all_userdata();

  }


  public function base_details(){
      
    $a['max_no']=$this->get_max_no("user","code");
    return $a;

}
 public function get_max_no($table_name,$field_name){
    if(isset($_POST['hid'])){
      if($_POST['hid'] == "0" || $_POST['hid'] == ""){      
        $this->db->select_max($field_name);
        return $this->db->get($table_name)->first_row()->$field_name+1;
      }else{
        return $_POST['hid'];  
      }
    }else{
      $this->db->select_max($field_name);  
      return $this->db->get($table_name)->first_row()->$field_name+1;
    }
  }


public function save(){

  $this->db->trans_begin();
  error_reporting(E_ALL); 
  function exceptionThrower($type, $errMsg, $errFile, $errLine) { 
    throw new Exception($errMsg.$errFile.$errLine); 
    }
    set_error_handler('exceptionThrower'); 
    try { 

    
       $sum=array(

          "code"         => $_POST['code'],
          "fname"       => $_POST['fname'],
          "uid"       => $_POST['uid'],
          "password"   => $_POST['password'],
          "description"  => $_POST['description'],

          );

       $this->db->insert('user', $sum);
       $a['res']=$this->db->trans_commit();      
   } 
      catch ( Exception $e ) { 
      $a['res']=$this->db->trans_rollback();
    } 
     echo json_encode($a);

}



}


?> 