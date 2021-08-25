<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <base href="{{asset('public/asset/backend')}}/">

  <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
  <link rel="icon" type="image/png" href="img/favicon.png">

  <title>HNL Shop - @yield('title')</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous"/>

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />

  <!-- morris_js -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

  <!-- CSS Files -->
  <link href="css/style.css" rel="stylesheet"/>
  @yield('css')
</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo pb-2">
        <a href="{{asset('admin/home')}}" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="img/logo-small.png">
          </div>
        </a>
        <a href="{{asset('admin/home')}}" class="mt-1 mb-2 logo-normal text-decoration-none">
         {{Auth::user()->email}}
       </a>
     </div>
     <div class="sidebar-wrapper overflow-hidden">
      <ul class="nav">
        <li id="bar_one">
          <a href="{{asset('admin/home')}}">
            <i class="nc-icon nc-bank"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li id="bar_two">
          <a href="{{asset('admin/product')}}">
            <i class="nc-icon nc-diamond"></i>
            <p>Product</p>
          </a>
        </li>
        <li id="bar_three">
          <a href="{{asset('admin/category')}}">
            <i class="nc-icon nc-pin-3"></i>
            <p>Category</p>
          </a>
        </li>
        <li id="bar_four">
          <a href="{{asset('admin/slider')}}">
            <i class="fab fa-slideshare"></i>
            <p>Slider</p>
          </a>
        </li>
        <li id="bar_five">
          <a href="{{asset('admin/order')}}">
            <i class="fas fa-receipt"></i>
            <p>Order</p>
          </a>
        </li>
        <li id="bar_six">
          <a href="{{asset('admin/search')}}">
            <i class="fab fa-searchengin"></i>
            <p>Search</p>
          </a>
        </li>
        <li id="bar_seven">
          <a href="{{asset('admin/permission')}}">
            <i class="fas fa-users"></i>
            <p>User</p>
          </a>
        </li>
        <li id="bar_eight">
          <a href="{{asset('admin/role')}}">
            <i class="fas fa-user-tag"></i>
            <p>Role</p>
          </a>
        </li>
      </ul>
    </div>
  </div>

  <div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <div class="navbar-toggle">
            <button type="button" class="navbar-toggler">
              <span class="navbar-toggler-bar bar1"></span>
              <span class="navbar-toggler-bar bar2"></span>
              <span class="navbar-toggler-bar bar3"></span>
            </button>
          </div>
          <a class="navbar-brand"  href="{{asset('admin/home')}}">HNL Admin</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar navbar-kebab"></span>
          <span class="navbar-toggler-bar navbar-kebab"></span>
          <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
          <ul class="navbar-nav">
            <li class="nav-item btn-rotate dropdown">
              <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="nc-icon nc-bell-55"></i>
                <p>
                  <span class="d-md-block">Actions</span>
                </p>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item text-right" href="{{asset('logout')}}">Logout <i class="fas fa-sign-out-alt"></i></a> 
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    @yield('main')

    <!-- Footer -->
      <!-- <footer class="footer">
       
      </footer> -->
    </div>
  </div>
</div>
<!--   Core JS Files   -->
<script src="js/core/jquery.min.js"></script>
<script src="js/core/popper.min.js"></script>
<script src="js/core/bootstrap.min.js"></script>
<script src="js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
<!-- Chart JS -->
<!-- <script src="js/plugins/chartjs.min.js"></script> -->
<!--  Notifications Plugin    -->
<!-- <script src="js/plugins/bootstrap-notify.js"></script> -->
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<!-- <script src="js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>Paper Dashboard DEMO methods, don't include it in your project! -->
<!-- <script src="demo/demo.js"></script> -->

<!-- datepicker -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- CK Editor -->
<script type="text/javascript" src="../../../../../hnl_project/public/editor/ck/ckeditor.js"></script>

<script>
  $(document).ready(function() {
    $('#avatar').click(function(){
      $('#img').click();
    });

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    @yield('jquery')
  });
  @yield('javascript')
  function changeImg(input){
    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
    if(input.files && input.files[0]){
      var reader = new FileReader();
      //Sự kiện file đã được load vào website
      reader.onload = function(e){
        //Thay đổi đường dẫn ảnh
        $('#avatar').attr('src',e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@yield('jquery1')
</body>
</html>