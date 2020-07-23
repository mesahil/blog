<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index (){
    	
        //return view('auth.login');




    	//return view('pages/index', compact('title'));
    	return view('/posts');
        //->with('title',$title);
       // {{ route('login') }}

    }


    public function about (){
    	return view('pages/about');
    }

    public function services (){
    	return view('pages/services');
    }
}
