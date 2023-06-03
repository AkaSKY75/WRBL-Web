<?php
namespace App\Controllers; 
//defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends BaseController {
    private  $session;
    private $parser;
	private const headers = [
		0 => 'header',
		1 => 'header1',
		2 => 'header2',
	];

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
        if ($this->session->get("isLoggedIn") == null) {
            return redirect('login');
        }

		if ($this->session->has('tip_user')) {
			$HEADER = $this->parser->setData([
				'SITE_URL' => base_url(),
				'BASE_URL' => base_url()
			])->render('template/'.self::headers[$this->session->get('tip_user')]);
		} else {
			return redirect('login/logout');
		}

		$data = array(
				    	"TITLE" => $TITLE,
						"HEADER" => $HEADER,
                        "CONTENT" => $this->parser->setData($st)->render("template/dashboard"),
						"BASE_URL" => base_url()
                        //"CONTENT"=> $this->parser->parse("template/dashboard", $st)
					 );
		
		return htmlspecialchars_decode($this->parser->setData($data)->render("template/full-width"));
	}
}
