<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
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
        		'cate_name'=>'Samsung',
        		'cate_slug'=>str_slug('Samsung')
        	],
        	[
        		'cate_name'=>'Iphone',
        		'cate_slug'=>str_slug('Iphone')
        	],
            [
                'cate_name'=>'BPhone',
        		'cate_slug'=>str_slug('Bphone')
            ]
        ];
        DB::table('hnl_categories')->insert($data);
    }
}
