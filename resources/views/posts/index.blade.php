<style type="text/css">
	.text{
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
	}
</style>

@extends('layouts.app')
@section('content')
	
	@if(count($post)>0)
		<div class="row">
			@foreach ($post as $posts)
				<div class="col-xs-12 col-md-4 col-xl-3 pl-5" > 	
					<div class="card" style="width: 100%;">
						<a href="/posts/{{$posts->id}}">
						<div class="card-header text" >{{$posts->title}}</div>
			  			<img class="card-img-top" src="/storage/images/{!!$posts->image!!}" alt="image">
			  			<div class="card-body">
			   				 <p class="card-text text">
								<small>Written by {{$posts->user->name}} <br>{{$posts->created_at}}</small>
							</p>
						</div>
					</div></a><br><br><br>	
				</div>

			@endforeach
		</div>

		{{$post->links()}}
	@else
	<h1>No posts are there</h1>
	@endif

@endsection