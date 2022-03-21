<?php 

// ================================== i use pdo for configuration and connection to database ==============//
// ==================================================== i am still learning... ^_^ =======================//

namespace App\Core;
use app\Config\Config;
class Database extends Config{
    //from init.php
    private $db_host;
    private $db_user;
    private $db_pass;
    private $db_name;
    private $config;
    private $dbh, // database handler
    $stmt; //statement


    protected function __construct(){

        $this->config = new Config;
        $this->db_host = $this->config->{"DB_HOST"};
        $this->db_user = $this->config->{"DB_USER"};
        $this->db_pass = $this->config->{"DB_PASS"};
        $this->db_name = $this->config->{"DB_NAME"};

        $dsn = 'mysql:host='.$this->db_host.';dbname='.$this->db_name; // database source name

        $option = [
            \PDO::ATTR_PERSISTENT => True, // persistent connection cache
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION // error reporting
        ];

        try {
            // database connection
            $this->dbh = new \PDO($dsn,$this->db_user,$this->db_pass,$option); 
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    protected function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    protected function bind($params,$value,$type = null)
    {
        // protected the query
        if(is_null($type)){
            switch (true) {
                case is_int($value):
                    $type = \PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = \PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = \PDO::PARAM_NULL;
                    break;
                default:
                    $type = \PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($params,$value,$type);
    }

    protected function exec()
    {
        $this->stmt->execute();
    }

    protected function resultAll()
    {
        $this->exec();
        return $this->stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    protected function single()
    {
        $this->exec();
        return $this->stmt->fetch(\PDO::FETCH_ASSOC);
    }

    protected function resultNum()
    {
        $this->exec();
        return $this->stmt->fetchAll(\PDO::FETCH_NUM);
    }

    protected function resultSingleNum()
    {
        $this->exec();
        return $this->stmt->fetch(\PDO::FETCH_NUM);
    }

}
