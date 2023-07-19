<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate(['konten'=>'required'],['konten.required'=>'harus diisi']);
        $data = [
            "konten"=>$request->konten,
            "post_id"=>$request->post_id,
            "user_id" => $request->user_id,
        ];
        Comment::create($data);
        return back()->with('success',"berhasil ditambah");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $data = ["konten" => $request->updatekomen ];
        Comment::where('id', $id)->update($data);
        return redirect()->back()->with('success','berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Comment::where('id', $id)->delete();
        return redirect()->back()->with('success','berhasil dihapus');
    }
    public function reply(Request $request,string $id)
    {
        $comment = Comment::find($id);
        // if ($comment) {
        //     $user_id = $comment->user_id; // Mengakses user_id pada model individu
        // } else {
        //     return 'Komentar tidak ditemukan, atur respons sesuai kebutuhan Anda.';
        // }
        $commentReply = new Comment;
        $commentReply->user_id = Auth::user()->id;
        $commentReply->post_id = $comment->post_id;
        $commentReply->konten = $request->input('reply');
        $commentReply->reply_comment = $comment->id;
        $commentReply->save();
        return redirect()->back();
    }
}