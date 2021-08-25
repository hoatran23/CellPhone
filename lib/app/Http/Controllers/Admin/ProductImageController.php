<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use DB;

class ProductImageController extends Controller
{
    //
	public function getSubProductImage($id_prod) {
		// dd($id_prod);
		$product_id = $id_prod;
		$data['listImage'] = DB::table('hnl_product_image')->where('hnl_product_image.prod_id', $id_prod)->get();
		return view('backend.galleryimage', $data)->with(compact('product_id'));
	}

	public function postSubProductImage(Request $request, $product_id) {
		$getImage = $request->file('file');
		if ($getImage) {
			foreach ($getImage as $image) {
				# code...
				$img = $image->getClientOriginalName();
	    		$name_img = current(explode('.', $img));
	    		$image->storeAs('image_detail',$img);

	    		$subImage = new ProductImage;
	    		$subImage->prod_sub_img_name = $name_img;
	    		$subImage->prod_sub_img = $img;
	    		$subImage->prod_id = $product_id;
	    		$subImage->save();
			}
		}
		return redirect()->back()->with('status', 'Image Added!');
	}

	public function getDeleteSubProductImage($product_id) {
		$product_img = ProductImage::find($product_id);
		$destinationPath = 'lib/storage/app/image_detail/'.$product_img->prod_sub_img;
		if(file_exists($destinationPath)) {
			unlink($destinationPath);
		}
		$product_img->delete();
    	return redirect()->back()->with('status', 'Image Deleted!');
	}
}
