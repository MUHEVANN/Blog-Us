<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pupular = Post::orderBy('viwers','desc')->take(5)->get();
        $category = Category::all();
        $post = Post::latest()->take(6)->get();
        // $text = $post->content;
        // $sub = substr($text, 0,50);
        return view('welcome',['post'=>$post,'category'=>$category,'popular'=>$pupular]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::all();
        $post = Post::findOrFail($id);
        $post->viwers++;
        $post->save();

        return view('user.detail',['data'=>$post,'category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}