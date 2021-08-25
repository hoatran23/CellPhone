@extends('backend.master')
@section('title', 'Danh Mục Sản Phẩm')
@section('main')  

@section('javascript')
var bar = document.getElementById('bar_six');
bar.classList.add('active');
@endsection

<div class="content">
   <div class="row ">
      <div class="col-sm-12">
         <div class="card border border-success">
            <div class="card-header">
               <h4 class="card-title text-center">Search Product</h4>
               @if (session('status'))
               <div class="alert alert-success text-center" style="font-weight: 500; font-size: 16px">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close" style="margin-top: 10px">&times;</a> {{session('status')}}
               </div>
               @endif
            </div>

            <div class="card-body">
               <div class="card">
                  <div class="card-body shadow-sm rounded-3">
                     @include('errors.note')
                     <form method="post">
                        <div class="form-group">
                           <label>Chọn loại tìm kiếm:</label>
                           <select class="form-control" name="tracuu" id="loai_tra_cuu" required>
                              <option value="">--- Chọn loại tìm kiếm ---</option>
                              <option value="name_search">Tìm theo tên</option>
                              <option value="price_search">Tìm theo giá</option>
                              <option value="id_search">Tìm theo ID</option>
                              <option value="category_search">Tìm theo danh mục</option>
                           </select>
                        </div>

                        <div class="row">
                           <div class="form-group col-sm-6">
                              <label>Tìm theo tên:</label>
                              <input type="text" class="form-control" id="name_search" placeholder="Nhập vào tên sản phẩm" autocomplete="off" disabled>
                              <div id="box_name"></div>
                           </div>
                           <div class="form-group col-sm-6">
                              <label>Tìm theo giá:</label>
                              <span id="show_price">0 -</span>
                              <span id="show_price_1">0</span>
                              <label class="d-block">From:</label>
                              <input type="range" min="1000000" max="50000000" step="1000000" class="form-range"  id="price_search" placeholder="Nhập vào giá sản phẩm" disabled>
                              <label>To:</label>
                              <input type="range" min="1000000" max="50000000" step="1000000" class="form-range"  id="price_search_1" placeholder="Nhập vào giá sản phẩm" disabled>
                           </div>
                        </div>

                        <div class="row">
                           <div class="form-group col-sm-6">
                              <label>Tìm theo ID:</label>
                              <input type="text" class="form-control" id="id_search" placeholder="Nhập vào id sản phẩm" disabled>
                              <div id="box_id"></div>
                           </div>
                           <div class="form-group col-sm-6">
                              <label>Tìm theo danh mục:</label>
                              <input type="text" class="form-control" id="category_search" placeholder="Nhập vào danh mục sản phẩm" disabled>
                              <div id="box_cate"></div>
                           </div>
                        </div>
                        
                        <div class="form-group">
                           <input type="button" id="timkiem" name="button" value="Tìm kiếm" class="btn bg-success text-white">
                           <a href="{{asset('admin/search')}}" class="btn btn-warning">Clear</a>
                        </div>
                        {{csrf_field()}}
                     </form>
                     <div id="result"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="row ">
      <div class="col-sm-12">
         <div class="card border border-success">
            <div class="card-header">
               <h4 class="card-title text-center">Search Order</h4>
               @if (session('status'))
               <div class="alert alert-success text-center" style="font-weight: 500; font-size: 16px">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close" style="margin-top: 10px">&times;</a> {{session('status')}}
               </div>
               @endif
            </div>

            <div class="card-body">
               <div class="card">
                  <div class="card-body shadow-sm rounded-3">
                     @include('errors.note')
                     <form method="post">
                        <div class="form-group">
                           <label>Chọn loại tìm kiếm:</label>
                           <select class="form-control" name="tracuu" id="order_search" required>
                              <option value="">--- Chọn loại tìm kiếm ---</option>
                              <option value="cus_name_search">Tìm theo tên khách hàng</option>
                              <option value="cus_phone_search">Tìm theo số điện thoại</option>
                           </select>
                        </div>

                        <div class="row">
                           <div class="form-group col-sm-6">
                              <label>TTìm theo tên khách hàng:</label>
                              <input type="text" class="form-control" id="cus_name_search" placeholder="Nhập vào tên khách hàng" disabled>
                              <div id="box_order_cus_name"></div>
                           </div>
                           <div class="form-group col-sm-6">
                              <label>Tìm theo số điện thoại:</label>
                              <input type="text" class="form-control" id="cus_phone_search" placeholder="Nhập vào số điện thoại" disabled>
                              <div id="box_order_cus_phone"></div>
                           </div>
                        </div>
                        
                        <div class="form-group">
                           <input type="button" id="order_search_btn" name="button" value="Tìm kiếm" class="btn bg-success text-white">
                           <a href="{{asset('admin/search')}}" class="btn btn-warning">Clear</a>
                        </div>
                        {{csrf_field()}}
                     </form>
                     <div id="result_order"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@section('jquery1')
<script>
   $(document).ready(function() {
      $('#loai_tra_cuu').change(function(event) {
        // alert($('#loai_tra_cuu').val());
        var loai_tra_cuu = $('#loai_tra_cuu').val();
        $('#name_search').prop('disabled', true);
        $('#price_search').prop('disabled', true);
        $('#price_search_1').prop('disabled', true);
        $('#id_search').prop('disabled', true);
        $('#category_search').prop('disabled', true);
        
        if (loai_tra_cuu == "name_search") {
          $('#name_search').removeAttr("disabled");
        } else if (loai_tra_cuu == "price_search") {
          $('#price_search').removeAttr("disabled");
          $('#price_search_1').removeAttr("disabled");
        } else if (loai_tra_cuu == "id_search") {
          $('#id_search').removeAttr("disabled");
        } else if (loai_tra_cuu == "category_search") {
          $('#category_search').removeAttr("disabled");
        }
      });

      $(document).click(function (e) {
         $(".dropdown-menu").hide();
      })

      $('#price_search').change(function(event) {
         $('#show_price').html($('#price_search').val() + '-');
      });
      $('#price_search_1').change(function(event) {
         $('#show_price_1').html($('#price_search_1').val());
      });

      $('#timkiem').click(function(event) {
         var _token = $('input[name="_token"]').val();
         var type_search = $('#loai_tra_cuu').val();
         // alert(type_search);
         var keyword, from_price, to_price;
         if (type_search == 'name_search') {
            keyword = $('#name_search').val();
         } else if (type_search == 'price_search') {
            from_price = $('#price_search').val();
            to_price = $('#price_search_1').val();
         } else if (type_search == 'id_search') {
            keyword = $('#id_search').val();
         } else if (type_search == 'category_search') {
            keyword = $('#category_search').val();
         }
         // alert(from_price);
         // console.log(from_price, to_price);
         $.ajax({    
            url:"{{url('admin/search/post_search')}}",
            method: "POST",
            // dataType: "JSON",
            data: {_token: _token, keyword: keyword, type_search: type_search, from_price: from_price, to_price: to_price},
            success: function(response) {
               console.log(response);
               $("#result").html(response);
            }
          })
      });

      function tu_dong_nhap($o_nhap, $hien_thi) {
          $('#'+$o_nhap).keyup(function(event) {
              var query = $(this).val();
              // alert(query); 
              if (query != '' || query == 0) {
                  var _token = $('input[name="_token"]').val();
                  var type_search = $('#loai_tra_cuu').val();

                  $.ajax({    
                      url:"{{url('admin/search/autocomplete_search')}}",
                      method: "POST",
                      // dataType: "JSON",
                      data: {_token: _token, query: query, type_search: type_search},
                      success: function(response) {
                          console.log(response);
                          if (response != '<ul class="dropdown-menu clos" style="display: block; position: relative;"></ul>') {
                              $('#' + $hien_thi).fadeIn();
                              $('#' + $hien_thi).html(response);
                          } else {
                              $('#' + $hien_thi).fadeIn();
                              $('#' + $hien_thi).html('<ul class="dropdown-menu clos" style="display: block; position: relative; width: 100%;"><li class="li_search"><a href="#" "="">Không có trong CSDL</a></li></ul>');
                          }
                      }
                  })
              } else {
                  $('#' + $hien_thi).fadeOut();
              }
          });
      }

      function tu_dong_nhap_order($o_nhap, $hien_thi) {
          $('#'+$o_nhap).keyup(function(event) {
              var query = $(this).val();
              // alert(query); 
              if (query != '' || query == 0) {
                  var _token = $('input[name="_token"]').val();
                  var type_search = $('#order_search').val();

                  $.ajax({    
                      url:"{{url('admin/search/autocomplete_search_order')}}",
                      method: "POST",
                      // dataType: "JSON",
                      data: {_token: _token, query: query, type_search: type_search},
                      success: function(response) {
                          console.log(response);
                          if (response != '<ul class="dropdown-menu clos" style="display: block; position: relative;"></ul>') {
                              $('#' + $hien_thi).fadeIn();
                              $('#' + $hien_thi).html(response);
                          } else {
                              $('#' + $hien_thi).fadeIn();
                              $('#' + $hien_thi).html('<ul class="dropdown-menu clos" style="display: block; position: relative; width: 100%;"><li class="li_search"><a href="#" "="">Không có trong CSDL</a></li></ul>');
                          }
                      }
                  })
              } else {
                  $('#' + $hien_thi).fadeOut();
              }
          });
      }
      $('#loai_tra_cuu').change(function(event) {
          /* Act on the event */
          // console.log($('#loai_tra_cuu').val());
          if ($('#loai_tra_cuu').val() == 'name_search') {
              tu_dong_nhap('name_search', 'box_name');
          } else if ($('#loai_tra_cuu').val() == 'id_search') {
              tu_dong_nhap('id_search', 'box_id');
          } else if ($('#loai_tra_cuu').val() == 'category_search') {
              tu_dong_nhap('category_search', 'box_cate');
          } 
      });

      $(document).on('click', '#box_name .li_search', function(event) {
          event.preventDefault();
          $('#name_search').val($(this).text());
          $('#box_name').fadeOut();     
      });

      $(document).on('click', '#box_id .li_search', function(event) {
          event.preventDefault();
          $('#id_search').val($(this).text());
          $('#li_search').fadeOut();     
      });

      $(document).on('click', '#box_cate .li_search', function(event) {
          event.preventDefault();
          $('#category_search').val($(this).text());
          $('#box_cate').fadeOut();     
      });

      // ===============================================
      $('#order_search').change(function(event) {
        // alert($('#loai_tra_cuu').val());
        var loai_tra_cuu = $('#order_search').val();
        $('#cus_name_search').prop('disabled', true);
        $('#cus_name_search').prop('disabled', true);
        
        if (loai_tra_cuu == "cus_name_search") {
          $('#cus_name_search').removeAttr("disabled");
        } else if (loai_tra_cuu == "cus_phone_search") {
          $('#cus_phone_search').removeAttr("disabled");
        }
      });

      $('#order_search_btn').click(function(event) {
        var _token = $('input[name="_token"]').val();
        var type_search = $('#order_search').val();

        var keyword;
        if (type_search == 'cus_name_search') {
          keyword = $('#cus_name_search').val();
        } else if (type_search == 'cus_phone_search') {
          keyword = $('#cus_phone_search').val();
        }
        // console.log(keyword);

       $.ajax({    
          url:"{{url('admin/search/post_search_order')}}",
          method: "POST",
          // dataType: "JSON",
          data: {_token: _token, keyword: keyword, type_search: type_search},
          success: function(response) {
             console.log(response);
             $("#result_order").html(response);
          }
        })
      });

      $("#order_search").change(function(event) {
        var type_search = $('#order_search').val();

        if (type_search == 'cus_name_search') {
          tu_dong_nhap_order('cus_name_search', 'box_order_cus_name');
        } else if (type_search == 'cus_phone_search') {
          tu_dong_nhap_order('cus_phone_search', 'box_order_cus_phone');
        }
      });

      $(document).on('click', '#box_order_cus_name .li_search', function(event) {
          event.preventDefault();
          $('#cus_name_search').val($(this).text());
          $('#box_order_cus_name').fadeOut();     
      });

      $(document).on('click', '#box_order_cus_phone .li_search', function(event) {
          event.preventDefault();
          $('#cus_phone_search').val($(this).text());
          $('#box_order_cus_phone').fadeOut();     
      });
   });
</script>
@endsection
@stop   