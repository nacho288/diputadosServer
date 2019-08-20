<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\File\UploadedFile;

trait FileOrNull
{
    protected function fileOrNull(?UploadedFile $file = null): ?string
    {
        if (!$file) {
            return null;
        }

        $nombre = MD5($file) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images', $file);

        return storage_path("app/public/images/$nombre");
    }
}
