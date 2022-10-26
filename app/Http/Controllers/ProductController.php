<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resorce.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $productlist = Product::latest();

        if(request('search')){
            $productlist->where('name', 'like', '%'.request('search').'%')
            ->orWhere('description', 'like', '%'.request('search').'%');
        }

        return view('product.index',[
            'productlist' => $productlist->paginate(12)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorylist = Category::all();
        return view('product.add-product')->with('categorylist', $categorylist);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required','image','mimes:png,jpg,jpeg'
        ]);

        $validated = $request->validate([
            'name' => 'required|min:5',
            'description' => 'required|min:15|max:500',
            'price' => 'required|numeric|min:1000|max:1000000',
            'stock' => 'required|numeric|min:1|max:10000',
            'category_id' => 'required'
        ]);

        $imageFile = $request->file('image');
        $imageName = time().'.'.$imageFile->getClientOriginalExtension();
        Storage::putFileAs('public/images', $imageFile, $imageName);

        DB::table('products')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'image' => $imageName
        ]);

        return redirect('products')->with('status', 'Insert Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('product.show-product', ['product' => $product]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('product.edit-product', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $validated = $request->validate([
            'image' => 'required','image','mimes:png,jpg,jpeg'
        ]);

        $validated = $request->validate([
            'description' => 'required|min:15|max:500',
            'price' => 'required|numeric|min:1000|max:1000000',
            'stock' => 'required|numeric|min:1|max:10000',
        ]);

        $dest = 'storage/images/'.$product->image;
        if(File::exists($dest)){
            File::delete($dest);
        }

        $imageFile = $request->file('image');
        $imageName = time().'.'.$imageFile->getClientOriginalExtension();
        Storage::putFileAs('public/images', $imageFile, $imageName);

        $validated['image'] = $imageName;

        $product->update($validated);
        return redirect('products')->with('status', 'Successfully updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {   
        $dest = 'storage/images/'.$product->image;
        if(File::exists($dest)){
            File::delete($dest);
        }

        DB::table('products')->where('id', 'like', $product->id)->delete();

        return redirect('products')->with('status', 'Successfully deleted');
    }
}
