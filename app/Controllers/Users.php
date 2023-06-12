<?php
namespace App\Controllers;
use Config\Services;
class Users extends BaseController {

	protected $session;
	protected $parser;
	protected $userModel;
	protected $validator;
	protected const pacientValidationRules = [
		'nume' => 'required|min_length[1]|max_length[255]',
		'prenume' => 'required|min_length[1]|max_length[255]',
		'varsta' => 'required|less_than[1000]',
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
		'profesie' => 'required|min_length[1]|max_length[255]',
		'loc_de_munca' => 'required|min_length[1]|max_length[255]',
		'istoric_medical' => 'required|min_length[1]|max_length[4000]',
		'alergii' => 'required|min_length[1]|max_length[255]',
	];

	protected const consultatieValidationRules = [
		'motivul_prezentarii' => 'required|min_length[1]|max_length[255]',
		'simptome' => 'required|min_length[1]|max_length[255]',
		'diagnostic_icd_10' => 'required|min_length[1]|max_length[255]',
		'tratament' => 'required|min_length[1]|max_length[255]',
		'observatii' => 'min_length[1]|max_length[255]'
	];

	protected const alertaValidationRules = [
		'durata_ecg_P_min' => 'required|decimal|less_than[10]',
		'durata_ecg_P_max' => 'required|decimal|less_than[10]',
		'durata_ecg_PR_min' => 'required|decimal|less_than[10]',
		'durata_ecg_PR_max' => 'required|decimal|less_than[10]',
		'amplitudine_ecg_QRS_poz_min' => 'required|decimal|less_than[100]',
		'amplitudine_ecg_QRS_poz_max' => 'required|decimal|less_than[100]',
		'amplitudine_ecg_QRS_neg_min' => 'required|decimal|less_than[100]',
		'amplitudine_ecg_QRS_neg_max' => 'required|decimal|less_than[100]',
		'durata_ecg_QRS_min' => 'required|decimal|less_than[10]',
		'durata_ecg_QRS_max' => 'required|decimal|less_than[10]',
		'durata_ecg_ST_min' => 'required|decimal|less_than[10]',
		'durata_ecg_ST_max' => 'required|decimal|less_than[10]',
		'amplitudine_ecg_T_min' => 'required|decimal|less_than[100]',
		'amplitudine_ecg_T_max' => 'required|decimal|less_than[100]',
		'durata_ecg_T_min' => 'required|decimal|less_than[10]',
		'durata_ecg_T_max' => 'required|decimal|less_than[10]',
		'val_min_puls' => 'required|less_than[1000]',
		'val_max_puls' => 'required|less_than[1000]',
		'val_min_umiditate' => 'required|decimal|less_than[100]',
		'val_max_umiditate' => 'required|decimal|less_than[100]',
		'val_min_temperatura' => 'required|decimal|less_than[100]',
		'val_max_temperatura' => 'required|decimal|less_than[100]',
		'mesaj_alerta' => 'required|min_length[1]|max_length[255]'
	];

	function __construct()     

	{         
		$this->session = Services::session();
		$this->parser = Services::parser();
		$this->userModel = model('UserModel');
		$this->validator = Services::Validation();
		//print_r($this->session->userdata("isLoggedIn")); exit;
		/*if ($this->session->userdata("isLoggedIn")==false) redirect('login');
		
		if ($this->session->userdata("tip_user")==1) redirect('pacient');
		else if ($this->session->userdata("tip_user")==2) redirect('admin');
		$this->load->model("common");

		$this->load->model("users_model");		

		$this->load->model("forms");

		$this->load->model("info_pages");

		$this->load->model("courses_model");	
		
		$this->load->model("medici_model");	
		
		//$this->load->library("pdf");
		
		//$this->load->model("session");*/

	} 

	

	function index(){
		if ($this->session->get('tip_user') !== 0 || $this->session->get('id') === null) {
			return redirect('login');
		}

		$TITLE="Lista pacienti";
		
		$HEADER = $this->parser->setData([
			'SITE_URL' => base_url(),
			'BASE_URL' => base_url()
		])->render('template/header');

		$users = $this->userModel->get_all_pacienti($this->session->get('id'));

		$CONTENT = $this->parser->setData([
			'USERS' => $users
		])->render('users/users');

		$data = array(
			'HEADER' => $HEADER,

			'TITLE' => $TITLE,

			'message' => '',

			'CONTENT' => $CONTENT
		);

		return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width"));

		/*$users=$this->users_model->get_all_users();

		$CONTENT=$this->parser->parse("users/users", array("USERS"=>$users), true);

		$data = array(

				    	"TITLE"=>$TITLE,

						"CONTENT"=>$CONTENT				

					 );

		$this->parser->parse("template/full-width",$data);*/

	}



function view_profile($id_pacient){

		$TITLE = "Profil pacient";

		$HEADER = $this->parser->setData([
			'SITE_URL' => base_url(),
			'BASE_URL' => base_url()
		])->render('template/header');

		//$user=$this->users_model->get_pacient($cnp);

		$user = $this->userModel->get_pacient($id_pacient);

		//print_r($user);

		//$DIAGNOSTIC=$this->users_model->get_diagnostice_by_pacient($cnp);
		//$user->DIAGNOSTIC=$DIAGNOSTIC;

		$CONTENT = $this->parser->setData($user)->render('users/profile_pacient');	

		$data = array(

				    	"TITLE" => $TITLE,

						"HEADER" => $HEADER,

						"message" => "",

						"CONTENT" => $CONTENT				

					 );

		
		
		return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width"));

	}
	function adauga_pacient()	{	      
        
		if ($this->session->get('tip_user') !== 0 || $this->session->get('id') === null) {
			return redirect('login');
		}

		$TITLE = "Adaugă pacient";

		$HEADER = $this->parser->setData([
			'SITE_URL' => base_url(),
			'BASE_URL' => base_url()
		])->render('template/header');

		$CONTENT=$this->parser->setData([
			'nume' => '',
			'prenume' => '',
			'varsta' => '',
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
			'profesie' => '',
			'loc_de_munca' => '',
			'istoric_medical' => '',
			'alergii' => ''
		])->render('users/pacient_form');		

		$data = array(

			"TITLE"=>$TITLE,

			"HEADER" => $HEADER,

			"message" => '',

			"CONTENT"=>$CONTENT				

		);

		return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width"));

}

function add_done1(){
	if ($this->session->get('tip_user') !== 0 || $this->session->get('id') === null) {
		return redirect('login');
	}

	$input = $this->request->getPost();

	if (!$this->validator->setRules(self::pacientValidationRules)
	    ->run($input)) {

			$TITLE = "Adaugă pacient";	

			$HEADER = $this->parser->setData([
				'SITE_URL' => base_url(),
				'BASE_URL' => base_url()
			])->render('template/header');
	
			$CONTENT=$this->parser->setData($input)
				->render('users/pacient_form');		
	
			$data = array(
	
				"TITLE"=>$TITLE,
	
				"HEADER" => $HEADER,
	
				"message" => implode('<br/>', $this->validator->getErrors()),
	
				"CONTENT"=>$CONTENT				
	
			);
	
			return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width"));
	}

	if ($this->userModel->add_pacient($input, $this->session->get('id')) === null) {
		
		$TITLE = "Adaugă pacient";	

		$HEADER = $this->parser->setData([
			'SITE_URL' => base_url(),
			'BASE_URL' => base_url()
		])->render('template/header');

		$CONTENT=$this->parser->setData($input)
			->render('users/pacient_form');		

		$data = array(

			"TITLE"=>$TITLE,

			"HEADER" => $HEADER,

			"message" => "Un pacient având cnp: ".$input['cnp']." este prezent în baza de date!",

			"CONTENT"=>$CONTENT				

		);

		return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width"));
	}
	
	return redirect('medic');

          /*$post=$this->forms->get_fields_original(array("nume","prenume","localitate","telefon",

          "cnp","judet","adresa","greutate","inaltime","alergii","istoric_medical"));
		  $cnp_string=$post['cnp'];
		  (string)$cnp_string;
		  if($cnp_string[0]==1 || $cnp_string[0]==5) $post['sex']='M';
		 else $post['sex']='F';
		  
		  
		  //print_r($cnp_string['5']); exit();
		  $zi = $cnp_string['5'].$cnp_string['6']; 
      $luna = $cnp_string['3'].$cnp_string['4'];
      $an = $cnp_string['1'].$cnp_string['2'];
	 if($an<=23) $an=2000+$an;
	 else $an=1900+$an;
	 $time=(string)$luna.'/'.(string)$zi.'/'.(string)$an;
	// print_r($time);exit();
	 (string)$time;
	  $time_string=strtotime($time);
	  //print_r($time_string);exit();
	  $post['data_nasterii'] = date('Y-m-d',$time_string);
	  
	  $birthDate = $time;
  //explode the date to get month, day and year
  $birthDate = explode("/", $birthDate);
  //get age from date or birthdate
  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2]));
	$post['varsta']=$age;

			if($this->db->insert("pacienti",$post))

				$this->common->message_done("Pacient adaugat!"); 

			else

				$this->common->message_error("A fost o problema la adaugare. va rugam sa incercati mai tarziu!");

                redirect("users");*/

    }
	
	function adauga_consultatie($id_pacient = null)	{	      
		if ($this->session->get('tip_user') !== 0 || $this->session->get('id') === null || $id_pacient === null) {
			return redirect('login');
		}
		$TITLE = "Adauga consult";

		$HEADER = $this->parser->setData([
			'SITE_URL' => base_url(),
			'BASE_URL' => base_url()
		])->render('template/header');

		$user = $this->userModel->get_pacient($id_pacient);

		if ($user === null) {
			return redirect('/');
		}
		//$diagnostic=$this->users_model->get_all_diagnostice();
		//$user->DIAGNOSTIC=$diagnostic;
		
		$CONTENT=$this->parser->setData(array_merge($user, [
			'motivul_prezentarii' => '',
			'simptome' => '',
			'diagnostic_icd_10' => '',
			'tratament' => '',
			'observatii' => '',
			'semnatura' => ''
		]))->render('users/adauga_consult');
		
		$data = array(

				    	"TITLE" => $TITLE,

						"HEADER" => $HEADER,

						"message" => "",

						"CONTENT" => $CONTENT				

					 );

		return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width"));

    }
		
		
		
	function adauga_consultatie_done($id_pacient = null) {	      
		if ($this->session->get('tip_user') !== 0 || $this->session->get('id') === null || $id_pacient === null) {
			return redirect('login');
		}
          
		$input = $this->request->getPost();

		if(!$this->validator->setRules(self::consultatieValidationRules)
		->run($input)) {

			$user = $this->userModel->get_pacient($id_pacient);

			$TITLE = "Adauga consult";

			$HEADER = $this->parser->setData([
				'SITE_URL' => base_url(),
				'BASE_URL' => base_url()
			])->render('template/header');

			$CONTENT=$this->parser->setData(array_merge($user, $input))
			->render('users/adauga_consult');

			$data = array(

				"TITLE" => $TITLE,

				"HEADER" => $HEADER,

				"message" => implode('</br>', $this->validator->getErrors()),

				"CONTENT" => $CONTENT				

			 );

			return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width"));

		}

		if($this->userModel->add_consultatie($id_pacient, $this->session->get('id'), $input) === null) {
			$user = $this->userModel->get_pacient($id_pacient);
			
			$TITLE = "Adauga consult";

			$HEADER = $this->parser->setData([
				'SITE_URL' => base_url(),
				'BASE_URL' => base_url()
			])->render('template/header');

			$CONTENT=$this->parser->setData(array_merge($user, $input))
			->render('users/adauga_consult');

			$data = array(

				"TITLE" => $TITLE,

				"HEADER" => $HEADER,

				"message" => 'A aparut o eroare. Vă rugăm încercați din nou!',

				"CONTENT" => $CONTENT				

			 );
		}

		return redirect()->to(base_url()."/medic/view_profile/".$id_pacient);
		/*$post=$this->forms->get_fields_original(array("cod_diagnostic","detalii","tratament"));
		
		$post['id_pacient']=$cnp;
		$post['data_consult']=date("Y-m-d");
		$post['diagnostic']=$post['cod_diagnostic'];
		
		
		$consult['cnp']=$cnp;
		$consult['data_diagnostic']=date("Y-m-d");
		$consult['cod_diagnostic']=$post['cod_diagnostic'];
		$consult['activ']=1;
		unset($post['cod_diagnostic']);
		//print_r($post);
		$this->db->insert("istoric_diagnostic_pacient",$consult);
		
		if($this->db->insert("consultatii",$post))

				$this->common->message_done("Consult adaugat!"); 

			else

				$this->common->message_error("A fost o problema la adaugare. va rugam sa incercati mai tarziu!");

               

                redirect("users/view_profile/".$cnp);*/

    	}
		
		function adauga_consult_empty()	{	      

		$TITLE = "Adauga consult";	
		//$user=new array();
		$pacienti=$this->users_model->get_all_pacients();
		//$user->PACIENTI=$pacienti;
		
		$diagnostic=$this->users_model->get_all_diagnostice();
		//$user->DIAGNOSTIC=$diagnostic;
		
		$CONTENT=$this->parser->parse('users/adauga_consult_nou',array('PACIENTI'=>$pacienti,'DIAGNOSTIC'=>$diagnostic),TRUE);		
		$data = array(

				    	"TITLE"=>$TITLE,

						"CONTENT"=>$CONTENT				

					 );

		$this->parser->parse("template/full-width",$data);	

    	}
		
		function adauga_consult_nou_done()	{	      

		$post=$this->forms->get_fields_original(array("cnp","cod_diagnostic","detalii","tratament"));
		
		
		$post['data_consult']=date("Y-m-d");
		$post['diagnostic']=$post['cod_diagnostic'];
		
		$post['id_pacient']=$post['cnp'];
		$consult['cnp']=$post['cnp'];
		$cnp=$post['cnp'];
		unset($post['cnp']);
		$consult['data_diagnostic']=date("Y-m-d");
		$consult['cod_diagnostic']=$post['cod_diagnostic'];
		$consult['activ']=1;
		unset($post['cod_diagnostic']);
		//print_r($post);
		$this->db->insert("istoric_diagnostic_pacient",$consult);
		
		if($this->db->insert("consultatii",$post))

				$this->common->message_done("Consult adaugat!"); 

			else

				$this->common->message_error("A fost o problema la adaugare. va rugam sa incercati mai tarziu!");

               

                redirect("users/view_profile/".$cnp);	

    	}

	function view_consultatii_pacient($id_pacient = null) {
		if ($this->session->get('tip_user') !== 0 || $this->session->get('id') === null || $id_pacient === null) {
			return redirect('login');
		}

		$user = $this->userModel->get_pacient($id_pacient);

		if ($user === null) {
			return redirect('/');
		}

		$TITLE="Consultatii pacient";
	
		$HEADER = $this->parser->setData([
			'SITE_URL' => base_url(),
			'BASE_URL' => base_url()
		])->render('template/header');

		$consultatii = $this->userModel->get_all_consultatii_for_pacient($id_pacient, $this->session->get('id'));
		
		//$user->USERS=$users;
		//$user->CONSULTATII = $consultatii;
		
		$CONTENT=$this->parser->setData(array_merge($user, [
			'CONSULTATII' => $consultatii
		]))->render("users/consultatii");

		$data = array(

				    	"TITLE" => $TITLE,

						"HEADER" => $HEADER,

						"message" => '',

						"CONTENT" => $CONTENT				

					 );

		return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width", $data));

	}


	function process($id_cursant){				

			$post=$this->forms->get_fields_original(array("first_name","date", "last_name","adresa", "phone","cnp","nr_dosar","taxa","data_examen","reexaminare","user_status","id_lista_curs"));

			switch($post['user_status']){

				

				case "Admis": $post['user_status']=1;  break;

				case "Respins": $post['user_status']=2;  break;

				case "In curs": $post['user_status']=0;  break;

				

			}	

			//print_r($post); print_r($id_cursant); exit;

			if($this->db->update("cursanti", $post,array('id_cursant' =>$id_cursant))){

				

			

			

			

				$this->common->message_done("Cursantul a fost editat!"); 

			}

			else

				$this->common->message_error("A aparut o eroare la salvare! Va rugam sa incercati mai tarziu!");			

		redirect("users");

	}

	function edit_pacient($id_pacient = null){		
		if ($this->session->get('tip_user') !== 0 || $this->session->get('id') === null || $id_pacient === null) {
			return redirect('/');
		}

		$TITLE = "Editare date pacient";

		$HEADER = $this->parser->setData([
			'SITE_URL' => base_url(),
			'BASE_URL' => base_url()
		])->render('template/header');

		$user= $this->userModel->get_pacient($id_pacient); //luare date din baza de date dupa id-ul clientului, pentru a le incarca in view

		if ($user === null) {
			return redirect('/');
		}

		$CONTENT=$this->parser->setData($user)
			->render('users/edit_pacient');	//incarca view-ul cu datele din baza de date	
		

		$data = array(

				    	"TITLE" => $TITLE,

						"HEADER" => $HEADER,

						"message" => "",

						"CONTENT" => $CONTENT				

					 );

		
		return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width"));

	}
	
	function edit_done($id_pacient = null){	
		if ($this->session->get('tip_user') !== 0 || $this->session->get('id') === null || $id_pacient === null) {
			return redirect('/');
		}

		$input = $this->request->getPost();

		if (!$this->validator->setRules(self::pacientValidationRules)
			->run($input)) {

				$TITLE = "Editare date pacient";	

				$HEADER = $this->parser->setData([
					'SITE_URL' => base_url(),
					'BASE_URL' => base_url()
				])->render('template/header');
		
				$CONTENT=$this->parser->setData($input)
					->render('users/pacient_form');		
		
				$data = array(
		
					"TITLE"=>$TITLE,
		
					"HEADER" => $HEADER,
		
					"message" => implode('<br/>', $this->validator->getErrors()),
		
					"CONTENT"=>$CONTENT				
		
				);
		
				return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width"));
		}

		if (!$this->userModel->update_pacient($id_pacient, $input)) {
			$TITLE = "Editare date pacient";	

			$HEADER = $this->parser->setData([
				'SITE_URL' => base_url(),
				'BASE_URL' => base_url()
			])->render('template/header');
	
			$CONTENT=$this->parser->setData($input)
				->render('users/pacient_form');		
	
			$data = array(
	
				"TITLE"=>$TITLE,
	
				"HEADER" => $HEADER,
	
				"message" => 'A apărut o eroare! Vă rugăm încercați din nou!',
	
				"CONTENT"=>$CONTENT				
	
			);
	
			return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width"));
		}

		return redirect()->to(base_url().'medic/view_profile/'.$id_pacient);

		/*$post=$this->forms->get_fields_original(array("nume","prenume","localitate","telefon",

          "cnp","judet","adresa","greutate","inaltime","alergii","istoric_medical"));
		  $cnp_string=$post['cnp'];
		  (string)$cnp_string;
		  if($cnp_string[0]==1 || $cnp_string[0]==5) $post['sex']='M';
		 else $post['sex']='F';
		  
		  
		  //print_r($cnp_string['5']); exit();
		  $zi = $cnp_string['5'].$cnp_string['6']; 
      $luna = $cnp_string['3'].$cnp_string['4'];
      $an = $cnp_string['1'].$cnp_string['2'];
	 if($an<=23) $an=2000+$an;
	 else $an=1900+$an;
	 $time=(string)$luna.'/'.(string)$zi.'/'.(string)$an;
	// print_r($time);exit();
	 (string)$time;
	  $time_string=strtotime($time);
	  //print_r($time_string);exit();
	  $post['data_nasterii'] = date('Y-m-d',$time_string);
	  
	  $birthDate = $time;
  //explode the date to get month, day and year
  $birthDate = explode("/", $birthDate);
  //get age from date or birthdate
  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2]));
	$post['varsta']=$age;

			//if(
			$this->db->update("pacienti", $post,array('cnp' =>$cnp));

				/*$this->common->message_done("Datele au fost editate!"); 

			else

				$this->common->message_error("A fost o problema la editare. Va rugam sa incercati mai tarziu!");

                redirect("users");*/
	}
	
	function view_consultatie($id_consultatie = null){
		if ($this->session->get('tip_user') !== 0 || $this->session->get('id') === null || $id_consultatie === null) {
			return redirect('/');
		}

		$TITLE = "Detalii consult";

		$HEADER = $this->parser->setData([
			'SITE_URL' => base_url(),
			'BASE_URL' => base_url()
		])->render('template/header');

		$consultatie = $this->userModel->get_consultatie($id_consultatie);

		if ($consultatie === null || $consultatie['id_doctor'] !== $this->session->get('id')) {
			return redirect('/');
		}

		$pacient = $this->userModel->get_pacient($consultatie['id_pacient']);
		//print_r($user);

		
		$CONTENT = $this->parser->setData(array_merge($pacient,
			$consultatie))->render('users/view_consult');	

		$data = array(

				    	"TITLE" => $TITLE,

						"HEADER" => $HEADER,

						"message" => "",

						"CONTENT" => $CONTENT				

		);

		return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width"));	

	}

	function delete($id_cursant){

		$this->users_model->delete_user($id_cursant);

		redirect("users");

	}
	
	function view_alerte_pacient($id_pacient = null) {
		if ($this->session->get('tip_user') !== 0 || $this->session->get('id') === null || $id_pacient === null) {
			return redirect('/');
		}

		$TITLE = "Vizualizare alerte pacient";

		$HEADER = $this->parser->setData([
			'SITE_URL' => base_url(),
			'BASE_URL' => base_url()
		])->render('template/header');

		$pacient = $this->userModel->get_pacient($id_pacient);

		if ($pacient === null) {
			return redirect('/');
		}

		$alerte = $this->userModel->get_all_alerte_for_pacient($id_pacient, $this->session->get('id'));

		$CONTENT = $this->parser->setData(array_merge($pacient, [
			"ALERTE" => $alerte
		]))->render('users/alerte');

		$data = array(

			"TITLE" => $TITLE,

			"HEADER" => $HEADER,

			"message" => "",

			"CONTENT" => $CONTENT				

		);

		return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width"));

	}

	function adauga_alerta_done($id_pacient = null) {
		if ($this->session->get('tip_user') !== 0 || $this->session->get('id') === null || $id_pacient === null) {
			return redirect('/');
		}

		$input = $this->request->getPost();

		$pacient = $this->userModel->get_pacient($id_pacient);

		if ($pacient === null) {
			return redirect('/');
		}

		if (!$this->validator->setRules(self::alertaValidationRules)
			->run($input)) {

			$TITLE = "Adăugare alertă";
	
			$HEADER = $this->parser->setData([
				'SITE_URL' => base_url(),
				'BASE_URL' => base_url()
			])->render('template/header');
	
			$CONTENT = $this->parser->setData(array_merge($pacient, $input))
				->render('users/adauga_alerta');	
	
			$data = array(
	
							"TITLE" => $TITLE,
	
							"HEADER" => $HEADER,
	
							"message" => implode('<br/>', $this->validator->getErrors()),
	
							"CONTENT" => $CONTENT				
	
			);
	
			return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width"));
		}

		if ($this->userModel->add_alerta($id_pacient, $this->session->get('id'), $input) === null) {
			
			$TITLE = "Adăugare alertă";
	
			$HEADER = $this->parser->setData([
				'SITE_URL' => base_url(),
				'BASE_URL' => base_url()
			])->render('template/header');
	
			$CONTENT = $this->parser->setData(array_merge($pacient, $input))
				->render('users/adauga_alerta');	
	
			$data = array(
	
							"TITLE" => $TITLE,
	
							"HEADER" => $HEADER,
	
							"message" => "A apărut o eroare! Vă rugăm încercați din nou!",
	
							"CONTENT" => $CONTENT				
	
			);
	
			return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width"));
		}
		return redirect()->to(base_url().'view_alerte_pacient/'.$id_pacient);

	}

	function adauga_alerta($id_pacient = null) {
		if ($this->session->get('tip_user') !== 0 || $this->session->get('id') === null || $id_pacient === null) {
			return redirect('/');
		}

		$pacient = $this->userModel->get_pacient($id_pacient);

		if ($pacient === null) {
			return redirect('/');
		}

		$TITLE = "Adăugare alertă";
		
		$HEADER = $this->parser->setData([
			'SITE_URL' => base_url(),
			'BASE_URL' => base_url()
		])->render('template/header');

		$CONTENT = $this->parser->setData(array_merge($pacient, [
			'durata_ecg_P_min' => '0.01',
			'durata_ecg_P_max' => '0.08',
			'durata_ecg_PR_min' => '0.12',
			'durata_ecg_PR_max' => '0.20',
			'amplitudine_ecg_QRS_poz_min' => '0.5',
			'amplitudine_ecg_QRS_poz_max' => '2.5',
			'amplitudine_ecg_QRS_neg_min' => '1.0',
			'amplitudine_ecg_QRS_neg_max' => '3.0',
			'durata_ecg_QRS_min' => '0.01',
			'durata_ecg_QRS_max' => '0.12',
			'durata_ecg_ST_min' => '0.01',
			'durata_ecg_ST_max' => '0.08',
			'amplitudine_ecg_T_min' => '0.1',
			'amplitudine_ecg_T_max' => '0.2',
			'durata_ecg_T_min' => '0.16',
			'durata_ecg_T_max' => '0.16',
			'val_min_puls' => '60',
			'val_max_puls' => '100',
			'val_min_umiditate' => '35',
			'val_max_umiditate' => '50',
			'val_min_temperatura' => '37.0',
			'val_max_temperatura' => '37.8',
			'mesaj_alerta' => ''
		]))->render('users/adauga_alerta');	

		$data = array(

				    	"TITLE" => $TITLE,

						"HEADER" => $HEADER,

						"message" => "",

						"CONTENT" => $CONTENT				

		);
		return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width"));

	}

	function view_medic() {
		if ($this->session->get('tip_user') !== 0 || $this->session->get('id') === null) {
			return redirect('/');
		}

		//print_r($this->session->userdata("cnp")); exit;
		
		$TITLE = "Date personale";
		
		$HEADER = $this->parser->setData([
			'SITE_URL' => base_url(),
			'BASE_URL' => base_url()
		])->render('template/header');

		//print_r($cnp); exit;
		
		$user = $this->userModel->get_medic($this->session->get('id'));

		if ($user === null) {
			return redirect('/');
		}

		//print_r($user); exit;

		$CONTENT = $this->parser->setData($user)->render('users/profile_medic');	

		$data = array(

				    	"TITLE" => $TITLE,

						"HEADER" => $HEADER,

						"message" => "",

						"CONTENT" => $CONTENT				

		);

		return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width"));		

	}

}

?>