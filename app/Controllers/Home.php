<?php

namespace App\Controllers;

use App\Models\Sale;
use App\Models\Category;

class Home extends BaseController
{   
    protected $Sale;
    public function __construct(){
        $this->Sale=new Sale();
    }
    public function index()
    {
        $data=[
            'categoryWithProductsCounts'=>(new Category())->productCount(),
            'categoryReports'=>$this->Sale->categoryReport(), 
            'productReports'=>$this->Sale->productReport()
        ];
        return view('welcome_message',$data);
    }
}
