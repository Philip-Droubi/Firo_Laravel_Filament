<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Traits\StringHelper;
use Symfony\Component\HttpFoundation\File\UploadedFile;

trait StorageHelper
{
    use StringHelper;
    protected function storageDelete(string $deletePath, Bool $isInPrivate = false, Bool $isDir = false): bool
    {
        if ($deletePath)
            if ($isInPrivate)
                !$isDir ? Storage::disk("private")->delete($deletePath) : Storage::disk("private")->deleteDirectory($deletePath);
            else !$isDir ? Storage::delete($deletePath) : Storage::deleteDirectory($deletePath);
        return true;
    }

    protected function storeFile($file, String $path, String $mainPath = "public/assets/"): string
    {
        $destination_path = $mainPath . $path;
        $fileToStore = $file;
        $randomString = Str::random(30);
        $file_name =  $this->arToEnNum($randomString . str_replace(' ', '_', $fileToStore->getClientOriginalName()) . '.' . $fileToStore->extension());
        $savePath = $fileToStore->storeAs($destination_path, $file_name);
        return $path . "/" . $file_name;
    }

    public function createFileObject($url)
    {
        $path_parts = pathinfo($url);

        $newPath = $path_parts['dirname'] . '/tmp-files/';
        if (!is_dir($newPath)) {
            mkdir($newPath, 0777, true);
        }

        $newUrl = $newPath . $path_parts['basename'];
        copy($url, $newUrl);
        $imgInfo = getimagesize($newUrl);

        $file = new UploadedFile(
            $newUrl,
            $path_parts['basename'],
            $imgInfo['mime'],
            filesize($url),
            true,
        );

        return $file;
    }
}