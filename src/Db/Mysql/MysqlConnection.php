<?php namespace Sastiam\CourseSolid\Db\Mysql;


use PDO;

class MysqlConnection implements DBConnectionInterface {

    /**
     * @var PDO
     */
    private PDO $connection;

    /**
     * @param array $connectionParams
     */
    public function __construct(array $connectionParams) {
        $this->connection = new PDO($connectionParams["DSN"], $connectionParams["USERNAME"], $connectionParams["PASSWORD"]);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    /**
     * @return PDO
     */
    public function connect(): PDO
    {
        return $this->connection;
    }
}
