<?php
// Copyright

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait UploadFile
{
    /**
     * @param Request $request
     * @param string $attribute
     * @param string $path
     * @param int $indexArray
     * @return string
     */
    public function uploadFile(Request $request, string $attribute, string $path, int $indexArray = 0): ?string
    {
        if (is_array($request->$attribute)) {

            $file = $request->$attribute[$indexArray];

            if ($file instanceof UploadedFile) {
                $filename = time() . md5(time() . $file->getClientOriginalName()) . ".{$file->getClientOriginalExtension()}";

                $file->move(public_path("storage/{$path}/"), $filename);

                return "storage/{$path}/{$filename}";
            }
        }

        if ($uploadedFile = $request->file($attribute)) {

            $filename = time() . md5(time() . $uploadedFile->getClientOriginalName()) . ".{$uploadedFile->getClientOriginalExtension()}";

            $request->$attribute->move(public_path("storage/{$path}/"), $filename);

            return "storage/{$path}/{$filename}";
        }
    }
}
