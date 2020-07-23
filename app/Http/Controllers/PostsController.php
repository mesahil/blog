<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
class PostsController extends Controller
{   


    public function __construct()
    {
        $this->middleware('auth',['except' =>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post=Post::orderBy('created_at','desc')->paginate(12);
        return view('posts.index')->with('post',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'image'=>'image|required|max:1999'

        ]);

        if($request->hasFile('image')){
            $fileNameExt=$request->file('image')->getClientOriginalName();
            $filename= pathinfo($fileNameExt, PATHINFO_FILENAME);
            $ext=$request->file('image')->getClientOriginalExtension();
            $filenameToStore =$filename.'_'.time().'.'.$ext;
            $path=$request->file('image')->storeAs('public/images', $filenameToStore);
        }

        $post=new Post;
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->user_id =auth()->user()->id;
        $post->image = $filenameToStore;
        $post->save();

        return redirect('/posts')->with('success','Post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $post=post::find($id);
        if(auth()->user()->id !== $post->user_id ){
            return redirect('/posts')->with('error','Unable to access');
        }
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required']);

         if($request->hasFile('image')){
            $fileNameExt=$request->file('image')->getClientOriginalName();
            $filename= pathinfo($fileNameExt, PATHINFO_FILENAME);
            $ext=$request->file('image')->getClientOriginalExtension();
            $filenameToStore =$filename.'_'.time().'.'.$ext;
            $path=$request->file('image')->storeAs('public/images', $filenameToStore);
        }



        $post = Post::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        if($request->hasFile('image')){
            $post->image = $filenameToStore;
        }
        $post->save();

        return redirect('/posts')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $post=post::find($id);
        if(auth()->user()->id !== $post->user_id ){
            return redirect('/posts')->with('error','Unable to access');
        }
        Storage::delete('public/images/'.$post->image);

        $post->delete();
        return redirect('/posts')->with('success','Post deleted successfully');
    }
}
