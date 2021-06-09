<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WeddingAlbum;

class WebController extends Controller
{
    public function index()
    {
        $wedding_albums = WeddingAlbum::all()->sortBy('place');

        $wedding_places = WeddingAlbum::pluck('place')->unique();

        return view('web.index', compact('wedding_albums', 'wedding_places'));
    }
}
