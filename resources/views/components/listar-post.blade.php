<div>
    @if ($posts->count())

    <div class="grid md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-2 place-items-center">
     @foreach ($posts as $post)
         <div class="place-items-center">
             <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user ]) }}">
                 <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen Post {{ $post->titulo }}">
             </a>
             
         </div>
     @endforeach
  </div>
  
  <div class="flex justify-center font-bold text-4xl m-5">
     {{ $posts->links() }}
  </div>  
  
  
        
    @else
        <p class="text-center">No hay post, sigue a alguien para ver sus posts</p>
    @endif
</div>