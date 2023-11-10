<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait UploadImage
{
    public function upload($input, $typeName, $folder)
    {

        if ($input && $input->isValid()) {
            $image = $input;
            $extention = $image->getClientOriginalExtension();
            $imageName = $typeName . uniqid() . '.' . $extention;
            $path = public_path('images/' . $folder);
            $image->move($path, $imageName);
            return $imageName;
        } else {
            // Handle the case where no valid file was uploaded
            return null;
        }
    }
}
