<?php

include_once(SYS.'/connection.php');

class UserModel
{

private $db;

    public function __construct()
    {
      $this->db = new Connection();
    }

  public function getUser(int $id = null)
  {

     $query = 'SELECT * FROM users';
     
     if($id){
        $query .= 'WHERE = '.$id;
     }
       
    
    $result = $this->db->query($query);   
     
    return $result;   
   
  }

  public function getUserWithColor($id = NULL)
  {

    $query = "SELECT users.name name ,email,user_id,color_id,colors.name color 
              FROM users 
              INNER JOIN user_colors on (users.id = user_colors.user_id) 
              INNER JOIN colors on (user_colors.color_id = colors.id)";
  
      if(isset($id))
       {

        $query .= " WHERE users.id = " . $id; 
       }
   
    $result = $this->db->query($query);   
   
    return $result;   
  }

  public function addUser(array $data)
  {
      
      $query = "INSERT INTO users ( name, email) values ('". $data['name'] . "', '" . $data['email'] ."')";
      $result = $this->db->insert($query);   
      return $result;
  }

  public function addUserColor(array $data)
  {
        
      try{
          $this->db->getConnection()->beginTransaction();
              $queryU = "INSERT INTO users ( name, email) values ('". $data['name'] . "', '" . $data['email'] ."')";
              $this->db->insert($queryU);  
              $user_id = $this->db->getConnection()->lastInsertId();
              $queryUC = "INSERT INTO user_colors ( user_id, color_id) values ('". $user_id . "', '" . $data['color_id'] ."')";
              $result = $this->db->insert($queryUC);   
          $this->db->getConnection()->commit();
          return $result;
      
      }catch(Exception $e){
        $this->db->getConnection()->rollback(); 
        throw $e;
      }
  }
  
  
  public function delUser($id)
  {
   try{
    $query = "DELETE FROM users WHERE id = ".$id;
    $result = $this->db->delete($query); 
    return $result;  
    }catch(Exception $e){
      throw $e;
    }
  }

  public function updateUser(array $data)
  {
    $query = "UPDATE users SET name = '". $data['name'] ."', email = '". $data['email'] ."' WHERE id = ". $data['user_id'];
    return $this->db->query($query);   
  }
} 