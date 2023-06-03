<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Tags;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = User::find('id');  
      $data = Post::get()->all();
        return view('posts.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Category::get();
        return view('posts.create')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "foto"=>'required|mimes:jpeg,jpg,png',
            "title"=>'required',
            "content"=>'required',
            "category_id"=>'required',
           
        ],[
            'foto.required'=> "nama wajib diisi",
            'title.required'=> "title wajib diisi",
            'content.required'=> "content wajib diisi",
            'category_id.required'=> "category wajib diisi",
            'foto.mimes'=> "foto harus jpeg/jpg/png",
        ]);
        $foto_file = $request->file('foto');
        $foto_extentions = $foto_file->extension();
        $foto_name = date('ymdhis').".".$foto_extentions;
        $foto_file->move(public_path('foto'),$foto_name);
        $data = [
            "title" => $request->title,
            "content" => $request->content,
            "foto"=> $foto_name,
            "category_id"=>$request->category_id,
        ];

        Post::create($data);
       

        return redirect()->to('post');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::get();
        $data = Post::where('id',$id)->first();
        return view('Posts.edit', ['data' => $data,'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "title"=>'required',
            "content"=>'required',
            "category_id"=>'required',
           
        ],[
            'title.required'=> "title wajib diisi",
            'content.required'=> "content wajib diisi",
            'category_id.required'=> "category wajib diisi",
        ]);
        $data = [
            "title"=>$request->title,
            "content" => $request->content,
            "category_id"=>$request->category_id,
        ];
        if($request->hasFile('foto')){
            $data_file = $request->file('foto');
            $data_extension = $data_file->getExtension();
            $data_name = date('ymdhis').".".$data_extension;
            $data_file->move(public_path('foto'),$data_name);
            
            $data_foto =  Post::where('id',$id)->first();
            File::delete(public_path('foto/'.$data_foto->foto));

            $data = [
                "foto" => $data_name
            ];
        }

       Post::where('id',$id)->update($data);
  return redirect()->to('post');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Post::where('id',$id)->first();
        File::delete(public_path('foto/'.$data->foto));
        Post::where('id',$id)->delete();
        return redirect()->to('post');
    }
}