<?php

namespace App\Http\Traits;

trait  MediaServiceTrait
{
  public function uploadFile($file, $dirFile)
  {
    $imageName = time() . '.' . $file->getClientOriginalExtension();
    $file->move(public_path($dirFile), $imageName);
    return $imageName;
  }

  public function urlGenerator($dirFile, $fileName)
  {
    return config('app.url') . '/' . $dirFile . '/' . $fileName;  
  }

}