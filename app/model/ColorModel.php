<?php

include_once(SYS.'/connection.php');

class ColorModel
{

private $db;

    public function __construct()
    {
      $this->db = new Connection();
    }

  public function getColor(int $id = null){

     $query = 'SELECT * FROM colors';
     
     if($id){
        $query .= 'WHERE = '.$id;
     }
       
    
    $result = $this->db->query($query);   
     
    return $result;   
   
  }

}