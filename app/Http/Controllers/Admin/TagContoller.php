<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.edit')->only('edit', 'update');
        $this->middleware('can:admin.tags.create')->only('create', 'store');
        $this->middleware('can:admin.tags.destroy')->only('destroy');

    }

    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }


    public function create()
    {
        $colors =[
            'red' => 'Rojo',
            'yellow' => 'Amarillo',
            'green' => 'Verde',
            'blue' => 'Azul',
            'indigo' => 'Indigo',
            'purple' => 'Morado',
            'pink' => 'Rosado'
        ];
        return view('admin.tags.create', compact('colors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        $tag = Tag::create($request->all());
        return redirect()->route('admin.tags.edit', compact('tag'));
    }


    public function edit(Tag $tag)
    {
        return view ('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request,Tag $tag)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:categories,slug,$tag->id"
        ]);
        $tag->update($request->all());
        return redirect()->route('admin.tags.edit', $tag)->with('info', 'La categoria se  actualizo con exito');

    }

    public function destroy( Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.categories.index')->with('info', 'La categoria se elimino con exito');
    }
}
