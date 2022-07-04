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
    protected $allowedFields    = ['customer'];

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
        $sql="SELECT  products.id,products.name,item_per_price,SUM(num_of_items*item_per_price) as total_amount,SUM(sales_details.num_of_items) as quantity  FROM sales JOIN sales_details ON sales.id=sales_details.sales_id JOIN products ON sales_details.product_id=products.id  WHERE CAST(sales.created_at AS DATE) =CURRENT_DATE  GROUP BY (products.id)";
        return $this->db->query($sql)->getResult();
    }
    public function categoryReport(){
        $sql="SELECT  categories.id,categories.name,SUM(num_of_items*item_per_price) as total_amount,SUM(sales_details.num_of_items) as quantity  FROM sales JOIN sales_details ON sales.id=sales_details.sales_id JOIN products ON sales_details.product_id=products.id JOIN categories ON categories.id=products.category_id  WHERE CAST(sales.created_at AS DATE) =CURRENT_DATE  GROUP BY (categories.id)";
        return $this->db->query($sql)->getResult();
    }
    public function sales(){
        $sales=$this->db->query("SELECT * from sales")->getResult();
        $sales_details= $this->db->query("SELECT sales_id,num_of_items,item_per_price,products.name,(num_of_items*item_per_price) as total_amount FROM sales_details JOIN products ON sales_details.product_id=products.id")->getResult();
        $data=[];
        foreach ($sales as $key => $sale) {
           $temp=["sale_id"=>$sale->id,"customer"=>$sale->customer,"created"=>$sale->created_at];
           $details=[];
           foreach ($sales_details as $key => $sale_detail) {
              if($sale_detail->sales_id==$sale->id) {
                array_push($details,['name'=>$sale_detail->name,'num_of_items'=>$sale_detail->num_of_items,'price_per_item'=>$sale_detail->item_per_price,'amount'=>$sale_detail->total_amount,]);
              }
           }
           $temp['sales_details']=$details;
           array_push($data,$temp);

        }
        return $data;

    }
}
