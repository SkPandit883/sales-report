<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categories extends Migration
{
    public function up()
    {
        $fields = [
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true,],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ]
        ];
        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('categories');
    }

    public function down()
    {
        $this->forge->dropTable('categories');
    }
}
