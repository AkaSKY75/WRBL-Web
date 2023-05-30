<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateObservationsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'resourceType' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'identifier' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'instantiatesCanonical' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'instantiatesReference' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'basedOn' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'triggeredBy' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'partOf' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'category' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'code' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'subject' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'focus' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'encounter' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'effectiveDateTime' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'effectivePeriod' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'effectiveTiming' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'effectiveInstant' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'issued' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'performer' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'valueQuantity' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'valueCodeableConcept' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'valueString' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'valueBoolean' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'valueInteger' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'valueRange' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'valueRatio' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'valueSampledData' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'valueTime' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'valueDateTime' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'valuePeriod' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'valueAttachment' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'valueReference' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'dataAbsentReason' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'interpretation' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'note' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'bodySite' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'bodyStructure' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'method' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'specimen' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'device' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'referenceRange' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'hasMember' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'derivedFrom' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'component' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'created_at' => [
                'type' => 'DATE',
                'default' => date('d-M-y')
            ],
            'updated_at' => [
                'type' => 'DATE',
                'default' => date('d-M-y')
            ],
            'deleted_at' => [
                'type' => 'DATE',
                'default' => '',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('OBSERVATIONS');
        $this->db->query("
            CREATE OR REPLACE TRIGGER TRIGGER_OBSERVATIONS\r\n
            BEFORE INSERT ON OBSERVATIONS\r\n
            FOR EACH ROW\r\n
            DECLARE NEW_ID NUMBER(20);\r\n
            BEGIN\r\n
                SELECT COUNT(*) INTO NEW_ID FROM OBSERVATIONS;\r\n
                IF NEW_ID = 0 THEN\r\n
                    :NEW.\"id\" := 0;\r\n
                ELSE\r\n
                    SELECT MAX(\"id\") INTO NEW_ID FROM OBSERVATIONS;\r\n
                    :NEW.\"id\" := NEW_ID+1;\r\n
                END IF;\r\n
            END;\r\n
        ");
    }

    public function down()
    {
        $this->forge->dropTable('OBSERVATIONS');
    }
}
