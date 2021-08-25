<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Mail;

class CartController extends Controller
{
    //
    public function getAddCart($id) {
        $product=Product::find($id);
    	Cart::add(['id' => $id, 'name' => $product->prod_name, 'qty' => 1, 'price' => $product->prod_price, 'options' => ['img' => $product->prod_img, 'profit' => $product->prod_profit]]);   	
    	return redirect('cart/show');
        // $data = Cart::content();
        // dd($data);
    }

    public function getShowCart() {
        $data['total']=Cart::total();
    	$data['items']=Cart::content();
        // dd($data['items']);
    	return view('frontend.cart',$data);
    }

    public function getDeleteCart($id) {
        if ($id=='all') {
    		Cart::destroy();
    	}else{
    		Cart::remove($id);
    	}
    	return back();
    }

    public function getUpdateCart(Request $request){
    	Cart::update($request->rowId, $request->qty);
    }

    public function postComplete(Request $request){
    	$data['info'] = $request->all();
    	$email=$request->email;
    	$data['cart']=Cart::content();
    	$data['total']=Cart::total();
		$length_order = count($data['cart']->all());
		$value = array_values($data['cart']->all());

		$result = 0;
		for($i = 0; $i < $length_order; $i++) {
			$result += array_values((($value[$i]->options)->all()))[1];
		}

		// dd(array_values(((array_values($data['cart']->all())[1]->options)->all())));

		$date = getdate();
		// $id = $date[0]."_".mt_rand()."_".$date['mday'].".".$date['mon'].".".$date['year'];
		// dd($date[0]."_".mt_rand()."_".$date['mday'].".".$date['mon'].".".$date['year']);

		$order = new Order;
		$order->order_name_client = $request->name;
        $order->order_phone_client = $request->phone;
        $order->order_status = $request->status;
        $order->order_mail_client = $request->email;
        $order->order_address_client = $request->add;
        $order->order_desc_client = $request->desc;
		$order->order_date = $date['year']."-".$date['mon']."-".$date['mday'];
		$order->order_total = 0;
		for($i = 0; $i < $length_order; $i++) {
			$order->order_total += intval($value[$i]->price);
		}
        $order->order_total_profit = $result;
		$order->save();
        $id = DB::getPdo()->lastInsertId(); // Hàm để get ra id vừa nhập
        // dd(DB::getPdo()->lastInsertId());

		for($i = 0; $i < $length_order; $i++) {
			$order_detail = new OrderDetail;
			$order_detail->order_id_product = $value[$i]->id;
			$order_detail->order_name_product = $value[$i]->name;
			$order_detail->order_qty_product = $value[$i]->qty;
			$order_detail->order_price_product = $value[$i]->price;
			$order_detail->order_img_product = $value[$i]->options->first();
			$order_detail->order_id_detail = $id;
			$order_detail->order_prod_profit = array_values((($value[$i]->options)->all()))[1];
			$order_detail->save();
		}
		
		
    	Mail::send('frontend.email',$data,function($message)use($email){
    		$message->from('trantuyhoa2307@gmai.com','Hoa Tran');
    		$message->to($email,$email);
    		$message->cc('bubutran23@gmai.com','Hoa Tran');
    		$message->subject('Xác Nhận Hóa Đơn Mua Hàng HNLShop');
    	});
    	Cart::destroy();
    	return redirect('complete');
    }

    public function getComplete(){
    	return view('frontend.complete');
    }
}
