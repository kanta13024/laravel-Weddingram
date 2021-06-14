<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->keyword !== null) {
            $keyword = rtrim($request->keyword);
            if (is_int($request->keyword)) {
                $keyword = (string)$keyword;
            }
            $users = User::where('name', 'like', "%{$keyword}%")
                            ->orwhere('email', 'like', "%{$keyword}%")
                            ->orwhere('id', "%{$keyword}%")->paginate(15);
        } else {
            $users = User::paginate(15);
            $keyword = "";
        }

        return view('dashboard.users.index', compact('users', 'keyword'));
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        $posts = $user->posts()->with('wedding_album')->paginate(7);
        $comments = $user->comments()->with('post')->paginate(7);
        $favorites = $user->favorites(Post::class)->with('user')->paginate(5);

        return view('dashboard.users.show', compact('user', 'posts', 'comments', 'favorites'));
    }

    public function destroy(User $user)
    {
        if ($user->deleted_flag) {
            $user->deleted_flag = false;
        } else {
            $user->deleted_flag = true;
        }

        $user->update();

        return redirect()->route('dashboard.users.index');
    }
}
