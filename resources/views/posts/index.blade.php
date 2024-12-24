<x-app-layout>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($posts as $post)
                <article class="w-full h-full bg-cover bg-center @if($loop->first) md:col-span-2 @endif" 
                    style="background-image: url(@if ($post->image)
                    {{env('IMG_POSTS').$post->image->url}}
                    @else https://cdn.pixabay.com/photo/2023/08/18/14/37/switzerland-8198681_640.jpg 
                    @endif); height:300px;">
                    
                    <div class="w-full h-full px-8 flex flex-col justify-center">

                        <div class="py-3 px-3">
                            @foreach ($post->tags as $tag )
                                <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 h-6 text-white rounded-full text-sm" 
                                style="background-color: {{$tag->color}};">
                                 {{$tag->name}}
                                </a>
                            @endforeach
                        </div>

                        <h1 class="text-2xl text-black leading-8 font-bold">
                            <a href="{{route('posts.show', $post)}}" style="-webkit-text-stroke: 1px white;">
                                {{$post->name}}
                            </a>
                        </h1>

                    </div>

                </article>
            @endforeach
        </div>

        <div class="mt-4">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>