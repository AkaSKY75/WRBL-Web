<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMigration extends Migration
{
    public function up()
    {
        $this->db->query("
            ALTER TABLE \"migrations\"\r\n
            DROP COLUMN \"id\"\r\n");
        $this->db->query("
            ALTER TABLE \"migrations\"\r\n
            ADD \"id\" NUMBER(20)\r\n");
        $this->db->query("
            CREATE OR REPLACE TRIGGER TRIGGER_MIGRATIONS\r\n
            BEFORE INSERT ON \"migrations\"\r\n
            FOR EACH ROW\r\n
            DECLARE NEW_ID NUMBER(20);\r\n
            BEGIN\r\n
                SELECT COUNT(*) INTO NEW_ID FROM \"migrations\";\r\n
                IF NEW_ID = 0 THEN\r\n
                    :NEW.\"id\" := 0;\r\n
                ELSE\r\n
                    SELECT MAX(\"id\") INTO NEW_ID FROM \"migrations\";\r\n
                    :NEW.\"id\" := NEW_ID+1;\r\n
                END IF;\r\n
            END;\r\n");

    }

    public function down()
    {
        $this->db->query('DROP TRIGGER TRIGGER_MIGRATIONS');
    }
}
