<?php
include_once(MODEL.'/UserModel.php');
include_once(MODEL.'/UserColorModel.php');
include_once(LIBRARY.'/FlashData.php');
include_once(LIBRARY.'/Helper.php');

$user_model  = new UserModel(); 
$user_color_model  = new UserColorModel(); 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
     
   if(empty($_POST['key_user'])){
      FlashData::setFlashData("<span class='span-message-error'> Nenhum registro foi selecionado para deleção.</span>");
         header("Location:".Helper::AddressServer('/users'));
         exit();    
   }
   
   try{
        foreach($_POST['key_user'] as $id):
           $user_model->delUser($id);
        endforeach;
        FlashData::setFlashData("<span class='span-message-success'> Registros deletados.</span>");
        header("Location:".Helper::AddressServer('/users'));
        exit();      
     }catch(Exception $e){
         echo "<pre>";
         print_r($e); 
         echo "</pre>";
         die();
         FlashData::setFlashData("<span class='span-message-error'> Erro de execução.</span>");
         header("Location:".Helper::AddressServer('/users'));
         exit();    
       }
  }

if($_SERVER['REQUEST_METHOD'] == 'GET'){
 
 try{
  
    $user_model->delUser($args[0]);
    FlashData::setFlashData("<span class='span-message-success'> Registro deletado. </span>");
    header("Location:".Helper::AddressServer('/users'));
    exit();      
 }catch(Exception $e){
     
     FlashData::setFlashData("<span class='span-message-error'> Erro de execução. </span>");
     header("Location:".Helper::AddressServer('/users'));
     exit();    
   }
}