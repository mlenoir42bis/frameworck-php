<?php
/**
 * Description of DbManager
 */

class Db_manager {

    protected $pdo;

    public function __construct() {
        $dsn = "mysql:host=localhost;dbname=cvCard_cl";
        $options = array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',);
        $this->pdo = new \PDO($dsn,"root","root4", $options);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection() {
        return $this->pdo;
    }

}
