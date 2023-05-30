<?php
namespace App\Controllers; 
//defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends BaseController {
    public  $session;
    public $parser;
	function __construct()     
	{         
        $this->session = \Config\Services::session();
        $this->parser = \Config\Services::parser();

		//$this->load->model("raport");
     
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){	

		$TITLE="Acasa";
		//$stats=$this->db->get("stats")->result();
		$st=array();
		//foreach ($stats as $s)
		//$st[$s->stat_name]=$s->stat_value;
        if ($this->session->get("isLoggedIn") != null) {
            return redirect('login');
        }

		$data = array(
				    	"TITLE"=>$TITLE,
                        "CONTENT"=> $this->parser->setData($st)->render("template/dashboard"),
						"BASE_URL" => base_url('assets')
                        //"CONTENT"=> $this->parser->parse("template/dashboard", $st)
					 );
		
		return $this->parser->setData($data)->render("template/full-width");			
	}
}
