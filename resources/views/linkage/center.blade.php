@extends('layouts.app')
@section('title', '收货地址')
@section('content')
    
    <!-- contact us -->
    <div class="pages section">
        <div class="container">
            <div class="pages-head">
                <h3>*收货地址*</h3>
            </div>
			<form action="{{url('area')}}" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 地区 </label>
					<div class="col-sm-9">
						<tr>
							<td colspan="3" style="font-family:'宋体';">
								<select class="area" name="c_sheng">
									<option value="" selected="selected">请选择...</option>
									@foreach($area as $v)
									<option value="{{$v->id}}">{{$v->name}}</option>
									@endforeach
								</select>
								<select class="area" name="c_shi">
									<option value="" selected="selected">请选择...</option>
									<option value=""></option>
								</select>
								<select class="area" name="c_qu">
									<option value="" selected="selected">请选择...</option>
									<option value=""></option>
								</select>
							（必填）
							</td>
						</tr><br>
						<input type="submit" value="Submit">
				</div>
			</div>  
			</form>
        </div>
    </div>
    <!-- end contact us -->
@endsection
<script src='/jquery.js'></script>
<script>
$(function(){
	$(document).on('change','.area',function(){
		var _this=$(this);
		var pid=_this.val();
		console.log(pid);
		var _option='<option value="">--请选择--</option>';
		_this.nextAll('select').html(_option);
		if(pid===''){
			_this.nextAll('select').html(_option);
			return false;
		}
		$.post(
			"{{url('area')}}",
			{pid:pid,_token:"{{csrf_token()}}"},
			function(res){
				for(var $i in res){
					_option+='<option value="'+res[$i]['id']+'">'+res[$i]['name']+'</option>'
				}
				console.log(_this.next());
				_this.next('select').html(_option)
			}
		)
		
	})
})
</script>

