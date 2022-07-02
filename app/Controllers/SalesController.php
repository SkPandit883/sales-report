<?php

namespace App\Controllers;

use App\Models\Sale;
use App\Controllers\BaseController;

class SalesController extends BaseController
{   
    protected $Sale;
    public function __construct(){
        $this->Sale=new Sale();
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
