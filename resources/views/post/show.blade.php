@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads' . '/' . $post->imagen) }}" alt="Imagen del post {{ $post->imagen }}">

            <div class="p-3 flex items-center gap-4">
                @auth
                    <livewire:like-post :post="$post" />     
                @endauth
            </div>

            <div>
                <p class="font-bold"> {{ $post->user->username }} </p>
                <p class="text-sm text-gray-400">
                    {{ $post->created_at->diffForHumans() }}
                </p>
            </div>
            @auth
                @if ($post->user_id == auth()->user()->id)
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        {{-- method spoofing  --}}
                        <input type="submit" value="Elminar Publicacion"
                            class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-1 cursor-pointer">
                    </form>
                @endif
            @endauth
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                @auth

                    <p class="text-xl font-bolt text-center mb-4">Agregar un Nuevo Comentario</p>
                    @if (session('mensaje'))
                        <div class="bg-green-500 p-2 rounded mb-6 text-white text-center uppercase font-bold">
                            <p>{{ session('mensaje') }}</p>
                        </div>
                    @endif

                    <form action="{{ route('comentarios.store', ['post' => $post->id, 'user' => $user->username]) }}"
                        method="POST">
                        <div class="mb-5">
                            @csrf
                            <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
                                Añade un Comentario
                            </label>
                            <textarea id="comentario" name="comentario" placeholder="Agrega un Comentario"
                                class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror"></textarea>
                            @error('comentario')
                                <p class="bg-red-500 text-white my-2 p-1 text-center rounded-lg">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <input type="submit" value="Comentar"
                                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded">
                        </div>
                    </form>

                @endauth

                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll">
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario)
                            <div class="p-5 border-gray-300 border-b">
                                <a href="{{ route('posts.index', $comentario->user->username) }}" class="font-bold">
                                    {{ $comentario->user->username }}
                                </a>
                                <p>{{ $comentario->comentario }} </p>
                                <p class="text-sm text-gray-400">{{ $comentario->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        sin comentarios
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
