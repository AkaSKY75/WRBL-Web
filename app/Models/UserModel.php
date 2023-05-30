<?php
namespace App\Models;

use CodeIgniter\Model;
Class UsersModel extends Model{
    protected  $Administrator;
    protected $Pacient;
    protected $Doctor;
    public function __construct() {
        $this->Administrator = model('Administrator');
        $this->Pacient = model('Pacient');
        $this->Doctor = model('Doctor');
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
}
?>