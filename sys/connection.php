<?php

class Connection
{
    private $databaseFile;
    private $connection;

    public function __construct()
    {
        $this->databaseFile = DATA_PATH. "/db.sqlite";
        $this->connect();
    }

    private function connect()
    {
         $this->connection = new PDO("sqlite:{$this->databaseFile}");
         $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         return $this->connection;
    }

    public function getConnection()
    {
        return $this->connection ?: $this->connection = $this->connect();
    }

    public function query($query)
    {
        $result = $this->getConnection()->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS, 'stdClass');
        return $result->fetchAll();
    }

    public function insert($query)
    {
        $this->getConnection()->query($query);
        $returned_id = $this->getConnection()->lastInsertId();
        return $returned_id;
    }

    public function delete($query)
    {  
        try{
            $this->getConnection()->exec('PRAGMA foreign_keys = ON');
            $this->getConnection()->beginTransaction(); 
            $result = $this->getConnection()->query($query); 
            $this->getConnection()->commit(); 
            return $result;
        }catch(Exception $e){
            $this->getConnection()->rollback(); 
            throw $e;
        } 
    }
} 