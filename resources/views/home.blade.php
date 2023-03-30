@extends('layouts.app')

@section('titulo')
    Página Principal
@endsection()

@section('contenido')
    {{-- componente --}}
    {{-- <x-listar-post/> --}}
    <x-listar-post :posts="$posts">
        <x-slot:titulo>
            Sin post que mostrar.
        </x-slot:titulo>
    </x-listar-post>
@endsection()
