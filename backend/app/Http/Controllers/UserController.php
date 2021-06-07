<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function mypage()
    {
        $user = Auth::user();

        return view('users.mypage', compact('user'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = Auth::user();

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = Auth::user();

        $icon=request()->file('icon')->getClientOriginalName();
        request()->file('icon')->storeAs('public/icons', $icon);

        $user->name = $request->input('name') ? $request->input('name') : $user->name;
        $user->icon = $icon;
        $user->email = $request->input('email') ? $request->input('email') : $user->email;
        $user->update();

        return redirect()->route('mypage');
    }

    public function edit_password()
    {
        return view('users.edit_password');
    }

    public function update_password(Request $request)
    {
        $user = Auth::user();

        if ($request->input('password') == $request->input('confirm_password')) {
            $user->password = bcrypt($request->input('password'));
            $user->update();
        } else {
            return redirect()->route('mypage.edit_password');
        }
        return redirect()->route('mypage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
