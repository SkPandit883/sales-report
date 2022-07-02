<?php

namespace App\Database\Seeds;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Category;
use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $Product = new Product();
        $Category = new Category();
        $Sale = new Sale();
        $categories = [
            ['category' => 'fruit', 'items' => [
                ['name' => 'apple', 'price' => 12.99, 'image' => 'dummy.png', 'description' => 'apple'],
                ['name' => 'banana', 'price' => 12, 'image' => 'dummy.png', 'description' => 'banana'],
                ['name' => 'orange', 'price' => 1212, 'image' => 'dummy.png', 'description' => 'orange'],
                ['name' => 'grapes', 'price' => 219, 'image' => 'dummy.png', 'description' => 'grapes'],
            ]],
            ['category' => 'lifestyle', 'items' => [
                ['name' => 'shoes', 'price' => 199, 'image' => 'dummy.png', 'description' => 'shoes'],
                ['name' => 'slipper', 'price' => 19, 'image' => 'dummy.png', 'description' => 'slipper'],
                ['name' => 'cap', 'price' => 1221, 'image' => 'dummy.png', 'description' => 'cap'],
                ['name' => 'glass', 'price' => 1299, 'image' => 'dummy.png', 'description' => 'glass'],

            ]],
            ['category' => 'electronic', 'items' => [
                ['name' => 'phone', 'price' => 129, 'image' => 'dummy.png', 'description' => 'phone'],
                ['name' => 'heater', 'price' => 1129, 'image' => 'dummy.png', 'description' => 'heater'],
                ['name' => 'washing machine', 'price' => 1219, 'dummy.png' => 'image', 'description' => 'washing machine'],
                ['name' => 'iron', 'price' => 119, 'image' => 'dummy.png', 'description' => 'iron'],

            ]],
            ['category' => 'stationery', 'items' => [
                ['name' => 'book', 'price' => 99, 'image' => 'dummy.png', 'description' => 'book'],
                ['name' => 'pen', 'price' => 12, 'image' => 'dummy.png', 'description' => 'pen'],
                ['name' => 'copy', 'price' => 119, 'image' => 'dummy.png', 'description' => 'copy'],
                ['name' => 'journal', 'price' => 129, 'image' => 'dummy.png', 'description' => 'journal'],

            ]],
            ['category' => 'home applience', 'items' => [
                ['name' => 'heater', 'price' => 129, 'image' => 'dummy.png', 'description' => 'heater'],
                ['name' => 'fan', 'price' => 11, 'image' => 'dummy.png', 'description' => 'fan'],
                ['name' => 'spray', 'price' => 12.99, 'image' => 'dummy.png', 'description' => 'spray'],

            ]],
            ['category' => 'beauty', 'items' => [
                ['name' => 'soap', 'price' => 12.19, 'image' => 'dummy.png', 'description' => 'soap'],
                ['name' => 'shampoo', 'price' => 12.22, 'image' => 'dummy.png', 'description' => 'shampoo'],
                ['name' => 'facewash', 'price' => 129, 'image' => 'dummy.png', 'description' => 'facewash'],
                ['name' => 'conditioner', 'price' => 19, 'image' => 'dummy.png', 'description' => 'conditioner'],

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
                    $Sale->insert([
                        'product_id'=>$product_id,
                        'num_of_items'=>rand(1,3),
                        'item_per_price'=>$product['price'],
                    ]);
                    $count++;
                }
            }
        }
    }
}
