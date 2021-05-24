<?php
session_start();

define('APP', realpath(__DIR__. '/../app'));

define('SYS', realpath(__DIR__. '/../sys'));

define('DATA_PATH', realpath(__DIR__. '/../database'));

define('PAGE', APP."/pages");

define('MODEL', APP.'/model');

define('TEMPLATE', APP.'/templates');

define('LIBRARY', SYS.'/library');

$sg = explode("/",$_SERVER['REQUEST_URI']);

if($_SERVER['REQUEST_URI'] == "/" )
{
  
  $page = PAGE . '/users/main.php';
}

array_shift($sg);
$dir  = array_shift($sg);
$file = array_shift($sg);
$args = $sg;

if (!empty($dir) && !empty($file)) 
{
  if(file_exists(PAGE .'/'. $dir .'/'. $file .'.php')) {
        $page = PAGE .'/'. $dir .'/'. $file .'.php';
  }
}
elseif(!empty($dir))
{
  if(file_exists(PAGE .'/'. $dir .'/'.'main.php')){
      $page = PAGE .'/'. $dir .'/'.'main.php';
  }
}

if(!isset($page))
{

  $page = PAGE . '/default/page_not_found.php';
}

require_once($page);