<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Libraries\FileUploader;

class ProductController extends BaseController
{
    protected $Product;
    public function __construct()
    {
        $this->Product = new Product();
    }
    public function index()
    {
        $category = new Category();
        $data = ['products' => $this->Product->findAll(), 'categories' => $category->findAll()];
        return view('product/index', $data);
    }
    public function store()
    {
        helper(['form', 'url']);
        $validation = \Config\Services::validation();
        $check = $this->validate([
            'category_id' => 'required|integer',
            'name' => 'required|string',
            'price' => 'required|integer',
            'image' => 'required|is_image[image]'
        ]);
        if (!$check)  return redirect()->back()->with('validation', $this->validator->getErrors());
        $this->Product->insert([
            'category_id' => $this->request->getPost('category_id'),
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'description' => $this->request->getPost('description'),
            'image' => FileUploader::upload($this->request->getFile('image'), 'uploads')
        ]);
        return redirect()->back()->with('success', 'Successfully product added ');
    }
    public function update($id)
    {
        $data = [
            'category_id' => $this->request->getPost('category_id'),
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'description' => $this->request->getPost('description'),
        ];
        $file = $this->request->getFile('image');
        $validation_rule = [
            'category_id' => 'required|integer',
            'name' => 'required|string',
            'price' => 'required|integer',
        ];
        if ($file) {
            dd('yes');
            $data['image'] = FileUploader::upload($file, 'uploads');
            $validation_rule['image'] = 'is_image[image]';
        }
        dd('no');
        $check = $this->validate($validation_rule);
        if (!$check)  return redirect()->back()->with('validation', $this->validator->getErrors());
        $this->Product->update($id, $data);
        return redirect()->back()->with('success', 'Successfully product updated ');
    }
    public function destroy($id)
    {
        $this->Product->delete($id);
        return redirect()->back()->with('success', 'Successfully removed product');
    }
}
