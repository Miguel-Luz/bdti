<?php

include_once(SYS.'/connection.php');

class UserColorModel
{

private $db;

    public function __construct()
    {
      $this->db = new Connection();
    }

  public function getByColor(int $id)
  {
   $query = 'SELECT * FROM users_color WHERE color_id = '.$id;
   $result = $this->db->query($query);   
   return $result;   
  }

  public function getByUser(int $id)
  {
   $query = 'SELECT * FROM users_user WHERE user_id = '.$id;
   $result = $this->db->query($query);   
   return $result;   
  }

  
  public function addUserColor(array $data)
  {
      $this->db->getConnection()->beginTransaction();
      $query = "INSERT INTO user_colors ( user_id, color_id) values ('". $data['user_id'] . "', '" . $data['color_id'] ."')";
      $result = $this->db->insert($query);   
      $this->db->getConnection()->commit();
      return $result;
  }


  public function delByUser(int $id)
  {
   $query = 'DELETE FROM user_colors WHERE user_id = '.$id;
   $result = $this->db->delete($query);   
   return $result;   
  }
 
  public function updateUserColor(array $data)
  {
    $query = "UPDATE user_colors SET color_id = '". $data['color_id'] . "' WHERE user_id = '". $data['user_id'] . "'";
    return $this->db->query($query);   
  }

   


}