<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\like;
use App\Http\Requests\MypageData;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $post = new Post;
        $posts = $post->where('user_id',Auth::id())->get();
        $like = new like;
        $likes = $like->join('posts', 'likes.post_id', '=', 'posts.id')->get();
        return view('profile.profile',[
            'posts' => $posts,
            'likes' => $likes,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('profile.editProfile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, MypageData $request)
    {
        $user->id = Auth::id();
        $user->name = $request->name;
        $user->profile_text = $request->profile_text;

        if($request->file('image')){
        $dir = 'images';
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/' . $dir, $file_name);
        $user->image_path = 'storage/' . $dir . '/' . $file_name;
        }

        $user->save();
        return redirect(route('users.show',$user['id']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        //
    }

    public function violation($user){
        $userData = User::find($user);
        $violatin = $userData->violation;
        $report = $violatin+1;
        $userData->violation = $report;
        $userData->save();
        return redirect()->route('posts.index');

    }
}
