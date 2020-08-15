<!DOCTYPE html>
<html>
<head>
            <meta charset="UTF-8">
    <title>Mstore - Online Shop Mobile Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1  maximum-scale=1 user-scalable=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="HandheldFriendly" content="True">

    <link rel="stylesheet" href="/css/materialize.css">
    <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/owl.theme.css">
    <link rel="stylesheet" href="/css/owl.transitions.css">
    <link rel="stylesheet" href="/css/fakeLoader.css">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/style.css">

    <link rel="shortcut icon" href="/img/favicon.png">


</head>
<body>


    <!-- navbar top -->
    <div class="navbar-top">
        <!-- site brand	 -->
        <div class="site-brand">
            <a href="index.html"><h1>Mstore</h1></a>
        </div>
        <!-- end site brand	 -->
        <div class="side-nav-panel-right">
            <a href="#" data-activates="slide-out-right" class="side-nav-left"><i class="fa fa-user"></i></a>
        </div>
    </div>
    <!-- end navbar top -->

    <!-- side nav right-->
    <div class="side-nav-panel-right">
        <ul id="slide-out-right" class="side-nav side-nav-panel collapsible">
            <li class="profil">
                <img src="img/profile.jpg" alt="">
                <h2>John Doe</h2>
            </li>
            <li><a href="setting.html"><i class="fa fa-cog"></i>Settings</a></li>
            <li><a href="about-us.html"><i class="fa fa-user"></i>About Us</a></li>
            <li><a href="contact.html"><i class="fa fa-envelope-o"></i>Contact Us</a></li>
            <li><a href="login.html"><i class="fa fa-sign-in"></i>Login</a></li>
            <li><a href="register.html"><i class="fa fa-user-plus"></i>Register</a></li>
        </ul>
    </div>
    <!-- end side nav right-->


    <!-- product -->
    <div class="section product product-list">
        <div class="container">
            <div class="pages-head">
                <h3>TOP 10</h3>
            </div>
            <div class="input-field">
                <select id="top10">
                    <option value="1">浏览排行TOP10</option>
                    <option value="2">购买排行TOP10</option>
                    <option value="3">收藏排行TOP10</option>
                    <option value="3"><a href="http://www.baidu.com">AAAA</a></option>
                </select>
            </div>
            <div class="row">
                <div class="col s6">
                    <div class="content">
                        <img src="img/product-new1.png" alt="">
                        <h6><a href="">Fashion Men's</a></h6>
                        <div class="price">
                            $20 <span>$28</span>
                        </div>
                        <button class="btn button-default">ADD TO CART</button>
                    </div>
                </div>
                <div class="col s6">
                    <div class="content">
                        <img src="img/product-new2.png" alt="">
                        <h6><a href="">Fashion Men's</a></h6>
                        <div class="price">
                            $20 <span>$28</span>
                        </div>
                        <button class="btn button-default">ADD TO CART</button>
                    </div>
                </div>
            </div>
            <div class="row margin-bottom">
                <div class="col s6">
                    <div class="content">
                        <img src="img/product-new3.png" alt="">
                        <h6><a href="">Fashion Men's</a></h6>
                        <div class="price">
                            $20 <span>$28</span>
                        </div>
                        <button class="btn button-default">ADD TO CART</button>
                    </div>
                </div>
                <div class="col s6">
                    <div class="content">
                        <img src="img/product-new4.png" alt="">
                        <h6><a href="">Fashion Men's</a></h6>
                        <div class="price">
                            $20 <span>$28</span>
                        </div>
                        <button class="btn button-default">ADD TO CART</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <div class="content">
                        <img src="img/product-new3.png" alt="">
                        <h6><a href="">Fashion Men's</a></h6>
                        <div class="price">
                            $20 <span>$28</span>
                        </div>
                        <button class="btn button-default">ADD TO CART</button>
                    </div>
                </div>
                <div class="col s6">
                    <div class="content">
                        <img src="img/product-new4.png" alt="">
                        <h6><a href="">Fashion Men's</a></h6>
                        <div class="price">
                            $20 <span>$28</span>
                        </div>
                        <button class="btn button-default">ADD TO CART</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end product -->


    <!-- loader -->
    <div id="fakeLoader"></div>
    <!-- end loader -->

    <!-- footer -->
    <div class="footer">
        <div class="container">
            <div class="about-us-foot">
                <h6>Mstore</h6>
                <p>is a lorem ipsum dolor sit amet, consectetur adipisicing elit consectetur adipisicing elit.</p>
            </div>
            <div class="social-media">
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-google"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
                <a href=""><i class="fa fa-instagram"></i></a>
            </div>
            <div class="copyright">
                <span>© 2017 All Right Reserved</span>
            </div>
        </div>
    </div>
    <!-- end footer -->



    <!-- scripts -->
<script src="/js/jquery.min.js"></script>
<script src="/js/js.cookie-2.2.1.min.js"></script>
<script src="/js/init.js"></script>
<script src="/js/materialize.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/fakeLoader.min.js"></script>
<script src="/js/animatedModal.min.js"></script>
<script src="/js/main.js"></script>

    <script>
        $("#top10").change(function(){
            console.log($(this).val());
        });
    </script>

</body>
</html>
