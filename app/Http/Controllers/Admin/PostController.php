<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create', 'store');
        $this->middleware('can:admin.posts.edit')->only('edit', 'update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }


    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();
        /* return dd($categories); */
        return view('admin.posts.create', compact('categories', 'tags'));
    }


    public function store(PostRequest $request)
    {
        $post = Post::create($request->all());

        if($request->file('file')){
            $url = Storage::put('img-posts', $request->file('file'));
            $post->image()->create([
                'url' => $url,
                'category_id' => $post->category_id
            ]);
        }        
        if($request->tags){
            $post->tags()->attach($request->tags);
        }        
        //elimina datos de cache
        Cache::flush();
        
        return redirect()->route('admin.posts.edit', $post);
    }


    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }


    public function edit(Post $post)
    {
        $this->authorize('author', $post);

        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }


    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('author', $post);

        $post->update($request->all());

       /*  dd($post->category_id); */
        //si hay un req de una imagen la guarda en la carpeta
        if($request->file('file')){
            $url = Storage::put('img-posts', $request->file('file'));
            /* dd($url); */
            if($post->image){
                Storage::delete($post->image->url);
                $post->image->update([
                    'url' => $url,
                    'category_id' => $post->category_id
                ]);
            }else{
                $post->image()->create([
                    'url' => $url,
                    'category_id' => $post->category_id
                ]);
            }
        }
        //actualizar las etiquetas
        if($request->tags){
            $post->tags()->sync($request->tags);  /*attach*/
        }

        //elimina datos de cache
        Cache::flush();

        return redirect()->route('admin.posts.edit', $post)->with('info', 'El post ha sido actualizado');
    }
    

    public function destroy(Post $post)
    {
        $this->authorize('author', $post);
        
        $post->delete();

        //elimina datos de cache
        Cache::flush();

        return redirect()->route('admin.posts.index')->with('info', 'El post ha sido eliminado');
    }
}
