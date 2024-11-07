<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController {
    protected $filePath;

    public function getFileData (){
        $file = Storage::get($this->filePath);
        if( !$file ){
            $file = "{}";
            Storage::put($this->filePath, $file);
        }
        return json_decode($file, true);
    }

    protected function putFileData ($data){
        Storage::put($this->filePath, json_encode($data));
    }
}
