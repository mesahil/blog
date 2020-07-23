@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">MY POSTS!!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                @if(count($posts)>0)
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Title</th>
                            <th>Review post</th>
                            <th>Edit post</th>
                            <th>Delete post</th>
                        </tr>
                        @foreach($posts as $post)

                            <tr>
                            <th style="width:50%">{{$post->title}}</th>   
                            <td><a href="/posts/{{$post->id}}" class="btn btn btn-outline-primary pull-right">Review</td>
                            <td><a href="posts/{{$post->id}}/edit" class="btn btn-outline-secondary pull-right">Edit</a></td>
                            <td> {!!Form::open(['action'=> ['PostsController@destroy',$post->id],'method' => 'POST', 'class'=>'pull-right'])!!}
                                    {!!form::hidden('_method','DELETE')!!}
                                    {{Form::submit('Delete',['class'=>'btn btn-outline-danger'])}}
                                    {!!Form::close()!!}</td>
                            </tr>
                        @endforeach

                    </table>
                @else
                <h1>You haven't posted anything yet!!</h1>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
