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

        $nombre = "img-" . time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs("images", $nombre);

        return "/storage/images/{$nombre}";
      
    }

    protected function docOrNull(?UploadedFile $file = null): array
    {
        if (!$file) {
            return ['path' => null, 'name' => null];
        }

        $nombre = "doc-" . time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs("docs", $nombre);

        return [
            'path' => "/app/public/docs/$nombre",
            'nombre' => $nombre,
        ];
    }
}
