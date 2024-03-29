<?php

//declare namespace
namespace Core;

//import root class 
use PDO;

class Database
{
    //declare variable for connection
    public $connection;

    public $statement;

    public function __construct($config, $username = 'root', $password = '')
    {

        $dsn = "mysql:" . http_build_query($config, '', ";");
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        //execute the query
        $this->statement->execute($params);
        //return the executed statement
        return $this;
    }
    public function find()
    {
        return $this->statement->fetch();
    }
    public function findOrFail()
    {
        $result = $this->find();
        if (!$result) {
            abort();
        }

        return $result;
    }
    public function get()
    {
        return $this->statement->fetchAll();
    }
}
