<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAlerteTable extends Migration
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
            'durata_ecg_P_min' => [
                'type' => 'INT',
                'constraint' => '4,3',
                'unsigned' => true,
            ],
            'durata_ecg_P_max' => [
                'type' => 'INT',
                'constraint' => '4,3',
                'unsigned' => true,
            ],
            'durata_ecg_PR_min' => [
                'type' => 'INT',
                'constraint' => '4,3',
                'unsigned' => true,
            ],
            'durata_ecg_PR_max' => [
                'type' => 'INT',
                'constraint' => '4,3',
                'unsigned' => true,
            ],
            'amplitudine_ecg_QRS_poz_min' => [
                'type' => 'INT',
                'constraint' => '4,2',
                'unsigned' => true,
            ],
            'amplitudine_ecg_QRS_poz_max' => [
                'type' => 'INT',
                'constraint' => '4,2',
                'unsigned' => true,
            ],
            'amplitudine_ecg_QRS_neg_min' => [
                'type' => 'INT',
                'constraint' => '4,2',
                'unsigned' => true,
            ],
            'amplitudine_ecg_QRS_neg_max' => [
                'type' => 'INT',
                'constraint' => '4,2',
                'unsigned' => true,
            ],
            'durata_ecg_QRS_min' => [
                'type' => 'INT',
                'constraint' => '4,3',
                'unsigned' => true,
            ],
            'durata_ecg_QRS_max' => [
                'type' => 'INT',
                'constraint' => '4,3',
                'unsigned' => true,
            ],
            'durata_ecg_ST_min' => [
                'type' => 'INT',
                'constraint' => '4,3',
                'unsigned' => true,
            ],
            'durata_ecg_ST_max' => [
                'type' => 'INT',
                'constraint' => '4,3',
                'unsigned' => true,
            ],
            'amplitudine_ecg_T_min' => [
                'type' => 'INT',
                'constraint' => '4,2',
                'unsigned' => true,
            ],
            'amplitudine_ecg_T_max' => [
                'type' => 'INT',
                'constraint' => '4,2',
                'unsigned' => true,
            ],
            'durata_ecg_T_min' => [
                'type' => 'INT',
                'constraint' => '4,3',
                'unsigned' => true,
            ],
            'durata_ecg_T_max' => [
                'type' => 'INT',
                'constraint' => '4,3',
                'unsigned' => true,
            ],
            'val_min_puls' => [
                'type' => 'INT',
                'constraint' => 4,
                'unsigned' => true,
            ],
            'val_max_puls' => [
                'type' => 'INT',
                'constraint' => 4,
                'unsigned' => true,
            ],
            'val_min_umiditate' => [
                'type' => 'INT',
                'constraint' => '4,2',
                'unsigned' => true,
            ],
            'val_max_umiditate' => [
                'type' => 'INT',
                'constraint' => '4,2',
                'unsigned' => true,
            ],
            'val_min_temperatura' => [
                'type' => 'INT',
                'constraint' => '4,2',
                'unsigned' => true,
            ],
            'val_max_temperatura' => [
                'type' => 'INT',
                'constraint' => '4,2',
                'unsigned' => true,
            ],
            'mesaj_alerta' => [
                'type' => 'VARCHAR',
                'constraint' => 255
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
        $this->forge->createTable('ALERTE');
        $this->db->query("
            CREATE OR REPLACE TRIGGER TRIGGER_ALERTE\r\n
            BEFORE INSERT ON ALERTE\r\n
            FOR EACH ROW\r\n
            DECLARE NEW_ID NUMBER(20);\r\n
            BEGIN\r\n
                SELECT COUNT(*) INTO NEW_ID FROM ALERTE;\r\n
                IF NEW_ID = 0 THEN\r\n
                    :NEW.\"id\" := 0;\r\n
                ELSE\r\n
                    SELECT MAX(\"id\") INTO NEW_ID FROM ALERTE;\r\n
                    :NEW.\"id\" := NEW_ID+1;\r\n
                END IF;\r\n
            END;\r\n
        ");
    }

    public function down()
    {
        $this->forge->dropTable('ALERTE');
    }
}
