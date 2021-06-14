<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WeddingAlbum;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function index()
    {
        $wedding_albums = WeddingAlbum::all()->sortBy('place');

        $wedding_places = WeddingAlbum::pluck('place')->unique();

        if (Auth::user()) {
            $invited_wedding_albums = User::find(Auth::user()->id)->wedding_albums()->get();
        } else {
            $invited_wedding_albums = WeddingAlbum::all();
        }

        $random_release_posts = Post::where('release_flag', true)->inRandomOrder()->take(3)->get();
        $latest_release_posts = Post::where('release_flag', true)->orderBy('created_at', 'desc')->take(8)->get();
        $release_posts = Post::where('release_flag', true)->get();

        return view('web.index', compact('latest_release_posts', 'random_release_posts', 'release_posts', 'invited_wedding_albums', 'wedding_albums', 'wedding_places'));
    }
}
