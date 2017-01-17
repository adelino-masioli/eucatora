<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 05/11/16
 * Time: 14:13
 */

namespace app\Core\Services;
use Image;


class UploadFile
{
    public static function uploadImage($thumb=false, $thumbw=100, $thumh=100, $paththum=null, $pathimg=null, $file=null, $name=null){
        if($thumb==true) {
            $destinationPathThumb = public_path($paththum);
            $img = Image::make($file->getRealPath());
            $img->resize($thumbw, $thumh, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPathThumb . '/' . $name);
        }

        $destinationPath = public_path($pathimg);
        $file->move($destinationPath, $name);
    }


    public static function uploadImageProd($thumb=false, $thumbw=[], $thumh=null, $paththum=null, $path=null, $file=null, $name=null){
        $pimage = public_path($path);
        $pthumb = public_path($path).'/'.$paththum;

        \File::makeDirectory($pimage, 0777, true, true);
        \File::makeDirectory($pthumb, 0777, true, true);

        if($thumb==true) {
            foreach($thumbw as $thumbw) {
                $img = Image::make($file->getRealPath());
                $img->resize($thumbw, $thumh, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($pthumb.'/'.$thumbw.'_'.$name);
            }
        }
        $file->move($pimage, $name);
    }

}