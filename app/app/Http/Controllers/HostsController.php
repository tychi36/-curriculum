<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Like;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class HostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = new User;
        $users = $user->where('role', [11,100])->orderBy('violation','desc')->get();
        // dd($users);

        return view('host.host_userSearch',[
            'users' => $users,
        ]);
        // $post = new Post;
        // $posts = $post->where('user_id',Auth::id())->get();
        // return view('profile.profile',['posts' => $posts,]);
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
    public function show($user)
    {
        $users = User::where('id',$user)->first();
        $posts = Post::where('user_id',$user)->get();
        $likes = Like::join('posts', 'likes.post_id', '=', 'posts.id')->where('likes.user_id',$user)->get();
        

        return view('profile.profile',[
            'user' => $users,
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
    public function destroy($id)
    {
        // dd($id)
        $users = User::find($id);
        $users->delete();
        return redirect(route('hosts.index'));
    }

    public function search(Request $request){
        $users = User::paginate(20);
        $search = $request->input('search');
        $query = User::query();
        $like_model = new Like;
        if($search){
         $spaceConversion = mb_convert_kana($search, 's');
         $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
         foreach($wordArraySearched as $value){
             $query->where('role', [11,100])->where('name', 'like', '%'.$value.'%');
         }
         $users = $query->paginate(20);
        }
        return view('host.host_userSearch',[
         'users' => $users,
         'search' => $search,
         'like_model'=>$like_model,
        ]);
     }
}
