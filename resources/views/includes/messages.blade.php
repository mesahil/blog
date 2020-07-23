@if(count($errors)>0)
	@foreach($errors->all() as $error)
		<div class="danger alert-danger">
			{{$error}}
			<br>
		</div>
	@endforeach
@endif

@if(session('success'))
<div class="alert alert-success">
	{{session('success')}}
	
</div>
@endif


@if(session('error'))
<div class="alert danger-danger">
	{{session('error')}}
	
</div>
@endif