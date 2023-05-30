<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRecomandariTable extends Migration
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
            'tip' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'durata' => [
                'type' => 'INT',
                'constraint' => 4
            ],
            'alte_indicatii' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'state' => [
                'type' => 'INT',
                'constraint' => 1
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
        $this->forge->createTable('RECOMANDARI');
        $this->db->query("
            CREATE OR REPLACE TRIGGER TRIGGER_RECOMANDARI\r\n
            BEFORE INSERT ON RECOMANDARI\r\n
            FOR EACH ROW\r\n
            DECLARE NEW_ID NUMBER(20);\r\n
            BEGIN\r\n
                SELECT COUNT(*) INTO NEW_ID FROM RECOMANDARI;\r\n
                IF NEW_ID = 0 THEN\r\n
                    :NEW.\"id\" := 0;\r\n
                ELSE\r\n
                    SELECT MAX(\"id\") INTO NEW_ID FROM RECOMANDARI;\r\n
                    :NEW.\"id\" := NEW_ID+1;\r\n
                END IF;\r\n
            END;\r\n
        ");
    }

    public function down()
    {
        $this->forge->dropTable('RECOMANDARI');
    }
}
