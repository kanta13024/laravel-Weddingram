<?php

namespace App\Http\Controllers\Dashboard;

use App\Post;
use App\WeddingAlbum;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_query = [];
        $sorted = "";

        if ($request->sort !== null) {
            $slices = explode(' ', $request->sort);
            $sort_query[$slices[0]] = $slices[1];
            $sorted = $request->sort;
        }

        if ($request->keyword !== null) {
            $keyword = rtrim($request->keyword);
            $total_count = Post::where('content', 'like', "%{$keyword}%")->orwhere('id', "{$keyword}")->count();
            $posts = Post::where('content', 'like', "%{$keyword}%")->orwhere('id', "{$keyword}")->sortable($sort_query)->with('wedding_album')->paginate(15);
        } else {
            $keyword = "";
            $total_count = Post::count();
            $posts = Post::sortable($sort_query)->with('wedding_album')->paginate(15);
        }

        $sort = [
            '並び替え' => '',
            '新着順' => 'created_at desc',
            '古い順' => 'created_at asc',
            '撮影時期の降順' => 'shooting_time desc',
            '撮影時期の昇順' => 'shooting_time asc',
        ];

        return view('dashboard.posts.index', compact('posts', 'sort', 'sorted', 'total_count', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wedding_albums = WeddingAlbum::all();
        $users = User::all();

        return view ('dashboard.posts.create', compact('wedding_albums', 'users'));
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

        return redirect()->route('dashboard.posts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $wedding_albums = WeddingAlbum::all();

        return view('dashboard.posts.edit', compact('post','wedding_albums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->image = request()->file('image')->getClientOriginalName();
        request()->file('image')->storeAs('public/posts', $post->image);
        $post->content = $request->input('content');
        $post->shooting_time = $request->input('shooting_time');
        $post->update();

        return redirect()->route('dashboard.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('dashboard.posts.index');
    }
}
