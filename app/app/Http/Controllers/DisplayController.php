<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DisplayController extends Controller
{
    function index(){
        // return view('top.main');
    }
    function post(){
        // return view('post.post');
    }
    function profile(){
        // return view('profile.profile');
    }
    function editProfile(){
        // return view('profile.editProfile');
    }
    function weightRegister(){
        // return view('weightMgmt.weightRegister');
    }
    function weightUpdate(){
        // return view('weightMgmt.weightUpdate');
    }
    function search(){
        return view('top.search');
    }
}
