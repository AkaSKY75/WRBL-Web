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
        $Administrator = $this->Administrator->orWhere([
            'email' => $email,
            'cnp' => $email,
        ])->where([
            'parola' => hash('sha256', $password)
        ])->first();
        $Doctor = $this->Doctor->orWhere([
            'email' => $email,
            'cnp' => $email,
        ])->where([
            'parola' => hash('sha256', $password)
        ])->first();
        $Pacient = $this->Pacient->where([
            'email' => $email,
            'cnp' => $email,
        ])->where([
            'parola' => hash('sha256', $password)
        ])->first();
        if($Administrator !== null && $Doctor === null && $Pacient === null) {
            $Administrator['tip_user'] = 2;
            return $Administrator;
        } else if ($Administrator === null && $Doctor !== null && $Pacient === null) {
            $Doctor['tip_user'] = 0;
            return $Doctor;
        } else if ($Administrator === null && $Doctor === null && $Pacient !== null) {
            $Pacient['tip_user'] = 1;
            return $Pacient;
        } else {
            return null;
        }
    }

    public function check_pacient_exists($cnp) {
        return $this->Pacient->where([
            'cnp' => $cnp
        ])->first();
    }

    public function add_pacient($input, $id_medic) {
        $input['id_doctor'] = $id_medic;
        if ($this->check_pacient_exists($input['cnp'])) {
            return null;
        }
        $password = random_string('alnum', 8);
        $input['parola'] = hash('sha256', $password);
        $this->Pacient->insert($input, false);
        $this->email->setFrom('danaurelianmircea@gmail.com', 'WRBL');
        $this->email->setTo($input['email']);
        
        $this->email->setSubject('Contul dvs. WRBL');
        $this->email->setMessage("Pentru a vă putea autentifica pe platforma WRBL, accesați link-ul <a style=\"color: #4c8bf5\" href=\"http://162.0.238.94:80\">www.wrbl.health</a> și folosiți datele:<br><br>E-mail -> ".$input['email']."<br>Parola -> ".$password."<hr>");
        
        if (!$this->email->send()) {
            throw new \Exception($this->email->printDebugger());
        }

        return $this->Doctor->getInsertID();
    }

    public function get_all_pacienti($id_medic) {
        return $this->Pacient->where([
            'id_doctor' => $id_medic
        ])->findAll();
    }

    public function get_all_medici() {
        return $this->Doctor->withDeleted()->findall();
    }

    public function get_pacient($cnp, $password = null) {
        if ($password !== null) {
            return $this->Pacient->where([
                'cnp' => $cnp,
                'parola' => $password
            ])->first();
        }
        return $this->Pacient->where([
            'id' => $cnp,
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

    public function check_medic_exists($cnp) {
        return $this->Doctor->where([
            'cnp' => $cnp
        ])->first();
    }
    public function add_medic($input, $id_administrator) {
        if ($this->check_medic_exists($input['cnp'])) {
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