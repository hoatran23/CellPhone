<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Slider;
use App\Models\ProductImage;
use App\Models\Rating;

class FrontendController extends Controller
{
    //
    public function getHome() {
        $data['hot'] = Product::where('prod_featured', 1)->orderBy('prod_id', 'desc')->get();
        $data['new'] = Product::where('prod_featured', 2)->orderBy('prod_id', 'desc')->paginate(20, ['*'], 'new_product');
        $data['all'] = Product::orderBy('prod_id','desc')->paginate(20, ['*'], 'all_product');
        $data['listSlider'] = DB::table('hnl_slider')->get();
        return view('frontend.home', $data);
    }

    public function getDetail($id){
        $prod_id = $id;
        $data['item']=Product::find($id);
        $product_rate = Product::find($id);

        $data['comments']=Comment::where('com_product',$id)->paginate(10);
        $data['comments_rate']=Rating::where('rate_prod_id',$id)->paginate(6);
        $data['listImage']= DB::table('hnl_product_image')->where('hnl_product_image.prod_id', $id)->get();
        $rating = DB::table('hnl_product_rating')->where('hnl_product_rating.rate_prod_id', $id)->avg('rate_vote');
        
        $data['rating_round'] = round($rating, 1);
        $amount_rate = DB::table('hnl_product_rating')->where('hnl_product_rating.rate_prod_id', $id)->get()->pluck('rate_vote');
        $length_rate = count($amount_rate);
        // dd($amount_rate);

        $product_rate->prod_rating = round($rating,1);
        $product_rate->prod_vote_amount = $length_rate;
        $product_rate->save();

        $five_star = 0;
        $four_star = 0;
        $three_star = 0;
        $two_star = 0;
        $one_star = 0;
        // dd( $data['rating_round']);
        for($i = 0; $i < $length_rate; $i++) {
            if ($amount_rate[$i] == 5) {
                 $five_star++;
            }
            else if ($amount_rate[$i] == 4) {
                $four_star++;
            }
            else if ($amount_rate[$i] == 3) {
                $three_star++;
            }
            else if ($amount_rate[$i] == 2) {
                $two_star++;
            }
            else if ($amount_rate[$i] == 1) {
                $one_star++;
            }
        }
        // dd($one_star);
        $percent_five_star = 100;
        $percent_four_star = 100;
        $percent_three_star = 100;
        $percent_two_star = 100;
        $percent_one_star = 100;

        if ($length_rate > 0) {
            # code...
            $percent_five_star = round(((($five_star /  $length_rate) * 100)),2);
            $percent_four_star = round(((($four_star /  $length_rate) * 100)),2);
            $percent_three_star = round(((($three_star /  $length_rate) * 100)),2);
            $percent_two_star = round(((($two_star /  $length_rate) * 100)),2);
            $percent_one_star = round(((($one_star /  $length_rate) * 100)),2);
        }

        // dd($data['rating_round']);
        // dd($five_star,  $four_star,$three_star, $two_star, $one_star, $percent_five_star, $percent_four_star, $percent_three_star, $percent_two_star, $percent_one_star);
        return view('frontend.details',$data)->with(compact('prod_id', 'five_star', 'four_star', 'three_star', 'two_star', 'one_star', 'percent_five_star', 'percent_four_star', 'percent_three_star', 'percent_two_star', 'percent_one_star', 'length_rate'));
    }

    public function getCategory($id){
        $data['cateName']=Category::find($id);
        $data['items']=Product::where('prod_cate',$id)->orderBy('prod_id','desc')->paginate(15);
        return view('frontend.category',$data);
    }

    public function postComment(Request $request, $id){
        $comment=new Comment;
        $comment->com_name=$request->name;
        $comment->com_phone=$request->phone;
        $comment->com_email=$request->email;
        $comment->com_content=$request->content;
        $comment->com_product=$id;
        $comment->save();
        return back();
    }

    public function postRating(Request $request) {
        $data = $request->all();
        $rating = new Rating;
        $rating->rate_vote=$data['vote'];
        $rating->rate_comment=$data['comment'];
        $rating->rate_name=$data['nickname'];
        $rating->rate_phone=$data['numberphone'];
        $rating->rate_email=$data['email'];
        $rating->rate_prod_id=$data['prod_id'];
        $rating->save();
        echo json_encode("done");
    }

    public function getSearch(Request $request){
        $result = $request->result;
        // dd($result);
        $data['keyword'] = $result;
        $convert = str_replace(' ','%',$result);
        $data['items'] =  DB::table('hnl_products')->where('hnl_products.prod_name','like','%'.$convert.'%')->get();
        // dd($data['items'][0]->prod_name);
        return view('frontend.search', $data);
    }

    public function getAutoSearch(Request $request) {
        $data = $request->all();
        if ($data['query']) {
            $convert = str_replace(' ', '%', $data['query']);
            $result = DB::table('hnl_products')->where('hnl_products.prod_name','like','%'.$convert.'%')->get();
            // return $result;
            $output = '<ul class="dropdown-menu" style="display: block; margin: 0; border-radius: 0; background: #fff; width: 100%; padding: 3px 12px;">';
            foreach ($result as $key => $value) {
                $star = '';
                $output .= '<a href="http://localhost:8080/hnl_project/detail/'.$value->prod_id.'/'.$value->prod_slug.'.html" class="li_search"><li class="li_search d-flex" style="padding: 10px 0; border-bottom: 1px solid #eee;"> <img style="width: 70px; height: 70px;" src="http://localhost:8080/hnl_project/lib/storage/app/image/'.$value->prod_img.'"> <div style="margin-left: 10px;"> <p class="m-0" style="font-size: 16px; font-weight: 700; color: #000;">'.$value->prod_name.'</p> <p class="m-0" style="font-size: 17px; font-weight: 600; color: #d70018;">'.number_format($value->prod_price,0,',','.').' ₫ <span style="margin-left: 8px;">';
                if ($value->prod_vote_amount == 0) {
                    for($i = 0; $i < 5; $i++) {
                        $output .= '<i class="fas fa-star" style="color: orange; font-size: 15px"></i>';
                    }
                } else {
                    for($i = 0; $i < 5; $i++) {
                        if($i < $value->prod_rating) {
                            $output .= '<i class="fas fa-star" style="color: orange; font-size: 15px"></i>';
                        } else {
                            $output .= '<i class="fas fa-star" style="color: #ccc; font-size: 15px"></i>';
                        }
                    }
                }
                $output .= '</span></p> <p class="m-0" style="font-size:15px">'.$value->prod_vote_amount.' lượt đánh giá</p> </div> </li> </a>';
            }
            $output .= '</ul>';
            echo $output; 
        }
    }
}
