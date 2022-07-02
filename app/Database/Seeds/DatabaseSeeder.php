<?php

namespace App\Database\Seeds;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $Product = new Product();
        $Category = new Category();
        $Cart = new Cart();
        $categories = [
            ['category' => 'fruit', 'items' => [
                ['name' => 'apple', 'price' => 12.99, 'image' => 'image', 'description' => 'apple'],
                ['name' => 'banana', 'price' => 12, 'image' => 'image', 'description' => 'banana'],
                ['name' => 'orange', 'price' => 1212, 'image' => 'image', 'description' => 'orange'],
                ['name' => 'grapes', 'price' => 219, 'image' => 'image', 'description' => 'grapes'],
            ]],
            ['category' => 'lifestyle', 'items' => [
                ['name' => 'shoes', 'price' => 199, 'image' => 'image', 'description' => 'shoes'],
                ['name' => 'slipper', 'price' => 19, 'image' => 'image', 'description' => 'slipper'],
                ['name' => 'cap', 'price' => 1221, 'image' => 'image', 'description' => 'cap'],
                ['name' => 'glass', 'price' => 1299, 'image' => 'image', 'description' => 'glass'],

            ]],
            ['category' => 'electronic', 'items' => [
                ['name' => 'phone', 'price' => 129, 'image' => 'image', 'description' => 'phone'],
                ['name' => 'heater', 'price' => 1129, 'image' => 'image', 'description' => 'heater'],
                ['name' => 'washing machine', 'price' => 1219, 'image' => 'image', 'description' => 'washing machine'],
                ['name' => 'iron', 'price' => 119, 'image' => 'image', 'description' => 'iron'],

            ]],
            ['category' => 'stationery', 'items' => [
                ['name' => 'book', 'price' => 99, 'image' => 'image', 'description' => 'book'],
                ['name' => 'pen', 'price' => 12, 'image' => 'image', 'description' => 'pen'],
                ['name' => 'copy', 'price' => 119, 'image' => 'image', 'description' => 'copy'],
                ['name' => 'journal', 'price' => 129, 'image' => 'image', 'description' => 'journal'],

            ]],
            ['category' => 'home applience', 'items' => [
                ['name' => 'heater', 'price' => 129, 'image' => 'image', 'description' => 'heater'],
                ['name' => 'fan', 'price' => 11, 'image' => 'image', 'description' => 'fan'],
                ['name' => 'spray', 'price' => 12.99, 'image' => 'image', 'description' => 'spray'],

            ]],
            ['category' => 'beauty', 'items' => [
                ['name' => 'soap', 'price' => 12.19, 'image' => 'image', 'description' => 'soap'],
                ['name' => 'shampoo', 'price' => 12.22, 'image' => 'image', 'description' => 'shampoo'],
                ['name' => 'facewash', 'price' => 129, 'image' => 'image', 'description' => 'facewash'],
                ['name' => 'conditioner', 'price' => 19, 'image' => 'image', 'description' => 'conditioner'],

            ]],
        ];
        foreach ($categories as $key => $category) {
            //save items
            $Category->insert(['name' => $category['category']]);
            $category_id = $Category->getInsertID();
            $count=0;
            foreach ($category['items'] as $key => $product) {
                //save product
                $Product->insert([
                    'category_id' => $category_id,
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'image' => $product['image'],
                    'description' => $product['description']
                ]);
                $product_id = $Product->getInsertID();
                if($count<2){
                    //add two products of each category
                    $Cart->insert([
                        'product_id'=>$product_id,
                        'num_of_items'=>rand(1,3),
                        'item_per_price'=>$product['price'],
                        'status'=>array_rand(['shopping','pending','checkout','delivered','default'=>'shoping'])
                    ]);
                    $count++;
                }
            }
        }
    }
}
