@props(['post'])

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden container">

    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-3 gap-1">

        @if ($post->image)
            <div class="pl-9 pr-9">
                <a href="{{ env('IMG_POSTS') . $post->image->url }}" data-fancybox>
                    <img class="w-full h-72 object-cover object-center" src="{{ env('IMG_POSTS') . $post->image->url }}"
                        alt="">
                </a>
            </div>
        @else
            <img class="w-full h-72 object-cover object-center" src="{{ asset('img/montana-f.jpg') }}" alt="">
        @endif

        <div class="py-4 col-span-2">
            <h1 class="font-bold text-xl mb-2 text-justify">
                <a href="{{ route('posts.show', $post) }}">{{ $post->name }}</a>
            </h1>
            <div class="text-gray-700 text-base text-justify">
                {!! $post->extract !!}
            </div>

            <div class="pt-4 pb-2">
                @foreach ($post->tags as $tag)
                    <a href="{{ route('posts.tag', $tag) }}" style="background-color: {{ $tag->color }};"
                        class="inline-block px-3 h-6 text-white rounded-full text-sm">{{ $tag->name }}</a>
                @endforeach
            </div>

        </div>

    </div>

</article>
