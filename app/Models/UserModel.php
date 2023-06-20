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
    private $Consultatii;
    private $email;
    protected $db;
    public function __construct() {
        $this->Administrator = model('Administrator');
        $this->Pacient = model('Pacient');
        $this->Doctor = model('Doctor');
        $this->Alerte = model('Alerte');
        $this->Recomandari = model('Recomandari');
        $this->Valori_Senzori = model('Valori_Senzori');
        $this->Consultatii = model('Consultatii');
        helper('text');
        $email_config = [
            'protocol' => 'smtp',
            'SMTPHost' => 'ssl://smtp.gmail.com',
            'SMTPPort' => 465,
            'SMTPCrypto' => 'ssl',
            'SMTPUser' => 'danaurelianmircea@gmail.com',
            'SMTPPass' => 'rjklljefilazujmp',
            'mailType'  => 'html', 
            'charset'   => 'utf-8',
            'newline'  => "\r\n"
        ];
        $this->email = Services::email()->initialize($email_config);
        $this->db = \Config\Database::connect();
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
        $Pacient = $this->Pacient->orWhere([
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

    /* Senzori */

    public function get_valori_senzori($id_pacient) {
        return $this->Valori_Senzori->where([
            'id_pacient' => $id_pacient
        ])->findAll();
    }

    public function add_valori_senzori($input) {

        $ociConnection = $this->db->connID;

        $sql = 'INSERT INTO VALORI_SENZORI ("id", "id_pacient",'.
        '"val_senzor_ecg", "val_senzor_puls", "val_senzor_temperatura",'.
        '"val_senzor_umiditate", "accelerometru_x", "accelerometru_y",'.
        '"accelerometru_z", "is_alert", "created_at", "updated_at",'.
        '"deleted_at") VALUES (:id, :id_pacient, :val_senzor_ecg,'.
        ':val_senzor_puls, :val_senzor_temperatura,'.
        ':val_senzor_umiditate, :accelerometru_x, :accelerometru_y,'.
        ':accelerometru_z, :is_alert, TO_TIMESTAMP(:created_at,'.
        '\'YYYY-MM-DD HH24:MI:SS\'), TO_TIMESTAMP(:updated_at,'.
        '\'YYYY-MM-DD HH24:MI:SS\'), TO_TIMESTAMP(:deleted_at,'.
        '\'YYYY-MM-DD HH24:MI:SS\')) RETURNING "id" INTO :inserted_id';

        $stmt = oci_parse($ociConnection, $sql);
        $null_val = null;
        $now = date('Y-m-d H:i:s');
        // Initialize the insertedId variable
        $insertedId = null;

        // Bind the values to the parameters
        oci_bind_by_name($stmt, ':id', $null_val);
        oci_bind_by_name($stmt, ':id_pacient', $input['id_pacient']);
        oci_bind_by_name($stmt, ':val_senzor_ecg', hex2bin($input['val_senzor_ecg']), -1, SQLT_BIN);
        oci_bind_by_name($stmt, ':val_senzor_puls', $input['val_senzor_puls']);
        oci_bind_by_name($stmt, ':val_senzor_temperatura', $input['val_senzor_temperatura']);
        oci_bind_by_name($stmt, ':val_senzor_umiditate', $input['val_senzor_umiditate']);
        oci_bind_by_name($stmt, ':accelerometru_x', $input['accelerometru_x']);
        oci_bind_by_name($stmt, ':accelerometru_y', $input['accelerometru_y']);
        oci_bind_by_name($stmt, ':accelerometru_z', $input['accelerometru_z']);
        oci_bind_by_name($stmt, ':is_alert', $input['is_alert']);
        oci_bind_by_name($stmt, ':created_at', $now);
        oci_bind_by_name($stmt, ':updated_at', $now);
        oci_bind_by_name($stmt, ':deleted_at', $null_val);
        oci_bind_by_name($stmt, ':inserted_id', $insertedId, 5);

        // Execute the query
        oci_execute($stmt);

        $insertedId = intval($insertedId);

        /*$stmt = $this->db->connID->prepare('INSERT INTO VALORI_SENZORI (id_pacient,'.
        'val_senzori_ecg, val_senzor_puls, val_senzor_temperatura,'.
        'val_senzor_umiditate, accelerometru_x, accelerometru_y,'.
        'accelerometru_z, is_alert) VALUES (:id_pacient, EMPTY_BLOB(),'.
        ':val_senzor_temperatura, :val_senzor_umiditate,'.
        ':accelerometru_x, :accelerometru_y,'.
        ':accelerometru_z, :is_alert)');*/
        
        /*$stmt->bindParam(':id_pacient', $input['id_pacient']);
        $stmt->bindParam(':val_senzor_ecg', hex2bin($input['val_senzor_ecg']), \PDO::PARAM_LOB);
        $stmt->bindParam(':val_senzor_temperatura', $input['val_senzor_temperatura']);
        $stmt->bindParam(':val_senzor_umiditate', $input['val_senzor_umiditate']);
        $stmt->bindParam(':accelerometru_x', $input['accelerometru_x']);
        $stmt->bindParam(':accelerometru_y', $input['accelerometru_y']);
        $stmt->bindParam(':accelerometru_z', $input['accelerometru_z']);
        $stmt->bindParam(':is_alert', $input['is_alert']);

        $stmt->execute();*/

        

        // Prepare the SQL statement
        /*$stmt = $this->db->prepare("INSERT INTO VALORI_SENZORI (id_pacient, val_senzor_ecg".
        ", hex_data) VALUES (:field1, :field2, :hex_data)");

        // Bind the values to the parameters
        $stmt->bindParam(':field1', $field1);
        $stmt->bindParam(':field2', $field2);
        $stmt->bindParam(':hex_data', hex2bin($hexString));

        // Execute the query
        $stmt->execute();*/
        //$val_senzor_ecg = $input['val_senzor_ecg'];
        //$input['val_senzor_ecg'] = substr($val_senzor_ecg, 0, 4000);
        /*$input['val_senzor_ecg'] = hex2bin($input['val_senzor_ecg']);
        $this->Valori_Senzori->insert($input);*/
        //$id = $this->Valori_Senzori->getInsertID();
        //return $id;
        //throw new \Exception($insertedId);
        return $this->Valori_Senzori->getInsertID();
    }

    /* Pacient*/

    public function update_pacient($id_pacient, $data) {
        return $this->Pacient->where([
            'id' => $id_pacient
        ])->set($data)->update();
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

    public function add_consultatie($id_pacient, $id_doctor, $input) {
        $input['id_pacient'] = $id_pacient;
        $input['id_doctor'] = $id_doctor;
        $this->Consultatii->insert($input);
        return $this->Consultatii->getInsertID();
    }

    public function add_alerta($id_pacient, $id_doctor, $input) {
        $input['id_pacient'] = $id_pacient;
        $input['id_doctor'] = $id_doctor;
        $this->Alerte->insert($input);
        
        return $this->Alerte->getInsertID();
    }

    public function get_all_alerte_for_pacient($id_pacient, $id_doctor) {
        return $this->Alerte->where([
            'id_pacient' => $id_pacient,
            'id_doctor' => $id_doctor
        ])->findAll();
    }

    public function get_consultatie($id_consultatie) {
        return $this->Consultatii->where([
            'id' => $id_consultatie,
        ])->first();
    }

    public function get_all_consultatii_for_pacient($id_pacient, $id_doctor) {
        return $this->Consultatii->where([
            'id_pacient' => $id_pacient,
            'id_doctor' => $id_doctor
        ])->findAll();
    }

    public function get_pacient($id_pacient_cnp, $password = null) {
        if ($password !== null) {
            return $this->Pacient->where([
                'cnp' => $id_pacient_cnp,
                'parola' => $password
            ])->first();
        }
        return $this->Pacient->where([
            'id' => $id_pacient_cnp,
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