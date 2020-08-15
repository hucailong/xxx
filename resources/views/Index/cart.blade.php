@extends('layouts.app')
@section('title', '前台')
@section('content')
    <!-- cart -->
    <div class="cart section">
        <div class="container">
            <div class="pages-head">
                <h3>CART</h3>
            </div>
            <div class="content">
            @foreach($goods as $k=>$v)
                <div class="cart-1">
                    <div class="row">
                        <div class="col s5">
                            <h5>图片</h5>
                        </div>
                        <div class="col s7">
                            <img src="{{$v['goods_img']}}" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s5">
                            <h5>名称</h5>
                        </div>
                        <div class="col s7">
                            <h5><a href="">{{$v['goods_name']}}</a></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s5">
                            <h5>数量</h5>
                        </div>
                        <div class="col s7">
                            <input value="{{$v['num']}}" type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s5">
                            <h5>价钱</h5>
                        </div>
                        <div class="col s7">
                            <h5>${{$v['shop_price']}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s5">
                            <h5>操作</h5>
                        </div>
                        <div class="col s7">
                            <h5><i class="fa fa-trash"></i></h5>
                        </div>
                    </div>
                </div>
                <div class="divider"></div>
            @endforeach
            </div>
            <div class="total">
                <div class="row">
                    <div class="col s7">
                        <h5>Fashion Men's</h5>
                    </div>
                    <div class="col s5">
                        <h5>$21.00</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col s7">
                        <h5>Fashion Men's</h5>
                    </div>
                    <div class="col s5">
                        <h5>$20.00</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col s7">
                        <h6>Total</h6>
                    </div>
                    <div class="col s5">
                        <h6>$41.00</h6>
                    </div>
                </div>
            </div>
            <button class="btn button-default">提交订单</button>
        </div>
    </div>
    <!-- end cart -->
@endsection
