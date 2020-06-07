<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Intervention\Image\Facades\Image;
class PostController extends Controller
{
    function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {        
        $users = auth()->user()::all();
        $user = auth()->user()->following()->pluck('profiles.user_id');
        $post = Post::wherein('user_id', $user)->with('user')->latest()->get();
        return view('posts.index', compact('post', 'user','users'));
    }
    public function show(Post $post)
    {
        return view('posts.show',[
            'post'=>$post
        ]);
    }

    public function create()
    {
    	return view('posts.create');
    }

    public function store()
    {
    	$post =Request()->validate([
    		'caption'=> 'required',
    		'image'=>['required','image']
    	]);

        $imagepath = Request('image')->store('uploads', 'public');        
        $image = Image::make(public_path('storage/'.$imagepath))->fit(2000,2000);
        $image->save();
       

    	auth()->user()->posts()->create([
    		'caption'=> $post['caption'],
    		'image'=> $imagepath
    	]);   	

    	return redirect('/profile/'.auth()->user()->id);
    	
    }

    
}
