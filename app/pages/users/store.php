<?php
include_once(MODEL.'/UserModel.php');
include_once(MODEL.'/UserColorModel.php'); 
include_once(LIBRARY.'/FlashData.php');
include_once(LIBRARY.'/Helper.php');

function keepPostData(){
 
  if(!empty($_POST['name'])){
    FlashData::setPostData('name',$_POST['name']);
  }
  
  if(!empty($_POST['email'])){
    FlashData::setPostData('email',$_POST['email']);  
  }
  
  if(!empty($_POST['color'])){
    FlashData::setPostData('color',$_POST['color']);  
  }    
}

$validation_message = '';

if (! $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $validation_message .= "<li>Email inválido.</li>"; 
}

if (! $color = filter_var($_POST['color'], FILTER_VALIDATE_INT)) {
    $validation_message .= "<li>Valor não esperado para cor.</li>";
}

if (! $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
    $validation_message .= "<li>Valor não esperado para nome.</li>";
}

if(!empty($validation_message)){

    $validation_message  = "<ul class='list-message-error'>" . $validation_message . "</ul>";
       
    keepPostData();
    
    FlashData::setFlashData($validation_message);
    header("Location:".Helper::AddressServer('/users/add'));
    exit(); 
 }
  
  $user_model = new UserModel(); 

  try{

    $user = array(
        'name' => $name,
        'email' => $email,
        'color_id' => $color
       );
    
      $id_user = $user_model->addUserColor($user);
          
      FlashData::setFlashData("<span class='span-message-success'> Usuário cadastrado </span>");
      header("Location:".Helper::AddressServer());  
      exit();  

    }catch(PDOException $e){
      
         if($e->getCode() == 23000){
              FlashData::setFlashData("<span class='span-message-error'> Email já cadastrado </span>");
              keepPostData();
              header("Location:".Helper::AddressServer('/users/add'));
              exit();    
         }else{
          FlashData::setFlashData("<span class='span-message-error'> Erro de execução </span>");
          keepPostData();
          header("Location:".Helper::AddressServer('/users/add'));
          exit();    
         }
    }