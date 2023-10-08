<?php
use Intervention\Image\Facades\Image;



function imageUrl($image, $directory, $width = false, $height = false)
{
    if (!is_dir($directory)) {
        mkdir($directory, 0755, true);
    }
    $imageName = hexdec(uniqid()) . '.webp';
    $imageUrl = $directory . '/' . $imageName;
    Image::make($image)->encode('webp',100)->resize($width, $height)->save($imageUrl);
    return $imageUrl;
}
