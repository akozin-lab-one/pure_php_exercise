<?php 

namespace Core;

use PDO;
use Core\Response;
// use Core\Response;

class Database
{
    public $connection;

    public $statement;

    public function __construct($config, $dbuser='root',$dbpass='')
    {
        // var_dump($config);
        $dsn = "mysql:". http_build_query($config, '' ,';');
        // dd($dsn);
        $this->connection = new PDO($dsn,$dbuser, $dbpass ,[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params=[]){
        
        $this->statement = $this->connection->prepare($query);
        // dd($params);
        $this->statement->execute($params);

        return $this;

    }

    public function get(){
        return $this->statement->fetchAll();
    }

    public function find(){
        return $this->statement->fetch();   
    }

    public function findorabort(){
        $result = $this->find();

        if (empty($result)) {
            abort(Response::NOT_FOUND);
        }
        return $result;

    }
}