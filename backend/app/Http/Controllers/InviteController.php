<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\WeddingAlbum;
use Illuminate\Http\Request;

class InviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, WeddingAlbum $wedding_album)
    {
        $user = Auth::user();

        if ($request->keyword !== null) {
            $keyword = rtrim($request->keyword);
            if (is_int($request->keyword)) {
                $keyword = (string)$keyword;
            }
            $users = User::where('name', 'like', "%{$keyword}%")
                            ->orwhere('email', 'like', "%{$keyword}%")
                            ->orwhere('id', '{$keyword}')->paginate(15);
        } else {
            $users = [];
            $keyword = "";
        }

        $invited_users = WeddingAlbum::find($wedding_album->id)->users()->get();  //招待したユーザーの取得
        $invited_wedding_albums = User::find(Auth::user()->id)->wedding_albums()->get();
        $wedding_albums = WeddingAlbum::all();
        $wedding_places = WeddingAlbum::pluck('place')->unique();

        return view('wedding_albums.invite', compact('invited_wedding_albums','invited_users', 'wedding_album', 'users', 'user', 'wedding_albums', 'wedding_places'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, WeddingAlbum $wedding_album)
    {
        $wedding_album->users()->attach($request->user_id);

        return redirect()->route('invite.index', $wedding_album);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, WeddingAlbum $wedding_album)
    {
        $wedding_album->users()->detach($request->user_id);
        return redirect()->route('invite.index', $wedding_album);
    }
}
