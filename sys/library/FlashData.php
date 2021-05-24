<?php

class FlashData{

public static function setFlashData($value){
    $_SESSION['FLASH_DATA'] = $value;
}

public static function getFlashData(){
    if(isset($_SESSION['FLASH_DATA'])) {
         echo $_SESSION['FLASH_DATA'];
         unset($_SESSION['FLASH_DATA']);
    }else{
        echo "Não há na para mostrar ";
    }
 }

 public static function hasFlashData(){
    if(isset($_SESSION['FLASH_DATA'])){
        return true;
    }else{
      return false;
    }
 }

 public static function setPostData($key,$value){
    $_SESSION['POST_DATA'][$key] = $value;
 }

 public static function getPostData($key){
   if(isset($_SESSION['POST_DATA'][$key])){
     $data = $_SESSION['POST_DATA'][$key];
     unset($_SESSION['POST_DATA'][$key]);
     return $data;
   }else{
     return NULL;
   }
 }

}