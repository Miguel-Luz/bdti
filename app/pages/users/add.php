

<?php include_once(MODEL.'/ColorModel.php'); ?>
<?php include_once(LIBRARY.'/FlashData.php'); ?>

<?php

$color_model = new ColorModel();

$dataColors = $color_model->getColor();

$actionForm = '/users/store';

$dataName      =  FlashData::getPostData('name');
$dataEmail     =  FlashData::getPostData('email');  
$selectedColor =  FlashData::getPostData('color');  

?>

<?php require_once(TEMPLATE.'/users/form_user.tpl.php'); ?>