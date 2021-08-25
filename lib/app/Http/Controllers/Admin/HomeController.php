<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;  
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Comment;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    //
    public function getHome(){
        //comment
        $data['comment'] = DB::table('hnl_comment')->orderBy('hnl_comment.com_id', 'DESC')->paginate(5, ['*'], 'comment');
        $data['product'] = DB::table('hnl_products')->get();
        // dd($data['product']);
        $data['product_rate'] = DB::table('hnl_products')->where('hnl_products.prod_vote_amount', '>', 0)->paginate(5, ['*'], 'rating');
        // dd($data['product_rate']);
        $data['product_count'] = count(DB::table('hnl_products')->get());
        $data['comment_count'] = count(DB::table('hnl_comment')->get());
        $data['user_count'] = count(DB::table('hnl_user')->get());
        $data['category_count'] = count(DB::table('hnl_categories')->get());
        $data['order_count'] = count(DB::table('hnl_order')->get());
        $data['product_rating'] = count(DB::table('hnl_product_rating')->get());
        $data['product_image'] = count(DB::table('hnl_product_image')->get());
        $data['role_user'] = count(DB::table('hnl_role')->get());
        // dd($data['category_count']);
    	return view('backend.index', $data);
    }

    public function fillter(Request $request) {
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $result = DB::table('hnl_order')->whereBetween('hnl_order.order_date', [$from_date, $to_date])->orderBy('hnl_order.order_date', 'ASC')->select('hnl_order.order_date', 'hnl_order.order_total_profit', 'hnl_order.order_total')->get();
     
        foreach($result as $key => $val) {
            $chart_data[] = array(
                'date' => $val->order_date,
                'profit' => $val->order_total_profit,
                'total' => $val->order_total
            );
        }
        echo $data = json_encode($chart_data);
    }

    public function fillter_select(Request $request) {
        $data = $request->all();

        $dau_thang_nay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thang_truoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thang_truoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $bay_ngay_qua = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $nam_qua = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

        $hom_nay = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
       
        if ($data['btn_value'] == 'tuanqua') {
            $result = DB::table('hnl_order')->whereBetween('hnl_order.order_date', [$bay_ngay_qua, $hom_nay])->orderBy('hnl_order.order_date', 'ASC')->select('hnl_order.order_date', 'hnl_order.order_total_profit', 'hnl_order.order_total')->get();
        } 
        else if ($data['btn_value'] == 'thangtruoc') {
            $result = DB::table('hnl_order')->whereBetween('hnl_order.order_date', [$dau_thang_truoc, $cuoi_thang_truoc])->orderBy('hnl_order.order_date', 'ASC')->select('hnl_order.order_date', 'hnl_order.order_total_profit', 'hnl_order.order_total')->get();
        }
        else if ($data['btn_value'] == 'thangnay') {
            $result = DB::table('hnl_order')->whereBetween('hnl_order.order_date', [$dau_thang_nay, $hom_nay])->orderBy('hnl_order.order_date', 'ASC')->select('hnl_order.order_date', 'hnl_order.order_total_profit', 'hnl_order.order_total')->get();
        }
        else {
            $result = DB::table('hnl_order')->whereBetween('hnl_order.order_date', [$nam_qua, $hom_nay])->orderBy('hnl_order.order_date', 'ASC')->select('hnl_order.order_date', 'hnl_order.order_total_profit', 'hnl_order.order_total')->get();
        }

        foreach($result as $key => $val) {
            $chart_data[] = array(
                'date' => $val->order_date,
                'profit' => $val->order_total_profit,
                'total' => $val->order_total
            );
        }
        echo $data = json_encode($chart_data);
    }

    public function order_date(Request $request) {
        $thang_qua = Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->toDateString();
        $hom_nay = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $result = DB::table('hnl_order')->whereBetween('hnl_order.order_date', [$thang_qua, $hom_nay])->orderBy('hnl_order.order_date', 'ASC')->select('hnl_order.order_date', 'hnl_order.order_total_profit', 'hnl_order.order_total')->get();
        foreach($result as $key => $val) {
            $chart_data[] = array(
                'date' => $val->order_date,
                'profit' => $val->order_total_profit,
                'total' => $val->order_total
            );
        }
        echo $data = json_encode($chart_data);
    }

    public function getLogout(){
    	Auth::logout();
    	return redirect()->intended('login');
    }
}
