<?php

namespace App\Http\Controllers;

use App\Admin\Form\RichFileField;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.testimonials.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'avatar'  => 'required|array|min:1|max:1',
            'name' => 'required|string',
            'designation' => 'required|string',
            'comment' => 'required|string',
        ]);



        $testimonial = Testimonial::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'comment' => $request->comment,
        ]);


        RichFileField::syncMedia($request->avatar, $testimonial, $testimonial->avatar, 'avatar');

        $response =  $request->has('create-another') ?
            redirect()->back() :
            redirect()->route('testimonials.edit', $testimonial->id);


        return $response->with('toastr-success', 'Testimonial created.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('pages.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'avatar'  => 'required|array|min:1|max:1',
            'name' => 'required|string',
            'designation' => 'required|string',
            'comment' => 'required|string',
        ]);



        $testimonial->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'comment' => $request->comment,
        ]);



        RichFileField::syncMedia($request->avatar, $testimonial, $testimonial->avatar, 'avatar');

        return  redirect()->back()->with('toastr-success', 'Information saved.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return  redirect()->back()->with('toastr-success', 'Testimonial deleted.');
    }
}
