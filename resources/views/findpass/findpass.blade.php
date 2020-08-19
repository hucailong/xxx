@extends('layouts.app')
@section('title', '修改密码')
@section('content')
	
	<!-- login -->
	<div class="pages section">
		<div class="container">
			<div class="pages-head">
				<h3>UPDATE-PASS</h3>
			</div>
			<div class="login">
				<div class="row">
					<form class="col s12" action="{{url('findpassdo')}}" method="post">
                    @csrf
						<div class="input-field">
							<input type="password" class="validate" name="user_pwd" placeholder="请输入旧密码"  required>
							<input type="password" class="validate" name="user_pwd" placeholder="请输入新密码" required>
						</div>
						<input type="submit" value="修改">
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end login -->
	
	<!-- loader -->
	<div id="fakeLoader"></div>
	<!-- end loader -->
	

	@endsection