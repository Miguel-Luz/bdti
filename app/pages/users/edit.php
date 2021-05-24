<?php
include_once(MODEL.'/UserModel.php');
include_once(MODEL.'/ColorModel.php');
include_once(LIBRARY.'/FlashData.php');
include_once(LIBRARY.'/Helper.php');


$validation_message = '';

if (!filter_var($args[0], FILTER_VALIDATE_INT)) {
    $validation_message .= "<li>A indetificação fornecida não é válida.</li>";
}

  if(!empty($validation_message)){
 
    $validation_message  = "<ul>" . $validation_message . "</ul>";
       
    FlashData::setFlashData($validation_message);
    header("Location:".Helper::AddressServer());
    exit();  
}


$user_model = new UserModel();
$resultUser = $user_model->getUserWithColor($args[0]);

if(count($resultUser) < 1){
    FlashData::setFlashData('Registro não encontrado');
    header("Location:".Helper::AddressServer());
    exit();  
}

$users = $resultUser[0]; 

$dataName  = $users->name;
$dataEmail = $users->email;  
$selectedColor = $users->color_id;  

$color_model = new ColorModel();
$dataColors = $color_model->getColor();

$actionForm = '/users/update';

require_once(TEMPLATE.'/users/form_user.tpl.php');