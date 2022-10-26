<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        [
            'category' => 'Country'
        ],
        [
            'category' => 'Pop'
        ],
        [
            'category' => 'Dubstep'
        ],
        [
            'category' => 'Electro'
        ]
        ]);

    }
}
