<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        
        DB::table('users')->insert([
            [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'address' => 'jakarta kota indah jakarta',
            'phone' => '1110009991111',
            'role' => 'admin'
            ],
            [
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user123'),
            'address' => 'jakarta barat tidak indah',
            'phone' => '11202993392931',
            'role' => 'user'
            ]
        ]);
    }
}
