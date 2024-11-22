<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Testimonial extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'designation',
        'comment',
        'order_column'
    ];
    protected $appends  = ['avatar'];
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
     * Get the avatar property from media
     */
    public function getAvatarAttribute()
    {
        return $this->getFirstMedia('avatar');
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')->singleFile()->acceptsMimeTypes(['image/jpg', 'image/jpeg', 'image/png']);
    }
}
