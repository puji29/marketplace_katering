<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData= [
            [
                'name'=>'Mas Merchant',
                'email'=> 'merchant@gmail.com',
                'role'=>'Merchant',
                'password'=>bcrypt('123'),
            ],
            [
                'name'=>'Mas Customer',
                'email'=> 'customer@gmail.com',
                'role'=>'Customer',
                'password'=>bcrypt('123'),
            ],
        ];

        foreach($userData as $key => $val) {
            User::create($val);
        }
    }
}
