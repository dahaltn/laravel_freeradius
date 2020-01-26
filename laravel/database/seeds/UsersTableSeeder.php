<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
            ->insert([
                'username' => 'admin',
                'password' => Hash::make('new'),
                'email' => 'dahaltn11110@gmail.com',
                'title' => 'Mr',
                'first_name' => 'Tej',
                'last_name' => 'Dahal',
                'phone' => '074010067503',
                'mobile' => '074010067503',
                'address' => '6 Loxley Gardens',
                'city' => 'London',
                'notes' => 'Admin account',
                'created_at' =>\Carbon\Carbon::now(),
                'updated_at' =>\Carbon\Carbon::now()
            ]);
    }
}
