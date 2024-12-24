<x-app-layout>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 py-2 px-4">
        
        {{--  article de card-post  --}}
        <article class="bg-white shadow-lg rounded-lg overflow-hidden pb-4">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">

                @if ($post->image)
                    <div class="pl-9 pr-9 pt-2 pb-2">
                        <a href="{{ env('IMG_POSTS') . $post->image->url }}" data-fancybox>
                            <img class="w-full h-72 object-cover object-center"
                                src="{{ env('IMG_POSTS') . $post->image->url }}" />
                        </a>
                    </div>
                @else
                    <img class="w-full h-72 object-cover object-center" src="{{ asset('img/montana-f.jpg') }}" />
                @endif


                <div class="py-4 lg:col-span-2">

                    <div class="text-gray-700 text-base text-justify pr-4 ml-4">
                        <h1 class="font-bold text-2xl mb-2 text-justify">
                            <a href="{{ route('posts.show', $post) }}">{{ $post->name }}</a>
                        </h1>
                        {!! $post->extract !!}
                    </div>

                    <div class="pt-4 pb-2 ml-4">
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('posts.tag', $tag) }}" style="background-color: {{ $tag->color }};"
                                class="inline-block px-3 h-6 text-white rounded-full text-sm">{{ $tag->name }}</a>
                        @endforeach
                    </div>

                </div>

                <div class="mt-0 ml-4 pr-4 text-justify text-base text-gray-500 sm:col-span-2 lg:col-span-2">
                    {!! $post->body !!}    
                </div>

                {{--  links mas  --}}
                <div>
                    {{--  contenido relacionado  --}}
                    <aside>
                        <h1 class="text-2xl font-bold text-gray-600 mb-4">Más en {{ $post->category->name }}</h1>
                        <ul>
                            @foreach ($similares as $similar)
                                <li class="mb-4">
                                    <a class="flex" href="{{ route('posts.show', $similar) }}">
                                        {{--  <img class="w-30 h-20 object-cover object-center" src="{{env('IMG_POSTS').$similar->image->url}}" alt="">  --}}

                                        @if ($similar->image)
                                            <img width="110px" height="80px"
                                                class="w-30 h-20 object-cover object-center"
                                                src="{{ env('IMG_POSTS') . $similar->image->url }}" alt="">
                                        @else
                                            <img class="w-30 h-20 object-cover object-center"
                                                src="https://cdn.pixabay.com/photo/2023/08/18/14/37/switzerland-8198681_640.jpg "
                                                alt="">
                                        @endif
                                        <span class="ml-2 text-gray-600 text-justify">{{ $similar->name }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </aside>
                </div>

            </div>
                
            

        </article>
        {{--  fin article de card-post  --}}
        {{--  cards inicio  --}}
            {{--  historial  --}}
            <h1 class="font-bold text-2xl mt-6 mb-2 text-justify">
                <a href="{{ route('posts.show', $post) }}">Historial</a>
            </h1>
        <div class="gap-6 grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-3">

                {{--  inicio cards 1  --}}
                <div class="rounded overflow-hidden shadow-lg">
                    <img class="w-full" src="{{ env('IMG_POSTS') . $post->image->url }}" alt="Sunset in the mountains">
                    <div class="px-0 py-4">
                    <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
                    <p class="text-gray-700 text-base">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                    </p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                    </div>
                </div>
                {{--  fin cards  --}}
                <div class="rounded overflow-hidden shadow-lg">
                    <img class="w-full" src="{{ env('IMG_POSTS') . $post->image->url }}" alt="Sunset in the mountains">
                    <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
                    <p class="text-gray-700 text-base">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                    </p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                    </div>
                </div> {{--  fin cards img  --}}
                {{--    inicio cards 1  max-w-sm  --}}
                <div class="rounded overflow-hidden shadow-lg">
                    <img class="w-full" src="{{ env('IMG_POSTS') . $post->image->url }}" alt="Sunset in the mountains">
                    <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
                    <p class="text-gray-700 text-base">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                    </p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                    </div>
                </div> {{--  fin cards img  --}}

        </div> {{--  fin grid cols x  --}}

    

        {{--  footer  --}}
        {{--  <!-- component -->  --
        <footer class="bg-white">
{{--              <div class="container px-0 py-0 mx-auto mt-0">
                <div class="grid grid-cols-1 gap-2 md:grid-cols-2 lg:grid-cols-3">
                    <div>
                        <h1>Suscripción al envío periódico de información</h1>
                        <div class="flex">
                            <input type="email" placeholder="ingresar email" class="block w-3/5 rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <button type="button" class="ml-4 mt-2 focus:outline-none text-white bg-green-700 hover:bg-green-300 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Me Suscribo</button>
                        </div>
                    </div>
                    <div>b</div>
                    <div>c</div>
                </div>
            </div>  --
        </footer>

        {{--  fin footer  --}}
    </div>
</x-app-layout>
