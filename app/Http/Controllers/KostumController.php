<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Kostum;
use Illuminate\Http\Request;

class KostumController extends Controller
{
    public function index()
    {
        $Kostums = Kostum::all();
        return view('menu-costume', ['Kostum' => $Kostums]);
    }

    public function add()
    {
        $categories = Category::all();
        return view('costume-add', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kostum_id' => 'required|unique:Kosta|max:255',
            'title' => 'required|max:255'
        ]);

        $newName = '';
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName,'public');
        }
        $request['cover'] = $newName;
       $Kostum = Kostum::create($request->all());
       $Kostum->categories()->sync($request->categories);
       return redirect('menu-costume')->with('status','Kostum berhasil ditambahkan');
    }
public function edit($slug)
{
    $Kostum = Kostum::where('slug', $slug)->first();
    $categories = Category::all();
   return view('costume-edit', ['categories' => $categories, 'Kostum' => $Kostum]);
}
public function update(Request $request, $slug)
{

    if ($request->file('image')) {
        $extension = $request->file('image')->getClientOriginalExtension();
        $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
        $request->file('image')->storeAs('cover', $newName);
        $request['cover'] = $newName;
    }


    $Kostum = Kostum::where('slug', $slug)->first();
    $Kostum->update($request->all());
    if ($request->categories) {
        $Kostum->categories()->sync($request->categories);
     }
     return redirect('menu-costume')->with('status','Kostum Berhasil di Update');
    }
    public function delete($slug)
    {
        $Kostum = Kostum::where('slug', $slug)->first();
        $Kostum->delete();
        return redirect('menu-costume')->with('status','Kostum berhasil dihapus');
    }
    public function deletedCostume()
    {  $deletedCostume = Kostum::onlyTrashed()->get();
        return view('costume-deleted-list', ['deletedCostume' => $deletedCostume]);
    }
    public function restore($slug)
    {
        $Kostum = Kostum::withTrashed()->where('slug', $slug)->first();
        $Kostum->restore();
        return redirect('menu-costume')->with('status','Kostum berhasil dikembalikan');
    }
}
