<?php

namespace App\Utils;

use Cache;
use Carbon\Carbon;
use Image;
use Storage;
use App\Helpers\Helper;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class File
 * @package App\Utils
 *
 * @author: Thanhnpn(thanhnpn@evolableasia.vn)
 * @date 09/05/2018
 */
class File
{
    /**
     * Handle upload file
     *
     * @param string $directory
     * @param UploadedFile $file
     * @return string
     */
    public static function upload(UploadedFile $file, $directory) : string
    {
        $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
        $filename = time() . '-' . str_random(10) . '.' . $extension;
        $path = $directory .'/' . $filename;

        Storage::put($path, file_get_contents($file));

        return $path;
    }

    /**
     * @param UploadedFile $file
     * @return array
     */
    public static function getMetaData(UploadedFile $file) : array
    {
        return [
            'name' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
            'mimes' => $file->getMimeType(),
            'extension' => $file->getClientOriginalExtension(),
            'size' => $file->getSize()
        ];
    }
}
