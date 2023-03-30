<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        //dd($request); // dump

        // dd($request->get('username'));

        /// reescribir
        // $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20', // tabla users
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'username' => Str::slug($request->username),
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // autenticar desde el request
        /*
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        */
        // autenticar desde el request
        auth()->attempt($request->only('email', 'password'));

        // redireccionar

        return redirect()->route('posts.index');
    }
}
