<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\ProductSpecific;

class ProductSpecificController extends Controller
{
    //
    public function getSpecificInfo($id_prod) {
    	$id_product = $id_prod;
    	$data['listInfo'] = DB::table('hnl_product_specific')->where('hnl_product_specific.prod_id', $id_prod)->get();
    	return view('backend.addproductspecific', $data)->with(compact('id_product'));
    }

    public function postSpecificInfo(Request $request, $id_product) {
    	$info = new ProductSpecific;
    	$info->prod_screen = $request->screen_size;
    	$info->prod_tech = $request->screen_tech;
    	$info->prod_camera_front = $request->camera_front;
    	$info->prod_camera_rear	 = $request->camera_rear;
    	$info->prod_chip	 = $request->chip;
    	$info->prod_ram	 = $request->ram;
    	$info->prod_pin	 = $request->pin;
    	$info->prod_id	 = $id_product;

    	$info->save();
    	return redirect()->back()->with('status', 'Info Added!');;
    }

    public function getEditSpecificInfo($id_product) {
    	$data['listInfo'] = DB::table('hnl_product_specific')->get()->first();
    	return view('backend.editproductspecific', $data);
    }

    public function postEditSpecificInfo(Request $request, $id_product) {
    	$specific = ProductSpecific::first();    	
    	// dd($specific->prod_screen);
    	$specific->prod_screen = $request->screen_size;
    	$specific->prod_tech = $request->screen_tech;
    	$specific->prod_camera_front = $request->camera_front;
    	$specific->prod_camera_rear	 = $request->camera_rear;
    	$specific->prod_chip	 = $request->chip;
    	$specific->prod_ram	 = $request->ram;
    	$specific->prod_pin	 = $request->pin;
    	$specific->save();
    	return redirect()->to('admin/product/add_specific/'.$specific->prod_id)->with('status', 'Info Updated!');
    }

    public function getDeleteSpecificInfo($id_product) {
    	$specific = ProductSpecific::find($id_product);
    	$specific->delete();
    	return redirect()->back()->with('status', 'Info Deleted!');
    }
}
