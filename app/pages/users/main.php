<?php 

include_once(MODEL.'/UserModel.php'); 
include_once(LIBRARY.'/FlashData.php');

  $user_model = new UserModel();

  $data['users'] = $user_model->getUserWithColor();

  require_once(TEMPLATE . '/users/list_user.tpl.php');

?>


 

