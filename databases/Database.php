<?php
namespace databases;

class Database
{
    protected string $dns;
    protected string $user;
    protected string $password;

    public function __construct()
    {
        $this->dns = 'mysql:host=localhost;dbname=librarys';
        $this->user = 'root';
        $this->password = '200997';
    }

    public function connect(): \PDO
    {
        try {
            return new  \PDO($this->dns,$this->user,$this->password);
        }catch (\PDOException $PDOException){
            echo $PDOException->getMessage();
            die();
        }
    }
}