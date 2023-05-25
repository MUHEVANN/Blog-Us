<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::all();
        return view('Category.index',['data' =>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(["name"=>"required"],["name.required"=>"form harus diisi"]);
        $data = ["name" => $request->name ];
        Category::create($data);
        return redirect()->to('category');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::all();
        $category_id = Category::findOrFail($id);
        $data = DB::table('posts')
        ->join('categories', 'posts.category_id', '=', 'categories.id')
        ->select('posts.*', 'categories.name')
        ->where('categories.id',$category_id->id)
        ->get();
        $popular = Post::where('category_id',$category_id->id)->orderBy('viwers', 'desc')->take(6)->get();
        return view('user.category',['category_id'=>$category_id,'data'=>$data,'category'=>$category,'popular'=>$popular]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Category::find($id);
        return view('Category.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(["name"=>"required"],["name.required"=>"form harus diisi"]);
        $data = ["name" => $request->name ];
        Category::where('id',$id)->update($data);
        return redirect()->to('category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::where('id', $id)->delete();
        return redirect()->to('category');
    }
}