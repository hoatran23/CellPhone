<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
        		'name'=>'admin',
        		'display_name'=>'Admin'
        	],

        	
        	[
        		'name'=>'content',
        		'display_name'=>'Content'
        	],

        	
        	[
        		'name'=>'user',
        		'display_name'=>'User'
        	],
        ];
        DB::table('hnl_role')->insert($data); 
    }
}
