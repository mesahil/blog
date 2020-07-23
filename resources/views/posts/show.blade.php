@extends('layouts.app')
@section('content')
	
	<h1>{{$post->title}}</h1>
	<img src="/storage/images/{!!$post->image!!}" style="width: 100px"><br>
	<div>
		<p>{!!$post->body!!}</p>
	</div>
	<small>Created on {{$post->created_at}}</small>

	<hr>
	@if(!Auth::guest())
		@if(Auth::user()->id == $post->user_id )
			<a href="{{$post->id}}/edit" class="btn btn-default"> Edit post</a>

			{!!Form::open(['action'=> ['PostsController@destroy',$post ->id],'method' => 'POST', 'class'=>'pull-right'])!!}
				{!!form::hidden('_method','DELETE')!!}
				{{Form::submit('Delete',['class'=>'btn btn-danger'])}}

			{!!Form::close()!!}
		@endif
	@endif
@endsection