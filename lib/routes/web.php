<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\Admin;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// ================= Frontend =================
Route::get('/', 'FrontendController@getHome');
// Chi tiết đơn hàng
Route::get('detail/{id}/{slug}.html', 'FrontendController@getDetail');
Route::post('detail/{id}/{slug}.html', 'FrontendController@postComment');
Route::post('insert_rating', 'FrontendController@postRating');
// Danh mục sản phẩm
Route::get('category/{id}/{slug}.html', 'FrontendController@getCategory');
// Tìm kiếm sản phẩm
Route::get('search', 'FrontendController@getSearch');
Route::post('auto_search', 'FrontendController@getAutoSearch');
// Giỏ hàng
Route::group(['prefix'=>'cart'],function(){
	Route::get('add/{id}','CartController@getAddCart');
	Route::get('show','CartController@getShowCart');
	Route::get('update','CartController@getUpdateCart');
	Route::get('delete/{id}','CartController@getDeleteCart');
	Route::post('show','CartController@postComplete');
});
// Thông báo hoàn thành đặt hàng
Route::get('complete','CartController@getComplete');

// ================= Backend =================
Route::group(['namespace'=>'Admin'],function(){
	// Check người dùng đăng nhập
	Route::group(['prefix'=>'login','middleware'=>'CheckLogedIn'],function(){
		Route::get('/','LoginController@getLogin');
		Route::post('/','LoginController@postLogin');
	});
	// Check người dùng đăng xuất
	Route::get('logout','HomeController@getLogout');
	// Người dùng đã đăng nhập
	Route::group(['prefix'=>'admin','middleware'=>'CheckLogedOut'],function(){
		Route::get('home','HomeController@getHome');
		// Thống kê doanh thu
		Route::post('/fillter','HomeController@fillter');
		Route::post('/fillter_select','HomeController@fillter_select');
		Route::post('/order_date','HomeController@order_date');
		// Phân quyền 
		Route::group(['prefix'=>'permission','middleware'=>'CheckPermission:user-list'],function(){
			Route::get('/','UserController@getUser');
			//add user
			Route::get('/add_user','UserController@addUser');
			Route::post('/add_user','UserController@postUser');
			//edit user
			Route::get('/edit/{id}','UserController@getEditUser');
			Route::post('/edit/{id}','UserController@postEditUser');
			//delete user
			Route::get('/delete/{id}','UserController@deleteUser');
		});
		// Vai trò user
		Route::group(['prefix'=>'role', 'middleware'=>'CheckPermission:role-list'],function(){
			//add role
			Route::get('/','RoleController@addRole');
			Route::post('/','RoleController@postRole');
			//edit role
			Route::get('/edit/{id}','RoleController@getEditRole');
			Route::post('/edit/{id}','RoleController@postEditRole');
			//delete role
			Route::get('/delete/{id}','RoleController@deleteRole');
		});
		// Danh mục sản phẩm
		Route::group(['prefix'=>'category', 'middleware'=>'CheckPermission:cate-list'],function(){
			Route::get('/','CategoryController@getCate');
			Route::post('/','CategoryController@postCate');

			Route::get('edit/{id}','CategoryController@getEditCate');
			Route::post('edit/{id}','CategoryController@postEditCate');

			Route::get('delete/{id}','CategoryController@getDeleteCate');
		});
		// Sản phẩm
		Route::group(['prefix'=>'product', 'middleware'=>'CheckPermission:pro-list'],function(){
			Route::get('/','ProductController@getProduct');

			Route::get('add','ProductController@getAddProduct');
			Route::post('add','ProductController@postAddProduct');

			Route::get('edit/{id}','ProductController@getEditProduct');
			Route::post('edit/{id}','ProductController@postEditProduct');

			Route::get('delete/{id}','ProductController@getDeleteproduct');

			//Thêm - Xóa ảnh chi tiết sản phẩm
			Route::get('/sub_image/{id_prod}','ProductImageController@getSubProductImage');
			Route::post('/sub_image/{product_id}','ProductImageController@postSubProductImage');
			Route::get('/delete_sub_image/{product_id}','ProductImageController@getDeleteSubProductImage');

			//Thêm - Sửa thông tin kĩ thuật sản phẩm
			Route::get('/add_specific/{id_prod}','ProductSpecificController@getSpecificInfo');
			Route::post('/add_specific/{id_product}','ProductSpecificController@postSpecificInfo');
			Route::get('/edit_specific/{id_product}','ProductSpecificController@getEditSpecificInfo');
			Route::post('/edit_specific/{id_product}','ProductSpecificController@postEditSpecificInfo');
			Route::get('/delete_specific/{id_product}','ProductSpecificController@getDeleteSpecificInfo');
		});
		// Slider
		Route::group(['prefix'=>'slider', 'middleware'=>'CheckPermission:slide-list'],function(){
			Route::get('/','SliderController@getSlider');

			Route::get('/add','SliderController@getAddSlider');
			Route::post('/add','SliderController@postAddSlider');

			Route::get('edit/{id}','SliderController@getEditSlider');
			Route::post('edit/{id}','SliderController@postEditSlider');

			Route::get('delete/{id}','SliderController@getDeleteSlider');
		});
		// Quản lí đơn hàng
		Route::group(['prefix'=>'order', 'middleware'=>'CheckPermission:order-list'],function(){
			Route::get('/','OrderListController@getOrder');
			Route::get('/waiting_confirm','OrderListController@getOrderWaitingConfirm');
			Route::get('/confirmed','OrderListController@getOrderConfirmed');
			Route::get('/successed','OrderListController@getOrderSuccessed');
			Route::get('/trouble','OrderListController@getOrderTrouble');
			Route::get('detail/{id}','OrderListController@getOrderDetail');
			Route::get('edit/{id}','OrderListController@geteditOrder');
			Route::post('edit/{id}','OrderListController@posteditOrder');

			Route::post('/get_date','OrderListController@getDateRevenue');
		});

		// Doanh thu
		Route::group(['prefix'=>'search'],function(){
			Route::get('/','SearchController@getSearch');

			Route::post('/post_search','SearchController@postValueSearch');
			Route::post('/post_search_order','SearchController@postValueSearchOrder');

			Route::post('/autocomplete_search','SearchController@postAutoSearch');
			Route::post('/autocomplete_search_order','SearchController@postAutoSearchOrder');
		});
	});

	
});