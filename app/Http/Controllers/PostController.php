<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            'title'=>'required',
            'desc'=>'required',
            'content'=>'required|min:10',
        ]);
//        if($request->)
//            return redirect()->route('create')->withErrors($validate)->withInput();

        Post::create($request->all());
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect()->route('home');
    }
    public function trashed()
    {
        $user=auth()->user();
        $posts=Post::where('user_id',$user->id)->onlyTrashed()->get();
        return view('posts.trashed',compact('posts'));
    }
    public function forceDelete($id)
    {
        $user=auth()->user();
        $post=Post::where('id','=',$id);
        $post->forceDelete();
        $posts=$user->posts()->onlyTrashed()->get();
        return redirect()->route('trashed',compact('posts'));
    }
    public function restore($id)
    {
        $user=auth()->user();
        $post=Post::onlyTrashed()->find($id);
        $post->restore();
        $posts=$user->posts()->onlyTrashed()->get();
        return redirect()->route('trashed',compact('posts'));
    }
    public function showAllPosts()
    {
        $posts=Post::all();
        return view('posts.showAllPosts',compact('posts'));
    }
    public function adminDelete($id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect()->route('showAllPosts');
    }
    public function adminForceDelete($id)
    {
        $post=Post::onlyTrashed()->where('id','=',$id);
        $post->forceDelete();
        $posts=Post::onlyTrashed()->get();
        return redirect()->route('restoreAllPosts',compact('posts'));
    }
    public function restoreAllPosts()
    {
        $posts=Post::onlyTrashed()->get();
        return view('posts.restoreAllPosts',compact('posts'));
    }
    public function adminRestore($id)
    {
        $post=Post::withTrashed()->find($id);
        $post->restore();
        $posts=Post::all();
        return redirect()->route('restoreAllPosts',compact('posts'));
    }

}
