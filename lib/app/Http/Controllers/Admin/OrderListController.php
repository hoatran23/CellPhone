<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use Cart;

class OrderListController extends Controller
{
    //
    public function getOrder() {
        $data['orderwaitingconfirm'] = count(DB::table('hnl_order')->where('hnl_order.order_status', '1')->get());
        $data['orderconfirmed'] = count(DB::table('hnl_order')->where('hnl_order.order_status', '2')->get());
        $data['ordersuccessed'] = count(DB::table('hnl_order')->where('hnl_order.order_status', '3')->get());
        $data['ordertrouble'] = count(DB::table('hnl_order')->where('hnl_order.order_status', '0')->get());
        $data['highest_value'] = DB::table('hnl_order')->take(10)->orderBy('hnl_order.order_total_profit','DESC')->get();   
        // dd($data['highest_value']);
        return view('backend.order', $data);
    }

    public function getOrderWaitingConfirm() {
        $data['waiting_confirm'] = DB::table('hnl_order')->where('hnl_order.order_status', '1')->orderBy('order_id', 'DESC')->paginate(10, ['*'], 'waiting_confirm');
        $data['total']=Cart::total();
        return view('backend.orderwaitingconfirm', $data);
    }

    public function getOrderConfirmed() {
        $data['confirmed'] = DB::table('hnl_order')->where('hnl_order.order_status', '2')->orderBy('order_id', 'DESC')->paginate(10, ['*'], 'confirmed');
        $data['total']=Cart::total();
        return view('backend.orderconfirmed', $data);
    }

    public function getOrderSuccessed() {
        $data['successed'] = DB::table('hnl_order')->where('hnl_order.order_status', '3')->orderBy('order_id', 'DESC')->paginate(10, ['*'], 'successed');
        $data['total']=Cart::total();
        return view('backend.ordersuccessed', $data);
    }

    public function getOrderTrouble() {
        $data['trouble'] = DB::table('hnl_order')->where('hnl_order.order_status', '0')->orderBy('order_id', 'DESC')->paginate(10, ['*'], 'trouble');
        $data['total']=Cart::total();
        return view('backend.ordertrouble', $data);
    }

    public function getOrderDetail($id) {
        $data['data_detail'] = DB::table('hnl_order')->join('hnl_order_detail', 'hnl_order.order_id','=','hnl_order_detail.order_id_detail')->where('hnl_order.order_id', '=', $id)->get();
        $order_list_detail['order_list_detail'] = $data['data_detail']->all();
        $total_order['total_order'] = count($order_list_detail['order_list_detail']);
        // dd($data['data_detail']);
        return view('backend.orderdetail', $order_list_detail, $total_order); 
    }

    public function geteditOrder($id) {
        $data['orderlist'] = DB::table('hnl_order')->where('hnl_order.order_id', '=', $id)->orderBy('order_id', 'DESC')->get();
        $data['order'] = $data['orderlist']->first();
        // dd( $data['order']);
        return view('backend.orderedit', $data);
    }

    public function posteditOrder(Request $request, $id) {
        // $order =  DB::table('hnl_order')->find($id);
        $order =  Order::find($id);
        $order->order_status = $request->status;
        $order->save();
        return redirect()->intended('/admin/order')->with('status', 'Order Status Updated!');
    }

    public function getDateRevenue(Request $request) {
        $data = $request->all();
        $date = explode("-",  $data['month']);
        $month = $date[1];
        $year = $date[0];

        $total = Order::whereYear('order_date', '=', $year)->whereMonth('order_date', '=', $month)->where('order_status', 3)->get();
        return $total;
    }
}
