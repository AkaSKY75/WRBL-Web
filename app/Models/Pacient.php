<?php

namespace App\Models;

use CodeIgniter\Model;

class Pacient extends Model
{
    protected $DBGroup          = 'default';
    protected $table      = 'PACIENTI';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['parola', 'id_doctor', 'nume', 'prenume', 'varsta', 'cnp', 'localitate', 'judet', 'strada', 'bloc', 'scara', 'etaj', 'apartament', 'numar', 'telefon', 'email', 'profesie', 'loc_de_munca', 'istoric_medical', 'alergii', 'created_at', 'updated_at', 'deleted_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}

?>