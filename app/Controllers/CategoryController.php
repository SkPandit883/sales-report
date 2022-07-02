<?php

namespace App\Controllers;

use App\Models\Category;

class CategoryController extends BaseController
{
    protected $Category;
    public function __construct(){
      $this->Category = new Category();
    }
    public function index()
    {
        $data['categories']=$this->Category->findAll();
        return view('category/index',$data);
    }
    public function store()
    {
    }
    public function update($id)
    {
        dd($id);
        return "category-update-$id";
    }
    public function destroy($id)
    {
        return "category-destroy-$id";
    }
}
