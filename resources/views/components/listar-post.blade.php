<div>
    @if ($posts->count())
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6">
        @foreach ($posts as $post)
            <div>
                <a href="{{ route('posts.show', ['post' => $post->id, 'user' => $post->user->username]) }}">
                    <img class="rounded" src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
                </a>
            </div>
        @endforeach
    </div>
    <div class="my-10">
        {{ $posts->links('pagination::tailwind') }}
    </div>
    @else
    <p class="text-gray-600 uppercase text-center font-bold"> 
       {{$titulo}}
    </p>
    @endif
</div>