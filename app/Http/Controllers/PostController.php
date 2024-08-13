<?php

namespace App\Http\Controllers;

use App\Mail\Postmail;
use App\Mail\welcome;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $posts=Post::latest()->paginate(3);
        return view('post.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,User $user)
    {
        $user=auth()->user();
        $field=$request->validate([
            'title'=>['required'],
            'body'=>['required'],
            'image'=>['required','image','mimes:png,jpg,webp'],
        ]);
        $path=null;
        if($request->hasFile('image')){
            $path=Storage::disk('public')->put('posts_images',$request->image);
            $field['image_path']=$path;
        }
        $post=$user->posts()->create($field);

        Mail::to(Auth()->user()->email)->send(new Postmail(Auth::user(),$post));

        return redirect()->route('view.dashboard')->with('true','your post was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {   Gate::authorize('update_post',$post);
        return view('post.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
       
            
            $field=$request->validate([
                'title'=>['required'],
                'body'=>['required'],
            ]);
            $post->update($field);
            return redirect()->route('view.dashboard')->with('true','your post was updated!');
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('view.dashboard')->with('true','your post was deleted!');
    }
}
