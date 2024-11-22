<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        $limit = 6;

        $productsArray = Product::latest()->when($request->product_category_slug, function ($query) use ($request) {
            return $query->whereHas('productCategory', function ($q) use ($request) {
                $q->where('slug', $request->product_category_slug);
            });
        })->paginate($limit)->toArray();




        // Remove unused properties
        foreach ($productsArray['data'] as &$productArray) {

            foreach ($productArray['gallery'] as  &$gallery) {
                unset($gallery['responsive_images']);
            }
            unset($productArray['media']);
        }
        unset($productsArray['links']);


        return response()->json(array_merge($productsArray, $productsArray));
    }
    /**
     * Display  the resource.
     */
    public function show($productSlug)
    {

        $productArray = Product::where('meta_slug', $productSlug)->firstOrFail()->toArray();


        // Remove unused properties
        foreach ($productArray['gallery'] as  &$gallery) {
            unset($gallery['responsive_images']);
        }
        unset($productArray['media']);


        return response()->json($productArray);
    }
}
