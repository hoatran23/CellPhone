<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
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
        		'name'=>'user-list',
        		'display_name'=>'Danh sách User'
        	],

        	
        	[
        		'name'=>'user-add',
        		'display_name'=>'Thêm User'
        	],

        	
        	[
        		'name'=>'user-edit',
        		'display_name'=>'Sửa User'
        	],

        	
        	[
        		'name'=>'user-delete',
        		'display_name'=>'Xóa User'
        	],

        	
        	[
        		'name'=>'role-list',
        		'display_name'=>'Danh sách Role'
        	],

        	
        	[
        		'name'=>'role-add',
        		'display_name'=>'Thêm Role'
        	],

        	
        	[
        		'name'=>'role-edit',
        		'display_name'=>'Sửa Role'
        	],

        	
        	[
        		'name'=>'role-delete',
        		'display_name'=>'Xóa Role'
            ],

			
        	[
        		'name'=>'cate-list',
        		'display_name'=>'Danh sách danh mục'
            ],

			
        	[
        		'name'=>'pro-list',
        		'display_name'=>'Danh sách sản phẩm'
            ],

			
        	[
        		'name'=>'slide-list',
        		'display_name'=>'Danh sách slider'
            ],

			
        	[
        		'name'=>'order-list',
        		'display_name'=>'Danh sách đơn hàng'
            ],

			
        ];
        DB::table('hnl_permission')->insert($data); 
    }
}
