<?php

namespace App\Http\Controllers;

use App\Admin\Form\RichFileField;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('pages.products.categories.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.products.categories.create');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'slug'  => 'nullable|unique:product_categories,slug',
            'icon'  => 'required|array|min:1'
        ]);



        $productCategory = ProductCategory::create([
            'name' => $request->name
        ]);


        RichFileField::syncMedia($request->icon, $productCategory, $productCategory->icon, 'icon');

        $response =  $request->has('create-another') ?
            redirect()->back() :
            redirect()->route('product-categories.edit', $productCategory->id);


        return $response->with('toastr-success', 'Product category created.');
    }





    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
        return view('pages.products.categories.edit', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCategory $productCategory)
    {

        $request->validate([
            'name' => 'required',
            'slug'  => 'nullable|unique:product_categories,slug,' . $productCategory->id,
            'icon'  => 'required|array|min:1'
        ],);



        $productCategory->update([
            'name' => $request->name
        ]);



        RichFileField::syncMedia($request->icon, $productCategory, $productCategory->icon, 'icon');

        return  redirect()->back()->with('toastr-success', 'Information saved.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();
        return  redirect()->back()->with('toastr-success', 'Product category deleted.');
    }
}
