<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

use function Laravel\Prompts\password;

class UserController extends Controller
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }

    public function registerstore(Request $request)
    {
        $validate = $request->validate([
            'name' =>'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|same:password_confirmantion'
        ]);
        $validate['password']= bcrypt($validate['password']);
        $simpan = User::create($validate);
        if($simpan){
            return redirect()->route('login')->with('success','Registrasi berhasil');
        } else{
            return redirect()->route('register')->with('error','Registrasi gagal');
        }
    }
}