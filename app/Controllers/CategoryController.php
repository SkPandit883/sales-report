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
        $this->Category->insert([
            'name'=>$this->request->getPost('category')
        ]);
        return redirect()->back()->with('success', 'Category Created Successfully');
    }
    public function update($id)
    {
        $this->Category->update($id,[
            'name'=>$this->request->getPost('category')
        ]);
        return redirect()->back()->with('success', 'Category  Successfully Updated');
    }
    public function destroy($id)
    {
        $this->Category->delete($id);
        return redirect()->back()->with('success','Successfully removed category');
    }
}
