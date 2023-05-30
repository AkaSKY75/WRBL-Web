<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateValoriSenzoriTable extends Migration
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
           'val_senzor_puls' => [
                'type' => 'INT',
                'constraint' => 3,
                'unsigned' => true
           ],
           'val_senzor_temperatura' => [
                'type' => 'INT',
                'constraint' => '4,2',
           ],
           'val_senzor_umiditate' => [
                'type' => 'INT',
                'constraint' => '4,2',
           ],
           'val_senzor_ecg' => [
                'type' => 'LONG RAW',
            ],
            'accelerometru_x' => [
                'type' => 'INT',
                'constraint' => '4,2'
            ],
            'accelerometru_y' => [
                'type' => 'INT',
                'constraint' => '4,2'
            ],
            'accelerometru_z' => [
                'type' => 'INT',
                'constraint' => '4,2'
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
        $this->forge->createTable('VALORI_SENZORI');
        $this->db->query("
            CREATE OR REPLACE TRIGGER TRIGGER_VALORI_SENZORI\r\n
            BEFORE INSERT ON VALORI_SENZORI\r\n
            FOR EACH ROW\r\n
            DECLARE NEW_ID NUMBER(20);\r\n
            BEGIN\r\n
                SELECT COUNT(*) INTO NEW_ID FROM VALORI_SENZORI;\r\n
                IF NEW_ID = 0 THEN\r\n
                    :NEW.\"id\" := 0;\r\n
                ELSE\r\n
                    SELECT MAX(\"id\") INTO NEW_ID FROM VALORI_SENZORI;\r\n
                    :NEW.\"id\" := NEW_ID+1;\r\n
                END IF;\r\n
            END;\r\n
        ");
    }

    public function down()
    {
        $this->forge->dropTable('VALORI_SENZORI');
    }
}
