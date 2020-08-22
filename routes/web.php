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

Route::get('/test','Index\IndexController@test');
    Route::domain(env('ITEM_HOSTS_HTTP_ADMIN'))->group(function(){
        Route::get('/',function(){
            return redirect('/admin');
        });
    });

    Route::domain(env('`ITEM_HOSTS_HTTP`'))->group(function () {

        Route::get('/','Index\Product_listController@index'); //前台展示
    //    商品
        Route::view('/product_list','Index.product_list'); //商品展示
        Route::get('/product_details/{good_id}','Index\Product_listController@product_details');   //商品详情

        Route::post('/comment','Index\CommentController@comment');  //添加评论

        Route::get('/addcart/{good_id}','Index\CartController@addcart');  //加入购物车
        Route::view('/wishlist','Index.wishlist');  //我的收藏



    Route::prefix('/cart')->group(function (){  //购物车
       Route::get('/addcart','Index\CartController@addcart');  //加入购物车
        Route::get('/index','Index\CartController@cartList');  //购物车页面
    });
        Route::prefix('/order')->group(function (){  //订单
            Route::get('/queren','Index\OrderController@queren');
            Route::get('/generate','Index\OrderController@generate');
            Route::any('/orderSubmit','Index\OrderController@orderSubmit');


        });

        Route::get('/','Index\Product_listController@index'); //前台首页展示

        //   商品
        Route::any('/product_list','Index\Product_listController@product_list'); //商品展示
        Route::get('/product_details/{good_id}','Index\Product_listController@product_details');   //商品详情


          //商品详情
        Route::prefix('/cart')->group(function (){  //购物车
           Route::get('/addcart','Index\CartController@addcart');  //加入购物车
            Route::get('/index','Index\CartController@cartList');  //购物车页面
        });

        Route::get('/wishlist_list','Index\WishController@wishlist');  //我的收藏
        //评价
        Route::post('/comment','Index\CommentController@comment');
        //Route::('/wishlist_list','Index\Product_listController@product_details');   //商品详情
        Route::get('/collect','Index\Product_listController@collect'); //收藏

        Route::get('/alipay/yonghu','AliController@yonghu'); //github视图

        Route::get('github','GitHubController@index'); //github视图
        Route::get('github/callback','GitHubController@callback'); //github回调
        Route::get('alipay','AliController@alipay'); //支付
        Route::get('center','LinkageController@center'); //个人中心
        Route::any('area','LinkageController@area'); //三级联动
        


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
        Route::get('/quit','Index\IndexController@quit');
        Route::get('/back/pwd','Index\BackController@back');
        Route::post('/back/pwds','Index\BackController@backs');
        Route::get('/back/resetpass','Index\BackController@resetpass');
        Route::post('/back/reset','Index\BackController@reset');




        //    注册
        Route::view('/register','Index.register');
        Route::post('/register','Index\IndexController@register');

    //获取验证码
        Route::post('/verify_code','Index\IndexController@verify_code');


    //    定时任务 <视频转码>
	Route::get('/vedioCron','Index\VedioCron@codec');

//	服务
        Route::view('/Free_shipping','Index.Free_shipping');
        Route::view('/fast_refund','Index.fast_refund');
        Route::view('/Secure_payment','Index.Secure_payment');
        Route::view('/return','Index.return');


    Route::get('/findpass','FindPassController@findpass'); //修改密码
    Route::post('/findpassdo','FindPassController@findpassdo'); //执行修改密码





    });
