<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableConsultatii extends Migration
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
            'id_pacient' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_doctor' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'motivul_prezentarii' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'simptome' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'diagnostic_icd_10' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'tratament' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'observatii' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'semnatura' => [
                'type' => 'LONG RAW',
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
        $this->forge->addForeignKey('id_pacient', 'PACIENTI', 'id', '', '');
        $this->forge->addForeignKey('id_doctor', 'DOCTORI', 'id', '', '');
        $this->forge->createTable('CONSULTATII');
        $this->db->query("
            CREATE OR REPLACE TRIGGER TRIGGER_CONSULTATII\r\n
            BEFORE INSERT ON CONSULTATII\r\n
            FOR EACH ROW\r\n
            DECLARE NEW_ID NUMBER(20);\r\n
            BEGIN\r\n
                SELECT COUNT(*) INTO NEW_ID FROM CONSULTATII;\r\n
                IF NEW_ID = 0 THEN\r\n
                    :NEW.\"id\" := 0;\r\n
                ELSE\r\n
                    SELECT MAX(\"id\") INTO NEW_ID FROM CONSULTATII;\r\n
                    :NEW.\"id\" := NEW_ID+1;\r\n
                END IF;\r\n
            END;\r\n
        ");
    }

    public function down()
    {
        $this->forge->dropTable("CONSULTATII");
    }
}
