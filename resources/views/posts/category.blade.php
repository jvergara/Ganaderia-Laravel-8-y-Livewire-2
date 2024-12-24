<x-app-layout>
    <div class="mx-auto max-w-5xl sm:px-6 lg:px-8 px-4 py-8">
        <h1 class="uppercase text-center text-3xl font-bold">Categoría: {{$category->name}}</h1>
        @foreach ($posts as $post )
            <x-card-post :post="$post"/>
        @endforeach

        <div class="mt-4">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>