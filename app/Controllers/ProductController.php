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
        helper(['form', 'url']);
    }
    public function index()
    {
        $category = new Category();
        $data = ['products' => $this->Product->findAllWithCategory(), 'categories' => $category->findAll()];
        return view('product/index', $data);
    }
    public function store()
    {
        $rules = [
            'category_id' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'image' => [
                'uploaded[image]',
                'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[image,4096]',
            ],
        ];
        if (!$this->validate($rules))  return redirect()->back()->with('validation', $this->validator->getErrors());
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
        $rules = [
            'category_id' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'price' => ['required', 'integer'],

        ];
        if ($file->isValid()) {
            $data['image'] = FileUploader::upload($file, 'uploads');
        }
        if (!$this->validate($rules))  return redirect()->back()->with('validation', $this->validator->getErrors());
        $this->Product->update($id, $data);
        return redirect()->back()->with('success', 'Successfully product updated ');
    }
    public function destroy($id)
    {
        $this->Product->delete($id);
        return redirect()->back()->with('success', 'Successfully removed product');
    }
}
