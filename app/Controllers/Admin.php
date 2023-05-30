<?php
namespace App\Controllers; 
class Admin extends BaseController {

	protected $session;
	protected $parser;
	protected $userModel;
	function __construct()     
	{         
		//echo CI_VERSION;
		//$this->load->model("session");		
		//print_r($this->session->userdata("isLoggedIn")); exit;
		//if ($this->session->userdata("isLoggedIn")==false) redirect('login');
		//print_r($this->session->userdata("tip_user")); exit;
		/*if ($this->session->userdata("tip_user")==1) redirect('pacient');
		else if ($this->session->userdata("tip_user")==0) redirect('users');
		$this->load->model("common");

		$this->load->model("users_model");		
		$this->load->model("medici_model");
		$this->load->model("forms");

		$this->load->model("info_pages");

		$this->load->model("courses_model");*/
		
		//$this->load->library("pdf");
		
		//$this->load->model("session");
		$this->session = \Config\Services::session();
        $this->parser = \Config\Services::parser();
		$this->userModel = model('UserModel');
	} 

	

	function index(){
		if ($this->session->get('tip_user') != 2) {
			//throw new \Exception("Admin");
			return view('errors/html/error_404', ['message' => 'Sorry! Cannot seem to find the page you were looking for.']);
		}
		$TITLE="Lista medici";
		
		$medici = $this->userModel->get_all_medici();		

		$CONTENT = $this->parser->setData([
			'USERS' => $medici,
			'BASE_URL' => base_url()
		])->render('medici/medici');

		//$CONTENT=$this->parser->parse("medici/medici", array("USERS"=>$medici), true);

		$data = array(

				    	"TITLE"=>$TITLE,

						"CONTENT"=>$CONTENT				

					 );
		return htmlspecialchars_decode($this->parser->setData($data)->render('template/full-width-medici'));	

		//$this->parser->parse("template/full-width-medici",$data);	

	}

	



function view_profile($id_medic){

		$TITLE = "Profil medic";

		$user=$this->medici_model->get_medic($id_medic);

		//print_r($user);

	

		$CONTENT=$this->parser->parse('medici/profile_doc',$user,TRUE);	



		$data = array(

				    	"TITLE"=>$TITLE,

						"CONTENT"=>$CONTENT				

					 );

		

		$this->parser->parse("template/full-width-medici",$data);	

	}
	function adauga_medic()	{	      

               

        //$courses=$this->db->get("lista_cursuri")->result();

		$TITLE = "Adauga medic nou";	

        //print_r($TITLE); exit;

		$CONTENT=$this->parser->parse('medici/doc_form',array(),TRUE);		

	

		$data = array(

				    	"TITLE"=>$TITLE,

						"CONTENT"=>$CONTENT				

					 );

		$this->parser->parse("template/full-width-medici",$data);	

    	}

function add_done1(){

          $post=$this->forms->get_fields_original(array("nume_medic","prenume_medic","cnp","specializare","telefon"));
	
			if($this->db->insert("medici",$post))

				$this->common->message_done("Medic adaugat!"); 

			else

				$this->common->message_error("A fost o problema la adaugare. va rugam sa incercati mai tarziu!");

                redirect("admin");

    }
	

		
		


	function activeaza($id_medic){			
			
			$this->db->set('activ', '1', FALSE);
			$this->db->where('id_medic', $id_medic);
			$this->db->update('medici');	
			$this->common->message_done("Medicul a fost activat!"); 
		
		redirect("admin");

	}
	
	function dezactiveaza($id_medic){			
			
			$this->db->set('activ', '0', FALSE);
			$this->db->where('id_medic', $id_medic);
			$this->db->update('medici');	
			$this->common->message_done("Medicul a fost activat!"); 
		
		redirect("admin");

	}

	function edit_medic($id_medic){		
	

		$TITLE = "Editare date medic";

		$user=$this->medici_model->get_medic($id_medic); 


		$CONTENT=$this->parser->parse('medici/edit_medic',$user,TRUE);	
		

		$data = array(

				    	"TITLE"=>$TITLE,

						"CONTENT"=>$CONTENT				

					 );

		
		$this->parser->parse("template/full-width-medici",$data);

	}
	
	function edit_done($id_medic){		
	

		

		$post=$this->forms->get_fields_original(array("nume_medic","prenume_medic","cnp","specializare","telefon"));


		if($this->db->update("medici",$post,array('id_medic' =>$id_medic)))

				$this->common->message_done("Datele au fost salvate!"); 

			else

				$this->common->message_error("A fost o problema la editare. va rugam sa incercati mai tarziu!");

                redirect("admin/view_profile/".$id_medic);

	}
	
	function view_medic($id_medic){

		$TITLE = "Detalii medic";

		$user=$this->medici_model->get_medic($id_medic);

		//print_r($user);

		
		$CONTENT=$this->parser->parse('admin/view_profile',$user,TRUE);	



		$data = array(

				    	"TITLE"=>$TITLE,

						"CONTENT"=>$CONTENT				

					 );

		

		$this->parser->parse("template/full-width-medici",$data);	

	}

	function delete($id_medic){

		$this->users_model->delete_user($id_medic);

		redirect("admin");

	}

}

?>