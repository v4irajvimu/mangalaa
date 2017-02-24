<?php

class main extends CI_Controller
{

	private $sd;
    
    function __construct(){
		parent::__construct();
		$this->sd = $this->session->all_userdata();
    }
	
	public function index()
	{
		if(isset($_GET['action'])){
			if($_GET['action'] == 'login'|| $_GET['action'] == 'signup'){
				$this->load->model($_GET['action']);
				$this->load->view($_GET['action'],$this->{$_GET['action']}->base_details());
			}
			else{
			$this->load->view('header');
			$this->load->model($_GET['action']);
			$this->load->view($_GET['action'],$this->{$_GET['action']}->base_details());
			$this->load->view('footer');
			}

			
		}else{
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('footer');
		}
	}

	function login(){

		$this->load->model('login');
		echo $this->login->get_users();
		
	}
 public function logout(){

	$sd = array(
            "is_login"=>false
        );
	
    $this->session->set_userdata($sd);
	$this->session->unset_userdata("is_login");
	
	redirect(base_url());
    }
    

	function signup(){

		$this->load->model('signup');
		$data['result']=$this->signup->insert();
	}

	 public function select(){
	$this->load->model($this->uri->segment(3));
	$this->{$this->uri->segment(3)}->select();
    }
    
	public function save(){
		

		$this->load->model($this->uri->segment(3));
		$this->{$this->uri->segment(3)}->save();
    }
    public function load_data(){
		

		$this->load->model($this->uri->segment(3));
		$this->{$this->uri->segment(3)}->{$this->uri->segment(4)}();
    }
}

?>