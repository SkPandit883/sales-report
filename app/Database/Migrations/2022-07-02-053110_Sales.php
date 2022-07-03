<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\RawSql;

use CodeIgniter\Database\Migration;

class Sales extends Migration
{
    public function up()
    {
        $fields = [
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true,],
            'customer'=>['type'=>'VARCHAR','constraint' =>100],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ];
        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('sales');
    }

    public function down()
    {
        $this->forge->dropTable('sales');
    }
}
