<?php
// Copyright

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait UploadFile
{
    /**
     * @param Request $request
     * @param $attribute
     * @param $path
     * @param string $diskName
     * @return string
     */
    public function uploadFile(Request $request, $attribute, $path, $diskName = 'local'): ?string
    {
        if ($uploadedFile = $request->file($attribute)) {

            $filename = time() . md5(time() . $uploadedFile->getClientOriginalName()) . ".{$uploadedFile->getClientOriginalExtension()}";

            $request->$attribute->move(public_path("storage/{$path}/"), $filename);

            return "storage/{$path}/{$filename}";
        }
    }
}
