<?php
namespace App\Traits ;
trait SaveFile{
  public function  SaveFile($file,$folder){
        $name=time().'.'.$file->extension();        
        $file->move($folder,$name);
        return $name;        
    }
}
?>