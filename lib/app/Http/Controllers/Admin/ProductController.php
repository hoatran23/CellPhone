<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    //
    public function getProduct(){
    	$data['productlist'] = DB::table('hnl_products')->join('hnl_categories','hnl_products.prod_cate','=','hnl_categories.cate_id')->orderBy('prod_id','desc')->paginate(5);
        // dd($data['productlist']);
    	return view('backend.product', $data);
    }

    public function getAddProduct(){
    	$data['catelist']=Category::all();
    	return view('backend.addproduct',$data);
    }

    public function postAddProduct(AddProductRequest $request){		
    	$filename = $request->img->getClientOriginalName();
    	$product = new Product;
    	$product->prod_name = $request->name;
    	$product->prod_slug = str_slug($request->name);
    	$product->prod_img = $filename;
    	$product->prod_accessories = $request->accessories;
    	$product->prod_price = $request->price;
    	$product->prod_warranty = $request->warranty;
    	$product->prod_promotion = $request->promotion;
    	$product->prod_condition = $request->condition;
    	$product->prod_status = $request->status;
    	$product->prod_desciption = $request->description;
    	$product->prod_cate = $request->cate;
    	$product->prod_featured = $request->featured;
    	$product->prod_profit = $request->profit;
        $product->prod_rating = 0;
        $product->prod_vote_amount = 0;
    	$product->save();
    	$request->img->storeAs('image',$filename);
    	return redirect('admin/product')->with('status', 'Product Added!');
    }
    public function getEditProduct($id){
    	$data['product']=Product::find($id);
    	$data['listcate']=Category::all();
    	return view('backend.editproduct', $data);
		// dd($data['product'], $data['listcate']);
    }
    public function postEditProduct(Request $request, $id){
    	$product = new Product;
    	$arr['prod_name'] = $request->name; 
    	$arr['prod_slug'] = str_slug($request->name); 
    	$arr['prod_accessories'] = $request->accessories; 
    	$arr['prod_price'] = $request->price;
    	$arr['prod_warranty'] = $request->warranty;
    	$arr['prod_promotion'] = $request->promotion;
    	$arr['prod_condition'] = $request->condition;
    	$arr['prod_status'] = $request->status;
    	$arr['prod_desciption'] = $request->description;
    	$arr['prod_cate'] = $request->cate;
    	$arr['prod_featured'] = $request->featured;
    	$arr['prod_profit'] = $request->profit;
    	if ($request->hasFile('img')) {
    		$img = $request->img->getClientOriginalName();
    		$arr['prod_img'] = $img;
    		$request->img->storeAs('image',$img);
    	}
    	$product::where('prod_id',$id)->update($arr);
    	return redirect('admin/product')->with('status', 'Product Updated!');
    }

    public function getDeleteProduct($id){
    	// Product::destroy($id);
		$product = Product::find($id);
		$destinationPath = 'lib/storage/app/image/'.$product->prod_img;
		if(file_exists($destinationPath)) {
			unlink($destinationPath);
		}
		$product->delete();
    	return back()->with('status', 'Product Deleted!');
    }
}
