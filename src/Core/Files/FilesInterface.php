<?php

namespace Core\Files;

interface FilesInterface {


    public function uploadFile($file, $path, $name = null, $ext = null);
    public function deleteFile($path, $name = null, $ext = null);
    public function getFile($path, $name = null, $ext = null);
    public function getFiles($path, $name = null, $ext = null);
    public function getFolder($path);
    public function deleteFolder($path);
}