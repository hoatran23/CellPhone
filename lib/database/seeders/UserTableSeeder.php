<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data=[
        	[
        		'email'=>'admin@gmail.com',
        		'password'=>bcrypt('123456'),
        		'name'=> 'admin'
        	],

        	[
        		'email'=>'hoatran@gmail.com',
        		'password'=>bcrypt('123456'),
        		'name'=> 'Tuy Hòa'
        	],
        ];
        DB::table('hnl_user')->insert($data); 
    }
}
