<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait FileOrNull
{
    protected function imageOrNull(?UploadedFile $file = null): ?string
    {
        if (!$file) {
            return null;
        }

        $nombre = MD5($file) . '.' . $file->getClientOriginalExtension();
        $file->storeAs("public/images", $file);

        return storage_path("app/public/images/$nombre");
    }

    protected function docOrNull(?UploadedFile $file = null): array
    {
        if (!$file) {
            return ['path' => null, 'name' => null];
        }

        $nombre = MD5($file) . '.' . $file->getClientOriginalExtension();
        $file->storeAs("public/documents", $file);

        return [
            'path' => storage_path("app/public/documents/$nombre"),
            'name' => $nombre,
        ];
    }
}
