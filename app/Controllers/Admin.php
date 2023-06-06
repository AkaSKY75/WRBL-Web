<?php
namespace App\Controllers;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
class Admin extends BaseController {

	protected $session;
	protected $parser;
	protected $userModel;
	protected $validator;
	protected const doctorValidationRules = [
		'nume' => 'required|min_length[1]|max_length[255]',
		'prenume' => 'required|min_length[1]|max_length[255]',
		'cnp' => 'required|exact_length[13]|numeric|valid_cnp',
		'localitate' => 'required|min_length[1]|max_length[27]',
		'judet' => 'required|min_length[1]|max_length[15]',
		'strada' => 'required|min_length[1]|max_length[255]',
		'bloc' => 'required|min_length[1]|max_length[10]',
		'scara' => 'required|min_length[1]|max_length[10]',
		'etaj' => 'required|less_than[10000]',
		'apartament' => 'required|less_than[100000]',
		'numar' => 'required|min_length[1]|max_length[10]',
		'telefon' => 'required|exact_length[10]|numeric',
		'email' => 'required|min_length[5]|max_length[255]|valid_email',
		'calificare' => 'required|min_length[1]|max_length[255]'
	];

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
		$this->session = Services::session();
        $this->parser = Services::parser();
		$this->userModel = model('UserModel');
		$this->validator = Services::Validation();
	} 

	

	function index(){
		if ($this->session->get('tip_user') != 2) {
			//throw new \Exception("Admin");
			return view('errors/html/error_404', ['message' => 'Sorry! Cannot seem to find the page you were looking for.']);
		}
		$TITLE="Lista medici";
		
		$medici = $this->userModel->get_all_medici();		

		$HEADER = $this->parser->setData([
			'BASE_URL' => base_url(),
			'SITE_URL' => base_url()
		])->render('template/header1');

		$CONTENT = $this->parser->setData([
			'USERS' => $medici,
			'BASE_URL' => base_url()
		])->render('medici/medici');

		//$CONTENT=$this->parser->parse("medici/medici", array("USERS"=>$medici), true);

		$data = array(
						"HEADER1" => $HEADER,
				    	"TITLE" => $TITLE,
						"message" => "",
						"CONTENT" => $CONTENT				

					 );
		return htmlspecialchars_decode($this->parser->setData($data)->render('template/full-width-medici'));	

		//$this->parser->parse("template/full-width-medici",$data);	

	}

	



function view_profile($id_medic = null){
		if ($this->session->get('tip_user') != 2 || $id_medic === null) {
			//throw new \Exception("Admin");
			return view('errors/html/error_404', ['message' => 'Sorry! Cannot seem to find the page you were looking for.']);
		}
		$TITLE = "Profil medic";

		$user=$this->userModel->get_medic($id_medic);

		if ($user === null) {
			return redirect('admin');
		}

		//print_r($user);

		$HEADER = $this->parser->setData([
			'BASE_URL' => base_url(),
			'SITE_URL' => base_url()
		])->render('template/header1');

		$CONTENT=$this->parser->setData(array_merge($user, [
			'SITE_URL' => base_url()
		]))->render('medici/profile_doc');	



		$data = array(

				    	"TITLE"=>$TITLE,
						"HEADER1" => $HEADER,
						"message" => "",
						"CONTENT"=>$CONTENT				

					 );

		

		return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width-medici"));	

	}
	function adauga_medic()	{	      

		$HEADER = $this->parser->setData([
			'BASE_URL' => base_url(),
			'SITE_URL' => base_url(),
			'nume' => '',
			'prenume' => '',
			'cnp' => '',
			'localitate' => '',
			'judet' => '',
			'strada' => '',
			'bloc' => '',
			'scara' => '',
			'etaj' => '',
			'apartament' => '',
			'numar' => '',
			'telefon' => '',
			'email' => '',
			'calificare' => ''
		])->render('template/header1');

        //$courses=$this->db->get("lista_cursuri")->result();

		$TITLE = "Adauga medic nou";	

        //print_r($TITLE); exit;

		//$CONTENT=$this->parser->parse('medici/doc_form',array(),TRUE);
		$CONTENT = $this->parser->setData([
			'SITE_URL' => base_url()
		])->render('medici/doc_form');

	

		$data = array(
						"HEADER1" => $HEADER,

						"message" => "",

				    	"TITLE" => $TITLE,

						"CONTENT" => $CONTENT				

					 );

		return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width-medici"));	

    	}

function add_done1(){
	$input = $this->request->getPost();
	/*return $this->response->setStatusCode(ResponseInterface::HTTP_OK)
						->setJSON($json);*/
	if (!$this->validator->setRules(self::doctorValidationRules/*, [
		'nume_medic' => 'Numele medicului este obligatoriu și trebuie sa fie format din maxim 255 de caractere!'
	]*/)->run($input)) {

		$HEADER = $this->parser->setData([
			'BASE_URL' => base_url(),
			'SITE_URL' => base_url()
		])->render('template/header1');

        //$courses=$this->db->get("lista_cursuri")->result();

		$TITLE = "Adauga medic nou";	

		$CONTENT = $this->parser->setData(array_merge([
			'SITE_URL' => base_url()
		],$input))->render('medici/doc_form');

		$data = array(
			"HEADER1" => $HEADER,

			"message" => implode('</br>', $this->validator->getErrors()),

			"TITLE" => $TITLE,

			"CONTENT" => $CONTENT				

		 );

		return htmlspecialchars_decode($this->parser->setData($data)->render('template/full-width-medici'));


	}
	if ($this->userModel->add_medic($input, $this->session->get('id')) === null) {
		$HEADER = $this->parser->setData([
			'BASE_URL' => base_url(),
			'SITE_URL' => base_url()
		])->render('template/header1');

        //$courses=$this->db->get("lista_cursuri")->result();

		$TITLE = "Adauga medic nou";	

		$CONTENT = $this->parser->setData(array_merge([
			'SITE_URL' => base_url()
		],$input))->render('medici/doc_form');

		$data = array(
			"HEADER1" => $HEADER,

			"message" => "Un medic având cnp: ".$input['cnp']." este prezent în baza de date!",

			"TITLE" => $TITLE,

			"CONTENT" => $CONTENT				

		 );
		 return htmlspecialchars_decode($this->parser->setData($data)->render('template/full-width-medici'));
	}
	return redirect('admin');
          /*$post=$this->forms->get_fields_original(array("nume_medic","prenume_medic","cnp","specializare","telefon"));
	
			if($this->db->insert("medici",$post))

				$this->common->message_done("Medic adaugat!"); 

			else

				$this->common->message_error("A fost o problema la adaugare. va rugam sa incercati mai tarziu!");

                redirect("admin");*/

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

	function edit_medic($id_medic = null){		
		if ($this->session->get('tip_user') != 2 || $id_medic === null) {
			//throw new \Exception("Admin");
			return view('errors/html/error_404', ['message' => 'Sorry! Cannot seem to find the page you were looking for.']);
		}

		$TITLE = "Editare date medic";

		$user=$this->userModel->get_medic($id_medic);
		
		if ($user === null) {
			return redirect('admin');
		}

		$HEADER = $this->parser->setData([
			'BASE_URL' => base_url(),
			'SITE_URL' => base_url()
		])->render('template/header1');

		$CONTENT=$this->parser->setData(array_merge($user, [
			'SITE_URL' => base_url()
		]))->render('medici/edit_medic');	
		

		$data = array(

				    	"TITLE"=>$TITLE,
						"HEADER1" => $HEADER,
						"message" => "",
						"CONTENT"=> $CONTENT				

					 );

		
		return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width-medici"));

	}
	
	function edit_done($id_medic){		

		if ($this->session->get('tip_user') != 2 || $id_medic === null) {
			//throw new \Exception("Admin");
			return view('errors/html/error_404', ['message' => 'Sorry! Cannot seem to find the page you were looking for.']);
		}

		$user = $this->userModel->get_medic($id_medic);

		if ($user === null) {
			return redirect('admin');
		}

		$input = $this->request->getPost();

		if (!$this->validator->setRules(self::doctorValidationRules)
		->run($input)) {
			$TITLE = "Editare date medic";

			$HEADER = $this->parser->setData([
				'BASE_URL' => base_url(),
				'SITE_URL' => base_url()
			])->render('template/header1');
	
			$CONTENT=$this->parser->setData(array_merge($input, [
				'SITE_URL' => base_url(),
				'id' => $id_medic
			]))->render('medici/edit_medic');	
			
	
			$data = array(
	
							"TITLE"=>$TITLE,
							"HEADER1" => $HEADER,
							"message" => implode('<br>', $this->validator->getErrors()),
							"CONTENT"=> $CONTENT				
	
						 );
	
			
			return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width-medici"));

		}
		if (!$this->userModel->update_medic($id_medic, $input)) {
			$TITLE = "Editare date medic";

			$HEADER = $this->parser->setData([
				'BASE_URL' => base_url(),
				'SITE_URL' => base_url()
			])->render('template/header1');
	
			$CONTENT=$this->parser->setData(array_merge($input, [
				'SITE_URL' => base_url(),
				'id' => $id_medic
			]))->render('medici/edit_medic');	
			
	
			$data = array(
	
							"TITLE"=>$TITLE,
							"HEADER1" => $HEADER,
							"message" => 'A apărut o eroare! Vă rugăm încercați din nou!',
							"CONTENT"=> $CONTENT				
	
						 );
	
			
			return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width-medici"));
		}
		return redirect()->to(base_url().'admin/view_profile/'.$id_medic);
		

		/*$post=$this->forms->get_fields_original(array("nume_medic","prenume_medic","cnp","specializare","telefon"));


		if($this->db->update("medici",$post,array('id_medic' =>$id_medic)))

				$this->common->message_done("Datele au fost salvate!"); 

			else

				$this->common->message_error("A fost o problema la editare. va rugam sa incercati mai tarziu!");

                redirect("admin/view_profile/".$id_medic);
		*/

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

	function delete_medic($id_medic = null){

		if ($this->session->get('tip_user') != 2 || $id_medic === null) {
			//throw new \Exception("Admin");
			return view('errors/html/error_404', ['message' => 'Sorry! Cannot seem to find the page you were looking for.']);
		}

		$user = $this->userModel->get_medic($id_medic);

		if ($user === null) {
			return redirect('admin');
		}

		$TITLE = 'Ștergere medic';

		$HEADER = $this->parser->setData([
			'BASE_URL' => base_url(),
			'SITE_URL' => base_url()
		])->render('template/header1');

		$CONTENT=$this->parser->setData(array_merge($user, [
			'SITE_URL' => base_url(),
		]))->render('medici/delete_medic');	
		

		$data = array(

						"TITLE"=>$TITLE,
						"HEADER1" => $HEADER,
						"message" => "",
						"CONTENT"=> $CONTENT				

					 );

		
		return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width-medici"));
	}

	function delete_done() {
		if ($this->session->get('tip_user') != 2) {
			//throw new \Exception("Admin");
			return view('errors/html/error_404', ['message' => 'Sorry! Cannot seem to find the page you were looking for.']);
		}
		$input = $this->request->getPost();
		if (!$this->userModel->delete_medic($input['id'])) {
			$TITLE = 'Ștergere medic';

			$HEADER = $this->parser->setData([
				'BASE_URL' => base_url(),
				'SITE_URL' => base_url()
			])->render('template/header1');	
	
			$data = array(
	
							"TITLE"=>$TITLE,
							"HEADER1" => $HEADER,
							"message" => "A apărut o eroare! Medicul nu a putut fi șters!",
							"CONTENT"=> ""				
	
						 );
	
			
			return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width-medici"));	
		}
		return redirect('admin');
	}

}

?>