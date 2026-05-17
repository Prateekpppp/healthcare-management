<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;

class FileHelper
{
    public static function upload(UploadedFile $file, string $folder = 'uploads'): string
    {
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        $path = $folder;

        $file->move(public_path($path), $filename);

        return $path . '/' . $filename;
    }
}