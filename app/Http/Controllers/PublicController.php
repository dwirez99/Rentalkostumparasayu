<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Kostum;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        if ($request->category) {
            $Kostums = Kostum::WhereHas('categories', function($q) use($request){
        $q->where('categories.id', $request->category);
          })->get();
        }
          elseif ($request->category || $request->title) {

         $Kostums = Kostum::where('title', 'like', '%'.$request->title.'%')
                            ->orWhereHas('categories', function($q) use($request){
                        $q->where('categories.id', $request->category);
                          })->get();
        }
        else {
            $Kostums = Kostum::all();
        }

        return view('costume-list', ['Kostum' => $Kostums, 'categories' => $categories]);
    }
}
