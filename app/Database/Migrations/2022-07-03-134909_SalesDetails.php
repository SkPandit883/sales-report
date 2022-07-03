<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class SalesDetails extends Migration
{
    public function up()
    {
        $fields = [
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true,],
            'sales_id' => ['type' => 'INT', 'unsigned' => true,],
            'product_id' => ['type' => 'INT', 'unsigned' => true,],
            'num_of_items' => ['type' => 'INT'],
            'item_per_price' => ['type' => 'FLOAT'],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ];
        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('sales_id', 'sales', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('product_id', 'products', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('sales_details');
    }

    public function down()
    {
       $this->forge->dropTable('sales_details');
    }
}
