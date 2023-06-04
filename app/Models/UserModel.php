<?php
namespace App\Models;
use Config\Services;
use CodeIgniter\Model;

Class UsersModel extends Model{
    private  $Administrator;
    private $Pacient;
    private $Doctor;
    private $Alerte;
    private $Recomandari;
    private $Valori_Senzori;
    private $email;
    public function __construct() {
        $this->Administrator = model('Administrator');
        $this->Pacient = model('Pacient');
        $this->Doctor = model('Doctor');
        $this->Alerte = model('Alerte');
        $this->Recomandari = model('Recomandari');
        $this->Valori_Senzori = model('Valori_Senzori');
        helper('text');
        $email_config = [
            'protocol' => 'smtp',
            'SMTPHost' => 'ssl://smtp.gmail.com',
            'SMTPPort' => 465,
            'SMTPCrypto' => 'ssl',
            'SMTPUser' => 'danaurelianmircea@gmail.com',
            'SMTPPass' => '',
            'mailType'  => 'html', 
            'charset'   => 'utf-8',
            'newline'  => "\r\n"
        ];
        $this->email = Services::email()->initialize($email_config);
    }
    public function try_login($email, $password) {
        $Administrator = $this->Administrator->where([
            'email' => $email,
            'parola' => hash('sha256', $password)
        ]);
        $Doctor = $this->Doctor->where([
            'email' => $email,
            'parola' => hash('sha256', $password)
        ]);
        $Pacient = $this->Pacient->where([
            'email' => $email,
            'parola' => hash('sha256', $password)
        ]);
        if($Administrator->first() != null && $Doctor->first() == null && $Pacient->first() == null) {
            return $Administrator;
        } else if ($Administrator->first() == null && $Doctor->first() != null && $Pacient->first() == null) {
            return $Doctor;
        } else if ($Administrator->first() == null && $Doctor->first() == null && $Pacient->first() != null) {
            return $Pacient;
        } else {
            return null;
        }
    }

    public function get_all_medici() {
        return $this->Doctor->findall();
    }

    public function get_pacient($cnp, $password) {
        return $this->Pacient->where([
            'cnp' => $cnp,
            'parola' => $password
        ])->first();
    }

    public function get_all_pacient_alerts($id) {
        return $this->Alerte->where([
            'id_pacient' => $id
        ])->findall();
    }

    public function get_all_pacient_recomandari($id) {
        return $this->Recomandari->where([
            'id_pacient' => $id
        ])->findall();
    }

    public function get_medic($id_medic) {
        return $this->Doctor->where([
            'id' => $id_medic
        ])->first();
    }

    public function delete_medic($id_medic) {
        return $this->Doctor->where([
            'id' => $id_medic
        ])->delete();
    }

    public function update_medic($id_medic, $data) {
        return $this->Doctor->where([
            'id' => $id_medic
        ])->set($data)->update();
    }

    public function check_medic_exist($cnp) {
        return $this->Doctor->where([
            'cnp' => $cnp
        ])->first();
    }
    public function add_medic($input, $id_administrator) {
        if ($this->check_medic_exist($input['cnp'])) {
            return null;
        }
        $input['id_administrator'] = $id_administrator;
        $password = random_string('alnum', 8);
        $input['parola'] = hash('sha256', $password);
        $this->Doctor->insert($input, false);
        $this->email->setFrom('danaurelianmircea@gmail.com', 'WRBL');
        $this->email->setTo($input['email']);
        
        $this->email->setSubject('Contul dvs. WRBL');
        $this->email->setMessage("Pentru a vă putea autentifica pe platforma WRBL, accesați link-ul <a style=\"color: #4c8bf5\" href=\"http://162.0.238.94:80\">www.wrbl.health</a> și folosiți datele:<br><br>E-mail -> ".$input['email']."<br>Parola -> ".$password."<hr>");
        
        if (!$this->email->send()) {
            throw new \Exception($this->email->printDebugger());
        }

        return $this->Doctor->getInsertID();
    }

}
?>