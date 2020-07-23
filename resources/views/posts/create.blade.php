@extends('layouts.app')
@section('content')

{!! Form::open(['action' => 'PostsController@store', 'method' =>'POST', 'enctype'=> 'multipart/form-data' ]) !!}
    <div class="form-group">
    	{{form::label('title','Title')}}
    	{{form::text('title', '', ['class' => 'form-control', 'placeholder'=>'Title'])}}
    </div>

    <div class="form-group">
    	{{form::label('body','Body')}}
    	{{form::textarea('body', '', ['class' => 'form-control', 'placeholder'=>'Your blog here'])}}
    </div>

    <div class="form-group">
    	
    	{{Form::file('image')}}

    </div>

    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
@endsection