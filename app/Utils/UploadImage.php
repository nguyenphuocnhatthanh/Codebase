<?php

namespace App\Helpers;

use Image;
use Storage;

class UploadImage
{
    /**
     * resize image - keep ratio of image
     * @param $file
     * @param $directory
     * @param $width
     * @param $height
     * @return mixed
     */
    public static function resizeImage($file, $directory, $width, $height)
    {
        $img =  Image::make($file->getRealPath())->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $fullPath = $directory . '/' . time().str_random(10) . '.' . $file->getClientOriginalExtension();

        Storage::put($fullPath, $img->stream()->__toString());
        $img->destroy();

        return $fullPath;
    }
}
