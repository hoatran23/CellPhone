<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
use App\Models\Product;
use DB;

class CategoryController extends Controller
{
    //
    public function getCate() {
        $data['catelist']= DB::table('hnl_categories')->orderBy('cate_id','asc')->paginate(4);
        return view('backend.category',$data);
    }

    public function postCate(AddCateRequest $request){
    	$category = new Category;
    	$category->cate_name = $request->name;
    	$category->cate_slug = str_slug($request->name);
        $category->cate_desc = $request->desc;
        $category->cate_status = $request->status;
    	$category->save();
    	return back()->with('status', 'Category Successfully Created!');
    }

    // Hàm lấy ra danh mục cần sửa
    public function getEditCate($id) {
        $data['cate']=Category::find($id);
        return view('backend.editcategory', $data);
    }

    // Hàm sửa danh mục
    public function postEditCate(EditCateRequest $request, $id){
    	$category = Category::find($id);
    	$category->cate_name = $request->name;
    	$category->cate_slug = str_slug($request->name);
        $category->cate_status = $request->status;
        $category->cate_desc = $request->desc;
    	$category->save();
    	return redirect()->intended('admin/category')->with('status', 'Category Updated!');
    }

    public function getDeleteCate($id) {
        Category::destroy($id);
    	return back()->with('status', 'Category Added!');
    }
}