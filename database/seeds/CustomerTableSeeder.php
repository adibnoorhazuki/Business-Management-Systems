<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'cust_name' => 'Den Amir',
            'cust_email' => 'denAmir@gmail.com',
            'cust_phone' => '0182556064',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
