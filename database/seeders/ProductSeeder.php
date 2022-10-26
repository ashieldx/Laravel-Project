<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                'name' => 'sample',
                'description' => 'this is sample description waaaa',
                'price' => '10000',
                'stock' => '50',
                'image' => 'sample.jpg',
                'category_id' => '2'
            ],
            [
                'name' => 'sample2',
                'description' => 'this is sample2 description waaaa',
                'price' => '15000',
                'stock' => '10',
                'image' => 'sample.jpg',
                'category_id' => '3'
            ],
            [
                'name' => 'sample3',
                'description' => 'this is sample3 description waaaa',
                'price' => '10000',
                'stock' => '50',
                'image' => 'sample.jpg',
                'category_id' => '2'
            ],
            [
                'name' => 'sample4',
                'description' => 'this is sample description waaaa',
                'price' => '10000',
                'stock' => '10',
                'image' => 'sample.jpg',
                'category_id' => '3'
            ],
            [
                'name' => 'Test-Sample5',
                'description' => 'this is sample description waaaa',
                'price' => '10000',
                'stock' => '1',
                'image' => 'sample.jpg',
                'category_id' => '2'
            ],
            [
                'name' => 'sample6',
                'description' => 'this is sample description waaaa',
                'price' => '10000',
                'stock' => '0',
                'image' => 'sample.jpg',
                'category_id' => '2'
            ],
            [
                'name' => 'Test sample7',
                'description' => 'this is sample description waaaa',
                'price' => '10000',
                'stock' => '50',
                'image' => 'sample.jpg',
                'category_id' => '2'
            ],
            [
                'name' => 'sample8',
                'description' => 'this is sample description waaaa',
                'price' => '12000',
                'stock' => '11',
                'image' => 'sample.jpg',
                'category_id' => '2'
            ],
            [
                'name' => 'Test sample9',
                'description' => 'this is sample description waaaa',
                'price' => '12000',
                'stock' => '0',
                'image' => 'sample.jpg',
                'category_id' => '2'
            ],
            [
                'name' => 'sample10',
                'description' => 'this is sample description waaaa',
                'price' => '12000',
                'stock' => '0',
                'image' => 'sample.jpg',
                'category_id' => '2'
            ],
            [
                'name' => 'sample11',
                'description' => 'this is sample description waaaa',
                'price' => '12000',
                'stock' => '0',
                'image' => 'sample.jpg',
                'category_id' => '2'
            ],
            [
                'name' => 'Sample 12',
                'description' => 'this is sample description waaaa',
                'price' => '12000',
                'stock' => '6',
                'image' => 'sample.jpg',
                'category_id' => '2'
            ],
            [
                'name' => 'sample13 NEXT',
                'description' => 'this is sample description waaaa',
                'price' => '12000',
                'stock' => '0',
                'image' => 'sample.jpg',
                'category_id' => '2'
            ],
            [
                'name' => 'sample 14',
                'description' => 'this is sample description waaaa',
                'price' => '15000',
                'stock' => '5',
                'image' => 'sample.jpg',
                'category_id' => '2'
            ],
        ]);
    }
}
