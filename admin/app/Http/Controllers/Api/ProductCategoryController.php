<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productCategoriesArray = ProductCategory::withCount('products')->orderBy('order_column')->get()->toArray();

        foreach ($productCategoriesArray as &$productCategoryArray) {
            unset($productCategoryArray['media']);
        }
        return response()->json($productCategoriesArray);
    }
}
