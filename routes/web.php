<?php

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



//Route::get('/', function () {
//    return view('welcome');
//});

    Route::domain('admin.shop.1910.com')->group(function(){
        Route::get('/',function(){
            return redirect('/admin');
        });
    });

    Route::domain('shop.1910.com')->group(function () {


    Route::prefix('/cart')->group(function (){  //购物车
       Route::get('/addcart','Index\CartController@addcart');  //加入购物车
        Route::get('/index','Index\CartController@cartList');  //购物车页面
    });


        Route::get('/','Index\Product_listController@index'); //前台首页展示

        //   商品
        Route::get('/product_list','Index\Product_listController@product_list'); //商品展示
        Route::get('/product_details/{good_id}','Index\Product_listController@product_details');   //商品详情
          //商品详情
        Route::view('/wishlist','Index.wishlist');  //我的收藏
        //评价
        Route::post('/comment','Index\CommentController@comment');

        Route::post('/collect_do','Index\Product_listController@collect_do'); //收藏

//



        Route::get('github','GitHubController@index'); //github视图
        Route::get('github/callback','GitHubController@callback'); //github回调
        Route::get('alipay','AliController@alipay'); //支付

        Route::view('/checkout','Index.checkout');  //支付
        Route::view('/blog','Index.blog');  //历史记录
        Route::view('/blog_single','Index.blog_single');
        Route::view('/error_404','Index.error_404');   //报错404
        Route::view('/testimonial','Index.testimonial');  //推荐用户
        Route::view('/about_us','Index.about_us');  //关于我们
        Route::view('/contact','Index.contact');    //联系人
        Route::view('/setting','Index.setting');    //设置
    //    登录
        Route::view('/login','Index.login');
        Route::post('/login','Index\IndexController@login');
    //    注册
        Route::view('/register','Index.register');
        Route::post('/register','Index\IndexController@register');

    //    定时任务 <视频转码>
	Route::get('/vedioCron','Index\VedioCron@codec');






    });
