<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    public function index(){
        $categorylist = DB::table('categories')->get();
        return view('category.index')->with('categorylist', $categorylist);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'category' => 'required|distinct'
        ]);

        $category = new Category;
        $category['category'] = $validated['category'];
        $category->save();

        return redirect()->back()->with('status', 'Insert Success!');
    }
}
