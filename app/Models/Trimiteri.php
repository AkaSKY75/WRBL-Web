<?php

namespace App\Models;

use CodeIgniter\Model;

class Trimiteri extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'TRIMITERI';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['resourceType', 'identifier', 'instantiatesCanonical', 'instantiatesUri', 'basedOn', 'replaces', 'requisition', 'status', 'intent', 'category', 'priority', 'code', 'orderDetail', 'quantityQuantity', 'quantityRatio', 'quantityRange', 'subject', 'focus', 'encounter', 'occurrenceDateTime', 'occurrencePeriod', 'occurrenceTiming', 'asNeededBoolean', 'asNeededCodeableConcept', 'authoredOn', 'requester', 'performerType', 'performer', 'location', 'reason', 'insurance', 'supportingInfo', 'specimen', 'bodySite', 'bodyStructure', 'note', 'patientInstruction', 'relevantHistory', 'created_at', 'updated_at', 'deleted_at'];

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
