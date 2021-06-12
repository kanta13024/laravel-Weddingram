<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WeddingAlbum;
use App\User;
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

        return view('web.index', compact('invited_wedding_albums', 'wedding_albums', 'wedding_places'));
    }
}
