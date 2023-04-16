<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostData;
use App\Post;
use App\User;
use App\Like;
use App\Comment;
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
        // ユーザの投稿の一覧を作成日時の降順で取得
        //withCount('テーブル名')とすることで、リレーションの数も取得できます。
        // $posts = Post::withCount('likes')->orderBy('created_at', 'desc')->paginate(10);
        $like_model = new Like;

        
        return view('top.main',[
            'posts' => $posts,
            'like_model'=>$like_model,
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
        $comments = Comment::where('post_id', $post['id'])->get();
        // dd($comments);
        return view('post.postDetail',[
            'post' => $post,
            'user' => $user,
            'comments' => $comments,
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
    public function update(Post $post, PostData $request)
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
    public function destroy()
    {
        $posts = Post::find();
        $posts->delete();
        return redirect(route('posts.index'));
    }


    public function ajaxlike(Request $request)
    {
        $id = Auth::user()->id;
        $post_id = $request->post_id;//リクエストされたposts_idを格納
        $like = new Like;
        $post = Post::findOrFail($post_id);

        // 空でない（既にいいねしている）なら
        if ($like->like_exist($id, $post_id)) {
            //likesテーブルのレコードを削除
            $like = Like::where('post_id', $post_id)->where('user_id', $id)->delete();
            return response()->json('ok');
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new Like;
            $like->post_id = $request->post_id;
            $like->user_id = Auth::user()->id;
            $like->save();
            return response()->json('no');

        }

        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $postLikesCount = $post->loadCount('likes')->likes_count;

        //一つの変数にajaxに渡す値をまとめる
        //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
        $json = [
            'postLikesCount' => $postLikesCount,
        ];
    }
}
