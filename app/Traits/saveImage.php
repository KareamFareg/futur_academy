<?php
namespace App\Traits;

trait  saveImage{

    /**
     * save image
     * @param $photo
     * @param $folder
     * @return string
     */
    public function saveImage($image,$folder,$key=''){
        $file_extension=$image->extension();
        $file_name=time().$key.'.'.$file_extension;
        $image->storeAs($folder,$file_name);
        return $file_name;
    }

}
