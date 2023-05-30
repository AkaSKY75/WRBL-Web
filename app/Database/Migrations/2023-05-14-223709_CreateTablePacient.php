<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePacienti extends Migration
{
    public function up() {
        $this->forge->addField([
           'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
           ],
           'parola' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
           ],
           'id_doctor' => [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => true
           ],
           'nume' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
           ],
           'prenume' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
           ],
           'varsta' => [
            'type' => 'NUMERIC',
            'constraint' => 3,
            'unsigned' => true
           ],
           'cnp' => [
            'type' => 'VARCHAR',
            'constraint' => 13,
           ],
           'localitate' => [
            'type' => 'VARCHAR',
            'constraint' => 27,
           ],
           'judet' => [
            'type' => 'VARCHAR',
            'constraint' => 15,
           ],
           'strada' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
           ],
           'bloc' => [
            'type' => 'VARCHAR',
            'constraint' => 10,
           ],
           'scara' => [
            'type' => 'VARCHAR',
            'constraint' => 10,
           ],
           'etaj' => [
            'type' => 'NUMERIC',
            'constraint' => 4,
           ],
           'apartament' => [
            'type' => 'NUMERIC',
            'constraint' => 5,
           ],
           'numar' => [
            'type' => 'VARCHAR',
            'constraint' => 10,
           ],
           'telefon' => [
            'type' => 'VARCHAR',
            'constraint' => 10,
           ],
           'email' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
           ],
           'profesie' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
           ],
           'loc_de_munca' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
           ],
           'istoric_medical' => [
            'type' => 'VARCHAR',
            'constraint' => 4000,
           ],
           'alergii' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
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
        $this->forge->addForeignKey('id_doctor', 'DOCTORI', 'id', '', '');
        $this->forge->createTable('PACIENTI');
        $this->db->query("
            CREATE OR REPLACE TRIGGER TRIGGER_PACIENTI\r\n
            BEFORE INSERT ON PACIENTI\r\n
            FOR EACH ROW\r\n
            DECLARE NEW_ID NUMBER(20);\r\n
            BEGIN\r\n
                SELECT COUNT(*) INTO NEW_ID FROM PACIENTI;\r\n
                IF NEW_ID = 0 THEN\r\n
                    :NEW.\"id\" := 0;\r\n
                ELSE\r\n
                    SELECT MAX(\"id\") INTO NEW_ID FROM PACIENTI;\r\n
                    :NEW.\"id\" := NEW_ID+1;\r\n
                END IF;\r\n
            END;\r\n
        ");
   }

   public function down() {
       $this->forge->dropTable('PACIENTI');
   }
}
