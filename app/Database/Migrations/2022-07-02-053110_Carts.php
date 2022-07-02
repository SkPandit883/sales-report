<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Carts extends Migration
{
    public function up()
    {
       $fields=[
        'id'=>['type' =>'INT', 'unsigned'=>true, 'auto_increment'=>true,],
        'product_id'=>['type'=>'INT','unsigned'=>true,],
        'num_of_items'=>['type'=>'INT'],
        'item_per_price'=>['type'=>'FLOAT'],
        'status'=>['type'=>'ENUM','constraint'=>['shopping','pending','checkout','delivered','default'=>'shoping']],
       ];
       $this->forge->addField($fields);
       $this->forge->addPrimaryKey('id');
       $this->forge->addForeignKey('product_id','products','id');
       $this->forge->createTable('carts');
    }

    public function down()
    {
        $this->forge->dropTable('carts');
    }
}
