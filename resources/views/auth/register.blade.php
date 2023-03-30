@extends('layouts.app')
@section('titulo')
    Registrate en Devstagram
@endsection()

@section('contenido')    
    <div class="md:flex md:justify-center md:gap-5 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/registrar.jpg')}}" alt="Registro de usuarios" class="rounded-lg">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form action="{{ route('register')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input 
                    id="name" 
                    name="name" 
                    type="text" 
                    placeholder="Tu Nombre"                    
                    class="border p-3 w-full rounded-lg @error('name') border-red-500" @enderror"
                    v
                    value="{{ old('name')}}" 
                    >
                    @error('name')
                        <p class="bg-red-500 text-white my-2 p-1 text-center rounded-lg">
                            {{$message}}
                        </p>
                    @enderror"
                    v
                </div>
                <div class="mb-5">

                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        UserName
                    </label>
                    <input id="username" name="username" type="text" placeholder="Tu UserName"   
                    class="border p-3 w-full rounded-lg @error('username') border-red-500" @enderror"
                    v
                    value="{{ old('username')}}"
                     >
                    @error('username')
                    <p class="bg-red-500 text-white my-2 p-1 text-center rounded-lg">
                        {{$message}}
                    </p>
                    @enderror"
                    v
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input id="email" name="email" type="email" placeholder="Tu Email" 
                    class="border p-3 w-full rounded-lg @error('email') border-red-500" @enderror"
                    v
                    value="{{ old('email')}}" 
                    >
                    @error('email')
                    <p class="bg-red-500 text-white my-2 p-1 text-center rounded-lg">
                        {{$message}}
                    </p>
                    @enderror"
                    v
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input id="password" name="password" type="password" placeholder="Tu Contraseña" 
                    class="border p-3 w-full rounded-lg @error('password') border-red-500" @enderror"
                    v
                    value="{{ old('password')}}"
                    >
                    @error('password')
                    <p class="bg-red-500 text-white my-2 p-1 text-center rounded-lg">
                        {{$message}}
                    </p>
                    @enderror"
                    v
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Repetir Password
                    </label>
                    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Tu Contraseña" class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5"> 
                    <input type="submit" value="Crear Cuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded">
                </div>
            </form>
        </div>
    </div>

@endsection()