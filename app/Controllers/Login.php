<?php
namespace App\Controllers; 
//defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends BaseController {
	protected $session;
	protected $parser;
	protected $userModel;
	protected $redirect_routes;
	public function __construct(){
		$this->session = \Config\Services::session();
        $this->parser = \Config\Services::parser();
		$this->userModel = model('UserModel');
		$this->redirect_routes = [
			0 => 'users',
			1 => 'pacient',
			2 => 'admin'
		];
		//$this->load->model("common");	
		//$this->load->model("users_model");	
		//$this->load->model("forms");		
	}
	public function index()	{	  
        $TITLE = "Login";
		
		return $this->parser->setData([
			"BASE_URL" => base_url(),
			"SITE_URL" => base_url()
		])->render('login/login');		
			
    }
    function inregistrare()	{	      

               

        $TITLE = "Inregistrare";	
		$this->parser->parse('login/inregistrare',array(""),FALSE);		
			
    	}

      function done()	{
        $username = $this->request->getVar("username");
        $password = $this->request->getVar("password");
        
        $result = $this->userModel->try_login($username, $password);
		//print_r($result); 
        if ($username && $password && $result) {
			$this->session->set(['tip_user' => $result->tip_user]);
			return redirect($this->redirect_routes[$result->tip_user]);

          //$this->common->message_done("Bine ati venit!");
		
		  //print_r($this->session->userdata("tip_user")); exit;
		 /*if ($this->session->userdata("tip_user")=='0') redirect('users');
          else if ($this->session->userdata("tip_user")=='1')  redirect('pacient'); 
		     else  redirect('admin');*/ 
        } else {
			throw new \Exception($username . " " . $password . " " . $result);
			//redirect('login');
		}
	}

function inregistrare_done(){

          $post=$this->forms->get_fields_original(array("nume","prenume","localitate","telefon","CNP","data_nasterii","specializare"));

           $post1=$this->forms->get_fields_original(array("CNP","email","parola")); 

			$post1["tip_utilizator"]="1";
			$this->db->insert("user",$post1);
			

			if($this->db->insert("doctori",$post))

				$this->common->message_done("Cont creat! Va rugam sa va logati"); 

			else

				$this->common->message_error("A fost o problema la adaugare. va rugam sa incercati mai tarziu!");

                redirect("login");

    }


		function logout(){
		
		$this->session->sess_destroy();  
		redirect('welcome'); 
		
	}
}