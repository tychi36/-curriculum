<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;



class DisplayController extends Controller
{
    public function search(Request $request){
       $posts = Post::paginate(20);
       $search = $request->input('search');
       $query = Post::query();
       if($search){
        $spaceConversion = mb_convert_kana($search, 's');
        $wordArraySearched = preg_split('/[s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
        foreach($wordArraySearched as $value){
            $query->where('text', 'like', '%'.$value.'%');
        }
        $posts = $query->paginate(20);
       }
       return view('top.main',[
        'posts' => $posts,
        'search' => $search,
       ]);
    }
}
