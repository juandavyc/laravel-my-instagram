<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('perfil.index');
    }


    public function store(Request $request)
    {


        $request->request->add(['username' => Str::slug($request->username)]);
        // lista negra
        // in:cliente < obligar
        $this->validate($request, [
            'username' => ['required', 'unique:users,username,' . auth()->user()->id, 'min:3', 'max:20', 'not_in:twitter,editar-perfil'],
        ]);

        if ($request->imagen) {

            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(500, 500);

            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }

        // guardar cambios

        $usuario = User::find(auth()->user()->id);

        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->save();

        return redirect()->route('posts.index', $usuario->username);
    }
    public function store_email(Request $request)
    {


        // dd($request->all());

        // validar
        $this->validate($request, [
            'email' => ['required', 'unique:users,email,' . auth()->user()->id, 'email', 'min:3', 'max:60'],
        ]);

        // almacenar

        // $usuario = User::find(auth()->user()->id);

        $usuario = User::find(auth()->user()->id);
        $usuario->email = $request->email;
        $usuario->save();


        // return redirect()->route('posts.index', $usuario->username);
        // respuesta

        return back()->with('mensaje.email', 'Email cambiado correctamente');
    }
    public function store_password(Request $request)
    {

        $this->validate($request, [
            'old_password' => ['required', 'max:255'],
            'password' => ['required', 'confirmed', 'min:3', 'max:255'],
        ]);

        if (Hash::check($request->old_password, auth()->user()->password)) {

            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->password)
            ]);
        } else {
            return back()->with('mensaje.password', 'La contraseña antigua no coindice');
        }

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
