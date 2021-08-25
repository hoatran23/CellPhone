<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\AddsliderRequest;
use App\Models\Slider;

class SliderController extends Controller
{
    //
    public function getSlider() {
        $data = DB::table('hnl_slider')->orderBy('slider_id', 'ASC')->paginate(3);
        return view('backend.slider', ['sliderlist'=> $data]);
    }

    public function getAddSlider() {
        // $data = DB::table('hnl_slider')::orderBy('slide_id', 'DESC')->get();
        $data=Slider::all();
        return view('backend.addslider',$data);
    }

    public function postAddSlider(Request $request){
    	$slider = new Slider;
    	$slider->slider_name = $request->name;
    	if($request->hasFile('slider_img')){
            $img = $request->slider_img->getClientOriginalName();
    		$slider->slider_image = $img;
    		$request->slider_img->storeAs('slider',$img);
        }
        $slider->slider_desc = $request->description;
        $slider->slider_status = $request->status;
    	$slider->save();
    	return back()->with('status', 'Slider Added!');
        // dd($slider);
    }

    public function getEditSlider($id){
    	$data['sliderlist']=Slider::find($id);
    	return view('backend.editslider',$data);
        // dd($data['sliderlist']);
    }

    public function postEditSlider(Request $request, $id){
    	$slider = new Slider;
    	$arr['slider_name'] = $request->name;
    	$arr['slider_status'] = $request->status;
    	$arr['slider_desc'] = $request->desc;
        if($request->hasFile('slider_img')){
            $img = $request->slider_img->getClientOriginalName();
            $arr['slider_image'] = $img;
    		$request->slider_img->storeAs('slider',$img);
        }
    	$slider::where('slider_id',$id)->update($arr);
    	return redirect('admin/slider')->with('status', 'Slider Updated!');
    }

    public function getDeleteSlider($id) {
        $slider = Slider::find($id);
        $destinationPath = 'lib/storage/app/slider'.$slider->slider_image;
		if(file_exists($destinationPath)) {
			unlink($destinationPath);
		}
		$slider->delete();
    	return back()->with('status', 'Slider Deleted!');
    }
}
