<?php

namespace App\Http\Controllers;

use App\Admin\Form\RichFileField;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.products.index', [
            'products' => Product::with('productCategory')->latest()->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pages.products.create', [
            'productCategories' =>  ProductCategory::select('id', 'name')->get()->pluck('id', 'name')->mapWithKeys(function ($id, $name) {
                return [$id => $name];
            })
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'                                  => 'required|string',
            'fabric'                                => 'required|string',
            'material'                              => 'required|string',
            'measurement'                           => 'required|string',
            'warranty'                              => 'required|string',
            'description'                           => 'required|string',

            // Meta
            // 'meta_slug'                                  => 'nullable|unique:products,slug',

            // Relation
            'product_category_id'                   => 'required|exists:product_categories,id',

            // Media
            'gallery'  => 'required|array|min:1'
        ]);

        $product = Product::create([
            'name'  => $request->name,
            'fabric' => $request->fabric,
            'material' => $request->material,
            'measurement' => $request->measurement,
            'warranty' => $request->warranty,
            'description' => $request->description,

            // Meta
            // 'meta_slug' => $request->meta_slug,

            // Relation
            'product_category_id' => $request->product_category_id,
        ]);

        // Gallery
        RichFileField::syncMedia($request->gallery, $product, $product->gallery, 'gallery');

        return  redirect()->route('products.edit', $product->id)->with('toastr-success', 'Product created.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $productCategories =  ProductCategory::select('id', 'name')->get()->pluck('id', 'name')->mapWithKeys(function ($id, $name) {
            return [$id => $name];
        });
        return view('pages.products.edit', compact('product', 'productCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {


        if ($request->delete == 'Submit Query') {
            $product->delete();
            return redirect()->route('products.index')->with('toastr-success', 'Product deleted.');
        }

        $request->validate([
            'name'                                  => 'required|string',
            'fabric'                                => 'required|string',
            'material'                              => 'required|string',
            'measurement'                           => 'required|string',
            'warranty'                              => 'required|string',
            'description'                           => 'required|string',

            // Meta
            // 'meta_slug'                                  => 'nullable|unique:products,slug',

            // Relation
            'product_category_id'                   => 'required|exists:product_categories,id',

            // Media
            'gallery'  => 'required|array|min:1'
        ]);


        $product->update([
            'name'  => $request->name,
            'fabric' => $request->fabric,
            'material' => $request->material,
            'measurement' => $request->measurement,
            'warranty' => $request->warranty,
            'description' => $request->description,

            // Meta
            // 'meta_slug' => $request->meta_slug,

            // Relation
            'product_category_id' => $request->product_category_id,
        ]);

        // Gallery
        RichFileField::syncMedia($request->gallery, $product, $product->gallery, 'gallery');

        return  redirect()->back()->with('toastr-success', 'Information saved.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('toastr-success', 'Product deleted.');
    }
}
