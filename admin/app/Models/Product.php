<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model implements HasMedia
{
    use HasSlug, InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'fabric',
        'material',
        'measurement',
        'warranty',


        // Meta
        'meta_slug',

        // Relation
        'product_category_id'
    ];
    protected $appends  = ['gallery'];
    protected $with     = ['media'];



    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('meta_slug');
    }

    /**
     * Get the gallery property from media
     */
    public function getGalleryAttribute()
    {
        return $this->getMedia('gallery');
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('gallery')
            ->acceptsMimeTypes(['image/jpeg'])
            ->withResponsiveImages();
    }


    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
