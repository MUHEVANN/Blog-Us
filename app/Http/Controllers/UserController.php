<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userRoles = User::whereHasRole('user')->get();
        return view('Users.user',compact('userRoles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'email' => 'required', 
        'password' => 'required',
        'name'=>'required'
        ],[
        'email.required'=>'Field tidak boleh kosong',
        'password.required'=>'Field tidak boleh kosong',
        'name.required'=>'Field tidak boleh kosong'
    ]);
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
    $user->addRole('user');
    return redirect()->intended('users')->with('success',"berhasil ditambah");
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
        $data = User::where('id',$id)->first();
        return view('Users.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'new_password' => 'nullable|min:6',
        ]);
    
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
    
        if ($request->filled('new_password')) {
            $data['password'] = bcrypt($request->input('new_password'));
        }
    
        User::where('id', $id)->update($data);
    
        return redirect()->intended('users')->with('success','berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id',$id)->delete($id);
        return redirect()->back()->with('success','berhasil dihapus');
    }
}