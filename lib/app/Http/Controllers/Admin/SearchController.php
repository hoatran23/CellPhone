<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Product;

class SearchController extends Controller
{
    //
    public function getSearch() {
    	return view('backend.search');
    }

   	public function postValueSearch(Request $request) {
   		$data = $request->all();
    	if ($data['type_search'] == 'name_search') {
        	$convert = str_replace(' ', '%', $data['keyword']);
	    	$result = DB::table('hnl_products')->where('hnl_products.prod_name','like','%'.$convert.'%')->get();
            // return $result;
	    	$output = '<table class="table table-bordered text-center"> <thead class="text-primary bg-transparent"> <tr> <th>STT</th> <th>ID</th> <th>Tên sản phẩm</th> <th>Giá</th> <th>Lợi nhuận</th> <th>Trạng thái</th> <th>Lượt đánh giá</th> <th>Đánh giá</th> <th>Chọn lựa</th> </tr> </thead> <tbody>';

	    	foreach ($result as $key => $value) {
                $status = '';
                if ($value->prod_status == 1) {
                    $status = 'Đang kinh doanh';
                } else if ($value->prod_status == 0) {
                    $status = 'Tạm dừng';
                }

                $prod_price = number_format((float)$value->prod_price,0,',','.');
                $prod_profit = number_format((float)$value->prod_profit,0,',','.');
    			$output .= '<tr> <td>'.($key + 1).'</td> <td>'.$value->prod_id.'</td> <td>  <a href="http://localhost:8080/hnl_project/detail/'.$value->prod_id.'/'.$value->prod_slug.'.html")}}>'.$value->prod_name.'</a> </td> <td>'.$prod_price.'</td> <td>'.$prod_profit.'</td> <td>'.$status.'</td> <td>'.$value->prod_vote_amount.'</td> <td>'.$value->prod_rating.'</td> <td><a href="http://localhost:8080/hnl_project/admin/product/edit/'.$value->prod_id.'" class="btn btn-warning">Sửa</a> <a href="http://localhost:8080/hnl_project/admin/product/sub_image/'.$value->prod_id.'" class="btn btn-danger">Ảnh</a> </td> </tr>';
    		}
    		$output .= '</tbody></table>';
    	} else if ($data['type_search'] == 'price_search') {
            // dd($data['to_price'], $data['from_price']);
            $from = $data['from_price'];
            $to = $data['to_price'];
            $result = DB::table('hnl_products')->where('hnl_products.prod_price','>', $from)->where('hnl_products.prod_price', '<' , $to)->get();
            
            $output = '<table class="table table-bordered text-center"> <thead class="text-primary bg-transparent"> <tr> <th>STT</th> <th>ID</th> <th>Tên sản phẩm</th> <th>Giá</th> <th>Lợi nhuận</th> <th>Trạng thái</th> <th>Lượt đánh giá</th> <th>Đánh giá</th> <th>Chọn lựa</th> </tr> </thead> <tbody>';

            foreach ($result as $key => $value) {
                $status = '';
                if ($value->prod_status == 1) {
                    $status = 'Đang kinh doanh';
                } else if ($value->prod_status == 0) {
                    $status = 'Tạm dừng';
                }

                $prod_price = number_format((float)$value->prod_price,0,',','.');
                $prod_profit = number_format((float)$value->prod_profit,0,',','.');

                $output .= '<tr> <td>'.($key + 1).'</td> <td>'.$value->prod_id.'</td> <td>  <a href="http://localhost:8080/hnl_project/detail/'.$value->prod_id.'/'.$value->prod_slug.'.html")}}>'.$value->prod_name.'</a> </td> <td>'.$prod_price.'</td> <td>'.$prod_profit.'</td> <td>'.$status.'</td> <td>'.$value->prod_vote_amount.'</td> <td>'.$value->prod_rating.'</td> </tr>';
            }
            $output .= '</tbody></table>';
        } else if ($data['type_search'] == 'id_search') {
            $convert = str_replace(' ', '%', $data['keyword']);
            $result = DB::table('hnl_products')->where('hnl_products.prod_id','like','%'.$convert.'%')->get();

            $output = '<table class="table table-bordered text-center"> <thead class="text-primary bg-transparent"> <tr> <th>STT</th> <th>ID</th> <th>Tên sản phẩm</th> <th>Giá</th> <th>Lợi nhuận</th> <th>Trạng thái</th> <th>Lượt đánh giá</th> <th>Đánh giá</th> <th>Chọn lựa</th> </tr> </thead> <tbody>';

            foreach ($result as $key => $value) {
                $status = '';
                if ($value->prod_status == 1) {
                    $status = 'Đang kinh doanh';
                } else if ($value->prod_status == 0) {
                    $status = 'Tạm dừng';
                }

                $prod_price = number_format((float)$value->prod_price,0,',','.');
                $prod_profit = number_format((float)$value->prod_profit,0,',','.');

                $output .= '<tr> <td>'.($key + 1).'</td> <td>'.$value->prod_id.'</td> <td>  <a href="http://localhost:8080/hnl_project/detail/'.$value->prod_id.'/'.$value->prod_slug.'.html")}}>'.$value->prod_name.'</a> </td> <td>'.$prod_price.'</td> <td>'.$prod_profit.'</td> <td>'.$status.'</td> <td>'.$value->prod_vote_amount.'</td> <td>'.$value->prod_rating.'</td> </tr>';
            }
            $output .= '</tbody></table>';
        } else if ($data['type_search'] == 'category_search') {
            $convert = str_replace(' ', '%', $data['keyword']);
            $result = DB::table('hnl_products')->join('hnl_categories', 'hnl_products.prod_cate', 'hnl_categories.cate_id')->where('hnl_products.prod_name','like','%'.$convert.'%')->get();

            $output = '<table class="table table-bordered text-center"> <thead class="text-primary bg-transparent"> <tr> <th>STT</th> <th>ID</th> <th>Tên sản phẩm</th> <th>Giá</th> <th>Lợi nhuận</th> <th>Trạng thái</th> <th>Lượt đánh giá</th> <th>Đánh giá</th> <th>Chọn lựa</th> </tr> </thead> <tbody>';

            foreach ($result as $key => $value) {
                $status = '';
                if ($value->prod_status == 1) {
                    $status = 'Đang kinh doanh';
                } else if ($value->prod_status == 0) {
                    $status = 'Tạm dừng';
                }

                $prod_price = number_format((float)$value->prod_price,0,',','.');
                $prod_profit = number_format((float)$value->prod_profit,0,',','.');

                $output .= '<tr> <td>'.($key + 1).'</td> <td>'.$value->prod_id.'</td> <td>  <a href="http://localhost:8080/hnl_project/detail/'.$value->prod_id.'/'.$value->prod_slug.'.html")}}>'.$value->prod_name.'</a> </td> <td>'.$prod_price.'</td> <td>'.$prod_profit.'</td> <td>'.$status.'</td> <td>'.$value->prod_vote_amount.'</td> <td>'.$value->prod_rating.'</td> </tr>';
            }
            $output .= '</tbody></table>';
        }
    	echo $output;
   	}

    public function postValueSearchOrder(Request $request) {
        $data = $request->all();
        $convert = str_replace(' ', '%', $data['keyword']);
        if ($data['type_search'] == 'cus_name_search') {
            $result = DB::table('hnl_order')->where('hnl_order.order_name_client','like','%'.$convert.'%')->get();

            $output = '<table class="table table-bordered text-center"> <thead class="text-primary bg-transparent"> <tr> <th>STT</th> <th>ID</th> <th>Tên khách hàng</th> <th>SDT</th> <th>Email</th> <th>Địa chỉ</th> <th>Trạng thái</th> <th>Doanh thu</th> <th>Lợi nhuận</th> <th>Ngày đặt hàng</th> </tr> </thead> <tbody>';

            foreach ($result as $key => $value) {
                $status = '';
                if ($value->order_status == 1) {
                    $status = 'Chờ xác nhận';
                } else if ($value->order_status == 2) {
                    $status = 'Đã xác nhận';
                } else if ($value->order_status == 3) {
                    $status = 'Thành công';
                } else if ($value->order_status == 0) {
                    $status = 'Phát sinh vấn đề';
                }

                $order_total = number_format((float)$value->order_total,0,',','.');
                $order_total_profit = number_format((float)$value->order_total_profit,0,',','.');
                $output .= '<tr> <td>'.($key + 1).'</td> <td> <a href="http://localhost:8080/hnl_project/admin/order/detail/'.$value->order_id.'">'.$value->order_id.'</a> </td> <td>'.$value->order_name_client.'</td> <td>'.$value->order_phone_client.'</td> <td>'.$value->order_mail_client.'</td> <td>'.$value->order_address_client.'</td> <td><a href="http://localhost:8080/hnl_project/admin/order/edit/'.$value->order_id.'">'.$status.'</a></td> <td>'.$order_total.'</td> <td>'.$order_total_profit.'</td> <td>'.$value->order_date.'</td> </tr>';
            }
            $output .= '</tbody></table>';
        } else if ($data['type_search'] == 'cus_phone_search') {
            $result = DB::table('hnl_order')->where('hnl_order.order_phone_client','like','%'.$convert.'%')->get();

            $output = '<table class="table table-bordered text-center"> <thead class="text-primary bg-transparent"> <tr> <th>STT</th> <th>ID</th> <th>Tên khách hàng</th> <th>Email</th> <th>Địa chỉ</th> <th>Trạng thái</th> <th>Doanh thu</th> <th>Lợi nhuận</th> <th>Ngày đặt hàng</th> </tr> </thead> <tbody>';

            foreach ($result as $key => $value) {
                $status = '';
                if ($value->order_status == 1) {
                    $status = 'Chờ xác nhận';
                } else if ($value->order_status == 2) {
                    $status = 'Đã xác nhận';
                } else if ($value->order_status == 3) {
                    $status = 'Thành công';
                } else if ($value->order_status == 0) {
                    $status = 'Phát sinh vấn đề';
                }

                $order_total = number_format((float)$value->order_total,0,',','.');
                $order_total_profit = number_format((float)$value->order_total_profit,0,',','.');
                $output .= '<tr> <td>'.($key + 1).'</td> <td>'.$value->order_id.'</td> <td>'.$value->order_name_client.'</td> <td>'.$value->order_phone_client.'</td> <td>'.$value->order_mail_client.'</td> <td>'.$value->order_address_client.'</td> <td>'.$status.'</td> <td>'.$order_total.'</td> <td>'.$order_total_profit.'</td> <td>'.$value->order_date.'</td> </tr>';
            }
            $output .= '</tbody></table>';
        }
        echo $output;
    }

    public function postAutoSearch(Request $request) {
        $data = $request->all();
        // return $data;
        // return $data['query'];
        if ($data['query']) {
            $convert = str_replace(' ', '%', $data['query']);
            // return $convert;
            if ($data['type_search'] == 'name_search') {
                # code...
                $result = DB::table('hnl_products')->where('hnl_products.prod_name','like','%'.$convert.'%')->get();

                $output = '<ul class="dropdown-menu" style="display: block; position: relative; margin: 0; border-radius: 0; background: #cccccc3b; width: 100%; padding: 4px 12px;">';
                foreach ($result as $key => $value) {
                    $output .= '<li class="li_search" style="padding: 4px 0; border-bottom: 1px solid #CCC;"><a href="#" style="color: #000;">'. $value->prod_name.'</a></li>';
                }
                $output .= '</ul>';
                echo $output; 
            } else if ($data['type_search'] == 'id_search') {
                $result = DB::table('hnl_products')->where('hnl_products.prod_id','like','%'.$convert.'%')->get();

                $output = '<ul class="dropdown-menu" style="display: block; position: relative; margin: 0; border-radius: 0; background: #cccccc3b; width: 100%; padding: 4px 12px;">';
                foreach ($result as $key => $value) {
                    $output .= '<li class="li_search" style="padding: 4px 0; border-bottom: 1px solid #CCC;"><a href="#" style="color: #000;">'. $value->prod_name.'</a></li>';
                }
                $output .= '</ul>';
                echo $output; 
            } else if ($data['type_search'] == 'category_search') {
                $result = DB::table('hnl_products')->join('hnl_categories', 'hnl_products.prod_cate', 'hnl_categories.cate_id')->where('hnl_products.prod_name','like','%'.$convert.'%')->get();

                $output = '<ul class="dropdown-menu" style="display: block; position: relative; margin: 0; border-radius: 0; background: #cccccc3b; width: 100%; padding: 4px 12px;">';
                foreach ($result as $key => $value) {
                    $output .= '<li class="li_search" style="padding: 4px 0; border-bottom: 1px solid #CCC;"><a href="#" style="color: #000;">'. $value->prod_name.'</a></li>';
                }
                $output .= '</ul>';
                echo $output; 
            } 
        }
    }

    public function postAutoSearchOrder(Request $request) {
        $data = $request->all();
        if ($data['query']) {
            $convert = str_replace(' ', '%', $data['query']);
            // return $convert;
            if ($data['type_search'] == 'cus_name_search') {
                # code...
                $result = DB::table('hnl_order')->where('hnl_order.order_name_client','like','%'.$convert.'%')->get();

                $output = '<ul class="dropdown-menu" style="display: block; position: relative; margin: 0; border-radius: 0; background: #cccccc3b; width: 100%; padding: 4px 12px;">';
                foreach ($result as $key => $value) {
                    $output .= '<li class="li_search" style="padding: 4px 0; border-bottom: 1px solid #CCC;"><a href="#" style="color: #000;">'.$value->order_name_client.'</a></li>';
                }
                $output .= '</ul>';
                echo $output; 
            } else if ($data['type_search'] == 'cus_phone_search') {
                $result = DB::table('hnl_order')->where('hnl_order.order_phone_client','like','%'.$convert.'%')->get();

                $output = '<ul class="dropdown-menu" style="display: block; position: relative; margin: 0; border-radius: 0; background: #cccccc3b; width: 100%; padding: 4px 12px;">';
                foreach ($result as $key => $value) {
                    $output .= '<li class="li_search" style="padding: 4px 0; border-bottom: 1px solid #CCC;"><a href="#" style="color: #000;">'.$value->order_name_client.'</a></li>';
                }
                $output .= '</ul>';
                echo $output; 
            }
        }
    }
}
