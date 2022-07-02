<?php

namespace App\Controllers;

class ProductController extends BaseController
{
    public function index()
    {
        return view('product/index');
    }
    public function store()
    {
    }
    public function update($id)
    {
        return "product-update-$id";
    }
    public function destroy($id)
    {
        return "product-destroy-$id";
    }
}
