<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ContactInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact_info = ContactInfo::first();
        return view('pages.contact-info', compact('contact_info'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'phone_number'                         => 'required|string',
            'email'                                => 'required|string',
            'address'                              => 'required|string',
            'google_map_location_embedded_url'     => 'required|string',
        ]);

        ContactInfo::first()->update($request->all());

        Cache::forget('api-contact-info');

        return  redirect()->back()->with('toastr-success', 'Information saved.');
    }
}
