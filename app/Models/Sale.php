<?php

namespace App\Models;

use Config\Database;
use CodeIgniter\Model;

class Sale extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'sales';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['product_id','num_of_items','item_per_price','status'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function productReport(){
        $result = $this->db->table('sales')->select('name,num_of_items,item_per_price,image,(num_of_items*item_per_price) as total_amount')->join('products', 'products.id = sales.product_id')->get()->getResult();
        return $result;
    }
    public function categoryReport(){
        $sql="SELECT categories.name,sum(sales.num_of_items) as total_items,sum(sales.num_of_items*sales.item_per_price) as total_amount  FROM categories JOIN products ON categories.id=products.category_id JOIN sales ON sales.product_id=products.id GROUP BY(categories.name) ";
        return $this->db->query($sql)->getResult();
    }
}
