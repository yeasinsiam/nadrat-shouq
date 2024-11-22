<?php

use App\Models\ContactInfo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contact_info', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number');
            $table->string('email');
            $table->mediumText('address');
            $table->mediumText('google_map_location_embedded_url');
            $table->timestamps();
        });


        ContactInfo::create([
            'phone_number'                      => '+96653 220 9847',
            'email'                             => 'imran21ksa@gmail.com',
            'address'                           => 'Al- badr, Al- shifa industrial, Riyadh 14727, Saudi Arabia.',
            'google_map_location_embedded_url'  => 'https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d1814.8798654866662!2d46.720347!3d24.528395!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjTCsDMxJzQyLjMiTiA0NsKwNDMnMTMuNCJF!5e0!3m2!1sen!2sbd!4v1690349022964!5m2!1sen!2sbd',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_info');
    }
};
