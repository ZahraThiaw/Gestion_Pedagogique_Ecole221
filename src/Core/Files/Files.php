<?php
namespace Core\Files;
class Files  {

    private $dir;
    private $imagesType;

    public function uploadFile($file, $path, $name = null, $ext = null){
        $this->dir = $path;
        $this->imagesType = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $name;
        $extention = $ext;

        if($file['error'] == 0){
            $ext = explode('.', $file['name']);
            $ext = end($ext);
            $ext = strtolower($ext);
            if(in_array($ext, $this->imagesType)){
                $filename = $filename . '.' . $ext;
                move_uploaded_file($file['tmp_name'], $this->dir . $filename);
            }
        }

    }
    public function deleteFile($path, $name = null, $ext = null){
        $this->dir = $path;
        $this->imagesType = ['jpg', 'jpeg', 'png', 'gif'];
        

    }
    // public function getFile($path, $name = null, $ext = null);
    // public function getFiles($path, $name = null, $ext = null);
    // public function getFolder($path);
    // public function deleteFolder($path);


}