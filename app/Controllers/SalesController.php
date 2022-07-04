<?php

namespace App\Controllers;

use App\Models\Sale;
use App\Models\SalesDetail;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;

class SalesController extends BaseController
{   
    use ResponseTrait;
    protected $Sale;
    public function __construct(){
        $this->Sale=new Sale();
    }
    public function sales(){
        // dd($this->Sale->sales());
        $data=['sales'=>$this->Sale->sales()];
        return view('sales',$data);
    }
    public function productReport()
    {
        $data=['productReports'=>$this->Sale->productReport()];
        return view('report/product',$data);
    }
    public function categoryReport(){
        $data=['categoryReports'=>$this->Sale->categoryReport()];
        return view('report/category',$data);
    }

}
