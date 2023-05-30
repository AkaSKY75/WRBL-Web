<?php

namespace App\Models;

use CodeIgniter\Model;

class Alerte extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ALERTE';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_pacient', 'id_doctor', 'durata_ecg_P_min', 'durata_ecg_P_max', 'durata_ecg_PR_min', 'durata_ecg_PR_max', 'amplitudine_ecg_QRS_poz_min', 'amplitudine_ecg_QRS_poz_max', 'amplitudine_ecg_QRS_neg_min', 'amplitudine_ecg_QRS_neg_max', 'durata_ecg_QRS_min', 'durata_ecg_QRS_max', 'durata_ecg_ST_min', 'durata_ecg_ST_max', 'amplitudine_ecg_T_min', 'amplitudine_ecg_T_max', 'durata_ecg_T_min', 'durata_ecg_T_max', 'val_min_puls', 'val_max_puls', 'val_min_umiditate', 'val_max_umiditate', 'val_min_temperatura', 'val_max_temperatura', 'mesaj_alerta', 'created_at', 'updated_at', 'deleted_at'];

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
