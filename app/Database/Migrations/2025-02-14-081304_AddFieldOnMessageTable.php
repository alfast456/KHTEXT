<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldOnMessageTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('messages', [
            'file_url' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'is_read',
            ],
            'file_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'file_url',
            ],
            'file_type' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'after' => 'file_name',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('messages', 'file_url');
        $this->forge->dropColumn('messages', 'file_name');
        $this->forge->dropColumn('messages', 'file_type');
    }
}
