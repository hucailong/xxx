@extends('layouts.app')
@section('title', '前台')
@section('content')
    <!-- register -->
    <div class="pages section">
        <div class="container">
            <div class="pages-head">
                <h3>注册</h3>
            </div>
            <div class="register">
                <div class="row">
                    <form class="col s12" method="post" action="{{url('/register')}}">
                        @csrf
                        <div class="input-field">
                            <input type="text" class="validate" placeholder="账号" required name="user_autner">
                        </div>
                        <div class="input-field">
                            <input type="email" placeholder="邮箱" class="validate" required name="user_email">
                        </div>
                        <div class="input-field">
                            <input type="password" placeholder="密码" class="validate" required name="user_passwd">
                        </div>
                        <div class="input-field">
                            <input type="password" placeholder="确认密码" class="validate" required name="user_passwd1">
                        </div>
                        <input type="submit" value="注册" class="btn button-default">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end register -->
@endsection
