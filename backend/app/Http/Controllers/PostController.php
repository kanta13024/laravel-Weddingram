<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\WeddingAlbum;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::with('user')->get();
        return view('posts.index', compact('posts'));
    }

    public function favorite(Post $post)
    {
        $user = Auth::user();

        if ($user->hasFavorited($post)) {
            $user->unfavorite($post);
        } else {
            $user->favorite($post);
        }

        return redirect()->route('posts.show', $post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wedding_albums = WeddingAlbum::all();
        return view('posts.create', compact('wedding_albums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->image = request()->file('image')->getClientOriginalName();
        request()->file('image')->storeAs('public/posts', $post->image);
        $post->content = $request->input('content');
        $post->shooting_time = $request->input('shooting_time');
        $post->user_id = Auth::user()->id;
        $post->wedding_album_id = $request->input('wedding_album_id');
        $post->save();

        return redirect()->route('posts.show', ['post' => $post->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $user = Auth::user();
        // $comments = $post->comments()->get();   //リレーションを生かした取り方
        $comments = Comment::with('user')->where('post_id', $post->id)->get();

        return view('posts.show', compact('post', 'user', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $user = User::find($post->user_id)->first();
        $wedding_albums = WeddingAlbum::all();
        return view('posts.edit', compact('post', 'wedding_albums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->image = request()->file('image')->getClientOriginalName();
        request()->file('image')->storeAs('public/posts', $post->image);
        $post->shooting_time = $request->input('shooting_time');
        $post->content = $request->input('content');
        $post->wedding_album_id = $request->input('wedding_album_id');
        $post->save();

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
