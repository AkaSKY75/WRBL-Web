<?php

namespace App\Models;

use CodeIgniter\Model;

class Observations extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'OBSERVATIONS';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['resourceType', 'identifier', 'instantiatesCanonical', 'instantiatesReference', 'basedOn', 'triggeredBy', 'partOf', 'status', 'category', 'code', 'subject', 'focus', 'encounter', 'effectiveDateTime', 'effectivePeriod', 'effectiveTiming', 'effectiveInstant', 'issued', 'performer', 'valueQuantity', 'valueCodeableConcept', 'valueString', 'valueBoolean', 'valueInteger', 'valueRange', 'valueRatio', 'valueSampledData', 'valueTime', 'valueDateTime', 'valuePeriod', 'valueAttachment', 'valueReference', 'dataAbsentReason', 'interpretation', 'note', 'bodySite', 'bodyStructure', 'method', 'specimen', 'device', 'referenceRange', 'hasMember', 'derivedFrom', 'component', 'created_at', 'updated_at', 'deleted_at'];

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
