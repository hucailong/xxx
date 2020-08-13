@extends('layouts.app')
@section('title', '前台')
@section('content')
    <!-- product_details -->
    <div class="pages section">
        <div class="container">
            <div class="shop-single">
                <img src="{{$good_info['goods_img']}}" alt="">
                <div class="prism-player" id="player-con"></div><br>
                <h5>{{$good_info['goods_name']}}</h5>
                <div class="price">${{$good_info['shop_price']}} <span>$28</span></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam eaque in non delectus, error iste veniam commodi mollitia, officia possimus, repellendus maiores doloribus provident. Itaque, ab perferendis nemo tempore! Accusamus</p>
                <a href="{{url('/index/addcart/'.$good_info['goods_id'])}}"><button type="button" class="btn button-default">加入购物车</button></a>
            </div>
            <div class="review">

                <h5>全部评价:</h5>
                <div class="review-details">
                    <div class="col s3">
                        <img src="" alt="" class="responsive-img">
                    </div>
                    <div class="col s9">
                        <div class="review-title">
                            <span><strong>John Doe</strong> | Juni 5, 2016 at 9:24 am | <a href="">Reply</a></span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis accusantium corrupti asperiores et praesentium dolore.</p>
                    </div>
                </div>

            </div>
{{--            <div class="review-form">--}}
{{--                <div class="review-head">--}}
{{--                    <h5>我的评价</h5>--}}
{{--                    <p></p>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <form class="col s12 form-details">--}}
{{--                        <div class="input-field">--}}
{{--                            <input type="text" required class="validate" placeholder="NAME">--}}
{{--                        </div>--}}
{{--                        <div class="input-field">--}}
{{--                            <input type="email" class="validate" placeholder="EMAIL" required>--}}
{{--                        </div>--}}
{{--                        <div class="input-field">--}}
{{--                            <input type="text" class="validate" placeholder="SUBJECT" required>--}}
{{--                        </div>--}}
{{--                        <div class="input-field">--}}
{{--                            <textarea name="textarea-message" id="textarea1" cols="30" rows="10" class="materialize-textarea" class="validate" placeholder="YOUR REVIEW"></textarea>--}}
{{--                        </div>--}}
{{--                        <div class="form-button">--}}
{{--                            <div class="btn button-default">发表评价</div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
    <!-- end product_details -->
    <script>
        var player = new Aliplayer({
                "id": "player-con",
                "source": "/storage/{{$good_video['m3u8']}}",
                "width": "70%",
                "height": "370px",
                "autoplay": true,
                "isLive": false,
                "rePlay": false,
                "playsinline": true,
                "preload": true,
                "controlBarVisibility": "hover",
                "useH5Prism": true
            }, function (player) {
                console.log("The player is created");
            }
        );
    </script>
@endsection
