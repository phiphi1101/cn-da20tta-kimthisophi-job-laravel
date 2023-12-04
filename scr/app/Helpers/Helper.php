<?php
namespace App\Helpers;

class Helper
{
    public static function DateTime($str, $type = 'datetime')
    {
        $formats = [
            'date'     => 'd/m/Y',
            'time'     => 'H:i:s',
            'datetime' => 'H:i:s d/m/Y',
        ];
        return $str !== '' ? date($formats[$type], strtotime($str)) : '';
    }

    public static function UploadImage($file, $fileLocation)
    {
        $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/' . $fileLocation, $fileName);
        return "/storage/$fileLocation/$fileName";
    }

    public static function SelectedCategory($categoryList, $category)
    {
        return $categoryList->pluck('category_id')->contains($category) ? 'selected' : '';
    }
}
