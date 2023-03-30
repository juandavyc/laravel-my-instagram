@extends('layouts.app')
@section('titulo')
    Iniciar Sesion
@endsection
@section('contenido')
    <div class="md:flex md:justify-center md:gap-5 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg')}}" alt="Registro de usuarios" class="rounded-lg">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf
               
                @if(session('mensaje'))
                    <p class="bg-red-500 text-white my-2 p-1 text-center rounded-lg">
                        {{ session('mensaje') }}
                    </p>
                @endif
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input id="email" name="email" type="email" placeholder="Tu Email" 
                    class="border p-3 w-full rounded-lg" @error('email') class="border-red-500" @enderror 
                    value="{{ old('email')}}" 
                    >
                    @error('email')
                    <p class="bg-red-500 text-white my-2 p-1 text-center rounded-lg">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input id="password" name="password" type="password" placeholder="Tu Contraseña" 
                    class="border p-3 w-full rounded-lg @error('password') border-red-500" @enderror"
                    value=""
                    >
                    @error('password')
                    <p class="bg-red-500 text-white my-2 p-1 text-center rounded-lg">
                        {{$message}}
                    </p>
                    @enderror
                </div>  
                <div class="mb-5">                
                    <input type="checkbox" name="remember" id="rememberpassword"> 
                    <label for="rememberpassword" class="text-gray-500 text-sm">  Mantener mi sesion abierta</label>                   
                </div>            
                <div class="mb-5"> 
                    <input type="submit" value="Iniciar sesion" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded">
                </div>
            </form>
        </div>
    </div>
@endsection