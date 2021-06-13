<?php

namespace App\Http\Controllers;

use App\WeddingAlbum;
use App\Place;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WeddingAlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $sort_query = [];
        // $sorted = "";

        // if ($request->sort !==  null) {
        //     $slices = explode(' ', $request->sort);
        //     $sort_query[$slices[0]] = $slices[1];
        //     $sorted = $request->sort;
        // }

        // if ($request->keyword !== null) {
        //     $keyword = rtrim($request->keyword);
        //     $total_count = WeddingAlbum::where('name', 'like', "%{$keyword}%")->orwhere('id', "{%$keyword%}")->orwhere('place', "%{$keyword}%")->count();
        //     $wedding_albums = WeddingAlbum::where('name', 'like', "%{$keyword}%")->orwhere('id', "{%$keyword%}")->orwhere('place', 'like', "%{$keyword}%")->sortable($sort_query)->paginate(15);
        // } else {
        //     $keyword = "";
        //     // $total_count = WeddingAlbum::count();
        //     $total_count = User::find(Auth::id())->wedding_albums()->count();
        //     // $wedding_albums = WeddingAlbum::sortable($sort_query)->paginate(15);
        //     $wedding_albums = User::find(Auth::id())->wedding_albums()->paginate(15);
        // }

        // $sort = [
        //     '並び替え' => '',
        //     '新着順' => 'created_at desc',
        //     '古い順' => 'created_at asc',
        //     '撮影時期の降順' => 'event_date desc',
        //     '撮影時期の昇順' => 'event_date asc',
        // ];

        $places = Place::all();

        $invited_wedding_albums = User::find(Auth::user()->id)->wedding_albums()->get();  //中間テーブルを生かした取り方


        return view('wedding_albums.index', compact('invited_wedding_albums',  'places'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wedding_albums = new WeddingAlbum();
        $wedding_albums->name = $request->input('name');
        $wedding_albums->event_date = $request->input('event_date');
        $wedding_albums->place_id = $request->input('place_id');
        $wedding_albums->place = Place::find($request->input('place_id'))->name;  //リレーションを生かした保存
        $wedding_albums->save();

        $wedding_albums->users()->attach(Auth::id());

        return redirect('/wedding_albums');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(WeddingAlbum $wedding_album)
    {
        $places = Place::all();
        $invited_wedding_albums = User::find(Auth::user()->id)->wedding_albums()->get();
        return view('wedding_albums.edit', compact('invited_wedding_albums', 'wedding_album', 'places'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WeddingAlbum $wedding_album)
    {
        $wedding_album->name = $request->input('name');
        $wedding_album->event_date = $request->input('event_date');
        $wedding_album->place_id = $request->input('place_id');
        $wedding_album->place = Place::find($request->input('place_id'))->name;
        $wedding_album->save();

        return redirect('/wedding_albums');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WeddingAlbum $wedding_album)
    {
        $wedding_album->delete();

        return redirect('/wedding_albums');
    }
}
