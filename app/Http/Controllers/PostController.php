<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Image;

use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index(){

        if(request()->page){
            $key = 'posts' . request()->page;
        }else{
            $key = 'posts';
        }

        if (Cache::has($key)) {
            $posts = Cache::get($key);
        } else {
            $posts = Post::where('status', 2)->latest('id')->paginate(5);
            Cache::put($key, $posts);
        }    
        return view('posts.index', compact('posts'));
        
    }

    public function show(Post $post){

        $this->authorize('published', $post);

        $similares = Post::where('category_id', $post->category_id)
                    ->where('status', 2)
                    ->where('id', '!=', $post->id)
                    ->latest('id')
                    ->take(2)
                    ->get();

        $imagenes = Image::where('imageable_id_id', $post->id)->get();

        $similares_category = Image::where('category_id', $post->category_id)
                                    ->get();

    return view('posts.show', compact('post', 'similares', 'imagenes', 'similares_category'));
    }

    public function category(Category $category){
        
        $posts = Post::where('category_id', $category->id)
                    ->where('status', 2)
                    ->latest('id')
                    ->paginate(5);

        return view('posts.category', compact('posts', 'category'));
    }

    public function tag(Tag $tag){
        $posts = $tag->posts()->where('status', 2)->latest('id')->paginate(5);

        return view('posts.tag', compact('posts', 'tag'));
    }

    public function home(){
        return view('home');
    }
}
