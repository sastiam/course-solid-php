<?php namespace Sastiam\CourseSolid\Db\Mysql;


use PDO;

class MysqlConnection implements DBConnectionInterface {

    private PDO $connection;

    public function __construct(array $connectionParams) {
        $this->connection = new PDO($connectionParams["DSN"], $connectionParams["USERNAME"], $connectionParams["PASSWORD"]);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    public function connect(): PDO
    {
        return $this->connection;
    }
}
