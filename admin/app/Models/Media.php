<?php

namespace App\Models;

use Spatie\MediaLibrary\MediaCollections\Models\Media as ModelsMedia;

class Media extends ModelsMedia
{


    public function __construct()
    {
        $this->appends = array_merge($this->appends, [
            'responsive_images_srcset',
            // 'placeholder_svg'
        ]);
    }

    public function getResponsiveImagesSrcsetAttribute()
    {
        return $this->getSrcset();
    }

    // public function getPlaceholderSvgAttribute()
    // {
    //     return $this->responsiveImages()->getPlaceholderSvg();
    // }


    function getFileSize()
    {
        $fileSizeInBytes = $this->size;
        $fileSize = $fileSizeInBytes;
        $unit = 'B';

        if ($fileSizeInBytes < 1024) {
            $fileSize = $fileSizeInBytes;
            $unit = 'B';
        } elseif ($fileSizeInBytes < 1024 * 1024) {
            $fileSize = round($fileSizeInBytes / 1024, 2);
            $unit = 'KB';
        } else {
            $fileSize = round($fileSizeInBytes / (1024 * 1024), 2);
            $unit = 'MB';
        }

        return $fileSize . ' ' . $unit;
    }

    function isImage()
    {
        return  str_starts_with($this->mime_type, 'image/');
    }
}
