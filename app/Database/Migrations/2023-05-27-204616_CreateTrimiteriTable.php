<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTrimiteriTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'resourceType' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'identifier' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'instantiatesCanonical' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'instantiatesUri' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'basedOn' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'replaces' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'requisition' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'intent' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'category' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'priority' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'code' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'orderDetail' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'quantityQuantity' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'quantityRatio' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'quantityRange' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
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
            'occurrenceDateTime' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'occurrencePeriod' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'occurrenceTiming' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'asNeededBoolean' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'asNeededCodeableConcept' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'authoredOn' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'requester' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'performerType' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'performer' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'location' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'reason' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'insurance' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'supportingInfo' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'specimen' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'bodySite' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'bodyStructure' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'note' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'patientInstruction' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'relevantHistory' => [
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
        $this->forge->createTable('TRIMITERI');
        $this->db->query("
            CREATE OR REPLACE TRIGGER TRIGGER_TRIMITERI\r\n
            BEFORE INSERT ON TRIMITERI\r\n
            FOR EACH ROW\r\n
            DECLARE NEW_ID NUMBER(20);\r\n
            BEGIN\r\n
                SELECT COUNT(*) INTO NEW_ID FROM TRIMITERI;\r\n
                IF NEW_ID = 0 THEN\r\n
                    :NEW.\"id\" := 0;\r\n
                ELSE\r\n
                    SELECT MAX(\"id\") INTO NEW_ID FROM TRIMITERI;\r\n
                    :NEW.\"id\" := NEW_ID+1;\r\n
                END IF;\r\n
            END;\r\n
        ");
    }

    public function down()
    {
        $this->forge->dropTable('TRIMITERI');
    }
}
