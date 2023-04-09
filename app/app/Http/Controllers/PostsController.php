<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostData;
use App\Post;
use App\User;
use App\Weight_mgmt;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $post = new Post;
        $posts = $post->get();
        // $weight_mgmt = Weight_mgmt::where('user_id',Auth::id())->orderBy('date','desc')->first();
        return view('top.main',[
            'posts' => $posts,
            // 'weight_mgmt' => $weight_mgmt,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostData $request)
    {
        $post = new Post;
        $post->user_id = Auth::id();
        $post->text = $request->text;
        
        $dir = 'images';
        // dd($request);
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/' . $dir, $file_name);
        $post->image = $file_name;
        $post->path = 'storage/' . $dir . '/' . $file_name;

        $post->save();

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {   
        $user = User::where('id',$post['user_id'])->first();
        return view('post.postDetail',[
            'post' => $post,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.postEdit',[
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post, Request $request)
    {
        $post->user_id = Auth::id();
        $post->text = $request->text;
        if($request->file('image')){
            $dir = 'images';
            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir, $file_name);
            $post->path = 'storage/' . $dir . '/' . $file_name;
        }
        $post->save();
        // return redirect(route('posts.index'));
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        $posts = Post::find($post);
        $posts->delete();
        return redirect(route('posts.index'));
    }
}
