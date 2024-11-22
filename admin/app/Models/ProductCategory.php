<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ProductCategory extends Model implements HasMedia
{

    use HasSlug, InteractsWithMedia;

    protected $fillable = [
        'name', 'slug', 'order_column'
    ];
    protected $appends  = ['icon'];
    protected $with     = ['media'];

    protected static function booted()
    {

        parent::boot();

        static::creating(function ($model) {
            $firstOrderColumnRecord = static::latest('order_column')->first();
            $model->order_column = $firstOrderColumnRecord ?
                $firstOrderColumnRecord->order_column + 1 :
                1;
        });
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the icon property from media
     */
    public function getIconAttribute()
    {
        return $this->getFirstMedia('icon');
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('icon')->singleFile()->acceptsMimeTypes(['image/png', 'image/svg']);
    }



    public function products()
    {
        return $this->hasMany(Product::class);
    }
}