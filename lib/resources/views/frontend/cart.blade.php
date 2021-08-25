@extends('frontend.master')
@section('title','Giỏ hàng')
@section('content')

<section>
    <div class="body">
        <div class="container">
            <div class="row">
                @if(Cart::count()>=1)
                <div class="col-sm-8 offset-2 bg-white">
                    <div class="col-sm-12 d-flex justify-content-between align-items-center mt-3 mb-3">
                       <a href="{{asset('/')}}"><i class="fas fa-chevron-left"></i> Tiếp tục mua sắm sản phẩm</a>
                       <h3 style="font-size: 25px" class="mb-0">Giỏ hàng của bạn</h3>
                   </div>

                   <div class="col-sm-12 mt-4">
                    <form>
                        <table class="table table-bordered table-responsive text-center cart-table">
                            <tr class="active">
                                <td width="11.111%">Ảnh</td>
                                <td width="22.222%">Tên sản phẩm</td>
                                <td width="22.222%">Số lượng</td>
                                <td width="16.6665%">Thành tiền</td>
                                <td width="11.112%">Xóa</td>
                            </tr>
                            @foreach($items as $item)
                            <tr>
                                <td><img height="200px" class="img-responsive" src="{{asset('lib/storage/app/image/'.$item->options->img)}}"></td>
                                <td>{{$item->name}}</td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" type="number" value="{{$item->qty}}" onchange="updateCart(this.value,'{{$item->rowId}}')">
                                    </div>
                                </td>
                                <td><span class="price">{{number_format($item->price*$item->qty,0,',','.')}} đ</span></td>
                                <td><a href="{{asset('cart/delete/'.$item->rowId)}}" class="btn btn-danger">Xóa</a></td>
                            </tr>
                            @endforeach
                        </table>
                    </form>  
                </div>

                <div class="col-sm-12 d-flex justify-content-center align-items-center mt-4 mb-3" id="total-price">
                    <div class="col-md-6 col-sm-12 col-xs-12 total-price_text">                                      
                        Tổng thanh toán: <span class="total-price">{{$total}} đ</span>                          
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 d-flex justify-content-end">
                        <a href="{{asset('/')}}" class="my-btn btn btn-danger mr-2">Mua tiếp</a>
                        <a href="{{asset('cart/delete/all')}}"  onclick="return confirm('Bạn có chắc chắn muốn xóa giỏ hàng?')"  class="my-btn btn btn-danger">Xóa giỏ hàng</a>
                    </div>
                </div>

                <div class="com-sm-12">
                    <h2>Thông tin mua hàng</h2>
                    <form method="post">
                        <div class="form-group mt-3">
                            <label style="font-weight: 400;" for="email">Email address: <span class="text-danger">(*)</span></label>
                            <input required type="email" class="form-control mt-2" id="email" name="email">
                        </div>
                        <div class="form-group mt-3">
                            <label style="font-weight: 400;" for="name">Họ và tên: <span class="text-danger">(*)</span></label>
                            <input required type="text" class="form-control mt-2" id="name" name="name">
                        </div>
                        <div class="form-group mt-3">
                            <label style="font-weight: 400;" for="phone">Số điện thoại: <span class="text-danger">(*)</span></label>
                            <input required type="number" class="form-control mt-2" id="phone" name="phone">
                        </div>
                        <div class="form-group mt-3">
                            <label style="font-weight: 400;" for="add">Địa chỉ: <span class="text-danger">(*)</span></label>
                            <input required type="text" class="form-control mt-2" id="add" name="add">
                        </div>
                        <div class="form-group mt-3">
                            <label style="font-weight: 400;" for="desc">Lời nhắn:</label>
                            <textarea class="form-control" rows="5" name="desc"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <input required="" type="checkbox" id="status" name="status" value="1">
                            <label for="status"> Tôi cam kết thông tin trên đã được xác thực!</label>
                        </div>
                        <div class="form-group mt-3 mb-4 text-right">
                            <button type="submit" class="btn btn-danger cart-button_buy">Thanh Toán Online</button>
                            <!-- <button type="submit" class="btn btn-danger">Thực hiện đơn hàng</button> -->
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
            @else
            <!-- <h2 style="margin-top: 30px; color: #012746;">Giỏ Hàng Của Bạn Rỗng!!!</h2> -->
            <div class="col-sm-8 offset-2 bg-white">
                <div class="col-sm-12 d-flex justify-content-between align-items-center mt-3 mb-3">
                   <a href="{{asset('/')}}"><i class="fas fa-chevron-left"></i> Tiếp tục mua sắm sản phẩm</a>
                   <h3 style="font-size: 25px" class="mb-0">Giỏ hàng của bạn</h3>
               </div>

               <div class="col-sm-12 mt-4 mb-4 d-flex justify-content-center align-items-center flex-column">
                <i class="far fa-frown" style="font-size: 50px"></i>
                <h4 class="pt-4 pb-4">Không có sản phẩm nào trong giỏ hàng, vui lòng tải lại trang</h4>
                <a href="{{asset('/')}}" class="btn btn-outline-danger">Quay về trang chủ</a>
            </div>
        </div>
        @endif
    </div>
</div>
</div>
</section>

@section('javascript')
    function updateCart(qty,rowId){
        $.get(
            '{{asset('cart/update')}}', 
            {qty:qty ,rowId:rowId},
            function(){
                location.reload();
            }
        );
    }
@endsection
@stop
