<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.create')->only('create', 'store');
        $this->middleware('can:admin.tags.edit')->only('edit', 'update');
        $this->middleware('can:admin.tags.destroy')->only('destroy');
    }

    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }


    public function create()
    {
        $colors = [
            'red'           => 'Color rojo',
            'yellow'        => 'Color amarillo',
            'green'         => 'Color verde',
            'blue'          => 'Color azul',
            'indigo'        => 'Color indigo',
            'purple'        => 'Color morado',
            'pink'          => 'Color rosado',
            'orange'        => 'Color naranjo',
            'IndianRed'     => 'Color rojizo',
            'HotPink'       => 'Color medio rosado',
            'LightSalmon'   => 'Color salmon',
            'DarkKhaki'     => 'Color amarillo verdoso'
        ];
        return view('admin.tags.create', compact('colors'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags',
            'color' => 'required'
        ]);
       $tag =  Tag::create($request->all());
       return redirect()->route('admin.tags.edit', $tag)->with('info', 'La etiqueta ha sido creada correctamente');
    }


/*     public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    } */


    public function edit(Tag $tag)
    {
        $colors = [
            'red'           => 'Color rojo',
            'yellow'        => 'Color amarillo',
            'green'         => 'Color verde',
            'blue'          => 'Color azul',
            'indigo'        => 'Color indigo',
            'purple'        => 'Color morado',
            'pink'          => 'Color rosado',
            'orange'        => 'Color naranjo',
            'IndianRed'     => 'Color rojizo',
            'HotPink'       => 'Color medio rosado',
            'LightSalmon'   => 'Color salmon',
            'DarkKhaki'     => 'Color amarillo verdoso'
        ];
        return view('admin.tags.edit', compact('tag', 'colors'));
    }


    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:tags,slug,$tag->id",
            'color' => 'required'
        ]);
        $tag->update($request->all());
        return redirect()->route('admin.tags.edit', $tag)->with('info', 'La etiqueta ha sido actualizada correctamente');
    }


    public function destroy(Tag $tag)
    {
        $tag->delete();
        return back()->with('info', 'La etiqueta ha sido eliminada correctamente');
    }
}
