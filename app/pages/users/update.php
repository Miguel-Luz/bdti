<?php
include_once(MODEL.'/UserModel.php');
include_once(MODEL.'/UserColorModel.php'); 
include_once(LIBRARY.'/FlashData.php');
include_once(LIBRARY.'/Helper.php');

$validation_message = '';

if (!$name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
    $validation_message .= "<li>Valor não esperado para nome.</li>";
}

if (!$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $validation_message .= "<li>Email inválido.</li>"; 
}

if (! $color = filter_var($_POST['color'], FILTER_VALIDATE_INT)) {
    $validation_message .= "<li>Valor não esperado para cor.</li>";
}

if (! $user_id = filter_var($_POST['user_id'], FILTER_VALIDATE_INT)) {
  $validation_message .= "<li>Dados inconsistentes.</li>";
}

if(!empty($validation_message)){

    if(!empty($_POST['name'])){
        FlashData::setPostData('name',$_POST['name']);
      }
      
      if(!empty($_POST['email'])){
        FlashData::setPostData('email',$_POST['email']);  
      }
      
      if(!empty($_POST['color'])){
        FlashData::setPostData('color',$_POST['color']);  
      }    
    
    $validation_message  = "<ul>" . $validation_message . "</ul>";
       
    FlashData::setFlashData($validation_message);
    header("Location:".Helper::AddressServer('/users/edit'));
  }

  $user_model       = new UserModel(); 
  $user_color_model = new UserColorModel(); 

  try{

      $user = array(
            'name' => $name,
            'email' => $email,
            'user_id' =>  $user_id
       );
    
      $user_color = array(
            'color_id'=> $color,
            'user_id' =>  $user_id
           );
    
      $user_model->updateUser($user);
      $user_color_model->updateUserColor($user_color);
          
      FlashData::setFlashData("<span class='span-message-success'> Usuário atualizado </span>");
      header("Location:".Helper::AddressServer());    

    }catch(Exception $e){

    FlashData::setFlashData('Erro de execução:'. $e->getMessage());
    header("Location:".Helper::AddressServer('/users/edit'));    
}