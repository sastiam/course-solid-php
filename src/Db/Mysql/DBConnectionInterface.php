<?php

namespace Sastiam\CourseSolid\Db\Mysql;
use PDO;

interface DBConnectionInterface
{
    /**
     * @return PDO
     */
    public function connect(): PDO;
}