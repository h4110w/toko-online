<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('name', 'asc')->paginate(config('olshop.pagination'));
        return view('admin.product.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();

        return view('admin.product.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required|min:20',
            'price' => 'required|numeric',
            'category.*' => 'required'
        ]);

        $image = $request->file('image')->store('products');

        $product = Product::create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'image' => $image
        ]);
        $categories = Category::find($request->category);
        $product->categories()->attach($categories);
        return redirect()->route('product.index')->with('success', 'Add Product Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::get();

        return view('admin.product.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
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
        $image = $product->image ??  null;
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete($product->image);
            }
            $image = $request->file('image')->store('products');
        }
        //if (!$request->hasFile('image') && $product->image) {
        //    $image = $product->image;
        //}
        $product->update([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'image' => $image
        ]);
        $product->categories()->sync($request->category);
        return redirect()->route('product.index')->with('success', 'Update Product success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $product->delete();
        return back()->with('danger', 'Product deleted');
    }
}
