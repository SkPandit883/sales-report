<?php
namespace App\Libraries;
class FileUploader{
  public static function upload($file,$path){
    $imageName = $file->getRandomName();
    $file->move($path, $imageName);
    return $imageName;
  }
  public static function remove(){

  }
}