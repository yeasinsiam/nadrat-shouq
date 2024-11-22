<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonialsArray = Testimonial::orderBy('order_column')->get()->toArray();

        foreach ($testimonialsArray as &$testimonialArray) {
            unset($testimonialArray['media']);
        }
        return response()->json($testimonialsArray);
    }
}
