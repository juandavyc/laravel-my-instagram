@extends('layouts.app')

@section('titulo')
    Editar mi perfil
@endsection

@section('contenido')
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">

        <div>
            <fieldset class="border bg-white shadow p-6">
                <legend class="bg-white px-3 rounded font-bold"> Editar usuario e imagen</legend>
                <form action="{{ route('perfil.store') }}" method="POST" enctype="multipart/form-data" class="mt-10 md:mt-0">
                    @csrf
                    <div class="mb-5">
                        <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                            Username
                        </label>
                        <input id="username" name="username" type="text" placeholder="Tu Nombre de Usuario"
                            class="border p-3 w-full rounded-lg @error('username') border-red-500" @enderror"
                            value="{{ auth()->user()->username }}">
                        @error('username')
                            <p class="bg-red-500 text-white my-2 p-1 text-center rounded-lg">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                            Imagen de perfil
                        </label>
                        <input id="imagen" name="imagen" type="file" class="border p-3 w-full rounded-lg"
                            accept=".jpg, .jpeg, .png">
                        @error('imagen')
                            <p class="bg-red-500 text-white my-2 p-1 text-center rounded-lg">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <input type="submit" value="Guardar Cambios"
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded">
                    </div>
                </form>
            </fieldset>
        </div>
        <div>
            <fieldset class="border bg-white shadow p-6">
                <legend class="bg-white px-3 rounded font-bold"> Cambiar Email</legend>
                <form action="{{ route('perfil.store.email') }}" method="POST" class="mt-10 md:mt-0">
                    @csrf
                    <div class="mb-5">
                        @if (session('mensaje.email'))
                            <div class="bg-green-500 p-2 rounded mb-6 text-white text-center uppercase font-bold">
                                <p>{{ session('mensaje.email') }}</p>
                            </div>
                        @endif
                        <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                            Email
                        </label>
                        <input id="email" name="email" type="email" placeholder="Tu nuevo Email"
                            class="border p-3 w-full rounded-lg @error('email') border-red-500" @enderror"
                            value="{{ auth()->user()->email }}">
                        @error('email')
                            <p class="bg-red-500 text-white my-2 p-1 text-center rounded-lg">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <div class="mb-5">
                        <input type="submit" value="Guardar Cambios"
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded">
                    </div>
                </form>
            </fieldset>
        </div>
        <div>
            <fieldset class="border bg-white shadow p-6">
                <legend class="bg-white px-3 rounded font-bold"> Cambiar Contraseña</legend>
                <form action="{{ route('perfil.store.password') }}" method="POST" class="mt-10 md:mt-0">
                    @csrf

                    @if (session('mensaje.password'))
                        <div class="bg-red-500 p-2 rounded mb-6 text-white text-center uppercase font-bold">
                            <p>{{ session('mensaje.password') }}</p>
                        </div>
                    @endif

                    <div class="mb-5">
                        <label for="old_password" class="mb-2 block uppercase text-gray-500 font-bold">
                            Contraseña
                        </label>
                        <input id="old_password" name="old_password" type="password" placeholder="Nueva Contraseña"
                            class="border p-3 w-full rounded-lg @error('old_password') border-red-500" @enderror "
                            value="">
                        @error('old_password')
                            <p class="bg-red-500 text-white my-2 p-1 text-center rounded-lg">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                            Nueva Contraseña
                        </label>
                        <input id="password" name="password" type="password" placeholder="Nueva contraseña"
                            class="border p-3 w-full rounded-lg @error('password') border-red-500" @enderror "
                            value="">
                        @error('password')
                            <p class="bg-red-500 text-white my-2 p-1 text-center rounded-lg">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                            Confirmar Contraseña
                        </label>
                        <input id="password_confirmation" name="password_confirmation" type="password"
                            placeholder="Confirmar contraseña"
                            class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-500" @enderror "
                            value="">
                        @error('password_confirmation')
                            <p class="bg-red-500 text-white my-2 p-1 text-center rounded-lg">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <input type="submit" value="Guardar Cambios"
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded">
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
@endsection
