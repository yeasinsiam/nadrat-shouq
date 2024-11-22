<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Support\Facades\Cache;

class ContactInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact_info = Cache::rememberForever('api-contact-info', function () {
            return ContactInfo::first();
        });

        return response()->json($contact_info);
    }
}
