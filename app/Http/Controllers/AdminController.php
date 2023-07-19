<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $UserCount = User::all()->count();
        $PostCount = Post::all()->count();
        $populars = Post::orderBy('viwers','desc')->take(5)->get();
        return view('Posts.dashboard' , ['UserCount' => $UserCount, 'PostCount' => $PostCount,'populars' => $populars]);
    }
}