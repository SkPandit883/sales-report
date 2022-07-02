<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
    public function up()
    {
       $fields=[
        'id'=>['type' =>'INT', 'unsigned'=>true, 'auto_increment'=>true,],
        'category_id'=>['type' => 'INT','unsigned'=>true,],
        'name'=>['type' => 'VARCHAR', 'constraint'=>100],
        'price'=>['type' => 'FLOAT'],
        'image'=>['type' => 'VARCHAR', 'constraint'=>255],
        'description'=>['type' => 'TEXT', 'null'=>true,],
       ];
       $this->forge->addField($fields);
       $this->forge->addPrimaryKey('id');
       $this->forge->addForeignKey('category_id','categories','id');
       $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
